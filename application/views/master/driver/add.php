<div class="row" id="myModal">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Add Driver</h4>
        </div>
        <div class="card wizard-content">
            <div class="card-body myModal">
                <form novalidate class="validation-wizard wizard-circle" id="form_validation" action="<?= $base_url ?>master/driver/add" method="POST">
                    <!-- Step 1 -->
                    <h6>Driver Details</h6>
                    <section>
                        <div class="row">
                            <div class="form-group float-left col-md-3">
                                <h5>Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="data[name]" class="form-control" required data-validation-required-message="This field is required"></div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Father Name</h5>
                                <div class="controls">
                                    <input type="text" name="data[father_name]" class="form-control"></div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Address</h5>
                                <div class="controls">
                                    <input type="text" name="data[address]" class="form-control"></div>
                            </div>


                            <div class="form-group float-left col-md-3">
                                <h5>Mobile No<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="data[mobile_no]" class="form-control" required data-validation-required-message="This field is required"></div>
                            </div>

                            <!--div class="form-group float-left col-md-3">
                                <h5>Phone No</h5>
                                <div class="controls">
                                    <input type="text" name="data[phone_no]" class="form-control"></div>
                            </div -->

                            <div class="form-group float-left col-md-3">
                                <h5>Pan Card No</h5>
                                <div class="controls">
                                    <input type="text" name="data[pan_card_no]" class="form-control"></div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Licence No</h5>
                                <div class="controls">
                                    <input type="text" name="data[licence_no]" class="form-control"></div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Valid From</h5>
                                <div class="controls">
                                    <input type="text" name="data[valid_from]" class="form-control singledate"></div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Valid Up To</h5>
                                <div class="controls">
                                    <input type="text" name="data[valid_up_to]" class="form-control singledate"></div>
                            </div>
                            <div class="form-group col-md-3 m-t-10">
                                <h5>Bank Name</h5>
                                <div class="controls">
                                    <input type="text" name="data[bank_name]" class="form-control"></div>
                            </div>
                            <div class="form-group col-md-3 m-t-10">
                                <h5>Account Number</h5>
                                <div class="controls">
                                    <input type="text" name="data[account_no]" class="form-control"></div>
                            </div>
                            <div class="form-group col-md-3 m-t-10">
                                <h5>IFSC Code</h5>
                                <div class="controls">
                                    <input type="text" name="data[ifsc_code]" class="form-control"></div>
                            </div>
                            <div class="form-group col-md-3 m-t-10">
                                <h5>Bank Branch</h5>
                                <div class="controls">
                                    <input type="text" name="data[bank_branch]" class="form-control"></div>
                            </div>

                        </div>
                    </section>
                    <!-- Step 2 -->
                    <h6>Guarantor Details</h6>
                    <section>
                        <div class="row">
                            <div class="form-group float-left col-md-3">
                                <h5>Name</h5>
                                <div class="controls">
                                    <input type="text" name="data[g_name]" class="form-control"></div>
                            </div>

                            <div class="form-group float-left col-md-3">
                                <h5>Address</h5>
                                <div class="controls">
                                    <input type="text" name="data[g_address]" class="form-control"></div>
                            </div>


                            <div class="form-group float-left col-md-3">
                                <h5>Mobile No</h5>
                                <div class="controls">
                                    <input type="text" name="data[g_mobile_no]" class="form-control"></div>
                            </div>

                            <!--div class="form-group float-left col-md-3">
                                <h5>Phone No</h5>
                                <div class="controls">
                                    <input type="text" name="data[g_phone_no]" class="form-control"></div>
                            </div -->

                            <div class="form-group float-left col-md-3">
                                <h5>Amount</h5>
                                <div class="controls">
                                    <input type="text" name="data[g_amount]" class="form-control"></div>
                            </div>

                            <!-- div class="form-group float-left col-md-3">
                                <h5>Guarantee date</h5>
                                <div class="controls">
                                    <input type="text" name="data[g_guarantee_date]" class="form-control singledate"></div>
                            </div -->


                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>
</div>


<link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

<script src="<?= $base_url ?>assets/js/validation.js"></script>
<script src="<?= $base_url ?>assets/plugins/wizard/jquery.steps.min.js"></script>
<link href="<?= $base_url ?>assets/plugins/wizard/steps.css" rel="stylesheet">
<script src="<?= $base_url ?>assets/plugins/wizard/jquery.validate.min.js"></script>
<script>

    var form = $(".validation-wizard").show();

    $(".validation-wizard").steps({
        headerTag: "h6"
        , bodyTag: "section"
        , transitionEffect: "fade"
        , titleTemplate: '<span class="step">#index#</span> #title#'
        , labels: {
            finish: "Submit"
        }
        , onStepChanging: function (event, currentIndex, newIndex) {
            return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
        }
        , onFinishing: function (event, currentIndex) {
            return form.validate().settings.ignore = ":disabled", form.valid()
        }
        , onFinished: function (event, currentIndex) {
            var form_data = form.serialize();
            document.getElementById('form_validation').reset();

            $.ajax({
                type: 'POST',
                url: form.attr('action'),
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

                    } else {
                        alertify.error(response.status_message);
                    }
                }
            });
        }
    }), $(".validation-wizard").validate({
        ignore: "input[type=hidden]"
        , errorClass: "text-danger"
        , successClass: "text-success"
        , highlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        }
        , unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
        }
        , errorPlacement: function (error, element) {
            error.insertAfter(element)
        }
        , rules: {
            email: {
                email: !0
            }
        }
    })

    $('.singledate').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy',
    });
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