$(function () {

});

$(function () {
    loadAllVendor();

    function loadAllVendor() {
        var url = baseUrl + "Home/all_vendor";
        $.ajax({
            url: url,
            type: "POST",
            data: {},
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                if (data.status.success === 1) {
                    $("#allVendor").html(data.result);
                    $('#allVendorTable').DataTable({
                        "destroy": true,
                    });
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('Error adding data');
            }
        });
    }

    $('#vendorFormForNewVendor').on('submit', function (event) {
        if (!event.target.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
            $(this).addClass('was-validated');
        } else {
            var url = baseUrl + "Home/add_new_vendor";
            $.ajax({
                url: url,
                type: "POST",
                data: $('#vendorFormForNewVendor').serialize(),
                dataType: "JSON",
                success: function (data) {
                    console.log(data);
                    if (data.status.success === 1) {
                        $('#vendorFormForNewVendor')
                            .trigger("reset")
                            .removeClass('was-validated');

                        loadAllVendor();

                        // =============
                        const toastLiveExample = document.getElementById('liveToast')
                        const toast = new bootstrap.Toast(toastLiveExample)
                        toast.show()
                        // =============


                    } else {
                        var erorResult = '<div class="alert alert-danger">' + data.status.message + '</div>';
                        $('#errorVendorFormForNewVendor').html(erorResult);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('Error adding data');
                }
            });
        }
    });

    $(document).on('click', '.deleteVendor', function () {
        var vendor_id = $(this).attr("data-vendor_id");
        console.log(vendor_id);
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this vendor!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
            function (isConfirm) {
                if (isConfirm) {
                    swal("Deleted!", "Vendor has been deleted.", "success");
                    

                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });

    });



});
