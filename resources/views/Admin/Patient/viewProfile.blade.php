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
    <link rel="stylesheet" href="/assets/css/forms.css">
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
    <x-admin_top_nav title="Patient | {{$patient->firstname}} {{$patient->lastname}}"/>
    <x-admin_side_nav activeLink="4"/>


    <div class="content-1 compressed d-flex flex-direction-y gap1">

        <div class="DP-ProfileSection1">
            <div class="profile-div">
                <div class="d-flex">
                    <div class="DP-PFP d-flex justify-content-center">
                        <img class="position-absolute h-100" src="/assets/media/pfp/{{$patient->pfp}}" />
                    </div>
                    <div class="DP-infoContainer">
                        <div class="position-absolute w-100 d-flex justify-content-end">
                        </div>
                        <div class="txt-l1 fw-bold">{{$patient->firstname}} {{$patient->lastname}}</div>
                        <div class="mar-bottom-2" class="DP-Profileinfo"> {{$patient->email}} | +63 {{$patient->phone}} </div>
                        <div class="txt-l3" class="DP-Profileinfo"><i class="bi bi-person-badge"></i> {{$patient->id}}</div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="long-cont">
            <div class="txt-l2 mar-bottom-2">Other informations</div>
            
            <div class="mar-bottom-3">
                <div class="txt-m2">Address</div>
                <div class="txt-l3">{{$patient->address}}</div>
            </div>

            <div class="mar-bottom-3">
                <div class="txt-m2">Phone</div>
                <div class="txt-l3">+63 {{$patient->phone}}</div>
            </div>

            <div class="mar-bottom-3">
                <div class="txt-m2">Joined</div>
                <div class="txt-l3">{{\Carbon\Carbon::parse($patient->created_at)->format('M d, Y')}}</div>
            </div>
        </div>

        {{-- Render Medical Information --}}
        <div class="long-cont" id="med-info-cont">
            <div class="txt-l2">Medical Information</div>

            <div class="d-flex justify-content-center w-100">
                <div class="d-flex flex-direction-y gap3 mar-top-1 w-75">
                    <div class="d-flex gap1 align-items-center justify-content-between">
                        <div class="">
                            <div class="txt-m3">Allergies</div>
                            <div class="txt-l3">{{$medInfo->allergies}}</div>
                        </div>
                    </div>
    
                    <div class="d-flex gap1 align-items-center justify-content-between">
                        <div class="">
                            <div class="txt-m3">Heart Disease</div>
                            <div class="txt-l3">{{$medInfo->heart_disease}}</div>
                        </div>
                    </div>
    
                    <div class="d-flex gap1 align-items-center justify-content-between">
                        <div class="">
                            <div class="txt-m3">High Blood Pressure</div>
                            <div class="txt-l3">{{$medInfo->high_blood_pressure}}</div>
                        </div>
                    </div>
    
                    <div class="d-flex gap1 align-items-center justify-content-between">
                        <div class="">
                            <div class="txt-m3">Diabetic</div>
                            <div class="txt-l3">{{$medInfo->diabetic}}</div>
                        </div>
                    </div>
    
                    <div class="d-flex gap1 align-items-center justify-content-between">
                        <div class="">
                            <div class="txt-m3">Surgeries</div>
                            <div class="txt-l3">{{$medInfo->surgeries}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/admin-patients.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>