<div class="table-responsive">
    <table id="allVendorTable" class="table table-striped">
        <thead class="mt-4">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Item name</th>
                <th scope="col">Item quantity</th>
                <th scope="col">Unit price</th>
                <th scope="col">Total price</th>
                <th scope="col">Vendor name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($purchase) {
                foreach ($purchase as $item) {
            ?>
                    <tr>
                        <th scope="row">#</th>
                        <td><?php echo $item->item_name ?></td>
                        <td><?php echo $item->item_quantity ?></td>
                        <td><?php echo $item->unit_price ?></td>
                        <td><?php echo $item->total_price ?></td>
                        <td><?php echo $item->vendor_name ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>