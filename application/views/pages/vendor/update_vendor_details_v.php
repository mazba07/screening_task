<?php
if ($vendor) {
?>
    <div class="container">
        <div class="row mt-4">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="shadow-block mt-4">
                    <p>
                        <a href="<?php echo base_url() ?>">
                            <i class="fa-light fa-arrow-left"></i>
                        </a>
                    </p>

                    <h4 class="text-center mt-2 text-success">Update vendor</h4>
                    <hr>

                    <?php
                    if (validation_errors()) {
                    ?>
                        <div class="alert alert-danger">
                            <?php echo validation_errors(); ?>
                        </div>
                    <?php
                    }
                    ?>

                    <form action="<?php echo base_url('Home/update_vendor_details/' . $vendor->vendor_id) ?>" method="POST" class="row g-3 needs-validation" novalidate>
                        <div class="col-12">
                            <label class="form-label">Vendor name*</label>
                            <input type="text" name="vendor_name" class="form-control shadow-none" value="<?php echo $vendor->vendor_name ?>" required>

                        </div>

                        <div class="col-6">
                            <label class="form-label">Phone number*</label>
                            <input type="number" name="phone_number" class="form-control shadow-none" value="<?php echo $vendor->phone_number ?>" required>

                        </div>
                        <div class="col-6">
                            <label class="form-label">Email address*</label>
                            <input type="email" name="email_address" class="form-control shadow-none" value="<?php echo $vendor->email_address ?>" required>

                        </div>

                        <div class="col-12">
                            <label class="form-label">Office address*</label>
                            <textarea name="office_address" class="form-control shadow-none" rows="3" required><?php echo $vendor->office_address ?></textarea>

                        </div>

                        <div class="col-12 text-end">
                            <button class="btn btn-secondary" type="submit">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


<?php
}
?>