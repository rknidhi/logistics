<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Balance Sheet</title>
        <?php $this->load->view('includes/head'); ?> 
        <link href="<?= $base_url ?>assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
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
                                    <h4 class="card-title">Balance Sheet</h4>
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
                                                <legend>Search</legend>
                                                <table width="100%">
                                                    <tr>
                                                        <td><label class="control-label">Company</label></td>
                                                        <td>
                                                            <select class="form-control select2" name="company" required>
                                                                <option value="">Select</option>
                                                                <?php
                                                                foreach ($companies as $company) {
                                                                    echo '<option value="' . $company->company_id . '" ' . ($company->company_id == $this->input->post('company') ? 'selected' : '') . '>' . $company->company_name . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>

                                                        <td><label class="control-label ">Branch</label></td>
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


<!--                                                        <td><label class="control-label ">Get By</label></td>
                                                        <td>
                                                            <select class="form-control select2" name="group_name" required>
                                                                <option value="">Select</option>
                                                                <option value="Ledger">Ledger Wise</option>
                                                                <option value="Group">Group Wise</option>
                                                                <option value="Head">Head Wise</option>
                                                            </select>
                                                        </td>-->

                                                        <td><label class="control-label ">From</label></td>
                                                        <td><input type="text" name="from_date" value="<?= $this->input->post('from_date') ?>" class="form-control singledate" required></td>

                                                        <td><label class="control-label "> To</label></td>
                                                        <td><input type="text" name="to_date" value="<?= $this->input->post('to_date') ?>" class="form-control singledate" required></td>



                                                        <td width="100"><button type="submit" name="search" value="search" class="btn btn-danger btn search-me">Search</button></td>
                                                    </tr>
                                                </table>
                                            </fieldset>
                                        </div>
                                    </form>

                                    <?php if ($display): ?>
                                        <div class="table-responsive">
                                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
<!--                                                     <tr>
                                                        <th>LIABILITIES (Dr.)</th>
                                                        <th>Amount</th>
                                                        <th>ASSETS (Cr.)</th>
                                                        <th>Amount</th>
                                                    </tr> -->
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sn = 1;
                                                    $totalDebit = 0;
                                                    $totalCredit = 0;
                                                    $totalDebit = $this->function_library->balance_sheet_total($post_data, 'Debit');
                                                    $totalCredit = $this->function_library->balance_sheet_total($post_data, 'Credit');
                                                    ?>
                                                    <tr><td>
                                                    <table cellspacing="0" width="100%">
                                                    <tr>
                                                        <th>LIABILITIES (Dr.)</th>
                                                        <th>Amount</th>
                                                    </tr>


                                                    <?php
                                                        echo(balance_sheet_dr($groups, $post_data));//    
                                                    ?>
                                                    </table>
                                                    </td>
                                                    <td>
                                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <tr>
                                                        <th>ASSETS (Cr.)</th>
                                                        <th>Amount</th>
                                                    </tr>

                                                    <?php
                                                    echo(balance_sheet_cr($groups, $post_data));//
                                                    ?>
                                                    </table>
                                                    </td>
                                                    </tr>
                                                    </table>
                                                    <?php
/*                                                    $total = balance_sheet_total($groups, $post_data);
                                                   $total = array_diff(explode('|', $total), array(0,''));
                                                   foreach($total as $drcr){
                                                       $cd_array = explode(',',$drcr);
                                                       $totalDebit +=  (int) $cd_array[0];
                                                       $totalCredit += (int) $cd_array[1];
                                                   } */
                                                  // print_r($total);
                                                   // print_r($groups); //die;
                                                    //print_r($post_data);


// special                                                    echo(print_balance_sheet($groups, $post_data));// die;


                                                    /*                                                     foreach ($groups as $group) {
                                                        ?>
                                                        <tr>
                                                            <td><?= $group->group_name ?></td>
                                                            <td><?= $td = $this->function_library->calculateTB($group->aag_id, $post_data, 'Debit') ?></td>
                                                            <td><?= $group->group_name ?></td>
                                                            <td><?= $tc = $this->function_library->calculateTB($group->aag_id, $post_data, 'Credit') ?></td>
                                                        </tr>

                                                        <?php
                                                        $totalDebit += $td;
                                                        $totalCredit += $tc;
                                                        $sn++;
                                                    }
 */                                                    ?>
                                                    <tr>
                                                        <th>Total</th>
                                                        <td><?= $totalDebit ?></td>
                                                        <th>Total</th>
                                                        <td><?= $totalCredit ?></td>

                                                    </tr>

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

                $('.singledate').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: 'dd-mm-yyyy',
                    orientation: "bottom auto"
                });
                $('#example23').DataTable({
                    dom: 'Blfrtip',
                    "paging": false,
                    "ordering": false,
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