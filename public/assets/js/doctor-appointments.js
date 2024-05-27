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
const doctorCancelFollowupReasonModal = $('#doctor-cancel-followup-reason-modal');

const infoYNModal = $('.info-yn-modal');
const successModal = $('#success-modal');
const errorModal = $('#error-modal');

// columns
const appointmentColumns = $('.appointment-column');
const approvedAppointmentColumns = $('.approved-appointment-column');

// Search input
const searchApprovedIn = $('#search-approved-in');
const cancelReasonIn = $('#cancel-reason-in');


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

    if(filteredAppointments[0].is_follow_up) {
        approvedAppointmentPreviewModal.find('.Cancel-btn').removeClass('d-none');
        approvedAppointmentPreviewModal.find('.Cancel-btn').attr('id', appointmentId);
    }else {
        approvedAppointmentPreviewModal.find('.Cancel-btn').addClass('d-none');
        approvedAppointmentPreviewModal.find('.Cancel-btn').attr('id', '');
    }

    showModal(approvedAppointmentPreviewModal);
    closeModal(approvedAppointmentPreviewModal, false);
}





/*
|----------------------------------------
| Search Events 
|----------------------------------------
*/
// Containers
const defApprovedAppointmentsCont = $('#def-approved-appointments-cont');
const resultApprovedAppointmentCont = $('#result-approved-appointments-cont');
// Approved appointments
searchApprovedIn.on('input', function() {
    let searchVal = $(this).val();
    let filteredApprovedAppointments = approvedAppointments.filter(app => app.id.toString().includes(searchVal));
    if(isEmptyOrSpaces(searchVal)) {
        defApprovedAppointmentsCont.removeClass('d-none');
        resultApprovedAppointmentCont.addClass('d-none');
        return;
    }
    resultApprovedAppointmentCont.removeClass('d-none');
    defApprovedAppointmentsCont.addClass('d-none');
    renderApprovedAppointments(filteredApprovedAppointments);
});

// Event for result columns
resultApprovedAppointmentCont.on('click', '.table1-data.approved-appointment-column', function() {
    showApprovedAppointmentInfo($(this));
});




function renderApprovedAppointments(appointments) {
    resultApprovedAppointmentCont.html('');

    if(appointments.length < 1) {
        resultApprovedAppointmentCont.append(`
        <div class="placeholder-illustrations">
            <div class="d-flex flex-direction-y gap2">
                <img src="/assets/media/illustrations/no-data.svg" alt="" srcset="">  
                <div class="text-l3 text-center">No Records</div>
            </div>
        </div>
        `);
    }
    else {
        resultApprovedAppointmentCont.append(`
        <div class="table1">
            <div class="table1-header">
                <div class="form-data-col">
                    <small class="text-m2">Patient Name</small>
                    <div class="table1-PFP-small-cont mar-end-1"></div>
                </div>
                <small class="text-m2 form-data-col">Patient ID</small>
                <small class="text-m2 form-data-col">Appointment ID</small>
                <small class="text-m2 form-data-col">Phone Number</small>
                <small class="text-m2 form-data-col">Appointment Date</small>
                <small class="text-m2 form-data-col">Appointment Time</small>
                <small class="text-m2 form-data-col">Type</small>
            </div>
        </div>
        `);
        appointments.forEach(appointment => {
            const appointmentRow = `
            <div class="table1-data {{ $loop->last ? 'last' : '' }} approved-appointment-column" id="${appointment.id}">
                <div class="form-data-col">
                    <div class="table1-PFP-small mar-end-1">
                        <img class="emp-pfp" src="/assets/media/pfp/${appointment.patients[0].pfp}" alt="">
                    </div>
                    <small class="text-m2 emp-name">${appointment.patients[0].firstname}</small>
                </div>
                <small class="form-data-col emp-id">${appointment.patient}</small>
                <small class="form-data-col emp-id">${appointment.id}</small>
                <small class="form-data-col emp-id">${appointment.patients[0].phone}</small>
                <small class="form-data-col">${formatDate(appointment.appointment_date)}</small>
                <small class="form-data-col">${formatTime(appointment.appointment_time)}</small>
                <small class="form-data-col emp-dept d-flex gap3">${appointment.is_follow_up ? 'Follow-up' : 'Regular'}</small>
            </div>
            `;

            resultApprovedAppointmentCont.find('.table1').append(appointmentRow);
            $('.approved-appointment-column').last().addClass('last');
        });
    }
    
}





/*
|----------------------------------------
| Cancel Follow-up 
|----------------------------------------
*/
let appointmentToCancelId = '';
approvedAppointmentPreviewModal.find('.Cancel-btn').click(function() {
    appointmentToCancelId = $(this).attr('id');
    doctorCancelFollowupReasonModal.find('.appointment-id').html(appointmentToCancelId);
    showModal(doctorCancelFollowupReasonModal);
    closeModal(doctorCancelFollowupReasonModal, false);
});
doctorCancelFollowupReasonModal.find('.cancel-followup-btn').click(() => {
    if(isEmptyOrSpaces(cancelReasonIn.val())) {
        errorModal.find('.modal-text').html('Reason is required');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    let formData = new FormData();
    formData.append('appointmentId', appointmentToCancelId);
    formData.append('reason', cancelReasonIn.val());

    $.ajax({
        type: "POST",
        url: "/cancelFollowUpAppointment",
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