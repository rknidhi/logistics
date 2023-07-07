<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->config->item('title_prefix'); ?> : Add Enquiry</title>
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
                                <h4 class="m-b-0 text-white">Edit Enquiry</h4>
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
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <legend>Edit Enquiry Details</legend>
                                                <table width="100%" >
                                                    <tr>
                                                        <td><label class="control-label">E-Ref-No.:</label></td>
                                                        <input type="hidden" name="enqid" value="<?=$enquiry_details->enqid;?>">
                                                        <td>
                                                            <input type="text" name="enq_ref_no" id="enq_ref_no" class="form-control" value="<?=$enquiry_details->enq_ref_no;?>" readonly>
                                                        </td>
                                                        <td><label class="control-label">Date:</label></td>
                                                        <td>
                                                            <input type="date" name="enquiry_date" id="enquiry_date" class="form-control" value="<?=$enquiry_details->enquiry_date;?>" >
                                                        </td>
                                                        <td><label class="control-label">Company:</label></td>
                                                        <td>
                                                            <input type="text" name="company_name" id="company_name" class="form-control" value="<?=$enquiry_details->company_name;?>">
                                                        </td>
                                                        <td><label class="control-label">Person:</label></td>
                                                        <td>
                                                            <input type="text" name="person_name" id="person_name" class="form-control" value="<?=$enquiry_details->person_name;?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label">From:</label></td>
                                                        <td>
                                                            <input type="text" name="station_from" id="station_from" class="form-control" value="<?=$enquiry_details->station_from;?>">
                                                        </td>
                                                        <td><label class="control-label">State:</label></td>
                                                        <td>
                                                            <input type="text" name="state_from" id="state_from" class="form-control" value="<?=$enquiry_details->state_from;?>">
                                                        </td>
                                                        <td><label class="control-label">To:</label></td>
                                                        <td>
                                                            <input type="text" name="station_to" id="station_to" class="form-control" value="<?=$enquiry_details->station_to;?>">
                                                        </td>
                                                        <td><label class="control-label">State:</label></td>
                                                        <td>
                                                            <input type="text" name="state_to" id="state_to" class="form-control" value="<?=$enquiry_details->state_to;?>">
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><label class="control-label">Distance:</label></td>
                                                        <td>
                                                            <input type="text" name="distance" id="distance" class="form-control" value="<?=$enquiry_details->distance;?>">
                                                        </td>
                                                        <td><label class="control-label">Remarks:</label></td>
                                                        <td colspan="5">
                                                            <input type="text" name="remark" id="remark" class="form-control" value="<?=$enquiry_details->remark;?>">
                                                        </td>
                                                    </tr>
                                                   
                                                   
                                                </table>
                                                <fieldset>
                                                        <legend>Edit Vehicle Type Details</legend>
                                                        <table width="100%" id="vechileEnqTbl">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Vehicle Type</th>
                                                                <th>Weight</th>
                                                                <th>Length</th>
                                                                <th>Width</th>
                                                                <th>Height</th>
                                                                <th>No. Of Vehicle</th>
                                                                <th>Material</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                            <?php
                                                            $sn = 1;
                                                            ?>
                                                           <tbody> 
                                                        <?php

                                                            foreach ($enquiry_vechile_details as $row) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $sn; ?></td>
                                                                <td>
                                                                    <input type="text" name="data[vechile_type][<?= $row->vid; ?>]" id="vechile_type_<?= $row->vid; ?>" class="form-control" value="<?= $row->vechile_type; ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="data[weight][<?= $row->vid; ?>]" id="weight_<?= $row->vid; ?>" class="form-control" value="<?= $row->weight; ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="data[length][<?= $row->vid; ?>]" id="length_<?= $row->vid; ?>" class="form-control" value="<?= $row->length; ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="data[width][<?= $row->vid; ?>]" id="width_<?= $row->vid; ?>" class="form-control" value="<?= $row->width; ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="data[height][<?= $row->vid; ?>]" id="height_<?= $row->vid; ?>" class="form-control" value="<?= $row->height; ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="data[no_of_vechile][<?= $row->vid; ?>]" id="no_of_vechile_<?= $row->vid; ?>" class="form-control" value="<?= $row->no_of_vechile; ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="data[meterial][<?= $row->vid; ?>]" id="meterial_<?= $row->vid; ?>" class="form-control" value="<?= $row->meterial; ?>">
                                                                </td>
                                                                
                                                            </tr>
                                                             <?php 
                                                             $sn++;
                                                              }
                                                             ?>   
                                                        </tbody>
                                                        </table>
                                                    </fieldset>


                                            </fieldset>

                                        </div>
                                        <div class="form-group col-md-12 text-center">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-success btn1" name="submit"
                                                    value="Submit">  Submit</button>
                                                
                                                <button type="button" class="btn btn-danger btn1 close-me"
                                                    class="btn btn-info btn1"><i class="fa fa-times"></i>
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
                window.location.href = '<?= $base_url ?>jobenquiry/view_enquiry';
            },
            cancel: function () {
            }
        }

    });
});    
</script>

</body>

</html>