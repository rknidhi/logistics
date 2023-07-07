<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
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
                padding: 1px 5px;
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
                                    <h4 class="m-b-0 text-white">Create Bill</h4>
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
                                                <input type="hidden" name="gr_nos" value="<?= implode(',', $gr_nos) ?>"/>
                                                <fieldset>
                                                    <legend>Billing Form</legend>
                                                    <table width="100%">
                                                        <tr>
                                                           
                                                            <td><label class="control-label ">Bill To</label></td>
                                                            <?php $booking_gr = $this->functions->get_single_row('settlement_gr', 'sgr_id', $gr_nos[0]);
                                                           // print_r($booking_gr);
                                                             ?>


                                                        <input type="hidden" name="data[bill_to_id]" value="<?= $booking_gr->party_id_fk ?>" />
                                                        <td colspan="6"><input type="text" name="data[bill_to]" readonly class="form-control" value="<?php
                                                        echo $this->function_library->FindPartyDetails($booking_gr->party_id_fk)->party_name." (".$this->function_library->FindPartyDetails($booking_gr->party_id_fk)->city.")";
                                                         ?>" ></td>

                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label ">Invoice No</label></td>
                                                            <td colspan="2"><span style="font-size:14px;"></span>
                                                            
                                                                <select class="select2" id="years" name="data[financial_year]">
                                                                    <option value="-">Select Fin Year</option>
                                                                    <?php
                                                                    $curr_year = idate('Y');
                                                                    $curr_month =  date('m');
                                                                    if($curr_month <= 3){
                                                                    for($i=2011; $i<$curr_year; $i++){
                                                                    ?>
                                                                    <option value="<?php echo $i.'-'. ($i+1); ?>"><?php echo $i.'-'. ($i+1); ?></option>
                                                                    <?php
                                                                         }
                                                                        }
                                                                      if($curr_month >= 4){
                                                                        for($i=2011; $i<=$curr_year; $i++){
                                                                          
                                                                         ?> 
                                                                    <option value="<?php echo $i.'-'. ($i+1); ?>"><?php echo $i.'-'. ($i+1); ?></option>
                                                                      <?php    
                                                                      }  
                                                                      }   
                                                                    ?>
                                                                </select>                                                            
                                                            
                                                            /<input type="text" name="data[invoice_no]" id="invoice_no" value="" class="form-control" style="width:20%; display:inline-block" required></td> 
                                                            <!-- End -->

                                                            <td><label class="control-label ">Invoice Date</label></td>
                                                            <td><input type="text" name="data[invoice_date]" value="" class="form-control singledate" required></td>
                                                        </tr>

                                                       
                                                    </table>
                                                </fieldset>

                                                <div class="table-responsive billTable">
                                                    <table id="example23" class="display table table-hover table-striped table-bordered" cellspacing="0" width="150%">
                                                        <thead>
                                                            <tr>
                                                                <th>S. No.</th>
                                                                <th>Date</th>
                                                                <th>G.R. No.</th>
                                                                <th>Lorry No.</th>
                                                                <th>From</th>
                                                                <th>Destination</th>
                                                                <th>Weight </th>
                                                                <th>Freight</th>
                                                                <th>Green Tax</th>
                                                                <th>Advance</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sn = 1;
                                                            foreach ($gr_nos as $gr_no) {
                                                                $gr_detail = $this->functions->get_single_row('settlement_gr', 'sgr_id', $gr_no);
                                                                ?>
                                                                <tr id="row-id-<?= $gr_detail->sgr_id ?>">
                                                                <td><?= $sn;?></td>
                                                                <td ><?= date_only_format($gr_detail->gr_date) ?></td>
                                                                    <td><input type="hidden" name="bgr_id[<?= $gr_detail->sgr_id; ?>]" value="<?= $gr_detail->sgr_id; ?>"/><?= $gr_detail->sgr_id; ?></td>
                                                                    <td><?= $this->function_library->FindVehicle1($gr_detail->vehicle_id_fk) ?></td>
                                                                    <td><?= $this->function_library->FindStation($gr_detail->from_station_fk); ?></td>
                                                                    <td><?= $this->function_library->FindStation($gr_detail->to_station_fk); ?></td>
                                                                    <!-- <td><?php //echo $this->function_library->FindFreightMethod($gr_detail->sky_freight_weight); ?></td> -->             <td><?= $gr_detail->sky_freight_weight; ?></td>                                                       
                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settle_freight[<?= $gr_no ?>]" id="settle_freight_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value="<?= $gr_detail->sky_freight ?>" onload="calculate(<?= $sn ?>)" class="form-control" required readonly></td>

                                                                    <!-- End -->                                                          
                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settle_green_tax[<?= $gr_no ?>]" id="settle_green_tax_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value=""  class="form-control"></td>
                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settle_advance[<?= $gr_no ?>]" id="settle_advance_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value=""  class="form-control"></td>
                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settle_total[<?= $gr_no ?>]" id="total_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value=""  class="form-control" style="font-weight:bold;" readonly ></td>

                                                                </tr>
                                                                <?php
                                                                $sn++;
                                                            }
                                                            ?>
                                                          <!--Grand Total -->
                                                            <tr style="font-weight: bold;">
                                                                <td colspan="6"></td>
                                                                <td> Total </td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td><input type="text" name="grand_total" id="grand_total" value="0" class="form-control" style="font-weight:bold" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="8"></td>
                                                                <td colspan="2"><h6 style="padding: 10px 3px 1px; color:black;">Total Invoice Value :</h6></td>
                                                                <td><input type="text" name="grand_total" id="grand_total" value="0" class="form-control" style="font-weight:bold" readonly>
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

            <script src="<?= $base_url ?>assets/plugins/areyousure/jquery.are-you-sure.js"></script>
                <script src="<?= $base_url ?>assets/plugins/areyousure/ays-beforeunload-shim.js"></script>

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
    vehicle_rate = parseInt($("#settle_freight_" + sn).val()) || 0;
    cgst = parseInt($("#settle_green_tax_" + sn).val()) || 0;
    sgst = parseInt($("#settle_advance_" + sn).val()) || 0;

    var total = vehicle_rate + cgst - sgst;

    $("#total_" + sn).val(total);
    grandTotal();
    calSum();
}


