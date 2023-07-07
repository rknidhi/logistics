<div class="row">

    <div class="card card-outline-primary">

        <div class="card-header">

            <h4 class="m-b-0 text-white">Create Ledger Master</h4>

        </div>

        <div class="card-body myModal">

            <form class="m-t-40 row" id="form_validation" novalidate action="<?= $base_url ?>accounts/ledger_master/add" method="POST">

                <div class="form-group col-md-4">

                    <h5>Ledger Name<span class="text-danger">*</span></h5>

                    <div class="controls">

                        <input type="text" name="data[ledger_name]" class="form-control" required data-validation-required-message="This field is required"></div>

                </div>



                <div class="form-group col-md-4">

                    <h5>Group Name <span class="text-danger">*</span></h5>

                    <div class="controls">

                        <select class="form-control" name="data[aag_id_fk]" id="aag_id_fk" class="" required>

                            <option value="">Select</option>

                            <?php

                                echo fetchgroup($this->functions->get_all_row1('ac_account_group'));

                         

/*                             foreach ($this->functions->get_all_active_row('ac_account_group') as $account_group) {

                                echo '<option value="' . $account_group->aag_id . '">' . $account_group->group_name . '</option>';

                            } */

                            ?>    

                        </select>

                    </div>

                </div>



<!--                <div class="form-group col-md-4">

                    <h5>Sub Group Name <span class="text-danger">*</span></h5>

                    <div class="controls">

                        <select class="form-control" name="data[aasg_id_fk]" id="aasg_id_fk" class="" required>

                            <option value="">Select</option>

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

                                echo '<option value="' . $ledger_type->ltype_id . '">' . $ledger_type->ledger_type . '</option>';

                            }

                            ?>    

                        </select>

                    </div>

                </div>



                <div class="form-group col-md-4">

                    <h5>Tin No.</h5>

                    <div class="controls">

                        <input type="text" name="data[ledger_tin]" class="form-control"></div>

                </div>



                <div class="form-group col-md-4">

                    <h5>Ex No.</h5>

                    <div class="controls">

                        <input type="text" name="data[ex_no]" class="form-control"></div>

                </div>



                <div class="form-group col-md-4">

                    <h5>GST No</h5>

                    <div class="controls">

                        <input type="text" name="data[gstin]" class="form-control"></div>

                </div>





                <div class="form-group col-md-4">

                    <h5>Pan Card No</h5>

                    <div class="controls">

                        <input type="text" name="data[panno]" class="form-control"></div>

                </div>



                <div class="form-group col-md-4">

                    <h5>Address</h5>

                    <div class="controls">

                        <input type="text" name="data[address]" class="form-control"></div>

                </div>



                <div class="form-group col-md-4">

                    <h5>Branch<span class="text-danger">*</span></h5>

                    <div class="controls">

                        <select class="form-control" name="data[branch_agent_id_fk]" class="" required data-validation-required-message="Please select branch">

                            <option value="">Select</option>

                            <?php

                            foreach ($bagents as $bagent) {

                                echo '<option value="' . $bagent->branch_agent_id . '">' . $bagent->branch_agent . '</option>';

                            }

                            ?>    

                        </select>

                    </div>

                </div>


<!-- Modified by Rakesh Dated:10-10-19 -->

<div class="form-group col-md-4">

<h5>Opening Date<span class="text-danger">*</span></h5>

<div class="controls">

    <input type="text" name="data[opening_date]" value="" class="form-control singledate" required>

</div>

</div>



<div class="form-group col-md-4">

<h5>Opening Balance<span class="text-danger">*</span></h5>

<div class="controls">

    <input type="text" name="data[opening_balance]" value="" class="form-control" required>

</div>

</div>



<div class="form-group col-md-4">

<h5>Balance Type</h5>

<div class="controls">

    <select class="form-control" name="data[balance_type]" required>

        <option value="">Select</option>

        <option value="Debit">Credit</option>

        <option value="Credit">Debit</option>

    </select>

</div>
</div>
<!-- End -->



                <div class="clearfix"></div>

                <div class="form-group col-md-12 text-center">

                    <div class="col-sm-12">

                        <button class="btn btn-success" name="update" value="Update">Add New</button>

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


$('.singledate').datepicker({

autoclose: true,

todayHighlight: true,

format: 'dd-mm-yyyy',

});


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
</script>