<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">Update Head Master</h4>
        </div>
        <div class="card-body myModal">
            <form class="m-t-40 row" id="form_validation" novalidate action="<?= $base_url ?>accounts/account_group/update/<?= $account_group->aag_id ?>" method="POST">

                <div class="form-group col-md-4 m-t-10">
                    <h5>Group Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="data[group_name]" value="<?= $account_group->group_name ?>" class="form-control" required data-validation-required-message="This field is required"></div>
                </div>

                <div class="form-group col-md-4 m-t-10">
                    <h5>Select Under Group <span class="text-danger">*</span></h5>
                    <div class="controls">
                    <select class="form-control" name="data[aag_pid]" required aria-invalid="false">
                            <option value="">Select</option>
                            <?php
                             if($account_group->aag_id != 0)   
                               echo fetchgroup_select($this->functions->get_all_row1('ac_account_group'),'0','',$account_group->aag_pid);
                              else {
                                echo fetchgroup_select($this->functions->get_all_row1('ac_account_group'),'0','',$account_group->aag_id);
                              } 
                            ?>
                        </select>
                        </div>
                </div>


                <div class="form-group col-md-4 m-t-10">
                    <h5>Head Name <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select class="form-control" name="data[ahm_id_fk]" required aria-invalid="false">
                            <option value="">Select</option>
                            <?php
                            foreach ($this->functions->get_all_active_row('ac_head_master') as $head_master):
                                echo '<option value = "' . $head_master->ahm_id . '"' . ($head_master->ahm_id == $account_group->ahm_id_fk ? 'selected' : '') . '>' . $head_master->head_name . '</option>';
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <h5>&nbsp;</h5>
                    <div class="controls">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" value="1" name="data[is_primary]" <?= $account_group->is_primary == 1 ? 'checked' : '' ?> class="custom-control-input" aria-invalid="false"> 
                            <span class="custom-control-label">Is Primary</span></label>
                    </div>
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