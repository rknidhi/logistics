<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Settlement Report</title>
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
                                    <h4 class="m-b-0 text-white">Settlement Report</h4>
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
                                                    <legend>Search Invoice</legend>
                                                    <table width="100%">
                                                        <tr>
                                                            <td><label class="control-label ">Driver :</label></td>
                                                            <td width="400">
                                                                <select class="form-control select2"
                                                                    name="driver_id_fk" class="" >
                                                            <option value="">Select</option>
                                                            <?php foreach ($drivers as $driver) { ?>
                                                                 <option value="<?= $driver->driver_id; ?>" <?= ($driver->driver_id == $this->input->post('driver_id_fk') ? 'selected' : '') ?>>
                                                                    <?= $driver->name; ?></option>
                                                                <?php } ?>                                                                    
                                                                </select>
                                                            </td>

                                                            <td><label class="control-label ">Settlement No.:</label></td>
                                                            <td><input type="text" name="bill_no" value="<?= $this->input->post('bill_no') ?>" onkeypress="return isNumber(event)"  class="form-control" placeholder="Settlement No."></td>

                                                            <td><label class="control-label ">Date From :</label></td>
                                                            <td width="110"><input type="text" name="from_date" value="<?= $this->input->post('from_date') ?>" class="form-control singledate"></td>

                                                            <td><label class="control-label "> Date To :</label></td>
                                                            <td width="110"><input type="text" name="to_date" value="<?= $this->input->post('to_date') ?>" class="form-control singledate"></td>
                                                            <td><input type="submit" name="search" value="Get Details" class="btn btn-info"></td>
                                                        </tr>
                                                        
                                                    </table>
                                                </fieldset>
                                            </form>
                                                <h3>Billed Booking</h3>
                                                    <div class="table table-responsive">
                                                        <table id="example2" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Settlement No.</th>
                                                                    <th>Settlement Date</th>
                                                                    <th>Driver Name</th>
                                                                    <th>Contact No.</th>
                                                                    <th>Settle Create</th>
                                                                    <th>Total Invoice Value</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $sn=1;
                                                                foreach ($driver_settle as $settlement) {
                                                                    ?>
                                                                    <tr id="row-id-<?= $settlement->settle_id ?>">
                                                                        <td><?= $settlement->settle_number; ?></td>
                                                                        <td><?= convertToHumanDate($settlement->settle_date) ?></td>
                                                                        <td><?= $this->function_library->FindDriverDetails($settlement->driver_id_fk)->name ?></td>

                                                                        <td><?= $this->function_library->FindDriverDetails($settlement->driver_id_fk)->mobile_no ?></td>         <td><?= convertToHumanDate($settlement->settle_create_date) ?></td>
                                                                        <td><?= $settlement->grand_total; ?></td>                               
                                                                        <td>
                                                                           <!--  <a class="edit" href="<?= $base_url ?>fleet/<?= $settlement->settle_id ?>/FALSE"><i class="fa fa-pencil-alt"></i></a> -->
                                                                            <!-- Delete Bill Dated 15-1019 -->
                                                                            <a class="trash trash-me material-icons" id="<?= $settlement->settle_id ?>"><i class="fa fa-trash"></i></a>  <!-- End -->             
                                                                            <a onclick="printwindow('<?= $base_url ?>fleet/print_settle/<?= $settlement->settle_id ?>')" href="javascript:;"  href="javascript:;"><i class="fa fa-print" aria-hidden="true"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                    $sn++;
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
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
$('#example2').DataTable({
    columnDefs: [
        {
         targets: [0, 1, 2], visible:true},
    ],
// Added on 26-09-19
    dom: 'Blfrtip',
    // End
    language: {search: "_INPUT_",
        searchPlaceholder: "Search Records..."
    },
    // Added on 26-09-19
    buttons: [
        {
            extend: 'excel',
            exportOptions: {
                columns: [0, 1, 2, 4, 7]
                }
        }
    ],    
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
                                                        
            $("#example2").on("click", ".trash-me", function () {
            var id = $(this).attr('id');
            $.confirm({
                icon: 'fa fa-trash',
                title: 'Confirm!',
                content: 'Are you sure you want to delete?',
                animation: 'zoom',
                closeAnimation: 'none',
                buttons: {
                    confirm: function () {
                        var url = '<?= $base_url ?>fleet/delete_settle';
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