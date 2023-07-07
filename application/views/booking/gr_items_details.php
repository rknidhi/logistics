<div class="row">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="m-b-0 text-white">View GR Items</h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
        <table id="example23" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                <th>#</th>
                <th>FT Method</th>
                <th>QTY</th>
                <th>Item Name</th>
                <th>Method of Pack</th>
                <th>Weight (KG)</th>
                <th>Weight Charges</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $n = 1;
                foreach($item_list as $item)
                {
                ?>  <tr>
                    <td><?= $n++?> 
                    <td><?= $this->function_library->FindFreightMethod($item->item_ft_method)?></td>
                    <td><?= $item->item_qty ?></td>
                    <td><?= $this->function_library->FindItemName($item->item_name_fk)?></td>
                    <td><?= $this->function_library->FindPackageMethod($item->item_method_of_pack_fk)?></td>
                    <td><?= $item->item_weight ?></td>
                    <td><?= $item->item_weight_ch ?></td></tr>
                <?php    
                }
                ?>
            </tbody>
            </table>

        </div>
    </div>
    <!-- Column -->
</div>
