// Modals
const profileEditPasswordModal = $('#profile-edit-password-modal');
const editPFPModal = $('#profile-edit-pfp-modal');

const successModal = $('#success-modal');
const errorModal = $('#error-modal');

// Btns
const editPasswordBtn = $('#edit-password-btn');
const editPFPBtn = $('#edit-pfp-btn');

// Inputs
const newPassIn = $('#new-pass-in');
const conNewPassIn = $('#con-new-pass-in');
const oldPassIn = $('#old-pass-in');




/*
|----------------------------------------
| Edit Password
|----------------------------------------
*/
editPFPBtn.click(() => {
    // inputs
    pfpIn = editPFPModal.find('#pfp-in');
    pfpPrev = editPFPModal.find('#prevPFP');

    saveBtn = editPFPModal.find('.save-btn');

    pfpPrev.attr('src', `/assets/media/pfp/${doctor.pfp}`);
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
            return;
        }

        let formData = new FormData();
        formData.append('file', pfpIn[0].files[0]);
        formData.append('editType', "PFP");

        changeInfoDB(formData);
    });
});





/*
|----------------------------------------
| Edit Password
|----------------------------------------
*/
editPasswordBtn.click(() => {
    showModal(profileEditPasswordModal);
    closeModal(profileEditPasswordModal, false);
});
profileEditPasswordModal.find('.save-btn').click(() => {
    if(isEmptyOrSpaces(newPassIn.val()) || isEmptyOrSpaces(conNewPassIn.val()) || isEmptyOrSpaces(oldPassIn.val())) {
        errorModal.find('.modal-text').html('Please fill-up all the fields.');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }
    if(oldPassIn.val() != doctor.password) {
        errorModal.find('.modal-text').html('Old password incorrect.');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }
    if(newPassIn.val() == doctor.password) {
        errorModal.find('.modal-text').html('New password cannot be the same as your old password.');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }
    if(newPassIn.val() != conNewPassIn.val()) {
        errorModal.find('.modal-text').html(`Password and Confirm password doesn't match.`);
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    let formData = new FormData();
    formData.append('editType', "password");
    formData.append('value', newPassIn.val());

    changeInfoDB(formData);
});





/*
|----------------------------------------
| Ajax
|----------------------------------------
*/
function changeInfoDB(formData) {
    $.ajax({
        type: "POST",
        url: "/editDoctorProfile",
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