// Containers
const appointmentsCont = $('#appointment-cont');
const historyCont = $('#history-cont');

const appointentBtn = $('#appointments-btn');
const historyBtn = $('#history-btn');


appointentBtn.click(() => {
    setActiveBtnAndCont(appointentBtn, appointmentsCont);
});

historyBtn.click(() => {
    setActiveBtnAndCont(historyBtn, historyCont);
});

function setActiveBtnAndCont($activeBtn, $activeCont){
    appointmentsCont.addClass('d-none');
    historyCont.addClass('d-none');

    appointentBtn.removeClass('active')
    historyBtn.removeClass('active')

    $activeBtn.addClass('active');
    $activeCont.removeClass('d-none');
}