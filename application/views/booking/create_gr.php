<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->config->item('title_prefix'); ?> : Booking GR</title>
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
                <!-- Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-primary">
                            <div class="card-header ">
                                <h4 class="m-b-0 text-white">Create GR</h4>
                            </div>
                            <div class="card-body">
                                <?php if (!empty($message)) { ?>
                                <div class="col-md-12">
                                    <div id="message" class="alert alert-danger">
                                        <button class="close" data-close="alert"></button>
                                        <span><?php echo $message; ?>112</span>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php if (!empty($success)) { ?>
                                <div class="col-md-12">
                                    <div id="message" class="alert alert-success">
                                        <button class="close" data-close="alert">111</button>
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
                                                    <legend>Consignor</legend>
                                                    <table width="100%">
                                                        <tr>
                                                            <td width="10%"><label
                                                                    class="control-label ">Consignor</label></td>
                                                            <td colspan="6">
                                                                <select name="data[consignor_id_fk]"
                                                                    id="consignor_id_fk" class="form-control select2"
                                                                    style="width: 100%" required>
                                                                    <option value="">Select</option>
                                                                    <?php foreach ($parties as $party) { ?>
                                                                    <option value="<?= $party->party_id ?>">
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
                                                    </table>
                                                </fieldset>
                                            </div>
                                            <div>
                                                <fieldset>
                                                    <legend>Consignee</legend>
                                                    <table width="100%">
                                                        <tr>
                                                            <td width="10%"><label
                                                                    class="control-label">Consignee</label></td>
                                                            <td colspan="6">
                                                                <select name="data[consignee_id_fk]"
                                                                    id="consignee_id_fk" class="form-control select2"
                                                                    style="width: 100%" required>
                                                                    <option value="">Select</option>
                                                                    <?php foreach ($parties as $party) { ?>
                                                                    <option value="<?= $party->party_id ?>">
                                                                        <?= $party->party_name ." -($party->city)" ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>

                                                            <td align="middle">
                                                                <button type="button" data-fancybox data-type="ajax"
                                                                    data-src="<?= $base_url ?>master/party/add_party_ajax/consignee"
                                                                    class="btn btn-warning">
                                                                    <i class="fa fa-plus"></i> Add
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="10%"> <label class="">Address</label></td>
                                                            <td colspan="4"><input type="text" name="consignee_address"
                                                                    id="consignee_address" class="form-control"
                                                                    readonly></td>
                                                        </tr>

                                                        <tr>
                                                            <td width="6%"> <label class="control-label ">Phone</label>
                                                            </td>
                                                            <td><input type="text" name="consignee_phone"
                                                                    onkeypress="return isNumber(event)"
                                                                    id="consignee_phone" class="form-control" readonly>
                                                            </td>

                                                            <td width="10%"><label class="control-label ">TIN
                                                                    No.</label></td>
                                                            <td><input type="text" name="consignee_tinno"
                                                                    id="consignee_tinno" class="form-control" readonly>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td width="10%"> <label class="control-label">GST
                                                                    No.</label></td>
                                                            <td><input type="text" name="consignee_gstno"
                                                                    id="consignee_gstno" class="form-control" readonly>
                                                            </td>

                                                            <td width="10%"><label class="control-label">PAN No.</label>
                                                            </td>
                                                            <td colspan="2"><input type="text" name="consignee_panno"
                                                                    id="consignee_panno" class="form-control" readonly>
                                                            </td>
                                                        </tr>
                                                    </table>
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
                                                                    onkeypress="return isNumber(event)" id="gr_no"
                                                                    style="font-weight:bold;" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">GR Date</label></td>
                                                            <td><input type="text" name="data[gr_date]" id="gr_date"
                                                                    class="form-control singledate" required></td>
                                                        </tr>
                                                        <tr>
                                                            <td width="30%"><label class="control-labe">GR Type</label>
                                                            </td>
                                                            <td><select class="form-control select2"
                                                                    name="data[gr_type]" class="" required>
                                                                    <option value="">Select</option>
                                                                    <option value="TBB">To Be Billed</option>
                                                                    <option value="To Pay">To Pay</option>
                                                                    <option value="Paid">Paid</option>
                                                                    <option value="FOC">FOC</option>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><label class="control-label">Branch</label></td>
                                                            <td><select class="form-control select2"
                                                                    name="data[branch_id_fk]" id="branch_id_fk" class=""
                                                                    required>
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($branches as $branch) {
                                                                        echo '<option value="' . $branch->branch_agent_id . '">' . $branch->branch_agent . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td width="30%"> <label
                                                                    class="control-label">Delivery</label></td>
                                                            <td><select class="form-control select2"
                                                                    name="data[delivery]" class="" required
                                                                    data-validation-required-message="Please select state">
                                                                    <option value="">Select</option>
                                                                    <option value="Door">Door</option>
                                                                    <option value="Go down">Go down</option>
                                                                    <option value="Party">Party</option>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><label class="control-label">Freight Pay By</label></td>
                                                            <td>
                                                                <select class="form-control select2"
                                                                    name="data[freight_by]" id="freight_by" class=""
                                                                    required>
                                                                    <option value="">Select</option>
                                                                    <option value="Consignor">Consignor</option>
                                                                    <option value="Consignee">Consignee</option>
                                                                    <option value="Third Party">Third Party</option>
                                                                </select>
                                                            </td>
                                                            <td><button type="button" data-fancybox data-type="ajax"
                                                                    data-src="<?= $base_url ?>master/party/add_party_ajax/thirdparty"
                                                                    class="btn btn-warning">
                                                                    <i class="fa fa-plus"></i> Add
                                                                </button>
                                                            </td>
                                                        </tr>

                                                        <tr style="display:none;" id="tpn">
                                                            <td><label class="control-label">Party Name</label></td>
                                                            <td colspan="2">
                                                                <select name="data[thirdparty_id_fk]"
                                                                    id="thirdparty_id_fk" class="form-control select2"
                                                                    style="width: 245px" required>
                                                                    <option value="">Select</option>
                                                                    <?php foreach ($parties as $party) { ?>
                                                                    <option value="<?= $party->party_id ?>">
                                                                        <?= $party->party_name." -($party->city)" ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                </select>

                                                                <!--<input type="text" name="data[third_party_name]" id="third_party_name" class="form-control"> -->
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td width="30%"><label class="control-label">From
                                                                    Station</label>
                                                            </td>
                                                            <td><select class="form-control select2"
                                                                    name="data[from_station_fk]" id="from_station_fk"
                                                                    class="" required
                                                                    data-validation-required-message="Please select state">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($stations as $station) {
                                                                        echo '<option value="' . $station->station_id . '">' . $station->station_name . '</option>';
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
                                                            <td width="30%"><label class="control-label">To
                                                                    Station</label></td>
                                                            <td> <select class="form-control select2"
                                                                    name="data[to_station_fk]" id="to_station_fk"
                                                                    class="" required
                                                                    data-validation-required-message="Please select state">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($stations as $station) {
                                                                        echo '<option value="' . $station->station_id . '">' . $station->station_name . '</option>';
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
                                                                    class="" required
                                                                    data-validation-required-message="Please select state">
                                                                    <option value="">Select</option>
                                                                    <?php foreach ($vehicles as $vehicle) { ?>
                                                                    <option value="<?= $vehicle->vehicle_id ?>">
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

                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset>
                                                <legend>Invoice Details</legend>

                                                <table width="100%">
                                                    <tr>


                                                        <td>
                                                            <label class="control-label">Invoice No.</label>
                                                            <input type="text" name="data[invoice_no]" id="invoice_no"
                                                                class="form-control" required>
                                                        </td>

                                                        <td>
                                                            <label class="control-label">Invoice Date</label>
                                                            <input type="text" name="data[invoice_date]"
                                                                id="invoice_date" class="form-control singledate"
                                                                required>
                                                        </td>

                                                        <td>
                                                            <label class="control-label">Invoice Value </label>
                                                            <input type="text" name="data[invoice_value]"
                                                                onkeypress="return isNumber(event)" id="invoice_value"
                                                                class="form-control" required>

                                                        </td>

                                                        <td>
                                                            <label class="control-label">Container Number </label>
                                                            <input type="text" name="data[container_number]"
                                                                id="container_number" class="form-control">
                                                        </td>
                                                        <!-- Hide This td Delivery Mode -->
                                                        <!-- <td>
                                                                    <label>Delivery Mode</label>
                                                                    <select class="form-control select2" name="data[delivery_mode_fk]" id="item_ft_method" class="">
                                                                        <option value="">Select</option>
                                                                        <?php/*
                                                                        foreach ($delivery_modes as $delivery_mode) {
                                                                            echo '<option value="' . $delivery_mode->fm_id . '">' . $delivery_mode->freight_method . '</option>';
                                                                        }*/
                                                                        ?>    
                                                                    </select>
                                                                </td> -->
                                                        <!-- Till here -->

                                                        <td>
                                                            <label>E-Way Bill No.</label>
                                                            <input type="text" name="data[e_way_bill_no]"
                                                                id="e_way_bill_no" class="form-control">
                                                        </td>

                                                        <td>
                                                            <label>E-Way Bill Date</label>
                                                            <input type="text" name="data[e_way_bill_date]"
                                                                id="e_way_bill_date" class="form-control singledate">
                                                        </td>
                                                        <td width="12%">
                                                            <label>Driver Name:</label><br>
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
                                                        <td width="16%">
                                                            <label>Broker</label>
                                                            <br>
                                                            <select class="form-control select2"
                                                                name="data[broker_id_fk]" id="broker_id_fk" class=""
                                                                width="200px;" required>
                                                                <option value="" width="200px;">Select</option>
                                                                <?php foreach ($brokers as $broker) { ?>
                                                                <option value="<?= $broker->broker_id ?>">
                                                                    <?= $broker->broker ?></option>
                                                                <?php } ?>
                                                            </select>

                                                        </td>
                                                        <td width="5%">
                                                            <button type="button" data-fancybox data-type="ajax"
                                                                data-src="<?= $base_url ?>master/broker/add_broker_ajax"
                                                                class="btn btn-warning"
                                                                style="margin-bottom: -27px; margin-right: 1px;">
                                                                <i class="fa fa-plus"></i> Add
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </fieldset>
                                            <fieldset>
                                                <legend>Item Details</legend>
                                                <table width="100%" border="0" id="myTable">
                                                    <tr>
                                                        <th>#</th>
                                                        <th><label>Ft Method</label></th>
                                                        <th><label>Item</label></th>
                                                        <th><label>Method of Pack</label></th>
                                                        <th><label>Qty</label></th>
                                                        <th><label>Weight (Kg)</label></th>
                                                        <th><label>WT Charges/Kg</label></th>
                                                        <th>
                                                            <button type="button" data-fancybox data-type="ajax"
                                                                data-src="<?= $base_url ?>master/item/add_item_ajax"
                                                                class="btn btn-warning" style="margin-left:2px;"><i
                                                                    class="fa fa-plus"></i>Add Items</button>
                                                        </th>
                                                    </tr>
                                                    <?php
    $sn = 1;
    ?>
                                                    <tr id="rowid<?= $sn ?>">
                                                        <td width="3%">1.</td>
                                                        <td width="10%">
                                                            <select class="form-control select2 item_ft_method"
                                                                name="data_gr[item_ft_method][<?= $sn ?>]"
                                                                id="item_ft_method_<?= $sn ?>" required
                                                                data-validation-required-message="Please select state">
                                                                <option value="">Select</option>
                                                                <?php
                    foreach ($freight_methods as $freight_method) {
                        echo '<option value="' . $freight_method->fm_id . '">' . $freight_method->freight_method . '</option>';
                    }
                    ?>
                                                            </select>
                                                        </td>
                                                        <td width="30%">
                                                            <select class="form-control select2 item_ids"
                                                                name="data_gr[item_name_fk][<?= $sn ?>]"
                                                                id="item_name_fk_<?= $sn ?>" class="" required>
                                                                <option value="">Select</option>
                                                                <?php
                foreach ($items as $item) {
                    echo '<option value="' . $item->item_id . '">' . $item->item_name . '</option>';
                }
                ?>
                                                            </select>
                                                        </td>
                                                        <td width="18%">
                                                            <select class="form-control select2"
                                                                name="data_gr[item_method_of_pack_fk][<?= $sn ?>]"
                                                                id="item_method_of_pack_fk_<?= $sn ?>" class=""
                                                                required>
                                                                <option value="">Select</option>
                                                                <?php
                foreach ($packages as $package) {
                    echo '<option value="' . $package->package_id . '">' . $package->package . '</option>';
                }
                ?>
                                                            </select>
                                                        </td>
                                                        <td width="7%">
                                                            <input type="text" name="data_gr[item_qty][<?= $sn ?>]"
                                                                onkeypress="return isNumber(event)"
                                                                id="item_qty_<?= $sn ?>" class="form-control">
                                                        </td>



                                                        <td>
                                                            <input type="text" name="data_gr[item_weight][<?= $sn ?>]"
                                                                id="item_weight_<?= $sn ?>" class="form-control">
                                                        </td>

                                                        <td>
                                                            <input type="text"
                                                                name="data_gr[item_weight_ch][<?= $sn ?>]"
                                                                id="item_weight_ch_<?= $sn ?>" class="form-control">

                                                        </td>
                                                        <td>
                                                            <button type="button"
                                                                class="btn btn-primary btn-round btn-simple hidden-sm-down add_field_button"><i
                                                                    class="fa fa-plus"></i> New Row</button>
                                                        </td>

                                                    </tr>
                                                </table>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Freight Charges</legend>
                                                <table width="100%">
                                                    <tr>
                                                        <td>
                                                            <label>Freight Rate</label>
                                                            <input type="text" name="data[item_booking_freight_rate]"
                                                                onkeypress="return isNumber(event)"
                                                                id="item_booking_freight_rate" style="font-weight:bold;"
                                                                class="form-control">
                                                        </td>
                                                        <td>
                                                            <label class="control-label">Stationary Ch.</label>
                                                            <input type="text" name="data[item_stationary_ch]"
                                                                onkeypress="return isNumber(event)"
                                                                id="item_stationary_ch" class="form-control">
                                                        </td>
                                                        <td>
                                                            <label class="control-label">Loading Ch.</label>
                                                            <input type="text" name="data[item_loading_ch]"
                                                                onkeypress="return isNumber(event)" id="item_loading_ch"
                                                                class="form-control">
                                                        </td>

                                                        <td>
                                                            <label class="control-label">Unloading Ch.</label>
                                                            <input type="text" name="data[item_unloading_charges]"
                                                                onkeypress="return isNumber(event)"
                                                                id="item_unloading_charges" class="form-control">
                                                        </td>

                                                        <td>
                                                            <label class="control-label">Detention Ch.</label>
                                                            <input type="text" name="data[item_detention_ch]"
                                                                onkeypress="return isNumber(event)"
                                                                id="item_detention_ch" class="form-control">
                                                        </td>
                                                        
                                                        <!-- Modified by MKUK -->
                                                        <td>
                                                            <label class="control-label">Green Tax</label>
                                                            <input type="text" name="data[other_ch]"
                                                                onkeypress="return isNumber(event)"
                                                                id="other_ch" class="form-control">
                                                        </td>
                                                        


                                                        <td>
                                                            <label class="control-label">POD Ch.</label>
                                                            <input type="text" name="data[item_crossing_ch]"
                                                                onkeypress="return isNumber(event)"
                                                                id="item_crossing_ch" class="form-control">
                                                        </td>


                                                        <td width="25%">
                                                            <label class="control-label">Remarks</label>
                                                            <input type="text" name="data[item_remarks]"
                                                                id="item_remarks" class="form-control">
                                                        </td>

                                                        
                                                    </tr>
                                                </table>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Summary</legend>
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <label>Freight Rate</label>
                                                            <input type="text" name="data[s_freight]"
                                                                onkeypress="return isNumber(event)" value="0"
                                                                id="s_freight" class="form-control" readonly>
                                                        </td>

                                                        <td>
                                                            <label>Stationary Ch.</label>
                                                            <input type="text" name="data[s_stationary_charges]"
                                                                onkeypress="return isNumber(event)" value="0"
                                                                id="s_stationary_charges" class="form-control" readonly>
                                                        </td>

                                                        <td>
                                                            <label>Crossing Ch.</label>
                                                            <input type="text" name="data[s_crossing_charges]"
                                                                onkeypress="return isNumber(event)" value="0"
                                                                id="s_crossing_charges" class="form-control" readonly>
                                                        </td>

                                                        <td>
                                                            <label>Loading Ch.</label>
                                                            <input type="text" name="data[s_loading_ch]"
                                                                onkeypress="return isNumber(event)" value="0"
                                                                id="s_loading_ch" class="form-control" readonly>
                                                        </td>

                                                        <td>
                                                            <label>Unloading Ch.</label>
                                                            <input type="text" name="data[s_unloading_charges]"
                                                                onkeypress="return isNumber(event)" value="0"
                                                                id="s_unloading_charges" class="form-control" readonly>
                                                        </td>

                                                        <td>
                                                            <label>Halting Ch.</label>
                                                            <input type="text" name="data[s_crossing_charges]"
                                                                onkeypress="return isNumber(event)" value="0"
                                                                id="s_detention_charges" class="form-control" readonly>
                                                        </td>

                                                        <td>
                                                            <label>Labour Ch.</label>
                                                            <input type="text" name="data[s_other_ch]"
                                                                onkeypress="return isNumber(event)" value="0"
                                                                id="s_other_ch" class="form-control" readonly>
                                                        </td>

                                                        <td>
                                                            <label>Total Freight</label>
                                                            <input type="text" name="data[s_total_freight]"
                                                                onkeypress="return isNumber(event)" value="0"
                                                                id="s_total_freight" class="form-control"
                                                                style="font-weight:bold;" readonly>
                                                        </td>


                                                        <!-- <td width="12%">
                                                                    <label>Payment Mode</label><br>
                                                                    <select class="form-control select2" name="data[payment_mode]" id="payment_mode" class="" >
                                                                        <option value="" selected>Select</option>
                                                                        <option value="CHEQUE">CHEQUE</option>
                                                                        <option value="DD">DD</option>
                                                                        <option value="NEFT/RTGS">NEFT/RTGS</option>
                                                                    </select>       
                                                                </td>

                                                                <td width="16%">
                                                                    <label>Check/DD/NEFT/RTGS No.</label><br>
                                                                    <input type="text" name="data[check_dd_neft_no]" id="check_dd_neft_no" class="form-control" readonly>
                                                                </td>

                                                                <td width="10%">
                                                                    <label>Payment Date</label><br>
                                                                    <input type="text" name="data[payment_date]" id="payment_date" class="form-control singledate"  readonly>
                                                                </td> -->

                                                    </tr>

                                                    <!-- <tr>
                                                                

                                                                <td>
                                                                    <div class="form-group">
                                                                        <h5>&nbsp;</h5>
                                                                        <div class="controls">
                                                                            <label class="custom-control custom-checkbox">
                                                                                <input type="checkbox" value="Y" name="data[cancelled_gr]" class="custom-control-input" aria-invalid="false"> 
                                                                                <span class="custom-control-label">Check to Cancel GR</span></label>
                                                                            <div class="help-block"></div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                            </tr> -->

                                                </table>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 text-center">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success" name="submit" value="Submit">
                                                Submit</button>
                                            <!--<button type="submit" class="btn btn btn-info btn1" name="submit"
                                                value="Print"><i class="fa fa-print"></i> Print</button>-->
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

            $("#consignor_id_fk").change(function() {
                var consignor_id_fk = $(this).val();
                $.ajax({
                    url: '<?= $base_url ?>booking/get_party',
                    type: 'POST',
                    data: ({
                        party_id: consignor_id_fk
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

            $("#item_booking_freight_rate").change(function() {
                $("#s_freight").val($(this).val());
                calTotalFreight();
            });
            $("#item_stationary_ch").change(function() {
                $("#s_stationary_charges").val($(this).val());
                calTotalFreight();
            });
            $("#item_crossing_ch").change(function() {
                $("#s_crossing_charges").val($(this).val());
                calTotalFreight();
            });

            $("#item_loading_ch").change(function() {
                $("#s_loading_ch").val($(this).val());
                calTotalFreight();
            });
            $("#item_unloading_charges").change(function() {
                $("#s_unloading_charges").val($(this).val());
                calTotalFreight();
            });
            // Modified by Rakesh Dated 30/07/19
            $("#item_detention_ch").change(function() {
                $("#s_detention_charges").val($(this).val());
                calTotalFreight();
            });
            $("#other_ch").change(function() {
                $("#s_other_ch").val($(this).val());
                calTotalFreight();
            });
            
            // End

            function calTotalFreight() {
                var s_other_ch = parseInt($("#s_other_ch").val()) || 0; 
                var s_freight = parseInt($("#s_freight").val()) || 0;
                var s_stationary_charges = parseInt($("#s_stationary_charges").val()) || 0;
                var s_loading_ch = parseInt($("#s_loading_ch").val()) || 0;
                var s_unloading_charges = parseInt($("#s_unloading_charges").val()) || 0;
                var item_detention_ch = parseInt($("#item_detention_ch").val()) || 0;
                var s_crossing_charges = parseInt($("#s_crossing_charges").val()) || 0;
                var s_total_freight = s_freight + s_stationary_charges + s_loading_ch + s_unloading_charges +
                    item_detention_ch + s_crossing_charges + s_other_ch;
                $("#s_total_freight").val(s_total_freight);
            }

            $("#consignee_id_fk").change(function() {
                var consignee_id_fk = $(this).val();
                $.ajax({
                    url: '<?= $base_url ?>booking/get_party',
                    type: 'POST',
                    data: ({
                        party_id: consignee_id_fk
                    }),
                    success: function(response) {
                        var obj = jQuery.parseJSON(response);
                        $("#consignee_address").val(obj.address);
                        $("#consignee_phone").val(obj.mobile_no);
                        $("#consignee_tinno").val(obj.tin_no);
                        $("#consignee_gstno").val(obj.gst_no);
                        $("#consignee_panno").val(obj.pan_card_no);
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







            // End
            </script>

            <!-- Modified by Rakesh Dated 08-08-19 -->
            <script type="text/javascript">
            var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = <?= $sn ?> ; //initlal text box count
            var item_list = '';
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    var rowInd = $('#myTable >tbody >tr').length;
                    var myrow = '<tr id="rowid' + x + '">' +
                        '<td>' + rowInd + '</td><input type="hidden" name="noR" value="' + rowInd + '">' +
                        '<td><select class="form-control select2 item_ft_method" name="data_gr[item_ft_method][' +
                        x + ']" id="item_ft_method_' + x +
                        '" class="" required><option value="">Select</option><?php
                    foreach($freight_methods as $freight_method) {
                            echo '<option value="'.$freight_method -> fm_id.
                            '">'.$freight_method -> freight_method.
                            '</option>';
                        } ?> < /select></td > '

                        +
                        '<td><select class="form-control select2 item_ids" name="data_gr[item_name_fk][' + x +
                        ']" id="item_name_fk_' + x + '" class="" required><option value="">Select</option><?php
                    foreach($items as $item) {
                            echo '<option value="'.$item -> item_id.
                            '">'.$item -> item_name.
                            '</option>';
                        } ?> < /select></td > '

                        +
                        '<td><input type="text" name="data_gr[item_qty][' + x +
                        ']" onkeypress="return isNumber(event)"  id="item_qty_' + x +
                        '" class="form-control"></td>'

                        +
                        '<td><select class="form-control select2" name="data_gr[item_method_of_pack_fk][' + x +
                        ']" id="item_method_of_pack_fk_' + x +
                        '" class="" required><option value="">Select</option><?php
                    foreach($packages as $package) {
                        echo '<option value="'.$package -> package_id.
                        '">'.$package -> package.
                        '</option>';
                    } ?> < /select></td > ' +
                    '<td><input type="text" name="data_gr[item_weight][' + x +
                        ']" onkeypress="return isNumber(event)"  id="item_weight_' + x +
                        '" class="form-control"></td>' +
                        '<td><input type="text" name="data_gr[item_weight_ch][' + x +
                        ']" onkeypress="return isNumber(event)"  id="item_weight_ch_' + x +
                        '" class="form-control"></td>' +
                        '<td><span class="badge badge-danger trash-me" onclick="removeitem(' + x +
                        ')">Remove</span></td>';
                    $('#myTable > tbody:last-child').append(myrow);
                } else {
                    alertify.error("Only Ten " + max_fields + " Items are allowed on a single GR");
                }
            });

            function removeitem(x) {
                $("#rowid" + x).remove();
                var i = 0;
                $("#myTable tr").each(function() {
                    $(this).find("td:first").text(i);
                    i++;
                });
            }

            <?php
            $ftm = '';
            if ($ftm = '') {
                $ftm = $freight_methods;
            } ?>
            $('.item_ft_method').change(function(e) {
                var valCkh = $(this).val();
                valCkh = $('.item_ft_method option[value="' + valCkh + '"]').text();
                if (valCkh == "FIXED" || valCkh == "FTL") {
                    $('#item_weight_ch_1').val(valCkh);
                    $('#item_weight_1').val(valCkh);
                    $('#item_weight_1').attr('readonly', true);
                    $('#item_weight_ch_1').attr('readonly', true);
                    $('.add_field_button').attr("disabled", true);
                } else {
                    $('#item_weight_ch_1').val('');
                    $('#item_weight_1').val('');
                    $('#item_weight_1').removeAttr('readonly');
                    $('#item_weight_ch_1').removeAttr('readonly');
                    $('.add_field_button').removeAttr('disabled');
                }
            });

            $('#item_weight_1').change(function() {
                var valiw = parseFloat($('#item_weight_1').val());
                var valic = parseFloat($('#item_weight_ch_1').val());
                $('#item_booking_freight_rate').val(valiw * valic);
                $("#s_freight").val(valiw * valic);
            });

            $('#item_weight_ch_1').change(function() {
                var valiw = parseFloat($('#item_weight_1').val());
                var valic = parseFloat($('#item_weight_ch_1').val());
                $('#item_booking_freight_rate').val(valiw * valic);
                $("#s_freight").val(valiw * valic);
            });

            $(document).ready(function() {
                //    calTotalFreight();
            });
            </script>
            <!-- End -->

</body>

</html>