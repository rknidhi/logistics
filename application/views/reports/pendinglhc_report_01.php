<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Booking Report</title>
        <?php $this->load->view('includes/head'); ?> 
        <link href="<?= $base_url ?>assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="<?= $base_url ?>assets/css/form-css.css" rel="stylesheet" type="text/css" />
        <style>
            .container-fluid{max-width: inherit;}
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
                    <!-- ============================================================== -->
                    <!-- Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- End Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <!-- Row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header card-header-primary card-header-icon">
                                    <h4 class="card-title">Pending LHC Reports</h4>
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

                                    <form id="form_validation" novalidate action="" method="POST">
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <legend>Filter Records</legend>
                                                <table width="100%">
                                                    <tr>
                                                        <td width="15%">
                                                            <label class="control-label">Date From</label>
                                                            <input type="text" name="from_date"value="<?= $this->input->post('from_date') ?>" class="form-control singledate" required>
                                                        </td>
                                                        <td width="15%">
                                                            <label class="control-label">To</label>
                                                            <input type="text" name="to_date" value="<?= $this->input->post('to_date') ?>" class="form-control singledate" required>
                                                        </td>
                                                        <td width="15%">
                                                            <label class="control-label">Station From</label>
                                                            <select class="form-control select2" name="from_station_fk" id="from_station_fk" required>
                                                                <option value="">Select</option>
                                                                <?php
                                                                foreach ($stations as $station) {
                                                                    echo '<option value="' . $station->station_id . '" ' . ($station->station_id == $this->input->post('from_station_fk') ? 'selected' : '') . '>' . $station->station_name . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <!--<td width="10%">
                                                            <label class="control-label">GR No From</label>
                                                            <input type="text" name="gr_from"  value="<?//= $this->input->post('gr_from') ?>" class="form-control " required>
                                                        </td> 
                                                        <td width="10%">
                                                            <label class="control-label">To</label>
                                                            <input type="text" name="gr_to" value="<?//= $this->input->post('gr_to') ?>"  class="form-control" required>
                                                        </td> -->
                                                        <td width="15%">
                                                            <label class="control-label">Consignor</label>
                                                            <select name="consignor_id_fk" id="consignor_id_fk" class="form-control select2" style="width: 100%" required>
                                                                <option value="">Select</option>
                                                                <?php foreach ($parties as $party) { ?>    
                                                                    <option value="<?= $party->party_id ?>" <?= ($party->party_id == $this->input->post('consignor_id_fk') ? 'selected' : '') ?>><?= $party->party_name ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>

                                                        <td width="15%">
                                                            <label class="control-label">Consignee</label>
                                                            <select name="consignee_id_fk" id="consignee_id_fk" class="form-control select2" style="width: 100%" required>
                                                                <option value="">Select</option>
                                                                <?php foreach ($parties as $party) { ?>    
                                                                    <option value="<?= $party->party_id ?>" <?= ($party->party_id == $this->input->post('consignee_id_fk') ? 'selected' : '') ?>><?= $party->party_name ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </td>

                                                    </tr>

                                                    <tr>


                                                        <td>
                                                            <label class="control-label">Item</label>
                                                            <select class="form-control select2" name="item_name_fk" id="item_name_fk" required data-validation-required-message="Please select state">
                                                                <option value="">Select</option>
                                                                <?php
                                                                foreach ($items as $item) {
                                                                    echo '<option value="' . $item->item_id . '" ' . ($item->item_id == $this->input->post('item_name_fk') ? 'selected' : '') . '>' . $item->item_name . '</option>';
                                                                }
                                                                ?>    
                                                            </select>
                                                        </td>
                                                      <!--  <td>
                                                            <label class="control-label">Remarks</label>
                                                            <input type="text" name="item_remarks" value=" --><?php // $this->input->post('item_remarks'); ?><!--"  id="item_remarks" class="form-control" required>
                                                        </td> -->

                                                        <td>
                                                            <label class="control-label">Vehicle</label>
                                                            <select class="form-control select2" name="vehicle_id_fk" id="vehicle_id_fk" required>
                                                                <option value="">Select</option>
                                                                <?php
                                                                foreach ($vehicles as $vehicle) {
                                                                    echo '<option value="' . $vehicle->vehicle_id . '" ' . ($vehicle->vehicle_id == $this->input->post('vehicle_id_fk') ? 'selected' : '') . '>' . $vehicle->registration_no . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <label class="control-label">GR Type</label>
                                                            <select class="form-control select2" name="gr_type" id="gr_type" required>
                                                                <option value="">Select</option>
                                                                <option value="TBB" <?= $this->input->post('gr_type') == 'TBB' ? 'selected' : '' ?>>TBB</option>
                                                                <option value="To Pay" <?= $this->input->post('gr_type') == 'To Pay' ? 'selected' : '' ?>>To Pay</option>
                                                                <option value="Paid" <?= $this->input->post('gr_type') == 'Paid' ? 'selected' : '' ?>>Paid</option>
                                                                <option value="FOC" <?= $this->input->post('gr_type') == 'FOC' ? 'selected' : '' ?>>FOC</option>

                                                            </select>
                                                        </td>
                                                        <td colspan="2">
                                                            <label class="control-label">Branch</label>
                                                            <select class="form-control select2" name="branch_id_fk" id="branch_id_fk" required>
                                                                <option value="">Select</option>
                                                                <?php
                                                                foreach ($branches as $branch) {
                                                                    echo '<option value="' . $branch->branch_agent_id . '" ' . ($branch->branch_agent_id == $this->input->post('branch_id_fk') ? 'selected' : '') . '>' . $branch->branch_agent . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <br/>
                                                            <button type="submit" class="btn btn-success btn1" name="submit" value="Submit"> Get Details</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                                
                                            </fieldset>
                                        </div>
                                    </form>

                                    <?php if ($display): ?>
                                        <div>
                                            <table id="example23" class="display table table-hover table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>GR Number</th>
                                                        <th>Date</th>
                                                        <th>From (Station)</th>
                                                        <th>To (Station)</th>
                                                        <th>Consigner</th>
                                                        <th>Consignee</th>
                                                        <th>Item</th>
                                                        <th>Quantity</th>
                                                        <th>Weight (KG)</th>
                                                        <th>Private Marka</th>
                                                        <th>Freight</th>
                                                        <th>Freight By</th>
                                                        <th>GR Type</th>
                                                        <th>Broker Name</th>
                                                        <th>Delivery Mode</th>
                                                        <th>Vehicle</th>
                                                        <th>Container number</th>
                                                        <th>Invoice number</th>
                                                        <th>Branch</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sn = 1;
                                                    if(count($item_name)>0){
                                                    foreach ($records as $record) {

                                                        foreach($item_name as $inm)
                                                        {
                                                            if($record->bgr_id ==  $inm->bgr_id)
                                                            {
                                                            ?>
                                                        <tr>
                                                            <td><?= $sn ?></td>
                                                            <td><?= $record->bgr_id ?></td>
                                                            <td><?= convertToHumanDate($record->gr_date) ?></td>
                                                            <td><?= $this->function_library->FindStation($record->from_station_fk) ?></td>
                                                            <td><?= $this->function_library->FindStation($record->to_station_fk) ?></td>
                                                            <td><?= $this->function_library->FindParty($record->consignor_id_fk) ?></td>
                                                            <td><?= $this->function_library->FindParty($record->consignee_id_fk) ?></td>
                                                            <td>
                                                               <?= $this->function_library->FindItemName($inm->item_name_fk)?>
                                                            <?php // $this->function_library->FindItemName($record->item_name_fk) ?></td>
                                                            <td><?= $record->item_qty ?></td>
                                                            <td><?= $record->item_weight ?></td>
                                                            <td><?= $record->item_remarks ?></td>
                                                            <td><?= $record->s_freight ?></td>
                                                            <td><?= $record->freight_by ?></td>
                                                            <td><?= $record->gr_type ?></td>
                                                            <td><?= $this->function_library->FindBrokerName($record->broker_id_fk) ?></td>
                                                            <td><?= $record->delivery ;//$this->function_library->FindDeliveryMode($record->delivery_mode_fk) ?></td>
                                                            <td><?= $this->function_library->FindVehicle($record->vehicle_id_fk) ?></td>
                                                            <td><?= $record->container_number ?></td>
                                                            <td><?= $record->invoice_no ?></td>
                                                            <td><?= $this->function_library->FindBrachAgent($record->branch_id_fk) ?></td>
                                                        </tr>
                                                        <?php
                                                        $sn++;
                                                            }
                                                        }
                                                    }
                                                }
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endif; ?>
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
            <!-- start - This is for export functionality only -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>

            <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
            <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
            <!-- end - This is for export functionality only -->
            <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
            <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

            <script>

                $(".select2").select2();
                $('.singledate').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: 'dd-mm-yyyy',
                    orientation: "bottom auto"
                });
                $('#example23').DataTable({
                    dom: 'Blfrtip',
                    language: {search: "_INPUT_",
                        searchPlaceholder: "Search Records ..."
                    },
                    buttons: [
                        {
                            extend: 'excel',

                        },
                        {
                            extend: 'print',

                        }
                    ]
                });

                function change_status(id) {
                    var url = 'admin/athlete_management/change_status';
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: ({id: id}),
                        success: function (response) {
                            if (response === 1)
                            {
                                $.alert("You don't have permission to change event status");
                            } else
                            {
                                $('#' + id).replaceWith(response);
                            }
                        }
                    });
                }


                $('.trash-me').click(function () {
                    var id = $(this).attr('id');
                    $.confirm({
                        icon: 'fa fa-trash',
                        title: 'Confirm!',
                        content: 'Are you sure you want to delete?',
                        animation: 'zoom',
                        closeAnimation: 'none',
                        buttons: {
                            confirm: function () {
                                var url = '<?= $base_url ?>accounts/voucher/delete';
                                $.ajax({
                                    url: url,
                                    type: 'POST',
                                    data: ({id: id}),
                                    success: function (response) {
                                        var res = JSON.parse(response);
                                        if (res.status == 'success')
                                        {
                                            alertify.success(res.status_message);
                                            $('#row-id-' + id).remove();
                                        } else
                                        {
                                            alertify.error(res.status_message);
                                        }
                                    }
                                });
                            },
                            cancel: function () {
                            }
                        }

                    });
                });

                function go_to_edit(url) {
                    window.location.href = url;
                }

                function printwindow(url) {
                    w = 700;
                    h = 600;
                    LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
                    TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
                    settings = 'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ',resizable'
                    window.open(url, 'printwindow', settings);
                }


            </script>
    </body>

</html>