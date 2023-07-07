<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Add Company</h4>
        </div>
        <div class="card-body myModal">
            <form class="m-t-10 row" id="form_validation" novalidate action="<?= $base_url ?>master/company/add" method="POST">
                <div class="form-group col-md-3">
                    <h5>Company Name<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[company_name]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Address<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[address]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>City<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[city]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>State <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[state_id_fk]" class="" required data-validation-required-message="Please select state">
                            <option value="">Select</option>
                            <?php
                            foreach ($states as $state) {
                                echo '<option value="' . $state->state_id . '">' . $state->state_name . '</option>';
                            }
                            ?>    
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Pincode<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[pincode]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Phone<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[phone_no]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Support Phone<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[support_phone_no]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>


                <div class="form-group col-md-3">
                    <h5>Regd No<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[regd_no]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Service Tax No<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[service_tax_no]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Pan Card No<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[pan_card_no]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>TAN No<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[tan_no]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>GST No<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[gst_no]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>SAC Code</h5>
                    <div class="controls">
                        <input type="text" name="data[sac_code]" class="form-control"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Email</h5>
                    <div class="controls">
                        <input type="text" name="data[email]" class="form-control"></div>
                </div>

                <div class="clearfix"></div>
                <div class="form-group col-md-12 text-center">
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
                            document.getElementById('form_validation').reset();
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