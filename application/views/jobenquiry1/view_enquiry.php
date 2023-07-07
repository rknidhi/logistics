<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : View Enquiry</title>
        <?php $this->load->view('includes/head'); ?> 
        <link href="<?= $base_url ?>assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
    <style>
    table{
        width:100%;
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
                                    <a href="<?= $base_url ?>jobenquiry/enquiry">
                                    <div class="card-icon">
                                        <button type="button" class="btn btn-warning btn2"><i class="fa fa-plus addIcon"></i> Add New Enquiry</button>    
                                    </div>
                                    </a>
                                    <h4 class="card-title">View Enquiry</h4>
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
                                    <div>
                                        <table id="example23" class="display table table-hover table-striped table-bordered" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>E-Ref-No.</th>
                                                    <th>Date</th>
                                                    <th>Company</th>
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>Distance</th>
                                                    <th>Vehicle Type</th>
                                                    <th>No. Of Vehicle</th>
                                                    <th>Material</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sn = 1;

                                                foreach ($enquiry as $enq_row) {
                                                    $rmvc = 1;
                                                    $enq_v_details = $this->db->where('enqid_fk', $enq_row->enqid)->get('tbl_enquiry_vechile_details')->result();
                                                    foreach ($enq_v_details as $vdetails) {
                                                   ?>
                                                    <tr id="row-id-<?= $enq_row->enqid; ?>">
                                                        <td><?= $rmvc<2?$sn:''; ?></td>
                                                        <td><?= $rmvc<2?$enq_row->enq_ref_no:''; ?></td>
                                                        <td><?= $rmvc<2?convertToHumanDate($enq_row->enquiry_date):''; ?></td>
                                                        <td><?= $rmvc<2?$enq_row->company_name:''; ?></td>
                                                        <td><?= $rmvc<2?$enq_row->station_from:''; ?></td>
                                                        <td><?= $rmvc<2?$enq_row->station_to:''; ?></td>
                                                        <td><?= $rmvc<2?$enq_row->distance:''; ?></td>
                                                        <td><?= $vdetails->vechile_type; ?></td>
                                                        <td><?= $vdetails->no_of_vechile; ?></td>
                                                        <td><?= $vdetails->meterial; ?></td>
                                                        <td></td>
                                                        <!--                                                         
                                                        <td>
                                                            <a class="trash trash-me material-icons" id="<?= $challan_dispatch->cdispatch_id ?>" ><i class="fa fa-trash"></i></a>
                                                            <a class="edit" href="edit_dispatch_challan/<?= $challan_dispatch->cdispatch_id ?>"><i class="fa fa-pencil-alt"></i></a>
                                                            <a class="btn1" onclick="printwindow('<?= $base_url ?>challan/printdispatch/<?= $challan_dispatch->cdispatch_id ?>')" href="javascript:;"  href="javascript:;"><i class="fa fa-print" aria-hidden="true"></i></a>
                                                        </td> -->
                                                    </tr>
                                                    <?php
                                                        $rmvc++;
                                                      }
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
                                                                "ordering": false,
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


                                                            $('#example23').on("click", ".trash-me", function() {
                                                                var id = $(this).attr('id');
                                                                $.confirm({
                                                                    icon: 'fa fa-trash',
                                                                    title: 'Confirm!',
                                                                    content: 'Are you sure you want to delete?',
                                                                    animation: 'zoom',
                                                                    closeAnimation: 'none',
                                                                    buttons: {
                                                                        confirm: function () {
                                                                            var url = '<?= $base_url ?>challan/delete_dispatch_challan';
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
                                                                w = 800;
                                                                h = 600;
                                                                LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
                                                                TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
                                                                settings = 'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ',resizable'
                                                                window.open(url, 'printwindow', settings);
                                                            }

            </script>
    </body>

</html>