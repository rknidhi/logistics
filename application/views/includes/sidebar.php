<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav" style="float:left;">
            <ul id="sidebarnav">
                <li class="nav-small-cap"><?php echo $this->config->item('company_name'); ?></li>
                <li>
                <a class="navbar-brand" href="<?= base_url(); ?>">
                    <span>
                        <img src="<?= $base_url ?>assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                        <!-- <img src="<?= $base_url ?>assets/images/logo-light-text.png" class="light-logo" alt="homepage" /> -->
                    </span>
                </a>
                </li>

                <!-- modified by mkuk on 17-04-2021 -->
                <!-- <li <?= $menu_nevigation == 'warehouse' ? 'class="active"' : '' ?>>
                    <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-bank"></i>JOB-ENQUIRY </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= $base_url ?>jobenquiry/enquiry">Enquiry</a></li>
                        <li><a href="<?= $base_url ?>jobenquiry/view_enquiry">View Enquiry</a></li>
                        <li><a href="<?= $base_url ?>jobenquiry/quote">Quote</a></li>
                        <li><a href="<?= $base_url ?>jobenquiry/view_quote">View Quote</a></li>
                        <li><a href="<?= $base_url ?>jobenquiry/job">Job</a></li>
                        <li><a href="<?= $base_url ?>jobenquiry/view_job">View Job</a></li>
                        
                    </ul>
                </li> -->
                <!-- end modified -->

                <li <?= $menu_nevigation == 'bookinggr' ? 'class="active"' : '' ?>>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-tooltip-edit"></i><span class="hide-menu">BOOKING</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= $base_url ?>booking">Create GR</a></li>
                        <li><a href="<?= $base_url ?>booking/view">View GR</a></li>
                    </ul>
                </li>

                <li <?= $menu_nevigation == 'challan' ? 'class="active"' : '' ?>>
                    <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-newspaper"></i><span class="hide-menu">CHALLAN</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= $base_url ?>challan/dispatch_challan">Create LHC</a></li>
                        <li><a href="<?= $base_url ?>challan/view_dispatch_challan">View LHC</a></li>
                        <li><a href="<?= $base_url ?>challan/main_challan">Main Challan</a></li>
                    </ul>
                </li>

                <li <?= $menu_nevigation == 'tracking' ? 'class="active"' : '' ?>>
                    <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-truck-delivery"></i>DELIVERY </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= $base_url ?>Delivery">Create Delivery Receipt</a></li>
                        <li><a href="<?= $base_url ?>Delivery/view_dr">View Delivery Receipt</a></li>
                        <li><a href="<?= $base_url ?>tracking">Lorry Tracking</a></li>
                    </ul>
                </li>

                <li <?= $menu_nevigation == 'pod' ? 'class="active"' : '' ?>>
                    <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-receipt"></i>POD </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= $base_url ?>pod">Pod Status</a></li>
                    </ul>
                </li>


                <li <?= $menu_nevigation == 'booking_bill' ? 'class="active"' : '' ?>>
                    <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-printer"></i>BILLING </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= $base_url ?>billing/newbilling">Create Bill With LR</a></li>
                        <li><a href="<?= $base_url ?>billing/billed">Billed Invoice</a></li>
                        <li><a href="<?= $base_url ?>billing/freshbill">Create Bill Without LR</a></li>
                    </ul>
                </li>
                
                 
                
                <li class="two-column <?= $menu_nevigation == 'reports' ? 'active' : '' ?>" >
                    <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-chart-bar"></i>REPORTS </span></a>
                    <ul aria-expanded="false" class="collapse">

                        <li><a href="<?= $base_url ?>reports/tracktrace_report">Track and Trace</a></li>
                        <li><a href="<?= $base_url ?>reports/booking_report">Booking Report</a></li>
                        <li><a href="<?= $base_url ?>reports/dispatch_report">LHC Report</a></li>
                        <li><a href="<?= $base_url ?>reports/pendinglhc_report">Pending LHC Report</a></li>
                        <li><a href="<?= $base_url ?>reports/main_challan_report">Main Challan Report</a></li>
                        <li><a href="<?= $base_url ?>reports/delivery_report">Delivery Report</a></li>
                        <li><a href="<?= $base_url ?>reports/pending_delivery_report">Pending Delivery Report</a></li>
                        <li><a href="<?= $base_url ?>reports/bookbill_report">Billed Invoice Report</a></li>
                        <li><a href="<?= $base_url ?>reports/pendingbookbill_report">Unbilled GR Report</a></li>
                        <li><a href="<?= $base_url ?>reports/pod_report">POD Report</a></li>
                        
                        <li><a href="<?= $base_url ?>reports/log_report">User Log Report</a></li>
                        <li><a href="<?= $base_url ?>reports/cancel_report">Cancelled GR Report</a></li>
                        <li><a href="<?= $base_url ?>reports/loading_report">Loading Report</a></li>
                        <li><a href="<?= $base_url ?>reports/unloading_report">Unloading Report</a></li>
                        <li><a href="<?= $base_url ?>reports/crossing_report">Crossing Ch. Report</a></li>
                        <li><a href="<?= $base_url ?>reports/tds_report">TDS Report</a></li>

                        <li><a href="<?= $base_url ?>reports/brokerage_report">Brokerage Report</a></li>
                        
                        <li><a href="<?= $base_url ?>reports/branch_report">Branch Report</a></li>
                        <li><a href="<?= $base_url ?>reports/gst_report">GST Report</a></li>
                    </ul>
                </li>

                
                <li <?= $menu_nevigation == 'tools' ? 'class="active"' : '' ?>>
                    <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-settings"></i>TOOLS </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= $base_url ?>master/user_group">User Group Master</a></li>
                        <li><a href="<?= $base_url ?>master/user_account">User Master</a></li>
                        <li><a href="<?= $base_url ?>master/user_permission">Permissions</a></li>
                        <li><a href="<?= $base_url ?>tools/phonedirectory">Phone Directory</a></li>
                        <li><a href="<?= $base_url ?>tools/stationary">Stationary Master</a></li>
                        <li><a href="<?= $base_url ?>tools/stationaryallotment">Stationary Allotment</a></li>
                        <li><a href="<?= $base_url ?>tools/programme_diary">Program Diary</a></li>

                    </ul>
                </li>
                <li class="two-column">
                    <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-calculator"></i>ACCOUNT </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= $base_url ?>accounts/head_master">Head Master</a></li>
                        <li><a href="<?= $base_url ?>accounts/account_group">Account Group</a></li>
                        <!--<li><a href="<?= $base_url ?>accounts/account_subgroup">Account Sub Group</a></li>-->
                        <li><a href="<?= $base_url ?>accounts/ledger_master">Ledger Master</a></li>
                        <li><a href="<?= $base_url ?>accounts/reports/ledger_summary">Ledger Summary</a></li>
                        <li><a href="<?= $base_url ?>accounts/voucher">Create Voucher</a></li>
                        <li><a href="<?= $base_url ?>accounts/voucher/voucher_list">Voucher List</a></li>
                        <li><a href="<?= $base_url ?>accounts/salarysheet">Salary Sheet</a></li>
                        
                        <!--<li><a href="<?= $base_url ?>accounts/ledger_ob">Ledger Opening Balance</a></li>
                        <!--<li><a href="<?= $base_url ?>accounts/voucher">Trip Sheet Voucher</a></li>
                        <li><a href="<?= $base_url ?>accounts/reports/group_summary">Group Summary</a></li>
                        <li><a href="<?= $base_url ?>accounts/voucher/inter_branch">Inter Branch Voucher</a></li>
                        <!--<li><a href="<?= $base_url ?>accounts/voucher/day_book_journal">Day Book Journal</a></li>-->
                        <!--<li><a href="<?= $base_url ?>accounts/voucher/cashbook">Cash Book</a></li>-->
                        <!--<li><a href="<?= $base_url ?>accounts/voucher/bank_book">Bank Book</a></li>-->
                        
                        
                        <!--<li><a href="<?= $base_url ?>accounts/reports/trail_balance">Trail Balance</a></li>-->
                        <!--<li><a href="<?= $base_url ?>accounts/reports/balance_sheet">Balance Sheet</a></li>-->
                        <li><a href="<?= $base_url ?>accounts/reports/profit_loss">Profit & Loss A/C</a></li>
                        <!--<li><a href="<?= $base_url ?>accounts/voucher">Export To Tally</a></li>-->
                    </ul>
                </li>

                <li class="two-column">
                    <a class="has-arrow" href="#" aria-expanded="false"><span class="hide-menu"><i class="mdi mdi-monitor-multiple"></i>MASTERS </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?= $base_url ?>master/company">Company Master</a></li>
                        <li><a href="<?= $base_url ?>master/branch_agent">Branch/Agent Master</a></li>
                        <li><a href="<?= $base_url ?>master/branch_group">Branch Group Master</a></li>
                        <li><a href="<?= $base_url ?>master/party">Party Master</a></li>
                        <li><a href="<?= $base_url ?>master/region">Region Master</a></li>
                        <li><a href="<?= $base_url ?>master/broker">Broker Master</a></li>
                        <li><a href="<?= $base_url ?>master/route">Route Master</a></li>
                        <li><a href="<?= $base_url ?>master/driver">Driver Master</a></li>
                        <li><a href="<?= $base_url ?>master/state">State Master</a></li>
                        <li><a href="<?= $base_url ?>master/vehicle">Vehicle Master</a></li>
                        <li><a href="<?= $base_url ?>master/station">Station Master</a></li>
                        <li><a href="<?= $base_url ?>master/item">Item Master</a></li>
                        <li><a href="<?= $base_url ?>master/package">Packing Master</a></li>
                        <li><a href="<?= $base_url ?>master/warehouse">Warehouse Item Master</a></li> <!-- Added on Dated 28-08-19 -->
                        
                        
                        <!-- <li><a href="<?= $base_url ?>master/crossing_rate">Crossing Rate Master</a></li> -->
                        
                        <!-- <li><a href="<?= $base_url ?>master/itemwise_crossing">Item Wise Crossing Rate</a></li> -->

                        <!-- <li><a href="<?= $base_url ?>master/labour_rate">Labour Rate Master</a></li> -->
                        <li><a href="<?= $base_url ?>master/salarybatch">Salary Batch Master</a></li>
                        <li><a href="<?= $base_url ?>master/employee">Employee Master</a></li>
                        <!-- <li><a href="<?= $base_url ?>master/transit">Transit Master</a></li> -->
                        <li><a href="<?= $base_url ?>master/assets">Assets Master</a></li>
                        <li><a href="<?= $base_url ?>master/vendor">Vendor Master</a></li> 
                    </ul>
                </li>


            </ul>
        </nav>
    <nav class="navbar top-navbar navbar-expand-md navbar-light" style="float:right; padding:0px; margin:0px;">
    <!-- ============================================================== -->
    <!-- Logo -->
    <!-- ============================================================== -->
    
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


            
        </ul>

        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <ul class="navbar-nav my-lg-0">
            
            <!-- ============================================================== -->
            <!-- Profile -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
                
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                    if (empty($user_profile->user_profile_pic)) {
                        echo '<img src="' . $base_url . 'assets/images/users/1.jpg" alt="User" class="profile-pic" />';
                    } else {
                        echo '<img src="' . $base_url . 'uploaded_files/user_profile/' . $user_profile->user_profile_pic . '" alt="User" class="profile-pic" />';
                    }
                    ?>    
                </a>
                <div class="dropdown-menu dropdown-menu-right scale-up myProfile">
                    <ul class="dropdown-user">
                        <li>
                            <div class="dw-user-box">

                                <div class="u-text">
                                    <h4><?= $user_profile->user_firstname ?> <?= $user_profile->user_lastname ?></h4>
                                    <p class="text-muted" style="overflow:hidden"><?php echo $this->flexi_auth->get_user_identity(); ?></p></div>
                            </div>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $base_url; ?>auth_public/update_account"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="<?php echo $base_url; ?>auth_public/change_password"><i class="ti-lock"></i> Change Password</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo $base_url; ?>auth/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>

</nav>
        
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>