<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Update Account</title>
        <?php $this->load->view('includes/head'); ?> 
        <link href="<?= $base_url ?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?= $base_url ?>assets/plugins/jquery-validation/demo/css/screen.css">
        <link href="<?= $base_url ?>assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline-primary">
                                <div class="card-header ">
                                    <h4 class="m-b-0 text-white">Update User Accounts</h4>
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
                    
                    <!-- ============================================================== -->
                    <!-- End Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <!-- Row -->
                    <fieldset>
                        <legend>Edit Profile</legend>
                    
                    <div class="row">
                        <div class="col-lg-6 col-xlg-9 col-md-6">
                            <div class="card">
                                <div class="body">
                                    <?php if (!empty($message)) { ?>
                                        <div id="message">
                                            <?php echo $message; ?>
                                        </div>
                                    <?php } ?>
                                    <form class="m-t-11" id="form_validation" method="POST" enctype="multipart/form-data">
                                        <div class="col-md-12 col-lg-12">
                                            <div class="row">
                                                <div class="form-group col-md-6">     
                                                    <label>First Name</label>                          
                                                    <input type="text" id="user_firstname" name="update_user_firstname" value="<?php echo set_value('update_user_firstname', $user_profile->user_firstname); ?>" class="form-control" required data-validation-required-message="This field is required">
                                                </div>

                                                <div class="form-group col-md-6">     
                                                    <label>Last Name</label>                          
                                                    <input type="text" id="user_lastname" name="update_user_lastname" value="<?php echo set_value('update_user_lastname', $user_profile->user_lastname); ?>" class="form-control" required data-validation-required-message="This field is required">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">     
                                                    <label>Phone</label>                          
                                                    <input type="text" id="phone_number" name="update_phone_number" value="<?php echo set_value('update_phone_number', $user_profile->user_phone); ?>" class="form-control" required data-validation-required-message="This field is required">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Photo</label>
                                                    <input type="file" name="image_em" class="form-control">
                                                </div>
                                            </div>

                                            <div class="clearfix"></div>
                                            <div class="form-group col-md-12 m-t-10 text-center">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-raised btn-primary btn-round waves-effect" name="update_account" value="Update">Update Profile</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                    <!-- Row -->
                    </fieldset>
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                                </div>
                    <!-- ============================================================== -->
                    <!-- Right sidebar -->
                            </div>
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->
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
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <?php $this->load->view('includes/scripts'); ?> 
        <script src="<?= $base_url ?>assets/plugins/jquery-validation/dist/jquery.validate.js"></script>
        <script>
            $(function () {
                $('#form_validation').validate({
                    highlight: function (input) {
                        $(input).parents('.form-line').addClass('error');
                    },
                    unhighlight: function (input) {
                        $(input).parents('.form-line').removeClass('error');
                    },
                    errorPlacement: function (error, element) {
                        $(element).parents('.form-group').append(error);
                    },
                });
            });
        </script>
    </body>

</html>