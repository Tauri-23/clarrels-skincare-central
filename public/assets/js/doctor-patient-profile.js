// Containers 
const AppointmentCont = $('#pending-content');
const RecordsCont = $('#record-content');

// Btns
const appointmentsNavBtn = $('#appointments-btn');
const historyNavBtn = $('#history-btn');

appointmentsNavBtn.click(() => {
    changeContent(appointmentsNavBtn, AppointmentCont)
});
historyNavBtn.click(() => {
    changeContent(historyNavBtn, RecordsCont)
});


function changeContent(activeLink, activeCont) {
    AppointmentCont.addClass('d-none');
    RecordsCont.addClass('d-none');

    appointmentsNavBtn.removeClass('active');
    historyNavBtn.removeClass('active');

    activeLink.addClass('active');
    activeCont.removeClass('d-none');
}