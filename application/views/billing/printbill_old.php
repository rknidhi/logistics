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
                                        <tr >
                                            
                                            <td style="text-align: center;"><strong> PAN NO. AHRPB7668K <br> GSTIN. 09AHRPB7668K1ZK </strong></td>
                                            <td style="text-align: center;"> <span style="font-size:20px; font-weight:bold;">BILL</span> <br> Subject to Ghaziabad Jurisdiction Only</td>
                                            <td style="text-align: center;"> <strong> Mobile: 9871254890 <br>Phone: 9350530149 </strong></td>
                                            
                                            
                                        </tr>
                                        <tr>
                                           <td rowspan="4" width="26%"><div style="text-align: center;" ><span> <strong>!! जय माता दी !!</strong></span><br></div><div class="printLogo"><img src="<?= $base_url ?>assets/images/maa.jpg" alt="image"> <span class="komal">KOMAL'S</span></div></td>
                                            
                                        <td colspan="3">
                                            <div class="printLogo1">
                                                <img src="<?= $base_url ?>assets/images/logo.png" alt="image"> <br>
                                                <span class="fleet"> FLEET OWNERS & TRANSPORT CONTRACTORS </span> <br>
                                                <span> <strong> 1232, First Floor, Lal Kuan, B.S. Road, Opp. K.L. Steel, Ghaziabad (U.P.)</strong> </span>
                                            </div>
                                        </td>

                                        </tr>
                                        
                                    </table>
                               
                                    <?php
                                    $party_details = $this->db->where('party_id', $billing->bill_to_id)->get('tbl_master_party')->row();
                                    ?>
                                    <table width="100%">
                                        <tr>
                                            <td height="30"><strong>Billing To : M/s. </strong>  <?= $party_details->party_name ?></td>
                                            <td height="30"><strong>Bill No: </strong><?= $billing->invoice_no ?></td>
                                            
                                            <!--<td height="30"><strong>PO No : </strong><?= $billing->po_number ?></td>
                                            <td height="30"><strong>Po. Date : </strong><?= convertToHumanDate($billing->po_date) ?></td>-->
                                        </tr>
                                        <tr>
                                            <td height="30"><strong>Address : </strong> <?= $party_details->address ?></td>
                                            <td height="30"><strong>Dated : </strong><?= convertToHumanDate($billing->invoice_date) ?></td>
                                        </tr>
                                        <tr>
                                            <td height="30"><strong>GSTN :</strong> <?= $party_details->gst_no ?></td>
                                            <td height="30"><strong>Services : </strong> Transportation Charges </td>
                                        </tr>
                                    </table>

                                   
                                    <table width="100%">
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Date</th>
                                            <th>G.R.No.</th>
                                            
                                            <th>Vehicle No.</th>
                                            <th>Destination</th>
                                            
                                            <th>Your Inv No.</th>
                                            <th>Slip No.</th>
                                            
                                            <th>Freight</th>
                                            <th>Labour</th>
                                            <th>Halting</th>
                                            <th width="110px">Total Amount &#8377;</th>
                                           
                                            
                                        </tr>
                                       
                                        <?php
                                        $sn = 1;
                                        $gr_nos = explode(',', $billing->gr_nos);
                                        $total_rate = 0;
                                        foreach ($gr_nos as $gr_no) {
                                            $gr_detail = $this->functions->get_single_row('booking_gr', 'bgr_id', $gr_no);

                                            // Display single gr item details
                                            $gr_items = $this->functions->get_all_row_id_based('tbl_gr_items', 'bgr_id', $gr_detail->bgr_id); 
                                            $gr_item_count = $this->functions->get_num_rows('tbl_gr_items', 'bgr_id', $gr_detail->bgr_id); 
                                            // End                                            
                                            ?>
                                            <tr height="30">
                                                <td><?= $sn; ?></td>
                                                <td width="10%"><?= convertToHumanDate($gr_detail->gr_date) ?></td>
                                                <td><?= $gr_detail->bgr_id ?></td>
                                                
                                                <td width="12%"><?= $this->function_library->FindVehicle($gr_detail->vehicle_id_fk) ?></td>
                                                <td width="12%"><?= $this->function_library->FindStation($gr_detail->to_station_fk); ?></td>
                                               
                                                <td><?php echo $gr_detail->invoice_no;?></td>
                                                <td><?php echo $gr_detail->bill_slip_no;?></td>
                                                <td><?= $gr_detail->bill_vehicle_rate ?>/-</td>
                                                <td><?= $gr_detail->other_ch ?>/-</td>
                                                <td><?= $gr_detail->item_detention_ch ?>/-</td>
                                                <td><?= $gr_detail->bill_total ?>/-</td>
                                                
                                            </tr>
                                            <?php
                                            $total_rate += $gr_detail->bill_total;
                                            $sn++;
                                        }
                                        ?>

                                        <!--<tr height="40">
                                            <td colspan="186">
                                                <strong>HSN Code : </strong><?= $billing->hsn_code ?><br />
                                                <strong>Category Tax of Services : </strong> Tax Paid By <?= ucfirst($gr_detail->tax_payable_by) ?><br />
                                            </td>
                                        </tr>-->
                                        <tr height="40">
                                            <td colspan="7"><strong>Amount In Words (INR) :  <?= ucwords(no_to_words($total_rate)) ?></strong></td>
                                            <td colspan="2"><strong>Grant Total: </strong></td>
                                            <td colspan="2"><strong>Rs. <?= $total_rate ?>/-</strong></td>
                                        </tr>
                                       
                                    </table>
                                    <table width="100%">


                                        <tr>
                                            <td style="border:none !important ;"><br>E & O.E. :<br /><br></td>
                                            <td style="border:none !important; text-align: center" colspan="2">
                                                <span style="padding-left: 150px;"><strong>For <?php  echo $this->config->item('company_name'); ?> </strong><br /></span>
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
