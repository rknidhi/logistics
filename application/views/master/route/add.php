<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Add Route</h4>
        </div>
        <div class="card-body myModal">
            <form class="m-t-10 row" id="form_validation" novalidate action="<?= $base_url ?>master/route/add" method="POST">
                <div class="form-group col-md-3 m-t-10">
                    <h5>Route Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[route_name]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>
                <div class="form-group col-md-3 m-t-10">
                    <h5>Branch/Agent <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[branch_agent_id_fk]" class="" required data-validation-required-message="Please select state">
                            <option value="">Select</option>
                            <?php
                            foreach ($bagents as $bagent) {
                                echo '<option value="' . $bagent->branch_agent_id . '">' . $bagent->branch_agent . '</option>';
                            }
                            ?>    
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3 m-t-10">
                    <h5>From <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[from_station_id_fk]" class="" required data-validation-required-message="Please select region">
                            <option value="">Select</option>
                            <?php
                            foreach ($stations as $station) {
                                echo '<option value="' . $station->station_id . '">' . $station->station_name . '</option>';
                            }
                            ?> 
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3 m-t-10">
                    <h5>To <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[to_station_id_fk]" class="" required data-validation-required-message="Please select region">
                            <option value="">Select</option>
                            <?php
                            foreach ($stations as $station) {
                                echo '<option value="' . $station->station_id . '">' . $station->station_name . '</option>';
                            }
                            ?> 
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3 m-t-10">
                    <h5>Distance (km) <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[distance]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3 m-t-10">
                    <h5>Fuel (ltr) <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[fuel]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3 m-t-10">
                    <h5>Wages (Rs.) <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[wages]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-12 m-t-10 text-center">
                    <div class="col-sm-12">
                        <button class="btn btn-success" name="update" value="Update">Save</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <!-- Column -->
</div>

<script src="<?= $base_url ?>assets/js/validation.js"></script>
<script>
    $(".select2").select2({dropdownParent: $('#myOverlay')});
    !function (window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation({
            submitSuccess: function ($form, event) {
                 var form_data = $form.serialize();
                document.getElementById('form_validation').reset();

                $.ajax({
                    type: 'POST',
                    url: $form.attr('action'),
                    data:form_data,
                    success: function (data)
                    {
                        var response = JSON.parse(data);
                        if (response.status == 'success') {
                           // document.getElementById('form_validation').reset();
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