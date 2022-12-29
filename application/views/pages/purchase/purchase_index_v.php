<div class="container">
    <div class="row mt-4">
        <div class="col-12 col-md-8 offset-md-2">

            <div class="shadow-block">
                <h4 class="text-center mt-2 text-success">Purchase Order</h4>
                <hr>

                <div id="errorPurchaseFormForNewItem"></div>

                <form id="purchaseFormForNewItem" onsubmit="return false" class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                        <label class="form-label">Item name*</label>
                        <input type="text" name="item_name" class="form-control shadow-none" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please provide Item name.
                        </div>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Item quantity*</label>
                        <select name="item_quantity" class="form-select shadow-none" aria-label="Default select example">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Unit price*</label>
                        <input type="number" name="unit_price" class="form-control shadow-none" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please provide Unit price.
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Vendor name*</label>
                        <select name="vendor_name" class="form-select shadow-none" aria-label="Default select example">
                            <option value="" selected>Choose a vendor</option>
                            <?php
                            if ($vendor) {
                                foreach ($vendor as $item) {
                            ?>
                                    <option value="<?php echo $item->vendor_name ?>"><?php echo $item->vendor_name ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-12 text-end">
                        <button class="btn btn-secondary" type="submit">Submit</button>
                    </div>
                </form>


                <h4 class="text-center mt-4 text-info">All purchase</h4>
                <hr>
                <div id="allPurchase"></div>
            </div>
        </div>
    </div>
</div>


<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="<?php echo base_url('public/resources/images/Green_tick.svg.png') ?>" class="rounded me-2 toasts-img-tick" alt="...">
            <strong class="me-auto">Company name</strong>
            <small>1 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Purchase has been added.
        </div>
    </div>
</div>