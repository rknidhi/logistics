<div class="card card-outline-primary">
    <div class="card-header">
        <h4 class="m-b-0 text-white">Employee Details</h4>
    </div>
    <div class="card-body myModal">
        <form class="row" id="form_validation" novalidate action="<?= $base_url ?>master/employee/update/<?= $employee->employee_id ?>" method="POST">
            <div class="form-group col-md-3">
                <h5>Employee Name</h5>
                <div class="controls">
                    <input type="text" name="data[employee_name]" value="<?= $employee->employee_name ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Father Name</h5>
                <div class="controls">
                    <input type="text" name="data[father_name]" value="<?= $employee->father_name ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Address</h5>
                <div class="controls">
                    <input type="text" name="data[address]" value="<?= $employee->address ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>PAN </h5>
                <div class="controls">
                    <input type="text" name="data[pan_card_no]" value="<?= $employee->pan_card_no ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Bank/Acc. No. </h5>
                <div class="controls">
                    <input type="text" name="data[bank_acc_no]" value="<?= $employee->bank_acc_no ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Mobile No. </h5>
                <div class="controls">
                    <input type="text" name="data[mobile_no]" value="<?= $employee->mobile_no ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Designation </h5>
                <div class="controls">
                    <input type="text" name="data[designation]" value="<?= $this->config->item('emp_designation')[$employee->designation] ?>" class="form-control" readonly>
                </div>
            </div>

            <div class="form-group col-md-3">
                <h5>Branch </h5>
                <div class="controls">
                    <input type="text" name="data[branch_agent_id_fk]" class="form-control" required value="<?= $this->functions->get_single_row_colum('tbl_master_branch_agent', 'branch_agent', 'branch_agent_id', $employee->branch_agent_id_fk) ?>" readonly>
                </div>
            </div>

            <div class="form-group col-md-3">
                <h5>Company </h5>
                <div class="controls">
                    <input type="text" name="data[company_id_fk]" class="form-control" required value="<?= $this->functions->get_single_row_colum('tbl_master_company', 'company_name', 'company_id', $employee->company_id_fk) ?>" readonly>
                </div>
            </div>

            <div class="form-group col-md-3">
                <h5>Basic Salary </h5>
                <div class="controls">
                    <input type="text" name="data[basic_salary]" value="<?= $employee->basic_salary ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Over Time Rate</h5>
                <div class="controls">
                    <input type="text" name="data[over_time_rate]" value="<?= $employee->over_time_rate ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Allowance Tea</h5>
                <div class="controls">
                    <input type="text" name="data[allowance_tea]" value="<?= $employee->allowance_tea ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-3">
                <h5>Allowance Other</h5>
                <div class="controls">
                    <input type="text" name="data[allowance_other]" value="<?= $employee->allowance_other ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-2">
                <h5>CL: </h5>
                <div class="controls">
                    <input type="text" name="data[emp_cl]" value="<?= $employee->emp_cl ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-2">
                <h5>PL: </h5>
                <div class="controls">
                    <input type="text" name="data[emp_pl]" value="<?= $employee->emp_pl ?>" class="form-control" readonly ></div>
            </div>

            <div class="form-group col-md-2">
                <h5>SL: </h5>
                <div class="controls">
                    <input type="text" name="data[emp_sl]" value="<?= $employee->emp_sl ?>" class="form-control" readonly ></div>
            </div>

           <!-- Modified by Rakesh Dated: 28-08-19 -->
           <div class="form-group col-md-3">
                    <h5>Bank/Acc. No.</h5>
                    <div class="controls">
                        <input type="text" name="data[bank_acc_no]" value="<?= $employee->bank_acc_no ?>" class="form-control"  readonly ></div>
                </div>
                <div class="form-group col-md-3 m-t-10">
                    <h5>Bank Name</h5>
                    <div class="controls">
                        <input type="text" name="data[bank_name]" class="form-control" value="<?= $employee->bank_name ?>"  readonly ></div>
                </div>

                <div class="form-group col-md-3 m-t-10">
                    <h5>IFSC Code</h5>
                    <div class="controls">
                        <input type="text" name="data[ifsc_code]" class="form-control" value="<?= $employee->ifsc_code ?>"  readonly ></div>
                </div>
                <div class="form-group col-md-3 m-t-10">
                    <h5>Bank Branch</h5>
                    <div class="controls">
                        <input type="text" name="data[bank_branch]" class="form-control" value="<?= $employee->bank_branch ?>"  readonly ></div>
                </div>            
            <!-- End -->                

        </form>
    </div>
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