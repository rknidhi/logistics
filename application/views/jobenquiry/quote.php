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

                                        <fieldset>
                                            <legend>Search Enquiry</legend>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table width="100%" >
                                                    <tr>
                                                        <td width="11%"><label class="control-label">Enter E-Ref-No.</label></td>
                                                        <td width="20%">
                                                            <input type="text" id="enq_ref_no" name="enq_ref_no" class="form-control" required>
                                                        </td>
                                                        <td> <button class="btn btn-success search_eref"><i class="fa fa-search"></i> Search</button></td>
                                                    </tr>
                                                    </table>
                                                </div>
                                                
                                            </div>
                                        </fieldset>
                                   
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form class="m-t-10" id="form_validation" novalidate method="POST">
                                                <fieldset>
                                                    <legend>Quote </legend>
                                                    <table width="100%">
                                                    <tr>
                                                        <td><label class="control-label">Q-Ref-No.:</label></td>
                                                        <td>
                                                            <input type="text" name="quote_ref_no" id="quote_ref_no" class="form-control" value="" readonly>
                                                            <input type="hidden" name="enqid_fk" id="enqid_fk" value="" class="form-control"> 
                                                        </td>
                                                        <td><label class="control-label">From:</label></td>
                                                        <td>
                                                            <input type="text" name="from" id="from" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">To:</label></td>
                                                        <td>
                                                            <input type="text" name="to" id="to" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Distance:</label></td>
                                                        <td>
                                                            <input type="text" name="distance" id="distance" class="form-control" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label">Remarks:</label></td>
                                                        <td colspan="7">
                                                            <input type="text" name="remark" id="remark" class="form-control">
                                                        </td>
                                                        
                                                    </tr>
                                                    </table>                                            
                                                </fieldset>
                                                
