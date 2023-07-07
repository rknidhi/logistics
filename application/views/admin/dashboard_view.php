<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <title>Admin</title>
    <base href="<?php echo base_url() ?>" />
    <?php $this->load->view('includes/head'); ?>
    <style>
    .card{
        margin-bottom: 0px;
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
        <div class="page-wrapper" style="min-height:860px;">
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

                <div >
                    <!-- Row -->
                    <!--<pre>
                    <?php
                    // print_r($total_received_bill);
                    ?>
                    </pre>-->
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline-primary">
                                <div class="card-header ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div>
                                                <h4 class="m-b-0 text-white" style="line-height:30px;">Dashboard :
                                                    <?php echo $this->config->item('company_name'); ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="dashboardYear">
                                                <h4 class="m-b-0 text-white" style="line-height:30px;">Financial Year :
                                                    <select class="select2" id="years" name="years">
                                                     <option value="-">Select Fin Year</option>
                                                        <?php
                                                        $curr_year = idate('Y');
                                                        $curr_month =  date('m');
                                                        if($curr_month <= 3){
                                                        for($i=2011; $i<$curr_year; $i++){
                                                        ?>
                                                            <option value="<?php echo $i.'-'. ($i+1); ?>"><?php echo $i.'-'. ($i+1); ?></option>
                                                        <?php
                                                             }
                                                            }
                                                          if($curr_month >= 4){
                                                            for($i=2011; $i<=$curr_year; $i++){
                                                              
                                                             ?> 
                                                            <option value="<?php echo $i.'-'. ($i+1); ?>"><?php echo $i.'-'. ($i+1); ?></option>
                                                          <?php    
                                                          }  
                                                          }   
                                                        ?>
                                                    </select></h4>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <!-- Column -->
                                            <div class="col-md-3">
                                                <a href="<?= $base_url ?>reports/booking_report">
                                                    <div class="homeStrip1">
                                                        <div class="stripIcon">
                                                            <i class="mdi mdi-tooltip-edit"></i>
                                                        </div>
                                                        <div class="stripDetails">
                                                            <div>
                                                                <h4>Total Booking GR</h4>
                                                            </div>
                                                            <div>
                                                                <h2 id="total_gr"><?=$total_gr?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="<?= $base_url ?>reports/dispatch_report">
                                                    <div class="homeStrip1">
                                                        <div class="stripIcon">
                                                            <i class="mdi mdi-newspaper"></i>
                                                        </div>
                                                        <div class="stripDetails">
                                                            <div>
                                                                <h4>Total LHC</h4>
                                                            </div>
                                                            <div>
                                                                <h2 id="total_lhc"><?=$total_lhc?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <a href="<?= $base_url ?>reports/delivery_report">
                                                    <div class="homeStrip1">
                                                        <div class="stripIcon">
                                                            <i class="mdi mdi-truck-delivery"></i>
                                                        </div>
                                                        <div class="stripDetails">
                                                            <div>
                                                                <h4> Total DR</h4>
                                                            </div>
                                                            <div>
                                                                <h2 id="delivered_delivery"><?= $delivered_delivery?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="<?= $base_url ?>reports/pod_report">
                                                    <div class="homeStrip1">
                                                        <div class="stripIcon">
                                                            <i class="mdi mdi-calendar-check"></i>
                                                        </div>
                                                        <div class="stripDetails">
                                                            <div>
                                                                <h4>Total POD Received</h4>
                                                            </div>
                                                            <div>
                                                                <h2 id="pod_received"><?= $pod_received ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                        <br>
                                        <div class="row">
                                            <!-- Column -->
                                            <div class="col-md-3">
                                                <a href="<?= $base_url ?>reports/cancel_report">
                                                    <div class="homeStrip4">
                                                        <div class="stripIcon">
                                                            <i class="mdi mdi-clipboard-alert"></i>
                                                        </div>
                                                        <div class="stripDetails">
                                                            <div>
                                                                <h4>Cancelled GR</h4>
                                                            </div>
                                                            <div>
                                                                <h2 id="cancelled_gr"><?= $cancelled_gr?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="<?= $base_url ?>reports/pendinglhc_report">
                                                    <div class="homeStrip4">
                                                        <div class="stripIcon">
                                                            <i class="mdi mdi-newspaper"></i>
                                                        </div>
                                                        <div class="stripDetails">
                                                            <div>
                                                                <h4>Pending LHC</h4>
                                                            </div>
                                                            <div>
                                                                <h2 id="pending_lhc"><?= ($total_gr - $total_lhc)?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                           
                                            <div class="col-md-3">
                                                <a href="<?= $base_url ?>reports/pending_delivery_report">
                                                    <div class="homeStrip4">
                                                        <div class="stripIcon">
                                                            <i class="mdi mdi-truck-delivery"></i>
                                                        </div>
                                                        <div class="stripDetails">
                                                            <div>
                                                                <h4>Pending Delivery</h4>
                                                            </div>
                                                            <div>
                                                                <h2 id="pending_delivery"><?= $pending_delivery ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="<?= $base_url ?>reports/pod_report">
                                                    <div class="homeStrip4">
                                                        <div class="stripIcon">
                                                            <i class="mdi mdi-calendar-question"></i>
                                                        </div>
                                                        <div class="stripDetails">
                                                            <div>
                                                                <h4>Pending POD </h4>
                                                            </div>
                                                            <div>
                                                                <h2 id="pod_pending"><?= $pod_pending ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                            

                                        </div>
                                        <br>
                                        <div class="row">
                                            <!-- Column -->


                                            <div class="col-md-3">
                                                <a href="<?= $base_url ?>reports/pendingbookbill_report">
                                                    <div class="homeStrip2">
                                                        <div class="stripIcon">
                                                            <i class="mdi mdi-note-text"></i>
                                                        </div>
                                                        <div class="stripDetails">
                                                            <div>
                                                                <h4>Pending Sales</h4>
                                                            </div>
                                                            <div>
                                                                <h2 id="unbilledgrcount"><?= $unbilledgrcount ?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="<?= $base_url ?>reports/bookbill_report">
                                                    <div class="homeStrip2">
                                                        <div class="stripIcon">
                                                            <i class="mdi mdi-printer"></i>
                                                        </div>
                                                        <div class="stripDetails">
                                                            <div>
                                                                <h4>Total Bill / Amount</h4>
                                                            </div>
                                                            <div>
                                                                <h2 id="total_bill_amount"><?= $total_billing_count.' / <i class="mdi mdi-currency-inr"></i>'.number_format($total_billing_amount,2) ?>
                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="<?= $base_url ?>reports/bookbill_report">
                                                    <div class="homeStrip2">
                                                        <div class="stripIcon">
                                                            <i class="mdi mdi-briefcase-check"></i>
                                                        </div>
                                                        <div class="stripDetails">
                                                            <div>
                                                                <h4>Received Bill / Amount</h4>
                                                            </div>
                                                            <div>
                                                                <h2 id="received_bill_amount"><?= $total_received_bill .' / <i class="mdi mdi-currency-inr"></i>'.number_format($total_payment_received,2) ?>
                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="<?= $base_url ?>reports/bookbill_report">
                                                    <div class="homeStrip2">
                                                        <div class="stripIcon">
                                                            <i class="mdi mdi-briefcase-download"></i>
                                                        </div>
                                                        <div class="stripDetails">
                                                            <div>
                                                                <h4>Pending Bill / Amount</h4>
                                                            </div>
                                                            <div>
                                                                <h2 id="pending_bill_amount"><?= ($total_billing_count - $total_received_bill) .' / <i class="mdi mdi-currency-inr"></i>'.number_format(($total_billing_amount - $total_payment_received),2) ?>
                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                        <br>
                                        <!-- <div class="row">
                                           
                                            <div class="col-md-3">
                                                <a href="<?= $base_url ?>reports/main_challan_report">
                                                    <div class="homeStrip3">
                                                        <div class="stripIcon">
                                                            <i class="mdi mdi-clipboard-text"></i>
                                                        </div>
                                                        <div class="stripDetails">
                                                            <div>
                                                                <h4>Total Main Challan</h4>
                                                            </div>
                                                            <div>
                                                                <h2><?//=$main_challan?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="<?= $base_url ?>reports/inward_report">
                                                    <div class="homeStrip3">
                                                        <div class="stripIcon">
                                                            <i class="mdi mdi-sort-descending"></i>
                                                        </div>
                                                        <div class="stripDetails">
                                                            <div>
                                                                <h4>Total Inward</h4>
                                                            </div>
                                                            <div>
                                                                <h2><?//=$main_challan?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="<?= $base_url ?>reports/outward_report">
                                                    <div class="homeStrip3">
                                                        <div class="stripIcon">
                                                            <i class="mdi mdi-sort-ascending"></i>
                                                        </div>
                                                        <div class="stripDetails">
                                                            <div>
                                                                <h4>Total Outward</h4>
                                                            </div>
                                                            <div>
                                                                <h2><?//=$main_challan?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <a href="<?= $base_url ?>reports/outward_report">
                                                    <div class="homeStrip3">
                                                        <div class="stripIcon">
                                                            <i class="mdi mdi-sort-ascending"></i>
                                                        </div>
                                                        <div class="stripDetails">
                                                            <div>
                                                                <h4>Total Outward</h4>
                                                            </div>
                                                            <div>
                                                                <h2><?//=$main_challan?></h2>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                           
                                        </div>-->
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
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

    <?php $this->load->view('includes/scripts'); ?>
    <!-- Chart JS -->
    <script src="<?php echo $includes_dir; ?>assets/js/dashboard1.js"></script>

    <?php if (!empty($message)) { ?>
    <script>
    alertify.success('<?= $message; ?>');
    </script>
    <?php } ?>
    <?php if (!empty($error)) { ?>
    <script>
    alertify.error('<?= $error; ?>');
    </script>
    <?php } ?>

    <script>
        $('#years').change(function(){
            var periods = $(this).val();
            $.ajax({
                url: '<?= $base_url ?>auth_admin/dashboard_filter',
                type: 'POST',
                data: ({
                    years_period: periods
                }),
                success: function(response) {
                    var obj = jQuery.parseJSON(response);
                    console.log(obj);
                     $('#total_gr').text(obj['total_gr']);
                     $('#cancelled_gr').text(obj['cancelled_gr']);
                     $('#total_lhc').text(obj['total_lhc']); 
                     $('#pod_received').text(obj['pod_received']);
                     $('#pod_pending').text(obj['pod_pending']);
                     $('#pending_delivery').text(obj['pending_delivery']);
                     $('#pending_lhc').text(obj['total_gr'] - obj['total_lhc']); 

                    $('#unbilledgrcount').text(obj['unbilledgrcount']);
                    $('#total_bill_amount').text(obj['total_billing_count'] + ' / '+obj['total_billing_amount']);

                    $('#received_bill_amount').text(obj['total_received_bill'] + ' / '+ obj['total_payment_received']);
                    $('#delivered_delivery').text(obj['delivered_delivery']);                                         
                    $('#pending_bill_amount').text((obj['total_billing_count'] - obj['total_received_bill']) + ' / '+ obj['currentbillpendingamount']);
                    

                }
            });
        });
    </script>
    
</body>

