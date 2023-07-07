<div class="row">
    <div class="card">
        <div class="header">
            <h2><strong>Update</strong> Reset Password</h2>
        </div>
        <div class="body  myModal">
            <form class="row" id="form_validation" action="<?= $base_url ?>manage/user_account/reset_password/?str=<?= $this->function_library->encode_id($client->uacc_id) ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" value="<?= $client->uacc_id ?>" id="upro_id" name="upro_id" class="form-control input-sm">

                <div class="form-group col-md-6">
                    <label>Name</label>
                    <input type="text" name="text" value="<?php echo $this->function_library->get_user_name($client->uacc_id) ?>" class="form-control" required readonly>
                </div>

                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="text" name="user_email_id" value="<?= $client->uacc_email ?>" class="form-control" required data-validation-required-message="This field is required" readonly>
                </div>

                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" name="new_password" class="form-control" required data-validation-required-message="This field is required">
                </div>

                <div class="form-group col-md-6">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" required data-validation-required-message="This field is required">
                </div>

                <div class="clearfix"></div>
                <div class="form-group col-md-12 m-t-10 text-center">
                    <div class="col-sm-12">
                        <button class="btn btn-success" name="update" value="Update">Update Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Column -->
</div>
<link rel="stylesheet" href="<?= $base_url ?>assets/plugins/bootstrap-select/css/bootstrap-select.css" />
<script src="<?= $base_url ?>assets/plugins/jquery-validation/jquery.validate.js"></script>
<script>
    $('.selectpicker').selectpicker();
    $(function () {
        $('#form_validation').validate({
            highlight: function (input) {
                $(input).parents('.form-line').addClass('error');
            },
            unhighlight: function (input) {
                $(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function (error, element) {
                $(element).parents('.form-group').append(error);
            },
            submitHandler: function (form) {
                var formData = new FormData($("#form_validation")[0]);
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        document.getElementById('form_validation').reset();
                        var response = JSON.parse(response);
                        if (response.status == 'success') {
                            alertify.success(response.status_message);
                        } else {
                            alertify.error(response.status_message);
                        }
                    }
                });
            }
        });
    });


</script>
