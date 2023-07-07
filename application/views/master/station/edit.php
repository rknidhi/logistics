<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Update Station</h4>
        </div>
        <div class="card-body myModal">
            <form class="m-t-10 row" id="form_validation" novalidate action="<?= $base_url ?>master/station/update/<?= $station->station_id ?>" method="POST">
                <div class="form-group col-md-4 m-t-10">
                    <h5>Station Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[station_name]" value="<?= $station->station_name ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-4 m-t-10">
                    <h5>State <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[state_id_fk]" class="" required data-validation-required-message="Please select state">
                            <option value="">Select</option>
                            <?php
                            foreach ($states as $state) {
                                echo '<option value="' . $state->state_id . '" ' . ($state->state_id == $station->state_id_fk ? 'selected' : '') . '>' . $state->state_name . '</option>';
                            }
                            ?>    
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-4 m-t-10">
                    <h5>Region <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[region_id_fk]" class="" required data-validation-required-message="Please select region">
                            <option value="">Select</option>
                            <?php
                            foreach ($regions as $region) {
                                echo '<option value="' . $region->region_id . '" ' . ($region->region_id == $station->region_id_fk ? 'selected' : '') . '>' . $region->region_name . '</option>';
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
    $.fn.modal.Constructor.prototype.enforceFocus = function () {};
    $(".select2").select2({dropdownParent: $('#myOverlay')});
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
</script>