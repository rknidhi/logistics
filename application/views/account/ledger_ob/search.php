<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Ledger Opening Balance</title>
        <?php $this->load->view('includes/head'); ?> 
        <link href="<?= $base_url ?>assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="<?= $base_url ?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
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
                                    <h4 class="m-b-0 text-white">Ledger Opening Balance</h4>
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
                                                <fieldset>
                                                    <legend>Search</legend>
                                                    <table width="100%">
                                                        <tr>
                                                            <td><label class="control-label ">Ledger Name</label></td>
                                                            <td>
                                                                <select class="form-control select2" name="ledger_name">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($ledgers as $ledger) {
                                                                        echo '<option value="' . $ledger->ledger_id . '" ' . ($ledger->ledger_id == $this->input->post('ledger_name') ? 'selected' : '') . '>' . $ledger->ledger_name . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>

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
                                                            <td><label class="control-label">Opening Balance Type</label></td>
                                                            <td><select class="form-control" name="balance_type" required>
                                                                    <option value="">All</option>
                                                                    <option value="Debit" <?= $this->input->post('balance_type') == 'Debit' ? 'selected' : '' ?>>Debit</option>
                                                                    <option value="Credit" <?= $this->input->post('balance_type') == 'Credit' ? 'selected' : '' ?>>Credit</option>
                                                                </select>
                                                            </td>
                                                            <td align="right"><input type="submit" name="search" value="Get Details" class="btn btn-info"></td>
                                                        </tr>

                                                    </table>
                                                </fieldset>
                                            </form>
                                            <?php
                                            if ($display):
                                                ?>
                                                <div class="table-responsive">
                                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Ledger Name</th>
                                                                <th>Branch Name</th>
                                                                <th>Opening Date</th>
                                                                <th>Opening Balance</th>
                                                                <th>Balance Type</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sn = 1;
                                                            foreach ($myledgers as $myledger) {
                                                                ?>
                                                                <tr id="row-id-<?= $myledger->ledger_id ?>">
                                                                    <td><?= $myledger->ledger_name; ?></td>
                                                                    <td><?= (!empty($myledger->branch_agent_id_fk)) ? $this->function_library->FindBrachAgent($myledger->branch_agent_id_fk) : '' ?></td>
                                                                    <td><?= convertToHumanDate($myledger->opening_date) ?></td>
                                                                    <td><?= $myledger->opening_balance ?></td>
                                                                    <td><?= $myledger->balance_type ?></td>
                                                                    <td>
                                                                        <a class="edit" data-fancybox data-type="ajax" data-src="<?= $base_url ?>accounts/ledger_ob/edit_opening_balance/<?= $myledger->ledger_id ?>" href="javascript:;"><i class="fa fa-pencil-alt"></i></a>
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
                $('.singledate').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: 'dd-mm-yyyy',
                    orientation: "bottom auto"
                });
                $(".select2").select2();
                $('#example23').DataTable({
                    dom: 'Blfrtip',
                    language: {search: "_INPUT_",
                        searchPlaceholder: "Search Records..."
                    },
                    buttons: [
                        {
                            extend: 'excel',

                        }
                    ],
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
                                var url = '<?= $base_url ?>master/broker/delete';
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

            </script>
    </body>

</html>