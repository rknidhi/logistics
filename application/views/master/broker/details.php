
<div class="card card-outline-primary">
    <div class="card-header">
        <h4 class="m-b-0 text-white">Broker Details</h4>
    </div>    
    <div class="card-body myModal">
        <form class="row" id="form_validation" novalidate action="<?= $base_url ?>master/broker/update/<?= $broker->broker_id ?>" method="POST">
            <div class="form-group col-md-3">
                <h5>Broker<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[broker]" value="<?= $broker->broker ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Address<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[address]" value="<?= $broker->address ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Service Tax No<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[service_tax_no]" value="<?= $broker->service_tax_no ?>" class="form-control" readonly ></div>
            </div>


            <div class="form-group col-md-3">
                <h5>Pan Card No<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[pan_card_no]" value="<?= $broker->pan_card_no ?>" class="form-control" readonly ></div>
            </div>


            <div class="form-group col-md-3">
                <h5>Phone No<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[phone_no]" value="<?= $broker->phone_no ?>" class="form-control" readonly ></div>
            </div>


            <div class="form-group col-md-3">
                <h5>Mobile No<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[mobile_no]" value="<?= $broker->mobile_no ?>" class="form-control" readonly ></div>
            </div>


            <div class="form-group col-md-3">
                <h5>Email<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[email]" value="<?= $broker->email ?>" class="form-control" readonly ></div>
            </div>

            <!--div class="form-group col-md-3">
                <h5>Method <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select class="form-control" name="data[method]" class="" readonly data-validation-readonly-message="Please select state">
                        <option value="">Select</option>
                        <?php
/*                         foreach ($freight_methods as $freight_method) {
                            echo '<option value="' . $freight_method->freight_method . '" ' . ($freight_method->freight_method == $broker->method ? 'selected' : '') . '>' . $freight_method->freight_method . '</option>';
                        } */
                        ?>    
                    </select>
                </div>
            </div -->

            <div class="form-group col-md-3">
                <h5>Rate<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[rate]" value="<?= $broker->rate ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Branch <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[branch_agent_id_fk]" class="form-control" required value="<?= $this->functions->get_single_row_colum('tbl_master_branch_agent', 'branch_agent', 'branch_agent_id', $broker->branch_agent_id_fk) ?>" readonly>
                </div>
            </div>

            <!--div class="form-group col-md-3">
                <h5>Company <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[company_id_fk]" class="form-control" required value="<?php //= $this->functions->get_single_row_colum('tbl_master_company', 'company_name', 'company_id', $broker->company_id_fk) ?>" readonly>
                </div>
            </div -->
            <div class="form-group col-md-3 m-t-10">
                    <h5>Bank Name</h5>
                    <div class="controls">
                        <input type="text" name="data[bank_name]" value="<?=$broker->bank_name?>" class="form-control" readonly></div>
                </div>
                <div class="form-group col-md-3 m-t-10">
                    <h5>Account Number</h5>
                    <div class="controls">
                        <input type="text" name="data[account_no]" value="<?=$broker->account_no?>" class="form-control" readonly></div>
                </div>
                <div class="form-group col-md-3 m-t-10">
                    <h5>IFSC Code</h5>
                    <div class="controls">
                        <input type="text" name="data[ifsc_code]" value="<?=$broker->ifsc_code?>" class="form-control" readonly></div>
                </div>
                <div class="form-group col-md-3 m-t-10">
                    <h5>Bank Branch</h5>
                    <div class="controls">
                        <input type="text" name="data[bank_branch]" value="<?=$broker->bank_branch?>" class="form-control" readonly></div>
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