//modals
const appointmentPrevModal = $('#appointment-prev-modal');
const appointmentPrevModalWithCancel = $('#appointment-prev-with-cancel-modal');
const appointmentRejectedPrevModal = $('#appointment-rejected-prev-modal');
const editAllergiesModal = $('#profile-edit-allergies-modal');
const editHeartDiseaseModal = $('#profile-edit-heart-disease-modal');
const editHighBPModal = $('#profile-edit-high-bp-modal');
const editDiabeticModal = $('#profile-diabetic-modal');
const editSurgeriesModal = $('#profile-edit-surgeries-modal');

const infoYNModal = $('.info-yn-modal');
const successModal = $('#success-modal');
const errorModal = $('#error-modal');

//rows
const pendingAppointmentRow = $('.appointment-column');
const approvedAppointmentRow = $('.approved-appointment-column');
const rejectedAppointmentRow = $('.rejected-appointment-column');
const appointmentsHistoryRows = $('.history-column');

// Btns
const editAllergiesBtn = $('#edit-allergies-btn');
const editHeartDiseasBtn = $('#edit-heart-disease-btn');
const editHighBPBtn = $("#edit-h-blood-p-btn");
const editDiabeticBtn = $('#edit-diabetic-btn')
const editSurgeriesBtn = $('#edit-surgeries-btn')

const pendingNavBtn = $('#pending-nav-btn');
const approvedNavBtn = $('#approved-nav-btn');
const rejectedNavBtn = $('#rejected-nav-btn');


// Containers
const pendingAppointmentCont = $('#pending-cont');
const approvedAppointmentCont = $('#approved-cont');
const rejectedAppointmentCont = $('#rejected-cont');


// Inputs
const allergiesIn = $('#allergies-in');
const heartDiseaseIn = $('#heart-disease-in');
const highBPIn = $('#high-bp-in');
const diabeticIn = $('#diabetic-in');
const surgeriesIn = $('#surgeries-in');





// function calls
editAllergies();
editHighBP();
editDiabetic();
editSurgeries();
editHeartDisease();





/*
|----------------------------------------
| Pending Appointments 
|----------------------------------------
*/
let clickedAppointmentId = '';

pendingAppointmentRow.click(function() {
    previewModalWithCancelShow($(this));
    clickedAppointmentId = $(this).find('#appointment-id').val();    
});

// Cancel Appointment
appointmentPrevModalWithCancel.find('#cancel-btn').click(() => {
    infoYNModal.eq(0).find('.modal-text').html(`Do you want to cancel appointment (${clickedAppointmentId})`);
    showModal(infoYNModal.eq(0));
    closeModal(infoYNModal.eq(0), false);
});

infoYNModal.eq(0).find('.yes-btn').click(() => {
    let formData = new FormData();
    formData.append('appointmentId', clickedAppointmentId);

    genericAjax('/cancelAppointmentPost', formData);
});




/*
|----------------------------------------
| Approved Appointments 
|----------------------------------------
*/
approvedAppointmentRow.click(function() {
    previewModalShow($(this));
    clickedAppointmentId = $(this).find('#appointment-id').val();  
});
appointmentPrevModalWithCancel.find('#approve-btn').click(function() {
    infoYNModal.eq(1).find('.modal-text').html(`Do you want to approve the follow-up appointment (${clickedAppointmentId})`);
    showModal(infoYNModal.eq(1));
    closeModal(infoYNModal.eq(1), false);
});
infoYNModal.eq(1).find('.yes-btn').click(() => {
    let formData = new FormData();
    formData.append('appointmentId', clickedAppointmentId);

    genericAjax('/approveFollowUpPost', formData);
});





/*
|----------------------------------------
| Rejected Appointments 
|----------------------------------------
*/
rejectedAppointmentRow.click(function() {
    previewRejectedModalShow($(this));
});




appointmentsHistoryRows.click(function() {
    historyPreviewModalShow($(this));
})

