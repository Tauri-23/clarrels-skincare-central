// Btns
const genenrateReportBtn = $('#generate-report-btn');

// inputs
const monthIn = $('#month-in');
const yearIn = $('#year-in');

genenrateReportBtn.click(() => {
    window.location.href = `/AdminGenerateReport/${monthIn.val()}/${yearIn.val()}`;
});