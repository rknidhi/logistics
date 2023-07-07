<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : POD</title>
        <?php $this->load->view('includes/head'); ?> 
        <link href="<?= $base_url ?>assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="<?= $base_url ?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $base_url ?>assets/css/form-css.css" rel="stylesheet" type="text/css" />
        <style>
        select.select2{
            width: 100%;
        }
        .download i{
            color: purple;
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline-primary">
                                <div class="card-header ">
                                    <h4 class="m-b-0 text-white">POD</h4>
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
                                            <form class="m-t-10" id="form_validation" novalidate action="" method="POST">
                                                <fieldset>
                                                    <legend>Search GR</legend>
                                                    <table width="100%">
                                                        <tr>
                                                            <td><label class="control-label ">POD Branch :</label></td>
                                                            <td>
                                                                <select class="form-control select2" name="pod_branch" required>
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($branches as $branch) {
                                                                        echo '<option value="' . $branch->branch_agent_id . '" ' . ($branch->branch_agent_id == $this->input->post('pod_branch') ? 'selected' : '') . '>' . $branch->branch_agent . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                            <td><label class="control-label">POD Status :</label></td>
                                                            <td><select class="form-control select2" name="pod_status" required>
                                                                    <option value="">Select</option>
                                                                    <option value="Pending" <?= $this->input->post('pod_status') == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                                                    <option value="Received" <?= $this->input->post('pod_status') == 'Received' ? 'selected' : '' ?>>Received</option>
                                                                </select>
                                                            </td>
                                                            <td><label class="control-label ">Party :</label></td>
                                                            <td>
                                                                <select class="form-control select2" name="party" required>
                                                                    <option value="">Select</option>
                                                                    <?php foreach ($parties as $party) { ?>    
                                                                        <option value="<?= $party->party_id ?>" <?= ($party->party_id == $this->input->post('party') ? 'selected' : '') ?>><?= $party->party_name ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                           </tr>
                                                        <tr>
                                                            
                                                            <td><label class="control-label ">GR No.:</label></td>
                                                            <td><input type="text" name="gr_no" value="<?= $this->input->post('gr_no') ?>" onkeypress="return isNumber(event)"  class="form-control"></td>
                                                            <td><label class="control-label">Date From :</label></td>
                                                            <td><input type="text" name="from_date" value="<?= $this->input->post('from_date') ?>" class="form-control singledate"></td>

                                                            <td><label class="control-label ">Date To :</label></td>
                                                            <td><input type="text" name="to_date" value="<?= $this->input->post('to_date') ?>" class="form-control singledate"></td>
                                                        
                                                            <td align="right"><input type="submit" name="search" value="Get Details" class="btn btn-success"></td>
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                            </form>
                                            <?php
                                            if ($display):
                                                ?>
                                                <div>
                                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>GR NO.</th>
                                                                <th>Party</th>
                                                                <th>GR Dated</th>
                                                                <th>POD Status</th>
                                                                <th>Received Date</th>
                                                                <th>POD Branch</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sn = 1;
                                                            foreach ($gr_details as $gr_detail) {
                                                                ?>
                                                                <tr id="row-id-<?= $gr_detail->bgr_id ?>">
                                                                    <td><!-- <a href="<?php //= $base_url ?>booking/printgr/<?php //= $gr_detail->bgr_id; ?>" target="_blank"> --><?= $gr_detail->bgr_id; ?><!-- </a> --></td>
                                                                    <td><?= $this->function_library->FindParty($gr_detail->consignor_id_fk) ?></td>
                                                                    <td><?= date_only_format($gr_detail->gr_date) ?></td>
                                                                    <td><?= $gr_detail->pod_status ?></td>
                                                                    <td><?= $gr_detail->pod_received_date ?></td>
                                                                    <td><?= (!empty($gr_detail->pod_branch)) ? $this->function_library->FindBrachAgent($gr_detail->pod_branch) : '' ?></td>
                                                                    <td>
                                                                        <a class="edit" data-fancybox data-type="ajax" data-src="pod/edit_pod/<?= $gr_detail->bgr_id ?>" href="javascript:;"><i class="fa fa-pencil-alt"></i></a>

                                                                        <a onclick="printwindow('<?= $base_url ?>booking/printgr/<?= $gr_detail->bgr_id; ?>')" href="javascript:;"><i class="fa fa-print" aria-hidden="true"></i></a>
                                                                    <!-- Modified by Rakesh Dated:04-10-19 -->

                                                                    <!-- <a class="upload" data-fancybox data-type="ajax" data-src="<?//= $base_url ?>pod/uploadpod/<?//= $gr_detail->bgr_id ?>" href="javascript:;"><i class="fa fa-upload"></i></a> -->                                                                   
                                                                    <?php
                                                                        if(!empty($gr_detail->pod_file_name))
                                                                        {
                                                                        ?>
                                                                    <a class="download" href="<?= $base_url ?>pod/download_pod/<?= $gr_detail->pod_file_name ?>" href="javascript:;"><i class="fa fa-download"></i></a>
                                                                        <?php
                                                                        }
                                                                        ?>                           
                                                                    <!-- End -->

                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                $sn++;
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php endif; ?>
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
            <script src="<?= $base_url ?>assets/plugins/datatables/datatables.min.js"></script>
            <script src="<?= $base_url ?>assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
            <!-- start - This is for export functionality only -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>

            <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
            <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
            <!-- end - This is for export functionality only -->
            <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
            <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

            <script>
                $('.singledate').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: 'dd-mm-yyyy',
                    orientation: "bottom auto"
                });
                $(".select2").select2();
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
                });
                function change_status(id) {
                    var url = 'admin/athlete_management/change_status';
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: ({id: id}),
                        success: function (response) {
                            if (response === 1)
                            {
                                $.alert("You don't have permission to change event status");
                            } else
                            {
                                $('#' + id).replaceWith(response);
                            }
                        }
                    });
                }


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
                                var url = '<?= $base_url ?>master/broker/delete';
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



function printwindow(url) {
        w = 700;
        h = 600;
        LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
        TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
        settings = 'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ',resizable'
        window.open(url, 'printwindow', settings);
    }

</script>
</body>
</html>