function previewModalShow(row) {
    const appointmentId = row.find('#appointment-id').val();

    const filteredAppointments = pendingNavBtn.hasClass('active') ? pendingAppointments : (approvedNavBtn.hasClass('active') ? approvedAppointments : rejectedAppointments).filter(app => app.id == appointmentId);
    
    appointmentPrevModal.find('.appointment-id').html(filteredAppointments[0].id);
    appointmentPrevModal.find('.doc-pfp').attr('src', `/assets/media/pfp/${filteredAppointments[0].doctors[0].pfp}`);
    appointmentPrevModal.find('.doc-name').html(`Dr. ${filteredAppointments[0].doctors[0].firstname} ${filteredAppointments[0].doctors[0].lastname}`);
    appointmentPrevModal.find('.doc-phone').html(`+63 ${filteredAppointments[0].doctors[0].phone}`);
    appointmentPrevModal.find('.doc-service').html(filteredAppointments[0].services[0].service);
    appointmentPrevModal.find('.doc-time').html(`${formatDate(filteredAppointments[0].appointment_date)} at ${formatTime(filteredAppointments[0].appointment_time)}`);
    appointmentPrevModal.find('.note').html(filteredAppointments[0].note == null ? "N/A" : filteredAppointments[0].note);

    showModal(appointmentPrevModal);
    closeModal(appointmentPrevModal, false);
}

function previewRejectedModalShow(row) {
    const appointmentId = row.find('#appointment-id').val();

    const filteredAppointments = pendingNavBtn.hasClass('active') ? pendingAppointments : (approvedNavBtn.hasClass('active') ? approvedAppointments : rejectedAppointments).filter(app => app.id == appointmentId);
    
    appointmentRejectedPrevModal.find('.appointment-id').html(filteredAppointments[0].id);
    appointmentRejectedPrevModal.find('.doc-pfp').attr('src', `/assets/media/pfp/${filteredAppointments[0].doctors[0].pfp}`);
    appointmentRejectedPrevModal.find('.doc-name').html(`Dr. ${filteredAppointments[0].doctors[0].firstname} ${filteredAppointments[0].doctors[0].lastname}`);
    appointmentRejectedPrevModal.find('.doc-phone').html(`+63 ${filteredAppointments[0].doctors[0].phone}`);
    appointmentRejectedPrevModal.find('.doc-service').html(filteredAppointments[0].services[0].service);
    appointmentRejectedPrevModal.find('.doc-time').html(`${formatDate(filteredAppointments[0].appointment_date)} at ${formatTime(filteredAppointments[0].appointment_time)}`);
    appointmentRejectedPrevModal.find('.note').html(filteredAppointments[0].note == null ? "N/A" : filteredAppointments[0].note);
    appointmentRejectedPrevModal.find('.reason').html(filteredAppointments[0].note == null ? "N/A" : filteredAppointments[0].reason);

    showModal(appointmentRejectedPrevModal);
    closeModal(appointmentRejectedPrevModal, false);
}

function previewModalWithCancelShow(row) {
    const appointmentId = row.find('#appointment-id').val();

    const filteredAppointments = pendingAppointments.filter(app => app.id == appointmentId);
    
    appointmentPrevModalWithCancel.find('.appointment-id').html(filteredAppointments[0].id);
    appointmentPrevModalWithCancel.find('.doc-pfp').attr('src', `/assets/media/pfp/${filteredAppointments[0].doctors[0].pfp}`);
    appointmentPrevModalWithCancel.find('.doc-name').html(`Dr. ${filteredAppointments[0].doctors[0].firstname} ${filteredAppointments[0].doctors[0].lastname}`);
    appointmentPrevModalWithCancel.find('.doc-phone').html(`+63 ${filteredAppointments[0].doctors[0].phone}`);
    appointmentPrevModalWithCancel.find('.doc-service').html(filteredAppointments[0].services[0].service);
    appointmentPrevModalWithCancel.find('.doc-time').html(`${formatDate(filteredAppointments[0].appointment_date)} at ${formatTime(filteredAppointments[0].appointment_time)}`);
    appointmentPrevModalWithCancel.find('.note').html(filteredAppointments[0].note == null ? "N/A" : filteredAppointments[0].note);

    console.log(filteredAppointments[0].is_follow_up);
    console.log(appointmentId);

    if(filteredAppointments[0].is_follow_up) {
        appointmentPrevModalWithCancel.find('#approve-btn').removeClass('d-none');
    }
    else {
        appointmentPrevModalWithCancel.find('#approve-btn').addClass('d-none');
    }

    showModal(appointmentPrevModalWithCancel);
    closeModal(appointmentPrevModalWithCancel, false);
}

