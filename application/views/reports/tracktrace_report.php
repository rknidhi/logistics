<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <title><?php echo $this->config->item('title_prefix'); ?> : Track & Trace</title>
        <base href="<?php echo base_url() ?>" />
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
                    <!-- Changes by Moosa -->
                    <div class="row">
                        <!-- Column -->
                        <div class="col-md-12">
                            <div class="card card-outline-primary">
                                <div class="card-header ">
                                    <h4 class="m-b-0 text-white">Track & Trace</h4>
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
                                        <div class="col-md-12">

                                            <form class="m-t-10" id="form_validation" novalidate action="" method="POST">
                                                <fieldset>
                                                    <legend>Search GR</legend>
                                                    <table>
                                                        <tr>                                                            
                                                            <td><label class="control-label ">GR No.</label></td>
                                                            <td><input type="text" name="gr_no" value="<?= $this->input->post('gr_no') ?>" onkeypress="return isNumber(event)"  class="form-control" required></td>
                                                            <td align="right"><input type="submit" name="submit" value="Get Details" class="btn btn-info"></td>
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                            </form>
                                          
                                        </div>
                                    </div> 
                                <?php
                                    if($display):
                                    echo  "<br>";
                                ?>
                               <div class="myTable">
                               <fieldset style="background:#fff">
                                    <legend>GR Records</legend>
                                    <div class="col-md-12">
                                        <div class="row">
                                         <?php
                                            if(!empty($grdata)):
                                         ?>
                                            <div class="col-md-6">
                                               <div class="table-responsive trackTable">
                                               <table width="100%" class="table  table-striped table-bordered ">
                                                    <tr>                                                            
                                                        <th>GR No. =></th>
                                                        <td><?= (isset($grdata->bgr_id) && !empty($grdata)) ? $grdata->bgr_id : "-"; ?></td>
                                                    </tr>
                                                    <tr>                                                            
                                                        <th>GR Date => </th>
                                                        <td><?= (isset($grdata->gr_date) && !empty($grdata)) ? convertToHumanDate($grdata->gr_date) : "-"; ?></td>
                                                    </tr>
                                                    <tr>                                                            
                                                        <th>Station From => </th>
                                                        <td><?= (isset($grdata->from_station_fk) && !empty($grdata)) ? $this->function_library->FindStation($grdata->from_station_fk) : "-"; ?></td>
                                                    </tr>
                                                    <tr>                                                            
                                                        <th>Station To => </th>
                                                        <td><?= (isset($grdata->to_station_fk) && !empty($grdata)) ? $this->function_library->FindStation($grdata->to_station_fk) : "-"; ?></td>
                                                    </tr>
                                                    <tr>                                                            
                                                        <th>Consignor =></th>
                                                        <td><?= (isset($grdata->consignor_id_fk) && !empty($grdata)) ? $this->function_library->FindPartyDetails($grdata->consignor_id_fk)->party_name : "-"; ?></td>
                                                    </tr>
                                                    <tr>                                                            
                                                        <th>Consignee =></th>
                                                        <td><?= (isset($grdata->consignee_id_fk) && !empty($grdata)) ? $this->function_library->FindPartyDetails($grdata->consignee_id_fk)->party_name : "-"; ?></td>
                                                    </tr>
                                                    <tr>                                                            
                                                        <th>Freight on GR =></th>
                                                        <td><?= (isset($grdata->s_total_freight) && !empty($grdata)) ? number_format($grdata->s_total_freight,2) : "-"; ?></td>
                                                    </tr>
                                                    <tr>                                                            
                                                        <th>Broker Name =></th>
                                                        <td><?= (isset($grdata->broker_id_fk) && !empty($grdata)) ? $this->function_library->getBrokerName($grdata->broker_id_fk) : "-"; ?></td>
                                                    </tr>
                                                    <tr>                                                            
                                                        <th>Branch =></th>
                                                        <td><?= (isset($grdata->branch_id_fk) && !empty($grdata)) ? $this->function_library->FindBrachAgent($grdata->branch_id_fk) : "-"; ?></td>
                                                    </tr>
                                                    
                                                </table>
                                               </div>
                                               <br>
                                                <div>
                                                    <fieldset>
                                                        <legend>Voucher Details</legend>
                                                        <div class="table-responsive trackTable">
                                                        <table width="100%" class="table  table-striped table-bordered ">
                                                            <tr>           
                                                                <th>Sr. No.</th>
                                                                <th>Name</th>
                                                                <th width="18%">Date</th>  
                                                                <th>Dr./Cr.</th>   
                                                                <th>Amount</th>     
                                                            </tr>
                                                            <?php
                                                            $n=1;
                                                            $expence = 0;
                                                            $income = 0;

                                                            foreach($voucherhistory as $payhistory1) {
                                                                
                                                                if($payhistory1->voucher_type == 'Sale'){
                                                                    $income +=$payhistory1->amount;
                                                                }
                                                                 if($payhistory1->voucher_type == 'Payment'){
                                                                    $expence +=$payhistory1->amount;
                                                                }
                                                             ?>
                                                                    <tr>
                                                                        <td><?= $n; ?></td>
                                                                        <td><?php //echo $this->function_library->getVoucherName($payhistory1->reference_no); ?></td>
                                                                        <td><?php echo convertToHumanDate($payhistory1->date_time); ?></td>   
                                                                    <td><?php echo $payhistory1->voucher_type ?></td>     
                                                                    <td><?php echo number_format($payhistory1->amount,2) ?></td>
                                                                    </tr>        
                                                                
                                                             <?php
                                                             $n++; 
                                                             }
                                                            ?>                                                            
                                                            
                                                        
                                                        </table>
                                                        <!--Total Credit = <?php //echo number_format($expence,2) ?> -->
                                                        </div>
                                                    </fieldset>
                                                </div>  
                                                
                                              
                                            </div>
                                            <div class="col-md-6">
                                                <div class="table-responsive trackTable">
                                                
                                                    <table width="100%" class="table  table-striped table-bordered ">
                                                    <tr>                                                            
                                                        <th>LHC No. =></th>
                                                        <td><?= (isset($lhc->lhc_number) && !empty($lhc)) ? $lhc->lhc_number : "-"; ?></td>
                                                    </tr>
                                                    <tr>                                                            
                                                        <th>Total Truck Freight =></th>
                                                        <td><?= (isset($lhc->total_freight) && !empty($lhc)) ? number_format($lhc->total_freight,2) : "-"; ?></td>
                                                    </tr>
                                                    <tr>                                                            
                                                        <th>Advance => </th>
                                                        <td><?= (isset($payamount) && !empty($payamount)) ? number_format($payamount,2) : "-"; ?></td>
                                                    </tr>
                                                    <tr>                                                            
                                                        <th>Balance =></th>
                                                        <td><?= number_format($lhc->total_freight - $payamount,2); ?></td>
                                                    </tr>
                                                    <tr>                                                            
                                                        <th>Delivery No. / Date =></th>
                                                        <td><?= (isset($deliverydetails)>0)? $deliverydetails[0]->delivery_id:'' ?> / <?= (isset($deliverydetails)>0)? convertToHumanDate($deliverydetails[0]->added_on):'' ?></td>
                                                        <!--<td><?//= (isset($grdata->delivery_received_date) && !empty($grdata)) ? convertToHumanDate($grdata->delivery_received_date) : "-"; ?></td> -->    
                                                    </tr>
                                                    <tr>                                                            
                                                        <th>POD Received Date =></th>
                                                        <td><?= (isset($grdata->pod_received_date) && !empty($grdata)) ? convertToHumanDate($grdata->pod_received_date) : "-"; ?></td>     
                                                    </tr>
                                                    <tr>                                                            
                                                        <th>Bill No. =></th>
                                                        <td><?= (isset($grdata->bill_number) && !empty($grdata)) ? $this->function_library->getBillInvoiceNo($grdata->bill_number) : "-"; ?></td>     
                                                    </tr>
                                                    <tr>                                                            
                                                        <th>Bill Date =></th>
                                                        <td><?= (isset($grdata->bill_number) && !empty($grdata)) ? convertToHumanDate($this->function_library->getBillDate($grdata->bill_number)) : "-"; ?></td>     
                                                    </tr>
                                                    <tr>                                                            
                                                        <th>Bill Amount =></th>
                                                        <td><?= (isset($grdata->bill_total) && !empty($grdata)) ? number_format($grdata->bill_total,2) : "-"; ?></td>     
                                                    </tr>
                                                    </table>
                                                </div>
                                                <br>
                                                <div>
                                                    <fieldset>
                                                        <legend>Profit & Loss</legend>
                                                        <div class="table-responsive trackTable">
                                                            <table width="100%" class="table  table-striped table-bordered ">
                                                                <tr>                                                            
                                                                    <th>Total Income</th>
                                                                    <th>Total Expances</th>
                                                                    <th>Profit & Loss</th>     
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:left;"><?=
                                                                        number_format($grdata->bill_total,2) ?></td>
                                                                    <td><?= number_format($expence, 2) ?></td>
                                                                    <td><?= number_format($grdata->bill_total - $expence,2) ?></td>
                                                                </tr>
                                                                <!--
                                                                <tr>
                                                                    <td style="text-align:left;"><?php //echo $grdata->s_total_freight ?></td>
                                                                    <td><?php //echo $lhc->truck_freight - $lhc->munshiana ?></td>
                                                                    <td><?php //echo $grdata->s_total_freight - ($lhc->truck_freight - $lhc->munshiana) ?></td>
                                                                </tr> -->
                                                            </table>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                
                                                <?php
                                                                                                            else:
                                                                echo '<div class="col-md-12"><center>No record found</center></div>';
                                                            endif;    

                                                    endif;
                                                ?> 
                                        </div>
                                    </div> 
                                </fieldset>
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

    </body>
</html>