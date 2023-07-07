<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Update User Group</h4>
        </div>
        <div class="card-body myModal">
            <form class="m-t-10 row" id="form_validation" novalidate action="<?= $base_url ?>master/user_group/update/<?= $user_group->ugrp_id ?>" method="POST">

                <div class="form-group col-md-6 m-t-10">
                    <h5>Group Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[ugrp_name]" value="<?= $user_group->ugrp_name ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>
                <div class="form-group col-md-6 m-t-10">
                    <h5>Description</h5>
                    <div class="controls">
                        <input type="text" name="data[ugrp_desc]" value="<?= $user_group->ugrp_desc ?>" class="form-control"></div>
                </div>


                <div class="form-group col-md-4 m-t-10">
                    <h5>Is Admin Rights <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[ugrp_admin]" required="" data-validation-required-message="Please select company" aria-invalid="false">
                            <option value="">Select</option>
                            <option value="0" <?= ($user_group->ugrp_admin == 0 ? 'selected' : '') ?>>No</option>
                            <option value="1" <?= ($user_group->ugrp_admin == 1 ? 'selected' : '') ?>>Yes</option>
                        </select>
                    </div>
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