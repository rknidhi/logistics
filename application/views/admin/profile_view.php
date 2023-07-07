<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Material Pro Admin Template - The Most Complete & Trusted Bootstrap 4 Admin Template</title>
        <?php $this->load->view('includes/head'); ?> 
    </head>

    <body class="fix-header card-no-border logo-center">
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
                    <div class="row page-titles">
                        <div class="col-md-5 col-8 align-self-center">
                            <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <!-- Row -->
                    <div class="row">
                        <!-- Column -->
                        <div class="col-lg-4 col-xlg-3 col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <center class="m-t-0"> <img src="<?= $base_url ?>assets/images/users/5.jpg" class="img-circle" width="150" />
                                        <h4 class="card-title m-t-0"><?= $user_profile->user_firstname ?> <?= $user_profile->user_lastname ?></h4>
                                    </center>
                                </div>
                                <div>
                                    <hr> </div>
                                <div class="card-body"> <small class="text-muted">Email address </small>
                                    <h6><?php echo $this->flexi_auth->get_user_identity(); ?></h6> 
                                    <small class="text-muted p-t-30 db">Phone</small>
                                    <h6>+91 654 784 547</h6> 
                                    <small class="text-muted p-t-30 db">Address</small>
                                    <h6>Delhi</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-8 col-xlg-9 col-md-7">
                            <div class="card">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs profile-tab" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="profile" role="tabpanel">
                                        <div class="card-body">
                                            <form class="row clearfix" id="form_validation" method="POST" enctype="multipart/form-data">
                                                <div class="col-md-12 col-lg-12">

                                                    <div class="form-group col-md-6">     
                                                        <label>First Name</label>                          
                                                        <input type="text" id="user_firstname" name="update_user_firstname" value="<?php echo set_value('update_user_firstname', $user_profile->user_firstname); ?>" class="form-control" required data-validation-required-message="This field is required">
                                                    </div>

                                                    <div class="form-group col-md-6">     
                                                        <label>Last Name</label>                          
                                                        <input type="text" id="user_lastname" name="update_user_lastname" value="<?php echo set_value('update_user_lastname', $user_profile->user_lastname); ?>" class="form-control" required data-validation-required-message="This field is required">
                                                    </div>

                                                    <div class="form-group col-md-6">     
                                                        <label>Phone</label>                          
                                                        <input type="text" id="phone_number" name="update_phone_number" value="<?php echo set_value('update_phone_number', $user_profile->user_phone); ?>" class="form-control" required data-validation-required-message="This field is required">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label>Photo</label>
                                                        <input type="file" name="image_em" class="form-control">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="form-group col-md-12 m-t-10 text-center">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-raised btn-primary btn-round waves-effect" name="update_account" value="Update">Update Profile</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="settings" role="tabpanel">
                                        <div class="card-body">
                                            <form class="row clearfix" id="form_validation" method="POST">
                                                <div class="col-md-12 col-lg-12">

                                                    <div class="form-group col-md-6">     
                                                        <label>Current Password</label>                          
                                                        <input type="password" id="current_password" name="current_password" value="<?php echo set_value('current_password'); ?>" class="form-control" required data-validation-required-message="This field is required">
                                                    </div>

                                                    <div class="form-group col-md-6">     
                                                        <label>New Password</label>                          
                                                        <input type="password" id="new_password" name="new_password" value="<?php echo set_value('new_password'); ?>" class="form-control" required data-validation-required-message="This field is required">
                                                    </div>

                                                    <div class="form-group col-md-6">     
                                                        <label>Confirm New Password</label>                          
                                                        <input type="password" id="confirm_new_password" name="confirm_new_password" value="<?php echo set_value('confirm_new_password'); ?>" class="form-control" required data-validation-required-message="This field is required">
                                                    </div>

                                                    <div class="clearfix"></div>
                                                    <div class="form-group col-md-12 m-t-10 text-center">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-raised btn-primary btn-round waves-effect" name="change_password" value="Update">Change Password</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                    <!-- Row -->
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->
                    <div class="right-sidebar">
                        <div class="slimscrollright">
                            <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                            <div class="r-panel-body">
                                <ul id="themecolors" class="m-t-20">
                                    <li><b>With Light sidebar</b></li>
                                    <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                    <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                    <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                    <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                                    <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                    <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                    <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                    <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                    <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                    <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                    <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                    <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                    <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                                </ul>
                                <ul class="m-t-20 chatonline">
                                    <li><b>Chat option</b></li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                    </li>
                                </ul>
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
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
        <?php $this->load->view('includes/scripts'); ?> 
    </body>

</html>