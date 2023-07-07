<?php
$consigner = $this->function_library->FindPartyDetails($booking_gr->consignor_id_fk);
$consignee = $this->function_library->FindPartyDetails($booking_gr->consignee_id_fk);
$itemdetails = $this->db->where('bgr_id', $booking_gr->bgr_id)->get('tbl_gr_items')->row();

?>
<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : View GR</title>
        <style>
            body {
                -webkit-print-color-adjust: exact !important;
                font-family: 'Source Sans Pro' !important;
            }
            @page { size: auto;  margin: 15px; }

            table  {  
                border: 1px solid #333;
                text-align: left;
                font-weight: bold;
                border-collapse: collapse;
                font-size: 14px;
            }

            th {
                padding-left: 5px; 
                border: 1px solid #333;
                background: #f9f2f9;
            }

            td {  
                /*border: 1px solid #ddd;*/
                text-align: left;
                font-weight: normal;
                padding: 3px 5px;
                border: 1px solid #333;
            }
            th, td {
                font-size:12px;
            }
            .printLogo {
                text-align: center;
                position: relative;
                background: #000;
                margin: 10px 20px ;
                border-radius: 5px;
                border: 1px solid black;
            }
            .printLogo img{
                width: 100%;
                max-height: 100%;
                background: #000;
                border-radius: 5px;
            }
            .komal{
                position: relative;
                font-size: 20px;
                color: #fff;
                background: #000;
            }
            .printLogo1{
                text-align: center;
                padding: 5px;
            }
            .printLogo1 img{
                width: 90%;
                max-height: 100%;
            }
            .pan td{
                text-align: center;
                font-weight: bold;
            }

            .grtable tr td{
                height: 20px;
            }
            .fleet{
                background: #000; color:#fff; padding:1px 5px;
            }
            body {
                -webkit-print-color-adjust: exact !important;
            }
            .mybox{
                border: 2px solid #000;
                padding: 0px 4px;
                margin: 0px 3px;
                font-size: 8px;
            }
            .companyHead{
                line-height: 5px;
            }
            @media print {
                
                body {
                -webkit-print-color-adjust: exact !important;
                font-family: 'Source Sans Pro' !important;
            }
                table  {  
                border: 1px solid #333;
                text-align: left;
                font-weight: bold;
                border-collapse: collapse;
                font-size: 14px;
            }

            th {
                padding-left: 5px; 
                border: 1px solid #333;
                background: #f9f2f9;
            }

            td {  
                /*border: 1px solid #ddd;*/
                text-align: left;
                font-weight: normal;
                padding-left: 3px 5px;
                border: 1px solid #333;
            }
            th, td {
                font-size:11px;
                border: 1px solid #333;
            }
            .printLogo {
                text-align: center;
                position: relative;
                background: #000;
                margin: 10px;
                border-radius: 5px;
                border: 1px solid black;
            }
            .printLogo img{
                width: 100%;
                max-height: 100%;
                background: #000;
                border-radius: 5px;
            }
            .komal{
                position: relative;
                font-size: 20px;
                color: #fff;
                background: #000;
            }
            .printLogo1{
                text-align: center;
                padding: 5px;
            }
            .printLogo1 img{
                width: 90%;
                max-height: 100%;
            }
            .pan td{
                text-align: center;
                font-weight: bold;
            }

            .grtable tr td{
                height: 20px;
            }
            .fleet{
                background: #000; color:#fff; padding:1px 5px;
            }
            .mybox{
                border: 2px solid #000;
                padding: 0px 4px;
                margin: 0px 3px;
                font-size: 8px;
            }
            .td{
                border: 1px solid #333;
            }

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
                                            
                                            <td style="text-align: left; vertical-align:top;"><strong> GSTIN. 09AHRPB7668K1ZK <br> PAN NO. AHRPB7668K  </strong></td>
                                            <td style="text-align: center;">
                                            <div class="companyHead">
                                                <h1 >Skytech Cargo & Logistics</h1>
                                                <p> Shop No.1, NH-24, Near Radha Krishna Public School, Sahapur Bamheta, Ghaziabad-201002 </p>
                                                <p> <strong> Email: sktechcargo@gmail.com </strong> </p>
                                            </div>
                                             </td>
                                            <td style="text-align: right; padding-right:5px; vertical-align:top"> <strong> Mobile: +91 9311469585<br>Phone: +91 9582341118  </strong></td>
                                            
                                        </tr>
                                    </table>
                                    <table width="100%">
                                        <tr>
                                            <td>Consignment No.</td>
                                            <td colspan="3"><strong><?php echo $booking_gr->bgr_id;?></strong></td>
                                            <td>Date</td>
                                            <td colspan="2"><strong><?php echo $booking_gr->gr_date;?></strong></td>
                                            <td><strong>test copy</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Booking Branch</td>
                                            <td><strong>Ghaziabad</strong></td>
                                            <td>Service Branch</td>
                                            <td><strong>Ghaziabad</strong></td>
                                            <td>From City</td>
                                            <td><strong><?= $this->function_library->FindStation($booking_gr->from_station_fk) ?></strong></td>
                                            <td>To City</td>
                                            <td><strong><?= $this->function_library->FindStation($booking_gr->to_station_fk) ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Sub Vertical</td>
                                            <td><strong>test FTL</strong></td>
                                            <td>Transport Mode</td>
                                            <td><strong><?php echo $booking_gr->delivery;?></strong></td>
                                            <td>Party Basis</td>
                                            <td><strong><?php echo $booking_gr->delivery;?>????</strong></td>
                                            <td>GSTIN PAID BY</td>
                                            <td><strong><?=$booking_gr->freight_by;?></strong></td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td colspan="4" style="text-align: center;">Consignor</td>
                                            <td colspan="4" style="text-align: center;">Consignee</td>
                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td colspan="3"><strong><?= $consigner->party_name ?></strong></td>
                                            <td>Name</td>
                                            <td colspan="3"><strong><?= $consignee->party_name ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td colspan="3"><strong><?= $consigner->address ?></strong></td>
                                            <td>Address</td>
                                            <td colspan="3"><strong><?= $consignee->address ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td colspan="3"><strong><?=$consigner->city?></strong></td>
                                            <td>City</td>
                                            <td colspan="3"><strong><?=$consignee->city?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Contact</td>
                                            <td colspan="3"><strong><?=$consigner->phone_no?></strong></td>
                                            <td>Contact</td>
                                            <td colspan="3"><strong><?=$consignee->phone_no?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>GSTIN No.</td>
                                            <td colspan="3"><strong><?=$consigner->gst_no?></strong></td>
                                            <td>GSTIN No.</td>
                                            <td colspan="3"><strong><?=$consignee->gst_no?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Vehicle No.</td>
                                            <td colspan="2"><strong><?= $this->function_library->FindVehicle1($booking_gr->vehicle_id_fk); ?></strong></td>
                                            <td>Container No.</td>
                                            <td colspan="2"><strong><?= $booking_gr->container_number?></strong></td>
                                            <td>Risk Type</td>
                                            <td><strong>At Owner Risk</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Package Type</td>
                                            <td colspan="2"><strong><?= $this->function_library->FindFreightMethod($itemdetails->item_method_of_pack_fk);?></strong></td>
                                            <td>Content Type</td>
                                            <td colspan="2"><strong><?= $this->function_library->FindItemDetails($itemdetails->item_name_fk)->item_name;?></strong></td>
                                            <td>Policy Name & No.</td>
                                            <td><strong>test 12345</strong></td>
                                        </tr>
                                        <tr>
                                            <td>PO. NO.</td>
                                            <td colspan="2"><strong><?= $booking_gr->container_number?>N/A</strong></td>
                                            <td>Shipment No.</td>
                                            <td colspan="2"><strong><?= $booking_gr->container_number?>N/A</strong></td>
                                            <td>Declared Value</td>
                                            <td><strong>As Per Invoice Value</strong></td>
                                        </tr>
                                        <tr>
                                            <td>No. Of Pkgs.</td>
                                            <td colspan="2"><strong><?= $itemdetails->item_qty;?></strong></td>
                                            <td>Actual Weight</td>
                                            <td colspan="2"><strong><?= $itemdetails->item_weight;?></strong></td>
                                            <td>Gross Weight</td>
                                            <td><strong><?= $itemdetails->item_weight_ch;?></strong></td>
                                        </tr>
                                    </table>
                                    <table width="100%">
                                        <tr>
                                            <td><strong>RATE</strong></td>
                                            <td><strong>Freight Rate</strong></td>
                                            <td><strong>Green Tax</strong></td>
                                            <td><strong>Detention Ch.</strong></td>
                                            <td><strong>POD Ch.</strong></td>
                                            <td><strong>CGST</strong></td>
                                            <td><strong>SGST</strong></td>
                                            <td><strong>IGST</strong></td>
                                            <td><strong>Advance</strong></td>
                                            <td><strong>Grand Total</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Amount</strong></td>
                                            <td><strong><?= $booking_gr->item_booking_freight_rate;?></strong></td>
                                            <td><strong><?= $booking_gr->other_ch;?></strong></td>
                                            <td><strong><?= $booking_gr->item_detention_ch;?></strong></td>
                                            <td><strong><?= $booking_gr->item_crossing_ch;?></strong></td>
                                            <td><strong><?= $booking_gr->item_crossing_ch;?>N/A</strong></td>
                                            <td><strong><?= $booking_gr->item_crossing_ch;?>N/A</strong></td>
                                            <td><strong><?= $booking_gr->item_crossing_ch;?>N/A</strong></td>
                                            <td><strong><?= $booking_gr->item_crossing_ch;?>N/A</strong></td>
                                            <td><strong><?= $booking_gr->s_total_freight;?></strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Invoice No./Invoice Date</td>
                                            <td colspan="7"><strong><?= $booking_gr->invoice_no.'/'.$booking_gr->invoice_date;?></strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Remakrs/Special Instructions</td>
                                            <td colspan="7"><strong><?= $booking_gr->item_remarks;?></strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Supervisior Name</td>
                                            <td colspan="3"> </td>
                                            <td colspan="2">Sign. Consignor</td>
                                            <td colspan="3"> </td>
                                        </tr>
                                    </table>




                                    <table width="100%" style="border:none;" table-border="none">
                                        <tr>
                                            <td width="100%" style="font-size: 11px;"> <br>
                                            <strong style="font-size: 14px;">Terms & Conditions:- </strong>
                                            <br> 1. The Truck Owner/Truck Driver does not take any responsibility for leakage, rainwater, shortage, breakage & the sender is responsibility for proper packing.<br>
                                                2. Fresh fruits are carried at the absulute risk and responsibility of the sender <br>
                                                3. The Truck Owner/Truck Driver will send the goods at the earliest opportunity in onelot or in partsacording to the convenience <br>
                                                4. The Goods will be delivered against Payment of all charges to the consignee. <br>
                                                5. The Goods will be delivered at the destination only unless other wise settled. <br>
                                                6. The delivery of goods will be taken with in 3 days after arrival at the destination failing which demurrage @Rs-1/per Quintal per day will be charged extra <br>
                                                7. The Truck Owner/Truck Driver takes Absolutely no responsibility for delay or losser in transit due to breakdown of the vehicle enroute and for the consequences there of. <br>
                                                8. When once the delivery is givin no claim will be entertained after 7 days that on any account. <br>
                                                9. If the goods are wrongly possess by the octroi or custum people we will not be responsible to that effect of claim if any. <br>
                                                10. The Truck Owner/Truck Driver is not responsible for illegal business of consignor. <br>
                                                11. All disputes which can be settled amicably will have resource to the court of law at Ghaziabad only. <br>
                                                12. The Consignor/Consignee will be responsible for all consequences arising due to any false decleration
                                                13. If the consignee does not take delivery within three months the company reserves the right of putting the same in public auction for the differance or shortages, company can recoveer from the sender <br>
                                                14. If the octroi department, sales tax, central excise, custom or income tax department of any other government body declare the goods as illegal the beoparii and consignee will be fully responsible for all claims along with our damage charges. <br>
                                                
                                            <br>
                                           <div style="font-size: 14px;">
                                                Dear Customer, <br>

                                                Please do not unload the vehicle if you have not received excise gatepass no. kindly contact our nearest  branch on tel. no mention along side.

                                           </div>
                                           <div>
                                            <h4 style="text-align: center; font-size:14px;">Receipt Details</h4>
                                            <p style="font-size: 14px;">
                                                Sr. No. ......................... Truck No. ...................................... Date of Receipt ............................. Date of Unloading........................... <br>
                                                <br>
                                                Remarks.....................................................................................................................................
                                            </p>
                                           </div>
                         
                                           </td>
                                        </tr>
                                        <br>
                                        <tr>
                                                    <td style="text-align: right;">Stamp & Signature</td>
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