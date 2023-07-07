<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Outward</title>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline-primary">
                                <div class="card-header ">
                                    <h4 class="m-b-0 text-white">Outward</h4>
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

                                    <fieldset>
                                        <legend> Search Outward</legend>
                                    <div class=" row">
                                        <div class="col-lg-6">
                                            <form class="m-t-10" id="form_validation2" novalidate action="<?= $base_url ?>warehouse/searchoutward" method="POST">
                                                <table width="100%" >
                                                    <tr>
                                                        <td><label class="control-label ">Outward No.</label></td>
                                                        <td width="60%">
                                                            <input type="text" name="outward_no" value="<?= $outward->outward_no ?>" class="form-control" required>
                                                        </td>
                                                        <td align="left"> <button class="btn btn-success"><i class="fa  fa-search"></i> Search</button></td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                    </fieldset>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form class="m-t-10" id="form_validation" novalidate method="POST">
                                                <fieldset>
                                                    <legend>Details </legend>
                                                    <table width="100%">
                                                        <tr>
                                                            <td><label class="control-label">Date </label></td>
                                                            <td><input type="text" name="data[outward_date]" value="<?= convertToHumanDate($outward->outward_date) ?>" class="form-control singledate" required></td>

                                                            <td><label class="control-label">Branch</label></td>
                                                            <td>
                                                                <select class="form-control select2" name="data[branch_id_fk]" id="branch_id_fk" class="" required>
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($branches as $branch) {
                                                                        echo '<option value="' . $branch->branch_agent_id . '" ' . ($outward->branch_id_fk == $branch->branch_agent_id ? 'selected' : '') . '>' . $branch->branch_agent . '</option>';
                                                                    }
                                                                    ?>    
                                                                </select> 
                                                            </td>


                                                            <td><label class="control-label"> Vendor</label></td>
                                                            <td>
                                                                <select class="form-control select2" name="data[vendor_id_fk]" id="vendor_id_fk" class="" required>
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($vendors as $vendor) {
                                                                        echo '<option value="' . $vendor->vendor_id . '" ' . ($outward->vendor_id_fk == $vendor->vendor_id ? 'selected' : '') . '>' . $vendor->vendor_name . '</option>';
                                                                    }
                                                                    ?>    
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><label class="control-label">Document Date</label></td>
                                                            <td><input type="text" name="data[document_date]" value="<?= convertToHumanDate($outward->document_date) ?>" class="form-control singledate" required></td>


                                                            <td><label class="control-label">Doc. Invoice No.</label></td>
                                                            <td><input type="text" name="data[doc_invoice_no]" value="<?= $outward->doc_invoice_no ?>" class="form-control" required></td>

                                                            <td><label class="control-label">Transport Name</label></td>
                                                            <td><input type="text" name="data[transport_name]" value="<?= $outward->transport_name ?>" class="form-control" required></td>
                                                        </tr>
                                                        <tr>
                                                            <td ><label class="control-label">Vehicle No</label></td>
                                                            <td><input type="text" name="data[vehicle_no]" value="<?= $outward->vehicle_no ?>" class="form-control" required></td>

                                                            <td><label class="control-label">GR No</label></td>
                                                            <td ><input type="text" name="data[gr_no]" value="<?= $outward->gr_no ?>" class="form-control" required></td>
                                                        </tr>
                                                    </table>

                                                    <fieldset>
                                                        <legend> Entry  List</legend>
                                                        <table width="100%"id="myTable">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Item</th>
                                                                <th>Quantity</th>
                                                                <th>Package</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            <?php
                                                            $sn = 1;
                                                            foreach ($warehouses as $warehouse):
                                                                ?>
                                                                <tr id="rowid<?= $sn ?>">
                                                                    <td width="5%"><?= $sn ?>.</td>
                                                                    <td width="40%">
                                                                        <select class="form-control item_ids select2" class="" required readonly>
                                                                            <option value="">Select</option>
                                                                            <?php
                                                                            foreach ($items as $item) {
                                                                                echo '<option value="' . $item->item_id . '" ' . ($warehouse->item_id_fk == $item->item_id ? 'selected' : '') . '>' . $item->item_name . '</option>';
                                                                            }
                                                                            ?>    
                                                                        </select> 
                                                                    </td>
                                                                    <td width="10%"><input type="text" value="<?= $warehouse->item_qty ?>" id="item_qty_<?= $sn ?>" class="form-control" required readonly></td>
                                                                    <td width="20%">
                                                                        <select class="form-control select2" id="package_id_<?= $sn ?>" class="" required readonly>
                                                                            <option value="">Select</option>
                                                                            <?php
                                                                            foreach ($packages as $package) {
                                                                                echo '<option value="' . $package->package_id . '" ' . ($warehouse->package_id == $package->package_id ? 'selected' : '') . '>' . $package->package . '</option>';
                                                                            }
                                                                            ?>    
                                                                        </select> 
                                                                    </td>
                                                                    <td>
                                                                        <a class="trash trash-me material-icons" id="<?= $warehouse->warehouse_id ?>" data-id="<?= $sn ?>" ><i class="fa fa-trash"></i></a>
                                                                        <a class="edit" data-fancybox data-type="ajax" data-src="<?= $base_url ?>warehouse/edit_warehosue_item/<?= $warehouse->warehouse_id ?>" href="javascript:;"><i class="fa fa-pencil-alt"></i></a>
                                                                    </td>
                                                                </tr>

                                                                <?php
                                                                $sn++;
                                                            endforeach;
                                                            ?>
                                                        </table>
                                                        
                                                        <br>
                                                        <button type="button" class="btn btn-primary btn-round btn-simple hidden-sm-down add_field_button"><i class="fa fa-plus"></i> Add Row</button>

                                                    </fieldset>

                                                </fieldset>



                                                <div class="form-group col-md-12 text-center">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-success btn1" name="submit" value="Submit"> Submit</button>
                                                        <button type="submit" class="btn btn btn-info btn1" name="submit" value="Print"><i class="fa fa-print"></i> Print</button>
                                                        <a href="<?= $base_url ?>warehouse/outward"class="btn btn-warning btn1"><i class="fa  fa-plus"></i> New</a>
                                                        <button type="button" class="btn btn-danger btn1 delete-outward" id="<?= $outward->outward_id ?>"><i class="fa fa-trash"></i> Delete</button>
                                                        <button type="button" class="btn btn-danger btn1 close-me" class="btn btn-info btn1"><i class="fa fa-times"></i> Close</button>
                                                    </div>
                                                </div>
                                            </form>
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
        <script src="<?= $base_url ?>assets/plugins/areyousure/jquery.are-you-sure.js"></script>
        <script src="<?= $base_url ?>assets/plugins/areyousure/ays-beforeunload-shim.js"></script>

        <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
        <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="<?= $base_url ?>assets/plugins/jquery-validation/dist/jquery.validate.js"></script>
        <script src="<?= $base_url ?>assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>

        <script>
            $("#form_validation2").validate();
            $("#form_validation").validate();
            $("#form_validation").areYouSure();

            $('.singledate').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'dd-mm-yyyy',
                orientation: "bottom auto"
            });
            $(".select2").select2();

            function go_to_edit(url) {
                window.location.href = url;
            }

            $('.delete-outward').click(function () {
                var id = $(this).attr('id');
                $.confirm({
                    icon: 'fa fa-trash',
                    title: 'Confirm!',
                    content: 'Are you sure you want to delete?',
                    animation: 'zoom',
                    closeAnimation: 'none',
                    buttons: {
                        confirm: function () {
                            var url = '<?= $base_url ?>warehouse/delete_outward';
                            $.ajax({
                                url: url,
                                type: 'POST',
                                data: ({id: id}),
                                success: function (response) {
                                    var res = JSON.parse(response);
                                    if (res.status == 'success')
                                    {
                                        alertify.success(res.status_message);
                                        go_to_edit('<?= $base_url ?>warehouse/outward');

                                    } else
                                    {
                                        alertify.error(res.status_message);
                                        go_to_edit('<?= $base_url ?>warehouse/outward');
                                    }
                                }
                            });
                        },
                        cancel: function () {
                        }
                    }

                });
            });

            $('.close-me').click(function () {
                var id = $(this).attr('id');
                $.confirm({
                    icon: 'fa fa-times',
                    title: 'Confirm!',
                    content: 'Are you sure you want to close?',
                    animation: 'zoom',
                    closeAnimation: 'none',
                    buttons: {
                        confirm: function () {
                            window.location.href = '<?= $base_url ?>warehouse/inward';
                        },
                        cancel: function () {
                        }
                    }

                });
            });

        </script>

        <script type="text/javascript">
            var max_fields = 50; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = <?= $sn - 1 ?>; //initlal text box count
            var item_list = '';
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                $.ajax({
                    url: '<?= $base_url ?>warehouse/get_items_rk',
                    type: 'POST',
                    data: ({id: 1}),
                    success: function (response) {
                        item_list = response;
                        if (x < max_fields) { //max input box allowed
                            x++; //text box increment
                            var myrow = '<tr id="rowid' + x + '">'
                                    + '<td>' + x + '</td>'
                                    + '<td><select class="form-control item_ids" name="item[item_id_fk][' + x + ']" id="item_id_fk_' + x + '" required><option value="">Select</option>'+item_list+'</select></td>'
                                    + '<td><input  class="form-control input-sm" type="text" name=item[item_qty][' + x + '] id="item_qty_' + x + '" required /></td>'
                                    + '<td><select class="form-control" name="item[package_id][' + x + ']" id="package_id_' + x + '" required><option value="">Select</option>\n\
<?php
foreach ($packages as $package) {
    echo '<option value="' . $package->package_id . '">' . $package->package . '</option>';
}
?></select></td>'
                                    + '<td><span class="badge badge-danger trash-me" onclick="removeitem(' + x + ')">Remove</span></td>'
                                    + '</tr>';
                            $('#myTable > tbody:last-child').append(myrow);
                        }
                    }
                });


            });
            function removeitem(x) {
                $("#rowid" + x).remove();
            }

            $("#myTable").on("click", ".trash-me", function () {
                var id = $(this).attr('id');
                var dataid = $(this).attr('data-id');
                console.log(id);
                $.confirm({
                    icon: 'fa fa-trash',
                    title: 'Confirm!',
                    content: 'Are you sure you want to delete?',
                    animation: 'zoom',
                    closeAnimation: 'none',
                    buttons: {
                        confirm: function () {
                            var url = '<?= $base_url ?>warehouse/delete_item';
                            $.ajax({
                                url: url,
                                type: 'POST',
                                data: ({id: id}),
                                success: function (response) {
                                    var res = JSON.parse(response);
                                    if (res.status == 'success')
                                    {
                                        alertify.success(res.status_message);
                                        $('#rowid' + dataid).remove();
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
<?php if ($doprint == 'TRUE') { ?>
                w = 700;
                h = 600;
                LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
                TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
                settings = 'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ',resizable'
                window.open('<?= $base_url ?>warehouse/printoutward/<?= $outward->outward_id ?>', 'printwindow', settings);
<?php } ?>
        </script>
    </body>

</html>