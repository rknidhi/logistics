<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Add Station</h4>
        </div>
        <div class="card-body myModal">
            <form class="m-t-10 row" id="form_validation2" novalidate action="<?= $base_url ?>master/station/add_ajax" method="POST">
                <div class="form-group col-md-4 m-t-10">
                    <h5>Station Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[station_name]" id="station_name" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>
                <div class="form-group col-md-4 m-t-10">
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

                <div class="form-group col-md-4 m-t-10">
                    <h5>Region <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[region_id_fk]" class="" required data-validation-required-message="Please select region">
                            <option value="">Select</option>
                            <?php
                            foreach ($regions as $region) {
                                echo '<option value="' . $region->region_id . '">' . $region->region_name . '</option>';
                            }
                            ?> 
                        </select>
                    </div>
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
    var user_type = '<?= $type ?>';
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
                            text: $("#station_name").val()
                        };
                        var newOption = new Option(data.text, data.id, false, false);
                        if (user_type == 'fs') {
                            $('#from_station_fk').append(newOption);
                            $('#from_station_fk').val(response.status_message).change();
                        } else {
                            $('#to_station_fk').append(newOption);
                            $('#to_station_fk').val(response.status_message).change();
                        }

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