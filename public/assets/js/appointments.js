//modals
const appointmentPrevModal = $('#appointment-prev-modal');

//appointments
const appointmentsColumns = $('.appointment-column');


appointmentsColumns.click(function() {
    const appointmentId = $(this).find('#appointment-id').val();
    const filteredAppointments = appointments.filter(app => app.id == appointmentId);

    appointmentPrevModal.find('.appointment-id').html(filteredAppointments[0].id);
    appointmentPrevModal.find('.doc-pfp').attr('src', `/assets/media/pfp/${filteredAppointments[0].doctors[0].pfp}`);
    appointmentPrevModal.find('.doc-name').html(`Dr. ${filteredAppointments[0].doctors[0].firstname} ${filteredAppointments[0].doctors[0].lastname}`);
    appointmentPrevModal.find('.doc-phone').html(`+63 ${filteredAppointments[0].doctors[0].phone}`);
    appointmentPrevModal.find('.doc-service').html(filteredAppointments[0].services[0].service);
    appointmentPrevModal.find('.doc-time').html(`${formatDate(filteredAppointments[0].appointment_date)} at ${formatTime(filteredAppointments[0].appointment_time)}`);
    appointmentPrevModal.find('.note').html(filteredAppointments[0].note == null ? "N/A" : filteredAppointments[0].note);

    showModal(appointmentPrevModal);
    closeModal(appointmentPrevModal, false);
});

function formatDate(dateTime) {
    const date = new Date(dateTime); // Convert appointment_date to a JavaScript Date object

    const options = {
        month: 'short',
        day: '2-digit',
        year: 'numeric'
    };

    return new Intl.DateTimeFormat('en-US', options).format(date);
}

function formatTime(timeString) {
    const [hours, minutes] = timeString.split(':'); // Split the time string into hours and minutes

    const date = new Date();
    date.setHours(hours); // Set hours
    date.setMinutes(minutes); // Set minutes

    const options = {
        hour: 'numeric',
        minute: '2-digit',
        hour12: true
    };

    return new Intl.DateTimeFormat('en-US', options).format(date);
}