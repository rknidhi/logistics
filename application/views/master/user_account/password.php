<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Update User Details</h4>
        </div>
        <div class="card-body myModal">

            <form class="m-t-40 row" id="form_validation" novalidate action="<?= $base_url ?>master/user_account/reset_password/<?= $user_details->uacc_id ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?= $user_details->uacc_id ?>" id="upro_id" name="upro_id" class="form-control input-sm">

                <div class="form-group col-md-6">
                    <label>Name</label>
                    <input type="text" name="data[user_firstname]" readonly class="form-control" value="<?= $user_details->user_firstname ?> <?= $user_details->user_lastname ?>" required data-validation-required-message="This field is required">
                </div>

                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="text" name="user_email_id" class="form-control" readonly value="<?= $user_details->uacc_email ?>" required data-validation-required-message="This field is required">
                </div>

                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" name="new_password" class="form-control" required data-validation-required-message="This field is required">
                </div>

                <div class="form-group col-md-6">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" required data-validation-required-message="This field is required">
                </div>

                <div class="form-group col-md-12 m-t-10 text-center">
                    <div class="col-sm-12">
                        <button class="btn btn-success" name="update" value="Update">Change Password</button>
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
                        console.log(response);
                        var response = JSON.parse(response);
                        if (response.status == 'success') {
                            alertify.success(response.status_message);
                            var msg = alertify.warning(' <button class="btn btn-danger btn-icon btn-xs" id="1"><i class="fa fa-cogs"></i></button> Click to Reload...', 10);
                            msg.callback = function (isClicked) {
                                if (isClicked)
                                    window.location.reload();

                            };
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