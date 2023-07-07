<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : View Job</title>
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
                                    <a href="<?= $base_url ?>jobenquiry/job">
                                    <div class="card-icon">
                                        <button type="button" class="btn btn-warning btn2"><i class="fa fa-plus addIcon"></i> Add New Job</button>    
                                    </div>
                                    </a>
                                    <h4 class="card-title">View Job</h4>
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
                                        <table id="example23" class="display table table-hover table-striped table-bordered table-responsive" cellspacing="0">
                                            <thead>
                                                <tr>
<!--                                                     <th>#</th>
 -->                                                    <th>Q-Ref-No.</th>
                                                    <th>J-Ref-No.</th>
                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>Job Amount</th> 
                                                    <th>Bill Number</th>
                                                    <th>Bill Date</th>
                                                    <th>Bill Amount</th>
                                                    <th>Payment Date</th>
                                                    <th>Job Cost</th>
                                                    <th>Vehicle No.</th>
                                                    <th>LR No.</th>
                                                    <th>LR Date</th>
                                                    <th>Delivery Date</th>
                                                    <th>Vendor Name</th>
                                                    <th>Vehicle Hire</th>
                                                    <th>Advance</th>
                                                    <th>RTO</th>  <!--challan replace with RTO-->
                                                    <th>Detention Cost</th>
                                                    <th>Other Cost</th>
                                                    <th>Total Cost</th>
                                                    <th>Booking Amount</th> <!--Freight amount replace with Booking Amount--> 
                                                    <th>Detention Amount</th> <!-- add new column -->
                                                    <th>Other Amount</th>   <!-- add new column -->
                                                    <th>Total Amount</th> <!-- add new column -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($job as $row) {
                                                    $sn = 1;
                                                        $job_vechile_details = $this->db->where('jobid_fk', $row->jobid)->get('tbl_job_vechile_details')->result();
                                                        foreach ($job_vechile_details as $jobrow) {
/*                                                            echo "<pre>";
                                                            print_r($jobrow);
                                                            echo "</pre>";*/

                                                    ?>
                                                    <tr id="row-id-<?= $row->jobid . $sn; ?>">
<!--                                                         <td><?= $sn; ?></td> -->
                                                        <td><?= $row->quote_ref_no; ?></td>
                                                        <td><?= $row->job_ref_no; ?></td>
                                                        <td><?= $row->jfrom; ?></td>
                                                        <td><?= $row->jto; ?></td>
                                                        <td><?= $row->jobamount; ?></td>
                                                        <td><?= $row->billno; ?></td>
                                                        <td><?= convertToHumanDate($row->billdate); ?></td>
                                                        <td><?= $row->billamount; ?></td>
                                                        <td><?= convertToHumanDate($row->paymentdate); ?></td>
                                                        <td><?= $row->jobcost; ?></td>
                                                        <td><?= $jobrow->vehicleno;?></td>
                                                        <td><?= $jobrow->lrno;?></td>
                                                        <td><?= convertToHumanDate($jobrow->lrdate);?></td>
                                                        <td><?= convertToHumanDate($jobrow->deliverydate);?></td>
                                                        <td><?= $jobrow->vendor_name;?></td>
                                                        <td><?= $jobrow->vechile_hire;?></td>
                                                        <td><?= $jobrow->advance_amt;?></td>
                                                        <td><?= $jobrow->rto_amt;?></td>
                                                        <td><?= $jobrow->detention_cost;?></td>
                                                        <td><?= $jobrow->other_cost;?></td>
                                                        <td><?= $jobrow->total_cost;?></td>
                                                        <td><?= $jobrow->booking_amt;?></td>
                                                        <td><?= $jobrow->destihire_amt;?></td>
                                                        <td><?= $jobrow->other_amt;?></td>
                                                        <td><?= $jobrow->total_amt;?></td>
                                                        <td> 
                                                            <?php
                                                             if($sn<2){ 
                                                            ?>
                                                            <a class="trash trash-me material-icons" id="<?= $row->jobid; ?>" ><i class="fa fa-trash" style="font-size: 8pt;"></i></a>
                                                            <a class="edit" href="<?php echo base_url();?>jobenquiry/edit_job/<?= $row->jobid; ?>"><i class="fa fa-pencil-alt"></i></a><!--
                                                            <a class="btn1" onclick="printwindow('<?= $base_url ?>challan/printdispatch/<?= $challan_dispatch->cdispatch_id ?>')" href="javascript:;"  href="javascript:;"><i class="fa fa-print" aria-hidden="true"></i></a> -->
                                                        <?php
                                                         }
                                                       ?>                                                            
                                                        </td>
                                                    </tr>
                                                    <?php
                                                     $sn++;
                                                    }
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
                                                           var dt =  $('#example23').DataTable({
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
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24]
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
                var url = '<?= $base_url ?>jobenquiry/del_job';
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: ({id: id}),
                    success: function (response) {
                        var res = JSON.parse(response);
                        if (res.status == 'ok')
                        {
                            for(i=1; i<=res.nor; i++){
                                $('#row-id-' + id.toString() + i).remove();
                            }
                            alertify.success('Quote Deleted Sucessfully');
                            location.reload();
                        } else {
                            alertify.error('Something went wrong while deletion');
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