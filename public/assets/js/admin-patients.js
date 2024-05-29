// Btns
const patientDeleteBtns = $('.delete-patient-btn');

// Modals
const infoYNModal = $('.info-yn-modal');
const successModal = $('#success-modal');
const errorModal = $('#error-modal');

let patientToBeDelete = '';

patientDeleteBtns.click(function() {
    patientToBeDelete = $(this).attr('id');

    infoYNModal.eq(0).find('.modal-text').html(`Do you want to delete patient (${patientToBeDelete}) ?`);
    showModal(infoYNModal.eq(0));
    closeModal(infoYNModal.eq(0), false);
});

infoYNModal.eq(0).find('.modal-close-btn').click(() => {
    closeModalNoEvent(infoYNModal.eq(0));
});

infoYNModal.eq(0).find('.yes-btn').click(() => {
    let formData = new FormData();
    formData.append('patientId', patientToBeDelete);
    deleteToDb(formData);
});


function deleteToDb(formData) {
    $.ajax({
        type: "POST",
        url: "/AdminDeletePatientPost",
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