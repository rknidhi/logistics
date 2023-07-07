<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Print Voucher</title>
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
            .printLogo{
                text-align: center;
            }
            .printLogo img{
                max-width: 200px;
                max-height: 80px;
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
                                    <table width="100%" style="border:none;">
                                        <tr>
                                            <td colspan="4" class="printLogo"><img src="<?= $base_url ?>assets/images/logo-text.png" alt="image" ></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="printLogo"><p>this is company address</p></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="printLogo"><h1>Salary Slip</h1></td>
                                        </tr>
                                        <tr style="height:30px;">
                                            <td colspan="2" style="font-size:20px; text-align: center;"><strong>Employee Name </strong> <?= $emp_details->employee_name ?> </td>
                                            <td colspan="2" style="font-size:20px; text-align: center;"><?php // $voucher->voucher_type ?></td>
                                        </tr>
                                        <tr style="height:30px;">
                                            <td colspan="2" style="font-size:20px; text-align: center;"><strong>Designation </strong> <?= $emp_details->designation ?> </td>
                                            <td colspan="2" style="font-size:20px; text-align: center;"><?php // $voucher->voucher_type ?></td>
                                        </tr>
                                        <tr style="height:30px;">
                                            <td style="font-size:20px; text-align: center;"><strong>Month </strong> <?= $salary_sheet->month_year ?> </td>
                                            <td style="font-size:20px; text-align: center;"><?php // $voucher->voucher_type ?></td>
                                            <td style="font-size:20px; text-align: center;"><strong>Year </strong> <?php // $voucher->voucher_no ?> </td>
                                            <td style="font-size:20px; text-align: center;"><?php // $voucher->voucher_type ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style="height:60px;">
                                                
                                            </td>
                                        </tr>
                                        
                                    </table>
                                    <table width="100%" style="border:none;">
                                        
                                        <tr>
                                            <td style="font-size:20px; text-align: left;"><strong>Earnings </strong> <?php // $voucher->voucher_no ?> </td>
                                            <td style="font-size:20px; text-align: right;"><strong><?php // $voucher->voucher_type ?>  </strong></td>
                                            <td style="font-size:20px; text-align: left;"><strong>Deductions </strong> <?php // $voucher->voucher_no ?> </td>
                                            <td style="font-size:20px; text-align: right;"><strong><?php // $voucher->voucher_type ?>  </strong></td>
                                        </tr>
                                        <tr style="height:30px;">
                                            <td style="font-size:20px; text-align: left;">Basic & DA </td>
                                            <td style="font-size:20px; text-align: right;"><?= $salary_sheet->basic_salary ?></td>
                                            <td style="font-size:20px; text-align: left;">Provident Fund <?php // $voucher->voucher_no ?> </td>
                                            <td style="font-size:20px; text-align: right;"><?php // $voucher->voucher_type ?></td>
                                        </tr>
                                        <tr style="height:30px;">
                                            <td style="font-size:20px; text-align: left;">HRA <?php // $voucher->voucher_no ?> </td>
                                            <td style="font-size:20px; text-align: right;"><?php // $voucher->voucher_type ?></td>
                                            <td style="font-size:20px; text-align: left;">E.S.I. <?php // $voucher->voucher_no ?> </td>
                                            <td style="font-size:20px; text-align: right;"><?php // $voucher->voucher_type ?></td>
                                        </tr>
                                        <tr style="height:30px;">
                                            <td style="font-size:20px; text-align: left;">Conveyance <?php // $voucher->voucher_no ?><br><br><br></td>
                                            <td style="font-size:20px; text-align: right;"><?php // $voucher->voucher_type ?><br><br><br></td>
                                            <td style="font-size:20px; text-align: left;">Profession Tax <br> Absent Amount <?php // $voucher->voucher_no ?><br><br><br></td>
                                            <td style="font-size:20px; text-align: right;"><?php // $voucher->voucher_type ?></td>
                                        </tr>
                                        
                                        <tr style="height:30px;">
                                            <td style="font-size:20px; text-align: left;">Total Addition <?php // $voucher->voucher_no ?> </td>
                                            <td style="font-size:20px; text-align: right;"><?php // $voucher->voucher_type ?></td>
                                            <td style="font-size:20px; text-align: left;">Total Deduction <?php // $voucher->voucher_no ?> </td>
                                            <td style="font-size:20px; text-align: right;"><?php // $voucher->voucher_type ?></td>
                                        </tr>
                                        <tr style="height:30px;">
                                            <td colspan="2"text-align: left;">  </td>
                                            <td style=" text-align: left;"> <h1>NET Salary  </h1></td>
                                            <td style=" text-align: right;"><h1><?= $salary_sheet->net_salary ?></h1></td>
                                        </tr>
                                        
                                        <tr style="height:30px;">
                                            <td colspan="4" style="font-size:20px;"><strong> Amount in words : </strong> <?= no_to_words($salary_sheet->net_salary) ?></td>
                                        </tr>
                                    </table>

                                   

                                    <table width="100%" border='1'>
                                        <tr style="height:40px;">
                                            <td colspan="2" style="font-size:15px;"><strong>Cheque or Transaction No. </strong> : <?php // $voucher->narration ?></td>
                                        </tr>
                                        <tr style="height:40px;">
                                            <td style="font-size:15px;"><strong>Bank Name:</strong> <?= $emp_details->bank_acc_no ?></td>
                                            <td style="font-size:15px;"><strong> Date:</strong>  <?php //no_to_words($voucher->amount) ?></td>
                                        </tr>
                                    </table>


                                    <table width="100%" style="border:none;">
                                        <tr style="height:80px;font-size:15px;">
                                            <td style="vertical-align: bottom;text-align: center;" width="50%"><strong>Signature of Employee.</strong> <?php // $voucher->amount ?></td>
                                            <td style="vertical-align: bottom;text-align: center;" width="50%"><strong>Director's signature</strong></td>
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