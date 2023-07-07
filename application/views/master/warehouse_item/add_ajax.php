<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Add Warehouse Item</h4>
        </div>
        <div class="card-body myModal">
            <form class="m-t-40 row" id="form_validation_warehouse" novalidate action="<?= $base_url ?>master/warehouse/add_ajax" method="POST">
                <div class="form-group col-md-4">
                    <h5>Item Name<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[item_name]" id="item_name" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-4">
                    <h5>HSN Code<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[hsn_code]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Packing Method <span class="text-danger">*</span></h5>
                    <div class="controls">
                    <select class="form-control" name="data[packing_method]" class="" required data-validation-required-message="Please select state">
                            <option value="">Select</option>
                            <?php
                            foreach ($packages as $package) {
                                echo '<option value="' . $package->package_id . '">' . $package->package . '</option>';
                            }
                            ?></select></div>
                </div>


                <div class="clearfix"></div>
                <div class="form-group col-md-12 text-center">
                    <div class="col-sm-12">
                        <button class="btn btn-success" name="update" value="Update">Save Item</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Column -->
</div>
<script src="<?= $base_url ?>assets/js/validation.js"></script>
<script>
    $("#form_validation_warehouse").validate({
        submitHandler: function (form) {
            $.ajax({
                type: 'POST',
                url: $(form).attr('action'),
                data: $(form).serialize(),
                success: function (data)
                {
                    var response = JSON.parse(data);
                    if (response.status == 'success') {
                        $.fancybox.close();

                        var data = {
                            id: response.status_message,
                            text: $("#item_name").val()
                        };
                        var newOption = new Option(data.text, data.id, false, false);
                        $('.item_ids').append(newOption);
//                        $('.item_ids').val(response.status_message).change();
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