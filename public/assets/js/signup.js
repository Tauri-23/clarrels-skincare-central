//Btns
const signupBtn = $('#signup-btn');

// Modals
const successModal = $('#success-modal');
const errorModal = $('#error-modal');

//inputs
const fnameIn = $('#fname-in');
const mnameIn = $('#mname-in');
const lnameIn = $('#lname-in');
const unameIn = $('#uname-in');
const passIn = $('#pass-in');
const conPassIn = $('#conpass-in');
const emailIn = $('#email-in'); 
const phoneIn = $('#phone-in');
const bdateIn = $('#bdate-in');
const genderIn = $('#gender-in');
const addressIn = $('#address-in');


formatPhoneNumIn(phoneIn);

signupBtn.click(function() {
    if(isEmptyOrSpaces(fnameIn.val()) || isEmptyOrSpaces(lnameIn.val()) || isEmptyOrSpaces(unameIn.val())
    || isEmptyOrSpaces(passIn.val()) || isEmptyOrSpaces(conPassIn.val()) || isEmptyOrSpaces(emailIn.val())
    || isEmptyOrSpaces(phoneIn.val()) || isEmptyOrSpaces(bdateIn.val())
    || isEmptyOrSpaces(genderIn.val()) || isEmptyOrSpaces(addressIn.val())) {
        return;
    }

    if(passIn.val() != conPassIn.val()) {
        return;
    }

    let formData = new FormData();
    formData.append('fname', fnameIn.val());
    formData.append('mname', mnameIn.val());
    formData.append('lname', lnameIn.val());
    formData.append('uname', unameIn.val());
    formData.append('pass', passIn.val());
    formData.append('email', emailIn.val());
    formData.append('phone', phoneIn.val());
    formData.append('bdate', bdateIn.val());
    formData.append('gender', genderIn.val());
    formData.append('address', addressIn.val());

    $.ajax({
        url: '/signupPatientPost',
        method: 'POST',
        processData: false,
        contentType: false,
        data: formData,
        success: function (response) {
            if(response.status == 200) {
                successModal.find('.modal1-txt').html('Account successfully created.');
                showModal(successModal);
                closeModalRedirect(successModal, '/signinPatient');
            } else {
                alert("Something went wrong.")
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('error');
        }
    });
});