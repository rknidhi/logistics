<html>
    <head>
        <meta charset="UTF-8">
        <title>Billing</title>
        <style>
            @page { size: auto;  margin: 20px; }
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
                border: 1px solid #333;
                text-align: left;
                font-weight: normal;
                padding-left: 5px;
            }
            th, td {
            }
            .printLogo img{
                max-width: 200px;
                max-height: 100px;
                padding: 5px;
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
                                            <td><div class="printLogo"><img src="<?= $base_url ?>assets/images/logo-text.png" alt="image" ></div></td>
                                            <td id="spaceaddress">
                                                <div style="float:left">
                                                    <p> Mobile : <?= $this->config->item('company_mobile') ?><br>
                                                        Phone No : <?= $this->config->item('company_phone') ?><br>
                                                    </p>
                                                </div>
                                                <div style="float:right; margin-right:5px;">
                                                    <p>GSTIN : <?= $this->config->item('company_gstin') ?><br>
                                                        PAN : <?= $this->config->item('company_pan') ?></p>
                                                </div>
                                                <div class="clearfix"></div>
                                            </td>   
                                        </tr>
                                    </table>

                                    <table width="100%">
                                        <tr>
                                            <td  height="30" style="text-align: center;">
                                                <p>Address: <?= $this->config->item('company_address') ?><br>
                                                Email-Id: <?= $this->config->item('company_email1') ?>, <?= $this->config->item('company_email2') ?> Website: <?= $this->config->item('company_website') ?></p>
                                            </td>
                                        </tr>
                                    </table>

                                    <table width="100%">
                                        <tr>
                                            <td height="30"><strong>Invoice No: </strong><?= $billing->invoice_no ?></td>
                                            <td height="30"><strong>Invoice Date : </strong><?= convertToHumanDate($billing->invoice_date) ?></td>
                                            <!--<td height="30"><strong>PO No : </strong><?= $billing->po_number ?></td>
                                            <td height="30"><strong>Po. Date : </strong><?= convertToHumanDate($billing->po_date) ?></td>-->
                                        </tr>
                                    </table>

                                    <?php
                                    $party_details = $this->db->where('party_id', $billing->bill_to_id)->get('tbl_master_party')->row();
                                    ?>
                                    <table width="100%">
                                        <tr>
                                            <td height="30"><strong>Billing To : </strong>  <?= $party_details->party_name ?></td>
                                        </tr>
                                        <tr>
                                            <td height="30"><strong>Address : </strong> <?= $party_details->address ?></td>
                                        </tr>

                                        <tr>
                                            <td height="30"><strong>Services : </strong> Transportation/Goods Delivery Charges </td>
                                        </tr>
                                        <tr>
                                            <td height="30"><strong>GSTN :</strong> <?= $party_details->gst_no ?></td>
                                        </tr>
                                    </table>

                                    <table width="100%" border="1">
                                        <tr>
                                            <th>Sr No.</th>
                                            <th align="center">Description</th>
                                            <th>Billing Date</th>
                                            <th>Weight/Size</th>
                                            <th>Vehicle Rate</th>
                                            <th>Loading Chr.</th>
                                            <th>Unloading Chr.</th>
                                            <th>Detention Chr.</th>
                                            <!--<th>Border Exp</th>
                                            <th>St. Chr.</th>-->
                                            <th>Subtotal</th>
                                            <th>CGST %</th>
                                            <th>SGST %</th>
                                            <th>Total</th>
                                        </tr>
                                        <?php
                                        $sn = 1;
                                        $gr_nos = explode(',', $billing->gr_nos);
                                        $total_rate = 0;
                                        foreach ($gr_nos as $gr_no) {
                                            $gr_detail = $this->functions->get_single_row('fresh_booking_gr', 'bgr_id', $gr_no);
                                            ?>
                                            <tr height="30">
                                                <td><?= $sn; ?></td>
                                                <td><?= $gr_detail->description ?></td>
                                                <td width="10%"><?= convertToHumanDate($billing->invoice_date) ?></td>
                                                <td width="10%">
                                                    <?= $gr_detail->weight_size ?></td>
                                                <td><?= $gr_detail->bill_vehicle_rate ?></td>
                                                <td><?= $gr_detail->bill_loading_chr ?></td>
                                                <td><?= $gr_detail->bill_unloading_chr ?></td>
                                                <td><?= $gr_detail->bill_detention_chr ?></td>
                                                <!--<td><?= $gr_detail->bill_border_exp ?></td>
                                                <td><?= $gr_detail->bill_st_chr ?></td>-->
                                                <td><?= $gr_detail->bill_sub_total ?></td>
                                                <td><?= $gr_detail->bill_cgst ?></td>
                                                <td><?= $gr_detail->bill_sgst ?></td>
                                                <td><?= $gr_detail->bill_total ?></td>
                                                
                                            </tr>
                                            <?php
                                            $total_rate += $gr_detail->bill_total;
                                            $sn++;
                                        }
                                        ?>

                                        <tr height="40">
                                            <td colspan="12">
                                                <strong>HSN Code : </strong><?= $billing->hsn_code ?><br />
                                                <strong>Category Tax of Services : </strong> Tax Paid By <?php //echo ucfirst($gr_detail->tax_payable_by); ?>Not Confirmed<br />
                                            </td>
                                        </tr>
                                        <tr height="40">
                                            <td colspan="8"><strong>Amount In Words (INR) : <?= ucwords(no_to_words($total_rate)) ?></strong> </td>
                                            <td colspan="2"><strong>Total amt: </strong></td>
                                            <td colspan="2"><strong>Rs. <?= $total_rate ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><strong>Encl : </strong></td>
                                            <td colspan="6"><strong>Sign Ack of Consignment</strong></td>
                                            <td colspan="4">
                                                <strong>DECLARTION FOR CENVAT CREDIT</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Note : </td>
                                            <td colspan="6">
                                                <p>1.All Dispute Subject to Noida Jursdiction only</p>
                                                <p>2.If payment note made with in due course @24%P.A will be charge.</p>
                                                <p>3.Please Pay Cross A/C Cheque Only*</p>
                                            </td>
                                            <td colspan="4">
                                            <p>We here by Certify that you not avail credit of duty paid on input or capital good under provision of carvat credit rule-2004.</p>
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="100%">

                                        
                                        <tr height="20">
                                            <td colspan="3"></td>
                                        </tr>

                                        <tr height="50">
                                            <td style="border:none !important ;">Cheque By :</td>
                                            <td style="border:none !important; text-align: center" colspan="2" valign="top">
                                                <span style="padding-left: 150px;"><strong>For <?php  echo $this->config->item('company_name'); ?> </strong><br /><br /><br /><br /><br /><br /></span>
                                                <span style="padding-left: 150px;"><strong>Accountant</strong></span>
                                            </td>
                                        </tr>  
                                        <tr>
                                            <td style="text-align: center;" colspan="3">Transfer Your Product With Care</td>
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
