<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Add Broker</h4>
        </div>

        <div class="card-body myModal">
            <form class="m-t-10 row" id="form_validation2" novalidate action="<?= $base_url ?>master/broker/add_ajax" method="POST">
                <div class="form-group col-md-3">
                    <h5>Broker<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[broker]" id="broker" class="form-control" required></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Address<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[address]" class="form-control" required></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Service Tax No<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[service_tax_no]" class="form-control" required></div>
                </div>


                <div class="form-group col-md-3">
                    <h5>Pan Card No<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[pan_card_no]" class="form-control" required></div>
                </div>


                <div class="form-group col-md-3">
                    <h5>Phone No<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[phone_no]" class="form-control" required></div>
                </div>


                <div class="form-group col-md-3">
                    <h5>Mobile No<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[mobile_no]" class="form-control" required></div>
                </div>


                <div class="form-group col-md-3">
                    <h5>Email<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[email]" class="form-control" required></div>
                </div>

                <!--div class="form-group col-md-3">
                    <h5>Method <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[method]" class="" required>
                            <option value="">Select</option>
                            <?php
/*                             foreach ($freight_methods as $freight_method) {
                                echo '<option value="' . $freight_method->freight_method . '">' . $freight_method->freight_method . '</option>';
                            } */
                            ?>    
                        </select>
                    </div>
                </div -->

                <div class="form-group col-md-3">
                    <h5>Rate<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[rate]" class="form-control" required></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Branch <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[branch_agent_id_fk]" class="" required>
                            <option value="">Select</option>
                            <?php
                            foreach ($bagents as $bagent) {
                                echo '<option value="' . $bagent->branch_agent_id . '">' . $bagent->branch_agent . '</option>';
                            }
                            ?>    
                        </select>
                    </div>
                </div>

                <!-- div class="form-group col-md-3">
                    <h5>Company <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[company_id_fk]" class="" required data-validation-required-message="Please select Company">
                            <option value="">Select</option>
                            <?php
/*                             foreach ($companies as $company) {
                                echo '<option value="' . $company->company_id . '">' . $company->company_name . '</option>';
                            } */
                            ?>    
                        </select>
                    </div>
                </div -->
                <div class="form-group col-md-3 m-t-10">
                    <h5>Bank Name</h5>
                    <div class="controls">
                        <input type="text" name="data[bank_name]" class="form-control"></div>
                </div>
                <div class="form-group col-md-3 m-t-10">
                    <h5>Account Number</h5>
                    <div class="controls">
                        <input type="text" name="data[account_no]" class="form-control"></div>
                </div>
                <div class="form-group col-md-3 m-t-10">
                    <h5>IFSC Code</h5>
                    <div class="controls">
                        <input type="text" name="data[ifsc_code]" class="form-control"></div>
                </div>
                <div class="form-group col-md-3 m-t-10">
                    <h5>Bank Branch</h5>
                    <div class="controls">
                        <input type="text" name="data[bank_branch]" class="form-control"></div>
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
                            text: $("#broker").val()
                        };
                        var newOption = new Option(data.text, data.id, false, false);
                        $('#broker_id_fk').append(newOption);
                        $('#broker_id_fk').val(response.status_message).change();
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