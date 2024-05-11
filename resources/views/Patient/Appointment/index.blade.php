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
    <link rel="stylesheet" href="/assets/css/appointments.css">
    <link rel="stylesheet" href="/assets/css/table.css">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/04f0992e18.js" crossorigin="anonymous"></script>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Clarrel's | Appointments</title>
</head>
<body class="bg-white2">
    {{-- Modals --}}
    <x-modals modalType="appointment-prev"/>

    {{-- Navs --}}
    <x-patient_top_nav title="Appointments" :patient="$patient"/>
    <x-sidenav activeLink="3"/>


    <div class="content-1 compressed d-flex flex-direction-y gap1">
        
        <div class="long-cont d-flex justify-content-between align-items-center">
            <div class="txt-l3 fw-bold color-black2">Appointments</div>
            <a href="/bookAppointment" class="primary-btn-small-violet1"><i class="bi bi-calendar2-plus mar-end-3"></i> Book Appointment</a>
        </div>

        {{-- Render Appointments --}}
        <x-patient_render_appointments :appointments="$appointments"/>
        

    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/signin.js"></script>
    <script>
        const appointments = {!! json_encode($appointments) !!};
    </script>
    <script src="/assets/js/appointments.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>