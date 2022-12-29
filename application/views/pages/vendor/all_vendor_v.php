<div class="table-responsive">
    <table id="allVendorTable" class="table table-striped">
        <thead class="mt-4">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Vendor nam</th>
                <th scope="col">Phone number</th>
                <th scope="col">Email address</th>
                <th scope="col">Office address</th>
                <th scope="col">View</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($vendor) {
                foreach ($vendor as $item) {
            ?>
                    <tr>
                        <th scope="row">#</th>
                        <td><?php echo $item->vendor_name ?></td>
                        <td><?php echo $item->phone_number ?></td>
                        <td><?php echo $item->email_address ?></td>
                        <td><?php echo nl2br(substr($item->office_address, 0, 10)) ?></td>
                        <td>
                            <a href="<?php echo base_url('vendor-details/' . $item->vendor_id) ?>" class="btn btn-info btn-sm text-white">
                                View
                            </a>
                        </td>
                        <td>
                            <a href="<?php echo base_url('Home/update_vendor_details/' . $item->vendor_id) ?>" class="btn btn-warning btn-sm text-white">Edit</a>
                        </td>
                        <td>
                            <a class="deleteVendor btn btn-danger btn-sm text-white" data-vendor_id="<?php echo $item->vendor_id ?>">Delete</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>