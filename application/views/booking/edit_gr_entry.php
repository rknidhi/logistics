<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->config->item('title_prefix'); ?> : Entry GR</title>
    <?php $this->load->view('includes/head'); ?>
    <link href="<?= $base_url ?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= $base_url ?>assets/plugins/jquery-validation/demo/css/screen.css">
    <style>
    .form-table1 {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 15px;
    }

    td {
        padding: 1px 4px;
    }

    .no-padding {
        padding: 0
    }

    .block-1 {
        background: #ccc
    }

    .form-group {
        margin-bottom: 0.5rem;
    }

    .form-control {
        padding: 0 .25rem;
        min-height: 26px;
        font-size: 0.8rem;
    }

    .no-padding-right {
        padding-right: 0
    }

    .btn {
        padding: 2px 12px;
        font-size: 12px;
    }

    .select2-container .select2-selection--single {
        height: 26px;
        font-size: 14px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 26px !important;
    }

    label {
        font-size: 14px;
    }

    select.form-control:not([size]):not([multiple]) {
        height: 26px
    }

    legend {
        display: block;
        width: auto;
        max-width: auto;
        padding: 0;
        margin-bottom: .2rem;
        font-size: 1rem;
        line-height: inherit;
        color: inherit;
        white-space: normal;
        font-weight: 600;
        background: #e3fafd;
        padding: 0px 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    fieldset {
        border: 1px solid #ccc;
        padding: 1px 10px 5px;
        margin-bottom: 10px;
        background: #e8f2c3;
    }

    .table-border td {
        border: 1px solid #d8d6d6;
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
                <?php 

//print_r($gr_entry); 
?>
                <!-- Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-primary">
                            <div class="card-header ">
                                <h4 class="m-b-0 text-white">GR Entry</h4>
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
                                        <div class="col-md-8">
                                            <div>
                                                <fieldset>
                                                    <legend>Sundry Debitors</legend>
                                                    <table width="100%">
                                                        <tr>
                                                            <td width="10%"><label
                                                                    class="control-label ">Party</label></td>
                                                            <td colspan="6">
                                                                <select name="data[party_id_fk]"
                                                                    id="party_id_fk" class="form-control select2"
                                                                    style="width: 100%">
                                                                    <option value="">Select</option>
                                                                    <?php foreach ($parties as $party) { ?>
                                                                    <option value="<?= $party->party_id ?>" <?= $gr_entry->party_id_fk == $party->party_id ? 'selected' : '' ?>>
                                                                        <?= $party->party_name ." -($party->city)" ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td align="middle">
                                                                <button type="button" data-fancybox data-type="ajax"
                                                                    data-src="<?= $base_url ?>master/party/add_party_ajax/consignor"
                                                                    class="btn btn-warning">
                                                                    <i class="fa fa-plus"></i> Add
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%"> <label class="">Address</label></td>
                                                            <td colspan="4"><input type="text" name="consignor_address"
                                                                    id="consignor_address" class="form-control"
                                                                    readonly></td>

                                                        </tr>

                                                        <tr>
                                                            <td width="6%"> <label class="control-label ">Phone</label>
                                                            </td>
                                                            <td><input type="text" name="consignor_phone"
                                                                    onkeypress="return isNumber(event)"
                                                                    id="consignor_phone" class="form-control" readonly>
                                                            </td>

                                                            <td><label class="control-label ">TIN No.</label></td>
                                                            <td><input type="text" name="consignor_tinno"
                                                                    id="consignor_tinno" class="form-control" readonly>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td width="10%"> <label class="control-label">GST
                                                                    No.</label></td>
                                                            <td><input type="text" name="consignor_gstno"
                                                                    id="consignor_gstno" class="form-control" readonly>
                                                            </td>

                                                            <td width="10%"><label class="control-label">PAN No.</label>
                                                            </td>
                                                            <td colspan="2"><input type="text" name="consignor_panno"
                                                                    id="consignor_panno" class="form-control" readonly>
                                                            </td>
                                                            <!-- <td>&nbsp;</td> -->
                                                        </tr>
                                                    <br>
                                                    </table>
                                                    <br>
                                                </fieldset>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                <fieldset>
                                                    <legend>GR Details</legend>
                                                    <table width="100%">
                                                        <tr>
                                                            <td><label class="control-label">GR No.</label></td>
                                                            <td><input type="text" name="gr_no"
                                                                    onkeypress="return isNumber(event)" id="gr_no" value="<?php echo $gr_entry->sgr_id;?>" 
                                                                    style="font-weight:bold;" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Dated:</label></td>
                                                            <td><input type="text" name="data[gr_date]" id="gr_date" value="<?php echo convertToHumanDate($gr_entry->gr_date);?>"
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%"><label class="control-labe">Freight Status:</label>
                                                            </td>
                                                            <td><select class="form-control select2"
                                                                    name="data[gr_type]" class="" >
                                                                    <option value="">Select</option>
                                                                    <option value="TBB" <?= $gr_entry->gr_type == 'TBB' ? 'selected' : '' ?>>To Be Billed</option>
                                                                    <option value="To Pay" <?= $gr_entry->gr_type == 'To Pay' ? 'selected' : '' ?>>To Pay</option>
                                                                    <option value="Paid" <?= $gr_entry->gr_type == 'Paid' ? 'selected' : '' ?>>Paid</option>
                                                                    <option value="FOC" <?= $gr_entry->gr_type == 'FOC' ? 'selected' : '' ?>>FOC</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%"><label class="control-label">From
                                                                    Station</label>
                                                            </td>
                                                            <td><select class="form-control select2"
                                                                    name="data[from_station_fk]" id="from_station_fk"
                                                                    class="" 
                                                                    data-validation-required-message="Please select state">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($stations as $station) {
                                                                        echo '<option value="' . $station->station_id . '" ' . ($gr_entry->from_station_fk == $station->station_id ? 'selected' : '') . '>' . $station->station_name . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>

                                                            </td>
                                                            <td>
                                                                <button type="button" data-fancybox data-type="ajax"
                                                                    data-src="<?= $base_url ?>master/station/add_station_ajax/fs"
                                                                    class="btn btn-warning">
                                                                    <i class="fa fa-plus"></i> Add
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%"><label class="control-label">Destination</label></td>
                                                            <td> <select class="form-control select2"
                                                                    name="data[to_station_fk]" id="to_station_fk"
                                                                    class="" 
                                                                    data-validation-required-message="Please select state">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($stations as $station) {
                                                                        echo '<option value="' . $station->station_id . '" ' . ($gr_entry->to_station_fk == $station->station_id ? 'selected' : '') . '>' . $station->station_name . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <button type="button" data-fancybox data-type="ajax"
                                                                    data-src="<?= $base_url ?>master/station/add_station_ajax/ft"
                                                                    class="btn btn-warning">
                                                                    <i class="fa fa-plus"></i> Add
                                                                </button>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><label class="control-label">Vehicle No.</label></td>
                                                            <td><select class="form-control select2"
                                                                    name="data[vehicle_id_fk]" id="vehicle_id_fk"
                                                                    class="" 
                                                                    data-validation-required-message="Please select state">
                                                                    <option value="">Select</option>
                                                                    <?php foreach ($vehicles as $vehicle) { ?>
                                                                    <option value="<?= $vehicle->vehicle_id ?>" <?= $gr_entry->vehicle_id_fk == $vehicle->vehicle_id ? 'selected' : '' ?> >
                                                                        <?= $vehicle->fleet_no ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <button type="button" data-fancybox data-type="ajax"
                                                                    data-src="<?= $base_url ?>master/vehicle/add_vehicle_ajax"
                                                                    class="btn btn-warning">
                                                                    <i class="fa fa-plus"></i> Add
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                            </div>
                                        </div>

                                    </div>

                                    <fieldset>
                                                <legend>Freight Charges</legend>
                                                <table width="100%">
                                                    <tr>
                                                        <td>
                                                            <label class="control-label">SkyTech Freight:</label>
                                                            <input type="text" name="data[sky_freight]" value="<?php echo $gr_entry->sky_freight;?>" 
                                                                onkeypress="return isNumber(event)"
                                                                id="sky_freight" class="form-control">
                                                        </td>


                                                        <td>
                                                            <label class="control-label">SkyTech Driver Advance:</label>
                                                            <input type="text" name="data[sky_driver_adv]" value="<?php echo $gr_entry->sky_driver_adv;?>"
                                                                onkeypress="return isNumber(event)"
                                                                id="sky_driver_adv" class="form-control">
                                                        </td>

                                                        <td>
                                                            <label class="control-label">Vendor Vehicle Freight:</label>
                                                            <input type="text" name="data[sky_vendor_vechile_freight]" value="<?php echo $gr_entry->sky_vendor_vechile_freight;?>"
                                                                onkeypress="return isNumber(event)" id="sky_vendor_vechile_freight"
                                                                class="form-control">
                                                        </td>

                                                        <td>
                                                            <label class="control-label">Vendor Vehicle Advance:</label>
                                                            <input type="text" name="data[sky_vendor_vechile_adv]" value="<?php echo $gr_entry->sky_vendor_vechile_adv;?>"
                                                                onkeypress="return isNumber(event)"
                                                                id="sky_vendor_vechile_adv" class="form-control">
                                                        </td>

                                                        <td width="20%">
                                                            <label class="control-label">Remarks</label>
                                                            <input type="text" name="data[remarks]" value="<?php echo $gr_entry->remarks;?>"
                                                                id="remarks" class="form-control">
                                                        </td>

                                                    </tr>
                                                </table>
                                            </fieldset>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset>
                                                <legend>Vehicle Details</legend>

                                                <table width="100%">
                                                    <tr>
                                                        <td width="12%">
                                                            <label>Driver Name:</label><br>
                                                            <select class="form-control select2"
                                                                name="data[driver_id_fk]" id="driver_id_fk"
                                                                class="">
                                                                <option value="">Select</option>
                                                            <?php foreach ($drivers as $driver) { ?>
                                                                 <option value="<?= $driver->driver_id ?>" <?= $gr_entry->driver_id_fk == $driver->driver_id ? 'selected' : '' ?> >
                                                                    <?= $driver->name ?></option>
                                                                <?php } ?>
                                                            </select>

                                                        </td>
                                                        <td width="16%">
                                                            <label>Vendor Name:</label>
                                                            <br>
                                                            <select class="form-control select2"
                                                                name="data[broker_id_fk]" id="broker_id_fk" class=""
                                                                width="200px;" >
                                                                <option value="" width="200px;">Select</option>
                                                                <?php foreach ($brokers as $broker) { ?>
                                                                <option value="<?= $broker->broker_id ?>" <?= $gr_entry->broker_id_fk == $broker->broker_id ? 'selected' : '' ?> >
                                                                    <?= $broker->broker ?></option>
                                                                <?php } ?>
                                                            </select>

                                                        </td>
                                                        <td width="16%">
                                                            <label>Weight MT/KGS:</label>
                                                            <br>
                                                            <input type="text" name="data[sky_freight_weight]"
                                                                id="sky_freight_weight" value="<?= $gr_entry->sky_freight_weight;?>" class="form-control">                                                            
<!--                                                             <select class="form-control select2"
                                                                name="data[sky_freight_weight]"
                                                                id="sky_freight_weight" class=""
                                                                >
                                                                <option value="">Select</option>
                                                                <?php
                                                                //foreach ($freight_methods as $freight) {
                                                                   // echo '<option value="' . $freight->fm_id . '" ' . ($gr_entry->sky_freight_weight = $freight->fm_id ? 'selected' : '') . '>' . $freight->freight_method . '</option>';
                                                               // }
                                                                ?>
                                                            </select> -->
                                                        </td>                                       
                                                        <td width="16%">
                                                            <label>Staff Attendence Status:</label>
                                                            <br>
                                                            <select class="form-control select2"
                                                                name="data[staff_attendence]"
                                                                id="staff_attendence" class=""
                                                                >
                                                                <option value="">Select</option>
                                                                <option value="Yes" <?= $gr_entry->staff_attendence = "Yes" ? 'selected' : '' ?>>Yes</option>
                                                                <option value="No" <?= $gr_entry->staff_attendence = "No" ? 'selected' : '' ?>>No</option>
                                                            </select>
                                                        </td>
                                                            <td width="16%">
                                                            <label>POD Status:</label>
                                                            <br>
                                                            <select class="form-control select2"
                                                                name="data[pod_status]"
                                                                id="pod_status" class=""
                                                                >
                                                                <option value="">Select</option>
                                                                <option value="Pending" <?= $gr_entry->pod_status == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                                                <option value="Received" <?= $gr_entry->pod_status == 'Received' ? 'selected' : '' ?>>Received</option>
                                                            </select>
                                                            </td>
                                                            <td width="16%">
                                                            <label>Done Status:</label>
                                                            <br>
                                                            <select class="form-control select2"
                                                                name="data[don_status]"
                                                                id="don_status" class=""
                                                                >
                                                                <option value="">Select</option>
                                                                <option value="Yes" <?= $gr_entry->don_status == 'Yes' ? 'selected' : '' ?>>Yes</option>
                                                                <option value="No" <?= $gr_entry->don_status == 'No' ? 'selected' : '' ?>>No</option>
                                                            </select>

                                                        </td>
                                                    </tr>
                                                </table>

                                            </fieldset>
                               
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 text-center">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success" name="submit" value="Submit">
                                                Submit</button>
                                            <button type="submit" class="btn btn btn-info btn1" name="submit"
                                                value="Print"><i class="fa fa-print"></i> Print</button>
                                            <button type="button" class="btn btn-danger btn1 close-me"
                                                class="btn btn-info btn1"><i class="fa  fa-times"></i> Close</button>
                                        </div>
                                    </div>

                                </form>

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
            <script src="<?= $base_url ?>assets/plugins/areyousure/jquery.are-you-sure.js"></script>
            <script src="<?= $base_url ?>assets/plugins/areyousure/ays-beforeunload-shim.js"></script>
            <script src="<?= $base_url ?>assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript">
            </script>
            <!-- start - This is for export functionality only -->

            <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css"
                rel="stylesheet" type="text/css" />
            <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
            <!-- end - This is for export functionality only -->
            <script src="<?= $base_url ?>assets/plugins/jquery-validation/dist/jquery.validate.js"></script>
            <script>
            $("#form_validation").validate();
            $("#form_validation").areYouSure();
            $(".select2").select2();
            $('.singledate').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'dd-mm-yyyy',
            });



            $("#party_id_fk").change(function() {
                var party_id_fk = $(this).val();
                $.ajax({
                    url: '<?= $base_url ?>booking/get_party',
                    type: 'POST',
                    data: ({
                        party_id: party_id_fk
                    }),
                    success: function(response) {
                        var obj = jQuery.parseJSON(response);
                        $("#consignor_address").val(obj.address);
                        $("#consignor_phone").val(obj.mobile_no);
                        $("#consignor_tinno").val(obj.tin_no);
                        $("#consignor_gstno").val(obj.gst_no);
                        $("#consignor_panno").val(obj.pan_card_no);
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

            $("#freight_by").change(function() {
                var freight_by = $(this).val();
                if (freight_by == 'Third Party') {
                    $("#tpn").show();
                } else {
                    $("#tpn").hide();
                }
            });


            // Modified by Rakesh Dated 05-08-19
            $('#gr_no').change(function(e) {
                var grno = $(this).val();
                if (grno != '') {
                    $.ajax({
                        url: '<?= $base_url ?>booking/checkGR',
                        type: 'POST',
                        data: ({
                            gr_no: grno
                        }),
                        success: function(response) {
                            var obj = jQuery.parseJSON(response);
                            if (obj.status == 'fail') {
                                alertify.error(obj.status_message);

                                $('#gr_no').focus();
                                $('#gr_no').val("");
                            }
                        }
                    });
                }
                if (grno == '') {
                    $('#gr_no').focus();
                    $('#gr_no').val("");
                }
            });



$(document).ready(function(){
    
    $('#party_id_fk').change();
});



            // End
            </script>
</body>
</html>