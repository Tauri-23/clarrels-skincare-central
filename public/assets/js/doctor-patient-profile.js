// Modals
const editAllergiesModal = $('#profile-edit-allergies-modal');
const editHeartDiseaseModal = $('#profile-edit-heart-disease-modal');
const editHighBPModal = $('#profile-edit-high-bp-modal');
const editDiabeticModal = $('#profile-diabetic-modal');
const editSurgeriesModal = $('#profile-edit-surgeries-modal');


// Containers 
const RecordsCont = $('#record-content');
const medInfoCont = $('#med-info-cont');

// Btns
const historyNavBtn = $('#history-btn');
const medInfoBtn = $('#med-info-btn');

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


// Function Calls
frontEndEvents();
editAllergies();
editHighBP();
editDiabetic();
editSurgeries();
editHeartDisease();


function frontEndEvents() {
    historyNavBtn.click(() => {
        window.location.href = `/DoctorViewPatient/${patient.id}/default`;
        // changeContent(historyNavBtn, RecordsCont);
    });
    medInfoBtn.click(() => {
        window.location.href = `/DoctorViewPatient/${patient.id}/medInfo`;
        // changeContent(medInfoBtn, medInfoCont);
    })
    
    
    function changeContent(activeLink, activeCont) {
        RecordsCont.addClass('d-none');
        medInfoCont.addClass('d-none');
    
        historyNavBtn.removeClass('active');
        medInfoBtn.removeClass('active');
    
        activeLink.addClass('active');
        activeCont.removeClass('d-none');
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