function historyPreviewModalShow(row) {
    const appointmentId = row.find('#appointment-id').val();

    const filteredAppointments = appointments.filter(app => app.id == appointmentId);
    const filteredPrescription = prescriptions.filter(presc => presc.appointment == appointmentId);

    appointmentPrevModal.find('.appointment-id').html(filteredAppointments[0].id);
    appointmentPrevModal.find('.doc-pfp').attr('src', `/assets/media/pfp/${filteredAppointments[0].doctors[0].pfp}`);
    appointmentPrevModal.find('.doc-name').html(`Dr. ${filteredAppointments[0].doctors[0].firstname} ${filteredAppointments[0].doctors[0].lastname}`);
    appointmentPrevModal.find('.doc-phone').html(`+63 ${filteredAppointments[0].doctors[0].phone}`);
    appointmentPrevModal.find('.doc-service').html(filteredAppointments[0].services[0].service);
    appointmentPrevModal.find('.doc-time').html(`${formatDate(filteredAppointments[0].appointment_date)} at ${formatTime(filteredAppointments[0].appointment_time)}`);
    appointmentPrevModal.find('.note').html(filteredAppointments[0].note == null ? "N/A" : filteredAppointments[0].note);

    if(filteredPrescription.length > 0) {
        appointmentPrevModal.find('.view-prescription-btn').removeClass('d-none');
    }else {
        appointmentPrevModal.find('.view-prescription-btn').addClass('d-none');
    }
    appointmentPrevModal.find('.view-prescription-btn').attr('href', `/patientViewPatientPrescription/${filteredAppointments[0].id}`);

    showModal(appointmentPrevModal);
    closeModal(appointmentPrevModal, false);
}

pendingNavBtn.click(() => {
    changeActiveContent(pendingNavBtn, pendingAppointmentCont);
});
approvedNavBtn.click(() => {
    changeActiveContent(approvedNavBtn, approvedAppointmentCont);
});
rejectedNavBtn.click(() => {
    changeActiveContent(rejectedNavBtn, rejectedAppointmentCont);
});


function changeActiveContent(activeBtn, activeCont) {
    pendingNavBtn.removeClass('active');
    approvedNavBtn.removeClass('active');
    rejectedNavBtn.removeClass('active');

    pendingAppointmentCont.addClass('d-none');
    approvedAppointmentCont.addClass('d-none');
    rejectedAppointmentCont.addClass('d-none');

    activeBtn.addClass('active');
    activeCont.removeClass('d-none');
}



// Medical Information Events
function editAllergies() {
    editAllergiesBtn.click(() => {
        allergiesIn.val(medicalInformation.allergies);
        showModal(editAllergiesModal);
        closeModal(editAllergiesModal, false);
    });

    editAllergiesModal.find('.save-btn').click(() => {
        if(isEmptyOrSpaces(allergiesIn.val())) {
            errorModal.find('.modal-text').html('Please fill-up the fields');
            showModal(errorModal);
            closeModal(errorModal, false);
            return;
        }

        if(medicalInformation.allergies != allergiesIn.val()) {
            let formData = new FormData();
            formData.append('id', medicalInformation.patient);
            formData.append('value', allergiesIn.val());
            formData.append('editType', 'allergies');

            editMedicalInfoDb(formData);
        }
    });
}

