<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Billing</title>
        <?php $this->load->view('includes/head'); ?> 
        <link href="<?= $base_url ?>assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="<?= $base_url ?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $base_url ?>assets/css/form-css.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?= $base_url ?>assets/plugins/jquery-validation/demo/css/screen.css">
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
                                    <h4 class="m-b-0 text-white">Unbilled GR</h4>
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
                                                            <td><label class="control-label ">Party :</label></td>
                                                            <td>
                                                                <select class="form-control select2" name="party" required>
                                                                    <option value="">Select</option>
                                                                    <?php foreach ($parties as $party) { ?>    
                                                                        <option value="<?= $party->party_id ?>" <?= ($party->party_id == $this->input->post('party') ? 'selected' : '') ?>><?= $party->party_name .'(' .$party->city .')' ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>

                                                            <td><label class="control-label ">GR No.:</label></td>
                                                            <td><input type="text" name="gr_no" value="<?= $this->input->post('gr_no') ?>" onkeypress="return isNumber(event)"  class="form-control"></td>

                                                            <td><label class="control-label ">Date From :</label></td>
                                                            <td><input type="text" name="from_date" value="<?= $this->input->post('from_date') ?>" class="form-control singledate"></td>

                                                            <td><label class="control-label "> Date To :</label></td>
                                                            <td><input type="text" name="to_date" value="<?= $this->input->post('to_date') ?>" class="form-control singledate"></td>
                                                            <td><input type="submit" name="search" value="Get Details" class="btn btn-success"></td>
                                                        </tr>
                                                      
                                                    </table>
                                                </fieldset>
                                            </form>
                                                <h3>Un-Billed Booking <label class="question"></label></h3>

                                                <form class="m-t-10" id="form_validation2" action="<?= $base_url ?>billing/createbill" method="POST">
                                                    <div>
                                                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>GR NO.</th>
                                                                    <th>Party</th>
                                                                    <th>GR Dated</th>
                                                                    <th>POD Status</th>
                                                                    <th>POD Branch</th>
                                                                    <th>Received Date</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $sn = 1;
                                                                if(isset($gr_details)){
                                                                foreach ($gr_details as $gr_detail) {
                                                                // Modified for DRS dated: 04-09-19
                                                                $pay_party_name='';
                                                                if($gr_detail->freight_by == 'Consignee'){
                                                                        $pay_party_name= $gr_detail->consignee_id_fk;
                                                                    }
                                                                if($gr_detail->freight_by == 'Consignor'){
                                                                        $pay_party_name= $gr_detail->consignor_id_fk;
                                                                    }
                                                                if($gr_detail->freight_by == 'Third Party'){
                                                                    $pay_party_name= $gr_detail->thirdparty_id_fk;
                                                                }
                                                                    
                                                                // End
                                                                    
                                                                    ?>
                                                                    <tr id="row-id-<?= $gr_detail->bgr_id ?>">
                                                                        <td><div class="controls">
                                                                                <label class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" value="<?= $gr_detail->bgr_id ?>" name="gr_nos[]" class="custom-control-input" aria-invalid="false" required> 
                                                                                    <span class="custom-control-label" style="position:absolute"></span></label>
                                                                            </div>
                                                                        </td>
                                                                        <td><a href="<?= $base_url ?>booking/printgr/<?= $gr_detail->bgr_id; ?>" target="_blank"><?= $gr_detail->bgr_id; ?></a></td>
                                                                        <td><?php
                                                                        // Modified for DRS dated: 04-09-19
                                                                            echo $this->function_library->FindPartyDetails($pay_party_name)->party_name.'('.$this->function_library->FindPartyDetails($pay_party_name)->city.')';
                                                                        //= $this->function_library->FindParty($gr_detail->consignor_id_fk)
                                                                        // End ?></td>
                                                                        <td><?= convertToHumanDate($gr_detail->gr_date) ?></td>
                                                                        <td><?= $gr_detail->pod_status ?></td>
                                                                        <td><?= (!empty($gr_detail->pod_branch)) ? $this->function_library->FindBrachAgent($gr_detail->pod_branch) : '' ?></td>
                                                                        <td><?= convertToHumanDate($gr_detail->pod_received_date) ?></td>
                                                                    </tr>
                                                                    <?php
                                                                }
                                                                    $sn++;
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                        <div class="form-group col-md-12 text-center">
                                                        <div class="col-sm-12">
                                                        <input type="submit" name="search" value="Create Bill" class="btn btn-info">
                                                        </div>
                                                    </div>

                                                    </div>
                                                </form>

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
            <!-- Added on 26-09-19 -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>

            <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
            <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
            <!-- End -->
            <!-- end - This is for export functionality only -->
            <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
            <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
            <script src="<?= $base_url ?>assets/plugins/jquery-validation/dist/jquery.validate.js"></script>
            <script>

$('#example23').DataTable({
    columnDefs: [
        {
            targets: [0, 1, 2, 4, 5, 6], visible:true},
    ],
// Added on 26-09-19
//    dom: 'Blfrtip',
// End    

    
    language: {search: "_INPUT_",
        searchPlaceholder: "Search Records..."
    },
// Added on 26-09-19

 /*   buttons: [
        {
            extend: 'excel',
            exportOptions: {
                  columns: [0, 1, 2, 3, 4],
                            }
        }
    ],*/
// End
    
});

    $("#form_validation").validate();
    $("#form_validation2").validate({
        rules: {
            "gr_nos[]": {
                required: true,
            }
        },
        messages: {
            "gr_nos[]": {
                required: "Please select at least 1 GR",
            }
        },
        errorPlacement: function (error, element) {
            if (element.attr("type") == "checkbox") {
                error.insertAfter('.question');
            } else {
                // something else
            }
        }
    });
    $('.singledate').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy',
        orientation: "bottom auto"
    });
    $(".select2").select2();
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