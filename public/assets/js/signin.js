//Btns
const signinBtn = $('#signin-btn');

//inputs
const unameIn = $('#uname-in');
const passIn = $('#pass-in');


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