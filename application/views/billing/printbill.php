<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <title>Billing</title>
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
            }
            .printLogo {
               
                text-align: center;
                position: relative;
                background: #000;
                margin: 5px 50px;
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
                line-height: 5px;
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
            .partytable tr td{
                width: 50%;
            }
            body {
  -webkit-print-color-adjust: exact !important;
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
            }
            .printLogo {
               
                text-align: center;
                position: relative;
                background: #000;
                margin: 5px 50px;
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
            .partytable tr td{
                width: 50%;
            }

            }
        </style>
    </head>
    <body onload="window.print()">
        <div id="main-wrapper">
            <div class="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">

                                    <table width="100%">
                                        <tr>
                                            
                                            <td style="text-align: left;"><strong> GSTIN. 09AHRPB7668K1ZK <br> PAN NO. AHRPB7668K  </strong></td>
                                            <td style="text-align: center;"> <span style="font-size:20px; font-weight:bold;"> <u>TAX INVOICE</u> </span></td>
                                            <td style="text-align: right; padding-right:5px;"> <strong> Mobile: +91 9311469585<br>Phone: +91 9582341118 </strong></td>
                                            
                                        </tr>
                                        <tr>
                                            
                                        <td colspan="3">
                                            <div class="printLogo1">
                                     
                                  
                                                <h1>Skytech Cargo & Logistics</h1>
                                                <p> 1232, First Floor, Lal Kuan, B.S. Road, Opp. K.L. Steel, Ghaziabad (U.P.) </p>
                                                <p> <strong> Email: sktechcargo@gmail.com </strong> </p>

                                            </div>
                                        </td>

                                        </tr>
                                        
                                    </table>
                                    <?php
                                    $party_details = $this->db->where('party_id', $billing->bill_to_id)->get('tbl_master_party')->row();
                                        ?>
                                    <table width="100%" class="partytable">
                                        <tr>
                                            <td height="30"><strong>Party Details: M/s. </strong>  <?= $party_details->party_name ?></td>
                                            <td height="30"><strong>Invoice No: </strong><?= $billing->invoice_no ?></td>
                                            
                                            <!--<td height="30"><strong>PO No : </strong><?= $billing->po_number ?></td>
                                            <td height="30"><strong>Po. Date : </strong><?= convertToHumanDate($billing->po_date) ?></td>-->
                                        </tr>
                                        <tr>
                                            <td height="30"><strong>Address : </strong> <?= $party_details->address ?></td>
                                            <td height="30"><strong>Date : </strong><?= convertToHumanDate($billing->invoice_date) ?></td>
                                        </tr>
                                        <tr>
                                            <td height="30"><strong>GSTIN :</strong> <?= $party_details->gst_no ?></td>
                                            <td height="30"><strong>Nature of Service : </strong> Transportation Of Goods By Road </td>
                                        </tr>
                                        <tr>
                                            <td height="30"><strong>CIN No. :</strong> test cin</td>
                                            <td height="30"><strong>GST Paid By : </strong> Company </td>
                                        </tr>
                                        <tr>
                                            <td height="30"><strong>State Code:</strong> test code</td>
                                            <td height="30"><strong>GST On Reverce Charged : </strong> No </td>
                                        </tr>
                                       
                                    </table>

                                   
                                    <table width="100%">
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Date</th>
                                            <th>G.R.No.</th>
                                            
                                            <th>Lorry No.</th>
                                            <th>Destination</th>
                                            
                                            <th>Weight</th>
                                            
                                            <th>Freight</th>
                                            <th>Green Tax</th>
                                            <th>Advance</th>
                                            <th width="110px">Amount &#8377;</th>
                                           
                                        </tr>
                                       
                                        <?php
                                        $sn = 1;
                                        $gr_nos = explode(',', $billing->gr_nos);
                                        $total_rate = 0;
                                        $green_total =0;
                                        $freght_total =0;
                                        $advace =0;
                                        $subtotal =0;
                                        $gtotal = 0;
                                        foreach ($gr_nos as $gr_no) {
                                            $gr_detail = $this->functions->get_single_row('settlement_gr', 'sgr_id', $gr_no);

                                            $frg = $gr_detail->settle_freight;
                                            $grt = $gr_detail->settle_green_tax;
                                            $adv = $gr_detail->settle_advance;
                                            $total = $frg+$grt-$adv; 
                                            ?>
                                            <tr height="30">
                                                <td><?= $sn; ?></td>
                                                <td width="10%"><?= convertToHumanDate($gr_detail->gr_date) ?></td>
                                                <td><?= $gr_detail->sgr_id ?></td>
                                                
                                                <td width="12%"><?= $this->function_library->FindVehicle1($gr_detail->vehicle_id_fk) ?></td>
                                                <td width="12%"><?= $this->function_library->FindStation($gr_detail->from_station_fk); ?> To <?= $this->function_library->FindStation($gr_detail->to_station_fk); ?></td>
                                               
                                                <td><?php echo $gr_detail->sky_freight_weight;?></td>
                                                <td><?= $frg ?>/-</td>
                                                <td><?= $grt ?>/-</td>
                                                <td><?= $adv ?>/-</td>
                                                <td><?= $total ?>/-</td>
                                                
                                            </tr>
                                            <?php
                                            $green_total +=$grt;
                                            $freght_total +=$frg;
                                            $advace +=$adv;
                                            $subtotal +=$total;
                                            $gtotal += $subtotal;
                                            $sn++;
                                        }
                                        ?>

                                        <tr height="40">
                                            <td colspan="5"></td>
                                            <td ><strong>Total: </strong></td>
                                            <td ><strong> <?= $freght_total ?>/-</strong></td>
                                            <td ><strong><?=$green_total?>/- </strong></td>
                                            <td ><strong><?=$advace?>/- </strong></td>
                                            <td ><strong><?= $subtotal ?>/-</strong></td>
                                        </tr>
                                        <tr height="40">
                                            <td colspan="7"><strong>Amount In Words (INR) :  <?= ucwords(no_to_words($gtotal)) ?></strong></td>
                                            <td colspan="2"><strong>Total Invoice Value: </strong></td>
                                            <td colspan="2"><strong style="font-size: 18px;">&#8377; <?= $gtotal ?>/-</strong></td>
                                        </tr>
                                       
                                    </table>
                                    <table width="100%">


                                        <tr>
                                            <td ><strong><u>Terms & Conditions:</u></strong>
                                                <ul>
                                                    <li>Note: All Disputes Subject to Ghaziabad Jurisdiction only.</li>
                                                    <li>Interest @18% p.a will be charged if the payment is not made with in the stipulated time.</li>
                                                    <li>Payment: Pay by A/C payee cheque in favour of Skytech Cargo & Logistics only.</li>
                                                </ul>
                                            </td>
                                            <td style="border:none !important; text-align: left; width:35%;" valign="top">
                                                <span><strong>For <?php  echo $this->config->item('company_name'); ?></strong><br /><br /><br /><br /></span>
                                                <span><strong>Authorised Signatory</strong></span><br />
                                            </td>
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
