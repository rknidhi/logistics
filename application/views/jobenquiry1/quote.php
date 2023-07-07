<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Quote</title>
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
                                    <h4 class="m-b-0 text-white">Quote</h4>
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
                                            <legend>Search Enquiry</legend>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table width="100%" >
                                                    <tr>
                                                        <td width="11%"><label class="control-label">Enter E-Ref-No.</label></td>
                                                        <td width="20%">
                                                            <input type="text" id="enq_ref_no" name="enq_ref_no" class="form-control" required>
                                                        </td>
                                                        <td> <button class="btn btn-success search_eref"><i class="fa fa-search"></i> Search</button></td>
                                                    </tr>
                                                    </table>
                                                </div>
                                                
                                            </div>
                                        </fieldset>
                                   
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form class="m-t-10" id="form_validation" novalidate method="POST">
                                                <fieldset>
                                                    <legend>Quote </legend>
                                                    <table width="100%">
                                                    <tr>
                                                        <td><label class="control-label">Q-Ref-No.:</label></td>
                                                        <td>
                                                            <input type="text" name="quote_ref_no" id="quote_ref_no" class="form-control" value="" readonly>
                                                            <input type="hidden" name="enqid_fk" id="enqid_fk" value="" class="form-control"> 
                                                        </td>
                                                        <td><label class="control-label">From:</label></td>
                                                        <td>
                                                            <input type="text" name="from" id="from" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">To:</label></td>
                                                        <td>
                                                            <input type="text" name="to" id="to" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Distance:</label></td>
                                                        <td>
                                                            <input type="text" name="distance" id="distance" class="form-control" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="control-label">Remarks:</label></td>
                                                        <td colspan="7">
                                                            <input type="text" name="remark" id="remark" class="form-control">
                                                        </td>
                                                        
                                                    </tr>
                                                    </table>                                            
                                                </fieldset>
                                                <div id="tbl01">
                                                <fieldset>
                                                    <legend>Vendor Rate Input Details</legend>
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                        <td><label class="control-label">Vehicle Type:</label></td>
                                                        <td>
                                                            <input type="text" name="vtype1" id="vtype1" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Weight:</label></td>
                                                        <td>
                                                            <input type="text" name="weight1" id="weight1" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Length:</label></td>
                                                        <td>
                                                            <input type="text" name="lenght1" id="length1" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Width:</label></td>
                                                        <td>
                                                            <input type="text" name="width1" id="width1" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Height:</label></td>
                                                        <td>
                                                            <input type="text" name="height1" id="height1" class="form-control" disabled >
                                                        </td>
                                                        <td><label class="control-label">No. Of Vehicle:</label></td>
                                                        <td>
                                                            <input type="text" name="numvechile1" id="numvechile1" class="form-control" disabled>
                                                        </td>
                                                    </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <input type="hidden" name="enqid_vechle_fk1" id="enqid_vechle_fk1" value="" class="form-control">                                                     
                                                    <fieldset>
                                                        <legend> Vendor Rate Input Details</legend>
                                                        <table width="70%" id="myTable">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Vendor Name</th>
                                                                <th>Rate</th>
                                                                <th>&nbsp;</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                            <?php
                                                            $sn = 1;
                                                            ?>
                                                           <tbody> 
                                                            <tr id="rowid<?= $sn ?>">
                                                                <td width="5%">1</td>
                                                                <td width="30%">
                                                                    <input type="text" name="data[data][vendor_name][<?= $sn ?>]" id="srno_<?= $sn ?>" class="form-control" >
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data][rate][<?= $sn ?>]" id="vendor_name_<?= $sn ?>" class="form-control">
                                                                </td>
                                                                <td width="10%"><input type="radio" class="finalradio" name="final1" id="final_<?= $sn ?>" value="<?= $sn ?>"><label for="final_<?= $sn ?>"> Final Quote</label></td>
                                                                <td width="10%"></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                        <br>
                                                        <button type="button" class="btn btn-primary btn-round btn-simple hidden-sm-down add_field_button"><i class="fa fa-plus"></i> Add Row</button>

                                                    </fieldset>
                                                </fieldset>
                                            </div>
                                            <div id="tbl02">
                                                <fieldset>
                                                    <legend> Vendor Rate Input Details</legend>
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                        <td><label class="control-label">Vehicle Type:</label></td>
                                                        <td>
                                                            <input type="text" name="vtype2" id="vtype2" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Weight:</label></td>
                                                        <td>
                                                            <input type="text" name="weight2" id="weight2" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Length:</label></td>
                                                        <td>
                                                            <input type="text" name="lenght2" id="length2" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Width:</label></td>
                                                        <td>
                                                            <input type="text" name="width2" id="width2" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Height:</label></td>
                                                        <td>
                                                            <input type="text" name="height2" id="height2" class="form-control" disabled >
                                                        </td>
                                                        <td><label class="control-label">No. Of Vehicle:</label></td>
                                                        <td>
                                                            <input type="text" name="numvechile2" id="numvechile2" class="form-control" disabled>
                                                        </td>
                                                    </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <input type="hidden" name="enqid_vechle_fk2" id="enqid_vechle_fk2" value="" class="form-control">                                                    
                                                    <fieldset>
                                                        <legend>Vendor Rate Input Details</legend>
                                                        <table width="70%" id="myTable1">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Vendor Name</th>
                                                                <th>Rate</th>
                                                                <th>&nbsp;</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                            <?php
                                                            $sn1 = 1;
                                                            ?>
                                                           <tbody> 
                                                            <tr id="rowid1<?= $sn ?>">
                                                                <td width="5%">1</td>
                                                                <td width="30%">
                                                                    <input type="text" name="data[data1][vendor_name][<?= $sn1 ?>]" id="vendor_name1_<?= $sn1 ?>" class="form-control" >
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data1][rate][<?= $sn1 ?>]" id="rate1_<?= $sn ?>" class="form-control">
                                                                </td>
                                                                <td width="10%"><input type="radio" class="finalradio" name="final2" id="final1_<?= $sn ?>" value="<?= $sn1 ?>"><label for="final1_<?= $sn ?>"> Final Quote</label></td>
                                                                <td width="10%"></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                        <br>
                                                        <button type="button" class="btn btn-primary btn-round btn-simple hidden-sm-down add_field_button1"><i class="fa fa-plus"></i> Add Row</button>

                                                    </fieldset>
                                                </fieldset>
                                            </div>
                                            <div id="tbl03">
                                                <fieldset>
                                                    <legend>Vendor Rate Input Details</legend>
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                        <td><label class="control-label">Vehicle Type:</label></td>
                                                        <td>
                                                            <input type="text" name="vtype3" id="vtype3" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Weight:</label></td>
                                                        <td>
                                                            <input type="text" name="weight3" id="weight3" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Length:</label></td>
                                                        <td>
                                                            <input type="text" name="lenght3" id="length3" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Width:</label></td>
                                                        <td>
                                                            <input type="text" name="width3" id="width3" class="form-control" disabled>
                                                        </td>
                                                        <td><label class="control-label">Height:</label></td>
                                                        <td>
                                                            <input type="text" name="height3" id="height3" class="form-control" disabled >
                                                        </td>
                                                        <td><label class="control-label">No. Of Vehicle:</label></td>
                                                        <td>
                                                            <input type="text" name="numvechile3" id="numvechile3" class="form-control" disabled>
                                                        </td>
                                                    </tr>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <input type="hidden" name="enqid_vechle_fk3" id="enqid_vechle_fk3" value="" class="form-control">                                                    
                                                    <fieldset>
                                                        <legend>Vendor Rate Input Details</legend>
                                                        <table width="70%" id="myTable2">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Vendor Name</th>
                                                                <th>Rate</th>
                                                                <th>&nbsp;</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                        </thead>
                                                            <?php
                                                            $sn2 = 1;
                                                            ?>
                                                           <tbody> 
                                                            <tr id="rowid2<?= $sn ?>">
                                                                <td width="5%">1</td>
                                                                <td width="30%">
                                                                    <input type="text" name="data[data2][vendor_name][<?= $sn2 ?>]" id="vendor_name2_<?= $sn2 ?>" class="form-control" >
                                                                </td>
                                                                <td width="10%">
                                                                    <input type="text" name="data[data2][rate][<?= $sn2 ?>]" id="rate2_<?= $sn2 ?>" class="form-control">
                                                                </td>
                                                                <td width="10%"><input type="radio" class="finalradio" name="final3" id="final2_<?= $sn2 ?>" value="<?= $sn ?>"><label for="final2_<?= $sn ?>"> Final Quote</label></td>
                                                                <td width="10%"></td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                                        <br>
                                                        <button type="button" class="btn btn-primary btn-round btn-simple hidden-sm-down add_field_button2"><i class="fa fa-plus"></i> Add Row</button>

                                                    </fieldset>
                                                </fieldset>
                                            </div>
                                                <div class="form-group col-md-12 text-center">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-success btn1" name="submit" value="Submit"> Submit</button>
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

            $(document).ready(function(){
               for(var ii = 1; ii<=3; ii++){
                    $('#tbl0'+ii).hide();
                    $('#tbl0'+ii).find("input, button").attr("disabled", "disabled");
               }

                $('.search_eref').on('click', function(){
                var searchvalue = $('#enq_ref_no').val();
                   for(var ii = 1; ii<=3; ii++){
                        $('#tbl0'+ii).hide();
                        $('#tbl0'+ii).find("input, button").attr("disabled", "disabled");
                   } 

               $.ajax({
                    url: '<?= $base_url ?>jobenquiry/get_enquiry_ajax',
                    type: 'POST',
                    data: ({
                        enq_ref_no: searchvalue
                    }),
                    success: function(response) {

                        var obj = jQuery.parseJSON(response);

                        if(obj.sucess == 'fali'){
                           alertify.error('Record no found');
                        } else{
                            $('#quote_ref_no').val("<?php echo genrate_unique_id('tbl_quote','Q');?>");

                            if(obj.enq_vechile.length > 0){
                                $.each(obj.enq_vechile, function( key, value ) {
                                  $('#tbl0'+(key+1)).show();
                                  $('#tbl0'+(key+1)).find("input, button, hidden").removeAttr("disabled");

                                  $('#tbl0'+(key+1)).find('#vtype'+(key+1)).val(value.vechile_type);
                                  $('#tbl0'+(key+1)).find('#weight'+(key+1)).val(value.weight);
                                  $('#tbl0'+(key+1)).find('#length'+(key+1)).val(value.length);
                                  $('#tbl0'+(key+1)).find('#width'+(key+1)).val(value.width);
                                  $('#tbl0'+(key+1)).find('#height'+(key+1)).val(value.height);
                                  $('#tbl0'+(key+1)).find('#numvechile'+(key+1)).val(value.no_of_vechile);
                                  $('#tbl0'+(key+1)).find('#enqid_vechle_fk'+(key+1)).val(value.vid);
                                });
                            }
                            $('#enqid_fk').val(obj.enquiry.enqid);
                            $('#from').val(obj.enquiry.station_from);
                            $('#to').val(obj.enquiry.station_to);
                            $('#distance').val(obj.enquiry.distance);
                          }
                        }
                    });
                });
            });

        </script>



