<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->config->item('title_prefix'); ?> : Add Fleet</title>
    <?php $this->load->view('includes/head'); ?>
    <link href="<?= $base_url ?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= $base_url ?>assets/plugins/jquery-validation/demo/css/screen.css">
    <style>
    .form-table1 {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 15px;
    }

    td {
        padding: 1px 4px;
    }{


    .no-padding         padding: 0
    }

    .block-1 {
        background: #ccc
    }

    .form-group {
        margin-bottom: 0.5rem;
    }

    .form-control {
        padding: 0 .25rem;
        min-height: 26px;
        font-size: 0.8rem;
    }

    .no-padding-right {
        padding-right: 0
    }

    .btn {
        padding: 2px 12px;
        font-size: 12px;
    }

    .select2-container .select2-selection--single {
        height: 26px;
        font-size: 14px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 26px !important;
    }

    label {
        font-size: 14px;
    }

    select.form-control:not([size]):not([multiple]) {
        height: 26px
    }

    legend {
        display: block;
        width: auto;
        max-width: auto;
        padding: 0;
        margin-bottom: .2rem;
        font-size: 1rem;
        line-height: inherit;
        color: inherit;
        white-space: normal;
        font-weight: 600;
        background: #e3fafd;
        padding: 0px 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    fieldset {
        border: 1px solid #ccc;
        padding: 1px 10px 5px;
        margin-bottom: 10px;
        background: #e8f2c3;
    }

    .table-border td {
        border: 1px solid #d8d6d6;
    }
    select.select2{
            width: 100%;
        }
        .download i{
            color: purple;
        }
        .view i{
            color: blue;
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
<?php
$success = $this->session->flashdata('success');
$info    = $this->session->flashdata('info');
$message = $this->session->flashdata('message');
?>

                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-primary">
                            <div class="card-header ">
                                <h4 class="m-b-0 text-white">Edit Fleet</h4>
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

                                <form class="m-t-10" id="form_validation" novalidate action="" method="POST" enctype="multipart/form-data">
                                <fieldset>
                                    <legend>Truck Details</legend>    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-2">

                                                    <table width="100%">
                                                        <tr>
                                                            <td><label class="control-label">Fleet ID: </label></td>
                                                            <td><input type="text" name="fleet_id_desc" value="<?php echo $fleetdetails->fleet_id_desc;?>" readonly
                                                                    style="font-weight:bold;" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Maker Name:</label></td>
                                                            <td><input type="text" name="maker_name" value="<?php echo $fleetdetails->maker_name;?>" 
                                                                    class="form-control" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Chassis No.</label></td>
                                                            <td><input type="text" name="chasis_no" value="<?php echo $fleetdetails->chasis_no;?>" 
                                                                    class="form-control" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Purchase Date:</label></td>
                                                            <td><input type="text" name="puchase_date" value="<?php echo convertToHumanDate($fleetdetails->puchase_date);?>" 
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td><label class="control-label">Rod Tax Date:</label></td>
                                                            <td><input type="text" name="tax_date" value="<?php echo convertToHumanDate($fleetdetails->tax_date);?>" 
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td><label class="control-label">Challan Due Date:</label></td>
                                                            <td><input type="text" name="challan_due_date" value="<?php echo convertToHumanDate($fleetdetails->challan_due_date);?>" 
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Fitness Due Date:</label></td>
                                                            <td><input type="text" name="fitness_due_date" value="<?php echo convertToHumanDate($fleetdetails->fitness_due_date);?>" 
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        
                                                    </table>   
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                                
                                                    <table width="100%">
                                                        <tr>
                                                            <td><label class="control-label">Fleet No.</label></td>
                                                            <td><input type="text" name="fleet_no" value="<?php echo $fleetdetails->fleet_no;?>" 
                                                                    style="font-weight:bold;" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Owner Name:</label></td>
                                                            <td><input type="text" name="owner_name" value="<?php echo $fleetdetails->owner_name;?>" 
                                                                    class="form-control" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Engine No.</label></td>
                                                            <td><input type="text" name="engine_no" value="<?php echo $fleetdetails->engine_no;?>" 
                                                                    class="form-control" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Permit No. (1 Year)</label></td>
                                                            <td><input type="text" name="permit_valid_yr" value="<?php echo $fleetdetails->permit_valid_yr;?>" 
                                                                    class="form-control" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Permit Due Date (1 Year)</label></td>
                                                            <td><input type="text" name="permit_due_yr" value="<?php echo convertToHumanDate($fleetdetails->permit_due_yr);?>" 
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Pollution Due Date:</label></td>
                                                            <td><input type="text" name="pollution_due_date" value="<?php echo convertToHumanDate($fleetdetails->pollution_due_date);?>" 
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">EMI Due Date:</label></td>
                                                            <td><input type="text" name="emi_due_date" value="<?php echo convertToHumanDate($fleetdetails->emi_due_date);?>" 
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        
                                                    </table>
                                               
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-2">
                                              
                                                    <table width="100%">
                                                        <tr>
                                                            <td><label class="control-labe">Fleet Type</label>
                                                            </td>
                                                            <td><select class="form-control select2"
                                                                    name="fleet_type" class="" >
                                                                    <option value="">Select Model</option>
                                                                    <option value="6 Tyre" <?= $fleetdetails->fleet_type =='6 Tyre'?'selected':''?>>6 Tyre</option>
                                                                    <option value="To Pay" <?= $fleetdetails->fleet_type =='To Pay'?'selected':''?>>10 Tyre</option>
                                                                    <option value="Paid" <?= $fleetdetails->fleet_type =='Paid'?'selected':''?>>14 Tyre</option>
                                                                    <option value="16 Tyre" <?= $fleetdetails->fleet_type =='16 Tyre'?'selected':''?>>16 Tyre</option>
                                                                    <option value="etc" <?= $fleetdetails->fleet_type =='etc'?'selected':''?>>etc</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-labe">Driver Name:</label>
                                                            </td>
                                                            <td><select class="form-control select2"
                                                                    name="driver_id_fk">
                                                            <option value="0">Select</option>
                                                            <?php foreach ($drivers as $driver) { ?>
                                                            <option value="<?= $driver->driver_id;?>" <?= $fleetdetails->driver_id_fk == $driver->driver_id?'selected':'';?>>
                                                                    <?= $driver->name; ?></option>
                                                                <?php } ?>                                                                    
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Policy No.</label></td>
                                                            <td><input type="text" name="policy_no" value="<?php echo $fleetdetails->policy_no;?>" 
                                                                    class="form-control" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Permit No. (5 Year):</label></td>
                                                            <td><input type="text" name="permit_no_for_yr" value="<?php echo $fleetdetails->permit_no_for_yr;?>" 
                                                                    style="font-weight:bold;" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">Permit Due Date (5 Year)</label></td>
                                                            <td><input type="text" name="permit_due_for_yr" value="<?php echo convertToHumanDate($fleetdetails->permit_due_for_yr);?>" 
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td><label class="control-label">Insurance Due Date:</label></td>
                                                            <td><input type="text" name="insurence_due_date" value="<?php echo convertToHumanDate($fleetdetails->insurence_due_date);?>" 
                                                                    class="form-control singledate" ></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label class="control-label">City</label></td>
                                                            <td><input type="text" name="city"  value="<?php echo $fleetdetails->city;?>" 
                                                                    class="form-control" ></td>
                                                        </tr>
                                                       
                                                    </table>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                    <div class="form-group col-md-12 text-center">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success" name="submit" value="Submit">
                                                Submit</button>
                                            
                                            <button type="button" class="btn btn-danger btn1 close-me"
                                                class="btn btn-info btn1"><i class="fa  fa-times"></i> Close</button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset>
                                                <legend>List of Documents</legend>
                                                <br>
                                                <table>
                                                    
                                                    <tr>
                                                        <td><label class="control-label">Upload Documents</label></td>
                                                        <td>
                                                            <input type="file" name="files[]" multiple 
                                                                class="form-control" >
                                                        </td> 
                                                        <td>
                                                        <button type="submit" class="btn btn-warning" name="submit" value="Submit">Upload</button>
                                                        </td> 
                                                    </tr>
                                                </table>
                                                <hr>
                                                <table width="100%">
                                                   <?php 
                                                   $document_details = array();
                                                  if(!empty($fleetdetails->document_details)){ 
                                                    $document_details = explode('|',$fleetdetails->document_details);
                                                    
                                                    $document_details= array_filter($document_details);
                                                   foreach($document_details as $key => $value){
                                                    $file_details = explode('/', $value)
                                                   ?> 

                                                    <tr>
                                                        <td width="50%">
                                                            <?php echo $file_details[0];?>
                                                        </td>
                                                        <td>
                                                            <?php echo convertToHumanDateTime($file_details[1]);?>
                                                            <a class="trash trash-me material-icons" id="<?= $fleetdetails->vehicle_id;?>" data-file="<?php echo $file_details[0];?>" href="javascript:;"> <i class="fa fa-trash" style="font-size:14px;color:red"></i></a> <a class="download" href="<?=base_url().'uploaded_files/fleet_document/'.$fleetdetails->fleet_id_desc.'/'.$file_details[0];?>" download><i class="fa fa-download"></i></a>
                                                        </td>
                                                    </tr>
                                                   <?php
                                                     } 
                                                    }
                                                   ?> 
                                                </table>
                                                <br>
                                            </fieldset>
                                            
                                        </div>
                                    </div>   

                                </form>

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
            <script src="<?= $base_url ?>assets/plugins/areyousure/jquery.are-you-sure.js"></script>
            <script src="<?= $base_url ?>assets/plugins/areyousure/ays-beforeunload-shim.js"></script>
            <script src="<?= $base_url ?>assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript">
            </script>
            <!-- start - This is for export functionality only -->

            <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css"
                rel="stylesheet" type="text/css" />
            <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
            <!-- end - This is for export functionality only -->
            <script src="<?= $base_url ?>assets/plugins/jquery-validation/dist/jquery.validate.js"></script>
            <script>
            $("#form_validation").validate();
            $("#form_validation").areYouSure();
            $(".select2").select2();
            $('.singledate').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'dd-mm-yyyy',
            });


    $('.trash-me').click(function () {
        var id = $(this).attr('id');
        var filename = $(this).data('file');
        $.confirm({
            icon: 'fa fa-trash',
            title: 'Confirm!',
            content: 'Are you sure you want to delete?',
            animation: 'zoom',
            closeAnimation: 'none',
            buttons: {
                confirm: function () {
                    var url = '<?= $base_url ?>fleet/del_document';
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: ({id: id, filename:filename}),
                        success: function (response) {
                            var res = JSON.parse(response);
                            if (res.status == 'success')
                            {
                                alertify.success(res.status_message);
                                window.location.reload();        
                            } else
                            {
                                alertify.error(res.status_message);
                            }
                        }
                    });
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