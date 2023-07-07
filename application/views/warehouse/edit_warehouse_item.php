<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Update Warehouse Item</h4>
        </div>
        <div class="card-body">
            <form class="m-t-40 row" id="form_validation" novalidate action="<?= $base_url ?>warehouse/update_warehouse/<?= $warehouse->warehouse_id ?>" method="POST">

                <div class="form-group col-md-4">
                    <h5>Item <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control select2" name="data[item_id_fk]" id="item_id_fk_<?= $sn ?>" class="" required>
                            <option value="">Select</option>
                            <?php
                            foreach ($items as $item) {
                                echo '<option value="' . $item->item_id . '" ' . ($warehouse->item_id_fk == $item->item_id ? 'selected' : '') . '>' . $item->item_name . '</option>';
                            }
                            ?>    
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Qty<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[item_qty]" value="<?= $warehouse->item_qty ?>" id="item_qty" class="form-control" required>
                    </div>
                </div>


                <div class="form-group col-md-4">
                    <h5>Packing Method <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control select2" name="data[package_id]" id="package_id_<?= $sn ?>" class="" required>
                            <option value="">Select</option>
                            <?php
                            foreach ($packages as $package) {
                                echo '<option value="' . $package->package_id . '" ' . ($warehouse->package_id == $package->package_id ? 'selected' : '') . '>' . $package->package . '</option>';
                            }
                            ?>    
                        </select> 
                    </div>
                </div>



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