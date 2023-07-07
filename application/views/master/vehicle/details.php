<div class="card card-outline-primary">
    <div class="card-header">
        <h4 class="m-b-0 text-white"> Vehicle Details</h4>
    </div>
    <div class="card-body myModal">
        <form class="row" id="form_validation" novalidate method="POST">
            <div class="col-md-12">
                <ul class="nav nav-tabs customtab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Vehicle Details</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Vehicle Parts</span></a> </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active p-t-20" id="home2" role="tabpanel">

                        <div class="form-group float-left col-md-3">
                            <h5>Registration No</h5>
                            <div class="controls">
                                <input type="text" name="data[registration_no]" value="<?= $vehicle->registration_no ?>" class="form-control" readonly ></div>
                        </div>

                        <div class="form-group float-left col-md-3">
                            <h5>Owner Name</h5>
                            <div class="controls">
                                <input type="text" name="data[owner_name]" value="<?= $vehicle->owner_name ?>" class="form-control" readonly ></div>
                        </div>

                        <div class="form-group float-left col-md-3">
                            <h5>Pan Card No</h5>
                            <div class="controls">
                                <input type="text" name="data[pan_card_no]" value="<?= $vehicle->pan_card_no ?>" class="form-control" readonly ></div>
                        </div>

                        <div class="form-group float-left col-md-3">
                            <h5>Chasis No</h5>
                            <div class="controls">
                                <input type="text" name="data[chasis_no]" value="<?= $vehicle->chasis_no ?>" class="form-control" readonly ></div>
                        </div>

                        <div class="form-group float-left col-md-3">
                            <h5>Engine No</h5>
                            <div class="controls">
                                <input type="text" name="data[engine_no]" value="<?= $vehicle->engine_no ?>" class="form-control" readonly ></div>
                        </div>

                        <div class="form-group float-left col-md-3">
                            <h5>Contact No</h5>
                            <div class="controls">
                                <input type="text" name="data[contact_no]" value="<?= $vehicle->contact_no ?>" class="form-control" readonly ></div>
                        </div>

                        <div class="form-group float-left col-md-3">
                            <h5>Model No</h5>
                            <div class="controls">
                                <input type="text" name="data[model_no]" value="<?= $vehicle->model_no ?>" class="form-control" readonly ></div>
                        </div>

                        <div class="form-group float-left col-md-3">
                            <h5>Load Capacity Kg.</h5>
                            <div class="controls">
                                <input type="text" name="data[load_capacity_kg]" value="<?= $vehicle->load_capacity_kg ?>" class="form-control" readonly ></div>
                        </div>
                        <div class="form-group float-left col-md-3">
                            <h5>Ownership<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select class="form-control select2" name="data[ownership]" class="" required data-validation-required-message="Please select state" readonly>
                                    <option value="">Select</option>
                                    <?php
                                    foreach ($this->config->item('vehicle_ownership') as $key => $vehicle_type) {
                                        echo '<option value="' . $key . '" ' . ($key == $vehicle->ownership ? 'selected' : '') . '>' . $vehicle_type . '</option>';
                                    }
                                    ?>    
                                </select>
                            </div>
                        </div>

                        <div class="form-group float-left col-md-3">
                            <h5>Vehicle Type</h5>
                            <div class="controls">
                                <input type="text" name="data[vehicle_type]" class="form-control" required value="<?= $this->config->item('vehicle_type')[$vehicle->vehicle_type] ?>" readonly>
                            </div>
                        </div>

                        <!-- div class="form-group float-left col-md-3">
                            <h5>Company</h5>
                            <div class="controls">
                                <input type="text" name="data[company_id_fk]" class="form-control" required value="<?php //= $this->functions->get_single_row_colum('tbl_master_company', 'company_name', 'company_id', $vehicle->company_id_fk) ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group float-left col-md-3">
                            <h5>Driver</h5>
                            <div class="controls">
                                <input type="text" name="data[driver_id_fk]" class="form-control" required value="<?php //= !empty($vehicle->driver_id_fk) ? $this->functions->get_single_row_colum('tbl_master_driver', 'name', 'driver_id', $vehicle->driver_id_fk) : '' ?>" readonly>
                            </div>
                        </div -->

                        <div class="form-group float-left col-md-3">
                            <h5>Vendor </h5>
                            <div class="controls">
                                <input type="text" name="data[driver_id_fk]" class="form-control" required value="<?= $this->functions->get_single_row_colum('tbl_master_vendors', 'vendor_name', 'vendor_id', $vehicle->vendor_id_fk) ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group float-left col-md-3">
                            <h5>Vehicle Type</h5>
                            <div class="controls">
                                <select class="form-control select2" name="data[vehicle_type]" class="" readonly>
                                    <option value="">Select</option>
                                    <?php
                                    foreach ($this->config->item('vehicle_type_new') as $vtype) {
                                        echo '<option value="' . $vtype . '" ' . ($vtype == $vehicle->vehicle_type ? 'selected' : '') . '>' . $vtype . '</option>';
                                    }
                                    ?>


                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane p-t-20" id="profile2" role="tabpanel">

                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>


<link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

<script src="<?= $base_url ?>assets/js/validation.js"></script>

<script>
    $('.singledate').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy',
    });


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