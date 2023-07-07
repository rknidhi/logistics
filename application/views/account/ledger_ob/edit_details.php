<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Edit Ledger Opening Balance</h4>
        </div>
        <div class="card-body myModal">
            <form class="m-t-40 row" id="form_validation" novalidate action="<?= $base_url ?>accounts/ledger_ob/update/<?= $ledger->ledger_id ?>" method="POST">
                <div class="form-group col-md-4">
                    <h5>Opening Date<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[opening_date]" value="<?= convertToHumanDate($ledger->opening_date) ?>" class="form-control singledate" required>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Opening Balance<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[opening_balance]" value="<?= $ledger->opening_balance ?>" class="form-control" required>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Balance Type</h5>
                    <div class="controls">
                        <select class="form-control" name="data[balance_type]" required>
                            <option value="">Select</option>
                            <option value="Debit" <?= $ledger->balance_type == 'Debit' ? 'selected' : '' ?>>Debit</option>
                            <option value="Credit" <?= $ledger->balance_type == 'Credit' ? 'selected' : '' ?>>Credit</option>
                        </select>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="form-group col-md-12 text-center">
                    <div class="col-sm-12">
                        <button class="btn btn-success" name="update" value="Update">Update</button>
                        <button class="btn btn-success" type="reset" name="reset" value="Reset">Reset</button>
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