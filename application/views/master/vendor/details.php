<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Vendor Details</h4>
        </div>
        <div class="card-body myModal">
            <form class="m-t-40 row" id="form_validation" novalidate method="POST">
                <div class="form-group col-md-3 m-t-10">
                    <h5>Name<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[vendor_name]" value="<?= $vendor->vendor_name ?>" class="form-control" readonly ></div>
                </div>

                <div class="form-group col-md-3 m-t-10">
                    <h5>Address<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[vendor_address]" value="<?= $vendor->vendor_address ?>" class="form-control" readonly ></div>
                </div>

                <div class="form-group col-md-3 m-t-10">
                    <h5>City<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[vendor_city]" value="<?= $vendor->vendor_city ?>" class="form-control" readonly ></div>
                </div>

                <div class="form-group col-md-3 m-t-10">
                    <h5>State <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[state_id_fk]" value="<?= $this->functions->get_single_row_colum('tbl_master_states', 'state_name', 'state_id', $vendor->state_id_fk )?>" class="form-control" readonly>

                    </div>
                </div>

                <div class="form-group col-md-3 m-t-10">
                    <h5>GSTIN</h5>
                    <div class="controls">
                        <input type="text" name="data[vendor_gstin]" value="<?= $vendor->vendor_gstin ?>" class="form-control" readonly ></div>
                </div>

                <div class="form-group col-md-3 m-t-10">
                    <h5>Pincode</h5>
                    <div class="controls">
                        <input type="text" name="data[pincode]" value="<?= $vendor->pincode ?>" class="form-control" readonly ></div>
                </div>

                <div class="form-group col-md-3 m-t-10">
                    <h5>Phone</h5>
                    <div class="controls">
                        <input type="text" name="data[vendor_phone]" value="<?= $vendor->vendor_phone ?>" class="form-control" readonly ></div>
                </div>

                <div class="form-group col-md-3 m-t-10">
                    <h5>Email ID</h5>
                    <div class="controls">
                        <input type="email" name="data[remark]" value="<?= $vendor->email_id ?>" class="form-control" readonly></div>
                </div>
                <div class="form-group col-md-3 m-t-10">
                    <h5>Bank Name</h5>
                    <div class="controls">
                        <input type="text" name="data[bank_name]" value="<?=$vendor->bank_name?>" class="form-control" readonly></div>
                </div>
                <div class="form-group col-md-3 m-t-10">
                    <h5>Account Number</h5>
                    <div class="controls">
                        <input type="text" name="data[account_no]" value="<?=$vendor->account_no?>" class="form-control" readonly></div>
                </div>
                <div class="form-group col-md-3 m-t-10">
                    <h5>IFSC Code</h5>
                    <div class="controls">
                        <input type="text" name="data[ifsc_code]" value="<?=$vendor->ifsc_code?>" class="form-control" readonly></div>
                </div>
                <div class="form-group col-md-3 m-t-10">
                    <h5>Bank Branch</h5>
                    <div class="controls">
                        <input type="text" name="data[bank_branch]" value="<?=$vendor->bank_branch?>" class="form-control" readonly></div>
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