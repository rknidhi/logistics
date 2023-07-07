<html>
    <head>
        <meta charset="UTF-8">
        <title>Settlement Report</title>
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
                                            <td style="text-align: center;"> <span style="font-size:20px; font-weight:bold;"> <u>Settlement Slip</u> </span></td>
                                            <td style="text-align: right; padding-right:5px;"> <strong> Mobile: +91 9311469585<br>Phone: +91 9582341118  </strong></td>
                                            
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
                                    $driver_details = $this->function_library->FindDriverDetails($settlement->driver_id_fk);

                                    ?>
                                    <table width="100%" class="partytable">
                                        <tr>
                                            <td height="30"><strong>Driver Name: </strong> <?php echo $driver_details->name;?></td>
                                            <td height="30"><strong>Settlement No.: </strong><?php echo $settlement->settle_number;?></td>
                                        </tr>
                                        <tr>
                                            <td height="30"><strong>Licence No.: </strong> <?php echo $driver_details->name;?></td>
                                            <td height="30"><strong>Settlement Date: </strong><?php echo $settlement->settle_date;?></td>
                                        </tr>
                                        <tr>
                                            <td height="30"><strong>Licence Valid:</strong> <?php echo $driver_details->valid_up_to;?> </td>
                                            <td height="30"><strong>Gross Salary: </strong> <?php echo $settlement->gross_salary;?></td>
                                        </tr>
                                        <tr>
                                            <td height="30"><strong></strong> </td>
                                            <td height="30"><strong>Duty : </strong> <?php echo $settlement->duty;?> /Days</td>
                                        </tr>

                                       
                                    </table>

                                    <table width="100%" border="1">
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Date</th>
                                            <th>Vehicle No.</th>
                                            <th>Destination</th>
                                            <th>Freight</th>
                                            <th>Advance</th>
                                            <th>Green Tax</th>
                                            <th>Toll Tax</th>
                                            <th>Legal</th>
                                            <th>Dala</th>
                                            <th>Diesel</th>
                                            <th>Maintenance</th>
                                            <th>Balance</th>                                            
                                        </tr>
                                        <?php
                                        $sn = 1;
                                        $famount=$advamount=$greenamount=$tolamount=$legamount=$dalaamount=$diesamount=$mainamount=$balamount=0;
                                            foreach ($settlement_history as $key => $value) {
                                            ?>
                                            <tr height="30">
                                                <td><?php echo $sn; ?></td>                                                
                                                <td><?php echo convertToHumanDate($value->settle_date); ?></td>
                                                <td><?php echo $this->function_library->FindVehicle1($value->vechile_id_fk); ?></td>
                                                <td><?php echo $value->settle_destination; ?></td>
                                                <td><?php echo $value->settle_freight; ?></td>
                                                <td><?php echo $value->settle_advance; ?></td>
                                                <td><?php echo $value->settle_green_tax; ?></td>
                                                <td><?php echo $value->settle_tol_tax; ?></td>
                                                <td><?php echo $value->settle_legal; ?></td>
                                                <td><?php echo $value->settle_dala; ?></td>
                                                <td><?php echo $value->settle_diesel; ?></td>
                                                <td><?php echo $value->settle_maintanence; ?></td>
                                                <td><?php echo $value->settle_balance; ?></td>
                                            </tr>
                                            <?php
                                            $sn++;
                                        $famount+=$value->settle_freight;
                                        $advamount+=$value->settle_advance;
                                        $greenamount+=$value->settle_green_tax;
                                        $tolamount+=$value->settle_tol_tax;
                                        $legamount+=$value->settle_legal;
                                        $dalaamount+=$value->settle_dala;
                                        $diesamount+=$value->settle_diesel;
                                        $mainamount+=$value->settle_maintanence;
                                        $balamount+=$value->settle_balance;                                            
                                            }
                                        ?>

                                        <tr height="40">
                                            <td colspan="4" style="text-align: center;"><strong >Total: </strong></td>
                                            <td ><strong> <?php echo $famount;?>/-</strong></td>
                                            <td ><strong><?php echo $advamount;?>/- </strong></td>
                                            <td ><strong><?php echo $greenamount;?>/- </strong></td>
                                            <td ><strong><?php echo $tolamount;?>/- </strong></td>
                                            <td ><strong><?php echo $legamount;?>/- </strong></td>
                                            <td ><strong><?php echo $dalaamount;?>/- </strong></td>
                                            <td ><strong><?php echo $diesamount;?>/- </strong></td>
                                            <td ><strong><?php echo $mainamount;?>/-</strong></td>
                                            <td ><strong><?php echo $balamount;?>/-</strong></td>
                                        </tr>
                                        <tr height="40">
                                            <td colspan="9"><strong></strong></td>
                                            <td colspan="3"><strong>Net Payable Salary: </strong></td>
                                            <td><strong style="font-size: 18px;">&#8377; test/-</strong></td>
                                        </tr>
                                        <tr height="40">
                                            <td colspan="9"><strong></strong></td>
                                            <td colspan="3"><strong>Previous: </strong></td>
                                            <td><strong style="font-size: 18px;">&#8377; <?php echo $settlement->previous;?>/-</strong></td>
                                        </tr>
                                        <tr height="40">
                                            <td colspan="9"><strong>Rupees In Words (INR) :  <?php echo ucwords(no_to_words($settlement->grand_total)) ?></strong></td>
                                            <td colspan="3"><strong>Total Invoice Value: </strong></td>
                                            <td><strong style="font-size: 18px;">&#8377; <?php echo $settlement->grand_total; ?>/-</strong></td>
                                        </tr>
                                        
                                    </table>
                                    <table width="100%">


<tr>
    <td style="text-align: left;" >
    <br>
    <br>
    <br>
        <span><strong>Employee's Signature</strong></span><br />
    </td>
    <td style="border:none !important; text-align: right;" valign="top">
    <br>
    <br>
    <br>
        <span><strong>Employer's Signature</strong></span><br />
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
