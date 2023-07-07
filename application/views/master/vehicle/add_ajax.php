<div class="row" id="myModal">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Add Fleet</h4>
        </div>
        <div class="card-body myModal">
            <form class="row" id="form_validation2" novalidate action="<?= $base_url ?>master/vehicle/add_ajax" method="POST">
                <div class="col-md-12">
                    <div class="tab-content">

                        <div class="form-group float-left col-md-3">
                            <h5>Registration No<!-- <span class="text-danger">*</span> --></h5>
                            <div class="controls">
                                <input type="text" name="data[registration_no]" id="registration_no" class="form-control" data-validation-required-message="This field is required"></div>
                        </div>


                        <div class="form-group float-left col-md-3">
                            <h5>Fleet No.<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="data[fleet_no]" id="fleet_no" class="form-control" required=""></div>
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

    $("#form_validation2").validate({
        submitHandler: function (form) {
            $.ajax({
                type: 'POST',
                url: $(form).attr('action'),
                data: $(form).serialize(),
                success: function (data)
                {
                    $.fancybox.close();
                    var response = JSON.parse(data);
                    if (response.status == 'success') {
                        var data = {
                            id: response.status_message,
                            text: $("#fleet_no").val()
                        };
                        var newOption = new Option(data.text, data.id, false, false);
                        $('#vehicle_id_fk').append(newOption);
                        $('#vehicle_id_fk').val(response.status_message).change();
                        document.getElementById('form_validation2').reset();
                        alertify.success("Added");
                    } else {
                        alertify.error(response.status_message);
                    }
                }
            })
        }
    });

</script>