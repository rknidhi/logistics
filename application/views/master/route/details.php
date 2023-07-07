<div class="card card-outline-primary">
    <div class="card-header">
        <h4 class="m-b-0 text-white">Route Details</h4>
    </div>
    <div class="card-body myModal">
        <form class="row" id="form_validation" novalidate action="<?= $base_url ?>master/route/update/<?= $route->route_id ?>" method="POST">

            <div class="form-group col-md-3 m-t-10">
                <h5>Route Name</h5>
                <div class="controls">
                    <input type="text" name="data[route_name]" value="<?= $route->route_name ?>" class="form-control" required readonly></div>
            </div>
            <div class="form-group col-md-3 m-t-10">
                <h5>Branch/Agent <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input class="form-control" name="data[branch_agent_id_fk]" required readonly value="<?= $this->functions->get_single_row_colum('tbl_master_branch_agent', 'branch_agent', 'branch_agent_id', $route->branch_agent_id_fk) ?>">
                </div>
            </div>

            <div class="form-group col-md-3 m-t-10">
                <h5>From <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" class="form-control" name="data[from_station_id_fk]"required value="<?= $this->functions->get_single_row_colum('tbl_master_station', 'station_name', 'station_id', $route->from_station_id_fk) ?>" readonly>
                </div>
            </div>

            <div class="form-group col-md-3 m-t-10">
                <h5>To <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" class="form-control" name="data[to_station_id_fk]" class="" required value="<?= $this->functions->get_single_row_colum('tbl_master_station', 'station_name', 'station_id', $route->to_station_id_fk) ?>" readonly>
                </div>
            </div>

            <div class="form-group col-md-3 m-t-10">
                <h5>Distance (km) <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[distance]" value="<?= $route->distance ?>" class="form-control" required data-validation-required-message="This field is required" readonly></div>
            </div>

            <div class="form-group col-md-3 m-t-10">
                <h5>Fuel (ltr) <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[fuel]" value="<?= $route->fuel ?>" class="form-control" required data-validation-required-message="This field is required" readonly></div>
            </div>

            <div class="form-group col-md-3 m-t-10">
                <h5>Wages (Rs.) <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="data[wages]" value="<?= $route->wages ?>" class="form-control" required data-validation-required-message="This field is required" readonly></div>
            </div>      
        </form>
    </div>
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