<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->config->item('title_prefix'); ?> : Delivery Receipt</title>
    <?php $this->load->view('includes/head'); ?>
    <link href="<?= $base_url ?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= $base_url ?>assets/plugins/jquery-validation/demo/css/screen.css">
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
                <!-- Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-primary">
                            <div class="card-header ">
                                <h4 class="m-b-0 text-white">Edit DR</h4>
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
                               <?php
                                $lhc_added_on = convertToHumanDate($delivery_details->added_on);
                                $vechile = $this->function_library->FindVehicle($delivery_details->vehicle_id_fk);
                                $branch = $this->function_library->FindBrachAgent($delivery_details->branch_id_fk);    
                               ?>


                                <form class="m-t-10" id="form_validation" novalidate action="" method="POST">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <legend>Delivery Receipt</legend>
                                                <table width="100%">
                                                    <tr>
                                                        <td><label>DR Number : </label></td>
                                                        <td><input type="text" value="<?=$delivery_details->delivery_id?>"
                                                                onkeypress="return isNumber(event)" id="lhc_number"
                                                                class="form-control" style="font-weight:bold;" required readonly>
                                                        </td>

                                                        <td><label>DR Date : </label></td>
                                                        <td><input type="text" name="data[added_on]" id="added_on"
                                                                class="form-control singledate"
                                                                value="<?= $lhc_added_on ?>"></td>

                                                        <td><label>Branch : </label></td>
                                                        <td><input type="text" id="added_on"
                                                                class="form-control singledate"
                                                                value="<?= $branch ?>" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label ">Vehicle No. :</label></td>
                                                        <td><input type="text" value="<?= $vechile?>"
                                                                id="vehicle_no" class="form-control" required  readonly></td>

                                                        <td><label class="">From Station :</label></td>
                                                        <td><input type="text" value="<?= $delivery_details->from_station?>"
                                                                id="from_station" class="form-control" required
                                                                readonly></td>

                                                        <td><label>To Station : </label></td>
                                                        <td><input type="text" value="<?= $delivery_details->to_station ?>" id="to_station"
                                                                class="form-control" required readonly></td>
                                                    </tr>
                                                    
                                                </table>
                                            </fieldset>

                                            <fieldset>
                                                <legend>Add Challan</legend>
                                                <table width="100%">
                                                    <tr>
                                                        <td><label class="control-label">Select Challan No. :
                                                            </label></td>
                                                        <td><input type="text" value="<?=$lhc_details->lhc_number?>"
                                                                id="booking_party" class="form-control" readonly></td>
                                                        <td><label class="control-label">Challan Date :
                                                            </label></td>
                                                        <td><input type="text" value="<?=convertToHumanDate($lhc_details->added_on)?>"
                                                                id="booking_party" class="form-control" readonly></td>
                                                        <td><label class="control-label">Remarks : </label></td>
                                                        <td width="20%"><input type="text" name="data[remark]" value="<?=$delivery_details->remark  ?>"
                                                                id="booking_party" class="form-control"></td>
                                                    </tr>
                                                </table>
                                                <fieldset style="background:white;">
                                                    <legend>GR Details</legend>
                                                    <div class="table-responsive trackTable">
                                                        <table width="100%"
                                                            class="table  table-striped table-bordered ">
                                                            <tr>
                                                            <th>Sr. No.</th>
                                                                <th>GR. No.</th>
                                                                <th>Consignor</th>
                                                                <th>Consignee</th>
                                                                <th>Package</th>
                                                                <th>Quantity</th>
                                                                <th>Weight</th>
                                                                <th>Delivery Type</th>

                                                            </tr>
                                                            <?php
                                                            $srno = 1;
                                                            $CI =& get_instance();
                                                            $grdetails = explode(',',$grdetails);
                                                            $grdetails = array_filter($grdetails);

                                                            foreach($grdetails as $row => $value){
                                                                $pack_method = ''; 
                                                                $pack_method_name = '';                                 
                                                                $count_items = $CI->functions->get_sum_of_column('tbl_gr_items','item_qty','bgr_id', $value);
                                                                $item_weight = $CI->functions->get_sum_of_column('tbl_gr_items','item_weight','bgr_id', $value);
                                                                $gr_data = $CI->functions->get_single_row('booking_gr', 'bgr_id', $value);
                                                                $gr_item_data = $CI->functions->get_all_row_id_based('tbl_gr_items','bgr_id',$value);
                                                                if(count($gr_item_data)>1){
                                                                    foreach($gr_item_data as $item_row){
                                                                        $pack_method_name .= ', '.$this->function_library->FindPackage($item_row->item_method_of_pack_fk);
                                                                    }
                                                                    $pack_method_name = substr($pack_method_name, 1);
                                                                }
                                                                else{
                                                                    $pack_method = $CI->functions->get_single_row_colum('tbl_gr_items','item_method_of_pack_fk','bgr_id',$gr_item_data[0]->bgr_id);
                                                                    $pack_method_name = $this->function_library->FindPackage($pack_method);
                                                                }
                                                            
                                                            ?>
                                                            <tr>
                                                                <td><?=$srno?></td>
                                                                <td><?=$value ?></td>
                                                                <td><?=$this->function_library->FindPartyDetails($gr_data->consignor_id_fk)->party_name?></td>
                                                                <td><?=$this->function_library->FindPartyDetails($gr_data->consignee_id_fk)->party_name?></td>
                                                                <td><?=$pack_method_name?></td>
                                                                <td><?=$count_items?></td>
                                                                <td><?=$item_weight?></td>
                                                                <td><?=$gr_data->delivery?></td>
                                                            </tr>

                                                          <?php
                                                          $srno++;
                                                          }
                                                          ?>
                                                        </table>
                                                    </div>
                                                </fieldset>
                                            </fieldset>
                                           

                                        </div>
                                 
                                        <div class="form-group col-md-12 text-center">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-success btn1" name="submit"
                                                    value="Submit"> Submit</button>
                                                <button type="submit" class="btn btn btn-info btn1" name="submit"
                                                    value="Print"><i class="fa fa-print"></i> Print</button>
                                                <button type="button" class="btn btn-danger btn1 close-me"
                                                    class="btn btn-info btn1"><i class="fa  fa-times"></i>
                                                    Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

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

        <script src="<?= $base_url ?>assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript">
        </script>
        <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet"
            type="text/css" />
        <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="<?= $base_url ?>assets/plugins/jquery-validation/dist/jquery.validate.js"></script>
        <script>

        // End
        </script>
</body>

</html>