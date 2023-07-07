<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Update Head Master</h4>
        </div>
        <div class="card-body myModal">
            <form class="m-t-40 row" id="form_validation" novalidate action="<?= $base_url ?>accounts/head_master/update/<?= $head_master->ahm_id ?>" method="POST">
                <div class="form-group col-md-6 m-t-10">
                    <h5>Head Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[head_name]" value="<?= $head_master->head_name ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-6 m-t-10">
                    <h5>Address</h5>
                    <div class="controls">
                        <input type="text" name="data[head_address]" value="<?= $head_master->head_address ?>" class="form-control"></div>
                </div>


<!--                <div class="form-group col-md-6 m-t-10">
                    <h5>Financial Year Period (From)</h5>
                    <div class="controls">
                        <input type="text" name="data[head_fyf]" value="<?= convertToHumanDate($head_master->head_fyf) ?>" class="form-control singledate" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-6 m-t-10">
                    <h5>Financial Year Period (To)</h5>
                    <div class="controls">
                        <input type="text" name="data[head_fyt]" value="<?= convertToHumanDate($head_master->head_fyt) ?>" class="form-control singledate" required data-validation-required-message="This field is required"></div>
                </div>-->

                <div class="form-group col-md-6 m-t-10">
                    <h5>GST No.</h5>
                    <div class="controls">
                        <input type="text" name="data[head_gstno]" value="<?= $head_master->head_gstno ?>" class="form-control"></div>
                </div>

                <div class="form-group col-md-6 m-t-10">
                    <h5>Mobile No.</h5>
                    <div class="controls">
                        <input type="text" name="data[head_mobile]" value="<?= $head_master->head_mobile ?>" class="form-control"></div>
                </div>



                <div class="form-group col-md-6 m-t-10">
                    <h5>Email</h5>
                    <div class="controls">
                        <input type="text" name="data[head_email]" value="<?= $head_master->head_email ?>" class="form-control"></div>
                </div>

                <div class="form-group col-md-6 m-t-10">
                    <h5>Website</h5>
                    <div class="controls">
                        <input type="text" name="data[head_website]" value="<?= $head_master->head_website ?>" class="form-control"></div>
                </div>

                <div class="form-group col-md-6 m-t-10">
                    <h5>Currency</h5>
                    <div class="controls">
                        <select class="form-control" name="data[currency]" required aria-invalid="false">
                            <option value="">Select</option>
                            <?php
                            foreach ($this->config->item('currency') as $key => $currency):
                                echo '<option value = "' . $key . '" ' . ($head_master->currency == $key ? 'selected' : '') . '>' . $currency . '</option>';
                            endforeach;
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
<link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

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

    $('.singledate').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy',
    });
</script>