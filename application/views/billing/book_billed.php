<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Billing</title>
        <?php $this->load->view('includes/head'); ?> 
        <link href="<?= $base_url ?>assets/plugins/datatables/media/css/dataTables.bootstrap4.css" rel="stylesheet">
        <link href="<?= $base_url ?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $base_url ?>assets/css/form-css.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?= $base_url ?>assets/plugins/jquery-validation/demo/css/screen.css">

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
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline-primary">
                                <div class="card-header ">
                                    <h4 class="m-b-0 text-white">Billed Invoice</h4>
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
                                            <form class="m-t-10" id="form_validation" novalidate action="" method="POST">
                                                <fieldset>
                                                    <legend>Search Invoice</legend>
                                                    <table width="100%">
                                                        <tr>
                                                            <td><label class="control-label ">Party :</label></td>
                                                            <td width="400">
                                                                <select class="form-control select2" name="party">
                                                                    <option value="">Select</option>
                                                                    <?php foreach ($parties as $party) { ?>    
                                                                        <option value="<?= $party->party_id ?>" <?= ($party->party_id == $this->input->post('party') ? 'selected' : '') ?>><?=  $party->party_name ." -($party->city)"?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>

                                                            <td><label class="control-label ">Invoice No.:</label></td>
                                                            <td><input type="text" name="bill_no" value="<?= $this->input->post('bill_no') ?>" onkeypress="return isNumber(event)"  class="form-control" placeholder="Eg. 1 for PRD/2019-20/001"></td>

                                                            <td><label class="control-label ">Date From :</label></td>
                                                            <td width="110"><input type="text" name="from_date" value="<?= $this->input->post('from_date') ?>" class="form-control singledate"></td>

                                                            <td><label class="control-label "> Date To :</label></td>
                                                            <td width="110"><input type="text" name="to_date" value="<?= $this->input->post('to_date') ?>" class="form-control singledate"></td>
                                                            <td><input type="submit" name="search" value="Get Details" class="btn btn-info"></td>
                                                        </tr>
                                                        
                                                    </table>
                                                </fieldset>
                                            </form>
                                                <h3>Billed Booking</h3>
                                                <form class="m-t-10" id="form_validation3" action="<?= $base_url ?>billing/createbill_000" method="POST">
                                                    <div class="table table-responsive">
                                                        <table id="example2" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Invoice No.</th>
                                                                    <th>Invoice Date</th>
                                                                    <th>Bill To</th>
                                                                    <th>HSN Code</th>
                                                                    <!--<th>GRs.</th>-->
                                                                    <th>Total Amount</th>
                                                                    <th>Received</th>
                                                                    <th>Balance</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $sn = 1;
                                                                $amount_to_pay=0;
                                                                $funcName='';
                                                                $printbill='';
                                                                $delfor ='';
                                                                foreach ($bills as $bill) {
                                                                    $grnos = array();
                                                                    $grnos = explode(',', $bill->gr_nos);
                                                                    $grnos1 = implode(", ", $grnos);
                                                                    $whq = array('reference_no'=>$bill->billing_id,'billtype'=>'Bill');
                                                                    $total_received_amount = $this->functions->get_sum_of_pay_history('payment_history', 'amount', $whq);
                                                                    $rowC = $this->functions->get_num_rows('booking_gr', 'bill_number', $bill->billing_id);
                                                                    $rowC1 = $this->functions->get_num_rows('fresh_booking_gr', 'bill_number', $bill->billing_id);
                                                                    if($rowC1 > 0)
                                                                    {
                                                                       $funcName = "editbill1";
                                                                       $printbill = "printbillf";
                                                                       $delfor = "fgr";
                                                                       $amount_to_pay = $this->functions->get_billed_amount($bill->gr_nos);  // Added on Dated:26-09-19
                                                                    }                                        
                                                                    if($rowC > 0)
                                                                    {
                                                                       $funcName = "editbill";
                                                                       $printbill = "printbill"; 
                                                                       $delfor = "gr";
                                                                       $amount_to_pay = $this->functions->get_billed_amount($bill->gr_nos); // Added on Dated:26-09-19
                                                                    }
                                                                    ?>
                                                                    <tr id="row-id-<?= $bill->billing_id ?>">

                                                                        <td><?= $bill->invoice_no; ?></td>
                                                                        <td><?= convertToHumanDate($bill->invoice_date) ?></td>
                                                                        <!--<td><?= $bill->po_number ?></td>
                                                                        <td><?= convertToHumanDate($bill->po_date) ?></td>-->
                                                                        <td><?= $bill->bill_to ?></td>
                                                                        <td><?= $bill->hsn_code ?></td>
                                                                        <!--<td><?= $grnos1; ?></td>-->
                                                                        <td><?= number_format($amount_to_pay,2)?></td>
                                                                        <td><?= number_format($total_received_amount,2)?></td>
                                                                        <td><?=number_format($amount_to_pay- $total_received_amount,2)?></td>
                                                                        
                                                                        <!--<td><?php
                                                                        if ($bill->payment_date !='')
                                                                        {
                                                                         $dt_print = date("d-m-Y", strtotime($bill->payment_date));
                                                                         echo "<span title=\"$dt_print\">Received</span>";
                                                                     }
                                                                         else{
                                                                          echo "Pending"; }?></td>-->
                                                                        
                                                                        <td>
                                                                            <a class="edit" href="<?= $base_url ?>billing/<?= $funcName?>/<?= $bill->billing_id ?>/FALSE"><i class="fa fa-pencil-alt"></i></a>
                                                                            <!-- Delete Bill Dated 15-1019 -->
                                                                            <a class="trash trash-me material-icons" id="<?= $bill->billing_id ?>|<?= $delfor ?>"><i class="fa fa-trash"></i></a>  <!-- End -->                                                                                          
                                                                            <a onclick="printwindow('<?= $base_url ?>billing/<?= $printbill ?>/<?= $bill->billing_id ?>')" href="javascript:;"  href="javascript:;"><i class="fa fa-print" aria-hidden="true"></i></a>
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                    <?php
                                                                    $sn++;
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </form>

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
            <!-- Added on 26-09-19 -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>

            <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
            <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
            <!-- End -->            
            <!-- end - This is for export functionality only -->
            <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
            <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
            <script src="<?= $base_url ?>assets/plugins/jquery-validation/dist/jquery.validate.js"></script>
            <script>
$('#example2').DataTable({
    columnDefs: [
        {
         targets: [0, 1, 2], visible:true},
    ],
// Added on 26-09-19
    dom: 'Blfrtip',
    // End
    language: {search: "_INPUT_",
        searchPlaceholder: "Search Records..."
    },
    // Added on 26-09-19
    buttons: [
        {
            extend: 'excel',
            exportOptions: {
                columns: [0, 1, 2, 4, 7]
                }
        }
    ],    
    // End
});                      

                                                                                $("#form_validation").validate();
                                                                                $("#form_validation2").validate({
                                                                                    rules: {
                                                                                        "gr_nos[]": {
                                                                                            required: true,
                                                                                        }
                                                                                    },
                                                                                    messages: {
                                                                                        "gr_nos[]": {
                                                                                            required: "Please select at least 1 GR",
                                                                                        }
                                                                                    },
                                                                                    errorPlacement: function (error, element) {
                                                                                        if (element.attr("type") == "checkbox") {
                                                                                            error.insertAfter('.question');
                                                                                        } else {
                                                                                            // something else
                                                                                        }
                                                                                    }
                                                                                });
                                                                                $('.singledate').datepicker({
                                                                                    autoclose: true,
                                                                                    todayHighlight: true,
                                                                                    format: 'dd-mm-yyyy',
                                                                                    orientation: "bottom auto"
                                                                                });
                                                                                $(".select2").select2();
                                                                                function change_status(id) {
                                                                                    var url = 'admin/athlete_management/change_status';
                                                                                    $.ajax({
                                                                                        url: url,
                                                                                        type: 'POST',
                                                                                        data: ({id: id}),
                                                                                        success: function (response) {
                                                                                            if (response === 1)
                                                                                            {
                                                                                                $.alert("You don't have permission to change event status");
                                                                                            } else
                                                                                            {
                                                                                                $('#' + id).replaceWith(response);
                                                                                            }
                                                                                        }
                                                                                    });
                                                                                }

                                                                                /*
                                                                                $('.trash-me').click(function () {
                                                                                    var id = $(this).attr('id');
                                                                                    $.confirm({
                                                                                        icon: 'fa fa-trash',
                                                                                        title: 'Confirm!',
                                                                                        content: 'Are you sure you want to delete?',
                                                                                        animation: 'zoom',
                                                                                        closeAnimation: 'none',
                                                                                        buttons: {
                                                                                            confirm: function () {
                                                                                                var url = '<?= $base_url ?>master/broker/delete';
                                                                                                $.ajax({
                                                                                                    url: url,
                                                                                                    type: 'POST',
                                                                                                    data: ({id: id}),
                                                                                                    success: function (response) {
                                                                                                        var res = JSON.parse(response);
                                                                                                        if (res.status == 'success')
                                                                                                        {
                                                                                                            alertify.success(res.status_message);
                                                                                                            $('#row-id-' + id).remove();
                                                                                                        } else
                                                                                                        {
                                                                                                            alertify.error(res.status_message);
                                                                                                        }
                                                                                                    }
                                                                                                });
                                                                                            },
                                                                                            cancel: function () {
                                                                                            }
                                                                                        }

                                                                                    });
                                                                                }); */
                                                                                
                                                                                
                                                                                
                                                                                
                                    $("#example2").on("click", ".trash-me", function () {
                                    var id = $(this).attr('id');
                                    $.confirm({
                                        icon: 'fa fa-trash',
                                        title: 'Confirm!',
                                        content: 'Are you sure you want to delete?',
                                        animation: 'zoom',
                                        closeAnimation: 'none',
                                        buttons: {
                                            confirm: function () {
                                                var url = '<?= $base_url ?>billing/delete_bill';
                                                $.ajax({
                                                    url: url,
                                                    type: 'POST',
                                                    data: ({id: id}),
                                                    success: function (response) {
                                                        var res = JSON.parse(response);
                                                        if (res.status == 'success')
                                                        {
                                                            alertify.success(res.status_message);
                                                            window.location.reload();
                                                        } else
                                                        {
                                                            alertify.error(res.status_message);
                                                        }
                                                    }
                                                });
                                            },
                                            cancel: function () {
                                            }
                                        }

                                    });
                                });
                                                                                
                                                                                function go_to_edit(url) {
                                                                                    window.location.href = url;
                                                                                }

                                                                                function printwindow(url) {
                                                                                    w = 700;
                                                                                    h = 600;
                                                                                    LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
                                                                                    TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
                                                                                    settings = 'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ',resizable'
                                                                                    window.open(url, 'printwindow', settings);
                                                                                }

            </script>
    </body>

</html>