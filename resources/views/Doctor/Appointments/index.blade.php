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
    <link rel="stylesheet" href="/assets/css/doctor-appointments.css">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/04f0992e18.js" crossorigin="anonymous"></script>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Clarrel's | Doctor</title>
</head>
<body class="bg-white2">
    {{-- modals --}}
    <x-modals modalType="success"/>
    <x-modals modalType="error"/>
    <x-modals modalType="info-yn"/>
    <x-modals modalType="doctor-pending-appointment-preview"/>
    {{-- Nav --}}
    <x-top_nav_doctor title="Appointments" :doctor="$doctor"/>
    <x-side_nav_doctor activeLink="3" :doctor="$doctor"/>

    <div class="content-1 compressed">
        {{-- Render Appointments here --}}
        <div class="d-flex">

        </div>
        <div class="long-cont-nopadding d-flex gap1 mar-bottom-1">
            <div class="doc-appointment-nav-link active" id="pending-nav-btn">Pending</div>
            <div class="doc-appointment-nav-link" id="rejected-nav-btn">Rejected</div>
        </div>

        <div id="pending-content">
            <x-doctor_render_appointments :appointments="$appointments"/>
        </div>

        <div class="d-none" id="rejected-content">
            <x-doctor_render_rejected_appointment :appointments="$rejectedAppointments"/>
        </div>
        
    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script>
        const appointments = {!! json_encode($appointments) !!}
    </script>
    <script src="/assets/js/doctor-appointments.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>