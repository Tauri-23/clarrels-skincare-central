//modals
const appointmentPrevModal = $('#appointment-prev-modal');
const editAllergiesModal = $('#profile-edit-allergies-modal');
const editHeartDiseaseModal = $('#profile-edit-heart-disease-modal');
const editHighBPModal = $('#profile-edit-high-bp-modal');
const editDiabeticModal = $('#profile-diabetic-modal');
const editSurgeriesModal = $('#profile-edit-surgeries-modal');

const successModal = $('#success-modal');
const errorModal = $('#error-modal');

//appointments
const appointmentsColumns = $('.appointment-column');
const appointmentsHistoryColumns = $('.history-column');

// Btns
const editAllergiesBtn = $('#edit-allergies-btn');
const editHeartDiseasBtn = $('#edit-heart-disease-btn');
const editHighBPBtn = $("#edit-h-blood-p-btn");
const editDiabeticBtn = $('#edit-diabetic-btn')
const editSurgeriesBtn = $('#edit-surgeries-btn')


// Inputs
const allergiesIn = $('#allergies-in');
const heartDiseaseIn = $('#heart-disease-in');
const highBPIn = $('#high-bp-in');
const diabeticIn = $('#diabetic-in');
const surgeriesIn = $('#surgeries-in');




// function calls
frontEndEvents();
editAllergies();
editHighBP();
editDiabetic();
editSurgeries();
editHeartDisease();



function frontEndEvents() {
    appointmentsColumns.click(function() {
        previewModalShow($(this));
    });
    appointmentsHistoryColumns.click(function() {
        previewModalShow($(this));
    })
    
    function previewModalShow(column) {
        const appointmentId = column.find('#appointment-id').val();
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
    }
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