<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Add Stationary</h4>
        </div>
        <div class="card-body">
            <form class="m-t-40 row" id="form_validation" novalidate action="<?= $base_url ?>tools/stationary/add" method="POST">
                <div class="form-group col-md-4">
                    <h5>Name<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[name]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Type<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="data[type]" class="form-control select2" required>
                            <option value="">--Select--</option>
                            <?php foreach ($this->config->item('stationary_type') as $type): ?>
                                <option value="<?= $type ?>"><?= $type ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Company</h5>
                    <div class="controls">
                        <select name="data[company_id_fk]" class="form-control select2">
                            <option value="">--Select--</option>
                            <?php
                            foreach ($companies as $company) {
                                echo '<option value="' . $company->company_id . '">' . $company->company_name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>


                <div class="form-group col-md-4">
                    <h5>Financial Year</h5>
                    <div class="controls">
                        <select type="text" name="data[fy_year]" class="form-control select2">
                            <?php
                            $tillyear = date('Y') + 2;
                            $fromyearyear = date('Y') - 2;
                            for ($year = $fromyearyear; $year <= $tillyear; $year++) {
                                echo '<option value="' . ($year - 1) . '" ' . (($year - 1) == $this->input->get('year') ? 'selected' : '') . '>' . (($year - 1) . ' - ' . $year ) . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>


                <div class="clearfix"></div>
                <div class="form-group col-md-12 text-center">
                    <div class="col-sm-12">
                        <button class="btn btn-success" name="update" value="Update">Submit</button>
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
                var form_data = $form.serialize();
                document.getElementById('form_validation').reset();

                $.ajax({
                    type: 'POST',
                    url: $form.attr('action'),
                    data: form_data,
                    success: function (data)
                    {
                        var response = JSON.parse(data);
                        if (response.status == 'success') {
                            //document.getElementById('form_validation').reset();
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
</script>