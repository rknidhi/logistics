<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Salary Sheet</title>
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
                                    <a data-fancybox data-type="ajax" data-src="<?= $base_url ?>accounts/salarysheet/add_salarysheet" href="javascript:;">
                                    <div class="card-icon">
                                        <button type="button" class="btn btn-warning btn2"><i class="fa fa-plus addIcon"></i> Create Salarysheet</button>    
                                    </div>
                                    </a>
                                    <h4 class="card-title">Salary Sheet</h4>
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
                                        <div class="row">
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <legend>Search</legend>
                                                <table width="100%">
                                                    <tr>
                                                        <td><label class="control-label ">Branch Name</label></td>
                                                        <td>
                                                            <select class="form-control select2" name="branch_name" required>
                                                                <option value="">Select</option>
                                                                <?php
                                                                foreach ($branches as $branch) {
                                                                    echo '<option value="' . $branch->branch_agent_id . '" ' . ($branch->branch_agent_id == $this->input->post('branch_name') ? 'selected' : '') . '>' . $branch->branch_agent . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>

                                                        <td><label class="control-label">Employee</label></td>
                                                        <td>
                                                            <select class="form-control select2" name="employee_id_fk" required>
                                                                <option value="">Select</option>
                                                                <?php
                                                                foreach ($employees as $employee) {
                                                                    echo '<option value="' . $employee->employee_id . '" ' . ($employee->employee_id == $this->input->post('employee_id_fk') ? 'selected' : '') . '>' . $employee->employee_name . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>

                                                        <td width="100"><label>Month</label></td>
                                                        <td width="150">
                                                            <input type="text" name="month_year" id="month_year" value="<?= @$post_data['month_year'] ?>" class="form-control monthdate" required>
                                                        </td>

                                                        <td width="100"><label>Designation</label></td>
                                                        <td width="250">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <select name="designation" class="form-control" required>
                                                                        <option value="">Select</option>
                                                                        <?php
                                                                        foreach ($this->config->item('emp_designation') as $key => $designation) {
                                                                            echo '<option value="' . $key . '"' . ($key == $this->input->post('designation') ? 'selected' : '') . '>' . $designation . '</option>';
                                                                        }
                                                                        ?>    
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td width="100"><button type="submit" name="search" value="search" class="btn btn-danger btn search-me">Search</button></td>
                                                    </tr>
                                                </table>
                                            </fieldset>
                                        </div>
                                        </div>
                                    </form>

                                    <?php if ($display): ?>
                                        <div class="table-responsive">
                                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Month/Year</th>
                                                        <th>Employee</th>
                                                        <th>CL</th>
                                                        <th>PL</th>
                                                        <th>SL</th>
                                                        <th>Overtime</th>
                                                        <th>Net Salary</th>
                                                        <th>Overtime Salary</th>
                                                        <th>Advance Deduction</th>
                                                        <th>Net Payable</th>
                                                        <th>Action</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sn = 1;
                                                    foreach ($salary_sheets as $value) {
                                                        ?>
                                                        <tr id="row-id-<?= $value->ss_id ?>">
                                                            <td style="width:30px;"><?= $sn; ?></td>
                                                            <td><?= $value->month_year ?></td>
                                                            <td><?= $this->function_library->FindEmployee($value->employee_id_fk) ?></td>
                                                            <td><?= $value->month_cl ?></td>
                                                            <td><?= $value->month_pl ?></td>
                                                            <td><?= $value->month_sl ?></td>
                                                            <td><?= $value->over_time ?></td>
                                                            <td><?= $value->net_salary ?></td>
                                                            <td><?= $value->over_time_salary ?></td>
                                                            <td><?= $value->advance_deduction ?></td>
                                                            <td><?= $value->net_payable ?></td>
                                                            <td>
                                                                <a class="trash trash-me material-icons" id="<?= $value->ss_id ?>" ><i class="fa fa-trash"></i></a>
                                                                <a class="edit" data-fancybox data-type="ajax" data-src="<?= $base_url ?>accounts/salarysheet/edit_salarysheet/<?= $value->ss_id ?>" href="javascript:;"><i class="fa fa-pencil-alt"></i></a>
                                                                <a class="btn" onclick="printwindow('<?= $base_url ?>accounts/salarysheet/printsalarysheet/<?= $value->ss_id ?>')" href="javascript:;"><i class="fa fa-print" aria-hidden="true"></i></a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $sn++;
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
            <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
            <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
            <!-- end - This is for export functionality only -->
            <script>
                                                            $('.monthdate').datepicker({
                                                                changeMonth: true,
                                                                changeYear: true,
                                                                autoclose: true,
                                                                todayHighlight: true,
                                                                format: 'mm-yyyy',
                                                                viewMode: "months",
                                                                minViewMode: "months",
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
                                                                            var url = '<?= $base_url ?>accounts/salarysheet/delete';
                                                                            $.ajax({
                                                                                url: url,
                                                                                type: 'POST',
                                                                                data: ({id: id}),
                                                                                success: function (response) {
                                                                                    console.log(response);
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