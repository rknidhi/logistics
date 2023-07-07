<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Update Branch Agent</h4>
        </div>
        <div class="card-body myModal">
            <form class="m-t-10 row" id="form_validation" novalidate action="<?= $base_url ?>master/branch_agent/update/<?= $branchagent->branch_agent_id ?>" method="POST">
                <div class="form-group col-md-3">
                    <h5>Branch Agent<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[branch_agent]" value="<?= $branchagent->branch_agent ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Address<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[address]" value="<?= $branchagent->address ?>"  class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>City<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[city]" value="<?= $branchagent->city ?>"  class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>District<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[district]" value="<?= $branchagent->district ?>"  class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>State <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[state_id_fk]" class="" required data-validation-required-message="Please select state">
                            <option value="">Select</option>
                            <?php
                            foreach ($states as $state) {
                                echo '<option value="' . $state->state_id . '" ' . (($state->state_id == $branchagent->state_id_fk) ? 'selected' : '' ) . '>' . $state->state_name . '</option>';
                            }
                            ?>    
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Pin code<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[pincode]" value="<?= $branchagent->pincode ?>"  class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Pan Card No<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[pan_card_no]" value="<?= $branchagent->pan_card_no ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>GST No<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[gst_no]" value="<?= $branchagent->gst_no ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Contact Person<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[contact_person]" value="<?= $branchagent->gst_no ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Phone<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[phone_no]" value="<?= $branchagent->gst_no ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>


                <div class="form-group col-md-3">
                    <h5>Mobile<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[mobile_no]" value="<?= $branchagent->mobile_no ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Email</h5>
                    <div class="controls">
                        <input type="text" name="data[email]" value="<?= $branchagent->email ?>" value="<?= $branchagent->email ?>" class="form-control"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Station <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[station_id_fk]" class="" required data-validation-required-message="Please select Station">
                            <option value="">Select</option>
                            <?php
                            foreach ($stations as $station) {
                                echo '<option value="' . $station->station_id . '" ' . (($station->station_id == $branchagent->station_id_fk) ? 'selected' : '' ) . '>' . $station->station_name . '</option>';
                            }
                            ?>    
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Type<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[ba_type]" class="" required data-validation-required-message="Please select Type">
                            <option value="">Select</option>
                            <option value="B" <?= ($branchagent->ba_type == 'B') ? 'selected' : '' ?>>Branch</option>
                            <option value="A" <?= ($branchagent->ba_type == 'A') ? 'selected' : '' ?>>Agent</option>

                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Branch Group<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[bgroup_id_fk]" class="" required data-validation-required-message="Please select Branch Group">
                            <option value="">Select</option>
                            <?php
                            foreach ($branchgroups as $branchgroup) {
                                echo '<option value="' . $branchgroup->bgroup_id . '" ' . (($branchgroup->bgroup_id == $branchagent->bgroup_id_fk) ? 'selected' : '' ) . '>' . $branchgroup->branch_group . '</option>';
                            }
                            ?>    
                        </select>
                    </div>
                </div>

                <!--div class="form-group col-md-3">
                    <h5>GR Charge<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[gr_charge]" value="<?php //= $branchagent->gr_charge ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>DR Charge<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[dr_charge]" value="<?php //= $branchagent->dr_charge ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>DR Labour Charge</h5>
                    <div class="controls">
                        <input type="text" name="data[dr_labour_charge]" value="<?php //= $branchagent->dr_labour_charge ?>" class="form-control"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Min Charge Weight</h5>
                    <div class="controls">
                        <input type="text" name="data[min_charge_weight]" value="<?php //= $branchagent->min_charge_weight ?>" class="form-control"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Weight Round off</h5>
                    <div class="controls">
                        <input type="text" name="data[weight_round_off]" value="<?php //= $branchagent->weight_round_off ?>" class="form-control"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Charge Branch Wise</h5>
                    <div class="controls">
                        <input type="text" name="data[charge_branchwise]" value="<?php //= $branchagent->charge_branchwise ?>" class="form-control"></div>
                </div -->

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