<div class="card card-outline-primary">
    <div class="card-header">
        <h4 class="m-b-0 text-white">Company Details</h4>
    </div>
    <div class="card-body myModal">
        <form class="m-t-40 row" id="form_validation" novalidate method="POST">
            <div class="form-group col-md-3">
                <h5>Company Name<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[company_name]" value="<?= $company->company_name ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Address<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[address]" value="<?= $company->address ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>City<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[city]" value="<?= $company->city ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>State <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select class="form-control" name="data[state_id_fk]" class="" readonly data-validation-readonly-message="Please select state">
                        <option value="">Select</option>
                        <?php
                        foreach ($states as $state) {
                            echo '<option value="' . $state->state_id . '" ' . ($state->state_id == $company->state_id_fk ? 'selected' : '') . '>' . $state->state_name . '</option>';
                        }
                        ?>    
                    </select>
                </div>
            </div>

            <div class="form-group col-md-3">
                <h5>Pincode<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[pincode]" value="<?= $company->pincode ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Phone<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[phone_no]" value="<?= $company->phone_no ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Support Phone<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[support_phone_no]" value="<?= $company->support_phone_no ?>" class="form-control" readonly ></div>
            </div>


            <div class="form-group col-md-3">
                <h5>Regd No<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[regd_no]" value="<?= $company->regd_no ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Service Tax No<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[service_tax_no]" value="<?= $company->service_tax_no ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Pan Card No<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[pan_card_no]" value="<?= $company->pan_card_no ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>TAN No<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[tan_no]" value="<?= $company->tan_no ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>GST No<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[gst_no]" value="<?= $company->gst_no ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>SAC Code</h5>
                <div class="controls">
                    <input type="text" name="data[sac_code]" value="<?= $company->sac_code ?>" class="form-control" readonly></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Email</h5>
                <div class="controls">
                    <input type="text" name="data[email]" value="<?= $company->email ?>" class="form-control" readonly></div>
            </div>

        </form>
    </div>
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