<script type="text/javascript">
var max_fields = 3; //maximum input boxes allowed
var add_button = $(".add_field_button"); //Add button ID
var x = <?= $sn ?>; //initlal text box count
$(add_button).click(function (e) { //on add input button click
    e.preventDefault();
    x++; //text box increment
    var rowInd = $('#myTable >tbody >tr').length;
    if(rowInd < max_fields){
    var myrow = '<tr id="rowid' + x + '"><td>' + (rowInd+1) + '</td>'
    + '<td><input type="text" name="data[data][vendor_name]['+ x +']" id="vendor_name_' + x + '" value="" class="form-control"></td>'
    + '<td><input type="text" name="data[data][rate]['+ x +']" id="rate_' + x + '" value="" class="form-control"></td>'    
    + '<td><input type="radio" class="finalradio" name="final1" id="final_' + x + '" value="' + x + '"><label for="final_' + x + '"> Final Quote</label></td>'
    + '<td><span class="btn btn-danger btn-round btn-simple" onclick="removeitem(' + x + ')">X Remove</span></td></tr>';

    $('#myTable > tbody > tr:nth-child('+ (rowInd)+')').after(myrow);
    } else{
       alertify.error('Max 3 Enquery is allowed');
    }
});



function removeitem(x) {
    $("#rowid" + x).remove();
    var i=1;
    $("#myTable >tbody >tr").each(function(){
       var trlen = $("#myTable >tbody >tr").length;
       if(i <= trlen){
         $(this).find("td:first").text(i);
       } 
       i++;
    });
}


