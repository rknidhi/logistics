
<div class="card card-outline-primary">
    <div class="card-header">
        <h4 class="m-b-0 text-white">Item Details</h4>
    </div>
    <div class="card-body myModal">
        <form class="row" id="form_validation" novalidate action="<?= $base_url ?>master/item/update/<?= $item->item_id ?>" method="POST">
            <div class="form-group col-md-3">
                <h5>Item Name<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[item_name]"  value="<?= $item->item_name ?>" class="form-control" required readonly></div>
            </div>

            <div class="form-group col-md-3">
                <h5>HSN Code<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[hsn_code]" value="<?= $item->hsn_code ?>" class="form-control" required readonly></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Default Weight<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[default_weight]" value="<?= $item->default_weight ?>" class="form-control" required readonly></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Packing Method <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[packing_method]" class="form-control" required value="<?= $this->functions->get_single_row_colum('tbl_master_package', 'package', 'package_id', $item->packing_method) ?>" readonly>
                </div>
            </div>

            <div class="form-group col-md-3">
                <h5>Charging Method <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[charging_method]" class="form-control" required value="<?= $item->charging_method ?>" readonly>
                </div>
            </div>

            <!--div class="form-group col-md-3">
                <h5>Labour Method <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[labour_method]" class="form-control" required value="<?php //= $item->labour_method ?>" readonly>
                </div>
            </div>

            <div class="form-group col-md-3">
                <h5>Door Delivery Method <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[door_delivery_method]" class="form-control" required value="<?php //= $item->door_delivery_method ?>" readonly>
                </div>
            </div -->

            <div class="form-group col-md-3">
                <h5>Branch <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[branch_agent_id_fk]" class="form-control" required value="<?= $this->functions->get_single_row_colum('tbl_master_branch_agent', 'branch_agent', 'branch_agent_id', $item->branch_agent_id_fk) ?>" readonly>
                </div>
            </div>

            <!-- div class="form-group col-md-3">
                <h5>Company <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[company_id_fk]" class="form-control" required value="<?php //= $this->functions->get_single_row_colum('tbl_master_company', 'company_name', 'company_id', $item->company_id_fk) ?>" readonly>
                </div>
            </div -->



        </form>
    </div>
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