<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Branch Report</title>
        <?php $this->load->view('includes/head'); ?> 
        <link href="<?= $base_url ?>assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="<?= $base_url ?>assets/css/form-css.css" rel="stylesheet" type="text/css" />
        <style>
            .container-fluid{max-width: inherit;}
            .myTable table tr th{
                text-align: left;
            }
            .myTable table tr td{
                text-align: right;
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
                                    <h4 class="card-title">Branch Report</h4>
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
                                            <div class="row">
                                            <fieldset style="width:100%">
                                                <legend>Filter Records</legend>
                                                <table width="100%">
                                                    <tr>
                                                        <td width="25%">
                                                            <label class="control-label ">Date From</label>
                                                            <input type="text" name="from_date"value="<?= $this->input->post('from_date') ?>" class="form-control singledate" required>
                                                        </td>

                                                        <td >
                                                            <label class="control-label "> Date To</label>
                                                            <input type="text" name="to_date" value="<?= $this->input->post('to_date') ?>" class="form-control singledate" required>
                                                        </td>

                                                        <!-- <td width="15%">
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


                                                        <td width="15%">
                                                            <label class="control-label">Station To</label>
                                                            <select class="form-control select2" name="to_station_fk" id="to_station_fk" required>
                                                                <option value="">Select</option>
                                                                <?php
                                                                foreach ($stations as $station) {
                                                                    echo '<option value="' . $station->station_id . '" ' . ($station->station_id == $this->input->post('to_station_fk') ? 'selected' : '') . '>' . $station->station_name . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </td> -->


                                                        <td >
                                                            <label class="control-label">Branch</label><br>
                                                            <select class="form-control" name="branch_id_fk" id="branch_id_fk" required>
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
                                        </div>
                                    </form>
                                    <?php if($display): ?>
                                    <div class="myTable">
                                        <fieldset style="background:#fff">
                                            <legend>Branch Records</legend>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="table-responsive trackTable">
                                                                <table width="100%" class="table  table-striped table-bordered ">
                                                                    <tr>                                                            
                                                                        <th>Total GR =></th>
                                                                        <td><?= $total_gr ?></td>
                                                                    </tr>
                                                                    
                                                                    <tr>                                                            
                                                                        <th>Cancelled GR =></th>
                                                                        <td><?= $cancelled_gr ?></td>
                                                                    </tr>
                                                                    <tr>                                                            
                                                                        <th>Total LHC =></th>
                                                                        <td><?= $total_lhc ?></td>
                                                                    </tr>
                                                                    <tr>                                                            
                                                                        <th>Pending LHC =></th>
                                                                        <td><?= ($total_gr - $total_lhc)?></td>
                                                                    </tr>
                                                                    <tr>                                                            
                                                                        <th>Total Main Challan =></th>
                                                                        <td><?= $main_challan ?></td>
                                                                    </tr>
                                                                    <tr>                                                            
                                                                        <th>Total Deliverd GR =></th>
                                                                        <td><?= $delivered_delivery ?></td>
                                                                    </tr>
                                                                    <tr>                                                            
                                                                        <th>Pending Delivery =></th>
                                                                        <td><?= $pending_delivery ?></td>
                                                                    </tr> 
                                                                    
                                                                </table>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="table-responsive trackTable">
                                                                <table width="100%" class="table  table-striped table-bordered ">
                                                                       
                                                                    <tr>                                                            
                                                                        <th>Total POD Received =></th>
                                                                        <td><?= $pod_received ?></td>
                                                                    </tr>
                                                                    <tr>                                                            
                                                                        <th>Pending POD =></th>
                                                                        <td><?= $pod_pending ?></td>
                                                                    </tr>
                                                                    <tr>                                                            
                                                                        <th>Un-Billed GR =></th>
                                                                        <td><?= ($total_gr - $total_billing_count)?></td>
                                                                    </tr>
                                                                    <tr>                                                            
                                                                        <th>Total Bill/ Amount =></th>
                                                                        <td><?= $total_billing_count.' / '.number_format($total_billing_amount,2) ?></td>
                                                                    </tr>
                                                                    <tr>                                                            
                                                                        <th>Received Bill/ Amount =></th>
                                                                        <td><?= $total_received_bill .' / '.number_format($total_payment_received,2) ?></td>
                                                                    </tr>
                                                                    <tr>                                                            
                                                                        <th>Pending Bill/ Amount =></th>
                                                                        <td><?= ($total_billing_count - $total_received_bill) .' / '.number_format(($total_billing_amount - $total_payment_received),2) ?></td>
                                                                    </tr>
<!--                                                                     <tr>                                                            
                                                                        <th>Testing =></th>
                                                                        <td></td>
                                                                    </tr> -->
                                                                </table>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                        </fieldset>
                                    </div>
                                    
                                    <?php  endif; ?>

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

