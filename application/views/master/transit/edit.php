<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Update Transit Time</h4>
        </div>
        <div class="card-body myModal">
            <form class="m-t-10 row" id="form_validation" novalidate action="<?= $base_url ?>master/transit/update/<?= $transit->transit_id ?>" method="POST">

                <div class="form-group col-md-6 m-t-10">
                    <h5>Station From <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[from_station_id_fk]" class="" required data-validation-required-message="Please select region">
                            <option value="">Select</option>
                            <?php
                            foreach ($stations as $station) {
                                echo '<option value="' . $station->station_id . '" ' . ($station->station_id == $transit->from_station_id_fk ? 'selected' : '') . '>' . $station->station_name . '</option>';
                            }
                            ?> 
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-6 m-t-10">
                    <h5>Station To <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[to_station_id_fk]" class="" required data-validation-required-message="Please select region">
                            <option value="">Select</option>
                            <?php
                            foreach ($stations as $station) {
                                echo '<option value="' . $station->station_id . '" ' . ($station->station_id == $transit->to_station_id_fk ? 'selected' : '') . '>' . $station->station_name . '</option>';
                            }
                            ?> 
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-6 m-t-10">
                    <h5>Schedule Day <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[schedule_day]" value="<?= $transit->schedule_day ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-6 m-t-10">
                    <h5>UnSchedule Day <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[unschedule_day]" value="<?= $transit->unschedule_day ?>" class="form-control" required data-validation-required-message="This field is required"></div>
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