<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Add Employee</h4>
        </div>
        <div class="card-body myModal">
            <form class="m-t-10 row" id="form_validation" novalidate action="<?= $base_url ?>master/employee/add" method="POST">
                <div class="form-group col-md-3">
                    <h5>Employee Name<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[employee_name]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Father Name</h5>
                    <div class="controls">
                        <input type="text" name="data[father_name]" class="form-control"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Address</h5>
                    <div class="controls">
                        <input type="text" name="data[address]" class="form-control"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>PAN</h5>
                    <div class="controls">
                        <input type="text" name="data[pan_card_no]" class="form-control"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Mobile No. <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[mobile_no]" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Designation <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[designation]" class="" required data-validation-required-message="Please select state">
                            <option value="">Select</option>
                            <?php
                            foreach ($this->config->item('emp_designation') as $key => $designation) {
                                echo '<option value="' . $key . '">' . $designation . '</option>';
                            }
                            ?>     
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Branch <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[branch_agent_id_fk]" class="" required data-validation-required-message="Please select designation">
                            <option value="">Select</option>
                            <?php
                            foreach ($bagents as $bagent) {
                                echo '<option value="' . $bagent->branch_agent_id . '">' . $bagent->branch_agent . '</option>';
                            }
                            ?>    
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Company <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[company_id_fk]" class="" required data-validation-required-message="Please select Company">
                            <option value="">Select</option>
                            <?php
                            foreach ($companies as $company) {
                                echo '<option value="' . $company->company_id . '">' . $company->company_name . '</option>';
                            }
                            ?>    
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Basic Salary</h5>
                    <div class="controls">
                        <input type="text" id="basic_salary" name="data[basic_salary]" class="form-control"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Travel Allowance</h5>
                    <div class="controls">
                        <input type="text" id="allowance_tea" name="data[allowance_tea]" class="form-control"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>Other Allowance</h5>
                    <div class="controls">
                        <input type="text" id="allowance_other" name="data[allowance_other]" class="form-control"></div>
                </div>
                
                <div class="form-group col-md-3">
                    <h5>Gross Salary</h5>
                    <div class="controls">
                        <input type="text" id="gross_salary" class="form-control" readonly></div>
                        <!--<input type="text" id="gross_salary" name="data[gross_salary]" value="<?//= $employee->gross_salary ?>" class="form-control" readonly></div> -->                
                </div>
                
                <div class="form-group col-md-3">
                    <h5>Over Time Rate</h5>
                    <div class="controls">
                        <input type="text" name="data[over_time_rate]" class="form-control"></div>
                </div>


                <div class="form-group col-md-3">
                    <h5>CL:</h5>
                    <div class="controls">
                        <input type="text" name="data[emp_cl]" class="form-control"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>PL:</h5>
                    <div class="controls">
                        <input type="text" name="data[emp_pl]" class="form-control"></div>
                </div>

                <div class="form-group col-md-3">
                    <h5>SL:</h5>
                    <div class="controls">
                        <input type="text" name="data[emp_sl]" class="form-control"></div>
                </div>

           <!-- Modified by Rakesh Dated: 28-08-19 -->
           <div class="form-group col-md-3">
                    <h5>Bank/Acc. No.</h5>
                    <div class="controls">
                        <input type="text" name="data[bank_acc_no]" class="form-control"></div>
                </div>
                <div class="form-group col-md-3 m-t-10">
                    <h5>Bank Name</h5>
                    <div class="controls">
                        <input type="text" name="data[bank_name]" class="form-control"></div>
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
            <!-- End -->

                <div class="clearfix"></div>
                <div class="form-group col-md-12 text-center">
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
    
    
    $("#basic_salary").change(function(){
        var thisVal =parseInt($( this ).val());
        if($("#allowance_tea").val() != '' && $("#allowance_other").val()!=''){
            var travel = parseInt($("#allowance_tea").val());
            var other = parseInt($("#allowance_other").val());
            total = thisVal + travel + other;
        }
        else {
            var travel =0;
            var other = 0;
          total = thisVal + travel + other;  
        }
        $("#gross_salary").val(total);        
    });
    
    $("#allowance_tea").change(function(){
        var thisVal =parseInt($( this ).val());
        if($("#basic_salary").val() != '' && $("#allowance_other").val()!=''){
            var basic = parseInt($("#basic_salary").val());
            var other = parseInt($("#allowance_other").val());
            total = thisVal + basic + other;
        }
        else {
            var basic = 0;
            var other  =0;
            total = thisVal + basic + other;
        }
        $("#gross_salary").val(total);        
    });
    
    $("#allowance_other").change(function(){
        var thisVal =parseInt($( this ).val());

        if($("#basic_salary").val() != '' && $("#allowance_tea").val()!=''){
            var basic = parseInt($("#basic_salary").val());
            var travel = parseInt($("#allowance_tea").val());
            var total = thisVal + basic + travel;
        }
         else {
            var basic = 0;
            var travel =0;
            total = thisVal + basic + other;
        }

            $("#gross_salary").val(total);        
        
    });    
</script>