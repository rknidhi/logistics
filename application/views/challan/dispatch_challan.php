<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->config->item('title_prefix'); ?> : Create LHC</title>
    <?php $this->load->view('includes/head'); ?>
    <link href="<?= $base_url ?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= $base_url ?>assets/plugins/jquery-validation/demo/css/screen.css">
    <link href="<?= $base_url ?>assets/css/form-css.css" rel="stylesheet" type="text/css" />
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
                                <h4 class="m-b-0 text-white">Loding Slip</h4>
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

                                <form class="m-t-10" id="form_validation" novalidate action="" method="POST">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <legend>Challan Details</legend>
                                                <table width="100%" class="challanDetails">
                                                    <tr>
                                                        <td><label>LHC Number : </label></td>
                                                        <td><input type="text" name="data[lhc_number]"
                                                                onkeypress="return isNumber(event)" id="lhc_number"
                                                                class="form-control" style="font-weight:bold;" required>
                                                        </td>

                                                        <td><label class="control-label ">Vehicle No. :</label></td>
                                                        <td>
                                                        <select class="form-control select2"
                                                        name="data[gr_vehicle_no]"
                                                                id="vehicle_no" required>
                                                               <option value="">Select</option> 
                                                        <?php echo $this->function_library->getVechileList();?>
                                                        </select>
                                                        
                                                        <!--input type="text" name="data[gr_vehicle_no]"
                                                                id="vehicle_no" class="form-control" required --></td>

                                                        <td><label class="control-label">Broker Name : </label></td>
                                                        <td>
                                                                <select class="form-control "
                                                                    name="data[broker_id_fk]" id="broker_id_fk" class="" required
                                                                    >
                                                                    <option value="">Select</option>
                                                                    <?php foreach ($brokers as $broker) { ?>
                                                                    <option value="<?= $broker->broker_id ?>">
                                                                        <?= $broker->broker ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                         
                                                        </td>


                                                        <!-- <td width="11%"><label>GR No.</label></td>
                                                        <td width="15%">
                                                            <input type="text" name="data[gr_no_fk]" id="gr_no" onkeypress="return isNumber(event)" class="form-control" required data-validation-required-message="This field is required">
                                                        </td> 
                                                        <td><button type="button" class="btn btn-success btn search-me">Fetch Details</button></td>
                                                                        -->

                                                    </tr>
                                                    <tr>
                                                        <td><label>LHC Date : </label></td>
                                                        <td><input type="text" name="data[added_on]" id="added_on"
                                                                class="form-control singledate" required
                                                                value="<?= date("d-m-Y") ?>"></td>

                                                        <td><label class="">From Station :</label></td>
                                                        <td>
                                                        
                                                        <select class="form-control" name="data[gr_fromstation]" id="from_station_fk" class="" required data-validation-required-message="Please select station">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($stations as $station) {
                                                                        echo '<option value="' . $station->station_name . '">' . $station->station_name . '</option>';
                                                                    }
                                                                    ?>    
                                                                </select>
                                                                <!--<input type="text" name="data[gr_fromstation]"
                                                                id="from_station" class="form-control" required
                                                                readonly> --></td>
                                                                <td><label class="control-label">PAN No. :</label></td>
                                                        <td>
                                                            <input type="text" name="data[broker_pan]" id="broker_pan"
                                                                class="form-control" readonly>
                                                        </td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label">Branch :</label></td>
                                                            <td><select class="form-control"
                                                                    name="data[branch_id_fk]" id="branch_id_fk" class=""
                                                                    >
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($branches as $branch) {
                                                                        echo '<option value="' . $branch->branch_agent_id . '">' . $branch->branch_agent . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>


                                                        <td><label>To Station : </label></td>
                                                        <td>
                                                        <select class="form-control" name="data[gr_tostation]" id="from_station_fk" class="" data-validation-required-message="Please select station" required>
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($stations as $station) {
                                                                        echo '<option value="' . $station->station_name . '">' . $station->station_name . '</option>';
                                                                    }
                                                                    ?>    
                                                                </select>                                                        
                                                        <!-- <input type="text" name="data[gr_tostation]" id="to_station"
                                                                class="form-control" required readonly> --></td>
                                                        
                                                        <td><label class="control-label">Driver Name : </label></td>
                                                        <td>
                                                          
                                                                <select class="form-control"
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
                                                </table>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Add GR</legend>
                                                    
                                                    <table width="100%" >
                                                    <tr>
                                                        <td width="10%"><label class="control-label">Select GR No. :
                                                            </label></td>
                                                        <td width="57%">
                                                        <select name="gr_nos[]" class="form-control select2" id="gr_nos" multiple="multiple">
                                                        <option value="">Select GR</option>
                                                            </select>
                                                        </td>
                                                        <td><label class="control-label">Remarks : </label></td>
                                                        <td width="22%"><input type="text"name="data[gr_remark]" id="gr_remark" class="form-control"></td>
                                                    </tr>
                                                    </table>
                                                
                                                <fieldset style="background:white;">
                                                    <legend>GR Details</legend>
                                                    <div class="table-responsive trackTable tableHeight">
                                                        <table width="100%"
                                                            class="table  table-striped table-bordered " id="myTable">
                                                            <tr>
                                                                <th>Sr. No.</th>
                                                                <th>GR. No.</th>
                                                                <th>Consignor</th>
                                                                <th>Consignee</th>
                                                                <th>Invoice No.</th>
                                                                <th>Quantity</th>
                                                                <th>Truck Freight</th>
                                                                <th>Weight (KG)</th>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </fieldset>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Lorry Hire Details</legend>
                                                <table width="100%" >
                                                    <tr>
                                                        <td><label class="control-label">Total Quantity :</label></td>
                                                        <td colspan="2">
                                                            <input type="text"
                                                                onkeypress="return isNumber(event)" id="item_qty"
                                                                class="form-control" readonly>
                                                        </td>
                                                        <td><label class="control-label">Total Weight (KG) :</label></td>
                                                        <td>
                                                            <input type="text" name="data[loading_weight]"
                                                                onkeypress="return isNumber(event)" id="loading_weight"
                                                                class="form-control" readonly>
                                                        </td>
                                                        <td><label class="control-label">Booking Freight : </label></td>
                                                        <td><input type="text" name="data[truck_freight]"
                                                                onkeypress="return isNumber(event)" id="truck_freight"
                                                                class="form-control" required
                                                                data-validation-required-message="This field is required">
                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label">TDS : </label></td>
                                                        <td colspan="2"><input type="text" name="data[tds]"
                                                                onkeypress="return isNumber(event)" id="tds"
                                                                class="form-control" readonly
                                                                data-validation-required-message="This field is required">
                                                        </td>


                                                        <td><label class="control-label">Munshiana : </label></td>
                                                        <td><input type="text" name="data[munshiana]"
                                                                onkeypress="return isNumber(event)" id="munshiana"
                                                                class="form-control"></td>

                                                        <td><label class="control-label">Net Freight : </label></td>
                                                        <td><input type="text" name="data[total_truck_freight]"
                                                                id="total_truck_freight"
                                                                class="form-control"
                                                                data-validation-required-message="This field is required" readonly>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label">Loading Charges : </label></td>
                                                        <td colspan="2"><input type="text" name="data[loading_ch]"
                                                                onkeypress="return isNumber(event)" id="loading_ch"
                                                                class="form-control"></td>

                                                        <td><label class="control-label">Unloading Charges : </label>
                                                        </td>
                                                        <td><input type="text" name="data[unloading_ch]"
                                                                onkeypress="return isNumber(event)" id="unloading_ch"
                                                                class="form-control"></td>
                                                        <td><label class="control-label">Detention Charges : </label>
                                                        </td>
                                                        <td><input type="text" name="data[detention_net_amount]"
                                                                id="detention_net_amount" class="form-control">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><label class="control-label">Other Charges : </label></td>
                                                        <td colspan="2"><input type="text" name="data[extra_charge]"
                                                                onkeypress="return isNumber(event)" id="extra_charge"
                                                                class="form-control"></td>

                                                        <td><label class="control-label">Remarks : </label>
                                                        </td>
                                                        <td><input type="text" name="data[remarks]"
                                                                id="remarks"
                                                                class="form-control"></td>
                                                        <td><label class="control-label">Total Freight : </label>
                                                        </td>
                                                        <td><input type="text" name="data[total_freight]"
                                                                id="total_freight" class="form-control" readonly>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><label class="control-label">Advance Payment :</label></td>
                                                        <td><input type="text" name="data[advance]" id="advance"
                                                                onkeypress="return isNumber(event)" class="form-control" readonly
                                                                
                                                                data-validation-required-message="This field is required">

                                                        </td>
                                                        <td>
                                                            <!-- <button class="btn btn-warning btn1" value="Submit"> Pay
                                                                Now</button> -->
                                                        </td>

                                                        <td><label class="control-label">Balance in words</label></td>
                                                        <td><textarea type="text" name="balance_in_words"
                                                                id="balance_in_words" class="form-control" rows="1" wrap="soft" style="font-size:11px;"
                                                                data-validation-required-message="This field is required"
                                                                readonly></textarea></td>
                                                        <td><label class="control-label">Balance : </label></td>
                                                        <td><input type="text" name="data[balance_tf]" id="balance_tf" class="form-control" style="font-weight:bold;" readonly>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <fieldset style="background:white;">
                                                    <legend>Voucher Details</legend>
                                                    <div class="table-responsive trackTable">
                                                        <table width="100%"
                                                            class="table  table-striped table-bordered ">
                                                            <tr>
                                                                <th>Sr. No.</th>
                                                                <th>Narration</th>
                                                                <th width="18%">Date</th>
                                                                <th>Dr./Cr.</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                            <?php
                                                                    $expence = 0;
                                                                    $income = 0;

                                                                if(isset($voucher) && !empty($voucher))
                                                                {
                                                                    $n=1;
                                                                   foreach($voucher as $voucher_row)
                                                                   { 
                                                                       if($voucher_row->transaction_type == 'Debit'):
                                                                        $expence +=$voucher_row->amount;
                                                                       else:
                                                                        $income +=$voucher_row->amount;
                                                                       endif; 
                                                             ?>


                                                            <tr>
                                                                <td><?= $n; ?></td>
                                                                <td><?php echo $this->function_library->getVoucherName($voucher_row->ledger); ?>

                                                                <td><?php echo convertToHumanDate($voucher_row->voucher_date); ?>
                                                                </td>
                                                                <td><?= $voucher_row->transaction_type ?></td>
                                                                <td><?php echo number_format($voucher_row->amount,2) ?>
                                                                </td>
                                                            </tr>

                                                            <?php 
                                                                 $n++;   
                                                                 }      
                                                                }
                                                            ?>

                                                        </table>
                                                        <!-- Total Debit = <?= number_format($expence,2) ?><br>
                                                        Total Credit = <?= number_format($income,2) ?> -->
                                                    </div>
                                                </fieldset>


                                            </fieldset>

                                        </div>
                                        <div class="form-group col-md-12 text-center">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-success btn1" name="submit"
                                                    value="Submit"> Submit</button>
                                                <button type="submit" class="btn btn btn-info btn1" name="submit"
                                                    value="Print"><i class="fa fa-print"></i> Print</button>
                                                <button type="button" class="btn btn-danger btn1 close-me"
                                                    class="btn btn-info btn1"><i class="fa  fa-times"></i>
                                                    Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

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

        <script src="<?= $base_url ?>assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript">
        </script>
        <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet"
            type="text/css" />
        <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="<?= $base_url ?>assets/plugins/jquery-validation/dist/jquery.validate.js"></script>
        <script>
        $(".select2").select2();
        $("#form_validation").validate();
        $('.singledate').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'dd-mm-yyyy',
        });

        function change_status(id) {
            var url = 'admin/athlete_management/change_status';
            $.ajax({
                url: url,
                type: 'POST',
                data: ({
                    id: id
                }),
                success: function(response) {
                    if (response === 1) {
                        $.alert("You don't have permission to change event status");
                    } else {
                        $('#' + id).replaceWith(response);
                    }
                }
            });
        }

        $('.search-me').click(function() {
            var $this = $(this);
            var id = $("#gr_no").val();
            $this.text("Searching...");
            var url = '<?= $base_url ?>challan/get_grdetails';
            $.ajax({
                url: url,
                type: 'POST',
                data: ({
                    id: id
                }),
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status == 'found') {
                        window.location = "<?= $base_url ?>challan/edit_dispatch_challan/" + res
                            .data;
                    }
                    if (res.status == 'success') {
                        $this.text("Search");
                        alertify.success("Fetched");
                        $("#from_station").val(res.data.from_station);
                        $("#to_station").val(res.data.to_station);
                        $("#vehicle_no").val(res.data.vehicle_no);
                        $("#loading_weight").val(res.data.item_weight);
                        $("#total_booking_freight").val(res.data.item_booking_freight_rate);
                        $("#total_crossing_freight").val(res.data.s_crossing_charges);
                        $("#booking_party").val(res.data.booking_party + "(" + res.data.party_city +
                            ")");

                        // Modified by Rakesh Dated 30/07/19
                        /*                                                                                  $("#loading_ch").val(res.data.item_loading_ch);  
                                                                                                         $("#detention_net_amount").val(res.data.item_detention_ch);  
                                                                                                         $("#unloading_ch").val(res.data.item_unloading_charges);  */
                        // End

                        $("#truck_freight").val(res.data.item_booking_freight_rate);

                        $('#broker_id_fk').val(res.data.broker_id_fk).change();
                        $("#truck_freight").change();
                        summary();
                    } else if (res.status == 'fail') {
                        $this.text("Search");
                        alertify.error(res.status_message);
                    }
                }
            });
        });

        $('#detention_day,#detention_amount').change(function() {
            calculatenet();
        });

        $('#truck_freight').change(function() {
            calculatenet();
        });

        $('#tds,#munshiana,#loading_ch,#unloading_ch,#extra_charge,#detention_net_amount').change(function() {
            calculatenet();
        });

        function calculatenet() {
            // Calculate Net Freight
            var truck_freight = parseInt($("#truck_freight").val()) || 0;
            var tdsNet =  (truck_freight * 0.01) || 0;
            var munshiana = parseInt($('#munshiana').val()) || 0;
            var total_truckfreight = (truck_freight -(tdsNet + munshiana));

            $("#truck_freight").val(truck_freight.toFixed(2));
            $('#tds').val(tdsNet.toFixed(2));
            $('#munshiana').val(munshiana.toFixed(2));
            $("#total_truck_freight").val(total_truckfreight.toFixed(2)) || 0;

            //Calculate Total Freight
             var loading_ch            = parseInt($("#loading_ch").val()) || 0;
             var unloading_ch          = parseInt($("#unloading_ch").val()) || 0;
             var detention_net_amount  = parseInt($("#detention_net_amount").val()) || 0;
             var extra_charge          = parseInt($("#extra_charge").val()) || 0;
             var advance               = parseInt($("#advance").val()) || 0;

             $("#loading_ch").val(loading_ch.toFixed(2));
             $("#unloading_ch").val(unloading_ch.toFixed(2));
             $("#detention_net_amount").val(detention_net_amount.toFixed(2));
             $("#extra_charge").val(extra_charge.toFixed(2));
             $("#advance").val(advance.toFixed(2));

             var sum_of_miss   = (loading_ch + unloading_ch + detention_net_amount + extra_charge);
             var total_freight = (total_truckfreight + sum_of_miss);
             $("#total_freight").val(total_freight.toFixed(2));
            var balance_tf =   (total_freight - advance); 

            $('#balance_tf').val(balance_tf.toFixed(2));

            $.ajax({
                url: '<?= $base_url ?>ajax_controller/notowords',
                type: 'POST',
                data: ({
                    numvalue: balance_tf
                }),
                success: function(response) {
                    $('#balance_in_words').val(response.trim() +' Only' );
                    $('#balance_in_words').css('text-transform', 'capitalize');
                }
            }); 
        }

        $("#broker_id_fk").change(function() {
            var broker_id = $(this).val();

            $.ajax({
                url: '<?= $base_url ?>challan/get_broker',
                type: 'POST',
                data: ({
                    broker_id: broker_id
                }),
                success: function(response) {
                    var obj = jQuery.parseJSON(response);
                    $("#broker_mobile").val(obj.mobile_no);
                    $("#broker_pan").val(obj.pan_card_no);
                }
            });
        });

        $('.close-me').click(function() {
            var id = $(this).attr('id');
            $.confirm({
                icon: 'fa fa-times',
                title: 'Confirm!',
                content: 'Are you sure you want to close?',
                animation: 'zoom',
                closeAnimation: 'none',
                buttons: {
                    confirm: function() {
                        window.location.href = '<?= $base_url ?>';
                    },
                    cancel: function() {}
                }

            });
        });

        function go_to_edit(url) {
            window.location.href = url;
        }

        $('#advance_for').change(function() {
            var adv = $('#advance_for').val();
            if (adv == 'Paid') {
                $('#advance_payment_mode').attr('required', 'required');
                $('#advance_check_dd_neft_no').attr('required', 'required');
                $('#advance_payment_date').attr('required', 'required');
            }
            if (adv == 'Un-Paid') {
                $('#advance_payment_mode').removeAttr('required');
                $('#advance_check_dd_neft_no').removeAttr('required');
                $('#advance_payment_date').removeAttr('required');
            }
        });

        $('#balance_for').change(function() {
            var bal = $('#balance_for').val();
            if (bal == 'Paid') {
                $('#balance_mode').attr('required', 'required');
                $('#balance_check_dd_neft_no').attr('required', 'required');
                $('#balance_payment_date').attr('required', 'required');
            }
            if (bal == 'Un-Paid') {
                $('#balance_mode').removeAttr('required');
                $('#balance_check_dd_neft_no').removeAttr('required');
                $('#balance_payment_date').removeAttr('required');
            }
        });

        $('#advance').change(function() {
           
            var advanceAmount = parseInt($('#advance').val());
            var totalFreight = parseInt($('#total_freight').val());
            if(advanceAmount > totalFreight)
            {
                alertify.error("Advance not accepted more than total freight");
                $('#advance').focus();
                $('#advance').val("");
            }
            else {
                calculatenet();
            }
/*             var advAmount = parseInt($('#advance').val());
            if (advAmount > parseInt($('#truck_freight').val()) * 0.99) {
                alertify.error("Advance must be max 99% of truck freight");
                $('#advance').val('');
                $('#advance').select();
            } */
        });

        // Edited by Rakesh Dated 27/07/19
        function summary() {
            // Summary Details
            var loading_ch = parseInt($("#loading_ch").val()) || 0;
            var unloading_ch = parseInt($("#unloading_ch").val()) || 0;
            var dnamount = parseInt($('#detention_net_amount').val()) || 0;
            var truck_freight = parseInt($("#truck_freight").val()) || 0;
            var advance = parseInt($("#advance").val()) || 0;
            var tds = parseInt($("#tds").val()) || 0;
            var munshiana = parseInt($("#munshiana").val()) || 0;
            var detention_amt = parseInt($('#detention_net_amount').val()) || 0;
            var balance_tf = truck_freight - (advance + tds + munshiana) + loading_ch + unloading_ch + dnamount;
            var total_freight = truck_freight + loading_ch + unloading_ch + dnamount;

            $("#total_truck_freight").val(truck_freight);
            $("#sum_loading").val(loading_ch);
            $("#sum_unloading").val(unloading_ch);
            $("#sum_dentention").val(detention_amt);
            $("#sum_toal_freigh").val(total_freight);
            $("#sum_total_advance").val(advance);
            $("#sum_tds").val(tds);
            $("#sum_mushiana").val(munshiana);
            $("#sum_balance_tf").val(balance_tf);
        }

