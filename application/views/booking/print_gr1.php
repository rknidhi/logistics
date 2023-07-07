<?php
$consigner = $this->function_library->FindPartyDetails($booking_gr->party_id_fk);
?>
<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : View GR</title>
        <style>
            @page { size: auto;  margin: 15px; }

            table  {  
                border: 1px solid #333;
                text-align: left;
                font-weight: bold;
                border-collapse: collapse;
                font-size: 12px;
            }

            th {
                padding-left: 5px; 
                border: 1px solid #333;
            }

            td {  
                /*border: 1px solid #ddd;*/
                text-align: left;
                font-weight: normal;
                padding-left: 5px;
                border: 1px solid #333;
            }
            th, td {
            }
            .printLogo img{
                max-width: 300px;
                max-height: 120px;
                padding: 5px;
            }
        </style>
    </head>

    <body onload="window.print()">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <div class="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-8">
             
                            <div class="card">
                                <div class="card-body">

                                    <table width="100%">
                                        <tr>
                                            <td rowspan="3"><div class="printLogo"><img src="<?= $base_url ?>assets/images/logo-text.png" alt="image"></div></td>
                                            
                                            <td>
                                                <strong>GSTIN : </strong><?= $this->config->item('company_gstin') ?><br />
                                                <strong>PAN : </strong><?= $this->config->item('company_pan') ?><br />
                                            </td>
                                            <td style="text-align:center">
                                                <strong>CONSIGNMENT NOTE </strong><br />
                                                All Subject to Ghaziabad Jurisdiction<br />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2">
                                                <strong> Mobile : </strong><?= $this->config->item('company_mobile') ?><br>
                                                <strong> Phone : </strong><?= $this->config->item('company_phone') ?>
                                            
                                            </td>
                                            <td style="text-align:center">
                                                <strong>SPECIAL CONTRACT </strong><br/>
                                                Address of Issuing Office<br />
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td style="height:20px;"> </td>
                                        </tr>
                                        </td>   
                                        </tr>
                                    </table>

                                    <table width="100%">
                                        <tr>
                                            <td style="text-align: center;">
                                                <?php
                                                print_r($booking_gr);
                                                echo "<br>";
                                                    print_r($consigner);
                                                ?>

                                                <p>Address: <?= $this->config->item('company_address') ?><br>
                                                     Email-Id: <?= $this->config->item('company_email1') ?>, <?= $this->config->item('company_email2') ?> Website: <?= $this->config->item('company_website') ?></p>
                                            
                                            </td>
                                        </tr>
                                    </table>

                                    <table width="100%">
                                        <tr>
                                            <td width="70%" valign='top'>
                                                <table width="100%">
                                                    <tr>
                                                        <td><strong>Delivery From</strong></td>
                                                        <td><?= $this->function_library->FindStation($booking_gr->from_station_fk) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Vehicle No</strong></td>
                                                        <td><?= $this->function_library->FindVehicle($booking_gr->vehicle_id_fk) ?></td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td><strong>Permit No.</strong></td>
                                                        <td>xxxxxx</td>
                                                    </tr> -->

                                                    <tr>
                                                        <td><strong>Consignor's Name And Address</strong></td>
                                                        <td><?= $consigner->party_name ?> <br /><?= $consigner->address ?></td>
                                                    <tr>
                                                    <tr>    
                                                        <td><strong>Consignor's GST No.</strong></td>
                                                        <td><?= $consigner->gst_no ?></td>
                                                    </tr>
                                                    <tr>    
                                                        <td><strong>Consignor's CST/TIN No.</strong></td>
                                                        <td><?= $consigner->tin_no ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><br /></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Consignee's Name And Address</strong></td>
                                                        <td><?= $consignee->party_name ?> <br /><?= $consignee->address ?></td>
                                                    <tr>
                                                    <tr>    
                                                        <td><strong>Consignee's GST No.</strong></td>
                                                        <td><?= $consignee->gst_no ?></td>
                                                    </tr>
                                                    <tr>    
                                                        <td><strong>Consignee's CST/TIN No.</strong></td>
                                                        <td><?= $consignee->tin_no ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><br /></td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Invoice No & Date</strong></td>
                                                        <td><?= $booking_gr->invoice_no ?> - <?= date_only_format($booking_gr->invoice_date) ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Mode Of Payment</strong></td>
                                                        <td><?= $booking_gr->gr_type ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Container Number :</strong></td>
                                                        <td><?= $booking_gr->container_number ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>E-Way Bill No. :</strong></td>
                                                        <td><?= $booking_gr->e_way_bill_no ?></td>
                                                    </tr>                                                    
                                                    
                                                    <tr>
                                                        <td colspan="2" style=" padding: 0px;">
                                                            <table width="100%">
                                                                <tr>
                                                                    <th><strong>No. Of Packages</strong></th>
                                                                    <th><strong>Method Of Packaging</strong></th>
                                                                    <th><strong>Description (said to contain)</strong></th>
                                                                    <th><strong>Weight (Kg)</strong></th>
                                                                    <th><strong>Weight Charges</strong></th>
                                                                </tr>
                                                                <?php
                                                                foreach($bgr_items as $grItem){

                                                                
                                                                ?>
                                                                <tr>
                                                                    <td><?= $grItem->item_qty ?></td>
                                                                    <td><?= $this->function_library->FindPackageMethod($grItem->item_method_of_pack_fk) ?></td>
                                                                    <td><?php
                                                                    // echo $grItem->item_name_fk;
                                                                    echo $this->function_library->FindItemDetails($grItem->item_name_fk)->item_name ?></td>
                                                                    
                                                                    <td><?= $grItem->item_weight ?></td>
                                                                    <td>Rs.<?= $grItem->item_weight_ch ?>/Kg</td>
                                                                </tr>
                                                                <?php
                                                                }
                                                                ?>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="30%" >
                                                <table>
                                                    <tr>
                                                        <td style="font-weight: normal; font-size: 12px; color: maroon;">Dumerger Chargeable after 7 day from date of @arrival of Rs3/- on Charge of Weight CFT </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <strong>C. No. :   <?= $booking_gr->bgr_id ?> </strong>
                                                            
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <strong>Date :  <?= date_only_format($booking_gr->gr_date) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>From : </strong> <?= $this->function_library->FindStation($booking_gr->from_station_fk) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>To : </strong> <?= $this->function_library->FindStation($booking_gr->to_station_fk) ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="color: maroon;text-align: center;">Person Liable for GST</td>
                                                    </tr>

                                                    <tr>
                                                        <td><span style="color:maroon;">1. Consignor : </span><?= $booking_gr->tax_payable_by == 'consignor' ? 'Yes' : '' ?> <br>
                                                        <span style="color:maroon;">2. Consignee : </span><?= $booking_gr->tax_payable_by == 'consignee' ? 'Yes' : '' ?> <br />
                                                            <span style="color:maroon;">3. Good And Transport Agency : </span><?= $booking_gr->tax_payable_by == 'transporter' ? 'Yes' : '' ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 0px;">
                                                            <table width="100%">
                                                                <tr>
                                                                    <th width="40%">Rate</td>
                                                                    <th>Amount</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Fright Rate</td>
                                                                    <td>Rs. <?= $booking_gr->s_freight ?></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Loading Ch.</td>
                                                                    <td colspan="">Rs. <?= $booking_gr->s_loading_ch ?></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Unloading Ch.</td>
                                                                    <td colspan="">Rs. <?= $booking_gr->s_unloading_charges ?></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Crossing Ch.</td>
                                                                    <td colspan="">Rs. <?= $booking_gr->s_crossing_charges ?></td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td>Detention Ch</td>
                                                                    <td colspan="">Rs. <?= $booking_gr->item_detention_ch ?></td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td>St. Charges</td>
                                                                    <td colspan="">Rs. <?= $booking_gr->s_stationary_charges ?></td>
                                                                </tr>


                                                                <tr>
                                                                    <td>Sub total</td>
                                                                    <td colspan="">Rs. <?= $booking_gr->s_total_freight ?></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>GST</td>
                                                                    <td colspan="">-</td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Grand Total</td>
                                                                    <td colspan="">Rs. <?= $booking_gr->s_total_freight ?></td>
                                                                </tr>

                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                    <table width="100%">
                                        <tr >
                                            <td rowspan="2" width="50%"> The Consignor hereby expressly declare that the above particulars furnished by bill or his agent correct. 
                                            No prohibited article are included and he is aware of and accepts the conditions of carriage <br>
                                            .................................. Consignor</td>
                                            <td colspan="3"><strong> Booked Are Carried Subject To Terms And Conditions Mentioned Overleaf At Owner's Risk </strong>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan="3"><strong>"Goods Booked Under Section 10 Of Carrier Act"</strong>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                        <td><br />1. Collection Done By Us From .................................</td>
                                            <td rowspan="2"><strong><span style="color:maroon;">For <?php  echo $this->config->item('company_name'); ?> </span></strong><br /><br />Signature Of Booking Office .................................</td>
                                        </tr>
                                        <tr>
                                            <td><br />2. Door Delivery Done By Us From .................................</td>
                                        </tr>
                                        <tr>
                                            <td colspan="10" style="text-align: center; color: maroon;">
                                            The Transport Operator will not responsible for any damage and breakage</td>
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