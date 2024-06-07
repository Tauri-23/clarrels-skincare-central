// btns
const addDoctorBtn = $('#add-doctor-btn');

// Inputs
const fnameIn = $('#fname-in');
const lnameIn = $('#lname-in');
const prcIn = $('#prc-in');
const doctorTypeIn = $('#doctor-type-in');
const unameIn = $('#uname-in');
const emailIn = $('#email-in');
const phoneIn = $('#phone-in');
const passIn = $('#pass-in');
const conPassIn = $('#con-pass-in');
const bdateIn = $('#bdate-in');
const genderIn = $('#gender-in');
const addressIn = $('#address-in');
const signatureIn = $('#signature-in');


// Modals
const infoYNModal = $('.info-yn-modal');
const successModal = $('#success-modal');
const errorModal = $('#error-modal');





formatPhoneNumIn(phoneIn);





// 
addDoctorBtn.click(() => {
    if(
        isEmptyOrSpaces(fnameIn.val()) || isEmptyOrSpaces(lnameIn.val()) || isEmptyOrSpaces(prcIn.val()) || isEmptyOrSpaces(unameIn.val()) || 
        isEmptyOrSpaces(emailIn.val()) || isEmptyOrSpaces(phoneIn.val()) || isEmptyOrSpaces(passIn.val()) || isEmptyOrSpaces(conPassIn.val()) || 
        isEmptyOrSpaces(bdateIn.val()) ||  isEmptyOrSpaces(addressIn.val()) || isEmptyOrSpaces(signatureIn.val())
    ) {
        errorModal.find('.modal-text').html(`Please fill-up all the fields.`);
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    if(!isEmail(emailIn.val())) {
        errorModal.find('.modal-text').html(`Invalid email.`);
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    if(phoneIn.val().length < 10) {
        errorModal.find('.modal-text').html(`Invalid phone number.`);
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    if(conPassIn.val() !== passIn.val()) {
        errorModal.find('.modal-text').html(`Password and confirm password doesn't match.`);
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    let formData = new FormData();
    formData.append('file', signatureIn[0].files[0]);
    formData.append('fname', fnameIn.val());
    formData.append('lname', lnameIn.val());
    formData.append('prc', prcIn.val());
    formData.append('doctorType', doctorTypeIn.val());
    formData.append('uname', unameIn.val());
    formData.append('email', emailIn.val());
    formData.append('phone', phoneIn.val());
    formData.append('pass', passIn.val());
    formData.append('bdate', bdateIn.val());
    formData.append('gender', genderIn.val());
    formData.append('address', addressIn.val());


    genericAjax('/AdminAddDoctorPost', formData);
});
