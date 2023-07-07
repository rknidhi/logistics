<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Edit Main Challan</h4>
        </div>
        <div class="card-body">
            <form class="m-t-40 row" id="form_validation" novalidate action="<?= $base_url ?>challan/update_main_challan/<?= $main_challan->main_challan_id ?>" method="POST">
                <div class="form-group col-md-4">
                    <h5>Challan Date<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[challan_date]" value="<?= convertToHumanDate($main_challan->challan_date) ?>" class="form-control singledate" required ></div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Challan Number</h5>
                    <div class="controls">
                        <input type="text" name="data[challan_number]" value="<?= $main_challan->challan_number ?>" class="form-control" required></div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Challan Amount</h5>
                    <div class="controls">
                        <input type="text" name="data[challan_amount]" onkeypress="return isNumber(event)" value="<?= $main_challan->challan_amount ?>" class="form-control"></div>
                </div>

                <div class="form-group col-md-12">
                    <h5>Remarks</h5>
                    <div class="controls">
                        <input type="text" name="data[remarks]" value="<?= $main_challan->remarks ?>" class="form-control"></div>
                </div>
                <div class="form-group col-md-12">
                    <h5>Challan Location</h5>
                    <div class="controls">
                        <input type="text" name="data[challan_location]" value="<?= $main_challan->challan_location ?>" class="form-control"></div>
                </div>

                <div class="clearfix"></div>
                <div class="form-group col-md-12 text-center">
                    <div class="col-sm-12">
                        <input type="hidden" name="button_type" id="button_type" value="">
                        <button type="submit" class="btn btn-success" name="addnew" value="Submit">Submit</button>
                        <button type="submit" class="btn btn btn-info btn1" name="print" value="Print"><i class="fa fa-print"></i> Print</button>
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
    $('button[type="submit"]').click(function () {
        $("#button_type").val($(this).val());
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
                            var msg = alertify.warning(' <button class="btn btn-danger btn-icon btn-xs" id="1"><i class="fa fa-cogs"></i></button> Click to Reload...', 10);
                            msg.callback = function (isClicked) {
                                if (isClicked)
                                    window.location.reload();
                            };
                            if (response.button_val == 'print') {
                                printwindow('<?= $base_url ?>challan/printmainchallan/<?= $main_challan->main_challan_id ?>');
                            }
                            
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