<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Driver Settlement</title>
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
                padding: 0px 3px;
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
                                    <h4 class="m-b-0 text-white">Driver Settlement</h4>
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
                                            <div class="row">
                                        <div class="col-md-8">
                                            <div>
                                                <fieldset>
                                                    <legend>Driver Details</legend>
                                                    <table width="100%">
                                                        <tr>
                                                            <td width="10%"><label
                                                                    class="control-label ">Driver Name</label></td>
                                                            <td colspan="6">
                                                                <select class="form-control select2"
                                                                name="data[driver_id_fk]" id="driver_id_fk"
                                                                class="">
                                                                <option value="">Select</option>
                                                            <?php foreach ($drivers as $driver) { ?>
                                                                 <option value="<?= $driver->driver_id ?>">
                                                                    <?= $driver->name ?></option>
                                                                <?php } ?>
                                                            </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td width="10%"> <label class="control-label">Licence
                                                                    No.</label></td>
                                                            <td><input type="text" name="licence_no"
                                                                    id="licence_no" class="form-control" readonly>
                                                            </td>

                                                            <td width="10%"><label class="control-label">Licence Valid.</label>
                                                            </td>
                                                            <td colspan="2"><input type="text" name="consignor_panno"
                                                                    id="consignor_panno" class="form-control" readonly>
                                                            </td>
                                                           
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td width="6%"> <label class="control-label ">Contact No.</label>
                                                            </td>
                                                            <td><input type="text" name="mobile_no"
                                                                    onkeypress="return isNumber(event)"
                                                                    id="mobile_no" class="form-control" readonly>
                                                            </td>

                                                            <td><label class="control-label ">Address</label></td>
                                                            <td><input type="text" name="address"
                                                                    id="address" class="form-control" readonly>
                                                            </td>
                                                        </tr>
                                                        
                                                    </table>
                                                    
                                                </fieldset>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <fieldset>
                                                    <legend>Settlement Details</legend>
                                                    <table width="100%">
                                                        <tr>
                                                            <td><label class="control-label">Settlement No.</label></td>
                                                            <td><input type="text" name="gr_no"
                                                                    onkeypress="return isNumber(event)" id="gr_no"
                                                                    style="font-weight:bold;" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Settlement Date:</label></td>
                                                            <td><input type="text" name="data[gr_date]" id="gr_date"
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Settle Create:</label></td>
                                                            <td><input type="text" name="data[gr_date]" id="gr_date"
                                                                    class="form-control singledate" ></td>
                                                        </tr>

                                                        

                                                        
                                                    </table>
                                                </fieldset>
                                            </div>
                                        </div>

                                    </div>
                                                
                                                <input type="hidden" name="gr_nos" value=""/>
                                              

                                                <div class="table-responsive billTable" >

                                                    <table id="example23" class="display table table-bordered" cellspacing="0" width="150%" style="background: #efefef;">
                                                        <thead>
                                                            <tr>
                                                                <th>SR No.</th>
                                                                <th>Date</th>
                                                                <th>Vehicle No.</th>
                                                                <th>Destination</th>
                                                                <th>Freight</th>
                                                                <th>Advance</th>
                                                                <th>Green Tax</th>
                                                                <th>Toll Tax</th>
                                                                <th>Legal</th>
                                                                <th>Dala</th>
                                                                <th>Diesel</th>
                                                                <th>Maintenance</th>
                                                                <th>Balance</th>
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
                                                                    <td>1</td>
                                                                    <td><input type="date" name="settlement[settle_date][<?= $sn ?>]" id="settle_date_<?= $sn ?>" value="" class="form-control" required></td>
                                                                    
                                                                    <td><input type="text" name="settlement[vechile_id_fk][<?= $sn ?>]" id="vechile_id_fk_<?= $sn ?>" value=""  class="form-control"><input type="hidden" id="vechile_no_<?= $sn ?>" name="settlement[vechile_no][<?= $sn ?>]" value=""></td>

                                                                    <td><input type="text" name="settlement[settle_destination][<?= $sn ?>]" id="settle_destination_<?= $sn ?>" value="" class="form-control" required></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_freight][<?= $sn ?>]" id="settle_freight_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value="" class="form-control" required></td>
                                                                    
                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_advance][<?= $sn ?>]" id="settle_advance_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value="" class="form-control" required></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_green_tax][<?= $sn ?>]" id="settle_green_tax_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value=""  class="form-control"></td>
                                                                    
                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_tol_tax][<?= $sn ?>]" id="settle_tol_tax_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value=""  class="form-control"></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_legal][<?= $sn ?>]" id="settle_legal_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value="" class="form-control"></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_dala][<?= $sn ?>]" id="settle_dala_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value="" class="form-control"></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_diesel][<?= $sn ?>]" id="settle_diesel_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value=""  class="form-control"></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_maintanence][<?= $sn ?>]" id="settle_maintanence_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value=""  class="form-control"></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_balance][<?= $sn ?>]" id="settle_balance_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value=""  class="form-control"></td>
                                                                    
                                                                    <td><button type="button" class="btn btn-primary btn-round btn-simple hidden-sm-down add_field_button"><i class="fa fa-plus"></i> New Row</button></td>
                                                                </tr>



                                                          <!--Grand Total -->
                                                            <tr>
                                                                <td colspan="4" style="text-align:center; font-weight:bold;">Total:</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>/-</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="10"></td>
                                                                <td colspan="2" style="text-align:center; font-weight:bold;">Gross Sallary:</td>
                                                                <td><input type="text" name="grand_total" id="grand_total" value="0" class="form-control" style="font-weight:bold"></td>
                                                                <td>/-</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="10"></td>
                                                                <td colspan="2" style="text-align:center; font-weight:bold;">Duty:</td>
                                                                <td><input type="text" value="0" class="form-control" style="font-weight:bold"></td>
                                                                <td>/days</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="10"></td>
                                                                <td colspan="2" style="text-align:center; font-weight:bold;">Previous:</td>
                                                                <td><input type="text" name="grand_total" id="grand_total" value="0" class="form-control" style="font-weight:bold"></td>
                                                                <td>/-</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" style="text-align:center; font-weight:bold;">Rupees In Words: </td>
                                                                <td colspan="7"><input value=" rupees only" class="form-control" readonly> </td>
                                                                <td colspan="2" style="text-align:center; font-weight:bold;">Total Invoice Value:</td>
                                                                <td><input type="text" name="grand_total" id="grand_total" value="0" class="form-control" style="font-weight:bold" readonly></td>
                                                                <td>/-</td>
                                                            </tr>
                                                            <!-- End -->
                                                    </tbody>        
                                                    </table>

                                                    <div class="form-group col-md-12 text-center">
                                                        <div class="col-sm-12">
                                                            <button type="submit" class="btn btn-success btn1" name="createbill" value="Submit"> Submit</button>

                                                            <button type="submit" class="btn btn btn-info btn1" name="driversettlement" value="Print"><i class="fa fa-print"></i> Print</button>
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

            $("#driver_id_fk").change(function() {
                var driver_id = $(this).val();
                $.ajax({
                    url: '<?= $base_url ?>fleet/get_driver_details',
                    type: 'POST',
                    data: ({
                        driver_id: driver_id
                    }),
                    success: function(response) {
                        var obj = jQuery.parseJSON(response);
                        $("#licence_no").val(obj.licence_no);
                        $("#address").val(obj.address);
                        $("#mobile_no").val(obj.mobile_no);
                        $("#consignor_gstno").val(obj.gst_no);
                       }
                  });
              });