<!-- Special -->
                                              <div id="tbl01">
                                                <fieldset>
                                                    <legend>Vendor Rate Input Details</legend>
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                        <td><label class="control-label">Vehicle Type:</label></td>
                                                        <td>
                                                            <input type="text" name="vtype1" id="vtype1" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Weight:</label></td>
                                                        <td>
                                                            <input type="text" name="weight1" id="weight1" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Length:</label></td>
                                                        <td>
                                                            <input type="text" name="lenght1" id="length1" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Width:</label></td>
                                                        <td>
                                                            <input type="text" name="width1" id="width1" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Height:</label></td>
                                                        <td>
                                                            <input type="text" name="height1" id="height1" class="form-control" disabled >
                                                        </td>
                                                        <td><label class="control-label">No. Of Vehicle:</label></td>
                                                        <td>
                                                            <input type="text" name="numvechile1" id="numvechile1" class="form-control" disabled>
                                                        </td>
                                                    </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <input type="hidden" name="enqid_vechle_fk1" id="enqid_vechle_fk1" value="" class="form-control">                                                     
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
                                                            <?php
                                                            $sn1 = 1;
                                                            ?>
                                                           <tbody> 
                                                            <tr id="rowid1<?= $sn1 ?>">
                                                                <td width="5%">1</td>
                                                                <td width="30%">
                                                                    <input type="text" name="data[data1][vendor_name][<?= $sn1 ?>]" id="vendor_name1_<?= $sn1 ?>" class="form-control" >
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data1][rate][<?= $sn1 ?>]" id="rate1_<?= $sn1 ?>" class="form-control">
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data1][rate_rto][<?= $sn1 ?>]" id="rate_rto1_<?= $sn1 ?>" class="form-control"></td>
                                                                <td width="10%"></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                        <br>
                                                        <button type="button" class="btn btn-primary btn-round btn-simple hidden-sm-down add_field_button1"><i class="fa fa-plus"></i> Add Row</button>

                                                    </fieldset>
                                                </fieldset>
                                            </div>

                                            <div id="tbl02">
                                                <fieldset>
                                                    <legend> Vendor Rate Input Details</legend>
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                        <td><label class="control-label">Vehicle Type:</label></td>
                                                        <td>
                                                            <input type="text" name="vtype2" id="vtype2" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Weight:</label></td>
                                                        <td>
                                                            <input type="text" name="weight2" id="weight2" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Length:</label></td>
                                                        <td>
                                                            <input type="text" name="lenght2" id="length2" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Width:</label></td>
                                                        <td>
                                                            <input type="text" name="width2" id="width2" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Height:</label></td>
                                                        <td>
                                                            <input type="text" name="height2" id="height2" class="form-control" disabled >
                                                        </td>
                                                        <td><label class="control-label">No. Of Vehicle:</label></td>
                                                        <td>
                                                            <input type="text" name="numvechile2" id="numvechile2" class="form-control" disabled>
                                                        </td>
                                                    </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <input type="hidden" name="enqid_vechle_fk2" id="enqid_vechle_fk2" value="" class="form-control">                                                    
                                                    <fieldset>
                                                        <legend>Vendor Rate Input Details</legend>
                                                        <table width="70%" id="myTable2">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Vendor Name</th>
                                                                <th>Rate</th>
                                                                <th>Rate (RTO)</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                            <?php
                                                            $sn2 = 1;
                                                            ?>
                                                           <tbody> 
                                                            <tr id="rowid2<?= $sn2 ?>">
                                                                <td width="5%">1</td>
                                                                <td width="30%">
                                                                    <input type="text" name="data[data2][vendor_name][<?= $sn2 ?>]" id="vendor_name2_<?= $sn2 ?>" class="form-control" >
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data2][rate][<?= $sn2 ?>]" id="rate2_<?= $sn2 ?>" class="form-control">
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data2][rate_rto][<?= $sn2 ?>]" id="rate_rto2_<?= $sn2 ?>" class="form-control"></td>
                                                                <td width="10%"></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                        <br>
                                                        <button type="button" class="btn btn-primary btn-round btn-simple hidden-sm-down add_field_button2"><i class="fa fa-plus"></i> Add Row</button>

                                                    </fieldset>
                                                </fieldset>
                                            </div>

                                            <div id="tbl03">
                                                <fieldset>
                                                    <legend>Vendor Rate Input Details</legend>
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                        <td><label class="control-label">Vehicle Type:</label></td>
                                                        <td>
                                                            <input type="text" name="vtype3" id="vtype3" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Weight:</label></td>
                                                        <td>
                                                            <input type="text" name="weight3" id="weight3" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Length:</label></td>
                                                        <td>
                                                            <input type="text" name="lenght3" id="length3" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Width:</label></td>
                                                        <td>
                                                            <input type="text" name="width3" id="width3" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Height:</label></td>
                                                        <td>
                                                            <input type="text" name="height3" id="height3" class="form-control" disabled >
                                                        </td>
                                                        <td><label class="control-label">No. Of Vehicle:</label></td>
                                                        <td>
                                                            <input type="text" name="numvechile3" id="numvechile3" class="form-control" disabled>
                                                        </td>
                                                    </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <input type="hidden" name="enqid_vechle_fk3" id="enqid_vechle_fk3" value="" class="form-control">                                                    
                                                    <fieldset>
                                                        <legend>Vendor Rate Input Details</legend>
                                                        <table width="70%" id="myTable3">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Vendor Name</th>
                                                                <th>Rate</th>
                                                                <th>Rate (RTO)</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                            <?php
                                                            $sn3 = 1;
                                                            ?>
                                                           <tbody> 
                                                            <tr id="rowid3<?= $sn3 ?>">
                                                                <td width="5%">1</td>
                                                                <td width="30%">
                                                                    <input type="text" name="data[data3][vendor_name][<?= $sn3 ?>]" id="vendor_name3_<?= $sn3 ?>" class="form-control" >
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data3][rate][<?= $sn3 ?>]" id="rate3_<?= $sn3 ?>" class="form-control">
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data3][rate_rto][<?= $sn3 ?>]" id="rate_rto3_<?= $sn3 ?>" class="form-control"></td>
                                                                <td width="10%"></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                        <br>
                                                        <button type="button" class="btn btn-primary btn-round btn-simple hidden-sm-down add_field_button3"><i class="fa fa-plus"></i> Add Row</button>

                                                    </fieldset>
                                                </fieldset>
                                            </div>


                                            <div id="tbl04">
                                                <fieldset>
                                                    <legend>Vendor Rate Input Details</legend>
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                        <td><label class="control-label">Vehicle Type:</label></td>
                                                        <td>
                                                            <input type="text" name="vtype4" id="vtype4" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Weight:</label></td>
                                                        <td>
                                                            <input type="text" name="weight4" id="weight4" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Length:</label></td>
                                                        <td>
                                                            <input type="text" name="lenght4" id="length4" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Width:</label></td>
                                                        <td>
                                                            <input type="text" name="width4" id="width4" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Height:</label></td>
                                                        <td>
                                                            <input type="text" name="height4" id="height4" class="form-control" disabled >
                                                        </td>
                                                        <td><label class="control-label">No. Of Vehicle:</label></td>
                                                        <td>
                                                            <input type="text" name="numvechile4" id="numvechile4" class="form-control" disabled>
                                                        </td>
                                                    </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <input type="hidden" name="enqid_vechle_fk4" id="enqid_vechle_fk4" value="" class="form-control">                                                    
                                                    <fieldset>
                                                        <legend>Vendor Rate Input Details</legend>
                                                        <table width="70%" id="myTable4">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Vendor Name</th>
                                                                <th>Rate</th>
                                                                <th>Rate (RTO)</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                            <?php
                                                            $sn4 = 1;
                                                            ?>
                                                           <tbody> 
                                                            <tr id="rowid4<?= $sn4 ?>">
                                                                <td width="5%">1</td>
                                                                <td width="30%">
                                                                    <input type="text" name="data[data4][vendor_name][<?= $sn4 ?>]" id="vendor_name4_<?= $sn4 ?>" class="form-control" >
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data4][rate][<?= $sn4 ?>]" id="rate4_<?= $sn4 ?>" class="form-control">
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data4][rate_rto][<?= $sn4 ?>]" id="rate_rto4_<?= $sn4 ?>" class="form-control"></td>
                                                                <td width="10%"></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                        <br>
                                                        <button type="button" class="btn btn-primary btn-round btn-simple hidden-sm-down add_field_button4"><i class="fa fa-plus"></i> Add Row</button>

                                                    </fieldset>
                                                </fieldset>
                                            </div>


                                            <div id="tbl05">
                                                <fieldset>
                                                    <legend>Vendor Rate Input Details</legend>
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                        <td><label class="control-label">Vehicle Type:</label></td>
                                                        <td>
                                                            <input type="text" name="vtype5" id="vtype5" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Weight:</label></td>
                                                        <td>
                                                            <input type="text" name="weight5" id="weight5" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Length:</label></td>
                                                        <td>
                                                            <input type="text" name="lenght5" id="length5" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Width:</label></td>
                                                        <td>
                                                            <input type="text" name="width5" id="width5" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Height:</label></td>
                                                        <td>
                                                            <input type="text" name="height5" id="height5" class="form-control" disabled >
                                                        </td>
                                                        <td><label class="control-label">No. Of Vehicle:</label></td>
                                                        <td>
                                                            <input type="text" name="numvechile5" id="numvechile5" class="form-control" disabled>
                                                        </td>
                                                    </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <input type="hidden" name="enqid_vechle_fk5" id="enqid_vechle_fk5" value="" class="form-control">                                                    
                                                    <fieldset>
                                                        <legend>Vendor Rate Input Details</legend>
                                                        <table width="70%" id="myTable5">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Vendor Name</th>
                                                                <th>Rate</th>
                                                                <th>Rate (RTO)</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                            <?php
                                                            $sn5 = 1;
                                                            ?>
                                                           <tbody> 
                                                            <tr id="rowid5<?= $sn ?>">
                                                                <td width="5%">1</td>
                                                                <td width="30%">
                                                                    <input type="text" name="data[data5][vendor_name][<?= $sn5 ?>]" id="vendor_name5_<?= $sn5 ?>" class="form-control" >
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data5][rate][<?= $sn5 ?>]" id="rate5_<?= $sn5 ?>" class="form-control">
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data5][rate_rto][<?= $sn5 ?>]" id="rate_rto5_<?= $sn5 ?>" class="form-control"></td>
                                                                <td width="10%"></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                        <br>
                                                        <button type="button" class="btn btn-primary btn-round btn-simple hidden-sm-down add_field_button5"><i class="fa fa-plus"></i> Add Row</button>

                                                    </fieldset>
                                                </fieldset>
                                            </div> 




                                            <div id="tbl06">
                                                <fieldset>
                                                    <legend>Vendor Rate Input Details</legend>
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                        <td><label class="control-label">Vehicle Type:</label></td>
                                                        <td>
                                                            <input type="text" name="vtype6" id="vtype6" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Weight:</label></td>
                                                        <td>
                                                            <input type="text" name="weight6" id="weight6" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Length:</label></td>
                                                        <td>
                                                            <input type="text" name="lenght6" id="length6" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Width:</label></td>
                                                        <td>
                                                            <input type="text" name="width6" id="width6" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Height:</label></td>
                                                        <td>
                                                            <input type="text" name="height6" id="height6" class="form-control" disabled >
                                                        </td>
                                                        <td><label class="control-label">No. Of Vehicle:</label></td>
                                                        <td>
                                                            <input type="text" name="numvechile6" id="numvechile6" class="form-control" disabled>
                                                        </td>
                                                    </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <input type="hidden" name="enqid_vechle_fk6" id="enqid_vechle_fk6" value="" class="form-control">                                                    
                                                    <fieldset>
                                                        <legend>Vendor Rate Input Details</legend>
                                                        <table width="70%" id="myTable6">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Vendor Name</th>
                                                                <th>Rate</th>
                                                                <th>Rate (RTO)</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                            <?php
                                                            $sn6 = 1;
                                                            ?>
                                                           <tbody> 
                                                            <tr id="rowid6<?= $sn6 ?>">
                                                                <td width="5%">1</td>
                                                                <td width="30%">
                                                                    <input type="text" name="data[data6][vendor_name][<?= $sn6 ?>]" id="vendor_name6_<?= $sn6 ?>" class="form-control" >
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data6][rate][<?= $sn6 ?>]" id="rate6_<?= $sn6 ?>" class="form-control">
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data6][rate_rto][<?= $sn6 ?>]" id="rate_rto6_<?= $sn6 ?>" class="form-control"></td>
                                                                <td width="10%"></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                        <br>
                                                        <button type="button" class="btn btn-primary btn-round btn-simple hidden-sm-down add_field_button6"><i class="fa fa-plus"></i> Add Row</button>

                                                    </fieldset>
                                                </fieldset>
                                            </div>



                                            <div id="tbl07">
                                                <fieldset>
                                                    <legend>Vendor Rate Input Details</legend>
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                        <td><label class="control-label">Vehicle Type:</label></td>
                                                        <td>
                                                            <input type="text" name="vtype7" id="vtype7" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Weight:</label></td>
                                                        <td>
                                                            <input type="text" name="weight7" id="weight7" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Length:</label></td>
                                                        <td>
                                                            <input type="text" name="lenght7" id="length7" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Width:</label></td>
                                                        <td>
                                                            <input type="text" name="width7" id="width7" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Height:</label></td>
                                                        <td>
                                                            <input type="text" name="height7" id="height7" class="form-control" disabled >
                                                        </td>
                                                        <td><label class="control-label">No. Of Vehicle:</label></td>
                                                        <td>
                                                            <input type="text" name="numvechile7" id="numvechile7" class="form-control" disabled>
                                                        </td>
                                                    </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <input type="hidden" name="enqid_vechle_fk7" id="enqid_vechle_fk7" value="" class="form-control">                                                    
                                                    <fieldset>
                                                        <legend>Vendor Rate Input Details</legend>
                                                        <table width="70%" id="myTable7">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Vendor Name</th>
                                                                <th>Rate</th>
                                                                <th>Rate (RTO)</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                            <?php
                                                            $sn7 = 1;
                                                            ?>
                                                           <tbody> 
                                                            <tr id="rowid7<?= $sn7 ?>">
                                                                <td width="5%">1</td>
                                                                <td width="30%">
                                                                    <input type="text" name="data[data7][vendor_name][<?= $sn7 ?>]" id="vendor_name7_<?= $sn7 ?>" class="form-control" >
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data7][rate][<?= $sn7 ?>]" id="rate7_<?= $sn7 ?>" class="form-control">
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data7][rate_rto][<?= $sn7 ?>]" id="rate_rto7_<?= $sn7 ?>" class="form-control"></td>
                                                                <td width="10%"></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                        <br>
                                                        <button type="button" class="btn btn-primary btn-round btn-simple hidden-sm-down add_field_button7"><i class="fa fa-plus"></i> Add Row</button>

                                                    </fieldset>
                                                </fieldset>
                                            </div>                                            



                                            <div id="tbl08">
                                                <fieldset>
                                                    <legend>Vendor Rate Input Details</legend>
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                        <td><label class="control-label">Vehicle Type:</label></td>
                                                        <td>
                                                            <input type="text" name="vtype8" id="vtype8" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Weight:</label></td>
                                                        <td>
                                                            <input type="text" name="weight8" id="weight8" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Length:</label></td>
                                                        <td>
                                                            <input type="text" name="lenght8" id="length8" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Width:</label></td>
                                                        <td>
                                                            <input type="text" name="width8" id="width8" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Height:</label></td>
                                                        <td>
                                                            <input type="text" name="height8" id="height8" class="form-control" disabled >
                                                        </td>
                                                        <td><label class="control-label">No. Of Vehicle:</label></td>
                                                        <td>
                                                            <input type="text" name="numvechile8" id="numvechile8" class="form-control" disabled>
                                                        </td>
                                                    </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <input type="hidden" name="enqid_vechle_fk8" id="enqid_vechle_fk8" value="" class="form-control">                                                    
                                                    <fieldset>
                                                        <legend>Vendor Rate Input Details</legend>
                                                        <table width="70%" id="myTable8">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Vendor Name</th>
                                                                <th>Rate</th>
                                                                <th>Rate (RTO)</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                            <?php
                                                            $sn8 = 1;
                                                            ?>
                                                           <tbody> 
                                                            <tr id="rowid8<?= $sn7 ?>">
                                                                <td width="5%">1</td>
                                                                <td width="30%">
                                                                    <input type="text" name="data[data8][vendor_name][<?= $sn8 ?>]" id="vendor_name8_<?= $sn8 ?>" class="form-control" >
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data8][rate][<?= $sn8 ?>]" id="rate8_<?= $sn8 ?>" class="form-control">
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data8][rate_rto][<?= $sn8 ?>]" id="rate_rto8_<?= $sn8 ?>" class="form-control"></td>
                                                                <td width="10%"></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                        <br>
                                                        <button type="button" class="btn btn-primary btn-round btn-simple hidden-sm-down add_field_button8"><i class="fa fa-plus"></i> Add Row</button>

                                                    </fieldset>
                                                </fieldset>
                                            </div><!-- End -->                                            
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

        </script>

        <script type="text/javascript">

            $(document).ready(function(){
               for(var ii = 1; ii<=8; ii++){
                    $('#tbl0'+ii).hide();
                    $('#tbl0'+ii).find("input, button").attr("disabled", "disabled");
               }

                $('.search_eref').on('click', function(){
                var searchvalue = $('#enq_ref_no').val();
                   for(var ii = 1; ii<=8; ii++){
                        $('#tbl0'+ii).hide();
                        $('#tbl0'+ii).find("input, button").attr("disabled", "disabled");
                   } 

               $.ajax({
                    url: '<?= $base_url ?>jobenquiry/get_enquiry_ajax',
                    type: 'POST',
                    data: ({
                        enq_ref_no: searchvalue
                    }),
                    success: function(response) {

                        var obj = jQuery.parseJSON(response);
                        console.log(obj);
                        if(obj.sucess == 'fali'){
                           alertify.error('Record no found');
                        } else{
//                            $('#quote_ref_no').val("<?php echo genrate_unique_id('tbl_quote','Q');?>");
                            $('#quote_ref_no').val("<?php echo genrate_unique_id1('Q');?>");

                            if(obj.enq_vechile.length > 0){
                                $.each(obj.enq_vechile, function( key, value ) {
                                  $('#tbl0'+(key+1)).show();
                                  $('#tbl0'+(key+1)).find("input, button, hidden").removeAttr("disabled");

                                  $('#tbl0'+(key+1)).find('#vtype'+(key+1)).val(value.vechile_type).attr("disabled", "disabled");
                                  $('#tbl0'+(key+1)).find('#weight'+(key+1)).val(value.weight).attr("disabled", "disabled");
                                  $('#tbl0'+(key+1)).find('#length'+(key+1)).val(value.length).attr("disabled", "disabled");
                                  $('#tbl0'+(key+1)).find('#width'+(key+1)).val(value.width).attr("disabled", "disabled");
                                  $('#tbl0'+(key+1)).find('#height'+(key+1)).val(value.height).attr("disabled", "disabled");
                                  $('#tbl0'+(key+1)).find('#numvechile'+(key+1)).val(value.no_of_vechile).attr("disabled", "disabled");
                                  $('#tbl0'+(key+1)).find('#enqid_vechle_fk'+(key+1)).val(value.vid);
                                });
                            }
                            $('#enqid_fk').val(obj.enquiry.enqid);
                            $('#from').val(obj.enquiry.station_from);
                            $('#to').val(obj.enquiry.station_to);
                            $('#distance').val(obj.enquiry.distance);
                          }
                        }
                    });
                });
            });

        </script>



