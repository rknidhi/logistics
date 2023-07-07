<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Update Assets</h4>
        </div>
        <div class="card-body myModal">
            <form class="m-t-10 row" id="form_validation" novalidate action="<?= $base_url ?>master/assets/update/<?= $assets->assets_id ?>" method="POST">
                <div class="form-group col-md-3">
                    <h5>Name of Assets<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[asset_name]" value="<?= $assets->asset_name ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Quantity<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[qty]" value="<?= $assets->qty ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Value<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[value]" value="<?= $assets->value ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>
                <div class="form-group col-md-3">
                    <h5>Branch <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control select2" name="data[branch_id_fk]" class="" required data-validation-required-message="Please select Branch">
                            <option value="">Select</option>
                            <?php
                            foreach ($bagents as $bagent) {
                                echo '<option value="' . $bagent->branch_agent_id . '" ' . ($bagent->branch_agent_id == $assets->branch_id_fk ? 'selected' : '') . '>' . $bagent->branch_agent . '</option>';
                            }
                            ?>    
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