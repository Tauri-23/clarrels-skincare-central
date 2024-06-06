$(document).ready(function() {

    //canvases
    const salesChart = $('#sales-chart');



    const monthArr = [
        'Jan 1-15', 
        'Feb 1-15', 
        'Mar 1-15', 
        'Apr 1-15', 
        'May 1-15', 
        'Jun 1-15', 
        'Jul 1-15', 
        'Aug 1-15', 
        'Sep 1-15', 
        'Oct 1-15', 
        'Nov 1-15', 
        'Dec 1-15',
    ];
    const salaryChartMonthsTestData = [300000, 200000, 150000, 290000, 270000, 275000, 273000, 270000, 290000, 280000, 211123, 212232];

    createLineChart(salesChart, monthArr, salaryChartMonthsTestData, 'Sales', 'rgba(67, 119, 254, .3)', 'rgb(67, 119, 254)');
});