<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Update Driver</h4>
        </div>
        <div class="card-body myModal">
            <form class="row" novalidate id="form_validation" action="<?= $base_url ?>master/driver/update/<?= $driver->driver_id ?>" method="POST">

                <div class="col-md-12">
                    <ul class="nav nav-tabs customtab" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Driver Details</span></a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Guarantor Details</span></a> </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active p-t-20" id="home2" role="tabpanel">
                            <div class="form-group float-left col-md-3">
                                <h5>Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="data[name]" value="<?= $driver->name ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Father Name</h5>
                                <div class="controls">
                                    <input type="text" name="data[father_name]" value="<?= $driver->father_name ?>" class="form-control"></div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Address</h5>
                                <div class="controls">
                                    <input type="text" name="data[address]" value="<?= $driver->address ?>" class="form-control"></div>
                            </div>


                            <div class="form-group float-left col-md-3">
                                <h5>Mobile No<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="data[mobile_no]" value="<?= $driver->mobile_no ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                            </div>

                            <!--div class="form-group float-left col-md-3">
                                <h5>Phone No</h5>
                                <div class="controls">
                                    <input type="text" name="data[phone_no]" value="<?php //= $driver->phone_no ?>" class="form-control"></div>
                            </div -->

                            <div class="form-group float-left col-md-3">
                                <h5>Pan Card No</h5>
                                <div class="controls">
                                    <input type="text" name="data[pan_card_no]" value="<?= $driver->pan_card_no ?>" class="form-control"></div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Licence No</h5>
                                <div class="controls">
                                    <input type="text" name="data[licence_no]" value="<?= $driver->licence_no ?>" class="form-control"></div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Valid From</h5>
                                <div class="controls">
                                    <input type="text" name="data[valid_from]" value="<?= convertToHumanDate($driver->valid_from) ?>" class="form-control singledate"></div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Valid Up To</h5>
                                <div class="controls">
                                    <input type="text" name="data[valid_up_to]" value="<?= convertToHumanDate($driver->valid_up_to) ?>" class="form-control singledate"></div>
                            </div>
                             <div class="form-group  float-left col-md-3 m-t-10">
                                <h5>Bank Name</h5>
                                <div class="controls">
                                    <input type="text" name="data[bank_name]" value="<?= $driver->bank_name ?>" class="form-control"></div>
                            </div>
                            <div class="form-group float-left col-md-3 m-t-10">
                                <h5>Account Number</h5>
                                <div class="controls">
                                    <input type="text" name="data[account_no]" value="<?= $driver->account_no ?>" class="form-control"></div>
                            </div>
                            <div class="form-group float-left col-md-3 m-t-10">
                                <h5>IFSC Code</h5>
                                <div class="controls">
                                    <input type="text" name="data[ifsc_code]" value="<?= $driver->ifsc_code ?>" class="form-control"></div>
                            </div>
                            <div class="form-group float-left col-md-3 m-t-10">
                                <h5>Bank Branch</h5>
                                <div class="controls">
                                    <input type="text" name="data[bank_branch]" value="<?= $driver->bank_branch ?>" class="form-control"></div>
                            </div>
                        </div>
                        <div class="tab-pane p-t-20" id="profile2" role="tabpanel">
                            <div class="form-group float-left col-md-3">
                                <h5>Name</h5>
                                <div class="controls">
                                    <input type="text" name="data[g_name]" value="<?= $driver->g_name ?>" class="form-control"></div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Address</h5>
                                <div class="controls">
                                    <input type="text" name="data[g_address]" value="<?= $driver->g_address ?>" class="form-control"></div>
                            </div>


                            <div class="form-group float-left col-md-3">
                                <h5>Mobile No</h5>
                                <div class="controls">
                                    <input type="text" name="data[g_mobile_no]" value="<?= $driver->g_mobile_no ?>" class="form-control"></div>
                            </div>

                            <!--div class="form-group float-left col-md-3">
                                <h5>Phone No</h5>
                                <div class="controls">
                                    <input type="text" name="data[g_phone_no]" value="<?php //= $driver->g_phone_no ?>" class="form-control"></div>
                            </div -->

                            <div class="form-group float-left col-md-3">
                                <h5>Amount</h5>
                                <div class="controls">
                                    <input type="text" name="data[g_amount]" value="<?= $driver->g_amount ?>" class="form-control"></div>
                            </div>

                            <!-- div class="form-group float-left col-md-3">
                                <h5>Guarantee date</h5>
                                <div class="controls">
                                    <input type="text" name="data[g_guarantee_date]" value="<?php //= convertToHumanDate($driver->g_guarantee_date) ?>"  class="form-control singledate"></div>
                            </div -->
                           


                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>

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
    $('.singledate').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy',
    });


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