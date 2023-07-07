<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Quote</title>
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
                    <!-- Row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline-primary">
                                <div class="card-header ">
                                    <h4 class="m-b-0 text-white">Quote</h4>
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
                                                <input type="hidden" name="quoteid" id="quoteid" value="<?php echo $quote->quoteid;?>">

                                                <fieldset>
                                                    <legend>Quote </legend>
                                                    <table width="100%">
                                                    <tr>
                                                        <td><label class="control-label">Q-Ref-No.:</label></td>
                                                        <td>
                                                            <input type="text" name="quote_ref_no" id="quote_ref_no" class="form-control" value="<?php echo $quote->quote_ref_no;?>" readonly>
                                                            <input type="hidden" name="enqid_fk" id="enqid_fk" value="<?php echo $quote->enqid_fk;?>" class="form-control"> 
                                                        </td>
                                                        <td><label class="control-label">From:</label></td>
                                                        <td>
                                                            <input type="text" name="from" id="from" class="form-control" value="<?php echo $enquiry->station_from;?>" disabled>
                                                        </td>
                                                        <td><label class="control-label">To:</label></td>
                                                        <td>
                                                            <input type="text" name="to" id="to" class="form-control" value="<?php echo $enquiry->station_to;?>" disabled>
                                                        </td>
                                                        <td><label class="control-label">Distance:</label></td>
                                                        <td>
                                                            <input type="text" name="distance" id="distance" class="form-control" value="<?php echo $enquiry->distance;?>" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label">Remarks:</label></td>
                                                        <td colspan="7">
                                                            <input type="text" name="remark" id="remark" class="form-control" value="<?php echo $quote->remark;?>">
                                                        </td>
                                                        
                                                    </tr>
                                                    </table>                                            
                                                </fieldset>
                                                
<!-- Special -->
                                            <?php  
                                                $ind = 1;
                                                foreach ($enq_vechile_details as $row) {
                                            ?>

                                              <div id="tbl0<?= $ind;?>">
                                                <fieldset>
                                                    <legend>Vendor Rate Input Details</legend>
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                        <td><label class="control-label">Vehicle Type:</label></td>
                                                        <td>
                                                            <input type="text" name="vtype<?= $ind;?>" id="vtype<?= $ind;?>" class="form-control" value="<?php echo $row->vechile_type;?>" disabled>
                                                        </td>
                                                        <td><label class="control-label">Weight:</label></td>
                                                        <td>
                                                            <input type="text" name="weight<?= $ind;?>" id="weight<?= $ind;?>" class="form-control" value="<?php echo $row->weight;?>" disabled>
                                                        </td>
                                                        <td><label class="control-label">Length:</label></td>
                                                        <td>
                                                            <input type="text" name="lenght<?= $ind;?>" id="length<?= $ind;?>" class="form-control" value="<?php echo $row->length;?>" disabled>
                                                        </td>
                                                        <td><label class="control-label">Width:</label></td>
                                                        <td>
                                                            <input type="text" name="width<?= $ind;?>" id="width<?= $ind;?>" class="form-control" value="<?php echo $row->width;?>" disabled>
                                                        </td>
                                                        <td><label class="control-label">Height:</label></td>
                                                        <td>
                                                            <input type="text" name="height<?= $ind;?>" id="height<?= $ind;?>" class="form-control" value="<?php echo $row->height;?>" disabled >
                                                        </td>
                                                        <td><label class="control-label">No. Of Vehicle:</label></td>
                                                        <td>
                                                            <input type="text" name="numvechile<?= $ind;?>" id="numvechile<?= $ind;?>" class="form-control" value="<?php echo $row->no_of_vechile;?>" disabled>
                                                        </td>
                                                    </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <input type="hidden" name="enqid_vechle_fk<?= $ind;?>" id="enqid_vechle_fk<?= $ind;?>" value="<?php echo $row->vid;?>" class="form-control">                                                     
                                                    <fieldset>
                                                        <legend> Vendor Rate Input Details</legend>
                                                        <table width="70%" id="myTable1">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Vendor Name</th>
                                                                <th>Rate</th>
                                                                <th>Rate (RTO)</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                           <tbody>
                                                            <?php
                                                            $sn1 = 1;
                                                            $wh = array(
                                                                'quoteid_fk' => $quote->quoteid,
                                                                'enqid_fk'   => $enquiry->enqid,
                                                                'vid_fk'     => $row->vid
                                                            );
                                                            $vechile_fare = $this->db->where($wh)->get('tbl_vechile_rate')->result();
                                                             foreach($vechile_fare as $vc) { 
                                                            ?>
                                                                <input type="hidden" name="data[data<?=$ind;?>][vechile_id][<?= $sn1 ?>]" id="vechile_id<?=$ind;?>_<?= $sn1 ?>" value="<?php echo $vc->rateid;?>">
                                                            <tr>
                                                                <td width="5%"><?=$sn1;?></td>
                                                                <td width="30%">
                                                                    <input type="text" name="data[data<?=$ind;?>][vendor_name][<?= $sn1 ?>]" id="vendor_name<?=$ind;?>_<?= $sn1 ?>" class="form-control" value="<?php echo $vc->vendor_name;?>">
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data<?=$ind;?>][rate][<?= $sn1 ?>]" id="rate<?=$ind;?>_<?= $sn1 ?>" class="form-control"  value="<?php echo $vc->rate;?>">
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data<?=$ind;?>][rate_rto][<?= $sn1 ?>]" id="rate_rto<?=$ind;?>_<?= $sn1 ?>" class="form-control"  value="<?php echo $vc->rate_rto;?>"></td>
                                                                <td width="10%"></td>
                                                            </tr>
                                                            <?php
                                                            $sn1++;
                                                                }
                                                             ?>
                                                        </tbody>
                                                        </table>
                                                    </fieldset>
                                                </fieldset>
                                            </div>

                                            <?php  
                                            $ind++;
                                                }
                                            ?>
                                        <!-- End -->                                            
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

            $("#form_validation2").validate();
            $("#form_validation").validate();
            $('.singledate').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'dd-mm-yyyy',
                orientation: "bottom auto"
            });
            $(".select2").select2();

            function go_to_edit(url) {
                window.location.href = url;
            }

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
                window.location.href = '<?= $base_url ?>jobenquiry/view_quote';
            },
            cancel: function () {
            }
        }

    });
});

        </script>

<!-- End -->        
    </body>

</html>