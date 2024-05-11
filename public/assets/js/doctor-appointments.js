// Btns
const pendingNavBtn = $('#pending-nav-btn');
const rejectedNavBtn = $('#rejected-nav-btn');

// Containers
const pendingCont = $('#pending-content');
const rejectedCont = $('#rejected-content');

// Modals
const appointmentPrevModal = $('#doctor-pending-appointment-preview-modal');
const infoYNModal = $('.info-yn-modal');
const successModal = $('#success-modal');
const errorModal = $('#error-modal');

// columns
const appointmentColumns = $('.appointment-column');

pendingNavBtn.click(()=> {
    ChangeContent(pendingNavBtn, pendingCont);
});
rejectedNavBtn.click(()=> {
    ChangeContent(rejectedNavBtn, rejectedCont);
});

function ChangeContent(activeLink, activeCont) {
    pendingNavBtn.removeClass('active');
    rejectedNavBtn.removeClass('active');

    pendingCont.addClass('d-none');
    rejectedCont.addClass('d-none');

    activeLink.addClass('active');
    activeCont.removeClass('d-none');
}

appointmentColumns.click(function() {
    const appointmentId = $(this).attr('id');
    const filteredAppointments = appointments.filter(app => app.id == appointmentId);

    appointmentPrevModal.find('.patient-pfp').attr('src', `/assets/media/pfp/${filteredAppointments[0].patients[0].pfp}`);
    appointmentPrevModal.find('.appointment-id').html(filteredAppointments[0].id);
    appointmentPrevModal.find('.appointment-id-val').val(filteredAppointments[0].id);
    appointmentPrevModal.find('.patient-name').html(`${filteredAppointments[0].patients[0].firstname} ${filteredAppointments[0].patients[0].lastname}`);
    appointmentPrevModal.find('.patient-phone').html(`+63 ${filteredAppointments[0].patients[0].phone}`);
    appointmentPrevModal.find('.patient-service').html(filteredAppointments[0].services[0].service);
    appointmentPrevModal.find('.patient-time').html(`${formatDate(filteredAppointments[0].appointment_date)} at ${formatTime(filteredAppointments[0].appointment_time)}`);
    appointmentPrevModal.find('.note').html(filteredAppointments[0].note == null ? "N/A" : filteredAppointments[0].note);

    showModal(appointmentPrevModal);
    closeModal(appointmentPrevModal, false);
});


// mark as done modal confirmation
const markAsDoneBtn = appointmentPrevModal.find('.mark-as-done-btn');
let appointmentId = "";

markAsDoneBtn.click(function() {
    appointmentId = appointmentPrevModal.find('.appointment-id-val').val();

    closeModalNoEvent(appointmentPrevModal);

    infoYNModal.eq(0).find('.modal-text').html(`Mark as done this Appointment (${appointmentId})?`);
    showModal(infoYNModal.eq(0));
    closeModal(infoYNModal.eq(0), false);
});

let yesBtn = infoYNModal.eq(0).find('.yes-btn');

yesBtn.click(function() {
    closeModalNoEvent(infoYNModal.eq(0));
    let formData = new FormData();
    formData.append('appointmentId', appointmentId);
    $.ajax({
        type: "POST",
        url: "/markAsDoneAppointment",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                successModal.find('.modal-text').html('Appointment Mark as done successfully.');
                showModal(successModal);
                closeModal(successModal, true);
            } else {
                errorModal.find('.modal-text').html('Failed.');
                showModal(errorModal);
                closeModal(errorModal, false);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('error');
        }
    });
});


function formatDateTime(date) {
    const options = {
        month: 'short',
        day: '2-digit',
        year: '2-digit',
        hour: 'numeric',
        minute: '2-digit',
        hour12: true
    };

    return new Intl.DateTimeFormat('en-US', options).format(date);
}

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