</script>


<script type="text/javascript">
var max_fields = 5; //maximum input boxes allowed
var wrapper = $(".input_fields_wrap"); //Fields wrapper
var add_button = $(".add_field_button"); //Add button ID

var x = <?= $sn ?>; //initlal text box count

$(add_button).click(function (e) { //on add input button click
    e.preventDefault();
    var rowInd = $('#example23 >tbody >tr').length;

    x++; //text box increment
    var condcount = rowInd-4;

    if (condcount <= 10 - max_fields) { 
        
    var myrow = '<tr id="rowid' + x + '"><td>' + (rowInd-4) + '</td>'

+ '<td><input type="date" name="settlement[settle_date]['+ x +']" id="settle_date_' + x + '" onchange="calculate(' + x + ')" value="" class="form-control singledate" required></td>'

+ '<td><input type="text" name="settlement[vechile_id_fk]['+ x +']" id="vechile_id_fk_' + x + '" onchange="calculate(' + x + ')" value="" class="form-control singledate" required></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_destination]['+ x +']" id="settle_destination_' + x + '" onchange="calculate(' + x + ')" class="form-control" required></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_freight]['+ x +']" id="settle_freight_' + x + '" onchange="calculate(' + x + ')" value="" class="form-control" required></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_advance]['+ x +']" id="settle_advance_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_green_tax]['+ x +']" id="settle_green_tax_' + x + '" onchange="calculate(' + x + ')" value="" class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_tol_tax]['+ x +']" id="settle_tol_tax_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_legal]['+ x +']" id="settle_legal_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control" ></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_dala]['+ x +']" id="settle_dala_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_diesel]['+ x +']" id="settle_diesel_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_maintanence]['+ x +']" id="settle_maintanence_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_balance]['+ x +']" id="settle_balance_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control"></td>'

+ '<td><span class="btn btn-danger btn-round btn-simple" onclick="removeitem(' + x + ')">X Remove</span></td></tr>';
    $('#example23 > tbody > tr:nth-child('+ (rowInd-5)+')').after(myrow);
  }
    else {
        alertify.error("Only Five Items are allowed on a single Settlement");
    }        
calSum();    
});

