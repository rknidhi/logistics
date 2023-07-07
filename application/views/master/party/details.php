<div class="card card-outline-primary">
    <div class="card-header">
        <h4 class="m-b-0 text-white">Party Details</h4>
    </div>
    <div class="card-body myModal">
        <form class="row" id="form_validation" novalidate method="POST">

            <div class="form-group col-md-3">
                <h5>Party Name</h5>
                <div class="controls">
                    <input type="text" name="data[party_name]" value="<?= $party->party_name ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Address</h5>
                <div class="controls">
                    <input type="text" name="data[address]" value="<?= $party->address ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Tin No</h5>
                <div class="controls">
                    <input type="text" name="data[tin_no]" value="<?= $party->tin_no ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Pan Card No</h5>
                <div class="controls">
                    <input type="text" name="data[pan_card_no]" value="<?= $party->pan_card_no ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>GST Type </h5>
                <div class="controls">
                    <input type="text" name="data[gst_type]" value="<?= $this->config->item('gst_type')[$party->gst_type] ?>" class="form-control" readonly >
                </div>
            </div>

            <div class="form-group col-md-3">
                <h5>GST No</h5>
                <div class="controls">
                    <input type="text" name="data[gst_no]" value="<?= $party->gst_no ?>" class="form-control" readonly>
                </div>
            </div>

            <div class="form-group col-md-3">
                <h5>Phone</h5>
                <div class="controls">
                    <input type="text" name="data[phone_no]" value="<?= $party->phone_no ?>" class="form-control" readonly  ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Email</h5>
                <div class="controls">
                    <input type="text" name="data[email]" value="<?= $party->email ?>" class="form-control" readonly></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Contact Person</h5>
                <div class="controls">
                    <input type="text" name="data[contact_person]" value="<?= $party->contact_person ?>" class="form-control" readonly></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Mobile</h5>
                <div class="controls">
                    <input type="text" name="data[mobile_no]" value="<?= $party->mobile_no ?>" class="form-control" readonly></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Party Type</h5>
                <div class="controls">
                    <input type="text" name="data[party_type]" value="<?= $this->config->item('party_type')[$party->party_type] ?>" class="form-control" readonly>
                </div>
            </div>

            <div class="form-group col-md-3">
                <h5>Branch</h5>
                <div class="controls">
                    <input type="text" name="data[branch_agent_id_fk]" class="form-control" required value="<?= $this->functions->get_single_row_colum('tbl_master_branch_agent', 'branch_agent', 'branch_agent_id', $party->branch_agent_id_fk) ?>" readonly>
                </div>
            </div>

            <div class="form-group col-md-3">
                <h5>Company</h5>
                <div class="controls">
                    <input type="text" name="data[company_id_fk]" class="form-control" required value="<?= $this->functions->get_single_row_colum('tbl_master_company', 'company_name', 'company_id', $party->company_id_fk) ?>" readonly>
                </div>
            </div>

            <!--div class="form-group col-md-3">
                <h5>3PL</h5>
                <div class="controls">
                    <input type="text" name="data[three_pl]" value="<?php //= $party->three_pl ?>" class="form-control" readonly></div>
            </div -->

            <div class="form-group col-md-3">
                <h5>Surcharge (%)</h5>
                <div class="controls">
                    <input type="text" name="data[surcharge_percent]" value="<?= $party->surcharge_percent ?>" class="form-control" readonly></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Del. Surcharge (%)</h5>
                <div class="controls">
                    <input type="text" name="data[del_surcharge_percent]" value="<?= $party->del_surcharge_percent ?>" class="form-control" readonly></div>
            </div>

            <!-- div class="form-group col-md-3">
                <h5>GR Charge</h5>
                <div class="controls">
                    <input type="text" name="data[gr_charge]" value="<?php //= $party->gr_charge ?>" class="form-control" readonly></div>
            </div -->

            <div class="form-group col-md-3">
                <h5>CFT</h5>
                <div class="controls">
                    <input type="text" name="data[cft]" value="<?= $party->cft ?>" class="form-control" readonly></div>
            </div>

            <!-- div class="form-group col-md-3">
                <h5>Taxes Paid by</h5>
                <div class="controls">
                    <input type="text" name="data[taxes_paid_by]" value="<?php //= $this->config->item('taxes_paid_by')[$party->taxes_paid_by] ?>" class="form-control" readonly>
                </div>
            </div>

            <div class="form-group col-md-3">
                <h5>Delivery Type</h5>
                <div class="controls">
                    <input type="text" name="data[delivery_type]" value="<?php //= $this->config->item('delivery_type')[$party->delivery_type] ?>" class="form-control" readonly>

                </div>
            </div>

            <div class="form-group col-md-3">
                <h5>&nbsp;</h5>
                <div class="controls">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" value="Y" name="data[is_oem_client]" <?php //= ($party->is_oem_client == 'Y' ? 'checked' : '') ?> class="custom-control-input"> 
                        <span class="custom-control-label">Is OEM Client</span></label>
                    <div class="help-block"></div>
                </div>
            </div>

            <div class="form-group col-md-3">
                <h5>&nbsp;</h5>
                <div class="controls">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" value="Y" name="data[is_print_igst]" <?php //= ($party->is_print_igst == 'Y' ? 'checked' : '') ?> class="custom-control-input"> 
                        <span class="custom-control-label">Is Print IGST</span></label>
                    <div class="help-block"></div>
                </div>
            </div -->
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