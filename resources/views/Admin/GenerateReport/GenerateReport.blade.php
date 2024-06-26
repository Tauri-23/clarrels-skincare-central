<!DOCTYPE html>
@php
    use Carbon\Carbon;
@endphp
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    {{-- Icon --}}
    <link rel="icon" href="/assets/media/logos/logo1.png" type="image/x-icon" />

    {{-- CSS --}}
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/elements.css">
    <link rel="stylesheet" href="/assets/css/nav.css">
    <link rel="stylesheet" href="/assets/css/table.css">
    <link rel="stylesheet" href="/assets/css/forms.css">
    <link rel="stylesheet" href="/assets/css/generate-report.css">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/04f0992e18.js" crossorigin="anonymous"></script>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


    <title>Clarrel's | Admin</title>
</head>
<body class="bg-white2">
    {{-- modals --}}
    <x-modals modalType="info-yn"/>
    <x-modals modalType="success"/>
    <x-modals modalType="error"/>

    {{-- Navbar --}}
    <x-admin_top_nav title="Report"/>
    <x-admin_side_nav activeLink="3"/>


    <div class="content-1 compressed">
        {{-- Computes --}}
        @php
            $totalSales = 0;

            $largestServiceSale = '';
            $largestServiceSaleVal = 0;

            $largestDocSale = '';
            $largestDocSaleVal = 0;

            $monthlySalesForChart = [];

            foreach ($receipts as $receipt) {
                $totalSales += $receipt->service_price;
            }

            // Get Highest Service Sales
            foreach ($services as $service) {
                $totalServiceSalesVal = 0;
                foreach ($receipts as $receipt) {
                    if($receipt->appointments()->first()->service == $service->id) {
                        $totalServiceSalesVal += $receipt->service_price;
                    }
                }

                if($totalServiceSalesVal > $largestServiceSaleVal) {
                    $largestServiceSaleVal = $totalServiceSalesVal;
                    $largestServiceSale = $service->service;
                }
            }

            foreach ($doctors as $doc) {
                $totalDoctorSales = 0;
                foreach ($receipts as $receipt) {
                    if($receipt->appointments()->first()->doctor == $doc->id) {
                        $totalDoctorSales += $receipt->service_price;
                    }
                }

                if($totalDoctorSales > $largestDocSaleVal) {
                    $largestDocSaleVal = $totalDoctorSales;
                    $largestDocSale = $doc->firstname.' '.$doc->lastname;
                }
            }

            // get the sales all month
            // for()
        @endphp



        {{-- Report Canvas --}}
        <div class="report-box" id="report-canvas">
            {{-- Header --}}
            <div class="txt-l2 text-center fw-bold color-violet1">Cabantog's Skincare and Dental Clinic</div>
            <div class="txt-m3 text-center" style="margin: 0 0 50px 0;">1234 Mabuhay St. Brgy. UMAK Taguig City</div>

            {{-- Content1 --}}
            <div class="txt-l3 fw-bold" style="margin: 0 0 50px 0;">Report for {{ Carbon::createFromDate($year, $month, 1)->format('F') }} - {{$year}}</div>

            <div class="d-flex justify-content-between mar-bottom-1">
                <div>
                    <div class="txt-m1">Total Patients</div>
                    <div class="txt-m1">Total Doctors</div>
                    <div class="txt-m1">Total Services</div>
                </div>

                <div>
                    <div class="txt-m1 text-end">{{$patients->count()}}</div>
                    <div class="txt-m1 text-end">{{$doctors->count()}}</div>
                    <div class="txt-m1 text-end">{{$services->count()}}</div>
                </div>
            </div>

            <div class="d-flex justify-content-between mar-bottom-1">
                <div>
                    <div class="txt-m1">Doctor with highest Sales</div>
                    <div class="txt-m1">Service with highest sales</div>
                    <div class="txt-m1">Doctor Sales Value</div>
                    <div class="txt-m1">Service Sales Value</div>
                </div>

                <div>
                    <div class="txt-m1 text-end">Dr. {{$largestDocSale}}</div>
                    <div class="txt-m1 text-end">{{$largestServiceSale}}</div>
                    <div class="txt-m1 text-end">{{"₱ " . number_format($largestDocSaleVal, 2, '.', ',')}}</div>
                    <div class="txt-m1 text-end">{{"₱ " . number_format($largestServiceSaleVal, 2, '.', ',')}}</div>
                </div>
            </div>

            <div class="d-flex justify-content-between mar-bottom-1">
                <div>
                    <div class="txt-m1">Total Sales</div>
                </div>

                <div>
                    <div class="txt-m1 text-end">{{"₱ " . number_format($totalSales, 2, '.', ',')}}</div>
                </div>
            </div>

            <hr>

            {{-- Charts --}}
            <div class="txt-l3 fw-bold" style="margin: 30px 0 50px 0;">Charts</div>
            {{-- Trend --}}
            <div class="txt-m1">Sales Trend</div>
            <canvas class="mar-bottom-1" id="sales-chart"></canvas>

            {{-- Bar --}}
            <div class="txt-m1">Sales per Service</div>
            <canvas style="margin-bottom: 50px;" id="service-sales-chart"></canvas>

            <hr>

            {{-- All Services --}}
            <div class="txt-l3 fw-bold" style="margin: 30px 0 50px 0;">Services</div>

            @php
                $totalSalePerService = [];
            @endphp

            @foreach ($services as $service)

                {{-- Compute --}}
                @php
                    $totalIncome = 0;
                    $totalAppointments = 0;
                    foreach ($receipts as $receipt) {
                        if($receipt->appointments()->first()->service == $service->id) {
                            $totalIncome += $receipt->service_price;
                        }
                    }

                    foreach ($appointments as $appointment) {
                        if($appointment->service == $service->id) {
                            $totalAppointments ++;
                        }
                    }

                    $totalSalePerService[] = $totalIncome;
                @endphp

                <div class="mar-bottom-1">
                    <div class="txt-m1 fw-bold">{{$service->service}}</div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="txt-m1">Income</div>
                            <div class="txt-m1">Total Appointments</div>
                        </div>
    
                        <div>
                            <div class="txt-m1 text-end">{{"₱ " . number_format($totalIncome, 2, '.', ',')}}</div>
                            <div class="txt-m1 text-end">{{$totalAppointments}}</div>
                        </div>
                    </div>
                </div>
                
            @endforeach
        </div>

        <div class="d-flex justify-content-center mar-top-1">
            <div class="primary-btn-small-violet1 m-auto" id="print-report">Print Report</div>
        </div>
        

    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/admin-report.js"></script>
    <script src="/assets/js/printThis.js"></script>
    <script>
        // Print the Payslip
        $(document).ready(function () {
            const printBtn = $('#print-report');

            printBtn.on('click', () => {
                const elements = $('#report-canvas');

                // Generate a timestamp or any unique string
                const timestamp = new Date().toISOString().replace(/[-T:Z]/g, '');

                // Set the filename with the desired name and the timestamp
                const filename = `Report_${@json($month)}_${@json($year)}_${timestamp}.pdf`;

                // Print the container
                elements.printThis({
                    pageTitle: filename,
                    importCSS: true,
                    importStyle: true,
                    loadCSS: ['/assets/css/app.css', '/assets/css/elements.css', '/assets/css/prescription.css'],
                    beforePrint: function () {
                        document.title = filename;
                    }
                });
            });
        });
    </script>
    
    {{-- chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    
    <script>
        const totalSales = @json($totalSales);
        const selectedMonth = @json($month);
        const totalSalesPerMonth = @json($totalSalesPerMonth);
        const services = @json($services);
        const totalSalePerService = @json($totalSalePerService);
    </script>

    <script src="/assets/js/generate-report.js"></script>

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>