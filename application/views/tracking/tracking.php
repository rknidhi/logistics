<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Tracking</title>
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
                                    <h4 class="m-b-0 text-white">Delivery Tracking</h4>
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


                                    
                                    <div class="col-md-12">
                                    <fieldset>
                                        <legend>Search GR</legend>   
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <form id="form_validation1" novalidate action="" method="POST">
                                             
                                                    <table width="100%">
                                                    <tr>
                                                        <td width="15%"><label class="control-label ">GR No.</label></td>
                                                        <td>
                                                            <input type="text" name="gr_no" class="form-control" required value="<?= $gr_no ?>" onkeypress="return isNumber(event)" >
                                                        </td>
                                                        <td><input type="submit" name="search" value="Track" class="btn btn-success"></td>
                                                    </tr>
                                                    </table>
                                           
                                                    </form>
                                                </div>
                                                <div class="col-md-1">

                                                </div>
                                                <div class="col-md-6 form-group text-right">
                                                        <div class="col-sm-12">
                                                            <a data-fancybox data-type="ajax" data-src="<?= $base_url ?>tracking/add_tracking/<?= $gr_no ?>" href="javascript:;" class="btn btn-warning btn1"><i class="fa fa-plus"></i> Add Track Location</a>
                                                        </div>
                                                   <!-- <div class="deliveryStatus">
                                                        <form class="m-t-10" id="trackingData" novalidate action="" method="POST">
                                                        <?php
                                                            if(!empty($gr_no) && !empty($gr_details->bgr_id)){

                                                        ?>        

                                                        <table width="100%">
                                                            <tr style="background:#fff;">
                                                            <td>Delivery Status:</td>
                                                                <td align="left">
                                                                    <?php

                                                                        if($gr_details->delivery_status == 'Delivered')
                                                                        {
                                                                            echo $gr_details->delivery_status;
                                                                        } 
                                                                        else{

                                                                    ?>
                                                                    <select class="form-control select2" name="delivery_status" id="delivery_status">
                                                                        <option value="Pending">Pending</option>
                                                                        <option value="Delivered">Delivered</option>
                                                                    </select>  
                                                                     <?php
                                                                   }
                                                                     ?>   

                                                                </td>
                                                                <td>Delivery Date:</td>
                                                                <?php
                                                                 if(!empty($gr_details->delivery_received_date))
                                                                 {
                                                                    echo "<td>".convertToHumanDate($gr_details->delivery_received_date)."</td>"; 
                                                                ?>
                                                               <?php
                                                                 }
                                                                else
                                                                { 
                                                                ?>
                                                                <td align="left">
                                                                    <input type="text" class="form-control singledate"  name="delivery_received_date" id="delivery_received_date">
                                                                    <input type="hidden" name="gr_no" value="<?= $gr_no; ?>"
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-success" id="deliveredItem">Submit</button>
                                                                </td>
                                                                <?php     
                                                                }
                                                                
                                                               ?> 
                                                    
                                                            </tr>
                                                        </table>

                                                        <?php
                                                            }
                                                        ?>
                                                        </form>
                                                    </div> -->   
                                                </div>
                                            </div>
                                    </fieldset>  
                                        

                                            <?php
                                            if (!empty($gr_no)) :
                                                if (empty($gr_details->bgr_id))
                                                    echo "GR Not Found.";

                                                if ($display):
                                                    ?>

                                                    <fieldset>
                                                        <legend>Vehicle Details</legend>
                                                        <table width="100%">
                                                            <tr>
                                                                <td><label class="control-label ">Vehicle No. </label><input type="text" class="form-control" value="<?= $this->function_library->FindVehicle($gr_details->vehicle_id_fk) ?>" required readonly></td>

                                                                <td><label class="control-label ">From</label>
                                                                    <input type="text" class="form-control" value="<?= $this->function_library->FindStation($gr_details->from_station_fk) ?>" required readonly></td>

                                                                <td><label class="control-label ">To</label>
                                                                    <input type="text" class="form-control" value="<?= $this->function_library->FindStation($gr_details->to_station_fk) ?>" required readonly></td>

                                                                <td><label class="control-label">Broker Name</label>
                                                                    <input type="text" class="form-control" value="<?= !empty($broker_details->broker) ? $broker_details->broker : '' ?>" required readonly></td>

                                                                <td><label class="control-label ">Mobile</label>
                                                                    <input type="text" class="form-control" value="<?= !empty($broker_details->broker) ? $broker_details->mobile_no : '' ?>" required readonly></td>
                                                            </tr>
                                                        </table>
                                                        <br>
                                                        <fieldset style="background:#fff;">
                                                        <legend>Location Status</legend>
                                                        <div>
                                                        <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Day</th>
                                                                    <th>Date</th>
                                                                    <th>Morning Location</th>
                                                                    <th>Evening  Location</th>
                                                                    <th>Remarks</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $sn = 1;
                                                                foreach ($tracking_details as $tracking_detail) {
                                                                    ?>
                                                                    <tr id="row-id-<?= $tracking_detail->tracking_id ?>">
                                                                        <td><?= $sn; ?></td>
                                                                        <td><?= date_only_format($tracking_detail->track_date) ?></td>
                                                                        <td><?= $tracking_detail->morning_location ?></td>
                                                                        <td><?= $tracking_detail->evening_location ?></td>
                                                                        <td><?= $tracking_detail->remarks ?></td>
                                                                        <td>
                                                                            <a class="trash trash-me material-icons" id="<?= $tracking_detail->tracking_id ?>" ><i class="fa fa-trash"></i></a>
                                                                            <a class="edit" data-fancybox data-type="ajax" data-src="<?= $base_url ?>tracking/edit_tracking/<?= $tracking_detail->tracking_id ?>" href="javascript:;"><i class="fa fa-pencil-alt"></i></a>

                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    $sn++;
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                        </div>
                                                    </fieldset>
                                                    </fieldset>
                                                    

                                                  

                                                    <div class="form-group col-md-12 text-center">
                                                        <div class="col-sm-12">
                                                            <a href="<?= $base_url ?>tracking" class="btn btn-danger btn1"><i class="fa  fa-times"></i> Close</a>
                                                        </div>
                                                    </div>

                                                    <?php
                                                endif;
                                            endif;
                                            ?>
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
        </div>
        
                <!-- ============================================================== -->
                <!-- End Wrapper -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- All Jquery -->
                <!-- ============================================================== -->
                <?php $this->load->view('includes/scripts'); ?> 
                <!-- This is data table -->
                <script src="<?= $base_url ?>assets/plugins/datatables/datatables.min.js"></script>
                <script src="<?= $base_url ?>assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
                <!-- start - This is for export functionality only -->
                <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
                <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
                <!-- end - This is for export functionality only -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>

                <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
                <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
                <script>
                                                                $(".select2").select2();
                                                                $('.singledate').datepicker({
                                                                    autoclose: true,
                                                                    format: 'dd-mm-yyyy',
                                                                });

                                                                $('#example23').DataTable({

                                                                    dom: 'Blfrtip',
                                                                    language: {search: "_INPUT_",
                                                                        searchPlaceholder: "Search Records..."
                                                                    },
                                                                    buttons: [
                                                                        {
                                                                            extend: 'excel',

                                                                        }
                                                                    ],
                                                                }
                                                                );


                                                                $('.trash-me').click(function () {
                                                                    var id = $(this).attr('id');
                                                                    $.confirm({
                                                                        icon: 'fa fa-trash',
                                                                        title: 'Confirm!',
                                                                        content: 'Are you sure you want to delete?',
                                                                        animation: 'zoom',
                                                                        closeAnimation: 'none',
                                                                        buttons: {
                                                                            confirm: function () {
                                                                                var url = '<?= $base_url ?>tracking/delete';
                                                                                $.ajax({
                                                                                    url: url,
                                                                                    type: 'POST',
                                                                                    data: ({id: id}),
                                                                                    success: function (response) {
                                                                                        var res = JSON.parse(response);
                                                                                        if (res.status == 'success')
                                                                                        {
                                                                                            alertify.success(res.status_message);
                                                                                            $('#row-id-' + id).remove();
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
                                                                function go_to_edit(url) {
                                                                    window.location.href = url;
                                                                }



/* Modified by Rakesh Dated 24/07/2019*/
var url = '<?= $base_url ?>tracking/deliverdgr';
  $("#deliveredItem").click(function(){
          var data = $("#trackingData").serializeArray();
           $.ajax({
              type: "POST",
              url: url,
              data: data,
            success:function(data)  {
                var res = JSON.parse(data);
                if (res.status == 'success')
                {
                    alertify.success(res.status_message);
                    var msg = alertify.warning(' <button class="btn btn-danger btn-icon btn-xs" id="1"><i class="fa fa-cogs"></i></button> Click to Reload...', 15);
                            msg.callback = function (isClicked) {
                                if (isClicked)
                                    window.location.reload();
                            }
                } else
                {
                    alertify.error(res.status_message);
                }
             }
            });
      });

  /* End */
</script>
</body>

</html>