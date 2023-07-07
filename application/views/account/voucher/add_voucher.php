<!DOCTYPE html>
<html lang="en">

<head>
    <style>
    table tr td {
        width="33%";
    }
    </style>
</head>

<body>
    <div class="row">
        <div class="card card-outline-primary">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Voucher</h4>
            </div>
            <div class="card-body myModal">
                <form id="form_validation2" novalidate action="<?= $base_url ?>accounts/voucher/add" method="POST">
                    <div class="col-lg-12" id="voucher_details">
                        <table width="700">
                            <tr>
                                <td width="33%">
                                    <div class="form-group">
                                        <h5>Voucher Type</h5>
                                        <div class="controls">
                                            <select name="data[voucher_type]" id="voucher_type" class="form-control"
                                                required>

                                                <option value="">Select</option>
                                                <?php
                                        foreach ($this->config->item('voucher_types') as $voucher_type) {
                                            echo '<option value="' . $voucher_type . '">' . $voucher_type . '</option>';
                                        }
                                        ?>
                                            </select>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">
                                        <h5>Voucher Number</h5>
                                        <div class="controls label label-primary" id="vtype">Select Voucher Type</div>
                                    </div>
                                </td>
                                <td width="33%">
                                    <div class="form-group">
                                        <h5>Date</h5>
                                        <div class="controls">
                                            <input type="text" name="data[voucher_date]" class="form-control singledate"
                                                required></div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                            <td>
                                    <div class="form-group">
                                        <h5>Payment To</h5>
                                        <div class="controls">
                                            <select name="cr_data[ltype_id_fk]" id="cr_ltype_id_fk" class="form-control"
                                                required>
                                                <option value="">--Select--</option>
                                                <?php
                                        foreach ($this->functions->get_all_active_row('tbl_ledger_type') as $ledger_type) {
                                            echo '<option value="' . $ledger_type->ltype_id . '">' . $ledger_type->ledger_type . '</option>';
                                        }
                                        ?>

                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <h5>Ledger Name</h5>
                                        <div class="controls">
                                            <select name="cr_data[ledger]" id="cr_ledger" class="form-control" required>
                                                <option value="">--Select--</option>

                                            </select>
                                        </div>
                                    </div>
                                </td>
                                

                                <td>
                                    <div class="form-group">
                                        <h5>Amount</h5>
                                        <div class="controls">
                                            <input type="text" name="dr_data[amount]" id="dr_amount"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                </td>


                            </tr>
                            <hr>
                            <tr>
                                
                                <td>
                                    <div class="form-group">
                                        <h5>From Account</h5>
                                        <div class="controls">
                                            <select name="dr_data[ltype_id_fk]" id="ltype_id_fk" class="form-control"
                                                required>
                                                <option value="">--Select--</option>
                                                <?php
                                        foreach ($this->functions->get_all_active_row('tbl_ledger_type') as $ledger_type) {
                                            echo '<option value="' . $ledger_type->ltype_id . '">' . $ledger_type->ledger_type . '</option>';
                                        }
                                        ?>

                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <h5>Ledger Name</h5>
                                        <div class="controls">
                                            <select name="dr_data[ledger]" id="ledger" class="form-control" required>
                                                <option value="">--Select--</option>

                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <h5>Amount</h5>
                                        <div class="controls">
                                            <input type="text" name="cr_data[amount]" id="cr_amount"
                                                class="form-control" readonly>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <tr>


                                <td>
                                    <div class="form-group">
                                        <h5>Branch</h5>
                                        <div class="controls">
                                            <select class="form-control" name="data[branch_id_fk]" id="branch_id_fk"
                                                class="" required>
                                                <option value="">Select</option>
                                                <?php
                                        foreach ($branches as $branch) {
                                            echo '<option value="' . $branch->branch_agent_id . '">' . $branch->branch_agent . '</option>';
                                        }
                                        ?>
                                            </select>
                                        </div>
                                    </div>
                                </td>

                                <!-- Edited by Rakesh -->

                                <td>
                                    <div class="form-group">
                                        <h5>GR. No.</h5>
                                        <div class="controls">
                                            <input type="text" name="data[gr_no]" class="form-control">
                                        </div>
                                    </div>
                                </td>
                                <!-- End -->
                                <td colspan="4">
                                    <div class="form-group">
                                        <h5>Narration</h5>
                                        <div class="controls">
                                            <input name="data[narration]" class="form-control">
                                        </div>
                                    </div>
                                </td>


                            </tr>
                        </table>

                        <div class="form-group col-md-12 text-center">
                            <div class="col-sm-12">
                                <input type="hidden" name="button_type" id="button_type" value="">
                                <button type="submit" class="btn btn-success" name="addnew"
                                    value="Submit">Submit</button>
                                <button type="submit" class="btn btn btn-info btn1" name="print" value="Print"><i
                                        class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet"
        type="text/css" />
    <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?= $base_url ?>assets/js/validation.js"></script>
    <script>
    $(".select2").select2();
    $('button[type="submit"]').click(function() {
        $("#button_type").val($(this).val());
    });
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").jqBootstrapValidation({

            submitSuccess: function($form, event) {
                var form_data = $form.serialize();
                document.getElementById('form_validation').reset();
                $.ajax({
                    type: 'POST',
                    url: $form.attr('action'),
                    data: form_data,
                    success: function(data) {
                        var response = JSON.parse(data);
                        if (response.status == 'success') {
                            //document.getElementById('form_validation2').reset();
                            alertify.success(response.status_message);
                            if (response.button_val == 'print') {
                                printwindow('<?= $base_url ?>/accounts/voucher/printvoucher/' +
                                    response.voucher_id);
                            }
                            setTimeout(function() {
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

    $('.singledate').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy',
    });


    $('#ltype_id_fk').change(function() {
        var id = $(this).val();
        $.ajax({
            url: '<?= base_url() ?>accounts/voucher/get_ledger',
            type: 'POST',
            data: ({
                id: id
            }),
            success: function(response) {
                $('#ledger').html(response);
            }
        });
    });

    function printwindow(url) {
        w = 700;
        h = 600;
        LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
        TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
        settings = 'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' +
            scroll + ',resizable'
        window.open(url, 'printwindow', settings);
    }

    // Display Voucher type and its forward counting
    $('#voucher_type').change(function() {
        var id = $(this).val();
        $.ajax({
            url: '<?= base_url() ?>accounts/voucher/getboucherref',
            type: 'POST',
            data: ({
                id: id
            }),
            success: function(response) {
                var result = JSON.parse(response);
                if (id !== '') {
                    var spanV = $('#voucher_type').val() + ' <span class="badge">' + (result
                        .voucher_ref_no) + "</span>";
                } else {
                    var spanV = 'Select Voucher Type';
                }
                $('#vtype').html(spanV);
            }
        });
    });

    $('#dr_amount').change(function() {
        $('#cr_amount').val($('#dr_amount').val());
    });



    $('#cr_ltype_id_fk').change(function() {
        var id = $(this).val();
        $.ajax({
            url: '<?= base_url() ?>accounts/voucher/get_ledger',
            type: 'POST',
            data: ({
                id: id
            }),
            success: function(response) {
                $('#cr_ledger').html(response);
            }
        });
    });
    </script>
</body>

</html>