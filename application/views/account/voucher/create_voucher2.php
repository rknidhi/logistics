<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->config->item('title_prefix'); ?> : Voucher Entry</title>
    <?php $this->load->view('includes/head'); ?>
    <link href="<?= $base_url ?>assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="<?= $base_url ?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $base_url ?>assets/css/form-css.css" rel="stylesheet" type="text/css" />

</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <?php $this->load->view('includes/header'); ?>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <?php $this->load->view('includes/sidebar'); ?>
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- Row -->
                <div class="col-12">
                    <div class="row">

                        <div class="col-8">
                            <div class="card card-outline-primary">
                                <div class="card-header ">
                                    <h4 class="m-b-0 text-white">Voucher</h4>

                                </div>
                                <div class="card-body">
                                    <?php if (!empty($message)) { ?>
                                    <div class="col-md-12">
                                        <div id="message" class="alert alert-danger">
                                            <button class="close" data-close="alert"></button>
                                            <span><?php echo $message; ?></span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php if (!empty($success)) { ?>
                                    <div class="col-md-12">
                                        <div id="message" class="alert alert-success">
                                            <button class="close" data-close="alert"></button>
                                            <span><?php echo $success; ?></span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php if (!empty($info)) { ?>
                                    <div id="message" class="col-md-12">
                                        <div class="alert alert-info">
                                            <button class="close" data-close="alert"></button>
                                            <span><?php echo $info; ?></span>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div>

                                                <fieldset>
                                                    <legend>Create Voucher</legend>
                                                    <form id="form_validation2" novalidate
                                                        action="" method="POST">
                                                        <div class="col-lg-12" id="voucher_details">
                                                            <table width="100%">
                                                                <tr>
                                                                    <td width="33%">
                                                                        <div class="form-group">
                                                                            <h5>Voucher Type :</h5>
                                                                            <div class="controls">
                                                                                <select name="data[voucher_type]"
                                                                                    id="voucher_type"
                                                                                    class="form-control" required>

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

                                                                    <td width="33%">
                                                                        <div class="form-group">
                                                                            <h5>Voucher Number :</h5>
                                                                            <input type="hidden" id="voucher_counter" value="">
                                                                            <div class="controls label label-primary"
                                                                                id="vtype">Select Voucher Type</div>
                                                                        </div>
                                                                    </td>
                                                                    <td width="33%">
                                                                        <div class="form-group">
                                                                            <h5>Date :</h5>
                                                                            <div class="controls">
                                                                                <input type="text"
                                                                                    name="data[voucher_date]"
                                                                                    class="form-control singledate"
                                                                                    required></div>
                                                                        </div>
                                                                    </td>


                                                                </tr>

                                                                <tr>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <h5>Debit To :</h5>
                                                                            <div class="controls">
                                                                                <select name="cr_data[ltype_id_fk]"
                                                                                    id="cr_ltype_id_fk"
                                                                                    class="form-control" required>
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
                                                                            <h5>Ledger Name :</h5>
                                                                            <div class="controls">
                                                                                <select name="cr_data[ledger]"
                                                                                    id="cr_ledger" class="form-control"
                                                                                    required>
                                                                                    <option value="">--Select--</option>

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="form-group">
                                                                            <h5>Amount :</h5>
                                                                            <div class="controls">
                                                                                <input type="text"
                                                                                    name="dr_data[amount]"
                                                                                    id="dr_amount" class="form-control"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr>

                                                                    <td>
                                                                        <div class="form-group">
                                                                            <h5>Credit From :</h5>
                                                                            <div class="controls">
                                                                                <select name="dr_data[ltype_id_fk]"
                                                                                    id="ltype_id_fk"
                                                                                    class="form-control" required>
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
                                                                            <h5>Ledger Name :</h5>
                                                                            <div class="controls">
                                                                                <select name="dr_data[ledger]"
                                                                                    id="ledger" class="form-control"
                                                                                    required>
                                                                                    <option value="">--Select--</option>

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <h5>Amount :</h5>
                                                                            <div class="controls">
                                                                                <input type="text"
                                                                                    name="cr_data[amount]"
                                                                                    id="cr_amount" class="form-control"
                                                                                    readonly>
                                                                            </div>
                                                                        </div>
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <h5>Branch :</h5>
                                                                            <div class="controls">
                                                                                <select class="form-control"
                                                                                    name="data[branch_id_fk]"
                                                                                    id="branch_id_fk" class="" required>
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
                                                                    <td colspan="5">
                                                                        <div class="form-group">
                                                                            <h5>Narration :</h5>
                                                                            <div class="controls">
                                                                                <input name="data[narration]"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                   
                                                                    <td>
                                                                        <div class="form-group" style="width:50%; float:left;">
                                                                            <h5>Payment For :</h5>
                                                                            <div class="controls" >
                                                                                <select name="payment_for"
                                                                                    id="payment_id"
                                                                                    class="form-control" required>
                                                                                    <!--<option value="">--Select--</option>
                                                                                    <option value="bill">Bill</option>
                                                                                    <option value="lhc">LHC</option>
                                                                                    <option value="gr">GR</option> -->

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group" style="width:50%; float:right; padding-top:21px;">
                                                        <a id="addamount" disabled="disabled" data-fancybox data-type="ajax" data-src=""
                                            href="javascript:;">
                                                                           <button type="button" class="btn btn-warning" ><i
                                                                                        class="fa fa-plus addIcon"></i>
                                                                                    Add Amount</button>
                                                                                    </a>
                                                                        </div>
                                                                    </td>
                                                                    <td colspan="5">
                                                                        <div class="form-group">
                                                                            <h5>Selected No.:</h5>
                                                                            <div class="controls">
                                                                                <input type="hidden" name="data[gr_no]" id="gr_no"
                                                                                    class="form-control">
                                                                                    <input type="text" name="data[gr_no_disp]" id="gr_no_visible"
                                                                                    class="form-control">                                                                                    
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="form-group col-md-12 text-center">
                                                            <div class="col-sm-12">
                                                            <input type="hidden" name="dbvalue" id="payhistory" class="form-control">
                                                                <button type="submit" name="submit" class="btn btn-success"
                                                                    value="Submit">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </fieldset>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card card-outline-primary">
                                <div class="card-header ">

                                    <div style="float:left;">
                                        <a data-fancybox data-type="ajax" data-src="ledger_master/add_lm"
                                            href="javascript:;">
                                            <div class="card-icon">
                                                <button type="button" style="margin-left:8px; margin-top:4px;"
                                                    class="btn btn-warning btn2"><i class="fa fa-plus addIcon"></i> Add
                                                    New Ledger</button>
                                            </div>
                                        </a>
                                    </div>
                                    <div style="float:right">
                                        <h4 class="m-b-0 text-white">Ledger List</h4>
                                    </div>

                                </div>
                                <div class="card-body" style="height:447px;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="">
                                                <div class="table-responsive" style="width:357px; height:409px;">
                                                    <table id="example23"
                                                        class="display nowrap table table-hover table-striped table-bordered"
                                                        cellspacing="0" width="90%" align="center" data-page-length='9'>
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Ledger Name</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sn = 1;
                                                            foreach ($ledgers as $ledger) {
                                                                $row_color = FALSE;
                                                                if($ledger->opening_balance != NULL && $ledger->ledger_type != NULL) {
                                                                    $row_color = TRUE;
                                                                }
                                                                ?>
                                                            <tr id="row-id-<?= $ledger->ledger_id ?>"
                                                                <?= ($row_color)?'style="background-color:lightgreen"':'style="background-color:pink"'?>>
                                                                <td><?= $sn; ?></td>
                                                                <td><?= $ledger->ledger_name ?>
                                                                    (<?= $this->function_library->FindLedgerGroup($ledger->ledger_type)?>)
                                                                </td>

                                                            </tr>
                                                            <?php
                                                                $sn++;
                                                            }
                                                            ?>

                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php $this->load->view('includes/footer'); ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php $this->load->view('includes/scripts'); ?>
    <!-- This is data table -->
    <script src="<?= $base_url ?>assets/plugins/datatables/datatables.min.js"></script>
    <script src="<?= $base_url ?>assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>

    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet"
        type="text/css" />
    <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet"
        type="text/css" />
    <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?= $base_url ?>assets/js/validation.js"></script>

    <?php
     $branch_id= 1;
     ?>    
    <script>
/*     $("#form_validation2").validate();
    $("#form_validation2").areYouSure(); */
    $(".select2").select2();

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
        var vtype = <?php echo json_encode($this->config-> item('vtype')); ?>;
        $('#ltype_id_fk').html('<option value="">--Select--</option>');
        $('#cr_ltype_id_fk').html('<option value="">--Select--</option>');
        var id = $(this).val();
        var cr_value = ["All"];
        var dr_value = ["All"];
        $.each(vtype, function(key, value) {
            if (id == key) {
                cr_value = value.credit;
                dr_value = value.debit;
            }
        });
        $.ajax({
            url: '<?= base_url() ?>accounts/voucher/getAccountGroup',
            type: 'POST',
            data: ({
                cr: cr_value,
                dr: dr_value
            }),
            success: function(response) {
                var optionString = response.split('===');
                $('#ltype_id_fk').html(optionString[0])
                $('#cr_ltype_id_fk').html(optionString[1]);
            }
        });

        // End


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
                    $('#voucher_counter').val(result.voucher_ref_no);    
                } else {
                    var spanV = 'Select Voucher Type';
                }
                $('#vtype').html(spanV);
            }
        });

        // Special
        
        var vtype1 = <?php echo json_encode($this->config-> item('vtype1')); ?>;
           var paymentfor =  '<option value="">--Select--</option>';
        
          $.each(vtype1, function(key, value) {
            if (id == key) {
                $.each(value, function(key, value){
                    paymentfor += '<option value="'+key+'">'+value+'</option>';
                });
            } 
          });
         $('#payment_id').html(paymentfor);

        // End
        
        
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


    <script>
    $('.singledate').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy',
        orientation: "bottom auto"
    });
    $(".select2").select2();
    $('#example23').DataTable({
        "lengthChange": false,
        "info": false,
        // dom: 'Blfrtip',
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search Ledger..."
        },
        // buttons: [{
        //extend: 'excel',

        //}],
    });

    function change_status(id) {
        var url = 'admin/athlete_management/change_status';
        $.ajax({
            url: url,
            type: 'POST',
            data: ({
                id: id
            }),
            success: function(response) {
                if (response === 1) {
                    $.alert("You don't have permission to change event status");
                } else {
                    $('#' + id).replaceWith(response);
                }
            }
        });
    }


    $('.trash-me').click(function() {
        var id = $(this).attr('id');
        $.confirm({
            icon: 'fa fa-trash',
            title: 'Confirm!',
            content: 'Are you sure you want to delete?',
            animation: 'zoom',
            closeAnimation: 'none',
            buttons: {
                confirm: function() {
                    var url = '<?= $base_url ?>master/broker/delete';
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: ({
                            id: id
                        }),
                        success: function(response) {
                            var res = JSON.parse(response);
                            if (res.status == 'success') {
                                alertify.success(res.status_message);
                                $('#row-id-' + id).remove();
                            } else {
                                alertify.error(res.status_message);
                            }
                        }
                    });
                },
                cancel: function() {}
            }

        });
    });

    function go_to_edit(url) {
        window.location.href = url;
    }  


    $('#payment_id').change(function() {
        var id = $(this).val();
        if(id != ''){
            if(id=='bill'){
                var party = $('#ledger').val();
                $('#addamount').data('src','voucher/add_bia/'+<?= $branch_id?>+'/'+party);
            }
            if(id=='lhc'){
                var party = $('#cr_ledger').val();
                $('#addamount').data('src','voucher/add_lhca/'+<?= $branch_id?>+'/'+party);
            }
            if(id=='gr'){
                $('#addamount').data('src','voucher/add_gra/'+<?= $branch_id?>+'/'+party);
            }
        }
    });

    </script>
</body>

</html>