<div class="container">
    <div class="row mt-4">
        <div class="col-12 col-md-8 offset-md-2">

            <div class="shadow-block">
                <h4 class="text-center mt-2 text-success">Add new vendor</h4>
                <hr>
                <form  class="row g-3 needs-validation" novalidate>
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


                <h4 class="text-center mt-4 text-danger">Vendor</h4>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
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
                            <tr>
                                <th scope="row">1</th>
                                <td>Otto</td>
                                <td>Otto</td>
                                <td>Otto</td>
                                <td>Otto</td>
                                <td>
                                    <a class="btn btn-info btn-sm text-white">View</a>
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-sm text-white">Edit</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm text-white">Delete</a>
                                </td>
                            </tr>
                            
                            
                            
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>