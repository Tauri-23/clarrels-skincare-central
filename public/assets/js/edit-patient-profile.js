// Modals
const editNameModal = $('#profile-edit-name-modal');
const editEmailModal = $('#profile-edit-email-modal');
const editPhoneModal = $('#profile-edit-phone-modal');
const editPasswordModal = $('#profile-edit-phone-modal');
const editAddressModal = $('#profile-edit-email-modal');

const successModal = $('#success-modal');
const errorModal = $('#error-modal');

// Btns
const editNameBtn = $('#edit-name-btn');
const editEmailBtn = $('#edit-email-btn');
const editPhoneBtn = $('#edit-phone-btn');
const editPasswordBtn = $('#edit-password-btn');
const editAddressBtn = $('#edit-address-btn');



editNameBtn.click(() => {
    // inputs
    fnameIn = editNameModal.find('#fname-in');
    lnameIn = editNameModal.find('#lname-in');

    saveBtn = editNameModal.find('.save-btn');

    fnameIn.val(oldFname);
    lnameIn.val(oldLname);

    showModal(editNameModal);
    closeModal(editNameModal, false);

    saveBtn.click(()=> {
        if(isEmptyOrSpaces(fnameIn.val()) || isEmptyOrSpaces(lnameIn.val())) {
            return;
        }

        if(checkTheChanges([fnameIn, lnameIn], [oldFname, oldLname]) > 0) {

            let formData = new FormData();
            formData.append('patId', patId);
            formData.append('fname', fnameIn.val());
            formData.append('lname', lnameIn.val());
            formData.append('editType', "Name");

            editProfileDb(formData);
            
        }
    });
});

editEmailBtn.click(() => {
    // inputs
    emailIn = editEmailModal.find('#email-in');

    saveBtn = editEmailModal.find('.save-btn');

    emailIn.val(oldEmail);

    showModal(editEmailModal);
    closeModal(editEmailModal, false);

    saveBtn.click(()=> {
        if(isEmptyOrSpaces(emailIn.val())) {
            return;
        }

        if(checkTheChanges([emailIn], [oldEmail]) > 0) {

            let formData = new FormData();
            formData.append('patId', patId);
            formData.append('email', emailIn.val());
            formData.append('editType', "Email");

            editProfileDb(formData);
            
        }
    });
});

editPhoneBtn.click(() => {
    // inputs
    phoneIn = editPhoneModal.find('#phone-in');

    saveBtn = editPhoneModal.find('.save-btn');

    phoneIn.val(oldPhone);

    formatPhoneNumIn(phoneIn);

    showModal(editPhoneModal);
    closeModal(editPhoneModal, false);

    saveBtn.click(()=> {
        if(isEmptyOrSpaces(phoneIn.val())) {
            return;
        }

        if(checkTheChanges([phoneIn], [oldPhone]) > 0) {

            let formData = new FormData();
            formData.append('patId', patId);
            formData.append('phone', phoneIn.val());
            formData.append('editType', "Phone");

            editProfileDb(formData);
            
        }
    });
});

editPasswordBtn.click(() => {
    // inputs
    newPassIn = editPasswordModal.find('#new-pass-in');
    conNewPassIn = editPasswordModal.find('#con-new-pass-in');
    oldPassIn = editPasswordModal.find('#old-pass-in');

    saveBtn = editPasswordModal.find('.save-btn');

    showModal(editPasswordModal);
    closeModal(editPasswordModal, false);

    saveBtn.click(()=> {
        if(isEmptyOrSpaces(newPassIn.val()) || isEmptyOrSpaces(conNewPassIn.val()) 
            || isEmptyOrSpaces(oldPassIn.val())) {
            return;
        }

        if(newPassIn.val() != conNewPassIn.val()) {
            return;
        }

        if(checkTheChanges([newPassIn], [oldPass]) > 0) {

            let formData = new FormData();
            formData.append('patId', patId);
            formData.append('password', newPassIn.val());
            formData.append('editType', "Password");

            editProfileDb(formData);
            
        }
    });
});


function editProfileDb(formData) {
    $.ajax({
        type: "POST",
        url: "/editPatientProfile",
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
                alert('appointment failed to add');
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('error');
        }
    });
}