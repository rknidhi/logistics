<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Billing</title>
        <?php $this->load->view('includes/head'); ?> 
        <link href="<?= $base_url ?>assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="<?= $base_url ?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $base_url ?>assets/css/form-css.css" rel="stylesheet" type="text/css" />
        <style>
            .container-fluid{max-width: inherit;}
            table thead tr th{
                width: 200px;
            }
            table tbody tr td{
                width: 200px;
            }
            .billTable table tr td{
                padding: 0px 1px;
                border: 1px solid #aaa;
            }
            .billTable table tr th{
                border: 1px solid #aaa;
            }
            .billTable table tr td input{
                padding: 3px 5px;
                border: none;
            }
            .billTable table tr td .form-control[readonly]{
                padding: 3px 5px;
                border: none;
            }
        </style>
        
    </head>

    <body class="fix-header card-no-border">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar">
                <?php $this->load->view('includes/header'); ?> 
            </header>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <aside class="left-sidebar">
                <?php $this->load->view('includes/sidebar'); ?> 
            </aside>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline-primary">
                                <div class="card-header ">
                                    <h4 class="m-b-0 text-white">Create Fresh Bill</h4>
                                </div>
                                <div class="card-body">
                                    <?php if (!empty($message)) { ?>
                                        <div class="col-md-12">
                                            <div id="message" class="alert alert-danger">
                                                <button class="close" data-close="alert"></button>
                                                <span><?php echo $message; ?></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if (!empty($success)) { ?>
                                        <div class="col-md-12">
                                            <div id="message" class="alert alert-success">
                                                <button class="close" data-close="alert"></button>
                                                <span><?php echo $success; ?></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if (!empty($info)) { ?>
                                        <div id="message" class="col-md-12">
                                            <div class="alert alert-info">
                                                <button class="close" data-close="alert"></button>
                                                <span><?php echo $info; ?></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form class="m-t-10" id="form_validation" novalidate action="" method="POST">
                                                <input type="hidden" name="gr_nos" value=""/>
                                                <fieldset>
                                                    <legend>Billing Form</legend>
                                                    <table width="100%">
                                                        <tr>

                                                        <!-- Modified br Rakesh Dated:13-09-19 -->
                                                        <!--<td><label class="control-label ">Invoice No</label></td>
                                                            <td><input type="text" name="data[invoice_no]" value="" class="form-control" required></td>  -->
                                                            <!-- End -->
                                                            <td><label class="control-label ">Bill To</label></td>
                                                            <td>
                                                                <select class="form-control select2" style="width:400px;" name="data[bill_to]">
                                                                    <option value="">Select</option>
                                                                    <?php foreach ($parties as $party) { ?>  
                                                                        <option value="<?= $party->party_id ?>"><?= $party->party_name ?> (<?= $party->city ?>)</option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td><label class="control-label ">Invoice Date</label></td>
                                                            <td><input type="text" name="data[invoice_date]" value="" class="form-control singledate" required></td>
                                                            
                                                        

                                                            <td><label class="control-label ">HSN Code</label></td>
                                                            <td><input type="text" name="data[hsn_code]" value="" class="form-control" required></td>
                                                            <!--<td><label class="control-label ">PO Number</label></td>
                                                            <td><input type="text" name="data[po_number]" value="" class="form-control"></td>
                                                            <td><label class="control-label ">PO Date</label></td>
                                                            <td><input type="text" name="data[po_date]" value="" class="form-control singledate"></td>-->
                                                        </tr>

                                                        <tr>
                                                        
                                                        </tr>
                                                    </table>
                                                </fieldset>

                                                <div class="table-responsive billTable">
                                                    <table id="example23" class="display table table-hover table-striped table-bordered" cellspacing="0" width="150%">
                                                        <thead>
                                                            <tr>
                                                                <th>SR No.</th>
                                                                <!--th widht="10%">ID&nbsp;No.</th -->
                                                                <th width="20%">Description</th>
                                                                <th>Weight/ Package</th>
                                                                <th>Vehicle Rate</th>
                                                                <th>Loading Chr.</th>
                                                                <th>Unloading Chr.</th>
                                                                <th>Detention Chr.</th>
                                                                <!--<th>Border Exp</th>
                                                                <th>St. Chr.</th>-->
                                                                <th>Subtotal</th>
                                                                <th>CGST %</th>
                                                                <th>SGST %</th>
                                                                <th widht="100px;">Total</th>
                                                                <th>Action</th>
                                                                
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $sn = 1;
                                                            $gr_no = $this->functions->next_id('fresh_booking_gr');
                                                                 //echo $gr_no;
                                                            if($gr_no==1){
                                                                $gr_no = rand(10000,99999); 
                                                            }   
                                                                ?>
                                                           
                                                                <tr id="rowid<?= $sn ?>">
                                                                    <td>1<!--/td>
                                                            
                                                                    <td --><input type="hidden" name="freshbill[gr_nos][<?= $sn ?>]" value="<?= $gr_no ?>" id="gr_nos_<?= $sn ?>" class="form-control" readonly /></td>

                                                                    <td ><input type="text" name="freshbill[description][<?= $sn ?>]" id="description_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value="" class="form-control" style="width:400px;" required></td>

                                                                    <td><input type="text" name="freshbill[weight_size][<?= $sn ?>]" id="weight_size_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value="" class="form-control" required></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="freshbill[bill_vehicle_rate][<?= $sn ?>]" id="vehicle_rate_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value="" class="form-control" required></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="freshbill[bill_loading_chr][<?= $sn ?>]" id="loading_chr_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value=""  class="form-control"></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="freshbill[bill_unloading_chr][<?= $sn ?>]" id="unloading_chr_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value="" class="form-control"></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="freshbill[bill_detention_chr][<?= $sn ?>]" id="detention_chr_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value=""  class="form-control"></td>

                                                                    <!--<td><input type="text" onkeypress="return isNumber(event)" name="freshbill[bill_border_exp][<?//= $sn ?>]" id="border_exp_<?//= $sn ?>" onchange="calculate(<?//= $sn ?>)" value=""  class="form-control"></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="freshbill[bill_st_chr][<?//= $sn ?>]" id="st_chr_<?//= $sn ?>" onchange="calculate(<?//= $sn ?>)" value=""   class="form-control"></td>-->

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="freshbill[bill_sub_total][<?= $sn ?>]" id="sub_total_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value=""  class="form-control" readonly></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="freshbill[bill_cgst][<?= $sn ?>]" id="cgst_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value=""  class="form-control"></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="freshbill[bill_sgst][<?= $sn ?>]" id="sgst_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value=""  class="form-control"></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="freshbill[bill_total][<?= $sn ?>]" id="total_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value=""  class="form-control" readonly></td>
                                                                    <td><button type="button" class="btn btn-primary btn-round btn-simple hidden-sm-down add_field_button"><i class="fa fa-plus"></i> New Row</button></td>
                                                                </tr>
                                                          <!--Grand Total -->
                                                            <tr>
                                                                <td colspan="7"></td>
                                                                <td colspan="3"><h6 style="padding-left:3px; color:black;">Total Payable Amount :</h6></td>
                                                                <td colspan="2"><input type="text" name="grand_total" id="grand_total" value="0" class="form-control" style="font-weight:bold" readonly>
                                                                </td>
                                                            </tr><!-- End -->
                                                    </tbody>        
                                                    </table>

                                                    <div class="form-group col-md-12 text-center">
                                                        <div class="col-sm-12">
                                                            <button type="submit" class="btn btn-success btn1" name="createbill" value="Submit"> Submit</button>

                                                            <button type="submit" class="btn btn btn-info btn1" name="createbill" value="Print"><i class="fa fa-print"></i> Print</button>
                                                            <button type="button" class="btn btn-danger btn1 close-me" class="btn btn-info btn1"><i class="fa  fa-times"></i> Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div> 


                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- ============================================================== -->
                    <!-- End Container fluid  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- footer -->
                    <!-- ============================================================== -->
                    <?php $this->load->view('includes/footer'); ?> 
                    <!-- ============================================================== -->
                    <!-- End footer -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Page wrapper  -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Wrapper -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- All Jquery -->
            <!-- ============================================================== -->
            <?php $this->load->view('includes/scripts'); ?> 
            <!-- This is data table -->
            <script src="<?= $base_url ?>assets/plugins/datatables/datatables.min.js"></script>
            <script src="<?= $base_url ?>assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>

            <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
            <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
            <script src="<?= $base_url ?>assets/plugins/jquery-validation/dist/jquery.validate.js"></script>
            <script>
                                                                    $("#form_validation").validate();
                                                                    $('.singledate').datepicker({
                                                                        autoclose: true,
                                                                        todayHighlight: true,
                                                                        format: 'dd-mm-yyyy',
                                                                        orientation: "bottom auto"
                                                                    });
                                                                    $(".select2").select2();
                                                                    $('#example231').DataTable({
                                                                        dom: 'Blfrtip',
                                                                        language: {search: "_INPUT_",
                                                                            searchPlaceholder: "Search Records..."
                                                                        },
                                                                        buttons: [

                                                                        ],
                                                                    });

                                                                    $('.close-me').click(function () {
                                                                        var id = $(this).attr('id');
                                                                        $.confirm({
                                                                            icon: 'fa fa-times',
                                                                            title: 'Confirm!',
                                                                            content: 'Are you sure you want to close?',
                                                                            animation: 'zoom',
                                                                            closeAnimation: 'none',
                                                                            buttons: {
                                                                                confirm: function () {
                                                                                    window.location.href = '<?= $base_url ?>billing/newbilling';
                                                                                },
                                                                                cancel: function () {
                                                                                }
                                                                            }

                                                                        });
                                                                    });

                                                                    function go_to_edit(url) {
                                                                        window.location.href = url;
                                                                    }


                                                                    function calculate(sn) {
                                                                        vehicle_rate = parseInt($("#vehicle_rate_" + sn).val()) || 0;
                                                                        loading_chr = parseInt($("#loading_chr_" + sn).val()) || 0;
                                                                        unloading_chr = parseInt($("#unloading_chr_" + sn).val()) || 0;
                                                                        detention_chr = parseInt($("#detention_chr_" + sn).val()) || 0;
                                                                       // border_exp = parseInt($("#border_exp_" + sn).val()) || 0;
                                                                       // st_chr = parseInt($("#st_chr_" + sn).val()) || 0;
                                                                        cgst = parseInt($("#cgst_" + sn).val()) || 0;
                                                                        sgst = parseInt($("#sgst_" + sn).val()) || 0;
                                                                       // sub_total = parseInt(vehicle_rate + loading_chr + unloading_chr + detention_chr + border_exp + st_chr);
                                                                        sub_total = parseInt(vehicle_rate + loading_chr + unloading_chr + detention_chr);
                                                                        $("#sub_total_" + sn).val(sub_total);
                                                                        var cgst_val = parseInt(Math.round((sub_total * cgst) / 100));
                                                                        var sgst_val = parseInt(Math.round((sub_total * sgst) / 100));
                                                                        var total = sub_total + cgst_val + sgst_val;
                                                                        $("#total_" + sn).val(total);
                                                                        calSum();
                                                                    }

            </script>

<!-- Modified by Rakesh Dated:23-08-19 -->
<script type="text/javascript">
var max_fields = 5; //maximum input boxes allowed
var wrapper = $(".input_fields_wrap"); //Fields wrapper
var add_button = $(".add_field_button"); //Add button ID

var x = <?= $sn ?>; //initlal text box count
var gr_no_inc = <?= $gr_no ?>;
var gr_no_rmv = <?= $gr_no ?>;
var item_list = '';
$(add_button).click(function (e) { //on add input button click
    e.preventDefault();
    gr_no_inc++;
    x++; //text box increment


    //if (x <= max_fields) { //max input box allowed
        
    var rowInd = $('#example23 >tbody >tr').length;
    var myrow = '<tr id="rowid' + x + '"><td>' + rowInd + '<input type="hidden" value="'+gr_no_inc+'" name="freshbill[gr_nos]['+ x +']" id="gr_nos_' + x + '" class="form-control" readonly /></td>'

+ '<td><input type="text" name="freshbill[description]['+ x +']" id="description_' + x + '" onchange="calculate(' + x + ')" value="" class="form-control" required></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="freshbill[weight_size]['+ x +']" id="weight_size_' + x + '" onchange="calculate(' + x + ')" class="form-control" required></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="freshbill[bill_vehicle_rate]['+ x +']" id="vehicle_rate_' + x + '" onchange="calculate(' + x + ')" value="" class="form-control" required></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="freshbill[bill_loading_chr]['+ x +']" id="loading_chr_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="freshbill[bill_unloading_chr]['+ x +']" id="unloading_chr_' + x + '" onchange="calculate(' + x + ')" value="" class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="freshbill[bill_detention_chr]['+ x +']" id="detention_chr_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="freshbill[bill_sub_total]['+ x +']" id="sub_total_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control" readonly></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="freshbill[bill_cgst]['+ x +']" id="cgst_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="freshbill[bill_sgst]['+ x +']" id="sgst_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control"></td>'

+'<td><input width="5%" type="text" onkeypress="return isNumber(event)" name="freshbill[bill_total]['+ x +']" id="total_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control" readonly></td>'

+ '<td><span class="btn btn-danger btn-round btn-simple" onclick="removeitem(' + x + ')">X Remove</span></td></tr>';
    $('#example23 > tbody > tr:nth-child('+ (rowInd-1)+')').after(myrow);
 /*            }
    else {
        alertify.error("Only Five Items are allowed on a single Bill");
    }        
+'<td><input type="text" onkeypress="return isNumber(event)" name="freshbill[bill_border_exp]['+ x +']" id="border_exp_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="freshbill[bill_st_chr]['+ x +']" id="st_chr_' + x + '" onchange="calculate(' + x + ')" value=""   class="form-control"></td>'
    
    
    */ 
calSum();    
});

function removeitem(x) {
    $("#rowid" + x).remove();
    var i=1;
    $("#example23 >tbody >tr").each(function(){
       var trlen = $("#example23 >tbody >tr").length;
       if(i < trlen){
         $(this).find("td:first").text(i);
       } 
       i++;
    });
    calSum();
}

function calSum(){
    var total = 0;
    var c=0;
    var trlen = $("#example23 >tbody tr").length;
    $("#example23 tr").each(function(){
       if(c>0 && c < trlen){
         var currVal = parseInt($(this).find("td:nth-child(11) input").val());
         if(currVal>0){
            total += currVal;
         }  
       } 
       c++; 
    });
   $('#grand_total').val(total); 
}
</script>
<!-- End -->

    </body>

</html>