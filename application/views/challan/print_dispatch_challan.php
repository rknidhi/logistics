<?php
$driver_details = $this->function_library->FindDriverDetails($dispatch_challan->driver_id_fk);
$vehicle_details = $this->function_library->FindVehicleByReg($dispatch_challan->gr_vehicle_no);
$gr_details = $this->functions->get_single_row('booking_gr', 'bgr_id', $dispatch_challan->gr_no_fk);
$item_details = $this->functions->get_single_row('tbl_master_item', 'item_id', $gr_details->item_name_fk);
// Modified by Rakesh Dated: 04-09-19
$item_pkg_method = $this->functions->get_single_row('tbl_gr_items', 'bgr_id', $dispatch_challan->gr_no_fk);
// End
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : Create Dispatch Challan</title>
        <style>
            @page { size: auto;  margin: 20px; }

            table, th {  
                border: 1px solid #333;
                text-align: left;
                font-weight: bold;
            }

            td {  
                border: 1px solid #333;
                text-align: left;
                font-weight: normal;
                padding-left: 5px;
            }

            table {
                border-collapse: collapse;
                font-size: 12px;
            }
            th, td {
            }
            .printLogo img{
                max-width: 300px;
                max-height: 150px;
            }
            .signature td{
                font-weight: bold;
                color: maroon;
                font-size: 16px;
                text-align: center;
            }
        </style>
    </head>

    <body onload="window.print()">
        <div id="main-wrapper">
            <div class="page-wrapper">
                <div class="container-fluid">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-outline-primary">
                                <div class="card-body">
                                    <table width="100%">
                                        <tr>
                                            <td rowspan="6"><div class="printLogo"><img src="<?= $base_url ?>assets/images/logo-text.png" alt="image" ></div></td>
                                            <td id="spaceaddress" rowspan="4">
                                                <strong>GSTIN : </strong><?= $this->config->item('company_gstin') ?><br>
                                                <strong>PAN No.: </strong><?= $this->config->item('company_pan') ?><br>
                                            </td>             
                                        </tr>
                                        <tr>
                                            <td><b>H.C. No. :</b></td>
                                            <td><?= $dispatch_challan->lhc_number ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Date </strong></td>
                                            <td><?= convertToHumanDate($dispatch_challan->added_on) ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Lorry No.</strong></td>
                                            <td style="border-bottom: 1px dotted #000"><?= $dispatch_challan->gr_vehicle_no ?></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2">
                                                <strong>Mobile : </strong><?= $this->config->item('company_mobile') ?><br>
                                                <strong> Phone : </strong><?= $this->config->item('lr_phone') ?>
                                            </td>
                                            <td><strong>From</strong></td>
                                            <td style="border-bottom: 1px dotted #000"><?= $dispatch_challan->gr_fromstation ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>To</strong></td>
                                            <td colspan="5" style="border-bottom: 1px dotted #000"><?= $dispatch_challan->gr_tostation ?></td>
                                        
                                        </tr>
                                    </table>

                                    <table width="100%">
                                        <tr>
                                            <td style="text-align: center;">
                                               
                                                Address : <?= $this->config->item('company_address') ?><br>
                                                
                                                    Email-Id : <?= $this->config->item('company_email1') ?>, 
                                                    <?= $this->config->item('company_email2') ?>
                                            </td>
                                        </tr>
                                    </table>


                                    <table width="100%">

                                        <tr>
                                            <td><strong>Bilty No.</strong></td>
                                            <td><strong>No. Of Pkts.</strong></td>
                                            <td><strong>Method Of Packing</strong></td>                                            
                                            <td><strong>Content</strong></td>                                            
                                            <td><strong>Weight (Kg)</strong></td>
                                            <td><strong>Remarks</strong></td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom: 1px dotted #000"><?= $dispatch_challan->gr_no_fk ?></td>
                                            <td></td>
                                            <td style="border-bottom: 1px dotted #000">
                                                <?= $this->function_library->FindPackageMethod($item_pkg_method->item_method_of_pack_fk) 
                                            //= $this->function_library->FindPackageMethod($gr_details->item_method_of_pack_fk) ?></td>
                                            <td></td>
                                            <td style="border-bottom: 1px dotted #000"><?= $gr_details->item_weight ?> (Kg)</td>
                                            <td></td>
                                            <!-- <td colspan="3" style="border-bottom: 1px dotted #000"><?= $gr_details->item_booking_freight_rate ?></td> -->

                                        </tr>
                                    </table>

                                    <table width="100%" style="padding:0px;">
                                        <tr>
                                            
                                            <td style="padding:0px;">
                                                <table width="100%">

                                                    <tr>
                                                        <td><strong>Owner's Name</strong></td>
                                                        <td><?= $vehicle_details->owner_name ?></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><strong>Owner PAN No</strong></td>
                                                        <td><?= $vehicle_details->pan_card_no ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Address</strong></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Ph No.</strong></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Driver Name</strong></td>
                                                        <td><?= @$driver_details->name; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Address</strong></td>
                                                        <td><?= @$driver_details->address; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Ph No.</strong></td>
                                                        <td><?= @$driver_details->phone_no; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Supplier Reference</strong></td>
                                                        <td><?= $this->function_library->FindBrokerDetails($dispatch_challan->broker_id_fk)->broker ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Chachis No</strong></td>
                                                        <td><?= @$vehicle_details->chasis_no ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Policy No.</strong></td>
                                                        <td colspan=""></td>
                                                    </tr>


                                                    <tr>
                                                        <td><strong>Engine No</strong></td>
                                                        <td><?= $vehicle_details->engine_no ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td style="padding:0px;">
                                                <table width="100%">
                                                    <tr>
                                                        <td><strong>Total Hire Rs.</strong></td>
                                                        <td><?= $dispatch_challan->truck_freight ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Less ADV Rs.</strong></td>
                                                        <td><?= $dispatch_challan->advance ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Less TDS</strong></td>
                                                        <td><?= $dispatch_challan->tds ?></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><strong>Balance  Rs.</strong></td>
                                                        <td><?= $dispatch_challan->balance_tf ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Balance InWord</strong></td>
                                                        <td><?= no_to_words($dispatch_challan->balance_tf) ?> rupees only</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Add: Extra charges</strong></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Total Due</strong></td>
                                                        <td><?= $dispatch_challan->balance_tf ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Payable On</strong></td>
                                                        <td><?= convertToHumanDate($dispatch_challan->added_on) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Payable at</strong></td>
                                                        <td>Dadri</td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2"><p><strong>NOTE:</strong> No Detention Charges will be pay on sunday & Other Holidays.</p></td>
                                                    </tr>

                                                </table>
                                            </td>
                                        </tr>
                                    </table>



                                    <table border="1" width="100%">
                                        <tr>
                                            <td width="60%">
                                                <p style="text-align: center;"><strong>CAUTION</strong></p>
                                                Vechicles Should Deliver The good of Destination within in stipulated/transit time of day, Otherwise penalty of late delivery Rs. 700
                                            </td>

                                            <td colspan="2" style="text-align: center;">
                                                <b>Any Deduction/Additional Payment</b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <br>
                                                Remarks : 
                                                <br>
                                                <br>
                                            </td>
                                        </tr>

                                    </table>
                                    
                                    <table width="100%">
                                        <tr class="signature">
                                            <td width="33%"><br /><br />Agent Signature<br /><br /></td>
                                            <td width="33%"><br /><br />Driver's Signature<br /><br /></td>
                                            <td width="33%"><br /><br />Dispatch Signature<br /><br /></td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>

</html>