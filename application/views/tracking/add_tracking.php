<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Add Tracking</h4>
        </div>
        <div class="card-body myModal">
            <form class="m-t-40 row" id="form_validation" novalidate action="<?= $base_url ?>tracking/add_new" method="POST">
                <input type="hidden" name="data[bgr_id_fk]" value="<?= $bgr_id_fk ?>"/>
                <div class="form-group col-md-3">
                    <h5>Date<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[track_date]" class="form-control singledate" required ></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Morning Location</h5>
                    <div class="controls">
                        <input type="text" name="data[morning_location]" class="form-control" required></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Evening Location</h5>
                    <div class="controls">
                        <input type="text" name="data[evening_location]" class="form-control"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Remarks</h5>
                    <div class="controls">
                        <input type="text" name="data[remarks]" class="form-control"></div>
                </div>

                <div class="clearfix"></div>
                <div class="form-group col-md-12 text-center">
                    <div class="col-sm-12">
                        <button class="btn btn-success" name="update" value="Update">Add New</button>
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
                            document.getElementById('form_validation').reset();
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

    $('.singledate').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy',
    });
</script>