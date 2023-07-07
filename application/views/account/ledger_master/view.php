<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Account (Ledger Master)</title>
        <?php $this->load->view('includes/head'); ?> 
        <link href="<?= $base_url ?>assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
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
                    <!-- Row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header card-header-primary card-header-icon">
                                    <a data-fancybox data-type="ajax" data-src="ledger_master/add_lm" href="javascript:;">
                                    <div class="card-icon">
                                        <button type="button" class="btn btn-warning btn2"><i class="fa fa-plus addIcon"></i> Create Ledger</button>    
                                    </div>
                                    </a>
                                    <h4 class="card-title">Ledger Master</h4>
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

                                    <div >
                                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Ledger Name</th>
                                                    <th>Ledger Type</th>
                                                    <th>Group</th>
                                                    <th>Branch</th>
                                                    <!--<th>Sub-Group</th>-->
                                                    <th>TIN</th>
                                                    <th>Ex.No.</th>
                                                    <th>GSTN</th>                                                   
                                                    <th>Pan No.</th>
                                                    <th>Address</th>
                                                    <th>Company</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sn = 1;
                                                foreach ($ledgers as $ledger) {
                                                    ?>
                                                    <tr id="row-id-<?= $ledger->ledger_id ?>">
                                                        <td><?= $sn; ?></td>
                                                        <td><?= $ledger->ledger_name ?></td>
                                                        <td><?= @$this->functions->get_single_row_colum('tbl_ledger_type', 'ledger_type', 'ltype_id', $ledger->ledger_type); ?></td>
                                                        <td><?= @$this->functions->get_single_row_colum('ac_account_group', 'group_name', 'aag_id', $ledger->aag_id_fk); ?></td>
                                                        <td><?= @$this->functions->get_single_row_colum('tbl_master_branch_agent', 'branch_agent', 'branch_agent_id', $ledger->branch_agent_id_fk); ?></td>                                                        
                                                        <!--<td><?//= @$this->functions->get_single_row_colum('ac_account_subgroup', 'subgroup_name', 'aasg_id', $ledger->aasg_id_fk); ?></td>-->
                                                        <td><?= $ledger->ledger_tin ?></td>
                                                        <td><?= $ledger->ex_no ?></td>
                                                        <td><?= $ledger->gstin ?></td>
                                                        <td><?= $ledger->panno ?></td>
                                                        <td><?= $ledger->address ?></td>

                                                        <td><?= @$this->functions->get_single_row_colum('tbl_master_company', 'company_name', 'company_id', $ledger->company_id_fk); ?></td>
                                                        <td>
                                                            <a class="trash trash-me material-icons" id="<?= $ledger->ledger_id ?>" ><i class="fa fa-trash"></i></a>
                                                            <a class="edit" data-fancybox data-type="ajax" data-src="ledger_master/edit_lm/<?= $ledger->ledger_id ?>" href="javascript:;"><i class="fa fa-pencil-alt"></i></a>
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
                    columnDefs: [
                        {targets: [5, 6, 8,10,4], visible: false},
                    ],
                    dom: 'Blfrtip',
                    language: {search: "_INPUT_",
                        searchPlaceholder: "Search Records..."
                    },
                    buttons: [
                        {
                            extend: 'csv',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                            }
                        }
                    ],
                }
                );
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

                $('#example23').on('click','.trash-me', function () {
                //$('.trash-me').click(function () {
                    var id = $(this).attr('id');
                    $.confirm({
                        icon: 'fa fa-trash',
                        title: 'Confirm!',
                        content: 'Are you sure you want to delete?',
                        animation: 'zoom',
                        closeAnimation: 'none',
                        buttons: {
                            confirm: function () {
                                var url = '<?= $base_url ?>accounts/ledger_master/delete';
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