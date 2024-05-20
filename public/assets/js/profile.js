// Containers
const appointmentsCont = $('#appointment-cont');
const historyCont = $('#history-cont');
const medInfoCont = $('#med-info-cont');

const appointentBtn = $('#appointments-btn');
const historyBtn = $('#history-btn');
const medInfoBtn = $('#med-info-btn');


appointentBtn.click(() => {
    setActiveBtnAndCont(appointentBtn, appointmentsCont);
});

historyBtn.click(() => {
    setActiveBtnAndCont(historyBtn, historyCont);
});

medInfoBtn.click(() => {
    setActiveBtnAndCont(medInfoBtn, medInfoCont);
});

function setActiveBtnAndCont($activeBtn, $activeCont){
    appointmentsCont.addClass('d-none');
    historyCont.addClass('d-none');
    medInfoCont.addClass('d-none');

    appointentBtn.removeClass('active')
    historyBtn.removeClass('active');
    medInfoBtn.removeClass('active');

    $activeBtn.addClass('active');
    $activeCont.removeClass('d-none');
}