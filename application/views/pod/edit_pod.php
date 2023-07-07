<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Edit POD Details</h4>
        </div>
        <div class="card-body">
            <form class="m-t-10 row" id="form_validation" novalidate action="<?= $base_url ?>pod/update/<?= $gr_detail->bgr_id ?>" method="POST">
                
                <div class="form-group col-md-4">
                    <h5>POD Status</h5>
                    <div class="controls">
                        <select class="form-control select2" name="data[pod_status]" required>
                            <option value="">Select</option>
                            <option value="Pending" <?= $gr_detail->pod_status == 'Pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="Received" <?= $gr_detail->pod_status == 'Received' ? 'selected' : '' ?>>Received</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Received Date<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[pod_received_date]" value="<?= convertToHumanDate($gr_detail->pod_received_date) ?>" class="form-control singledate" required></div>
                </div>

                <div class="form-group col-md-4">
                    <h5>POD Branch</h5>
                    <div class="controls">
                        <select class="form-control select2" name="data[pod_branch]" required>
                            <option value="">Select</option>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<option value="' . $branch->branch_agent_id . '" ' . ($branch->branch_agent_id == $gr_detail->pod_branch ? 'selected' : '') . '>' . $branch->branch_agent . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="form-group col-md-12 text-center">
                    <div class="col-sm-12">
                        <button class="btn btn-success" name="update" value="Update">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Column -->
</div>
<link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?= $base_url ?>assets/js/validation.js"></script>
<script>

    !function (window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation({
            submitSuccess: function ($form, event) {

                $.ajax({
                    type: 'POST',
                    url: $form.attr('action'),
                    data: $form.serialize(),
                    success: function (data)
                    {
                        var response = JSON.parse(data);
                        if (response.status == 'success') {
                            //document.getElementById('form_validation').reset();
                            alertify.success(response.status_message);
                            setTimeout(function () {
                                window.location.reload();
                            }, 1000);
                            
                            //alertify.success(response.status_message);
                            //var msg = alertify.warning(' <button class="btn btn-danger btn-icon btn-xs" id="1"><i class="fa fa-cogs"></i></button> Click to Reload...', 10);
                            //msg.callback = function (isClicked) {
                            //    if (isClicked)
                            //        window.location.reload();
                            //};
                        } else {
                            alertify.error(response.status_message);
                        }
                    }
                });
                // will not trigger the default submission in favor of the ajax function
                event.preventDefault();
            }
        });
    }(window, document, jQuery);

    $('.singledate').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy',
    });
</script>