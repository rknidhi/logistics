<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Print Voucher</title>
        <style>
            @page { size: auto;  margin: 0mm; }
            table  {  
                border: 1px solid #ddd;
                text-align: left;
                font-weight: bold;
                border-collapse: collapse;
                font-size: 12px;
            }
            th {
                padding-left: 5px; 
            }
            td {  
                /*border: 1px solid #ddd;*/
                text-align: left;
                font-weight: normal;
                padding-left: 5px;
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
                                            <td colspan="3" style="text-align: center; height: 80px;"><img src="<?= $base_url ?>assets/images/logo-text.png" alt="image" ></td>
                                        </tr>
                                        <tr style="height:30px;">
                                            <td style="font-size:20px; text-align: center;"><strong>No. </strong> <?= $voucher->voucher_no ?> </td>
                                            <td style="font-size:20px; text-align: center;"><strong><?= $voucher->voucher_type ?> Voucher </strong></td>
                                            <td style="font-size:20px; text-align: center;"><strong>DATE </strong> <?= date_only_format($voucher->voucher_date) ?></td>
                                        </tr>

                                        <tr style="height:70px;">
                                            <td colspan="2" style="font-size:15px;"><strong>Pay : </strong> <?= $this->function_library->FindLedgerName($voucher->ledger) ?></td>
                                            <td style="font-size:15px;"><strong>Place : </strong><?= $this->function_library->FindBrachAgent($voucher->branch_id_fk) ?></td>
                                        </tr>
                                    </table>

                                    <table width="100%" border='1'>
                                        <tr style="height:40px;">
                                            <th style="text-align: center;"><strong>PARTICULARS</strong></th>
                                            <th style="text-align: center;"><strong>AMOUNT</strong></th>
                                            <th style="text-align: center;"><strong>BANK DESCRIPTION</strong></th>
                                        </tr>
                                        <tr style="height:40px;">
                                            <td style="padding:10px;"><?= $voucher->narration ?> 
                                                <br/><strong>Reference No. -</strong>
                                                <?= $voucher->reference_no ?></td>
                                            <td style="padding:10px;">Rs. <?= $voucher->amount ?></td>
                                            <td style="padding:10px;">
                                                <br />
                                                <strong>CH. No.</strong> <br /><br />
                                                <strong>DATE </strong><br /><br />
                                                <strong>BANK NAME </strong><br /><br />
                                            </td>
                                        </tr>
                                    </table>

                                    <table width="100%" border='1'>
                                        <tr style="height:40px;">
                                            <td style="padding:10px;"><strong>NARRATION</strong> : <?= $voucher->narration ?></td>
                                        </tr>
                                        <tr style="height:40px;">
                                            <td style="padding:10px;">RUPEES: <?= no_to_words($voucher->amount) ?></td>
                                        </tr>
                                    </table>


                                    <table width="100%" style="border:none;">
                                        <tr style="height:100px;">
                                            <td style="vertical-align: bottom" width="25%"><strong>Rs.</strong> <?= $voucher->amount ?></td>
                                            <td style="vertical-align: bottom;text-align: center;" width="25%"><strong>Prepared By</strong></td>
                                            <td style="vertical-align: bottom;text-align: center;" width="25%"><strong>Pass by</strong></td>
                                            <td style="vertical-align: bottom;text-align: center;" width="25%"><strong>Receiver's signature</strong></td>
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