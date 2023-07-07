<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Update Item Wise Crossing Rate</h4>
        </div>
        <div class="card-body myModal">
            <form class="m-t-10 row" id="form_validation" novalidate action="<?= $base_url ?>master/itemwise_crossing/update/<?= $icrate->itcr_id ?>" method="POST">

                <div class="form-group col-md-3 m-t-10">
                    <h5>Sender Branch/Agent <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[sender_branch_agent]" class="" required data-validation-required-message="Please select state">
                            <option value="">Select</option>
                            <?php
                            foreach ($bagents as $bagent) {
                                echo '<option value="' . $bagent->branch_agent_id . '" ' . ($bagent->branch_agent_id == $icrate->sender_branch_agent ? 'selected' : '') . '>' . $bagent->branch_agent . '</option>';
                            }
                            ?>    
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3 m-t-10">
                    <h5>Receiver Branch/Agent <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[receiver_branch_agent]" class="" required data-validation-required-message="Please select state">
                            <option value="">Select</option>
                            <?php
                            foreach ($bagents as $bagent) {
                                echo '<option value="' . $bagent->branch_agent_id . '" ' . ($bagent->branch_agent_id == $icrate->receiver_branch_agent ? 'selected' : '') . '>' . $bagent->branch_agent . '</option>';
                            }
                            ?>    
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3 m-t-10">
                    <h5>Station To <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[to_station_id_fk]" class="" required data-validation-required-message="Please select region">
                            <option value="">Select</option>
                            <?php
                            foreach ($stations as $station) {
                                echo '<option value="' . $station->station_id . '" ' . ($station->station_id == $icrate->to_station_id_fk ? 'selected' : '') . '>' . $station->station_name . '</option>';
                            }
                            ?> 
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3 m-t-10">
                    <h5>Item <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[item_id_fk]" class="" required data-validation-required-message="Please select item">
                            <option value="">Select</option>
                            <?php
                            foreach ($items as $item) {
                                echo '<option value="' . $item->item_id . '" ' . ($icrate->item_id_fk == $item->item_id ? 'selected' : '') . '>' . $item->item_name . '</option>';
                            }
                            ?> 
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3 m-t-10">
                    <h5>Rate (Wt.) <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[rate_wt]" value="<?= $icrate->rate_wt ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3 m-t-10">
                    <h5>Rate (Qty.) <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[rate_qty]" value="<?= $icrate->rate_qty ?>" class="form-control" required data-validation-required-message="This field is required"></div>
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