$(document).ready(function () {
    $('.js-example-basic-single').select2();
});

$(document).ready(function () {
    $('.js-example-basic-multiple').select2();
});
$(document).ready(function () {
    $('.js-example-basic-multiple-meta_keywords').select2();
});

// Delete action with reload page
$(document).on('click', '.delete', function (e) {
    e.preventDefault();

    var deleteUrl = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        // buttonsStyling: false,
        // customClass: {
        //     confirmButton: 'btn btn-danger',
        //     cancelButton: 'btn btn-success'
        // }
    }).then(function (result) {
        if (result.isConfirmed) {
            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function (data) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    ).then(function () {
                        location.reload();
                    });
                },
                error: function (xhr, status, error) {
                    Swal.fire(
                        'Error Occurred!',
                        error,
                        'error'
                    ).then(function () {
                        location.reload();
                    });
                }
            });
        }
        else if (result.dismiss === swal.DismissReason.cancel) {
            Swal.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            );
        }
    });
});


$(document).on('click', '.inactive', function (e) {
    e.preventDefault();

    var deleteUrl = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, inactive it!',
        cancelButtonText: 'No, cancel!',
        // buttonsStyling: false,
        // customClass: {
        //     confirmButton: 'btn btn-danger',
        //     cancelButton: 'btn btn-success'
        // }
    }).then(function (result) {
        if (result.isConfirmed) {
            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function (data) {
                    Swal.fire(
                        'Inactive!',
                        'Your file has been inactive.',
                        'success'
                    ).then(function () {
                        location.reload();
                    });
                },
                error: function (xhr, status, error) {
                    Swal.fire(
                        'Error Occurred!',
                        error,
                        'error'
                    ).then(function () {
                        location.reload();
                    });
                }
            });
        }
        else if (result.dismiss === swal.DismissReason.cancel) {
            Swal.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            );
        }
    });
});






// --------------------------------

// Define a global function to toggle switch status update
window.toggleStatus = function (route, id) {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    // Retrieve CSRF token from meta tag
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: route.replace(':id', id),
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken, // Send CSRF token with the request
        },
        success: function (response) {
            $(`#flexSwitchCheckChecked_${id}`).prop('checked', response.status);
            Toast.fire({
                icon: "success",
                title: "Status Successfully Changed"
            });
        },
        error: function (xhr, status, error) {
            console.error('Error:', error);
            Toast.fire({
                icon: 'error',
                title: 'Error',
                text: 'Error toggling status.',
            });
        }
    });
};