$(document).on('click', 'input[type=radio]', function() {
    var idv = $(this).val();

});


var max_fields = 3; //maximum input boxes allowed
var add_button = $(".add_field_button1"); //Add button ID
var x = <?= $sn1 ?>; //initlal text box count
$(add_button).click(function (e) { //on add input button click
    e.preventDefault();
    x++; //text box increment
    var rowInd = $('#myTable1 >tbody >tr').length;
    if(rowInd < max_fields){
    var myrow = '<tr id="rowid1' + x + '"><td>' + (rowInd+1) + '</td>'
    + '<td><input type="text" name="data[data1][vendor_name]['+ x +']" id="vendor_name1_' + x + '" value="" class="form-control"></td>'
    + '<td><input type="text" name="data[data1][rate]['+ x +']" id="rate1_' + x + '" value="" class="form-control"></td>'    
    + '<td><input type="radio" class="finalradio" name="final2" id="final1_' + x + '" value="' + x + '"><label for="final1_' + x + '"> Final Quote</label></td>'
    + '<td><span class="btn btn-danger btn-round btn-simple" onclick="removeitem1(' + x + ')">X Remove</span></td></tr>';

    $('#myTable1 > tbody > tr:nth-child('+ (rowInd)+')').after(myrow);
    } else{
       alertify.error('Max 3 Enquery is allowed');
    }
});



