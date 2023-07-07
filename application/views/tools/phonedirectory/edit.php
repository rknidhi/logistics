<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Update Phone Directory</h4>
        </div>
        <div class="card-body">
            <form class="m-t-40 row" id="form_validation" novalidate action="<?= $base_url ?>tools/phonedirectory/update/<?= $phdir->phd_id ?>" method="POST">

                <div class="form-group col-md-4">
                    <h5>Contact Person<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[contact_person]" value="<?= $phdir->contact_person ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Company Name<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[company_name]" value="<?= $phdir->company_name ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Profile</h5>
                    <div class="controls">
                        <input type="text" name="data[profile]" value="<?= $phdir->profile ?>" class="form-control"></div>
                </div>


                <div class="form-group col-md-4">
                    <h5>Address</h5>
                    <div class="controls">
                        <input type="text" name="data[address]" value="<?= $phdir->address ?>" class="form-control" ></div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Mobile NO.</h5>
                    <div class="controls">
                        <input type="text" name="data[mobile]" value="<?= $phdir->mobile ?>" class="form-control" ></div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Phone No.<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[phone]" value="<?= $phdir->phone ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Email</h5>
                    <div class="controls">
                        <input type="text" name="data[email]" value="<?= $phdir->email ?>" class="form-control"></div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Remarks</h5>
                    <div class="controls">
                        <input type="text" name="data[remarks]" value="<?= $phdir->remarks ?>" class="form-control"></div>
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