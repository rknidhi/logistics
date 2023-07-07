<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Update Salary Batch</h4>
        </div>    
        <div class="card-body myModal">
            <form class="m-t-10 row" id="form_validation" novalidate action="<?= $base_url ?>master/salarybatch/update/<?= $salary_batch->sbatch_id ?>" method="POST">

                <div class="form-group col-md-4">
                    <h5>Month/Year<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[month_year]" value="<?= $salary_batch->month_year ?>" onchange="daysInMonth(this.value)" class="form-control monthdate" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Total Days</h5>
                    <div class="controls">
                        <input type="text" name="data[total_days]" value="<?= $salary_batch->total_days ?>" id="total_days" class="form-control" required readonly></div>
                </div>

                <div class="form-group col-md-4">
                    <h5>Holidays<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[holidays]" value="<?= $salary_batch->holidays ?>" class="form-control" required></div>
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
<link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

<script src="<?= $base_url ?>assets/js/validation.js"></script>
<script>
                            function daysInMonth(mydate) {
                                var mydatearr = mydate.split("-");
                                var month = mydatearr[0];
                                var year = mydatearr[1];
                                var days = new Date(year, month, 0).getDate();
                                $("#total_days").val(days);
                            }

                            $('.monthdate').datepicker({
                                changeMonth: true,
                                changeYear: true,
                                autoclose: true,
                                todayHighlight: true,
                                format: 'mm-yyyy',
                                viewMode: "months",
                                minViewMode: "months",
                                orientation: "bottom auto"
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