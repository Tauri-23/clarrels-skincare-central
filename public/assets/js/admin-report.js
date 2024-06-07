// Btns
const genenrateReportBtn = $('#generate-report-btn');

// Modals
const infoYNModal = $('.info-yn-modal');
const successModal = $('#success-modal');
const errorModal = $('#error-modal');

// inputs
const monthIn = $('#month-in');
const yearIn = $('#year-in');

genenrateReportBtn.click(() => {
    let today = new Date();
    if(checkDate(monthIn.val(), yearIn.val()) > today) {
        errorModal.find('.modal-text').html(`Report for period ${monthIn.val()} - ${yearIn.val()} is currently not avaliable.`);
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }
    window.location.href = `/AdminGenerateReport/${monthIn.val()}/${yearIn.val()}`;
});