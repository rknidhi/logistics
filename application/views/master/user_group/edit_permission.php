<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Update User Group Permissions : <?= $user_group_details->ugrp_name ?> </h4>
        </div>
        <div class="card-body">
            <form class="m-t-0 row" id="form_validation" novalidate action="<?= $base_url ?>master/user_group/update_permission/<?= $user_group_details->ugrp_id ?>" method="POST">


                <?php foreach ($user_privileges as $user_privileg): ?>
                    <div class="form-group col-md-4">
                        <div class="controls">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" value="<?= $user_privileg->upriv_id ?>" name="permission[]" class="custom-control-input" aria-invalid="false" <?= ($this->function_library->isGroupPermission($user_group_details->ugrp_id, $user_privileg->upriv_id)) ? 'checked' : '' ?>> 
                                <span class="custom-control-label"><?= $user_privileg->upriv_name ?></span></label>
                            <div class="help-block"></div>
                        </div>
                    </div>


                <?php endforeach; ?>

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
                        console.log(data);
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