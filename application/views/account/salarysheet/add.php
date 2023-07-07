<!DOCTYPE html>
<html lang="en">
    <body>
    <div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Salary Sheet</h4>
        </div>
        <div class="card-body myModal">
        <form id="form_validation2" novalidate action="<?= $base_url ?>accounts/salarysheet/add" method="POST">
            <div class="col-lg-12 row" id="voucher_details">
                <div class="form-group col-md-6">
                    <p>Employee</p>
                    <div class="controls">
                        <select class="form-control" name="data[employee_id_fk]" id="employee_id_fk" class="" required>
                            <option value="">Select</option>
                            <?php
                            foreach ($employees as $employee) {
                                echo '<option value="' . $employee->employee_id . '">' . $employee->employee_name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <p>Month/Year</p>
                    <div class="controls">
                        <input type="text" name="data[month_year]" onchange="daysInMonth(this.value)" class="form-control monthdate" required></div>
                </div>

                <div class="form-group col-md-2">
                    <p>Total Days</p>
                    <div class="controls">
                        <input type="text" name="data[total_days]" id="total_days" class="form-control" required readonly></div>
                </div>
                
                <div class="form-group col-md-2">
                    <p>Working Days</p>
                    <div class="controls">
                        <input type="text" name="data[working_days]" id="working_days" class="form-control" required></div>
                </div>

                <div class="form-group col-md-3">
                    <p>Basic Salary</p>
                    <div class="controls">
                        <input type="text" id="basic_salary" name="data[basic_salary]" id="basic_salary" class="form-control" readonly></div>
                </div>

                <div class="form-group col-md-3">
                    <p>Travel Allowance</p>
                    <div class="controls">
                        <input type="text" id="travel_allowance" name="data[travel_allowance]" id="travel_allowance" class="form-control" readonly></div>
                </div>

                <div class="form-group col-md-3">
                    <p>Other Allowance</p>
                    <div class="controls">
                        <input type="text"  name="data[other_allowance]" id="other_allowance" class="form-control" readonly></div>
                </div>
                
                <div class="form-group col-md-3">
                    <p>Gross Salary</p>
                    <div class="controls">
                        <input type="text" id="gross_salary" class="form-control" readonly></div>
                       <!-- <input type="text" name="data[gross_salary]" id="gross_salary" class="form-control" readonly></div> -->                        
                </div>

                <div class="form-group col-md-1">
                    <p>CL</p>
                    <div class="controls">
                        <input type="text" name="data[emp_cl]" id="emp_cl" class="form-control" readonly></div>
                </div>

                <div class="form-group col-md-1">
                    <p>PL</p>
                    <div class="controls">
                        <input type="text" name="data[emp_pl]" id="emp_pl" class="form-control" readonly></div>
                </div>

                <div class="form-group col-md-1">
                    <p>SL</p>
                    <div class="controls">
                        <input type="text" name="data[emp_sl]" id="emp_sl" class="form-control" readonly></div>
                </div>

                

                <div class="form-group col-md-1">
                    <p>CL</p>
                    <div class="controls">
                        <input type="text" name="data[month_cl]" id="month_cl" class="form-control"></div>
                </div>

                <div class="form-group col-md-1">
                    <p>PL</p>
                    <div class="controls">
                        <input type="text" name="data[month_pl]" id="month_pl" class="form-control"></div>
                </div>

                <div class="form-group col-md-1">
                    <p>SL</p>
                    <div class="controls">
                        <input type="text" name="data[month_sl]" id="month_sl" class="form-control"></div>
                </div>

                <div class="form-group col-md-3">
                    <p>Absent Days</p>
                    <div class="controls">
                        <input type="text" name="data[absent]" id="absent" class="form-control" readonly></div>
                </div>
                
                
                
                <div class="form-group col-md-3">
                    <p>Net Salary</p>
                    <div class="controls">
                        <input type="text" name="data[net_salary]" id="net_salary" class="form-control" required readonly></div>
                </div>


                <div class="form-group col-md-2">
                    <p>Over Time</p>
                    <div class="controls">
                        <input type="text" name="data[over_time]" id="over_time" class="form-control"></div>
                </div>

                <div class="form-group col-md-2">
                    <p>OT Rate/Hrs</p>
                    <div class="controls">
                        <input type="text" name="data[over_time_rate]" id="over_time_rate" class="form-control"></div>
                </div>



                <div class="form-group col-md-2">
                    <p>OT Amount</p>
                    <div class="controls">
                        <input type="text" name="data[over_time_salary]" id="over_time_salary" class="form-control" required readonly></div>
                </div>

                <div class="form-group col-md-3">
                    <p>Advance deduction</p>
                    <div class="controls">
                        <input type="text" name="data[advance_deduction]" id="advance_deduction" class="form-control"></div>
                </div>

                <div class="form-group col-md-3">
                    <p>Net Payable</p>
                    <div class="controls">
                        <input type="text" name="data[net_payable]" id="net_payable" class="form-control" required readonly></div>
                </div>

                <div class="form-group col-md-12 text-center">
                    <div class="col-sm-12">
                        <input type="hidden" name="button_type" id="button_type" value="">
                        <button type="submit" class="btn btn-success" name="addnew" value="Submit">Submit</button>
                        <!--<button type="submit" class="btn btn btn-info btn1" name="print" value="Print"><i class="fa fa-print"></i> Print</button>-->
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
    </div>


        <script src="<?= $base_url ?>assets/js/validation.js"></script>
        <script>
                            function daysInMonth(mydate) {
                                var mydatearr = mydate.split("-");
                                var month = mydatearr[0];
                                var year = mydatearr[1];
                                var days = new Date(year, month, 0).getDate();
                                $("#total_days").val(days);
                                $.ajax({
                                    url: '<?= $base_url ?>accounts/salarysheet/salarybatchdetails',
                                    type: 'POST',
                                    data: ({mydate: mydate}),
                                    success: function (response) {
                                        //console.log(response);
                                        var obj = jQuery.parseJSON(response);
                                        if (obj != null) {
                                            total_days = parseInt(obj.total_days) || 0;
                                            holidays = parseInt(obj.holidays) || 0;
                                            $("#working_days").val(total_days - holidays);
                                        } else {
                                            $("#working_days").val(0);
                                        }

                                    }
                                });
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
                            $("#employee_id_fk").change(function () {
                                var employee_id = $(this).val();
                                $.ajax({
                                    url: '<?= $base_url ?>accounts/salarysheet/getempdetails',
                                    type: 'POST',
                                    data: ({employee_id: employee_id}),
                                    success: function (response) {
                                        //console.log(response);
                                        var obj = jQuery.parseJSON(response);
                                        $("#basic_salary").val(obj.basic_salary);
                                        $("#over_time_rate").val(obj.over_time_rate);
                                        $("#travel_allowance").val(obj.allowance_tea);
                                        $("#other_allowance").val(obj.allowance_other);
                                        $("#emp_cl").val(obj.emp_cl);
                                        $("#emp_pl").val(obj.emp_pl);
                                        $("#emp_sl").val(obj.emp_sl);
                                        $("#gross_salary").val(parseInt(obj.basic_salary) + parseInt(obj.allowance_tea) + parseInt(obj.allowance_other));
                                       
                                       
                                        $("#net_salary").val(parseInt(obj.basic_salary) + parseInt(obj.allowance_tea) + parseInt(obj.allowance_other));
                                        calculateSalary();
                                    }
                                });
                            });

                            $("#month_cl,#month_pl,#month_sl").change(function () {
                                validateleave();
                                calculateSalary();
                            });

                            function validateleave() {
                                var month_cl = parseInt($("#month_cl").val()) || 0;
                                var month_pl = parseInt($("#month_pl").val()) || 0;
                                var month_sl = parseInt($("#month_sl").val()) || 0;

                                var emp_cl = parseInt($("#emp_cl").val()) || 0;
                                var emp_pl = parseInt($("#emp_pl").val()) || 0;
                                var emp_sl = parseInt($("#emp_sl").val()) || 0;

                                var leaves = month_cl + month_pl + month_sl;
                                var paid_leave = emp_cl + emp_pl + emp_sl;
                                if (paid_leave > leaves)
                                    var cal_absent = parseInt(0);
                                else
                                    cal_absent = leaves - paid_leave;
                                $("#absent").val(cal_absent);
                                var dids = cal_absent * ($('#basic_salary').val() / 30);
                                var nets = parseInt($('#gross_salary').val() - dids);
                                $("#net_salary").val(nets);
                                calculateSalary();
                                
                            }

                            $("#working_days,#over_time,#over_time_rate,#advance_deduction").change(function () {
                                calculateSalary();
                            });

                            function calculateSalary() {
                                var basic_salary = parseInt($("#net_salary").val()) || 0;
                                //var travel_allowance = parseInt($("#travel_allowance").val()) || 0;
                                //var other_allowance = parseInt($("#other_allowance").val()) || 0;

                                var over_time = parseInt($("#over_time").val()) || 0;
                                var over_time_rate = parseInt($("#over_time_rate").val()) || 0;
                                var advance_deduction = parseInt($("#advance_deduction").val()) || 0;

                                var over_time_salary = over_time * over_time_rate;
                                $("#over_time_salary").val(over_time_salary);
                                //var net_payable = basic_salary + travel_allowance + other_allowance + over_time_salary - advance_deduction;
                                var net_payable = basic_salary  + over_time_salary - advance_deduction;
                                $("#net_payable").val(net_payable);

                            }

                            $(".select2").select2();
                            $('button[type="submit"]').click(function () {
                                $("#button_type").val($(this).val());
                            });
                            !function (window, document, $) {
                                "use strict";
                                $("input,select,textarea").jqBootstrapValidation({

                                    submitSuccess: function ($form, event) {
                                        var form_data = $form.serialize();
                                        document.getElementById('form_validation').reset();
                                        $.ajax({
                                            type: 'POST',
                                            url: $form.attr('action'),
                                            data: form_data,
                                            success: function (data)
                                            {
                                                //console.log(data);
                                                var response = JSON.parse(data);
                                                if (response.status == 'success') {
                                                    //document.getElementById('form_validation2').reset();
                                                    alertify.success(response.status_message);
                                                    if (response.button_val == 'print') {
                                                        printwindow('<?= $base_url ?>/accounts/salarysheet/printsalarysheet/' + response.ss_id);
                                                    }
                                                    setTimeout(function () {
                                                        window.location.reload();
                                                    }, 1000);
                                                    //var msg = alertify.warning(' <button class="btn btn-danger btn-icon btn-xs" id="1"><i class="fa fa-cogs"></i></button> Click to Reload...', 10);
                                                    //msg.callback = function (isClicked) {
                                                    //     if (isClicked)
                                                    //        window.location.reload();
                                                    //};

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
                            function printwindow(url) {
                                w = 700;
                                h = 600;
                                LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
                                TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
                                settings = 'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ',resizable'
                                window.open(url, 'printwindow', settings);
                            }
                            
                    
$(document).ready(function(){
    var basic = parseInt($("#basic_salary").val());
    var travel = parseInt($("#travel_allowance").val());
    var other = parseInt($("#allowance_other").val());
    total = travel + basic + other;
    $("#gross_salary").val(total); 
});   

        </script>
    </body>

</html>