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
