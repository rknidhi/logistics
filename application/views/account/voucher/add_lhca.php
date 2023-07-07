<!DOCTYPE html>
<html lang="en">

<body>
    <div class="row">
        <div class="card card-outline-primary">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Add LHC Amount</h4>
            </div>
            <div class="card-body myModal" style="background:#fff" id="billmodal">
                <form id="form_validation222" novalidate action="<?= $base_url ?>accounts/voucher/add_lhca_ajax" method="POST">
                    <div class="col-lg-12" id="voucher_details">
                        <div class="table-responsive" style="max-height:500px;">
                            <table id="example2333" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>LHC No.</th>
                                        <th>Gr's No.</th>                                        
                                        <th>LHC Date</th>
                                        <th>Total Amount</th>
                                        <th>Received Amount</th>
                                        <th>Balance</th>
                                        <th>Payable Amount </th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                     for($rows=1; $rows<=5; $rows++){
                                    ?>
                                    <tr id="lhcno<?=$rows?>">
                                        <td><?=$rows.'.'?></td>
                                        <td>
                                            <select name="data[lhcno][]" class="lhctogr">
                                            <option value="">Select</option>
                                                <?= $lhcnos ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="data[grnos][<?php echo $rows;?>][]" id="lhctogr<?=$rows?>">
                                                <option value="">Select</option>
                                            </select>
                                        </td>                                            
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><input name="data[amount][]" type="text" id="total_<?=$rows?>" onchange="gettotal();"></td>
                                    </tr>
                                    <?php
                                     }
                                    ?>        
                                    
                                    <tr>
                                        <td colspan="6">Total Amount : </td>
                                        <td><span id="billtotal"></span>/- </td>
                                    </tr>
                                </tbody>
                                
                            </table>
                            
                        </div>

                        <div class="form-group col-md-12 text-center">
                            <div class="col-sm-12">
                                <input type="hidden" name="button_type" id="button_type" value="">
                                <button type="button" class="btn btn-success addnewlhca" name="addnew"
                                    value="Submit">Submit</button>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet"
        type="text/css" />
    <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?= $base_url ?>assets/js/validation.js"></script>
    <script>
$('.addnewlhca').click(function(){
    $.ajax({
        type: 'POST',
        dataType:"text",
        async: false,        
        url: '<?= $base_url ?>accounts/voucher/add_lhca_ajax',
        data: $('#form_validation222').serialize(),
        success: function (data)
        {
            var response = JSON.parse(data);
            $.fancybox.close();
            if (response.status == 'success') {
                $('#cr_amount').val(response.amount);
                $('#dr_amount').val(response.amount);
                $('#gr_no').val(response.lhc_no);
                $('#payhistory').val(response.payhistory);  
                $('#gr_no_visible').val(response.gr_no_visible);  
                } else {
                    alertify.error("Try Again");
                } 
        }
    });
});

$('select.lhctogr').on('change', function(){
    var rowno = $(this).closest('tr').attr('id');
    var rowid = rowno.substr(5, rowno.length);
    var txtID = rowno.substr(rowno.length -1);
    $.ajax({
            url: '<?= base_url() ?>accounts/voucher/fetch_lhc_details',
            type: 'POST',
            data: ({
                id: $(this).val()
            }),
            success: function(response) {
                var record = JSON.parse(response);
                $('select#lhctogr'+rowid).html(record['grnos']);
                $('tr#'+rowno).find('td:eq(3)').html(record['a'].added_on);                
                $('tr#'+rowno).find('td:eq(4)').html(record['a'].total_freight);
                $('tr#'+rowno).find('td:eq(5)').html(record['a'].received_amount);
                $('tr#'+rowno).find('td:eq(6)').html((record['a'].total_freight)-record['a'].received_amount);
                gettotal();
            }
        });
});

function gettotal(){
    var rowInd = $('#example2333 >tbody >tr').length;
    var gtotal=0;
    for(c=1; c<rowInd; c++){
        var amount = $("#total_" + c).val();
        if ( amount != '')
            gtotal += parseInt(amount);
    }
    $("#billtotal").text(gtotal);
}

</script>