<script type="text/javascript">
var max_fields = 5; //maximum input boxes allowed
var add_button = $(".add_field_button1"); //Add button ID
var x = <?= $sn1 ?>; //initlal text box count
$(add_button).click(function (e) { //on add input button click
    e.preventDefault();
    x++; //text box increment
    var rowInd = $('#myTable1 >tbody >tr').length;
    if(rowInd < max_fields){
    var myrow = '<tr id="rowid1' + x + '"><td>' + (rowInd+1) + '</td>'
    + '<td><input type="text" name="data[data1][vendor_name]['+ x +']" id="vendor_name1_' + x + '" value="" class="form-control"></td>'
    + '<td><input type="text" name="data[data1][rate]['+ x +']" id="rate1_' + x + '" value="" class="form-control"></td>'    
    + '<td><input type="text" name="data[data1][rate_rto]['+ x +']" id="rate_rto1_'+ x +'" value="" class="form-control"></td>'
    + '<td><span class="btn btn-danger btn-round btn-simple" onclick="removeitem1(' + x + ')">X Remove</span></td></tr>';

    $('#myTable1 > tbody > tr:nth-child('+ (rowInd)+')').after(myrow);
    } else{
       alertify.error('Max 5 Enquery is allowed');
    }
});



function removeitem1(x) {
    $("#rowid1" + x).remove();
    var i=1;
    $("#myTable1 >tbody >tr").each(function(){
       var trlen = $("#myTable1 >tbody >tr").length;
       if(i <= trlen){
         $(this).find("td:first").text(i);
       } 
       i++;
    });
}


