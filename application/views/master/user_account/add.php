<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Add User</h4>
        </div>
        <div class="card-body myModal">
            <form class="m-t-10 row" id="form_validation" novalidate action="<?= $base_url ?>master/user_account/add" method="POST" enctype="multipart/form-data">
                <div class="form-group col-md-6">
                    <label>First Name</label>
                    <input type="text" name="data[user_firstname]" class="form-control" required data-validation-required-message="This field is required">
                </div>

                <div class="form-group col-md-6">
                    <label>Last Name</label>
                    <input type="text" name="data[user_lastname]" class="form-control" required data-validation-required-message="This field is required">
                </div>

                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" required data-validation-required-message="This field is required">
                </div>

                <div class="form-group col-md-6">
                    <label>Phone</label>
                    <input type="text" name="data[user_phone]" class="form-control" required data-validation-required-message="This field is required">
                </div>

                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required data-validation-required-message="This field is required">
                </div>

                <div class="form-group col-md-6">
                    <label>Confirm Password</label>
                    <input type="password" name="cpassword" class="form-control" required data-validation-required-message="This field is required">
                </div>

                <div class="form-group col-md-6">
                    <label>Group</label>
                    <select class="selectpicker form-control show-tick" name="group" required data-validation-required-message="Please select state">
                        <option value="">Select</option>
                        <?php
                        foreach ($groups as $group) {
                            echo '<option value="' . $group->ugrp_id . '">' . $group->ugrp_name . '</option>';
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
                        <button class="btn btn-success" name="update" value="Update">Save</button>
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
                //var form_data = $form.serialize();
                var formData = new FormData($("#form_validation")[0]);
                document.getElementById('form_validation').reset();

                $.ajax({
                    url: $form.attr('action'),
                    type: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        
                        var response = JSON.parse(response);
                        if (response.status == 'success') {
                            // document.getElementById('form_validation').reset();
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

                /*
                 
                 $.ajax({
                 type: 'POST',
                 url: $form.attr('action'),
                 data: $form.serialize(),
                 success: function (data)
                 {
                 console.log(data);
                 var response = JSON.parse(data);
                 if (response.status == 'success') {
                 document.getElementById('form_validation').reset();
                 alertify.success(response.status_message, 100);
                 } else {
                 alertify.error(response.status_message);
                 }
                 }
                 });
                 */

            }
        });
    }(window, document, jQuery);
</script>