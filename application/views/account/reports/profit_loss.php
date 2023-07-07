<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Profit & Loss</title>
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
                                    <h4 class="card-title">Profit & Loss</h4>
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
<!--                                                         <td>
                                                            <label class="control-label">Company</label>
                                                            <select class="form-control select2" name="company" required>
                                                                <option value="">Select</option>
                                                                <?php
/*                                                                 foreach ($companies as $company) {
                                                                    echo '<option value="' . $company->company_id . '" ' . ($company->company_id == $this->input->post('company') ? 'selected' : '') . '>' . $company->company_name . '</option>';
                                                                } */
                                                                ?>
                                                            </select>
                                                        </td> -->

                                                        <td>
                                                            <label class="control-label ">Branch</label>
                                                            <select class="form-control select2" name="branch_name" required>
                                                                <option value="">Select</option>
                                                                <?php
                                                                foreach ($branches as $branch) {
                                                                    echo '<option value="' . $branch->branch_agent_id . '" ' . ($branch->branch_agent_id == $this->input->post('branch_name') ? 'selected' : '') . '>' . $branch->branch_agent . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>

                                                        <td>
                                                            <label class="control-label ">From</label>
                                                            <input type="text" name="from_date" value="<?= $this->input->post('from_date') ?>" class="form-control singledate" required>
                                                        </td>

                                                        <td>
                                                            <label class="control-label "> To</label>
                                                            <input type="text" name="to_date" value="<?= $this->input->post('to_date') ?>" class="form-control singledate" required>
                                                        </td>



                                                        <td width="100">
                                                            <br/>
                                                            <button type="submit" name="search" value="search" class="btn btn-danger btn search-me">Search</button></td>
                                                    </tr>
                                                </table>
                                            </fieldset>
                                        </div>
                                       </div>
                                    </form>

                                    <?php if ($display): ?>
                                        <div>
                                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Particulars</th>
                                                        <th>Amount (Dr.)</th>
                                                        <th>Particulars</th>
                                                        <th>Amount (Cr.)</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $totalDebit = $totalCredit = 0;
                                                    for ($sn = 0; $sn < $total_count; $sn++) {
                                                        //Calculate 
                                                        if (!empty($debit_heads[$sn]->aag_id_fk)) {
                                                            $dr_amount = $this->function_library->calculateDrFinal($debit_heads[$sn]->aag_id_fk, $post_data['from_date'], $post_data['to_date'], '', $post_data['branch_name'], 'Sale');
                                                            $totalDebit += $dr_amount;
                                                        }
                                                        if (!empty($credit_heads[$sn]->aag_id_fk)) {
                                                            $cr_amount = $this->function_library->calculateDrFinal($credit_heads[$sn]->aag_id_fk, $post_data['from_date'], $post_data['to_date'], '', $post_data['branch_name'], 'Journal');
                                                            $totalCredit += $cr_amount;
                                                        }                                                        
                                                        ?>
                                                        <tr>
                                                            <?php
                                                            if (!empty($debit_heads[$sn]->aag_id_fk)) {
                                                                ?>
                                                                <td><?= $this->function_library->FindAcGroupName($debit_heads[$sn]->aag_id_fk) ?></td>
                                                                <td><?= number_format($dr_amount,2) ?></td>
                                                                <?php
                                                            } else {
                                                                echo '<td></td>';
                                                                echo '<td></td>';
                                                            }
                                                            ?>
                                                            <?php
                                                            if (!empty($credit_heads[$sn]->aag_id_fk)) {
                                                                ?>
                                                                <td><?= $this->function_library->FindAcGroupName($credit_heads[$sn]->aag_id_fk) ?></td>
                                                                <td><?= number_format($cr_amount,2) ?></td>
                                                                <?php
                                                            } else {
                                                                echo '<td></td>';
                                                                echo '<td></td>';
                                                            }
                                                            ?>
                                                        </tr>
                                                    <?php }
                                                    ?>
                                                    <tr>
                                                        <td></td>
                                                        <td>-</td>
                                                        <td></td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <?php
                                                        $netAmount = 0;
                                                        // Modified by Rakesh Dated: 11-09-19
                                                        if ($totalDebit < $totalCredit) {
                                                            echo '<td>Net Profit</td>';
                                                            echo '<td>'. number_format(($totalCredit - $totalDebit),2) . '</td>';
                                                            echo '<td></td>';
                                                            echo '<td></td>';
                                                            $netAmount = $totalCredit;                        
                                                        } 
                                                        else { 
                                                            echo '<td></td>';
                                                            echo '<td></td>';
                                                            echo '<td>Net Loss</td>';
                                                            echo '<td>' . number_format(($totalDebit - $totalCredit),2) . '</td>'; 
                                                            $netAmount = $totalDebit;
                                                        }
                                                        ?>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>-</td>
                                                        <td></td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Total</strong></td>
                                                        <td><strong><?= number_format($netAmount,2) ?></strong></td>

                                                        <td><strong>Total</strong></td>
                                                        <td><strong><?= number_format($netAmount,2) ?></strong></td>
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
                    "ordering": false,
                    "paging": false,
                    "ordering": false,
                    "info": false,
                    "searching": false,
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