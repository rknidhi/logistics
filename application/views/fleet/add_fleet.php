<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->config->item('title_prefix'); ?> : Add Fleet</title>
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
    select.select2{
            width: 100%;
        }
        .download i{
            color: purple;
        }
        .view i{
            color: blue;
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
                                <h4 class="m-b-0 text-white">Add Fleet</h4>
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

                                <form class="m-t-10" id="form_validation" novalidate action="" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <?php
                                      $fleet_id = genrateId('tbl_master_vehicle');  
                                    ?>
                                    <legend>Truck Details</legend>    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-2">

                                                    <table width="100%">
                                                        <tr>
                                                            <td><label class="control-label">Fleet ID: </label></td>
                                                            <td><input type="text" name="fleet_id_desc" value="<?php echo $fleet_id;?>" readonly
                                                                    style="font-weight:bold;" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Maker Name:</label></td>
                                                            <td><input type="text" name="maker_name"
                                                                    class="form-control" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Chassis No.</label></td>
                                                            <td><input type="text" name="chasis_no"
                                                                    class="form-control" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Purchase Date:</label></td>
                                                            <td><input type="text" name="puchase_date"
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td><label class="control-label">Rod Tax Date:</label></td>
                                                            <td><input type="text" name="tax_date" 
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td><label class="control-label">Challan Due Date:</label></td>
                                                            <td><input type="text" name="challan_due_date" 
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Fitness Due Date:</label></td>
                                                            <td><input type="text" name="fitness_due_date" 
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        
                                                    </table>   
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                
                                                    <table width="100%">
                                                        <tr>
                                                            <td><label class="control-label">Fleet No.</label></td>
                                                            <td><input type="text" name="fleet_no" 
                                                                    style="font-weight:bold;" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Owner Name:</label></td>
                                                            <td><input type="text" name="owner_name" 
                                                                    class="form-control" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Engine No.</label></td>
                                                            <td><input type="text" name="engine_no" 
                                                                    class="form-control" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Permit No. (1 Year)</label></td>
                                                            <td><input type="text" name="permit_valid_yr" 
                                                                    class="form-control" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Permit Due Date (1 Year)</label></td>
                                                            <td><input type="text" name="permit_due_yr" 
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Pollution Due Date:</label></td>
                                                            <td><input type="text" name="pollution_due_date" 
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">EMI Due Date:</label></td>
                                                            <td><input type="text" name="emi_due_date" 
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        
                                                    </table>
                                               
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                              
                                                    <table width="100%">
                                                        <tr>
                                                            <td><label class="control-labe">Fleet Type</label>
                                                            </td>
                                                            <td>
                                                                <select class="form-control select2"
                                                                    name="fleet_type" class="" >
                                                                    <option value="">Select Model</option>
                                                                    <option value="6 Tyre">6 Tyre</option>
                                                                    <option value="10 Tyre">10 Tyre</option>
                                                                    <option value="14 Tyre">14 Tyre</option>
                                                                    <option value="16 Tyre">16 Tyre</option>
                                                                    <option value="etc">etc</option>
                                                                </select>
                                                                <!--<div class="controls">
                                                                    <select class="form-control select2" name="data[vehicle_type]" class="">
                                                                        <option value="">Select</option>
                                                                        <?php
                                                                            foreach ($this->config->item('vehicle_type_new') as $vtype) {
                                                                                echo '<option value="' . $vtype . '">' . $vtype . '</option>';
                                                                            }
                                                                        ?>   
                                                                    </select>
                                                                </div>-->
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-labe">Driver Name:</label>
                                                            </td>
                                                            <td><select class="form-control select2"
                                                                    name="driver_id_fk" class="" >
                                                            <option value="">Select</option>
                                                            <?php foreach ($drivers as $driver) { ?>
                                                                 <option value="<?= $driver->driver_id; ?>">
                                                                    <?= $driver->name; ?></option>
                                                                <?php } ?>                                                                    
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Policy No.</label></td>
                                                            <td><input type="text" name="policy_no" 
                                                                    class="form-control" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Permit No. (5 Year):</label></td>
                                                            <td><input type="text" name="permit_no_for_yr" 
                                                                    style="font-weight:bold;" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Permit Due Date (5 Year)</label></td>
                                                            <td><input type="text" name="permit_due_for_yr" 
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td><label class="control-label">Insurance Due Date:</label></td>
                                                            <td><input type="text" name="insurence_due_date" 
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">City</label></td>
                                                            <td><input type="text" name="city" 
                                                                    class="form-control" ></td>
                                                        </tr>
                                                       
                                                    </table>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                    <div class="form-group col-md-12 text-center">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success" name="submit" value="Submit">
                                                Submit</button>
                                            
                                            <button type="button" class="btn btn-danger btn1 close-me"
                                                class="btn btn-info btn1"><i class="fa  fa-times"></i> Close</button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset>
                                                <legend>List of Documents</legend>
                                                <br>
                                                <table>
                                                    
                                                    <tr>
                                                        <td><label class="control-label">Upload Documents</label></td>
                                                        <td>
                                                            <input type="file" name="files[]" multiple
                                                                class="form-control" >
                                                        </td> 
                                                        <td>
                                                        <button type="submit" class="btn btn-warning" name="submit" value="Submit">Upload</button>
                                                        </td> 
                                                    </tr>
                                                </table>
                                                <hr>
                                                <table width="100%">
                                                    <tr>
                                                        <td>
                                                            1. Document name display here 
                                                        </td>
                                                        <td>
                                                            <a class="edit" href="#"> <i class="fa fa-pencil-alt"></i></a> <a class="view" href="#"> <i class="fa fa-eye"></i></a> <a class="download" href="#"><i class="fa fa-download"></i></a>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <br>
                                            </fieldset>
                                            
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