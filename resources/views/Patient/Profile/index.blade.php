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
    <link rel="stylesheet" href="/assets/css/profile.css">
    <link rel="stylesheet" href="/assets/css/appointments.css">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/04f0992e18.js" crossorigin="anonymous"></script>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Clarrel's | Profile</title>
</head>
<body class="bg-violet4">
    {{-- Modals --}}
    <x-modals modalType="appointment-prev"/>

    {{-- Navs --}}
    <x-topnav navType="1" activeLink="0"/>
    <x-sidenav navType="0" activeLink="1"/>
    <div class="content-1 compressed d-flex flex-direction-y gap1">
        
        <div class="DP-ProfileSection1">
            <div class="profile-div">
                <div class="d-flex">
                    <div class="DP-PFP">
                        <img class="DP-PFPImg" src="/assets/media/pfp/{{$patient->pfp}}" />
                    </div>
                    <div class="DP-infoContainer">
                        <div class="position-absolute w-100 d-flex justify-content-end">
                            <a href="/PatientEditProfile/{{$patient->id}}" class="primary-btn-small-violet1">Edit Profile</a>
                        </div>
                        <div class="txt-l1 fw-bold">{{$patient->firstname}} {{$patient->lastname}}</div>
                        <div class="mar-bottom-2" class="DP-Profileinfo"> {{$patient->email}} | +63 {{$patient->phone}} </div>
                        <div class="txt-l3" class="DP-Profileinfo">Appointments {{$appointments->count()}}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="long-cont-nopadding d-flex gap2">
            <a class="DP-Links active" id="appointments-btn">Appointments</a>
            <a class="DP-Links" id="history-btn">History</a>
        </div>

        {{-- Render Appointments --}}
        <div class="" id="appointment-cont">
            <x-appointmentsTable :appointments="$appointments"/>
        </div>

        {{-- Render History --}}
        <div class="d-none" id="history-cont">
            <x-appointmentsTable :appointments="$appointments"/>
        </div>
        

    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/signin.js"></script>
    <script src="/assets/js/appointments.js"></script>
    <script src="/assets/js/profile.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>