$(document).on('click', 'input[type=radio]', function() {
    var idv = $(this).val();

});


var max_fields = 5; //maximum input boxes allowed
var add_button = $(".add_field_button2"); //Add button ID
var x = <?= $sn2 ?>; //initlal text box count
$(add_button).click(function (e) { //on add input button click
    e.preventDefault();
    x++; //text box increment
    var rowInd = $('#myTable2 >tbody >tr').length;
    if(rowInd < max_fields){
    var myrow = '<tr id="rowid2' + x + '"><td>' + (rowInd+1) + '</td>'
    + '<td><input type="text" name="data[data2][vendor_name]['+ x +']" id="vendor_name2_' + x + '" value="" class="form-control"></td>'
    + '<td><input type="text" name="data[data2][rate]['+ x +']" id="rate2_' + x + '" value="" class="form-control"></td>'    
    + '<td><input type="text" name="data[data2][rate_rto]['+ x +']" id="rate_rto2_'+ x +'" value="" class="form-control"></td>'
    + '<td><span class="btn btn-danger btn-round btn-simple" onclick="removeitem2(' + x + ')">X Remove</span></td></tr>';

    $('#myTable2 > tbody > tr:nth-child('+ (rowInd)+')').after(myrow);
    } else{
       alertify.error('Max 5 Enquery is allowed');
    }
});



