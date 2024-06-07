$(document).ready(function() {

    //canvases
    const salesChart = $('#sales-chart');
    const serviceSalesChart = $('#service-sales-chart');
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
    chartServices = [];

    for(let i=0; i<selectedMonth; i++) {
        chartMonths.push(monthArr[i]);//inpyut month to chart months the value of selectedMonths is 6
    }

    services.forEach(element => {
        chartServices.push(element.service);
    });

    createLineChart(salesChart, chartMonths, totalSalesPerMonth, 'Sales', 'rgba(67, 119, 254, .3)', 'rgb(67, 119, 254)');
    createBarChart(serviceSalesChart, chartServices, totalSalePerService, 'Department Salary', 'rgba(255, 184, 0, .3)', 'rgba(255, 184, 0, 1)');
});