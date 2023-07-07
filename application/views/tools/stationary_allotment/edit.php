<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Update Stationary Allotment</h4>
        </div>
        <div class="card-body">
            <form class="m-t-40 row" id="form_validation" novalidate action="<?= $base_url ?>tools/stationaryallotment/update/<?= $allotment->allotment_id ?>" method="POST">

                <div class="form-group col-md-4">
                    <h5>Stationary Name</h5>
                    <div class="controls">
                        <select name="data[st_id_fk]" id="st_id_fk" class="form-control select2">
                            <option value="">--Select--</option>
                            <?php
                            foreach ($stationaries as $stationary) {
                                echo '<option value="' . $stationary->st_id . '" ' . ($stationary->st_id == $allotment->st_id_fk ? 'selected' : '') . '>' . $stationary->name . '(' . $stationary->fy_year . '-' . ($stationary->fy_year + 1) . ')' . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <h5>From No.<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[from_no]" class="form-control" value="<?= $allotment->from_no ?>" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-4">
                    <h5>To No.<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[to_no]" class="form-control" value="<?= $allotment->to_no ?>"  required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Branch</h5>
                    <div class="controls">
                        <select name="data[branch_id_fk]" id="branch_id_fk" class="form-control select2">
                            <option value="">--Select--</option>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<option value="' . $branch->branch_agent_id . '" ' . ($branch->branch_agent_id == $allotment->branch_id_fk ? 'selected' : '') . '>' . $branch->branch_agent . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Issued Date<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[issued_date]" id="issued_date" value="<?= convertToHumanDate($allotment->issued_date) ?>" class="form-control singledate" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-12 m-t-10 text-center">
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
    $('.singledate').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy',
    });
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
                            alertify.success(response.status_message);
                            setTimeout(function () {
                                window.location.reload();
                            }, 1000);
//                            var msg = alertify.warning(' <button class="btn btn-danger btn-icon btn-xs" id="1"><i class="fa fa-cogs"></i></button> Click to Reload...', 10);
//                            msg.callback = function (isClicked) {
//                                if (isClicked)
//                                    window.location.reload();
//
//                            };
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
</script>