function removeitem2(x) {
    $("#rowid2" + x).remove();
    var i=1;
    $("#myTable2 >tbody >tr").each(function(){
       var trlen = $("#myTable2 >tbody >tr").length;
       if(i <= trlen){
         $(this).find("td:first").text(i);
       } 
       i++;
    });
}



var max_fields = 5; //maximum input boxes allowed
var add_button = $(".add_field_button3"); //Add button ID
var x = <?= $sn3 ?>; //initlal text box count
$(add_button).click(function (e) { //on add input button click
    e.preventDefault();
    x++; //text box increment
    var rowInd = $('#myTable3 >tbody >tr').length;
    if(rowInd < max_fields){
    var myrow = '<tr id="rowid3' + x + '"><td>' + (rowInd+1) + '</td>'
    + '<td><input type="text" name="data[data3][vendor_name]['+ x +']" id="vendor_name3_' + x + '" value="" class="form-control"></td>'
    + '<td><input type="text" name="data[data3][rate]['+ x +']" id="rate3_' + x + '" value="" class="form-control"></td>'    
    + '<td><input type="text" name="data[data3][rate_rto]['+ x +']" id="rate_rto3_'+ x +'" value="" class="form-control"></td>'
    + '<td><span class="btn btn-danger btn-round btn-simple" onclick="removeitem3(' + x + ')">X Remove</span></td></tr>';

    $('#myTable3 > tbody > tr:nth-child('+ (rowInd)+')').after(myrow);
    } else{
       alertify.error('Max 5 Enquery is allowed');
    }
});



