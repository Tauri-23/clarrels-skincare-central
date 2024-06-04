//btns
const timeBtns = $('.time-btn');
const submitBtn = $('#submit-btn');
const clearBtn = $('#clear-btn');


//Inputs
const patientNameIn = $('#patient-name-in');
const phoneIn = $('#phone-in');
const dateIn = $('#appointment-date-in');
const serviceIn = $('#service-in');
const serviceTypeIn = $('#service-type-in');
const noteIn = $('#note-in');

//modals
const successModal = $('#success-modal');
const errorModal = $('#error-modal');


//selected Time
let selectedTime = "";



// function calls
formatPhoneNumIn(phoneIn);


/*
|----------------------------------------
| Check Sched is full
|----------------------------------------
*/
let filteredAppointments = [];

// get the appointment Date
dateIn.change(function() {
    disableTimeBtn();
});

// Selected Service
serviceTypeIn.change(function() {
    const selectedServiceType = $(this).val();

    if(selectedServiceType == 'invalid') {
        serviceIn.attr("disabled", true);
        serviceIn.val('invalid').change();
        return;
    }

    const filteredService = services.filter(service => service.service_type == selectedServiceType);
    serviceIn.empty().append('<option value="invalid">---Select Services---</option>');

    filteredService.forEach(service=> {
        serviceIn.append(`<option value="${service.id}">${service.service}</option>`);
    });

    serviceIn.removeAttr('disabled');

    disableTimeBtn();
});


function disableTimeBtn() {
    filteredAppointments = pendingAppointments.filter(col => col.service_type == serviceTypeIn.val() && col.appointment_date == dateIn.val());

    timeBtns.each(function(index, btn) {

        $(btn).removeClass('disabled');
        
        filteredAppointments.forEach(element => {
            
            if($(btn).attr('id') == element.appointment_time) {
                if($(btn).attr('id') == selectedTime) {
                    selectedTime = '';
                }
                console.log(element);
                $(btn).addClass('disabled');
                $(btn).removeClass('active');
            }
        });
        
    });

    console.log(selectedTime);
}




serviceTypeIn.change(function() {
    const selectedServiceType = $(this).val();

    if(selectedServiceType == 'invalid') {
        serviceIn.attr("disabled", true);
        serviceIn.val('invalid').change();
        return;
    }

    const filteredService = services.filter(service => service.service_type == selectedServiceType);
    serviceIn.empty().append('<option value="invalid">---Select Services---</option>');

    filteredService.forEach(service=> {
        serviceIn.append(`<option value="${service.id}">${service.service}</option>`);
    });

    serviceIn.removeAttr('disabled');
});

submitBtn.click(() => {
    let today = new Date();
    today.setHours(0, 0, 0, 0);
    let inputDate = new Date(dateIn.val());
    let tomorrow = new Date(today);
    tomorrow.setDate(today.getDate() + 1);

    if(isEmptyOrSpaces(selectedTime) || isEmptyOrSpaces(patientNameIn.val()) || isEmptyOrSpaces(phoneIn.val())
        || isEmptyOrSpaces(dateIn.val()) || serviceTypeIn.val() == 'invalid' || serviceIn.val() == 'invalid') {
        errorModal.find('.modal-text').html('Please fill up all the fields.');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    if(inputDate.getTime() < tomorrow.getTime()) {
        errorModal.find('.modal-text').html('You can only book tomorrow and beyond.');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    let formData = new FormData();
    formData.append('patientName', patientNameIn.val());
    formData.append('phone', phoneIn.val());
    formData.append('serviceType', serviceTypeIn.val());
    formData.append('service', serviceIn.val());
    formData.append('date', dateIn.val());
    formData.append('time', selectedTime);
    formData.append('note', noteIn.val());

    $.ajax({
        type: "POST",
        url: "/addAppointment",
        processData: false,
        contentType: false,
        data: formData,
        success: function(response) {
            if(response.status == 200) {
                successModal.find('.modal-text').html('Appointment added successfully please check your email.');
                showModal(successModal);
                closeModalRedirect(successModal, '/PatientAppointments');
            } else {
                errorModal.find('.modal-text').html('Failed booking appointment please try again later.');
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
});

clearBtn.click(() => {
    serviceIn.val('invalid');
    serviceTypeIn.val('invalid');
    dateIn.val('');
    noteIn.val('');
    selectedTime = "";
    removeAndReplaceActiveTimeBtn(null)
});



// Time Btns Functions
timeBtns.click(function() {
    const btn = $(this);
    if(!btn.hasClass('disabled')) {
        selectedTime = btn.attr('id');
        removeAndReplaceActiveTimeBtn($(this));
        console.log(selectedTime);
    }
});

function removeAndReplaceActiveTimeBtn(active) {
    timeBtns.removeClass('active');
    active.addClass('active');
}