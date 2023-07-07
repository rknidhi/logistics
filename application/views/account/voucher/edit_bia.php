<div class="row">
        <div class="card card-outline-primary">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Edit Bill Amount</h4>
            </div>
            <div class="card-body myModal">
                <form class="m-t-10 row" id="form_validation222" novalidate action="<?= $base_url?>accounts/voucher/add_bia_ajax" method="POST">
                    <div class="col-lg-12">
                        <div class="table-responsive" style="max-height:500px;">
                            <table id="example2333" class="display nowrap table table-hover table-striped table-bordered"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Bill No.</th>
                                        <th>Bill Date</th>
                                        <th>Total Amount</th>
                                        <th>Received Amount</th>
                                        <th>Balance</th>
                                        <th>Enter Amount </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <input type="hidden" name="data[voucerno]" value="<?//=$voucherno?>">
                                    <?php
                                    $rows = 1;
                                    foreach($hisrec as $row){
                                    ?>
                                    <tr id="grno<?=$rows?>">
                                        <td><?=$rows.'.'?></td>
                                        <td>
                                            <select name="data[billno][]" class="form-control" required readonly>
                                            <option value="">Select</option>
                                               <?php
                                                foreach($grnos as $option){
                                                 ?>   
                                                   <option value="<?=$option?>" <?=$option == $row->reference_no? 'selected': ''?>><?=$option?></option>
                                                <?php    
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><input name="data[amount][]" type="text" id="total_<?=$rows?>" onchange="gettotal();"></td>
                                    </tr>
                                    <?php
                                    $rows++;
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
                                <button type="button" class="btn btn-success" name="addnew"
                                    value="Submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="<?= $base_url ?>assets/plugins/jquery-validation/dist/jquery.validate.js"></script>

<script src="<?= $base_url ?>assets/js/validation.js"></script>
<script>

$('.btn-success').click(function(){
    $.ajax({
        type: 'POST',
        dataType:"text",
        async: false,        
        url: '<?= $base_url ?>accounts/voucher/add_bia_ajax',
        data: $('#form_validation222').serialize(),
        success: function (data)
        {
            var response = JSON.parse(data);
            $.fancybox.close();
            if (response.status == 'success') {
                $('#cr_amount').val(response.amount);
                $('#dr_amount').val(response.amount);
                $('#gr_no').val(response.gr_no);
                alertify.success("Added");
                } else {
                    alertify.error(response.status_message);
                } 
        }
    });
});

$('select').on('change', function(){
    var rowno = $(this).closest('tr').attr('id');
    var txtID = rowno.substr(rowno.length -1);
    $("#total_" + rowno).attr('required','true');
    $.ajax({
            url: '<?= base_url() ?>accounts/voucher/fetch_bill_details',
            type: 'POST',
            data: ({
                id: $(this).val()
            }),
            success: function(response) {
                var record = JSON.parse(response);
                console.log(record);
                $('tr#'+rowno).find('td:eq(2)').html(record[0].invoice_date);                
                $('tr#'+rowno).find('td:eq(3)').html(record.billamount);
                $('tr#'+rowno).find('td:eq(4)').html(record.received_amount);
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
