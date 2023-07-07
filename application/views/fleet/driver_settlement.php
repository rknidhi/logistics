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
                                                                name="driver_id_fk" id="driver_id_fk"
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
                                                                    id="licence_no" class="form-control" disabled="">
                                                            </td>

                                                            <td width="10%"><label class="control-label">Licence Valid.</label>
                                                            </td>
                                                            <td colspan="2"><input type="date" name="valid_up_to"
                                                                    id="valid_up_to" class="form-control singledate" disabled="true"
                                                            </td>
                                                           
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td width="6%"> <label class="control-label ">Contact No.</label>
                                                            </td>
                                                            <td><input type="text" name="mobile_no"
                                                                    onkeypress="return isNumber(event)"
                                                                    id="mobile_no" class="form-control" disabled="">
                                                            </td>

                                                            <td><label class="control-label ">Address</label></td>
                                                            <td><input type="text" name="address"
                                                                    id="address" class="form-control" disabled="">
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
                                                            <td><input type="text" name="settle_number"
                                                                    onkeypress="return isNumber(event)" id="gr_no"
                                                                    style="font-weight:bold;" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Settlement Date:</label></td>
                                                            <td><input type="text" name="settle_date" id="gr_date"
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Settle Create:</label></td>
                                                            <td><input type="text" name="settle_create_date" id="settle_create_date"
                                                                    class="form-control singledate" ></td>
                                                        </tr>

                                                        

                                                        
                                                    </table>
                                                </fieldset>
                                            </div>
                                        </div>

                                    </div>

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
                                                                ?>
                                                           
                                                                <tr id="rowid<?= $sn ?>">
                                                                    <td>1</td>
                                                                    
                                                                     <td>
                                                                        <select name="settlement[vechile_id_fk][<?php echo $sn; ?>]" id="vechile_id_fk_<?php echo $sn; ?>" onchange="get_vdgr(vechile_id_fk_<?php echo $sn; ?>, <?php echo $sn; ?>)"> 
                                                                        	<option value="">Select</option>
                                                                         </select>   
                                                                     </td>   
                                                                    <td><input type="date" name="settlement[settle_date][<?= $sn ?>]" id="settle_date_<?= $sn ?>" value="" class="form-control" required readonly></td>

                                                                    <td><input type="text" name="settlement[settle_destination][<?= $sn ?>]" id="settle_destination_<?= $sn ?>" value="" class="form-control" readonly></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_freight][<?= $sn ?>]" id="settle_freight_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value="" class="form-control" readonly></td>
                                                                    
                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_advance][<?= $sn ?>]" id="settle_advance_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value="" class="form-control" readonly></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_green_tax][<?= $sn ?>]" id="settle_green_tax_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value=""  class="form-control"></td>
                                                                    
                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_tol_tax][<?= $sn ?>]" id="settle_tol_tax_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value=""  class="form-control"></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_legal][<?= $sn ?>]" id="settle_legal_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value="" class="form-control"></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_dala][<?= $sn ?>]" id="settle_dala_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value="" class="form-control"></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_diesel][<?= $sn ?>]" id="settle_diesel_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value=""  class="form-control"></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_maintanence][<?= $sn ?>]" id="settle_maintanence_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value=""  class="form-control"></td>

                                                                    <td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_balance][<?= $sn ?>]" id="settle_balance_<?= $sn ?>" onchange="calculate(<?= $sn ?>)" value=""  class="form-control" readonly></td>
                                                                    
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
                                                                <td><input type="text" name="gross_salary" id="gross_salary" value="0" onchange="aggregate()" class="form-control" style="font-weight:bold"></td>
                                                                <td>/-</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="10"></td>
                                                                <td colspan="2" style="text-align:center; font-weight:bold;">Duty:</td>
                                                                <td><input type="text" value="0" name="duty" id="duty" onchange="aggregate()" class="form-control" style="font-weight:bold"></td>
                                                                <td>/days</td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="10"></td>
                                                                <td colspan="2" style="text-align:center; font-weight:bold;">Previous:</td>
                                                                <td><input type="text" name="previous" id="previous" onchange="aggregate()" value="0" class="form-control" style="font-weight:bold"></td>
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

                                    <span id="optionvalue" style="display: none"></span>
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
                var rowInd = $('#example23 >tbody >tr').length;
                rowInd=rowInd-6;
                $('#example23 >tbody >tr:gt(0):lt('+ rowInd + ')').remove();

                $('#example23 >tbody >tr').find("input").each(function() {
                    $(this).val("");
                });
				$('#example23 >tbody >tr').find("select").each(function() {
                    $(this).find("option").remove();
                }); 
				$('#example23 >tbody >tr').find("select").append('<option value="">Select</option>');
                               
                $('#example23 >tbody >tr:eq(1)').find("td:gt(0):lt(-1)").each(function() {
                    $(this).html("");
                });

                $.ajax({
                    url: '<?= $base_url ?>fleet/get_driver_details',
                    type: 'POST',
                    data: ({
                        driver_id: driver_id
                    }),
                    success: function(response) {
                        var obj = jQuery.parseJSON(response);
                        var dd = obj['driver'].valid_up_to;

                        dd.toString().split("-").reverse();
                        $("#licence_no").val(obj['driver'].licence_no);
                        $("#valid_up_to").val(dd);
                        $("#address").val(obj['driver'].address);
                        $("#mobile_no").val(obj['driver'].mobile_no);
                        $("#consignor_gstno").val(obj['driver'].gst_no);
                        $("#optionvalue").html(obj['fleet_opt']);
                        $("#vechile_id_fk_"+<?php echo $sn; ?>).html('');
                        $("#vechile_id_fk_"+<?php echo $sn; ?>).append(obj['fleet_opt']);
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
  
   var optionV = $("#optionvalue").html();

    x++; //text box increment
    var condcount = rowInd-4;

    if (condcount <= 10 - max_fields) { 
        
    var myrow = '<tr id="rowid' + x + '"><td>' + (rowInd-4) + '</td>'


+ '<td><select name="settlement[vechile_id_fk]['+ x +']" id="vechile_id_fk_' + x +'" onchange="get_vdgr(vechile_id_fk_'+ x +','+ x +')">"'+ optionV +'</select></td>'

+ '<td><input type="date" name="settlement[settle_date]['+ x +']" id="settle_date_' + x + '" onchange="calculate(' + x + ')" value="" class="form-control singledate" required readonly></td>'

+'<td><input type="text" name="settlement[settle_destination]['+ x +']" id="settle_destination_' + x + '"  class="form-control" readonly></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_freight]['+ x +']" id="settle_freight_' + x + '" onchange="calculate(' + x + ')" value="" class="form-control" readonly></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_advance]['+ x +']" id="settle_advance_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control" readonly></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_green_tax]['+ x +']" id="settle_green_tax_' + x + '" onchange="calculate(' + x + ')" value="" class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_tol_tax]['+ x +']" id="settle_tol_tax_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_legal]['+ x +']" id="settle_legal_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control" ></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_dala]['+ x +']" id="settle_dala_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_diesel]['+ x +']" id="settle_diesel_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_maintanence]['+ x +']" id="settle_maintanence_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control"></td>'

+'<td><input type="text" onkeypress="return isNumber(event)" name="settlement[settle_balance]['+ x +']" id="settle_balance_' + x + '" onchange="calculate(' + x + ')" value=""  class="form-control" readonly></td>'

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



    function calculate(sn) {
        var settle_green_tax = parseInt($("#settle_green_tax_" + sn).val()) || 0;
        var settle_tol_tax = parseInt($("#settle_tol_tax_" + sn).val()) || 0;
        var settle_legal = parseInt($("#settle_legal_" + sn).val()) || 0;
        var settle_dala = parseInt($("#settle_dala_" + sn).val()) || 0;
        var settle_diesel = parseInt($("#settle_diesel_" + sn).val()) || 0;
        var settle_maintanence = parseInt($("#settle_maintanence_" + sn).val()) || 0;
        

        var settle_advance = parseInt($("#settle_advance_" + sn).val()) || 0;
        var settle_balance = settle_advance - (settle_green_tax + settle_tol_tax + settle_legal + settle_dala + settle_diesel + settle_maintanence);
        $("#settle_balance_" + sn).val(settle_balance);

        calSum();
    }


 function get_vdgr(id, sr){
    var grno = $(id).val();

    $.ajax({
        url: '<?= $base_url ?>fleet/get_gr_details',
        type: 'POST',
        data: ({
            grno: grno
        }),
        success: function(response) {
            var obj = jQuery.parseJSON(response);
            $("#settle_destination_"+sr).val(obj.desti);
            $("#settle_freight_"+sr).val(obj.gr_data.sky_freight);
            $("#settle_advance_"+sr).val(obj.gr_data.sky_driver_adv);
			$("#settle_date_"+sr).val(obj.gr_data.gr_date);
           },
           error: function(jqXHR, exception) {
            } 
      });
      calSum();
 }

 function calSum(){
        var total = 0;
        var c=0;
        var totalValue = 0;
        var trlen = $("#example23 >tbody tr").length;
        for(colc=5; colc<=13; colc++){
            $("#example23 tr").each(function(){
               if(c > 0 && c <= trlen-5){
                    totalValue += parseInt($(this).find("td:nth-child("+colc+") input").val()) || 0;
                 } 
                 c++;  
            });
            $("#example23 >tbody tr:eq(-5)").find("td:nth-child("+(colc-3)+")").text(parseInt(totalValue).toFixed(2)); 
            c=0;
            totalValue=0;
          }
          var gross = parseInt($('#gross_salary').val())||0;
          var duty = parseInt($('#duty').val())||0;
          var previous = parseInt($('#previous').val())||0;
          var gross = parseInt($('#gross_salary').val())||0;           

          var netsalary = (gross / 30)*  duty;      
          var balance =    $("#example23 >tbody tr:eq(-5)").find("td:nth-child("+(colc-3)+")").text(parseInt(totalValue));        
          var gtotalvalue = (netsalary+previous)- balance;
          $('#grand_total').val(gtotalvalue);
          aggregate();
    }


function  aggregate(){
  var gross = parseInt($('#gross_salary').val())||0;
  var duty = parseInt($('#duty').val())||1;
  var previous = parseInt($('#previous').val())||0; 
  var netsalary = (gross / 30) *  duty;      
  var balance =    $("#example23 >tbody tr:eq(-5)").find("td:nth-child("+(10)+")").text();        
  var gtotalvalue = (netsalary+previous) - parseInt(balance);
  $('#grand_total').val(gtotalvalue);
}

</script>
<!-- End -->
    </body>
</html>