function removeitem3(x) {
    $("#rowid3" + x).remove();
    var i=1;
    $("#myTable3 >tbody >tr").each(function(){
       var trlen = $("#myTable3 >tbody >tr").length;
       if(i <= trlen){
         $(this).find("td:first").text(i);
       } 
       i++;
    });
}





var max_fields = 5; //maximum input boxes allowed
var add_button = $(".add_field_button4"); //Add button ID
var x = <?= $sn4 ?>; //initlal text box count
$(add_button).click(function (e) { //on add input button click
    e.preventDefault();
    x++; //text box increment
    var rowInd = $('#myTable4 >tbody >tr').length;
    if(rowInd < max_fields){
    var myrow = '<tr id="rowid4' + x + '"><td>' + (rowInd+1) + '</td>'
    + '<td><input type="text" name="data[data4][vendor_name]['+ x +']" id="vendor_name4_' + x + '" value="" class="form-control"></td>'
    + '<td><input type="text" name="data[data4][rate]['+ x +']" id="rate4_' + x + '" value="" class="form-control"></td>'    
    + '<td><input type="text" name="data[data4][rate_rto]['+ x +']" id="rate_rto1_'+ x +'" value="" class="form-control"></td>'
    + '<td><span class="btn btn-danger btn-round btn-simple" onclick="removeitem4(' + x + ')">X Remove</span></td></tr>';

    $('#myTable4 > tbody > tr:nth-child('+ (rowInd)+')').after(myrow);
    } else{
       alertify.error('Max 5 Enquery is allowed');
    }
});