// Added on Dated:15-11-2019
$('#lhc_number').change(function(e) {
  var challanno = $(this).val();
  if(challanno !='')
  {
  $.ajax({
        url: '<?= $base_url ?>challan/checkchallnno',
        type: 'POST',
        data: ({challan_no: challanno}),
        success: function (response) {
            var obj = jQuery.parseJSON(response);
            if(obj.status == 'fail')
            {
                alertify.error(obj.status_message);
                $('#lhc_number').focus();
                $('#lhc_number').val("");
            }
            }
        });
        }
 });

 $('#gr_nos').change(function(e) {
  var grno = $(this).val();
  $.ajax({
        url: '<?= $base_url ?>challan/getgrlist',
        type: 'POST',
        data: ({gr_no: grno, challanNo: ''}),
        success: function (response) {
            var obj = jQuery.parseJSON(response);
            $("#myTable > tbody").empty();
            $('#myTable > tbody').append(obj.grlist);
            $('#item_qty').val(obj.items);
            $('#loading_weight').val(obj.weight);
            }
        });
 });

 $('#vehicle_no').change(function(e) {
  var vehicle_no = $(this).val();
  if(vehicle_no !='')
  {
  $.ajax({
        url: '<?= $base_url ?>challan/getchallanrelatedinfo',
        type: 'POST',
        data: ({vchno: vehicle_no}),
        success: function (response) {
            $("#myTable > tbody").empty();
            $("#myTable > tbody").append("<tr><th>Sr. No.</th><th>GR. No.</th><th>Consignor</th><th>Consignee</th><th>Invoice No.</th><th>Item</th><th>Truck Freight</th><th>Weight</th></tr>");
            var obj = jQuery.parseJSON(response);
            $("#gr_nos").html(obj.vechileID);
            $("#from_station").val(obj.from);
            $("#to_station").val(obj.to);
             }
        });
        }  
 });
// End
</script>
</body>

</html>