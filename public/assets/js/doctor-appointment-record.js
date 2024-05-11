// Modals
const appointmentRecordPrevModal = $('#doctor-appointment-record-preview-modal');
// columns
const appointmentRecordColumns = $('.appointment-record-column');




appointmentRecordColumns.click(function() {
    showAppointmentRecordInfo($(this));
});



function showAppointmentRecordInfo(column) {
    const appointmentId = column.attr('id');
    const filteredAppointments = appointmentRecords.filter(app => app.id == appointmentId);

    appointmentRecordPrevModal.find('.patient-pfp').attr('src', `/assets/media/pfp/${filteredAppointments[0].patients[0].pfp}`);
    appointmentRecordPrevModal.find('.appointment-id').html(filteredAppointments[0].id);
    appointmentRecordPrevModal.find('.appointment-id-val').val(filteredAppointments[0].id);
    appointmentRecordPrevModal.find('.patient-name').html(`${filteredAppointments[0].patients[0].firstname} ${filteredAppointments[0].patients[0].lastname}`);
    appointmentRecordPrevModal.find('.patient-phone').html(`+63 ${filteredAppointments[0].patients[0].phone}`);
    appointmentRecordPrevModal.find('.patient-service').html(filteredAppointments[0].services[0].service);
    appointmentRecordPrevModal.find('.patient-time').html(`${formatDate(filteredAppointments[0].appointment_date)} at ${formatTime(filteredAppointments[0].appointment_time)}`);
    appointmentRecordPrevModal.find('.note').html(filteredAppointments[0].note == null ? "N/A" : filteredAppointments[0].note);

    showModal(appointmentRecordPrevModal);
    closeModal(appointmentRecordPrevModal, false);
}