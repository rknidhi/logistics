<div class="row">

    <div class="card card-outline-primary">

        <div class="card-header">

            <h4 class="m-b-0 text-white">Update Ledger Master</h4>

        </div>

        <div class="card-body myModal">

            <form class="m-t-40 row" id="form_validation" novalidate action="<?= $base_url ?>accounts/ledger_master/update/<?= $ledger->ledger_id ?>" method="POST">



                <div class="form-group col-md-4">

                    <h5>Ledger Name<span class="text-danger">*</span></h5>

                    <div class="controls">

                        <input type="text" name="data[ledger_name]" value="<?= $ledger->ledger_name ?>" class="form-control" required data-validation-required-message="This field is required"></div>

                </div>



                <div class="form-group col-md-4">

                    <h5>Group Name <span class="text-danger">*</span></h5>

                    <div class="controls">

                        <select class="form-control" name="data[aag_id_fk]" id="aag_id_fk" class="" required>

                            <option value="">Select</option>

                            <?php

                                echo fetchgroup_select($this->functions->get_all_row1('ac_account_group'), $parent_id = 0, $indent='', $ledger->aag_id_fk);

                            ?>    

                        </select>

                    </div>

                </div>



<!--                <div class="form-group col-md-4">

                    <h5>Sub Group Name <span class="text-danger">*</span></h5>

                    <div class="controls">

                        <select class="form-control" name="data[aasg_id_fk]" id="aasg_id_fk" class="" required>

                            <option value="">Select</option>

                            <?php

                            $where_clause = array('aag_id_fk' => $ledger->aag_id_fk, 'status' => 1);

                            foreach ($this->functions->get_all_row_multipe_where('ac_account_subgroup', $where_clause) as $account_subgroup) {

                                echo '<option value="' . $account_subgroup->aasg_id . '" ' . ($ledger->aasg_id_fk == $account_subgroup->aasg_id ? 'selected' : '') . '>' . $account_subgroup->subgroup_name . '</option>';

                            }

                            ?>    

                        </select>

                    </div>

                </div>-->



                <div class="form-group col-md-4">

                    <h5>Ledger Type <span class="text-danger">*</span></h5>

                    <div class="controls">

                        <select class="form-control" name="data[ledger_type]" id="ledger_type" class="" required>

                            <option value="">Select</option>

                            <?php

                            foreach ($this->functions->get_all_active_row('tbl_ledger_type') as $ledger_type) {

                                echo '<option value="' . $ledger_type->ltype_id . '" ' . ($ledger->ledger_type == $ledger_type->ltype_id ? 'selected' : '') . '>' . $ledger_type->ledger_type . '</option>';

                            }

                            ?>    

                        </select>

                    </div>

                </div>



                <div class="form-group col-md-4">

                    <h5>Tin No.</h5>

                    <div class="controls">

                        <input type="text" name="data[ledger_tin]" value="<?= $ledger->ledger_tin ?>" class="form-control"></div>

                </div>



                <div class="form-group col-md-4">

                    <h5>Ex No.</h5>

                    <div class="controls">

                        <input type="text" name="data[ex_no]" value="<?= $ledger->ex_no ?>" class="form-control"></div>

                </div>



                <div class="form-group col-md-4">

                    <h5>GST No</h5>

                    <div class="controls">

                        <input type="text" name="data[gstin]" value="<?= $ledger->gstin ?>" class="form-control"></div>

                </div>





                <div class="form-group col-md-4">

                    <h5>Pan Card No</h5>

                    <div class="controls">

                        <input type="text" name="data[panno]" value="<?= $ledger->panno ?>" class="form-control"></div>

                </div>



                <div class="form-group col-md-4">

                    <h5>Address</h5>

                    <div class="controls">

                        <input type="text" name="data[address]" value="<?= $ledger->address ?>" class="form-control"></div>

                </div>



                <div class="form-group col-md-4">

                    <h5>Branch<span class="text-danger">*</span></h5>

                    <div class="controls">

                        <select class="form-control" name="data[branch_agent_id_fk]" class="" required data-validation-required-message="Please select branch">

                            <option value="">Select</option>

                            <?php

                            foreach ($bagents as $bagent) {

                                echo '<option value="' . $bagent->branch_agent_id . '" ' . ($ledger->branch_agent_id_fk == $bagent->branch_agent_id ? 'selected' : '') . '>' . $bagent->branch_agent . '</option>';

                            }

                            ?>    

                        </select>

                    </div>

                </div>



                <!--div class="form-group col-md-4">

                    <h5>Company<span class="text-danger">*</span></h5>

                    <div class="controls">

                        <select class="form-control" name="data[company_id_fk]" class="" required data-validation-required-message="Please select company">

                            <option value="">Select</option>

                            <?php

/*                             foreach ($companies as $company) {

                                echo '<option value="' . $company->company_id . '" ' . ($ledger->company_id_fk == $company->company_id ? 'selected' : '') . '>' . $company->company_name . '</option>';

                            } */

                            ?>    

                        </select>

                    </div>

                </div>



                <div class="form-group col-md-4">

                    <h5>&nbsp;</h5>

                    <div class="controls">

                        <label class="custom-control custom-checkbox">

                            <input type="checkbox" value="Y" name="data[is_primary]" <?php //= ($ledger->is_primary == 'Y' ? 'checked' : '') ?> class="custom-control-input" aria-invalid="false"> 

                            <span class="custom-control-label">Is Primary</span></label>

                        <div class="help-block"></div>

                    </div>

                </div -->


<!-- Modified by Rakesh Dated:10-10-19 -->

<div class="form-group col-md-4">

<h5>Opening Date<span class="text-danger">*</span></h5>

<div class="controls">

    <input type="text" name="data[opening_date]" value="<?= convertToHumanDate($ledger->opening_date) ?>" class="form-control singledate" required>

</div>

</div>

<div class="form-group col-md-4">

<h5>Opening Balance<span class="text-danger">*</span></h5>

<div class="controls">

    <input type="text" name="data[opening_balance]" value="<?= $ledger->opening_balance ?>" class="form-control" required>

</div>

</div>



<div class="form-group col-md-4">

<h5>Balance Type</h5>

<div class="controls">

    <select class="form-control" name="data[balance_type]" required>

        <option value="">Select</option>

        <option value="Debit" <?= $ledger->balance_type == 'Debit' ? 'selected' : '' ?>>Credit</option>

        <option value="Credit" <?= $ledger->balance_type == 'Credit' ? 'selected' : '' ?>>Debit</option>

    </select>

</div>
</div>
<!-- End -->




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



    $('#aag_id_fk').change(function () {

        var id = $(this).val();

        $.ajax({

            url: '<?= base_url() ?>accounts/ledger_master/get_subgroup',

            type: 'POST',

            data: ({id: id}),

            success: function (response) {

                $('#aasg_id_fk').html(response);

            }

        });

    });



$('.singledate').datepicker({

autoclose: true,

todayHighlight: true,

format: 'dd-mm-yyyy',

});
</script>