function removeitem4(x) {
    $("#rowid4" + x).remove();
    var i=1;
    $("#myTable4 >tbody >tr").each(function(){
       var trlen = $("#myTable4 >tbody >tr").length;
       if(i <= trlen){
         $(this).find("td:first").text(i);
       } 
       i++;
    });
}


var max_fields = 5; //maximum input boxes allowed
var add_button = $(".add_field_button5"); //Add button ID
var x = <?= $sn5 ?>; //initlal text box count
$(add_button).click(function (e) { //on add input button click
    e.preventDefault();
    x++; //text box increment
    var rowInd = $('#myTable5 >tbody >tr').length;
    if(rowInd < max_fields){
    var myrow = '<tr id="rowid5' + x + '"><td>' + (rowInd+1) + '</td>'
    + '<td><input type="text" name="data[data5][vendor_name]['+ x +']" id="vendor_name5_' + x + '" value="" class="form-control"></td>'
    + '<td><input type="text" name="data[data5][rate]['+ x +']" id="rate5_' + x + '" value="" class="form-control"></td>'    
    + '<td><input type="text" name="data[data5][rate_rto]['+ x +']" id="rate_rto5_'+ x +'" value="" class="form-control"></td>'
    + '<td><span class="btn btn-danger btn-round btn-simple" onclick="removeitem5(' + x + ')">X Remove</span></td></tr>';

    $('#myTable5 > tbody > tr:nth-child('+ (rowInd)+')').after(myrow);
    } else{
       alertify.error('Max 5 Enquery is allowed');
    }
});



function removeitem5(x) {
    $("#rowid5" + x).remove();
    var i=1;
    $("#myTable5 >tbody >tr").each(function(){
       var trlen = $("#myTable5 >tbody >tr").length;
       if(i <= trlen){
         $(this).find("td:first").text(i);
       } 
       i++;
    });
}



