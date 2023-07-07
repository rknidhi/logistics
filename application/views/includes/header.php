<nav class="navbar top-navbar navbar-expand-md navbar-light">
    <!-- ============================================================== -->
    <!-- Logo -->
    <!-- ============================================================== -->
    <div class="navbar-header">
        <a class="navbar-brand" href="<?= base_url(); ?>">
            <span>
                <img src="<?= $base_url ?>assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                <img src="<?= $base_url ?>assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
            </span> </a>
    </div>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->

    <div class="navbar-collapse">
        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav mr-auto mt-md-0">
            <!-- This is  -->
            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
            <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Messages -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End Messages -->
            <!-- ============================================================== -->
            
        </ul>

        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <ul class="navbar-nav my-lg-0">
            <!-- ============================================================== -->
            <!-- Comment -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End Comment -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Messages -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- End Messages -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Profile -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
                
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome 
                    <?php
                    if (empty($user_profile->user_profile_pic)) {
                        echo '<img src="' . $base_url . 'assets/images/users/1.jpg" alt="User" class="profile-pic" />';
                    } else {
                        echo '<img src="' . $base_url . 'uploaded_files/user_profile/' . $user_profile->user_profile_pic . '" alt="User" class="profile-pic" />';
                    }
                    ?>    
                </a>
                <div class="dropdown-menu dropdown-menu-right scale-up">
                    <ul class="dropdown-user">
                        <li>
                            <div class="dw-user-box">

                                <div class="u-text">
                                    <h4><?= $user_profile->user_firstname ?> <?= $user_profile->user_lastname ?></h4>
                                    <p class="text-muted"><?php echo $this->flexi_auth->get_user_identity(); ?></p></div>
                            </div>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $base_url; ?>auth_public/update_account"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="<?php echo $base_url; ?>auth_public/change_password"><i class="ti-wallet"></i> Update Password</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $base_url; ?>auth/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>

</nav>