// rows
const pendingPaymentRows = $('.pending-payment-row');
const paidPaymentRows = $('.paid-payment-row');

// Modals
const adminInputPayment = $('#admin-input-payment-modal');
const adminReceiptModal = $('#admin-receipt-modal');

const infoYNModal = $('.info-yn-modal');
const successModal = $('#success-modal');
const errorModal = $('#error-modal');

// Btns
const printBtn = $('.generate-receipt-btn');





// Pay Appointments
let filteredPendingPay = [];
pendingPaymentRows.click(function() {
    filteredPendingPay = pendingPayments.filter(col => col.id == $(this).attr('id'));

    console.log(filteredPendingPay);

    adminInputPayment.find('.service').html(filteredPendingPay[0].services[0].service);
    adminInputPayment.find('.appointment-id').html(filteredPendingPay[0].id);
    adminInputPayment.find('.service-price').html(`₱ ${formatCurrency(filteredPendingPay[0].services[0].price)}`);

    showModal(adminInputPayment);
    closeModal(adminInputPayment, false);
})
adminInputPayment.find('.generate-receipt-btn').click(() => {
    //inputs
    const amountPaidIn = adminInputPayment.find('#paid-in');

    if(isEmptyOrSpaces(amountPaidIn.val())) {
        errorModal.find('.modal-text').html('Please fill-up the fields.');
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    if(amountPaidIn.val() < filteredPendingPay[0].services[0].price) {
        errorModal.find('.modal-text').html(`Minimum amount to pay is ₱ ${formatCurrency(filteredPendingPay[0].services[0].price)}.`);
        showModal(errorModal);
        closeModal(errorModal, false);
        return;
    }

    let formData = new FormData();
    formData.append('appointmentId', filteredPendingPay[0].id);
    formData.append('service_price', filteredPendingPay[0].services[0].price);
    formData.append('amount_paid', amountPaidIn.val());
    formData.append('change', amountPaidIn.val() - filteredPendingPay[0].services[0].price);

    genericAjaxCallback('/addReceipt', formData, function(response) {
        showReceipt(response.reference_num, 
            filteredPendingPay[0].id, 
            filteredPendingPay[0].services[0].service,
            `Dr. ${filteredPendingPay[0].doctors[0].firstname} ${filteredPendingPay[0].doctors[0].lastname}`,
            filteredPendingPay[0].services[0].price,
            amountPaidIn.val(),
            true
        );
    });
});


let filteredReceipt = [];
paidPaymentRows.click(function() {
    filteredReceipt = receipts.filter(col => col.appointment == $(this).attr('id'));

    showReceipt(
        filteredReceipt[0].id, 
        filteredReceipt[0].appointment, 
        filteredReceipt[0].appointments.services[0].service, 
        `${filteredReceipt[0].appointments.doctors[0].firstname} ${filteredReceipt[0].appointments.doctors[0].lastname}`, 
        filteredReceipt[0].service_price, 
        filteredReceipt[0].amount_paid, 
        false
    );
});





printBtn.on('click', () => {
    const elements = $('#appointment-receipt');

    // Generate a timestamp or any unique string
    const timestamp = new Date().toISOString().replace(/[-T:Z]/g, '');

    // Set the filename with the desired name and the timestamp
    const filename = `receipt_${timestamp}.pdf`;

    // Print the container
    elements.printThis({
        pageTitle: filename,
        importCSS: true,
        importStyle: true,
        loadCSS: ['/assets/css/app.css', '/assets/css/elements.css', '/assets/css/receipt.css'],
        beforePrint: function () {
            document.title = filename;
        }
    });
});






function showReceipt(referenceNum, appointmentId, service, doctor, service_price, amount_paid, refreshClose) {
    adminReceiptModal.find('#reference-number').html(referenceNum);
    adminReceiptModal.find('#appointment-id').html(appointmentId);
    adminReceiptModal.find('#service').html(service);
    adminReceiptModal.find('#doctor').html(doctor);

    adminReceiptModal.find('#service-price').html(formatCurrency(service_price));
    adminReceiptModal.find('#amount-paid').html(formatCurrency(amount_paid));
    adminReceiptModal.find('#change').html(formatCurrency(amount_paid - service_price));

    showModal(adminReceiptModal);
    closeModal(adminReceiptModal, refreshClose);
}

