// Modals
const successModal = $('#success-modal');
const errorModal = $('#error-modal');


//Btns
const signinBtn = $('#signin-btn');

const seePassBtns = $('.see-pass');

const forgotPassBtn = $('#forgot-pass-btn');

//inputs
const unameIn = $('#uname-in');
const passIn = $('#pass-in');

// Boxes
const loginBox = $('#login-box');
const fpEmailBox = $('#fp-email-box');
const fpOtpBox = $('#fp-otp-box');
const fpChangePassBox = $('#fp-change-pass-box');


signinBtn.click(function() {
    if(isEmptyOrSpaces(unameIn.val()) || isEmptyOrSpaces(passIn.val())) {
        return;
    }

    let formData = new FormData();
    formData.append('uname', unameIn.val());
    formData.append('pass', passIn.val());

    $.ajax({
        url: '/signinPatientPost',
        method: 'POST',
        processData: false,
        contentType: false,
        data: formData,
        success: function (response) {
            if(response.status == 200) {
                window.location.href = '/PatientDash';
            } 
            else if(response.status == 201) {
                window.location.href = '/DoctorDash';
            }
            else if(response.status == 202) {
                window.location.href = '/AdminDash';
            }
            else {
                alert("Credential Doesn't Match")
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('error');
        }
    });
});

// See Password
seePassBtns.click(function() {
    let input = $(this).siblings('.password-input');
    let type = input.attr('type') === 'password' ? 'text' : 'password';
    if (type === 'password') {
        $(this).removeClass('bi-eye-slash-fill').addClass('bi-eye-fill');
    } else {
        $(this).removeClass('bi-eye-fill').addClass('bi-eye-slash-fill');
    }
    input.attr('type', type);
})




// Forgot Password
// inputs Forgot password
const fpEmailIn = fpEmailBox.find('#email-in');
const fpOTPIn = fpOtpBox.find('#otp-in');
const fpPassIn = fpChangePassBox.find('#pass-in');
const fpConPassIn = fpChangePassBox.find('#con-pass-in');


forgotPassBtn.click(() => {
    changeActiveBox(fpEmailBox);
});

// Email 
fpEmailBox.find('#next-btn').click(() => {
    if(isEmptyOrSpaces(fpEmailIn.val())) {
        errorModal.find('.modal-text').html('Please fill up email.');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    let formData = new FormData();
    formData.append('type', 'sendOTP');
    formData.append('email', fpEmailIn.val());
    changePassAJax(formData, function(response) {

        successModal.find('.modal-text').html(response.message);
        showModal(successModal);
        closeModal(successModal, false);

        changeActiveBox(fpOtpBox);
    });
});

// OTP
fpOtpBox.find('#next-btn').click(() => {
    if(isEmptyOrSpaces(fpOTPIn.val())) {
        errorModal.find('.modal-text').html('Please fill up OTP.');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    let formData = new FormData();
    formData.append('type', 'checkOTP');
    formData.append('otp', fpOTPIn.val());
    changePassAJax(formData, function(response) {
        changeActiveBox(fpChangePassBox);
    });
});

// Change Password
fpChangePassBox.find('#next-btn').click(() => {
    if(isEmptyOrSpaces(fpPassIn.val()) || isEmptyOrSpaces(fpConPassIn.val())) {
        errorModal.find('.modal-text').html('Please fill up all the fields.');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    if(fpPassIn.val() != fpConPassIn.val()) {
        errorModal.find('.modal-text').html(`Password and Confirm Password doesn't match.`);
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    let formData = new FormData();
    formData.append('type', 'changePass');
    formData.append('password', fpPassIn.val());
    formData.append('email', fpEmailIn.val());

    changePassAJax(formData, function(response) {
        successModal.find('.modal-text').html(response.message);
        showModal(successModal);
        closeModal(successModal, true);
    });
});









function changePassAJax(formData, callback) {
    $.ajax({
        url: '/changePassPost',
        method: 'POST',
        processData: false,
        contentType: false,
        data: formData,
        success: function (response) {
            if(response.status == 200) {
                callback(response);
            }
            else {
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

function changeActiveBox(activeBox) {
    loginBox.addClass('d-none');
    fpEmailBox.addClass('d-none');
    fpOtpBox.addClass('d-none');
    fpChangePassBox.addClass('d-none');

    activeBox.removeClass('d-none');
}