$(document).ready(function(){
var noInput = "<?= $sn-1 ?>";
 for(i=1; i<=noInput; i++){
    calculate(i);
 }

calSum();
grandTotal()
});




// Modified by Rakesh Dated 14-09-19
$('#invoice_no').change(function(e) {
  var invoice_no = $(this).val();
  if(invoice_no !='')
  {
  $.ajax({
        url: '<?= $base_url ?>billing/chkinvno',
        type: 'POST',
        data: ({invoice_no: invoice_no}),
        success: function (response) {
            var obj = jQuery.parseJSON(response);
            if(obj.status == 'fail')
            {
                alertify.error(obj.status_message);

                $('#invoice_no').focus();
                $('#invoice_no').val("");
            }
            }
        });
        }
     if(invoice_no=='')
     {
        $('#invoice_no').focus();
        $('#invoice_no').val("");
     }   
 });




function grandTotal(){
    var rowInd = $('#example23 >tbody >tr').length;
    var gtotal=0;
    for(c=1; c<rowInd-1; c++){
        gtotal += parseInt($("#total_" + c).val());
    }
    $("#grand_total").val(gtotal);
}

 function calSum(){
        var total = 0;
        var c=0;
        var totalValue = 0;
        var trlen = $("#example23 >tbody tr").length;
        for(colc=8; colc<=11; colc++){
            $("#example23 tr").each(function(){
               if(c > 0 && c <= trlen-2){
                    totalValue += parseInt($(this).find("td:nth-child("+colc+") input").val()) || 0;
                 } 
                 c++;  
            });
            $("#example23 >tbody tr:eq(-2)").find("td:nth-child("+(colc-5)+")").text(parseInt(totalValue).toFixed(2)); 
            c=0;
            totalValue=0;
          }
    }

            </script>
    </body>

</html>