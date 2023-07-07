<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->config->item('title_prefix'); ?> : Delivery Receipt</title>
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
                                <h4 class="m-b-0 text-white">Create DR</h4>
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
                                                <legend>Delivery Receipt</legend>
                                                <table width="100%">
                                                    <tr>
                                                        <td><label>DR Number : </label></td>
                                                        <td><input type="text" name="data[lhc_number]"
                                                                onkeypress="return isNumber(event)" id="lhc_number"
                                                                class="form-control" style="font-weight:bold;" required>
                                                        </td>

                                                        <td><label>DR Date : </label></td>
                                                        <td><input type="text" name="data[added_on]" id="added_on"
                                                                class="form-control singledate"
                                                                value="<?= date("d-m-Y") ?>"></td>

                                                        <td><label class="control-label">Branch</label></td>
                                                        <td><select class="form-control select2" name="data[branch_id_fk]" id="branch_id_fk" required>
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($branches as $branch) {
                                                                        echo '<option value="' . $branch->branch_agent_id . '" ' . ($booking_gr->branch_id_fk == $branch->branch_agent_id ? 'selected' : '') . ' >' . $branch->branch_agent . '</option>';
                                                                    }
                                                                    ?>    
                                                                </select>      
                                                        </td>



                                                        <!-- <td width="11%"><label>GR No.</label></td>
                                                        <td width="15%">
                                                            <input type="text" name="data[gr_no_fk]" id="gr_no" onkeypress="return isNumber(event)" class="form-control" required data-validation-required-message="This field is required">
                                                        </td> 
                                                        <td><button type="button" class="btn btn-success btn search-me">Fetch Details</button></td>
                                                                        -->

                                                    </tr>
                                                 
                                                    
                                                </table>
                                            </fieldset>

                                            <fieldset>
                                                <legend>Add Challan</legend>
                                                <table width="100%">
                                                    <tr>
                                                        <td><label class="control-label">Select Challan No. :
                                                            </label></td>
                                                        <td><input type="text" name="data[booking_party]"
                                                                id="booking_party" class="form-control"></td>
                                                        <td><label class="control-label">Challan Date :
                                                            </label></td>
                                                        <td><input type="text" name="data[booking_party]"
                                                                id="booking_party" class="form-control" readonly></td>
                                                        <td><label class="control-label">Remarks : </label></td>
                                                        <td width="20%"><input type="text" name="data[booking_party]"
                                                                id="booking_party" class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Vehicle No. :</label></td>
                                                        <td><input type="text" name="data[gr_vehicle_no]"
                                                                id="vehicle_no" class="form-control" required readonly></td>

                                                        <td><label class="">From Station :</label></td>
                                                        <td><input type="text" name="data[gr_fromstation]"
                                                                id="from_station" class="form-control" required
                                                                readonly></td>

                                                        <td><label>To Station : </label></td>
                                                        <td><input type="text" name="data[gr_tostation]" id="to_station"
                                                                class="form-control" required readonly></td>
                                                    </tr>
                                                </table>
                                                <fieldset style="background:white;">
                                                    <legend>GR Details</legend>
                                                    <div class="table-responsive trackTable">
                                                        <table width="100%"
                                                            class="table  table-striped table-bordered ">
                                                            <tr>
                                                            <th>Sr. No.</th>
                                                                <th>GR. No.</th>
                                                                <th>Consignor</th>
                                                                <th>Consignee</th>
                                                                <th>Package</th>
                                                                <th>Quantity</th>
                                                                <th>Weight</th>
                                                                <th>Delivery Type</th>
                                                            </tr>
                                                            <tr>
                                                                <td>demo</td>
                                                                <td>demo</td>
                                                                <td>demo</td>
                                                                <td>demo</td>
                                                                <td>demo</td>
                                                                <td>demo</td>
                                                                <td>demo</td>
                                                                <td>demo</td>
                                                            </tr>
                                                        </table>
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
            var detention_day = parseInt($("#detention_day").val()) || 0;
            var detention_amount = parseInt($("#detention_amount").val()) || 0;
            var detention_ch = detention_day * detention_amount;
            $('#detention_net_amount').val(detention_ch);
            calculatenet();
            summary();

        });

        $('#truck_freight').change(function() {
            var truck_freight = parseInt($("#truck_freight").val()) || 0;
            var tds = (truck_freight * 0.01).toFixed(2);
            $('#tds').val(tds);
            $('#total_truck_freight').val(truck_freight);
            calculatenet();
            summary();
        });

        $('#tds,#munshiana,#loading_ch,#unloading_ch').change(function() {
            calculatenet();
            summary();
        });

        function calculatenet() {
            //Calculate Total Freight
            $loading_ch = parseInt($("#loading_ch").val()) || 0;
            $total_truck_freight = parseInt($("#total_truck_freight").val()) || 0;
            $total_crossing_freight = parseInt($("#total_crossing_freight").val()) || 0;
            $total_freight = $loading_ch + $total_truck_freight + $total_crossing_freight;
            $("#total_freight").val($total_freight);
            // Edited by Rakesh 26/07/19
            var loading_ch = parseInt($("#loading_ch").val()) || 0;
            var unloading_ch = parseInt($("#unloading_ch").val()) || 0;

            var dnamount = parseInt($('#detention_net_amount').val()) || 0;
            //



            var truck_freight = parseInt($("#truck_freight").val()) || 0;
            var advance = parseInt($("#advance").val()) || 0;
            var tds = parseInt($("#tds").val()) || 0;
            var munshiana = parseInt($("#munshiana").val()) || 0;
            // Edited by Rakesh Dated 26/07/19
            // var balance_tf = truck_freight - (advance + tds + munshiana);
            var balance_tf = truck_freight - (advance + tds + munshiana) + loading_ch + unloading_ch + dnamount;
            $('#balance_tf').val(balance_tf);

            $.ajax({
                url: '<?= $base_url ?>ajax_controller/notowords',
                type: 'POST',
                data: ({
                    numvalue: balance_tf
                }),
                success: function(response) {
                    $('#balance_in_words').val(response);
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
            var advAmount = parseInt($('#advance').val());
            if (advAmount > parseInt($('#truck_freight').val()) * 0.99) {
                alertify.error("Advance must be max 99% of truck freight");
                $('#advance').val('');
                $('#advance').select();
            }
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

        // End
        </script>
</body>

</html>