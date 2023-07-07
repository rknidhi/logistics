<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Add State</h4>
        </div>
        <div class="card-body myModal">
            <form class="m-t-10 row" id="form_validation" novalidate action="<?= $base_url ?>master/state/add" method="POST">
                <div class="form-group col-md-4 m-t-10">
                    <h5>State Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[state_name]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>
                <div class="form-group col-md-4 m-t-10">
                    <h5>Remark</h5>
                    <div class="controls">
                        <input type="text" name="data[remark]" class="form-control"></div>
                </div>

                <div class="form-group col-md-4 m-t-10">
                    <h5>GST State Code <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[gst_state_code]" class="form-control" required data-validation-required-message="This field is required"></div>
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
                var form_data = $form.serialize();
                document.getElementById('form_validation').reset();
                $.ajax({
                    type: 'POST',
                    url: $form.attr('action'),
                    data: form_data,
                    success: function (data)
                    {
                        var response = JSON.parse(data);
                        if (response.status == 'success') {
                            alertify.success(response.status_message);
                            setTimeout(function () {
                                window.location.reload();
                            }, 1000);
                            //window.location.reload();
                            //var msg = alertify.warning(' <button class="btn btn-danger btn-icon btn-xs" id="1"><i class="fa fa-cogs"></i></button> Click to Reload...', 10);
                            //msg.callback = function (isClicked) {
                            //     if (isClicked)
                            //        window.location.reload();
                            //
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
</script>