var max_fields = 5; //maximum input boxes allowed
var add_button = $(".add_field_button6"); //Add button ID
var x = <?= $sn6 ?>; //initlal text box count
$(add_button).click(function (e) { //on add input button click
    e.preventDefault();
    x++; //text box increment
    var rowInd = $('#myTable6 >tbody >tr').length;
    if(rowInd < max_fields){
    var myrow = '<tr id="rowid6' + x + '"><td>' + (rowInd+1) + '</td>'
    + '<td><input type="text" name="data[data6][vendor_name]['+ x +']" id="vendor_name6_' + x + '" value="" class="form-control"></td>'
    + '<td><input type="text" name="data[data6][rate]['+ x +']" id="rate6_' + x + '" value="" class="form-control"></td>'    
    + '<td><input type="text" name="data[data6][rate_rto]['+ x +']" id="rate_rto6_'+ x +'" value="" class="form-control"></td>'
    + '<td><span class="btn btn-danger btn-round btn-simple" onclick="removeitem6(' + x + ')">X Remove</span></td></tr>';

    $('#myTable6 > tbody > tr:nth-child('+ (rowInd)+')').after(myrow);
    } else{
       alertify.error('Max 5 Enquery is allowed');
    }
});



function removeitem5(x) {
    $("#rowid6" + x).remove();
    var i=1;
    $("#myTable6 >tbody >tr").each(function(){
       var trlen = $("#myTable6 >tbody >tr").length;
       if(i <= trlen){
         $(this).find("td:first").text(i);
       } 
       i++;
    });
}


var max_fields = 5; //maximum input boxes allowed
var add_button = $(".add_field_button7"); //Add button ID
var x = <?= $sn7 ?>; //initlal text box count
$(add_button).click(function (e) { //on add input button click
    e.preventDefault();
    x++; //text box increment
    var rowInd = $('#myTable7 >tbody >tr').length;
    if(rowInd < max_fields){
    var myrow = '<tr id="rowid7' + x + '"><td>' + (rowInd+1) + '</td>'
    + '<td><input type="text" name="data[data7][vendor_name]['+ x +']" id="vendor_name7_' + x + '" value="" class="form-control"></td>'
    + '<td><input type="text" name="data[data7][rate]['+ x +']" id="rate7_' + x + '" value="" class="form-control"></td>'    
    + '<td><input type="text" name="data[data7][rate_rto]['+ x +']" id="rate_rto7_'+ x +'" value="" class="form-control"></td>'
    + '<td><span class="btn btn-danger btn-round btn-simple" onclick="removeitem7(' + x + ')">X Remove</span></td></tr>';

    $('#myTable7 > tbody > tr:nth-child('+ (rowInd)+')').after(myrow);
    } else{
       alertify.error('Max 5 Enquery is allowed');
    }
});



function removeitem7(x) {
    $("#rowid7" + x).remove();
    var i=1;
    $("#myTable7 >tbody >tr").each(function(){
       var trlen = $("#myTable7 >tbody >tr").length;
       if(i <= trlen){
         $(this).find("td:first").text(i);
       } 
       i++;
    });
}


var max_fields = 5; //maximum input boxes allowed
var add_button = $(".add_field_button8"); //Add button ID
var x = <?= $sn8 ?>; //initlal text box count
$(add_button).click(function (e) { //on add input button click
    e.preventDefault();
    x++; //text box increment
    var rowInd = $('#myTable8 >tbody >tr').length;
    if(rowInd < max_fields){
    var myrow = '<tr id="rowid8' + x + '"><td>' + (rowInd+1) + '</td>'
    + '<td><input type="text" name="data[data8][vendor_name]['+ x +']" id="vendor_name8_' + x + '" value="" class="form-control"></td>'
    + '<td><input type="text" name="data[data8][rate]['+ x +']" id="rate8_' + x + '" value="" class="form-control"></td>'
    + '<td><input type="text" name="data[data8][rate_rto]['+ x +']" id="rate_rto8_'+ x +'" value="" class="form-control"></td>'
    + '<td><span class="btn btn-danger btn-round btn-simple" onclick="removeitem8(' + x + ')">X Remove</span></td></tr>';

    $('#myTable8 > tbody > tr:nth-child('+ (rowInd)+')').after(myrow);
    } else{
       alertify.error('Max 5 Enquery is allowed');
    }
});

function removeitem8(x) {
    $("#rowid8" + x).remove();
    var i=1;
    $("#myTable8 >tbody >tr").each(function(){
       var trlen = $("#myTable8 >tbody >tr").length;
       if(i <= trlen){
         $(this).find("td:first").text(i);
       } 
       i++;
    });
}

</script>
<!-- End -->        
    </body>

</html>