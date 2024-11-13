function setEndDateRestriction(startInputId, endInputId) {
    const startDateInput = document.getElementById(startInputId);
    const endDateInput = document.getElementById(endInputId);

    startDateInput.addEventListener('change', function() {
        endDateInput.min = startDateInput.value;

        if (endDateInput.value && endDateInput.value < startDateInput.value) {
            endDateInput.value = '';
        }
    });
}


function confirmDelete(element) {
    Swal.fire({
        title: "Are you sure?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            var route = $(element).data('route');

            $(element).find('form').attr('action', route);

            $(element).find('form').submit();
        }
    });
}
