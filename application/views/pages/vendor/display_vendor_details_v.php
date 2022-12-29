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
                    <h3>
                        <?php echo $vendor->vendor_name ?></h3>
                    <p class="fw-light">
                        <i class="fa-light fa-phone"></i>: <?php echo $vendor->phone_number ?>
                    </p>
                    <p class="fw-light">
                        <i class="fa-light fa-envelope"></i>: <?php echo $vendor->email_address ?>
                    </p>
                    <p class="fw-light">
                        <?php echo nl2br($vendor->office_address) ?>
                    </p>
                </div>
            </div>
        </div>
    </div>


<?php
}
?>