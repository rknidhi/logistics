<?php
$consigner = $this->function_library->FindPartyDetails($booking_gr->consignor_id_fk);
$consignee = $this->function_library->FindPartyDetails($booking_gr->consignee_id_fk);
?>
<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $this->config->item('title_prefix'); ?> : View GR</title>
        <style>
            body {
                -webkit-print-color-adjust: exact !important;
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
                padding-left: 5px;
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
            @media print {
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
                padding-left: 5px;
                border: 1px solid #333;
            }
            th, td {
                font-size:12px;
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
                                        <tr >
                                            <td rowspan="4" width="15%"><div style="text-align: center;" ><span> <strong>!! जय माता दी !!</strong></span><br></div><div class="printLogo"><img src="<?= $base_url ?>assets/images/maa.jpg" alt="image"> <span class="komal">KOMAL'S</span></div></td>
                                            <td style="text-align: center;"><strong> 9871254890 <br> 9350530149 </strong></td>
                                            <td style="text-align: center;"> Subject to Ghaziabad Jurisdiction Only</td>
                                            <td style="text-align: center;"> <strong> 7011618843 <br> 7678378747 </strong></td>
                                            <td width="30%" rowspan="2">
                                                  We are not responsible for Leakage & Breakage, Beopari is responsible for illegal Goods, Octroi, Toll Tax & GST,
                                                This G/C Note is issued subject to the Terms & Conditions printed below.
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                        <td colspan="3" rowspan="3">
                                            <div class="printLogo1">
                                                <img src="<?= $base_url ?>assets/images/logo.png" alt="image"> <br>
                                                <span class="fleet"> FLEET OWNERS & TRANSPORT CONTRACTORS </span> <br>
                                                <span> <strong> 1232, First Floor, Lal Kuan, B.S. Road, Opp. K.L. Steel, Ghaziabad (U.P.)</strong> </span>
                                            </div>
                                        </td>


                                        </tr>
                                        <tr>
                                        <td width="30%" style="color:#dd0407; font-size:13px; text-align:left;">  <span class="mybox"></span><span> CONSIGNOR COPY</span><span class="mybox"></span><span> DRIVER COPY</span> <br> <span class="mybox"></span><span> CONSIGNEE COPY</span><span class="mybox"></span><span> RECORDS COPY</span></td>

                                        </tr>
                                        <tr>
                                        <td style="width: 30%; text-align:left;">
                                                            <strong style="font-size: 18px; color:#dd0407; ">GR. No. :   <span style="color:black;font-size:20px;"><?= $booking_gr->bgr_id ?></span> </strong>
                                            </td>
                                        </tr>
                                        
                                    </table>
                                    <table width="100%">
                                        <tr class="pan">
                                            <td> PAN NO. AHRPB7668K </td>
                                            <td colspan="2" style="color: #dd0407;"> CONSIGNMENT NOTE AT OWNER'S RISK </td>
                                            <td> GSTIN. 09AHRPB7668K1ZK </td>
                                            
                                            <td style="width: 30%; text-align:left;">
                                                            <strong style="font-size: 18px; color:#dd0407">Dated :  <span style="color:black;"> <?= date_only_format($booking_gr->gr_date) ?></span>
                                                        </td>
                                        </tr>
                                    </table>


                                    <table width="100%">
                                        <tr>
                                            <td width="70%" valign='top'>
                                                <table width="100%">
                                                    <!-- <tr>
                                                        <td><strong>Delivery From</strong></td>
                                                        <td><?= $this->function_library->FindStation($booking_gr->from_station_fk) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Vehicle No</strong></td>
                                                        <td><?= $this->function_library->FindVehicle($booking_gr->vehicle_id_fk) ?></td>
                                                    </tr> -->
                                                    <!-- <tr>
                                                        <td><strong>Permit No.</strong></td>
                                                        <td>xxxxxx</td>
                                                    </tr> -->

                                                    <tr>
                                                        <td><strong>Consignor's Name And Address</strong></td>
                                                        <td style="font-size: 16px;font-weight:bold;"><?= $consigner->party_name ?> <br /><?= $consigner->address ?></td>
                                                    <tr>
                                                    <tr>    
                                                        <td><strong>Consignor's GST No.</strong></td>
                                                        <td ><?= $consigner->gst_no ?></td>
                                                    </tr>
                                                    <!-- <tr>    
                                                        <td><strong>Consignor's CST/TIN No.</strong></td>
                                                        <td><?= $consigner->tin_no ?></td>
                                                    </tr> -->
                                                    
                                                    <tr>
                                                        <td><strong>Consignee's Name And Address</strong></td>
                                                        <td style="font-size: 16px;font-weight:bold;"><?= $consignee->party_name ?> <br /><?= $consignee->address ?></td>
                                                    <tr>
                                                    <tr>    
                                                        <td><strong>Consignee's GST No.</strong></td>
                                                        <td><?= $consignee->gst_no ?></td>
                                                    </tr>
                                                    <!-- <tr>    
                                                        <td><strong>Consignee's CST/TIN No.</strong></td>
                                                        <td><?= $consignee->tin_no ?></td>
                                                    </tr> -->
                                                   
                                                    <tr>
                                                        <td colspan="2" style=" padding: 0px;">
                                                            <table width="100%">
                                                                <tr>
                                                                    <th><strong>No. Of Pkgs.</strong></th>
                                                                    <th><strong>DESCRIPTION (said to contain)</strong></th>
                                                                    <th><strong>Weight in Kg.</strong></th>
                                                                    <th><strong>RATE</strong></th>
                                                                    <th><strong>FREIGHT &#8377;</strong></th>
                                                                    
                                                                </tr>
                                                                <?php
                                                                foreach($bgr_items as $grItem){

                                                                
                                                                ?>
                                                                <tr style="height: 30px;">
                                                                    <td><?= $grItem->item_qty ?></td>
                                                                   
                                                                    <td><?php
                                                                    // echo $grItem->item_name_fk;
                                                                    //echo $this->function_library->FindItemDetails($grItem->item_name_fk)->item_name
                                                                    ?></td>
                                                                    
                                                                    <td><?= $grItem->item_weight ?></td>
                                                                    <td>Rs.<?= $grItem->item_weight_ch ?>/Kg</td>
                                                                    <td><strong></strong> </td>
                                                                    
                                                                </tr>
                                                               
                                                                <?php
                                                                }
                                                                ?>
                                                                
                                                            </table>
                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                </table>
                                                <table width="100%">
                                                    <tr>
                                                        <td>Benifit on Notification No. S.T. not invalid no. convert credit on input services taken</td>
                                                        <td style="font-size: 18px;"><strong>Total &#8377;</strong> </td>
                                                        <td style="font-size: 18px;"> <strong><?= $booking_gr->s_total_freight?>/-</strong> </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>MODE OF PAYMENT</strong></td>
                                                        <td colspan="2"><?= $booking_gr->gr_type ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>DELIVERY AT</strong></td>
                                                        <td colspan="2"><?= $booking_gr->delivery ?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="30%" >
                                                <table width="100%" class="grtable">
                                                <?php 
                                                $cons_mobil = $this->function_library->FindPartyDetails($booking_gr->consignee_id_fk); 
                                                ?>
                                                    <tr>
                                                        
                                                    </tr>
                                                    <tr>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td><strong>From : </strong> <?= $this->function_library->FindStation($booking_gr->from_station_fk) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>To : </strong> <?= $this->function_library->FindStation($booking_gr->to_station_fk) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Vehicle No:</strong> <?= $this->function_library->FindVehicle($booking_gr->vehicle_id_fk) ?></td>
                                                    </tr> 
                                                   <tr>
                                                        <td><strong>Driver Name:</strong> <?php echo $this->function_library->FindDriverDetails($booking_gr->driver_id_fk)->name ?></td>
                                                    </tr> 
                                                    <tr>
                                                        <td><strong>Driver Mobile No:</strong> <?php echo $this->function_library->FindDriverDetails($booking_gr->driver_id_fk)->mobile_no ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Invoice No: </strong> <?= $booking_gr->invoice_no ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong> Invoice Value: </strong> <?= $booking_gr->invoice_value ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;"><strong> E-WAY BILL NO. </strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="height: 20px;text-align: center;"><?= $booking_gr->e_way_bill_no ?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align: center;"><strong> Consignee Phone No. </strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="height: 20px;text-align: center;"> 
                                                        <?php
                                                         echo ($cons_mobil->phone_no!='')?$cons_mobil->phone_no:'Not Found';
                                                         ?> </td>
                                                    </tr>


                                                    
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                    <table width="100%">
                                        <tr >
                                            <td rowspan="2" width="70%" style="font-size: 10px;"> I/We the consignee of the goods declare that the above are according 
                                            to the declaration and are free of any control/restriction. <br>
                                            <strong>Terms & Conditions:- </strong> 1. Nature contents & value of consignment are unknone to the owner ofthe TRANSPORT CO. <br>
                                                2. The company shall not be responsible if the goods are detained, seized or confiscated by Govt. authorities. <br>
                                                3. Company does not taken any responsibility for leakage, breakage, sollage by sun, rain water or weather, sender is responsible for proper packing. <br>
                                                4. If there is any claim on account of the goods receipt, the same shall have to be made within 5 days falling which the same will be considered as null and void. <br>
                                                5. The company takes absolutely no responsibility for delays or losses due to accident, fire, communal riots, theft or any other cause beyond its control and due to breakdown of vehicle enroute or the consiquence therefore. <br>
                                                6. All disputes will be settled at ghaziabad court only. <br>
                                                7. If the difference is found in actual weight if comprared with G.R. the company will recover full charges at destination for actual plus 25% extra.<br>
                                                8. If the owner wants to get insured the goods against the accident, the company can make such insureance with the additional charge which will be mentioned on the G.R. <br>
                                                9. If by chance any loaded truck catches fire, the company shall not be responsible for that. <br>
                                                10. Company reserve the right to deliver the goods without G.R. to the party. if his name is mentioned in the consignee coloumn. The company will not be responsible for any re-booking consignment. <br>
                                            <strong>Beopari:- </strong> I have read all the terms & conditions of company at the time of Booking Goods. 
                                            </td>
                                            <td rowspan="2"><strong><span style="color:#dd0407;">For <?php  echo $this->config->item('company_name'); ?> </span></strong><br /><br /></td>
                                        </tr>
                                        <tr>
                                        
                                    </table>
                                    <table width="100%">
                                            <tr>
                                                    <td>Signature Of Beopari............................</td>
                                                    <td>Signature Of Driver ............................</td>
                                                    <td>Signature Of Booking Clerk ............................</td>
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