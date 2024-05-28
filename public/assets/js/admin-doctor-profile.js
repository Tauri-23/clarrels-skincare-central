// Btns
const editNameBtn = $('#edit-name-btn');
const editEmailBtn = $('#edit-email-btn');
const editPhoneBtn = $('#edit-phone-btn');

//Modals
const editNameModal = $('#profile-edit-name-modal');
const editEmailModal = $('#profile-edit-email-modal');
const editPhoneModal = $('#profile-edit-phone-modal');

const successModal = $('#success-modal');
const errorModal = $('#error-modal');

// inputs

editNameBtn.click(() => {
    // inputs
    let fnameIn = editNameModal.find('#fname-in');
    let lnameIn = editNameModal.find('#lname-in');

    let saveBtn = editNameModal.find('.save-btn');

    fnameIn.val(doctor.firstname);
    lnameIn.val(doctor.lastname);

    showModal(editNameModal);
    closeModal(editNameModal, false);

    saveBtn.click(()=> {
        if(isEmptyOrSpaces(fnameIn.val()) || isEmptyOrSpaces(lnameIn.val())) {
            return;
        }

        if(checkTheChanges([fnameIn, lnameIn], [doctor.firstname, doctor.lastname]) > 0) {

            let formData = new FormData();
            formData.append('docId', doctor.id);
            formData.append('fname', fnameIn.val());
            formData.append('lname', lnameIn.val());
            formData.append('editType', "name");

            editProfileDb(formData);
            
        }
    });
});
editEmailBtn.click(() => {
    // inputs
    let emailIn = editEmailModal.find('#email-in');

    let saveBtn = editEmailModal.find('.save-btn');

    emailIn.val(doctor.email);

    showModal(editEmailModal);
    closeModal(editEmailModal, false);

    saveBtn.click(()=> {
        if(isEmptyOrSpaces(emailIn.val())) {
            return;
        }

        if(checkTheChanges([emailIn], [doctor.email]) > 0) {

            let formData = new FormData();
            formData.append('docId', doctor.id);
            formData.append('email', emailIn.val());
            formData.append('editType', "email");

            editProfileDb(formData);
            
        }
    });


});

editPhoneBtn.click(() => {
    // inputs
    let phoneIn = editPhoneModal.find('#phone-in');

    formatPhoneNumIn(phoneIn);

    let saveBtn = editPhoneModal.find('.save-btn');

    phoneIn.val(doctor.phone);

    showModal(editPhoneModal);
    closeModal(editPhoneModal, false);

    saveBtn.click(()=> {
        if(isEmptyOrSpaces(phoneIn.val())) {
            return;
        }

        if(checkTheChanges([phoneIn], [doctor.phone]) > 0) {

            let formData = new FormData();
            formData.append('docId', doctor.id);
            formData.append('phone', phoneIn.val());
            formData.append('editType', "phone");

            editProfileDb(formData);
            
        }
    });


});











function editProfileDb(formData) {
    $.ajax({
        type: "POST",
        url: "/adminEditDoctorProfile",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                successModal.find('.modal-text').html('Saved Changes.');
                showModal(successModal);
                closeModal(successModal, true);
            } else {
                errorModal.find('.modal-text').html('Failed saving changes please try again later.');
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