<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Add Party</h4>
        </div>
        <div class="card-body myModal">
            <form class="m-t-10 row" id="form_validation" novalidate action="<?= $base_url ?>master/party/add" method="POST">
                <div class="form-group col-md-3">
                    <h5>Party Name<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[party_name]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>City<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[city]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Address<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[address]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Tin No<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[tin_no]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Pan Card No<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[pan_card_no]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>GST Type <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[gst_type]" class="" required data-validation-required-message="Please select gst type">
                            <option value="">Select</option>
                            <?php
                            foreach ($this->config->item('gst_type') as $key => $gst_type) {
                                echo '<option value="' . $key . '">' . $gst_type . '</option>';
                            }
                            ?>    
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <h5>GST No<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[gst_no]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Email</h5>
                    <div class="controls">
                        <input type="text" name="data[email]" class="form-control"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Contact Person<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[contact_person]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Mobile<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[mobile_no]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Party Type<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[party_type]" class="" required data-validation-required-message="Please select gst type">
                            <option value="">Select</option>
                            <?php
                            foreach ($this->config->item('party_type') as $key => $party_type) {
                                echo '<option value="' . $key . '">' . $party_type . '</option>';
                            }
                            ?>    
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Branch<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[branch_agent_id_fk]" class="" required data-validation-required-message="Please select branch">
                            <option value="">Select</option>
                            <option value="0">All</option>
                            <?php
                            foreach ($bagents as $bagent) {
                                echo '<option value="' . $bagent->branch_agent_id . '">' . $bagent->branch_agent . '</option>';
                            }
                            ?>    
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Company<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[company_id_fk]" class="" required data-validation-required-message="Please select company">
                            <option value="">Select</option>
                            <?php
                            foreach ($companies as $company) {
                                echo '<option value="' . $company->company_id . '">' . $company->company_name . '</option>';
                            }
                            ?>    
                        </select>
                    </div>
                </div>

                <!--div class="form-group col-md-3">
                    <h5>3PL</h5>
                    <div class="controls">
                        <select class="form-control" name="data[three_pl]" class="">
                            <option value="">Select</option>
                            <?php
/*                             foreach ($bagents as $bagent) {
                                echo '<option value="' . $bagent->branch_agent_id . '">' . $bagent->branch_agent . '</option>';
                            } */
                            ?>    
                        </select>
                    </div>
                </div -->

                <div class="form-group col-md-3">
                    <h5>Surcharge (%)<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[surcharge_percent]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Del. Surcharge (%)</h5>
                    <div class="controls">
                        <input type="text" name="data[del_surcharge_percent]" class="form-control"></div>
                </div>

                <!-- div class="form-group col-md-3">
                    <h5>GR Charge</h5>
                    <div class="controls">
                        <input type="text" name="data[gr_charge]" class="form-control"></div>
                </div -->

                <div class="form-group col-md-3">
                    <h5>CFT</h5>
                    <div class="controls">
                        <input type="text" name="data[cft]" class="form-control"></div>
                </div>

                <!--div class="form-group col-md-3">
                    <h5>Taxes Paid by</h5>
                    <div class="controls">
                        <select class="form-control" name="data[taxes_paid_by]" class="" required data-validation-required-message="Please select gst type">
                            <option value="">Select</option>
                            <?php
/*                             foreach ($this->config->item('taxes_paid_by') as $key => $taxes_paid_by) {
                                echo '<option value="' . $key . '">' . $taxes_paid_by . '</option>';
                            } */
                            ?>    
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Delivery Type</h5>
                    <div class="controls">
                        <select class="form-control" name="data[delivery_type]" class="" required data-validation-required-message="Please select gst type">
                            <option value="">Select</option>
                            <?php
/*                             foreach ($this->config->item('delivery_type') as $key => $delivery_type) {
                                echo '<option value="' . $key . '">' . $delivery_type . '</option>';
                            } */
                            ?>    
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <h5>&nbsp;</h5>
                    <div class="controls">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" value="Y" name="data[is_oem_client]" class="custom-control-input" aria-invalid="false"> 
                            <span class="custom-control-label">Is OEM Client</span></label>
                        <div class="help-block"></div>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <h5>&nbsp;</h5>
                    <div class="controls">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" value="Y" name="data[is_print_igst]" class="custom-control-input" aria-invalid="false"> 
                            <span class="custom-control-label">Is Print IGST</span></label>
                        <div class="help-block"></div>
                    </div>
                </div -->

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
                        //console.log(data);
                        var response = JSON.parse(data);
                        if (response.status == 'success') {
                            //document.getElementById('form_validation').reset();
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