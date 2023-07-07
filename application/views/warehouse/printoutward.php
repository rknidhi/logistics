<html>
    <head>
        <meta charset="UTF-8">
        <title>OutWard</title>
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
                border: 1px solid #ddd;
                text-align: left;
                font-weight: normal;
                padding-left: 5px;
            }
            th, td {
            }
            /*            
                        #customers {
                            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                            border-collapse: collapse;
                            margin-left:150px;
                            margin-right:100px;
                            width:80%;
                        }
            
                        #customers td, #customers th {
                            border: 1px solid #ddd;
                            padding: 6px;
                            font-weight:bold;
            
                        }
            
                        #customers tr{
                            padding-top: 12px;
                            padding-bottom: 12px;
                            padding-left:23px;
                            text-align: left;
            
            
                        }
                        .space{
                            padding-left:4px;
                            padding-right:4px;
                        }*/
        </style>
    </head>
    <body onload="window.print()">

        <table id="customers" class="table-show">
            <tr>
                <td colspan="3"><img src="<?= $base_url ?>assets/images/logo-text.png" alt="image" ></td>
                <td colspan="3"><p>
                        <strong>Mobile : </strong> <?= $this->config->item('company_mobile') ?><br>
                        <strong>Address : </strong> <?= $this->config->item('company_address') ?>
                    </p>
                </td>
            </tr>
            <tr>
                <td class="space" colspan="6" style="text-align: center; font-size: 20px; font-weight: bold;"> Out-Ward Register </td>
            </tr>
           <tr height="20">
                <td width="15%"><strong>Out-Ward</strong></td>
                <td width="20%"><?= $outward->outward_no ?></td>

                <td width="15%"><strong>Transport Name</strong></td>
                <td width="20%"><?= $outward->transport_name ?></td>

            </tr>
            <tr height="20">
                <td><strong>Date</strong></td>
                <td><?= convertToHumanDate($outward->outward_date) ?></td>
                
                <td><strong>Vehicle Number</strong></td>
                <td><?= $outward->vehicle_no ?></td>
            </tr>
            <tr height="20">
                <td><strong>Branch</strong></td>
                <td><?= $this->function_library->FindBrachAgent($outward->branch_id_fk) ?></td>
                
                <td><strong>Document Inv. No</strong></td>
                <td><?= $outward->doc_invoice_no ?></td>
            </tr>
            <tr height="20">
                <td><strong>Vendor Name</strong></td>
                <td><?= $this->function_library->FindVendor($outward->vendor_id_fk) ?></td>
                
                <td><strong>Document Date</strong> </td>
                <td><?= convertToHumanDate($outward->document_date) ?></td>
            </tr>
            <tr height="20">
                <td><strong>GR No.</strong></td>
                <td><?= $outward->gr_no ?></td>
                
                <td><strong>Remarks</strong> </td>
                <td><?= $outward->remarks ?></td>
            </tr>
        </table>


        <table class="table-show" width="100%">    
            <tr height="30">
                <td width="10%" style="text-align: center;"><strong>S.No</strong></td>
                <td width="50%" style="text-align: center;"><strong>Item Name</strong></td>
                <td width="15%" style="text-align: center;"><strong>Qty</strong></td>
                <td width="25%" style="text-align: center;"><strong>Packing</strong></td>
            </tr>
            <?php
            $sn = 1;
            $totalqty = 0;
            foreach ($warehouses as $warehouse):
                ?>
                <tr>
                    <td style="text-align: center;"><?= $sn ?></td>
                    <td><?= $this->function_library->FindItemName($warehouse->item_id_fk) ?></td>
                    <td style="text-align: center;"><?= $warehouse->item_qty ?></td>
                    <td><?= $this->function_library->FindPackageMethod($warehouse->package_id) ?></td>
                </tr>
                <?php
                $sn++;
                $totalqty += $warehouse->item_qty;
            endforeach;
            ?>

            <tr height="20">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr height="30">
                <td></td>
                <td style="text-align: center;"><strong>Total Items Qty.</strong></td>
                <td style="text-align: center;"><strong><?= $totalqty ?></strong></td>
                <td></td>
            </tr>
            <tr height="60">
                <td colspan="2"></td>
                <td colspan="2" style="text-align: center; vertical-align: bottom;"><strong>Sign & Stamp</strong></td>
            </tr>
        </table>
    </body>
</html>
