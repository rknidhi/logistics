<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Job</title>
        <?php $this->load->view('includes/head'); ?> 
        <link href="<?= $base_url ?>assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="<?= $base_url ?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $base_url ?>assets/css/form-css.css" rel="stylesheet" type="text/css" />
        <style>
            table th {
                font-weight: 400;
                font-size: 14px;
                padding: 5px;
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
                    <!-- Row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline-primary">
                                <div class="card-header ">
                                    <h4 class="m-b-0 text-white">Edit Job</h4>
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
                                        <div class="col-lg-12">
                                            <form class="m-t-10" id="form_validation" novalidate method="POST">
                                        <input type="hidden" name="jobid" id="jobid" value="<?php echo $jobs->jobid;?>" class="form-control"> 
                                                <fieldset>
                                                    <legend>Job </legend>
                                                    <table width="100%">
                                                    <tr>
                                                        <td><label class="control-label">J-Ref-No.:</label></td>
                                                        <td>
                                                            <input type="text" name="job_ref_no" id="job_ref_no" class="form-control" value="<?php echo $jobs->job_ref_no;?>" readonly>
                                                        </td>
                                                        <td><label class="control-label">From:</label></td>
                                                        <td>
                                                            <input type="text" name="jfrom" id="jfrom" class="form-control" value="<?php echo $jobs->jfrom;?>" readonly>
                                                        </td>
                                                        <td><label class="control-label">To:</label></td>
                                                        <td>
                                                            <input type="text" name="jto" id="jto" class="form-control" value="<?php echo $jobs->jto;?>" readonly>
                                                        </td>
                                                        <td><label class="control-label">Job Amount:</label></td>
                                                        <td>
                                                            <input type="text" name="jobamount" id="jobamount" class="form-control" value="<?php echo $jobs->jobamount;?>" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    <td><label class="control-label">Bill Date:</label></td>
                                                        <td>
                                                            <input type="date" name="billdate" id="billdate" class="form-control" value="<?php echo $jobs->billdate;?>" >
                                                        </td>
                                                        <td><label class="control-label">Bill Number:</label></td>
                                                        <td>
                                                            <input type="text" name="billno" id="billno" class="form-control" value="<?php echo $jobs->billno;?>" >
                                                        </td>
                                                        <td><label class="control-label">Bill Amount:</label></td>
                                                        <td>
                                                            <input type="text" name="billamount" id="billamount" class="form-control" value="<?php echo $jobs->billamount;?>" >
                                                        </td>
                                                        <td><label class="control-label">Payment Date:</label></td>
                                                        <td>
                                                            <input type="date" name="paymentdate" id="paymentdate" class="form-control" value="<?php echo $jobs->paymentdate;?>"  >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label">Job Cost:</label></td>
                                                        <td>
                                                            <input type="text" name="jobcost" id="jobcost" class="form-control" value="<?php echo $jobs->jobcost;?>" >
                                                        </td>
                                                        
                                                        <td><label class="control-label">Remarks:</label></td>
                                                        <td colspan="5">
                                                            <input type="text" name="qremarks" id="qremarks" class="form-control" value="<?php echo $jobs->qremarks;?>">
                                                        </td>
                                                        
                                                    </tr>
                                                       
                                                    </table>

                                                    <br>
                                                    <fieldset>
                                                        <legend> Vehicle Details</legend>
                                                        <table width="100%" id="tbljobvechile" border="1">
                                                            <thead>
<!--                                                             <tr>
                                                                <th>#</th>
                                                                <th>Vehicle No.</th>
                                                                <th>LR No.</th>
                                                                <th>LR Date</th>
                                                                <th>Delivery Date</th>
                                                                <th>Freight Amount</th>
                                                                <th>Detention Amount</th>
                                                                <th>Challan Amount</th>
                                                                <th>Other Amount</th>
                                                                <th>Vendor Name</th>
                                                                <th>Vehicle Hire</th>
                                                                <th>Detention Hire</th>
                                                                <th>Total Cost</th>
                                                            </tr> -->
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Vehicle No.</th>
                                                            <th>LR No.</th>
                                                            <th>LR Date</th>
                                                            <th>Delivery Date</th>
                                                            <th>Vendor Name</th>
                                                            <th>Vehicle Hire</th>
                                                            <th>Advance</th>
                                                            <th>RTO</th><!-- Challan replace with RTO-->
                                                            <th>Detention Cost</th>
                                                            <th>Other Cost</th>
                                                            <th>Total Cost</th>
                                                            <th>Booking Amount</th><!--Freight amount replace with Booking Amount--> 
                                                            <th>Detention Amount</th><!-- Add new column -->
                                                            <th>Other Amount</th><!-- Add new column -->
                                                            <th>Total Amount</th><!-- Add new column -->
                                                        </tr>                                                            
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                            $srn = 1;
                                                                foreach ($jobs_vechile_rate as $row) {
                                                            ?>
                                                            <input type="hidden" name="vdate[<?php echo $row->jbovid;?>][jobvid]" id="jobvid_<?php echo $row->jbovid;?>" value="<?php echo $row->jbovid;?>" class="form-control" >

                                                            <tr><td><?php echo $srn;?></td>
                                                            
                                                            <td><input type="text" name="vdate[<?php echo $row->jbovid;?>][vehicleno]" id="vehicleno_<?php echo $row->jbovid;?>" value="<?php echo $row->vehicleno;?>" class="form-control" ></td>

                                                            <td><input type="text" name="vdate[<?php echo $row->jbovid;?>][lrno]" id="lrno_<?php echo $row->jbovid;?>" value="<?php echo $row->lrno;?>" class="form-control" ></td>
                                                            
                                                            <td><input type="date" name="vdate[<?php echo $row->jbovid;?>][lrdate]" id="lrdate_<?php echo $row->jbovid;?>" value="<?php echo $row->lrdate;?>" class="form-control" ></td>
                                                            
                                                            <td><input type="date" name="vdate[<?php echo $row->jbovid;?>][deliverydate]" id="deliverydate_<?php echo $row->jbovid;?>" value="<?php echo $row->deliverydate;?>" class="form-control" ></td>
                                                            

                                                            <td><input type="text" name="vdate[<?php echo $row->jbovid;?>][vendor_name]" id="vendor_name_<?php echo $row->jbovid;?>" value="<?php echo $row->vendor_name;?>" class="form-control" ></td>


                                                            <td><input type="text" name="vdate[<?php echo $row->jbovid;?>][vechile_hire]" id="vechile_hire_<?php echo $row->jbovid;?>" value="<?php echo $row->vechile_hire;?>" class="form-control" ></td>


                                                            <td><input type="text" name="vdate[<?php echo $row->jbovid;?>][advance_amt]" id="advance_amt_<?php echo $row->jbovid;?>" value="<?php echo $row->advance_amt;?>" class="form-control" ></td>
                                                            
                                                            <td><input type="text" name="vdate[<?php echo $row->jbovid;?>][rto_amt]" id="rto_amt_<?php echo $row->jbovid;?>" value="<?php echo $row->rto_amt;?>" class="form-control" ></td>

                                                            <td><input type="text" name="vdate[<?php echo $row->jbovid;?>][detention_cost]" id="detention_cost_<?php echo $row->jbovid;?>" value="<?php echo $row->detention_cost;?>" class="form-control" ></td>


                                                            <td><input type="text" name="vdate[<?php echo $row->jbovid;?>][other_cost]" id="other_cost_<?php echo $row->jbovid;?>" value="<?php echo $row->other_cost;?>" class="form-control" ></td>


                                                            <td><input type="text" name="vdate[<?php echo $row->jbovid;?>][total_cost]" id="total_cost_<?php echo $row->jbovid;?>" value="<?php echo $row->total_cost;?>" class="form-control" ></td>

                                                            <td><input type="text" name="vdate[<?php echo $row->jbovid;?>][booking_amt]" id="booking_amt_<?php echo $row->jbovid;?>" value="<?php echo $row->booking_amt;?>" class="form-control" ></td>

                                                           
                                                            <td><input type="text" name="vdate[<?php echo $row->jbovid;?>][destihire_amt]" id="destihire_amt_<?php echo $row->jbovid;?>" value="<?php echo $row->destihire_amt;?>" class="form-control" ></td>
                                                            
                                                            <td><input type="text" name="vdate[<?php echo $row->jbovid;?>][other_amt]" id="other_amt_<?php echo $row->jbovid;?>" value="<?php echo $row->other_amt;?>" class="form-control" ></td>
                                                            
                                                            <td><input type="text" name="vdate[<?php echo $row->jbovid;?>][total_amt]" id="total_amt_<?php echo $row->jbovid;?>" value="<?php echo $row->total_amt;?>" class="form-control" ></td></tr>

                                                           <?php 
                                                           $srn++;
                                                            }
                                                           ?>     
                                                        </tbody>
                                                        </table>
                                                    </fieldset>
                                                </fieldset>
                                                <div class="form-group col-md-12 text-center">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-success btn1" name="submit" value="Submit"> Submit</button>
                                                        <button type="button" class="btn btn-danger btn1 close-me" class="btn btn-info btn1"><i class="fa  fa-times"></i> Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
        <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
        <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="<?= $base_url ?>assets/plugins/jquery-validation/dist/jquery.validate.js"></script>
        <script src="<?= $base_url ?>assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script>


$('.singledate').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'dd-mm-yyyy',
    orientation: "bottom auto"
});
$(".select2").select2();

$('.close-me').click(function () {
    var id = $(this).attr('id');
    $.confirm({
        icon: 'fa fa-times',
        title: 'Confirm!',
        content: 'Are you sure you want to close?',
        animation: 'zoom',
        closeAnimation: 'none',
        buttons: {
            confirm: function () {
                window.location.href = '<?= $base_url ?>jobenquiry/view_job';
            },
            cancel: function () {
            }
        }

    });
});


</script>
</body>
</html>