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

    <title>Clarrel's | Admin</title>
</head>
<body class="bg-white2">
    {{-- modals --}}
    <x-modals modalType="admin-input-payment"/>

    <x-modals modalType="info-yn"/>
    <x-modals modalType="success"/>
    <x-modals modalType="error"/>

    {{-- Navs --}}
    <x-admin_top_nav title="Pending Payments"/>
    <x-admin_side_nav activeLink="2"/>

    <div class="content-1 compressed">
        {{-- Render Appointments here --}}
        <div class="d-flex">

        </div>
        <div class="long-cont-nopadding d-flex gap1 mar-bottom-1">
            <a href="/AdminPendingPayments/pending" class="color-black1 text-decoration-none doc-appointment-nav-link {{$page === 'pending' ? 'active': ''}}" id="pending-nav-btn">Pending</a>
            <a href="/AdminPendingPayments/paid" class="color-black1 text-decoration-none doc-appointment-nav-link {{$page === 'paid' ? 'active': ''}}" id="approved-nav-btn">Paid</a>
        </div>

        <div class="{{$page !== 'pending' ? 'd-none': ''}}" id="pending-content">
            <x-admin_render_pending_payments :appointments="$pendingPayments"/>
        </div>

        <div class="{{$page !== 'paid' ? 'd-none': ''}}" id="rejected-content">
            <x-doctor_render_rejected_appointment :appointments="$pendingPayments"/>
        </div>
        
    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script>
        const pendingPayments = @json($pendingPayments);
    </script>
    <script src="/assets/js/admin-payment.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>