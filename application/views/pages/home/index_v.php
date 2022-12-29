<div class="container">
    <div class="row mt-4">
        <div class="col-12 col-md-8 offset-md-2">

            <div class="shadow-block">
                <h4 class="text-center mt-2 text-success">Add new vendor</h4>
                <hr>

                <div id="errorVendorFormForNewVendor"></div>

                <form id="vendorFormForNewVendor" onsubmit="return false" class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                        <label class="form-label">Vendor name*</label>
                        <input type="text" name="vendor_name" class="form-control shadow-none" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please provide Vendor name.
                        </div>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Phone number*</label>
                        <input type="number" name="phone_number" class="form-control shadow-none" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please provide a valid Phone number.
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Email address*</label>
                        <input type="email" name="email_address" class="form-control shadow-none" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please provide a valid Email address.
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Office address*</label>
                        <textarea name="office_address" class="form-control shadow-none" rows="3" required></textarea>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Please provide Office address.
                        </div>
                    </div>

                    <div class="col-12 text-end">
                        <button class="btn btn-secondary" type="submit">Submit</button>
                    </div>
                </form>


                <h4 class="text-center mt-4 text-danger">Our vendor</h4>
                <hr>
                <div id="allVendor"></div>
            </div>
        </div>
    </div>
</div>


<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="<?php echo base_url('public/resources/images/Green_tick.svg.png')?>" class="rounded me-2 toasts-img-tick" alt="...">
            <strong class="me-auto">Company name</strong>
            <small>1 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            New vendor has been added.
        </div>
    </div>
</div>