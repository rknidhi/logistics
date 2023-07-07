<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Update User Details</h4>
        </div>
        <div class="card-body myModal">

            <form class="m-t-10 row" id="form_validation" novalidate action="<?= $base_url ?>master/user_account/update/<?= $user_details->uacc_id ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?= $user_details->uacc_id ?>" id="upro_id" name="data[upro_id]" class="form-control input-sm">
                <div class="form-group col-md-6">
                    <label>First Name</label>
                    <input type="text" name="data[user_firstname]" class="form-control" value="<?= $user_details->user_firstname ?>" required data-validation-required-message="This field is required">
                </div>

                <div class="form-group col-md-6">
                    <label>Last Name</label>
                    <input type="text" name="data[user_lastname]" class="form-control"  value="<?= $user_details->user_lastname ?>" required data-validation-required-message="This field is required">
                </div>

                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" readonly value="<?= $user_details->uacc_email ?>" required data-validation-required-message="This field is required">
                </div>

                <div class="form-group col-md-6">
                    <label>Phone</label>
                    <input type="text" name="data[user_phone]" value="<?= $user_details->user_phone ?>" class="form-control" required data-validation-required-message="This field is required">
                </div>

                <div class="form-group col-md-6">
                    <label>Group</label>
                    <select class="selectpicker form-control show-tick" name="group" required data-validation-required-message="Please select state">
                        <option value="">Select</option>
                        <?php
                        foreach ($groups as $group) {
                            echo '<option value="' . $group->ugrp_id . '" ' . ($user_details->uacc_group_fk == $group->ugrp_id ? 'selected' : '') . '>' . $group->ugrp_name . '</option>';
                        }
                        ?>
                    </select>
                </div>


                <div class="form-group col-md-4">
                    <label>Photo</label>
                    <input type="file" name="image_em" class="form-control">
                </div>

                <div class="form-group col-md-12 m-t-10 text-center">
                    <div class="col-sm-12">
                        <button class="btn btn-success" name="update" value="Update">Update Profile</button>
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

                var formData = new FormData($("#form_validation")[0]);
                $.ajax({
                    url: $form.attr('action'),
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        
                        var response = JSON.parse(response);
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