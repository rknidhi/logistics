<div class="row" id="myModal">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Add Vehicle</h4>
        </div>
        <div class="card-body myModal">
            <form class="row" id="form_validation" novalidate action="<?= $base_url ?>master/vehicle/add" method="POST">
                <div class="col-md-12">
                    <ul class="nav nav-tabs customtab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Vehicle Details</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Vehicle Parts</span></a> </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active p-t-20" id="home2" role="tabpanel">
                            <div class="form-group float-left col-md-3">
                                <h5>Registration No<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="data[registration_no]" class="form-control" required data-validation-required-message="This field is required"></div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Owner Name</h5>
                                <div class="controls">
                                    <input type="text" name="data[owner_name]" class="form-control"></div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Pan Card No</h5>
                                <div class="controls">
                                    <input type="text" name="data[pan_card_no]" class="form-control"></div>
                            </div>


                            <div class="form-group float-left col-md-3">
                                <h5>Chasis No</h5>
                                <div class="controls">
                                    <input type="text" name="data[chasis_no]" class="form-control"></div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Engine No</h5>
                                <div class="controls">
                                    <input type="text" name="data[engine_no]" class="form-control"></div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Contact No</h5>
                                <div class="controls">
                                    <input type="text" name="data[contact_no]" class="form-control"></div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Model No</h5>
                                <div class="controls">
                                    <input type="text" name="data[model_no]" class="form-control"></div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Load Capacity Kg.</h5>
                                <div class="controls">
                                    <input type="text" name="data[load_capacity_kg]" class="form-control"></div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Ownership<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select class="form-control select2" name="data[ownership]" class="">
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($this->config->item('vehicle_ownership') as $key => $vehicle_type) {
                                            echo '<option value="' . $key . '">' . $vehicle_type . '</option>';
                                        }
                                        ?>    
                                    </select>
                                </div>
                            </div>

                            <!-- div class="form-group float-left col-md-3">
                                <h5>Company</h5>
                                <div class="controls">
                                    <select class="form-control select2" name="data[company_id_fk]" class="">
                                        <option value="">Select</option>
                                        <?php
   /*                                      foreach ($companies as $company) {
                                            echo '<option value="' . $company->company_id . '">' . $company->company_name . '</option>';
                                        } */
                                        ?>    
                                    </select>
                                </div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Driver</h5>
                                <div class="controls">
                                    <select class="form-control select2" name="data[driver_id_fk]" class="">
                                        <option value="">Select</option>
                                        <?php
/*                                         foreach ($drivers as $driver) {
                                            echo '<option value="' . $driver->driver_id . '">' . $driver->name . '</option>';
                                        } */
                                        ?>    
                                    </select>
                                </div>
                            </div -->

                            <div class="form-group float-left col-md-3">
                                <h5>Vendor</h5>
                                <div class="controls">
                                    <select class="form-control select2" name="data[vendor_id_fk]" class="">
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($vendors as $vendor) {
                                            echo '<option value="' . $vendor->vendor_id . '">' . $vendor->vendor_name . '</option>';
                                        }
                                        ?>    
                                    </select>
                                </div>
                            </div>
                            <div class="form-group float-left col-md-3">
                                <h5>Vehicle Type</h5>
                                <div class="controls">
                                    <select class="form-control select2" name="data[vehicle_type]" class="">
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($this->config->item('vehicle_type_new') as $vtype) {
                                            echo '<option value="' . $vtype . '">' . $vtype . '</option>';
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
                <div class="form-group col-md-12 text-center">
                    <div class="col-sm-12">
                        <button class="btn btn-success" name="update" value="Update">Save</button>
                    </div>
                </div>
            </form>
        </div>
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