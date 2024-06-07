<!DOCTYPE html>
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

    {{-- Navs --}}
    <x-admin_top_nav title="Dashboard"/>
    <x-admin_side_nav activeLink="1"/>


    <div class="content-1 compressed">
        <div class="d-flex gap1">
            <div class="long-cont">
                <div class="txt-xl3 w-100">{{$doctors->count()}}</div>
                <div class="txt-m1 w-100 d-flex justify-content-end">Total Doctors</div>
            </div>
            <div class="long-cont">
                <div class="txt-xl3 w-100">{{$patients->count()}}</div>
                <div class="txt-m1 w-100 d-flex justify-content-end">Total Patients</div>
            </div>
        </div>

        
        <div class="d-flex gap1 mar-top-1">
            {{-- Trend --}}
            <div class="long-cont">
                <div class="txt-m1">Sales Trend</div>
                <canvas id="sales-chart"></canvas>
            </div>

            {{-- Bar --}}
            <div class="long-cont">
                <div class="txt-m1">Sales per Service</div>
                <canvas id="service-sales-chart"></canvas>
            </div>
        </div>
        

        
        
        
        <div class="mar-top-1 d-flex flex-direction-y gap2">
            <div class="txt-l2">Doctors</div>

            <x-admin_render_doctors :doctors="$doctors"/>
        </div>

        <div class="mar-top-1 d-flex flex-direction-y gap2">
            <div class="txt-l2">Patients</div>

            <x-admin_render_patients :patients="$patients"/>
        </div>
        
    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/admin-patients.js"></script>

    {{-- chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const selectedMonth = @json($month);
        const totalSalesPerMonth = @json($totalSalesPerMonth);
        const services = @json($services);
        const totalSalePerService = @json($totalSalePerService);
    </script>
    <script src="/assets/js/admin-dash.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>