<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : <?= $report_title ?> Report</title>
        <?php $this->load->view('includes/head'); ?> 
        <link href="<?= $base_url ?>assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="<?= $base_url ?>assets/css/form-css.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?= $base_url ?>assets/plugins/jquery-validation/demo/css/screen.css">

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
                                    <h4 class="m-b-0 text-white">Reports</h4>
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

                                    
                                    <form class="m-t-10" id="form_validation" novalidate action="" method="POST">
                                    <fieldset>
                                        <legend>Fetch Inward/Outward Item Reports</legend>
                                    <div class="row">
                                            <div class="col-lg-2">
                                                <label class="control-label">Branch </label>
                                                <select class="form-control select2" name="branch_id_fk" id="branch_id_fk" required>
                                                    <option value="">Select Branch</option>
                                                    <?php
                                                    foreach ($branches as $branch) {
                                                        echo '<option value="' . $branch->branch_agent_id . '" ' . ($branch->branch_agent_id == @$this->input->post('branch_id_fk') ? 'selected' : '') . '>' . $branch->branch_agent . '</option>';
                                                    }
                                                    ?>    
                                                </select>
                                            </div>

                                        <div class="col-lg-3">
                                                <label class="control-label">From </label>
                                                <input type="text" name="from_date" value="<?= @$this->input->post('from_date') ?>" class="form-control singledate" required>
                                         </div>
                                         <div class="col-lg-3">
       
                                                <label class="control-label">To </label>
                                                <input type="text" name="to_date" value="<?= @$this->input->post('to_date') ?>" class="form-control singledate" required>
                                             </div>   
                                            <div class="col-lg-2">
                                                <label class="control-label">Report Type </label>
                                                <select class="form-control select2" name="report_type" class="" required data-validation-required-message="Please select">
                                                    <option value="">Select</option>
                                                    <option value="A" <?= @$this->input->post('report_type') == 'A' ? 'selected' : '' ?>>All</option>
                                                    <option value="I" <?= @$this->input->post('report_type') == 'I' ? 'selected' : '' ?>>Inward</option>
                                                    <option value="O" <?= @$this->input->post('report_type') == 'O' ? 'selected' : '' ?>>Outward</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-1">
                                                <br>
                                            <button class="btn btn-success" name="search" value="search"><i class="fa fa-search"></i> Search</button>  
                                            </div>

                                           
                                        </div> 
                                    
                                    
                                    </form>
                                    
                                    </fieldset>
                                    <?php if ($display === TRUE): ?>

                                        <?php if ($report_type == 'I') { ?>
                                            <div class="table-responsive">
                                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Inward No.</th>
                                                            <th>Item</th>
                                                            <th>Received</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($inwards as $inward) {
                                                            $where_array = array('stock_type' => 'I', 'io_number' => $inward->inward_id);
                                                            $warehouses = $this->functions->get_all_row_multipe_where('tbl_warehouse', $where_array);
                                                            foreach ($warehouses as $warehouse) {
                                                                ?>
                                                                <tr>
                                                                    <td><?= convertToHumanDate($inward->inward_date); ?></td>
                                                                    <td><?= $inward->inward_no ?></td>
                                                                    <td><?= $this->function_library->FindItemName_rk($warehouse->item_id_fk) ?></td>
                                                                    <td><?= $warehouse->item_qty ?> (<?= $this->function_library->FindPackageMethod($warehouse->package_id) ?>)</td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php } ?>

                                        <?php if ($report_type == 'O') { ?>
                                            <div class="table-responsive">
                                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Outward No.</th>
                                                            <th>Item</th>
                                                            <th>Issued</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($outwards as $outward) {
                                                            $where_array = array('stock_type' => 'O', 'io_number' => $outward->outward_id);
                                                            $warehouses = $this->functions->get_all_row_multipe_where('tbl_warehouse', $where_array);
                                                            foreach ($warehouses as $warehouse) {
                                                                ?>
                                                                <tr>
                                                                    <td><?= convertToHumanDate($outward->outward_date); ?></td>
                                                                    <td><?= $outward->outward_no ?></td>
                                                                    <td><?= $this->function_library->FindItemName($warehouse->item_id_fk) ?></td>
                                                                    <td><?= $warehouse->item_qty ?> (<?= $this->function_library->FindPackageMethod($warehouse->package_id) ?>)</td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php } ?>

                                        <?php if ($report_type == 'A') { ?>
                                            <div class="table-responsive">
                                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Date</th>
                                                            <th>Item</th>
                                                            <!--th>(IN/OUT)WARD No.</th--> <!-- Added by Rakesh Dated 0-08-19 -->
                                                            <th>Opening</th>
                                                            <th>Received</th>
                                                            <th>Issue</th>
                                                            <th>Closing</th>
                                                            <th>Inwards No.</th>
                                                            <th>Outwards No.</th>
                                                            <!-- th>Total Count</th -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $begin = new DateTime($start_date);
                                                        $end = new DateTime($end_date);

                                                        if($begin == $end)
                                                        {
                                                            $end =+1;
                                                        }

                                                        $interval = DateInterval::createFromDateString('1 day');
                                                        $period = new DatePeriod($begin, $interval, $end);
                                                        $sn = 1;
                                                        foreach ($period as $dt) {
                                                            foreach ($items as $item) {
                                                                // Modified by Rakesh Dated 06/07-08-19
                                                                // Fetch INWARD/OUTWARD NO.

                                                                $iwN = $this->db->select('io_number')
                                                                        ->where('stock_type', 'I')
                                                                        ->where('item_id_fk', $item->item_id)
                                                                        ->where('stock_date', $dt->format("Y-m-d"))
                                                                        ->where('branch_id_fk', $branch_id_fk)// Modified by Rakesh Dated 07-08-19
                                                                        ->get('tbl_warehouse')
                                                                        ->result();
                                                                // Fetch All InwardNo.
                                                                $iw = '';
                                                                $ow = '';

                                                                if(count($iwN)>0)
                                                                {
                                                                   foreach($iwN as $ioN){
                                                                    if($iw!=''){
                                                                        $iw .= ', '. $this->function_library->getInwardward($ioN->io_number);
                                                                    }   
                                                                    else {
                                                                        $iw = $this->function_library->getInwardward($ioN->io_number);
                                                                    } 
                                                                   } 
                                                                } 

                                                                $owN = $this->db->select('io_number')
                                                                        ->where('stock_type', 'O')
                                                                        ->where('item_id_fk', $item->item_id)
                                                                        ->where('stock_date', $dt->format("Y-m-d"))
                                                                        ->where('branch_id_fk', $branch_id_fk)// Modified by Rakesh Dated 07-08-19
                                                                        ->get('tbl_warehouse')
                                                                        ->result();   

                                                                // Fetch All OutwardNo.
                                                                if(count($owN)>0)
                                                                {
                                                                   foreach($owN as $ooN){
                                                                    if($ow!=''){
                                                                        $ow .= ', '. $this->function_library->getOutward($ooN->io_number);
                                                                    }   
                                                                    else {
                                                                        $ow = $this->function_library->getOutward($ooN->io_number); 
                                                                    } 
                                                                   } 
                                                                } 
                                                                // End
                                                                
                                                                $tillInward = $this->db->select_sum('item_qty')
                                                                        ->where('stock_type', 'I')
                                                                        ->where('item_id_fk', $item->item_id)
                                                                        ->where('stock_date', $dt->format("Y-m-d"))
                                                                        ->where('branch_id_fk', $branch_id_fk)// Modified by Rakesh Dated 07-08-19
                                                                        ->get('tbl_warehouse')
                                                                        ->row('item_qty');

                                                                $tillOutward = $this->db->select_sum('item_qty')
                                                                        ->where('stock_type', 'O')
                                                                        ->where('item_id_fk', $item->item_id)
                                                                        ->where('stock_date', $dt->format("Y-m-d"))
                                                                        ->where('branch_id_fk', $branch_id_fk)// Modified by Rakesh Dated 07-08-19                                                                        
                                                                        ->get('tbl_warehouse')
                                                                        ->row('item_qty');

                                                                $inwardItem = $this->db->select_sum('item_qty')
                                                                        ->where('stock_type', 'I')
                                                                        ->where('item_id_fk', $item->item_id)
                                                                        ->where('stock_date', $dt->format("Y-m-d"))
                                                                        ->where('branch_id_fk', $branch_id_fk)// Modified by Rakesh Dated 07-08-19                                                                        
                                                                        ->get('tbl_warehouse')
                                                                        ->row('item_qty');


                                                                $outwardItem = $this->db->select_sum('item_qty')
                                                                        ->where('stock_type', 'O')
                                                                        ->where('item_id_fk', $item->item_id)
                                                                        ->where('stock_date', $dt->format("Y-m-d"))
                                                                        ->where('branch_id_fk', $branch_id_fk)// Modified by Rakesh Dated 07-08-19                                                                        
                                                                        ->get('tbl_warehouse')
                                                                        ->row('item_qty');

                                                                $openingBalance = $tillInward - $tillOutward;
                                                                $closingBalance = ($openingBalance + $inwardItem) - $outwardItem;
                                                                $totalCount = ($openingBalance + $inwardItem);
                                                                if ($inwardItem > 0 || $outwardItem > 0) {
                                                                    ?>
                                                                    <tr>
                                                                        <td><?= $sn ?></td>
                                                                        <td><?= $dt->format("d-m-Y"); ?></td>
                                                                        <td><?= $item->item_name ?></td>
                                                                        <td><?= $openingBalance ?></td>
                                                                        <td><?= $inwardItem ?></td>
                                                                        <td><?= $outwardItem ?></td>
                                                                        <td><?= $closingBalance ?></td>
                                                                        <td><?= $iw ?></td>
                                                                        <td><?= $ow ?></td>    
                                                                        <!--(<?php // =($iw!=''?$iw:'') ?><?php //=(($iw!=''&& $ow!='')?'/':'')?>/<?php //= $ow ?>) -->
                                                                        <!-- td><?php //echo ($openingBalance + $inwardItem) ?></td -->
                                                                    </tr>
                                                                    <?php
                                                                    $sn++;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php } ?>


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
            <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
            <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

            <script src="<?= $base_url ?>assets/plugins/datatables/datatables.min.js"></script>
            <!-- start - This is for export functionality only -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>

            <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
            <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
            <script src="<?= $base_url ?>assets/plugins/jquery-validation/dist/jquery.validate.js"></script>
            <!-- end - This is for export functionality only -->
            <script>
                $("#form_validation").validate();
                $('.singledate').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    autoclose: true,
                    todayHighlight: true,
                    format: 'dd-mm-yyyy',
                    orientation: "bottom auto"
                });

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

                $("input[name$='result_type']").click(function () {
                    var result_type = $(this).val();
                    if (result_type == 'M') {
                        $(".dwise").hide();
                        $(".mwise").show();
                    } else {
                        $(".dwise").show();
                        $(".mwise").hide();
                    }


                });

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

                function go_to_edit(url) {
                    window.location.href = url;
                }

            </script>
    </body>

</html>