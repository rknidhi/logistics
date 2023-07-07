<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Fleet Overdue</title>
        <?php $this->load->view('includes/head'); ?> 
        <link href="<?= $base_url ?>assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
        <style>
            .overdue{
                background-color:#FF0000;
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header card-header-primary card-header-icon">
                                    <!-- <a  href="<?= $base_url ?>fleet">
                                    <div class="card-icon">
                                        <button type="button" class="btn btn-warning btn2"><i class="fa fa-plus addIcon"></i> Add Fleet</button>    
                                    </div>
                                    </a> -->
                                    <h4 class="card-title">Fleet Overdue</h4>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <table id="example23" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Fleet No.</th>
                                                    <th>Road Tax Due</th>
                                                    <th>Permit 1 Due</th>
                                                    <th>Permit 5 Due</th>
                                                    <th>Challan Due</th>
                                                    <th>Pollution Due</th>
                                                    <th>Insurance Due</th>
                                                    <th>Fitness Due</th>
                                                    <th>EMI Due</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sn = 1;

                                                foreach ($fleet_due as $fleet_row) {
                                                    $todate = date('Y-m-d');
                                                    if($fleet_row->tax_date < $todate){
                                                        $tx=true;
                                                    }
                                                    if($fleet_row->permit_due_yr < $todate){
                                                        $fy=true;
                                                    }

                                                    if($fleet_row->permit_due_for_yr < $todate){
                                                        $fdo=true;
                                                    }

                                                    if($fleet_row->challan_due_date < $todate){
                                                        $cdd=true;
                                                    }

                                                    if($fleet_row->pollution_due_date < $todate){
                                                        $pod=true;
                                                    }

                                                    if($fleet_row->insurence_due_date < $todate){
                                                        $idu=true;
                                                    }
                                                    if($fleet_row->fitness_due_date < $todate){
                                                        $fdd=true;
                                                    }

                                                    ?>
                                                    <tr>
                                                        <td><?= $sn; ?></td>
                                                        <td><?= $fleet_row->fleet_no; ?></td>
                                                        <td <?=($tx)?'class="overdue"':""?>><?= convertToHumanDate($fleet_row->tax_date); ?></td>
                                                        <td <?=($fy)?'class="overdue"':""?>><?= convertToHumanDate($fleet_row->permit_due_yr) ?></td>
                                                        <td <?=($fdo)?'class="overdue"':""?>><?= convertToHumanDate($fleet_row->permit_due_for_yr); ?></td>

                                                        <td <?=($cdd)?'class="overdue"':""?>><?= convertToHumanDate($fleet_row->challan_due_date); ?></td>

                                                        <td <?=($pod)?'class="overdue"':""?>><?= convertToHumanDate($fleet_row->pollution_due_date); ?></td>


                                                        <td <?=($pod)?'class="overdue"':""?>><?= convertToHumanDate($fleet_row->pollution_due_date); ?></td>
                                                        <td <?=($idu)?'class="overdue"':""?>><?= convertToHumanDate($fleet_row->insurence_due_date); ?></td>
                                                        <td <?=($fdd)?'class="overdue"':""?>><?= convertToHumanDate($fleet_row->fitness_due_date); ?></td>
                                                    </tr>
                                                    <?php
                                                        $tx=false;
                                                        $fy=false;
                                                        $fdo=false;
                                                        $cdd=false;
                                                        $pod=false;
                                                        $idu=false;
                                                        $fdd=false;
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
//                        {targets: [5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21], visible: false},
                                                                ],
                                                                dom: 'Blfrtip',
                                                                language: {search: "_INPUT_",
                                                                    searchPlaceholder: "Search Records..."
                                                                },
                                                                buttons: [
                                                                    {
                                                                        extend: 'excel',
//                            exportOptions: {
//                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21]
//                            }
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
                                                                            var url = '<?= $base_url ?>booking/delete_gr';
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