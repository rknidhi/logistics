<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Inward</title>
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
                                    <h4 class="m-b-0 text-white">Inward</h4>
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
                                            <legend>Search Inward</legend>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <form class="m-t-10" id="form_validation2" novalidate action="<?= $base_url ?>warehouse/searchinward" method="POST">
                                                    <table width="100%" >
                                                    <tr>
                                                        <td ><label class="control-label ">Inward No.</label></td>
                                                        <td width="30%">
                                                            <input type="text" name="inward_no" class="form-control" required>
                                                        </td>
                                                        <td> <button class="btn btn-success"><i class="fa  fa-search"></i> Search</button></td>
                                                        
                                                        <td align="right"><label class="control-label ">To Add New Item in the Warehouse Item Master: </label></td>
                                                        <td align="right" width="10%">
                                                                <button type="button" data-fancybox data-type="ajax" data-src="<?= $base_url ?>master/warehouse/add_item_ajax" class="btn btn-warning">
                                                                    <i class="fa fa-plus"></i> Add New Item
                                                                </button>
                                                        </td>
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
                                                    <legend>Create New Inward </legend>
                                                    <table width="100%">
                                                        <tr>
                                                            <td><label class="control-label">Date </label></td>
                                                            <td><input type="text" name="data[inward_date]" class="form-control singledate" required></td>

                                                            <td><label class="control-label">Branch</label></td>
                                                            <td>
                                                                <select class="form-control select2" name="data[branch_id_fk]" id="branch_id_fk" class="" required>
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($branches as $branch) {
                                                                        echo '<option value="' . $branch->branch_agent_id . '">' . $branch->branch_agent . '</option>';
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
                                                                        echo '<option value="' . $vendor->vendor_id . '">' . $vendor->vendor_name . '</option>';
                                                                    }
                                                                    ?>    
                                                                </select>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><label class="control-label">Document Date</label></td>
                                                            <td><input type="text" name="data[document_date]" class="form-control singledate" required></td>


                                                            <td><label class="control-label">Doc. Invoice No.</label></td>
                                                            <td><input type="text" name="data[doc_invoice_no]" class="form-control" required></td>

                                                            <td><label class="control-label">Transport Name</label></td>
                                                            <td><input type="text" name="data[transport_name]" class="form-control" required></td>
                                                        </tr>
                                                        <tr>
                                                            <td ><label class="control-label">Vehicle No</label></td>
                                                            <td><input type="text" name="data[vehicle_no]" class="form-control" required></td>

                                                            <td><label class="control-label">GR No</label></td>
                                                            <td ><input type="text" name="data[gr_no]" class="form-control" required></td>
                                                        </tr>
                                                    </table>

                                                    <fieldset>
                                                        <legend> Entry List</legend>
                                                        <table width="100%"id="myTable">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Item</th>
                                                                <th>Quantity</th>
                                                                <th>Package</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                            <?php
                                                            $sn = 1;
                                                            ?>
                                                            <tr id="rowid<?= $sn ?>">
                                                                <td width="5%">1.</td>
                                                                <td width="40%">
                                                                    <select class="form-control item_ids select2" name="item[item_id_fk][<?= $sn ?>]" id="item_id_fk_<?= $sn ?>" required>
                                                                        <option value="">Select</option>
                                                                        <?php
                                                                        foreach ($items as $item) {
                                                                            echo '<option value="' . $item->item_id . '">' . $item->item_name . '</option>';
                                                                        }
                                                                        ?>    
                                                                    </select> 
                                                                </td>
                                                                <td width="10%"><input type="text" name="item[item_qty][<?= $sn ?>]" id="item_qty_<?= $sn ?>" class="form-control" required></td>
                                                                <td width="20%">
                                                                    <select class="form-control select2" name="item[package_id][<?= $sn ?>]" id="package_id_<?= $sn ?>" class="" required>
                                                                        <option value="">Select</option>
                                                                        <?php
                                                                        foreach ($packages as $package) {
                                                                            echo '<option value="' . $package->package_id . '">' . $package->package . '</option>';
                                                                        }
                                                                        ?>    
                                                                    </select> 
                                                                </td>

                                                            </tr>
                                                        </table>
                                                        <br>
                                                        <button type="button" class="btn btn-primary btn-round btn-simple hidden-sm-down add_field_button"><i class="fa fa-plus"></i> Add Row</button>

                                                    </fieldset>

                                                </fieldset>



                                                <div class="form-group col-md-12 text-center">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-success btn1" name="submit" value="Submit"> Submit</button>
                                                        <button type="submit" class="btn btn btn-info btn1" name="submit" value="Print"><i class="fa fa-print"></i> Print</button>
                                                        <button type="button" class="btn btn-danger btn1 close-me" class="btn btn-info btn1"><i class="fa  fa-times"></i> Close</button>
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
        <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
        <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="<?= $base_url ?>assets/plugins/jquery-validation/dist/jquery.validate.js"></script>
        <script src="<?= $base_url ?>assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
        <script>

            $("#form_validation2").validate();
            $("#form_validation").validate();
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

        </script>

        <script type="text/javascript">


            var max_fields = 200; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID


            var x = <?= $sn ?>; //initlal text box count
            var item_list = '';
            $(add_button).click(function (e) { //on add input button click
                e.preventDefault();
                $.ajax({
                    url: '<?= $base_url ?>warehouse/get_items_rk', //Edited by Rakesh Dated:19/07/2019 change functin name get_items to get_items_rk
                    type: 'POST',
                    data: ({id: 1}),
                    success: function (response) {
                        item_list = response;
                        if (x < max_fields) { //max input box allowed
                            x++; //text box increment
                            var myrow = '<tr id="rowid' + x + '">'
                                    + '<td>' + x + '</td>'
                                    + '<td><select class="form-control item_ids" name="item[item_id_fk][' + x + ']" id="item_id_fk_' + x + '" required><option value="">Select</option>' + item_list + '</select></td>'
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



        </script>
    </body>

</html>