function removeitem(x) {
    $("#rowid" + x).remove();
    var i=1;
    var trlen = $("#example23 >tbody >tr").length;
    $("#example23 >tbody >tr").each(function(){
       if(i < trlen-4){
         $(this).find("td:first").text(i);
       } 
       i++;
    });
    calSum();
}

function calSum(){
    var total = 0;
    var c=0;
    var totalValue = [];
    var trlen = $("#example23 >tbody tr").length;
    $("#example23 tr").each(function(){
       if(c > 0 && c < trlen-5){
         for(colc=5; colc<=13; colc++){
            totalValue[colc] = parseInt($(this).find("td:nth-child("+colc+") input").val());             
         }   
       } 
       c++; 
    });
   console.log(totalValue); 	
     for(colc1=5; colc1<=13; colc1++){
         $("#example23 >tbody tr").eq(3).find("td:nth-child("+colc+")").text('101'); 
        //$("#example23 >tbody tr").eq(trlen-4).find('td').eq(colc1).text('101');             
//        $("#example23 >tbody tr").eq(trlen-4).find('td').eq(colc).text('101');    
     }
}

function calculate(sn) {
    vehicle_rate = parseInt($("#settle_freight_" + sn).val()) || 0;
    loading_chr = parseInt($("#settle_advance_" + sn).val()) || 0;
    unloading_chr = parseInt($("#settle_green_tax_" + sn).val()) || 0;
    detention_chr = parseInt($("#settle_tol_tax_" + sn).val()) || 0;
    border_exp = parseInt($("#settle_legal_" + sn).val()) || 0;
    st_chr = parseInt($("#settle_dala_" + sn).val()) || 0;
    cgst = parseInt($("#settle_diesel_" + sn).val()) || 0;
    sgst = parseInt($("#settle_maintanence_" + sn).val()) || 0;
    sgst = parseInt($("#settle_maintanence_" + sn).val()) || 0;
    
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

<!-- End -->

    </body>

</html>