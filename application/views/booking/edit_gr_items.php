<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Update GR Item</h4>
        </div>
        <div class="card-body">
            <form class="m-t-40 row" id="form_validation" novalidate action="<?= $base_url ?>booking/update_gr_items/<?= $gr_items1->item_id ?>" method="POST">
                <div class="form-group col-md-4">
                    <h5>Ft Method <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control select2" name="data[item_ft_method]" id="item_ft_method" class="" required>
                            <option value="">Select</option>
                            <?php
                            foreach ($freight_methods as $freight_method) {
                                echo '<option value="' . $freight_method->fm_id . '" ' . ($gr_items1->item_ft_method == $freight_method->fm_id? 'selected' : '') . '>' . $freight_method->freight_method . '</option>'."\n\t\t\t";
                            }
                            ?>    
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Qty<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[item_qty]" value="<?= $gr_items1->item_qty ?>" id="item_qty" class="form-control" required>
                    </div>
                </div>


                <div class="form-group col-md-4">
                    <h5>Item <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control select2" name="data[item_name_fk]" id="item_name_fk" class="" required>
                            <option value="">Select</option>
                            <?php
                            foreach ($items as $item) {
                                echo '<option value="' . $item->item_id . '" ' . ($item->item_id == $gr_items1->item_name_fk ? 'selected' : '') . '>' . $item->item_name . '</option>';
                            }
                            ?>    
                        </select> 
                    </div>
                </div>
<!-- Second Rows-->
<div class="form-group col-md-4">
                    <h5>Method of Pack <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control select2" name="data[item_method_of_pack_fk]" id="item_method_of_pack_fk" class="" required>
                            <option value="">Select</option>
                            <?php
                            foreach ($packages as $package) {
                                echo '<option value="' . $package->package_id . '" ' . ($package->package_id == $gr_items1->item_method_of_pack_fk ? 'selected' : '') . '>' . $package->package . '</option>';
                            }
                            ?>    
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Weight (KG) <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[item_weight]" value="<?= $gr_items1->item_weight ?>" id="item_weight" class="form-control" required>
                    </div>
                </div>


                <div class="form-group col-md-4">
                    <h5>Weight Charges <span class="text-danger">*</span></h5>
                    <div class="controls">
                    <input type="text" name="data[item_weight_ch]" value="<?= $gr_items1->item_weight_ch ?>" id="item_weight_ch" class="form-control" required>

                    </div>
                </div>
<!-- End -->

                <div class="form-group col-md-12 m-t-10 text-center">
                    <div class="col-sm-12">
                        <button class="btn btn-success" id="updategr" name="update" value="Update">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Column -->
</div>
<script src="<?= $base_url ?>assets/js/validation.js"></script>
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