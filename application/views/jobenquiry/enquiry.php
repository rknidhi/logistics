<!DOCTYPE html>
<html lang="en">


<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->config->item('title_prefix'); ?> : Add Enquiry</title>
    <?php $this->load->view('includes/head'); ?>
    <link href="<?= $base_url ?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= $base_url ?>assets/plugins/jquery-validation/demo/css/screen.css">
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
                                <h4 class="m-b-0 text-white">Enquiry</h4>
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
                                <?php
                                    //$enqid = genrate_unique_id('tbl_enquiry','E');
                                    $enqid = genrate_unique_id1('E');
                                ?>
                                <form class="m-t-10" id="form_validation" novalidate action="" method="POST">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <legend>Add Enquiry Details</legend>
                                                <table width="100%" >
                                                    <tr>
                                                        <td><label class="control-label">E-Ref-No.:</label></td>
                                                        <td>
                                                            <input type="text" name="enq_ref_no" id="enq_ref_no" class="form-control" value="<?=$enqid;?>" readonly>
                                                        </td>
                                                        <td><label class="control-label">Date:</label></td>
                                                        <td>
                                                            <input type="date" name="enquiry_date" id="enquiry_date" class="form-control" >
                                                        </td>
                                                        <td><label class="control-label">Company:</label></td>
                                                        <td>
                                                            <input type="text" name="company_name" id="company_name" class="form-control" >
                                                        </td>
                                                        <td><label class="control-label">Person:</label></td>
                                                        <td>
                                                            <input type="text" name="person_name" id="person_name" class="form-control" >
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label">From:</label></td>
                                                        <td>
                                                            <input type="text" name="station_from" id="station_from" class="form-control" >
                                                        </td>
                                                        <td><label class="control-label">State:</label></td>
                                                        <td>
                                                            <input type="text" name="state_from" id="state_from" class="form-control" >
                                                        </td>
                                                        <td><label class="control-label">To:</label></td>
                                                        <td>
                                                            <input type="text" name="station_to" id="station_to" class="form-control" >
                                                        </td>
                                                        <td><label class="control-label">State:</label></td>
                                                        <td>
                                                            <input type="text" name="state_to" id="state_to" class="form-control" >
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><label class="control-label">Distance:</label></td>
                                                        <td>
                                                            <input type="text" name="distance" id="distance" class="form-control" >
                                                        </td>
                                                        <td><label class="control-label">Remarks:</label></td>
                                                        <td colspan="5">
                                                            <input type="text" name="remark" id="remark" class="form-control" >
                                                        </td>
                                                    </tr>
                                                   
                                                   
                                                </table>

                                                <fieldset>
                                                        <legend> Vehicle Type Details</legend>
                                                        <table width="100%" id="vechileEnqTbl">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Vehicle Type</th>
                                                                <th>Weight</th>
                                                                <th>Length</th>
                                                                <th>Width</th>
                                                                <th>Height</th>
                                                                <th>No. Of Vehicle</th>
                                                                <th>Material</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                            <?php
                                                            $sn = 1;
                                                            ?>
                                                           <tbody> 
                                                            <tr id="rowid<?= $sn ?>">
                                                                <td>1</td>
                                                                <td>
                                                                    <input type="text" name="data[vechile_type][<?= $sn ?>]" id="vechile_type_<?= $sn ?>" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="data[weight][<?= $sn ?>]" id="weight_<?= $sn ?>" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="data[length][<?= $sn ?>]" id="length_<?= $sn ?>" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="data[width][<?= $sn ?>]" id="width_<?= $sn ?>" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="data[height][<?= $sn ?>]" id="height_<?= $sn ?>" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="data[no_of_vechile][<?= $sn ?>]" id="no_of_vechile_<?= $sn ?>" class="form-control">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="data[meterial][<?= $sn ?>]" id="meterial_<?= $sn ?>" class="form-control">
                                                                </td>
                                                                
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                        

                                                        <br>
                                                        <button type="button" class="btn btn-primary btn-round btn-simple hidden-sm-down add_field_button"><i class="fa fa-plus"></i> Add Row</button>

                                                    </fieldset>


                                            </fieldset>

                                        </div>
                                        <div class="form-group col-md-12 text-center">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-success btn1" name="submit"
                                                    value="Submit">  Submit</button>
                                                
                                                <button type="button" class="btn btn-danger btn1 close-me"
                                                    class="btn btn-info btn1"><i class="fa fa-times"></i>
                                                    Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

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

        <script src="<?= $base_url ?>assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript">
        </script>
        <link href="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet"
            type="text/css" />
        <script src="<?= $base_url ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="<?= $base_url ?>assets/plugins/jquery-validation/dist/jquery.validate.js"></script>
<script>

var max_fields = 8; //maximum input boxes allowed
var add_button = $(".add_field_button"); //Add button ID
var x = <?= $sn ?>; //initlal text box count
$(add_button).click(function (e) { //on add input button click
    e.preventDefault();
    x++; //text box increment
    
    var rowInd = $('#vechileEnqTbl >tbody >tr').length;
    if(rowInd < max_fields){
    var myrow = '<tr id="rowid' + x + '"><td>' + (rowInd+1) + '</td>'
    + '<td><input type="text" name="data[vechile_type]['+ x +']" id="vechile_type_' + x + '" value="" class="form-control"></td>'
    + '<td><input type="text" name="data[weight]['+ x +']" id="weight_' + x + '" value="" class="form-control"></td>'
    + '<td><input type="text" name="data[length]['+ x +']" id="length_' + x + '" value="" class="form-control"></td>'
    + '<td><input type="text" name="data[width]['+ x +']" id="width_' + x + '" value="" class="form-control"></td>'
    + '<td><input type="text" name="data[height]['+ x +']" id="height_' + x + '" value="" class="form-control"></td>'            
    + '<td><input type="text" name="data[no_of_vechile]['+ x +']" id="no_of_vechile_' + x + '" value="" class="form-control"></td>' 
       
    + '<td><input type="text" name="data[meterial]['+ x +']" id="meterial_' + x + '" value="" class="form-control"></td>' 

    + '<td><span class="btn btn-danger btn-round btn-simple" onclick="removeitem(' + x + ')">X Remove</span></td></tr>';

    $('#vechileEnqTbl > tbody > tr:nth-child('+ (rowInd)+')').after(myrow);
    } else{
       alertify.error('Max ' + max_fields +' Vechel is allowed');
    }

});



function removeitem(x) {
    $("#rowid" + x).remove();
    var i=1;
    $("#vechileEnqTbl >tbody >tr").each(function(){
       var trlen = $("#vechileEnqTbl >tbody >tr").length;
       if(i <= trlen){
         $(this).find("td:first").text(i);
       } 
       i++;
    });
}

</script>
</body>

</html>