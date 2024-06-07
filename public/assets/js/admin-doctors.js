// btns
const deleteDoctorBtns = $('.del-doctor-btn');

// Modals
const infoYNModal = $('.info-yn-modal');
const successModal = $('#success-modal');
const errorModal = $('#error-modal');


let docId = '';
deleteDoctorBtns.click(function() {
    docId = $(this).attr('id');

    infoYNModal.find('.modal-text').html(`Do you want to delete doctor (${docId}) ?`);
    showModal(infoYNModal);
    closeModal(infoYNModal, false);
});
infoYNModal.find('.yes-btn').click(() => {
    let formData = new FormData();
    formData.append('id', docId);
    genericAjax('/AdminDeleteDoctor', formData);
});