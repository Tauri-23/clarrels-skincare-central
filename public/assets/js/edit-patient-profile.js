// Modals
const editNameModal = $('#profile-edit-name-modal');
const editEmailModal = $('#profile-edit-email-modal');
const editPhoneModal = $('#profile-edit-phone-modal');
const editPasswordModal = $('#profile-edit-password-modal');
const editAddressModal = $('#profile-edit-address-modal');
const editPFPModal = $('#profile-edit-pfp-modal');

const successModal = $('#success-modal');
const errorModal = $('#error-modal');

// Btns
const editPfpBtn = $('#edit-pfp-btn');
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
            errorModal.find('.modal-text').html('New password and confirm password did not match.');
            showModal(errorModal);
            closeModal(errorModal, false);
            return;
        }

        if(oldPassIn.val() != oldPass) {
            errorModal.find('.modal-text').html('Incorrect old password.');
            showModal(errorModal);
            closeModal(errorModal, false);
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

editAddressBtn.click(() => {
    // inputs
    addressIn = editAddressModal.find('#address-in');

    saveBtn = editAddressModal.find('.save-btn');

    addressIn.val(oldAddress);

    showModal(editAddressModal);
    closeModal(editAddressModal, false);

    saveBtn.click(()=> {
        if(isEmptyOrSpaces(addressIn.val())) {
            return;
        }

        if(checkTheChanges([addressIn], [oldAddress]) > 0) {

            let formData = new FormData();
            formData.append('patId', patId);
            formData.append('address', addressIn.val());
            formData.append('editType', "Address");

            editProfileDb(formData);
            
        }
    });
});

editPfpBtn.click(() => {
    // inputs
    pfpIn = editPFPModal.find('#pfp-in');
    pfpPrev = editPFPModal.find('#prevPFP');

    saveBtn = editPFPModal.find('.save-btn');

    pfpPrev.attr('src', `/assets/media/pfp/${oldPfp}`);

    showModal(editPFPModal);
    closeModal(editPFPModal, false);

    pfpIn.change(function() {
        if (this.files && this.files[0]) {
            const src = URL.createObjectURL(this.files[0]);
            pfpPrev.attr('src', src);
        }
    });

    saveBtn.click(()=> {
        if(isEmptyOrSpaces(pfpIn.val())) {
            alert('empty')
            return;
        }

        let formData = new FormData();
        formData.append('patId', patId);
        formData.append('file', pfpIn[0].files[0]);
        formData.append('editType', "PFP");

        editProfileDb(formData);
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