$(document).ready(function() {

    //canvases
    const salesChart = $('#sales-chart');
    const monthArr = [
        'Jan', 
        'Feb', 
        'Mar', 
        'Apr', 
        'May', 
        'Jun', 
        'Jul', 
        'Aug', 
        'Sep', 
        'Oct', 
        'Nov', 
        'Dec'
    ];

    chartMonths = [];

    for(let i=0; i<selectedMonth; i++) {
        chartMonths.push(monthArr[i]);//inpyut month to chart months the value of selectedMonths is 6
    }

    createLineChart(salesChart, chartMonths, totalSalesPerMonth, 'Sales', 'rgba(67, 119, 254, .3)', 'rgb(67, 119, 254)');
});