//modals
const appointmentPrevModal = $('#appointment-prev-modal');

//appointments
const appointmentsColumns = $('.appointments-column');


appointmentsColumns.click(function() {
    let docName = $(this).find('#appointment-doc-name').val();
    let date = $(this).find('#appointment-date').val();
    let time = $(this).find('#appointment-time').val();
    let service = $(this).find('#appointment-service').val();
    let serviceType = $(this).find('#appointment-service-type').val();
    let name = $(this).find('#appointment-patient-name').val();
    let phone = $(this).find('#appointment-patient-phone').val();
    let note = $(this).find('#appointment-patient-note').val();
    appointmentPrevModal.find('.doc-name').html(docName);
    appointmentPrevModal.find('.appointment-date').html(`${date} at ${time}`);

    appointmentPrevModal.find('.service').html(service);
    appointmentPrevModal.find('.service-type').html(serviceType);

    appointmentPrevModal.find('.patient-name').html(name);
    appointmentPrevModal.find('.patient-phone').html(`+63 ${phone}`);

    appointmentPrevModal.find('.patient-note').html(note);

    showModal(appointmentPrevModal);
    closeModal(appointmentPrevModal, false);
});