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
    <link rel="stylesheet" href="/assets/css/table.css">
    <link rel="stylesheet" href="/assets/css/forms.css">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/04f0992e18.js" crossorigin="anonymous"></script>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Clarrel's | Profile</title>
</head>
<body class="bg-white2">
    {{-- Modals --}}
    <x-modals modalType="profile-edit-allergies"/>
    <x-modals modalType="profile-edit-heart-disease"/>
    <x-modals modalType="profile-edit-high-bp"/>
    <x-modals modalType="profile-edit-high-bp"/>
    <x-modals modalType="profile-diabetic"/>
    <x-modals modalType="profile-edit-surgeries"/>
    
    <x-modals modalType="success"/>
    <x-modals modalType="error"/>
    

    {{-- Navs --}}
    <x-patient_top_nav title="Profile" :patient="$patient"/>
    <x-sidenav activeLink="2"/>


    <div class="content-1 compressed d-flex flex-direction-y gap1">
        
        <div class="DP-ProfileSection1">
            <div class="profile-div">
                <div class="d-flex">
                    <div class="DP-PFP d-flex justify-content-center">
                        <img class="position-absolute h-100" src="/assets/media/pfp/{{$patient->pfp}}" />
                    </div>
                    <div class="DP-infoContainer">
                        <div class="position-absolute w-100 d-flex justify-content-end">
                            <a href="/PatientEditProfile/{{$patient->id}}" class="primary-btn-small-violet1">Edit Profile</a>
                        </div>
                        <div class="txt-l1 fw-bold">{{$patient->firstname}} {{$patient->middlename}} {{$patient->lastname}}</div>
                        <div class="mar-bottom-2" class="DP-Profileinfo"> {{$patient->email}} | +63 {{$patient->phone}} </div>
                        <div class="txt-l3" class="DP-Profileinfo">Appointments {{$appointments->count()}}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="long-cont-nopadding d-flex gap2">
            <a class="DP-Links active" id="appointments-btn">Appointments</a>
            <a class="DP-Links" id="history-btn">History</a>
            <a class="DP-Links" id="med-info-btn">My Medical Information</a>
        </div>

        {{-- Render Appointments --}}
        <div class="" id="appointment-cont">
            <x-patient_render_appointments :appointments="$appointments"/>
        </div>

        {{-- Render History --}}
        <div class="d-none" id="history-cont">
            <x-patient_render_history :history="$history"/>
        </div>

        {{-- Render Medical Information --}}
        <div class="long-cont d-none" id="med-info-cont">
            <div class="txt-l2">Medical Information</div>

            <div class="d-flex justify-content-center w-100">
                <div class="d-flex flex-direction-y gap3 mar-top-1 w-75">
                    <div class="d-flex gap1 align-items-center justify-content-between">
                        <div class="">
                            <div class="txt-m3">Allergies</div>
                            <div class="txt-l3">{{$medInfo->allergies}}</div>
                        </div>
                        <i class="bi bi-pencil-square cursor-pointer" id="edit-allergies-btn"></i>
                    </div>
    
                    <div class="d-flex gap1 align-items-center justify-content-between">
                        <div class="">
                            <div class="txt-m3">Heart Disease</div>
                            <div class="txt-l3">{{$medInfo->heart_disease}}</div>
                        </div>
                        <i class="bi bi-pencil-square cursor-pointer" id="edit-heart-disease-btn"></i>
                    </div>
    
                    <div class="d-flex gap1 align-items-center justify-content-between">
                        <div class="">
                            <div class="txt-m3">High Blood Pressure</div>
                            <div class="txt-l3">{{$medInfo->high_blood_pressure}}</div>
                        </div>
                        
                        <i class="bi bi-pencil-square cursor-pointer" id="edit-h-blood-p-btn"></i>
                    </div>
    
                    <div class="d-flex gap1 align-items-center justify-content-between">
                        <div class="">
                            <div class="txt-m3">Diabetic</div>
                            <div class="txt-l3">{{$medInfo->diabetic}}</div>
                        </div>
                        <i class="bi bi-pencil-square cursor-pointer" id="edit-diabetic-btn"></i>
                    </div>
    
                    <div class="d-flex gap1 align-items-center justify-content-between">
                        <div class="">
                            <div class="txt-m3">Surgeries</div>
                            <div class="txt-l3">{{$medInfo->surgeries}}</div>
                        </div>
                        <i class="bi bi-pencil-square cursor-pointer" id="edit-surgeries-btn"></i>
                    </div>
                </div>
            </div>
        </div>
        

    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/signin.js"></script>
    <script src="/assets/js/profile.js"></script>
    <script>
        const appointments = {!! json_encode($appointments) !!};
        const medicalInformation = {!! json_encode($medInfo) !!};
    </script>
    <script src="/assets/js/appointments.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>