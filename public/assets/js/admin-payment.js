// rows
const pendingPaymentRows = $('.pending-payment-row');

// Modals
const adminInputPayment = $('#admin-input-payment-modal');





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

