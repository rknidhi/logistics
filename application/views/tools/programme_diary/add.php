<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Programme Diary</title>
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
                                    <h4 class="m-b-0 text-white">Programme Diary</h4>
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
                                            <form class="m-t-0" id="form_validation"action="<?= $base_url ?>tools/programme_diary/add" method="POST">
                                                <fieldset>
                                                    <legend> Add New </legend>
                                                    <table width="100%">
                                                        <tr>
                                                            <td width="20%"><label class="control-label">Type </label>
                                                                <select class="form-control select2" name="data[type]" id="branch_id_fk" class="" required>
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($this->config->item('programme_type') as $type) {
                                                                        echo '<option value="' . $type . '">' . $type . '</option>';
                                                                    }
                                                                    ?>    
                                                                </select> 
                                                            </td>

                                                            <td width="20%"><label class="control-label">Date </label>
                                                                <input type="text" name="data[prg_date]" class="form-control singledate" required></td>

                                                            <td width="20%">
                                                                <label class="control-label">Consignor</label>
                                                                <select name="data[consignor_id_fk]" id="consignor_id_fk" class="form-control select2" style="width: 100%" required>
                                                                    <option value="">Select</option>
                                                                    <?php foreach ($parties as $party) { ?>    
                                                                        <option value="<?= $party->party_id ?>"><?= $party->party_name ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td width="20%">
                                                                <label class="control-label">Station</label>
                                                                <select class="form-control select2" name="data[from_station_fk]" id="from_station_fk" class="" required data-validation-required-message="Please select state">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($stations as $station) {
                                                                        echo '<option value="' . $station->station_id . '">' . $station->station_name . '</option>';
                                                                    }
                                                                    ?>    
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><label class="control-label">Address</label>
                                                                <input type="text" name="data[address]" class="form-control" required></td>

                                                            <td><label class="control-label">Remarks</label>
                                                                <input type="text" name="data[remarks]" class="form-control" required></td>

                                                            <td><br/><button type="submit" class="btn btn-success btn1" name="submit" value="Submit"> Add</button></td>
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                            </form>
                                        </div>

                                        <div class="col-lg-12">
                                            <form class="m-t-0" novalidate id="form_validation2" action="" method="POST">
                                                <fieldset>
                                                    <legend> Search </legend>
                                                    <table width="100%">
                                                        <tr>
                                                            <td width="20%"><label class="control-label">From Date </label>
                                                                <input type="text" name="from_date" value="<?= $this->input->post('from_date') ?>" class="form-control singledate" required>
                                                            </td>

                                                            <td width="20%"><label class="control-label">To Date </label>
                                                                <input type="text" name="to_date" value="<?= $this->input->post('to_date') ?>" class="form-control singledate" required>
                                                            </td>

                                                            <td width="20%">
                                                                <label class="control-label">Branch</label>
                                                                <select name="branch_id" id="branch_id" class="form-control select2" style="width: 100%" required>
                                                                    <option value="">Select</option>
                                                                    <?php foreach ($branches as $branch) { ?>    
                                                                        <option value="<?= $branch->branch_agent_id ?>" <?= ($branch->branch_agent_id == $this->input->post('branch_id')) ? 'selected' : '' ?>><?= $branch->branch_agent ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td><br/><input type="submit" class="btn btn-success btn1" name="submit" value="Search"></td>
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                            </form>

                                            <?php if ($display): ?>
                                                <div class="table-responsive">
                                                    <table id="example23" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Type</th>
                                                                <th>Date</th>
                                                                <th>Consignor</th>
                                                                <th>Station</th>
                                                                <th>Address</th>
                                                                <th>Remarks</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sn = 1;
                                                            foreach ($records as $record) {
                                                                ?>
                                                                <tr id="row-id-<?= $record->prgd_id ?>">
                                                                    <td><?= $sn ?></td>
                                                                    <td><?= $record->type ?></td>
                                                                    <td><?= convertToHumanDate($record->prg_date) ?></td>
                                                                    <td><?= $this->function_library->FindParty($record->consignor_id_fk) ?></td>
                                                                    <td><?= $this->function_library->FindStation($record->from_station_fk) ?></td>
                                                                    <td><?= $record->address ?></td>
                                                                    <td><?= $record->remarks ?></td>
                                                                    <td>
                                                                        <a class="trash trash-me material-icons" id="<?= $record->prgd_id ?>" ><i class="fa fa-trash"></i></a>
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
        <script src="<?= $base_url ?>assets/js/validation.js"></script>
        <script>
            $("#form_validation").validate({
                submitHandler: function (form) {
                    var formData = new FormData($("#form_validation")[0]);
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (res) {
                            var response = JSON.parse(res);
                            if (response.status == 'success') {
                                //document.getElementById('form_validation').reset();
                                alertify.success(response.status_message);
                                setTimeout(function () {
                                    window.location.reload();
                                }, 1000);
                            } else {
                                alertify.error(response.status_message);
                            }
                        }
                    });
                }
            });

            $("#example23").on("click", ".trash-me", function () {
                var id = $(this).attr('id');
                $.confirm({
                    icon: 'fa fa-trash',
                    title: 'Confirm!',
                    content: 'Are you sure you want to delete?',
                    animation: 'zoom',
                    closeAnimation: 'none',
                    buttons: {
                        confirm: function () {
                            var url = '<?= $base_url ?>tools/programme_diary/delete';
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
    </body>

</html>