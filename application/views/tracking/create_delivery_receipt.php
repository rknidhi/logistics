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
                                        <button class="close" data-close="alert">ssss</button>
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
                                                        <td><label>DR Number: </label></td>
                                                        <td><input type="text" name="delevery_no"
                                                                onkeypress="return isNumber(event)" id="delevery_no"
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
                                                    </tr>
                                                </table>
                                            </fieldset>

                                            <fieldset>
                                                <legend>Add Challan</legend>
                                                <table width="100%">
                                                    <tr>
                                                        <td><label class="control-label">Select Challan No. :
                                                            </label></td>
                                                        <td>
                                                        <select class="form-control select2" name="data[lhc_number]" id="lhc_number" required>
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($dispatch_challans as $challan_dispatch) {
                                                                        echo '<option value="' . $challan_dispatch->cdispatch_id . '" >' . $challan_dispatch->lhc_number . '</option>';
                                                                    }
                                                                    ?>    
                                                                </select>                                                         
                                                        </td>
                                                        <td><label class="control-label">Challan Date :
                                                            </label></td>
                                                        <td><input type="text"
                                                                id="challan_date" class="form-control" readonly></td>
                                                        <td><label class="control-label">Remarks : </label></td>
                                                        <td width="20%"><input type="text" name="data[remark]"
                                                                id="remark" class="form-control"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Vehicle No. :</label></td>
                                                        <td><input type="hidden" name="data[vehicle_id_fk]" id="vehicle_id_fk" class="form-control">
                                                        <input type="text" id="vehicle_no" class="form-control" readonly>
                                                    </td>

                                                        <td><label class="">From Station :</label></td>
                                                        <td><input type="text" name="data[from_station]"
                                                                id="from_station" class="form-control" required
                                                                readonly></td>

                                                        <td><label>To Station : </label></td>
                                                        <td><input type="text" name="data[to_station]" id="to_station"
                                                                class="form-control" required readonly></td>
                                                    </tr>
                                                </table>
                                                <fieldset style="background:white;">
                                                    <legend>GR Details</legend>
                                                    <div class="table-responsive trackTable">
                                                        <table width="100%"
                                                            class="table  table-striped table-bordered" id="myTable">
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
        $('#lhc_number').change(function(e) {
        var lhc_number = $(this).val();
        $.ajax({
                url: '<?= $base_url ?>delivery/fetch_lhc_gr_details',
                type: 'POST',
                data: ({lhcno: lhc_number}),
                success: function (response) {
                    var obj = jQuery.parseJSON(response);
                    console.log(obj);
                    $("#myTable > tbody").empty();
                    $('#myTable > tbody').append(obj.grdetails);
                    $('#challan_date').val(obj.lhc_added_on);
                    $('#from_station').val(obj.station_from);
                    $('#to_station').val(obj.station_to);
                    $('#vehicle_no').val(obj.vechile);
                    $('#vehicle_id_fk').val(obj.lhc_details.vehicle_id_fk);
                    }
                });
        }); 

            // Modified by Rakesh Dated 05-08-19
            $('#delevery_no').change(function(e) {
                var drno = $(this).val();
                if (drno != '') {
                    $.ajax({
                        url: '<?= $base_url ?>delivery/checkDR',
                        type: 'POST',
                        data: ({
                            delevery_no: drno
                        }),
                        success: function(response) {
                            var obj = jQuery.parseJSON(response);
                            if (obj.status == 'fail') {
                                alertify.error(obj.status_message);
                                $('#delevery_no').focus();
                                $('#delevery_no').val("");
                            }
                        }
                    });
                }
                if (grno == '') {
                    $('#delevery_no').focus();
                    $('#delevery_no').val("");
                }
            });

        // End
        </script>
</body>

</html>