function removeitem1(x) {
    $("#rowid1" + x).remove();
    var i=1;
    $("#myTable1 >tbody >tr").each(function(){
       var trlen = $("#myTable1 >tbody >tr").length;
       if(i <= trlen){
         $(this).find("td:first").text(i);
       } 
       i++;
    });
}



var max_fields = 3; //maximum input boxes allowed
var add_button = $(".add_field_button2"); //Add button ID
var x = <?= $sn2 ?>; //initlal text box count
$(add_button).click(function (e) { //on add input button click
    e.preventDefault();
    x++; //text box increment
    var rowInd = $('#myTable2 >tbody >tr').length;
    if(rowInd < max_fields){
    var myrow = '<tr id="rowid2' + x + '"><td>' + (rowInd+1) + '</td>'
    + '<td><input type="text" name="data[data2][vendor_name]['+ x +']" id="vendor_name2_' + x + '" value="" class="form-control"></td>'
    + '<td><input type="text" name="data[data2][rate]['+ x +']" id="rate2_' + x + '" value="" class="form-control"></td>'    
    + '<td><input type="radio" class="finalradio" name="final3" id="final2_' + x + '" value="' + x + '"><label for="final2_' + x + '"> Final Quote</label></td>'
    + '<td><span class="btn btn-danger btn-round btn-simple" onclick="removeitem2(' + x + ')">X Remove</span></td></tr>';

    $('#myTable2 > tbody > tr:nth-child('+ (rowInd)+')').after(myrow);
    } else{
       alertify.error('Max 3 Enquery is allowed');
    }
});



function removeitem2(x) {
    $("#rowid2" + x).remove();
    var i=1;
    $("#myTable2 >tbody >tr").each(function(){
       var trlen = $("#myTable2 >tbody >tr").length;
       if(i <= trlen){
         $(this).find("td:first").text(i);
       } 
       i++;
    });
}

</script>
<!-- End -->        
    </body>

</html>