function editHeartDisease() {
    editHeartDiseasBtn.click(() => {
        heartDiseaseIn.val(medicalInformation.heart_disease);
        showModal(editHeartDiseaseModal);
        closeModal(editHeartDiseaseModal, false);
    });

    editHeartDiseaseModal.find('.save-btn').click(() => {
        if(isEmptyOrSpaces(heartDiseaseIn.val())) {
            errorModal.find('.modal-text').html('Please fill-up the fields');
            showModal(errorModal);
            closeModal(errorModal, false);
            return;
        }

        if(heartDiseaseIn.val().toLowerCase() != 'yes' && heartDiseaseIn.val().toLowerCase() != 'no') {
            console.log(heartDiseaseIn.val().toLowerCase());
            errorModal.find('.modal-text').html('Invalid input only Yes or No is accepted');
            showModal(errorModal);
            closeModal(errorModal, false);
            return;
        }

        if(medicalInformation.heart_disease != heartDiseaseIn.val()) {
            let formData = new FormData();
            formData.append('id', medicalInformation.patient);
            formData.append('value', heartDiseaseIn.val());
            formData.append('editType', 'heart_disease');

            editMedicalInfoDb(formData);
        }
    });
}

function editHighBP() {
    editHighBPBtn.click(() => {
        highBPIn.val(medicalInformation.high_blood_pressure);
        showModal(editHighBPModal);
        closeModal(editHighBPModal, false);
    });

    editHighBPModal.find('.save-btn').click(() => {
        if(isEmptyOrSpaces(highBPIn.val())) {
            errorModal.find('.modal-text').html('Please fill-up the fields');
            showModal(errorModal);
            closeModal(errorModal, false);
            return;
        }

        if(highBPIn.val().toLowerCase() != 'yes' && highBPIn.val().toLowerCase() != 'no') {
            errorModal.find('.modal-text').html('Invalid input only Yes or No is accepted');
            showModal(errorModal);
            closeModal(errorModal, false);
            return;
        }

        if(medicalInformation.high_blood_pressure != highBPIn.val()) {
            let formData = new FormData();
            formData.append('id', medicalInformation.patient);
            formData.append('value', highBPIn.val());
            formData.append('editType', 'high_blood_pressure');

            editMedicalInfoDb(formData);
        }
    });
}

function editDiabetic() {
    editDiabeticBtn.click(() => {
        diabeticIn.val(medicalInformation.diabetic);
        showModal(editDiabeticModal);
        closeModal(editDiabeticModal, false);
    });

    editDiabeticModal.find('.save-btn').click(() => {
        if(isEmptyOrSpaces(diabeticIn.val())) {
            errorModal.find('.modal-text').html('Please fill-up the fields');
            showModal(errorModal);
            closeModal(errorModal, false);
            return;
        }

        if(diabeticIn.val().toLowerCase() != 'yes' && diabeticIn.val().toLowerCase() != 'no') {
            errorModal.find('.modal-text').html('Invalid input only Yes or No is accepted');
            showModal(errorModal);
            closeModal(errorModal, false);
            return;
        }

        if(medicalInformation.diabetic != diabeticIn.val()) {
            let formData = new FormData();
            formData.append('id', medicalInformation.patient);
            formData.append('value', diabeticIn.val());
            formData.append('editType', 'diabetic');

            editMedicalInfoDb(formData);
        }
    });
}

function editSurgeries() {
    editSurgeriesBtn.click(() => {
        surgeriesIn.val(medicalInformation.surgeries);
        showModal(editSurgeriesModal);
        closeModal(editSurgeriesModal, false);
    });

    editSurgeriesModal.find('.save-btn').click(() => {
        if(isEmptyOrSpaces(surgeriesIn.val())) {
            errorModal.find('.modal-text').html('Please fill-up the fields');
            showModal(errorModal);
            closeModal(errorModal, false);
            return;
        }

        if(medicalInformation.surgeries != surgeriesIn.val()) {
            let formData = new FormData();
            formData.append('id', medicalInformation.patient);
            formData.append('value', surgeriesIn.val());
            formData.append('editType', 'surgeries');

            editMedicalInfoDb(formData);
        }
    });
}





function editMedicalInfoDb(formData) {
    $.ajax({
        type: "POST",
        url: "/PatienteditMedicalInfo",
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