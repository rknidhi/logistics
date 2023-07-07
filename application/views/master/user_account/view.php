<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : User Account</title>
        <?php $this->load->view('includes/head'); ?> 
        <link href="<?= $base_url ?>assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
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
                                    <a data-fancybox data-type="ajax" data-src="user_account/add_user" href="javascript:;">
                                    <div class="card-icon">
                                        <button type="button" class="btn btn-warning btn2"><i class="fa fa-plus addIcon"></i> Create User</button>    
                                    </div>
                                    </a>
                                    <h4 class="card-title">User Account</h4>
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

                                    <div class="table-responsive">
                                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Group</th>
                                                    <th>Pic</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sn = 1;
                                                foreach ($users as $user) {
                                                    ?>
                                                    <tr id="row-id-<?= $user->uacc_id ?>">
                                                        <td><?= $sn; ?></td>
                                                        <td><?= $user->user_firstname ?> <?= $user->user_lastname ?></td>
                                                        <td><?= $user->uacc_email ?></td>
                                                        <td><?= $user->user_phone ?></td>
                                                        <td><?= $this->functions->get_single_row_colum('user_groups', 'ugrp_name', 'ugrp_id', $user->uacc_group_fk) ?></td>
                                                        <td><?= $user->user_profile_pic != '' ? '<img src="' . $base_url . 'uploaded_files/user_profile/thumb/' . $user->user_profile_pic . '">' : '' ?></td>
                                                        <td>
                                                            <?php if ($user->uacc_suspend == 0) { ?>
                                                                <button class="btn btn-success btn-icon btn-xs" id="<?= $user->uacc_id; ?>" onclick="change_status('<?= $user->uacc_id; ?>')"><i class="fa fa-check"></i></button>
                                                            <?php } else { ?>
                                                                <button class="btn btn-danger btn-icon btn-xs" id="<?= $user->uacc_id; ?>" onclick="change_status('<?= $user->uacc_id; ?>')"><i class="fa fa-times"></i></button>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <a class="trash trash-me material-icons" id="<?= $user->uacc_id ?>" ><i class="fa fa-trash"></i></a>
                                                            <a class="edit" data-fancybox data-type="ajax" data-src="user_account/edit_user/<?= $user->uacc_id ?>" href="javascript:;"><i class="fa fa-pencil-alt"></i></a>
                                                            <a class="btn warning" data-fancybox data-type="ajax" data-src="user_account/user_password/<?= $user->uacc_id ?>" href="javascript:;"> <i class="fa fa-key"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $sn++;
                                                }
                                                ?>

                                            </tbody>
                                        </table>
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
            <!-- start - This is for export functionality only -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>

            <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
            <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
            <!-- end - This is for export functionality only -->
            <script>
                                                            $('#example23').DataTable({
                                                                dom: 'Blfrtip',
                                                                language: {search: "_INPUT_",
                                                                    searchPlaceholder: "Search Records ..."
                                                                },
                                                                buttons: [
                                                                    {
                                                                        extend: 'excel',
                                                                        exportOptions: {
                                                                            columns: [0, 1, 2, 3]
                                                                        }
                                                                    }
                                                                ],
                                                                stateSave: true,
                                                                drawCallback: function () {
                                                                    $("[data-fancybox]").fancybox({
                                                                        afterClose: function () {
                                                                            location.reload();
                                                                        }
                                                                    });
                                                                }
                                                            });

                                                            function change_status(id) {
                                                                var url = '<?= base_url() ?>master/user_account/change_user_status';
                                                                $.ajax({
                                                                    url: url,
                                                                    type: 'POST',
                                                                    data: ({id: id}),
                                                                    success: function (response) {
                                                                        if (response == 1)
                                                                        {
                                                                            alertify.error('Permission error.');
                                                                        } else
                                                                        {
                                                                            alertify.success('Status updated.');
                                                                            $('#' + id).replaceWith(response);
                                                                        }
                                                                    }
                                                                });
                                                            }

                                                            $("#example23").on("click", ".trash-me", function () {
                                                                var id = $(this).attr('id');
                                                                $.confirm({
                                                                    icon: 'fa fa-trash',
                                                                    title: 'Confirm!',
                                                                    content: 'Are you sure you want to delete?',
                                                                    animation: 'zoom',
                                                                    closeAnimation: 'none',
                                                                    buttons: {
                                                                        confirm: function () {
                                                                            var url = '<?= $base_url ?>master/user_account/delete';
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