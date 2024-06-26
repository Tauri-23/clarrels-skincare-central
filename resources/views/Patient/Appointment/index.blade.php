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
    <link rel="stylesheet" href="/assets/css/forms.css">
    <link rel="stylesheet" href="/assets/css/doctor-appointments.css">

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
    <x-modals modalType="appointment-prev-with-cancel"/>
    <x-modals modalType="appointment-prev"/>
    <x-modals modalType="appointment-rejected-prev"/>

    <x-modals modalType="info-yn"/>
    <x-modals modalType="info-yn"/>
    <x-modals modalType="success"/>
    <x-modals modalType="error"/>

    {{-- Navs --}}
    <x-patient_top_nav title="Appointments" :patient="$patient"/>
    <x-sidenav activeLink="3"/>


    <div class="content-1 compressed d-flex flex-direction-y gap1">
        
        <div class="long-cont d-flex justify-content-between align-items-center">
            <div class="txt-l3 fw-bold color-black2">Appointments</div>
            <a href="/bookAppointment" class="primary-btn-small-violet1"><i class="bi bi-calendar2-plus mar-end-3"></i> Book Appointment</a>
        </div>

        <div class="long-cont-nopadding d-flex gap1">
            <div class="doc-appointment-nav-link active" id="pending-nav-btn">Pending</div>
            <div class="doc-appointment-nav-link" id="approved-nav-btn">Approved</div>
            <div class="doc-appointment-nav-link" id="rejected-nav-btn">Rejected</div>
        </div>

        {{-- Render Appointments --}}
        <div id="pending-cont">
            <x-patient_render_appointments :appointments="$pendingAppointments"/>
        </div>

        <div class="d-none" id="approved-cont">
            <x-patient_render_approved_appointments :appointments="$approvedAppointments"/>
        </div>
        
        <div class="d-none" id="rejected-cont">
            <x-patient_render_rejected_appointments :appointments="$rejectedAppointments"/>
        </div>
        
        

    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script>
        const pendingAppointments = {!! json_encode($pendingAppointments) !!};
        const approvedAppointments = {!! json_encode($approvedAppointments) !!};
        const rejectedAppointments = {!! json_encode($rejectedAppointments) !!};
    </script>
    <script src="/assets/js/appointments.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>