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

const allergiesIn = $('#allergies-in'); 

const surgeriesIn = $('#surgeries-in');



formatPhoneNumIn(phoneIn);

signupBtn.click(function() {
    const heartDiseaseIn = $("input[name='h-disease-in']:checked");
    const hBloodIn = $("input[name='h-blood-in']:checked");
    const diabeticIn = $("input[name='diabetic-in']:checked");
    
    if(isEmptyOrSpaces(fnameIn.val()) || isEmptyOrSpaces(lnameIn.val()) || isEmptyOrSpaces(unameIn.val())
    || isEmptyOrSpaces(passIn.val()) || isEmptyOrSpaces(conPassIn.val()) || isEmptyOrSpaces(emailIn.val())
    || isEmptyOrSpaces(phoneIn.val()) || isEmptyOrSpaces(bdateIn.val())
    || isEmptyOrSpaces(genderIn.val()) || isEmptyOrSpaces(addressIn.val())

    || isEmptyOrSpaces(allergiesIn.val()) || isEmptyOrSpaces(heartDiseaseIn.val())
    || isEmptyOrSpaces(hBloodIn.val()) || isEmptyOrSpaces(diabeticIn.val())
    || isEmptyOrSpaces(surgeriesIn.val())) {
        errorModal.find('.modal-text').html('Please fill-up the required fields.');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    if(passIn.val() != conPassIn.val()) { //Password and Confirm password
        errorModal.find('.modal-text').html('Password and confirm password are incorrect.');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    if(phoneIn.val().length < 10) { // Phone validation
        errorModal.find('.modal-text').html('Invalid phone number.');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    if(!isEmail(emailIn.val())) { // Email validation
        errorModal.find('.modal-text').html('Invalid email.');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    if(calculateAge(bdateIn.val()) < 3) { // age validation
        errorModal.find('.modal-text').html('The minimum age is 3 years old and above.');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    // if(heartDiseaseIn.val().toLowerCase() !== 'no' && heartDiseaseIn.val().toLowerCase() !== 'yes') { // Heart Disease answer validation
    //     errorModal.find('.modal-text').html('Invalid Heart diease input.');
    //     showModal(errorModal);
    //     closeModal(errorModal, false);
    //     return;
    // }

    // if(hBloodIn.val().toLowerCase() !== 'no' && hBloodIn.val().toLowerCase() !== 'yes') { // Highblood answer validation
    //     errorModal.find('.modal-text').html('Invalid Highblood input.');
    //     showModal(errorModal);
    //     closeModal(errorModal, false);
    //     return;
    // }

    // if(diabeticIn.val().toLowerCase() !== 'no' && diabeticIn.val().toLowerCase() !== 'yes') { // Diabetic answer validation
    //     errorModal.find('.modal-text').html('Invalid Diabetic input.');
    //     showModal(errorModal);
    //     closeModal(errorModal, false);
    //     return;
    // }



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

    formData.append('allergies', allergiesIn.val());
    formData.append('heartDisease', heartDiseaseIn.val());
    formData.append('hBlood', hBloodIn.val());
    formData.append('diabetic', diabeticIn.val());
    formData.append('surgeries', surgeriesIn.val());

    $.ajax({
        url: '/signupPatientPost',
        method: 'POST',
        processData: false,
        contentType: false,
        data: formData,
        success: function (response) {
            if(response.status == 200) {
                successModal.find('.modal1-txt').html(response.message);
                showModal(successModal);
                closeModalRedirect(successModal, '/signinPatient');
            } else {
                errorModal.find('.modal1-txt').html(response.message);
                showModal(errorModal);
                closeModal(errorModal, false);
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert('error');
        }
    });
});