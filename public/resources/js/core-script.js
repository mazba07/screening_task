// Vendor CRUD start
$(function () {
    function loadAllVendor() {
        var url = baseUrl + "Home/all_vendor";
        $.ajax({
            url: url,
            type: "POST",
            data: {},
            dataType: "JSON",
            success: function (data) {
                // console.log(data);
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
    loadAllVendor();


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
                    // console.log(data);
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
        // console.log(vendor_id);
        swal({
            title: "Are you sure?",
            text: "Your will not be able to recover this Vendor!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            swal("Deleted!", "Vendor has been deleted.", "success");

            var url = baseUrl + "Home/delete_vendor";
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    "vendor_id": vendor_id
                },
                dataType: "JSON",
                success: function (data) {
                    // console.log(data);
                    if (data.status.success === 1) {
                        loadAllVendor();
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('Error adding data');
                }
            });
        });
    });
});
// Vendor CRUD End

// Purchase start
$(function () {

    function loadAllPurchase() {
        var url = baseUrl + "Purchase/all_purchase";
        $.ajax({
            url: url,
            type: "POST",
            data: {},
            dataType: "JSON",
            success: function (data) {
                // console.log(data);
                if (data.status.success === 1) {
                    $("#allPurchase").html(data.result);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('Error adding data');
            }
        });
    }
    loadAllPurchase();

    $('#purchaseFormForNewItem').on('submit', function (event) {
        var url = baseUrl + "Purchase/add_new_purchase";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#purchaseFormForNewItem').serialize(),
            dataType: "JSON",
            success: function (data) {
                // console.log(data);
                if (data.status.success === 1) {
                    loadAllPurchase();

                    $('#purchaseFormForNewItem')
                        .trigger("reset");


                    // =============
                    const toastLiveExample = document.getElementById('liveToast')
                    const toast = new bootstrap.Toast(toastLiveExample)
                    toast.show()
                    // =============

                    $('#errorPurchaseFormForNewItem').html("");

                } else {
                    var erorResult = '<div class="alert alert-danger">' + data.status.message + '</div>';
                    $('#errorPurchaseFormForNewItem').html(erorResult);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('Error adding data');
            }
        });
    });

});

