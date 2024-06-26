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
    <link rel="stylesheet" href="/assets/css/forms.css">
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
    <x-modals modalType="doctor-reject-appointment-reason"/>
    <x-modals modalType="doctor-pending-appointment-preview"/>
    <x-modals modalType="doctor-pending-followup-appointment-preview"/>
    <x-modals modalType="doctor-approved-appointment-preview"/>
    <x-modals modalType="doctor-cancel-followup-reason"/>
    <x-modals modalType="doctor-rej-appointment-record-preview"/>
    <x-modals modalType="doctor-approved-appointment-add-prescription"/>

    <x-modals modalType="info-yn"/>
    <x-modals modalType="info-yn"/>
    <x-modals modalType="info-yn"/>
    <x-modals modalType="success"/>
    <x-modals modalType="error"/>
    {{-- Nav --}}
    <x-top_nav_doctor title="Appointments" :doctor="$doctor"/>
    <x-side_nav_doctor activeLink="2" :doctor="$doctor"/>

    <div class="content-1 compressed">
        {{-- Render Appointments here --}}
        <div class="d-flex">

        </div>
        <div class="long-cont-nopadding d-flex gap1 mar-bottom-1">
            <div class="doc-appointment-nav-link {{$activeStatus === 'pending' ? 'active': ''}}" id="pending-nav-btn">Pending</div>
            <div class="doc-appointment-nav-link {{$activeStatus === 'approved' ? 'active': ''}}" id="approved-nav-btn">Approved</div>
            <div class="doc-appointment-nav-link {{$activeStatus === 'rejected' ? 'active': ''}}" id="rejected-nav-btn">Rejected</div>
        </div>

        <div class="{{$activeStatus !== 'pending' ? 'd-none': ''}}" id="pending-content">
            <x-doctor_render_appointments :appointments="$appointments"/>
        </div>

        <div class="{{$activeStatus !== 'approved' ? 'd-none': ''}} d-flex flex-direction-y gap2" id="approved-content">
            <div class="long-cont d-flex justify-content-between">
                <input type="text" class="edit-text-1" placeholder="Search Appointment ID" id="search-approved-in">
            </div>
            <div id="def-approved-appointments-cont">
                <x-doctor_render_approved_appointments :appointments="$approved"/>
            </div>

            <div id="result-approved-appointments-cont">

            </div>
            
        </div>

        <div class="{{$activeStatus !== 'rejected' ? 'd-none': ''}}" id="rejected-content">
            <x-doctor_render_rejected_appointment :appointments="$rejectedAppointments"/>
        </div>
        
    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script>
        const appointments = {!! json_encode($appointments) !!}
        const approvedAppointments = {!! json_encode($approved) !!}
        const rejectedAppointments = {!! json_encode($rejectedAppointments) !!}
    </script>
    <script src="/assets/js/doctor-appointments.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>