// Btns
const pendingNavBtn = $('#pending-nav-btn');
const approvedNavBtn = $('#approved-nav-btn');
const rejectedNavBtn = $('#rejected-nav-btn');

// Containers
const pendingCont = $('#pending-content');
const approvedContent = $('#approved-content');
const rejectedCont = $('#rejected-content');

// Modals
const appointmentPrevModal = $('#doctor-pending-appointment-preview-modal');
const approvedAppointmentPreviewModal = $('#doctor-approved-appointment-preview-modal');

const infoYNModal = $('.info-yn-modal');
const successModal = $('#success-modal');
const errorModal = $('#error-modal');

// columns
const appointmentColumns = $('.appointment-column');
const approvedAppointmentColumns = $('.approved-appointment-column');

// Search input
const searchApprovedIn = $('#search-approved-in')


// Function Calls
frontEndEvents();



function frontEndEvents() {
    pendingNavBtn.click(()=> {
        ChangeContent(pendingNavBtn, pendingCont);
    });
    approvedNavBtn.click(()=> {
        ChangeContent(approvedNavBtn, approvedContent);
    });
    rejectedNavBtn.click(()=> {
        ChangeContent(rejectedNavBtn, rejectedCont);
    });
    
    function ChangeContent(activeLink, activeCont) {
        pendingNavBtn.removeClass('active');
        rejectedNavBtn.removeClass('active');
        approvedNavBtn.removeClass('active');
    
        pendingCont.addClass('d-none');
        rejectedCont.addClass('d-none');
        approvedContent.addClass('d-none');

        activeLink.addClass('active');
        activeCont.removeClass('d-none');
    }
    
    appointmentColumns.click(function() {
        showPendingAppointmentInfo($(this));
    });
    approvedAppointmentColumns.click(function() {
        showApprovedAppointmentInfo($(this));
    });
}


function showPendingAppointmentInfo(column) {
    const appointmentId = column.attr('id');
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
}

function showApprovedAppointmentInfo(column) {
    const appointmentId = column.attr('id');
    const filteredAppointments = approvedAppointments.filter(app => app.id == appointmentId);

    approvedAppointmentPreviewModal.find('.patient-pfp').attr('src', `/assets/media/pfp/${filteredAppointments[0].patients[0].pfp}`);
    approvedAppointmentPreviewModal.find('.appointment-id').html(filteredAppointments[0].id);
    approvedAppointmentPreviewModal.find('.appointment-id-val').val(filteredAppointments[0].id);
    approvedAppointmentPreviewModal.find('.patient-name').html(`${filteredAppointments[0].patients[0].firstname} ${filteredAppointments[0].patients[0].lastname}`);
    approvedAppointmentPreviewModal.find('.patient-phone').html(`+63 ${filteredAppointments[0].patients[0].phone}`);
    approvedAppointmentPreviewModal.find('.patient-service').html(filteredAppointments[0].services[0].service);
    approvedAppointmentPreviewModal.find('.patient-time').html(`${formatDate(filteredAppointments[0].appointment_date)} at ${formatTime(filteredAppointments[0].appointment_time)}`);
    approvedAppointmentPreviewModal.find('.note').html(filteredAppointments[0].note == null ? "N/A" : filteredAppointments[0].note);

    showModal(approvedAppointmentPreviewModal);
    closeModal(approvedAppointmentPreviewModal, false);
}





/*
|----------------------------------------
| Search Events 
|----------------------------------------
*/
searchApprovedIn.on('input', function() {
    let searchVal = $(this).val();
});





/*
|----------------------------------------
| Mark AS Done 
|----------------------------------------
*/
const markAsDoneBtn = approvedAppointmentPreviewModal.find('.mark-as-done-btn');
let appointmentId = "";

markAsDoneBtn.click(function() {
    appointmentId = approvedAppointmentPreviewModal.find('.appointment-id-val').val();

    infoYNModal.eq(2).find('.modal-text').html(`Mark as done this Appointment (${appointmentId})?`);
    showModal(infoYNModal.eq(2));
    closeModal(infoYNModal.eq(2), false);
});

let yesBtn = infoYNModal.eq(2).find('.yes-btn');

yesBtn.click(function() {
    closeModalNoEvent(infoYNModal.eq(2));
    let formData = new FormData();
    formData.append('appointmentId', appointmentId);
    formData.append('newStatus', "Completed");
    changeStatus(formData);
});





/*
|----------------------------------------
| Accept Appointment 
|----------------------------------------
*/
const approveBtn = appointmentPrevModal.find('.approve-btn');
let toAcceptAppointmentId = '';
approveBtn.click(function() {
    toAcceptAppointmentId = appointmentPrevModal.find('.appointment-id-val').val();

    infoYNModal.eq(0).find('.modal-text').html(`Approve this Appointment (${toAcceptAppointmentId})?`);
    showModal(infoYNModal.eq(0));
    closeModal(infoYNModal.eq(0), false);
});
infoYNModal.eq(0).find('.yes-btn').click(function() {
    closeModalNoEvent(infoYNModal.eq(0));
    let formData = new FormData();
    formData.append('appointmentId', toAcceptAppointmentId);
    formData.append('newStatus', "Approved");
    
    changeStatus(formData);
});





/*
|----------------------------------------
| Reject Appointment 
|----------------------------------------
*/
let toRejectAppointmentId = '';
appointmentPrevModal.find('.reject-btn').click(() => {
    toRejectAppointmentId = appointmentPrevModal.find('.appointment-id-val').val();
    closeModalNoEvent(appointmentPrevModal);

    infoYNModal.eq(1).find('.modal-text').html(`Reject this Appointment (${toRejectAppointmentId})?`);
    showModal(infoYNModal.eq(1));
    closeModal(infoYNModal.eq(1), false);
});
infoYNModal.eq(1).find('.yes-btn').click(() => {
    let formData = new FormData();
    formData.append('appointmentId', toRejectAppointmentId);
    formData.append('newStatus', "Rejected");

    changeStatus(formData);
});



/*
|----------------------------------------
| Ajax 
|----------------------------------------
*/
function changeStatus(formData) {
    $.ajax({
        type: "POST",
        url: "/changeStatusAppointment",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                successModal.find('.modal-text').html(response.message);
                showModal(successModal);
                closeModal(successModal, true);
            } else {
                errorModal.find('.modal-text').html(response.message);
                showModal(errorModal);
                closeModal(errorModal, false);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('error');
        }
    });
}




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