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
    <link rel="stylesheet" href="/assets/css/edit-patient-profile.css">

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
    <x-modals modalType="profile-edit-name"/>
    <x-modals modalType="profile-edit-email"/>
    <x-modals modalType="profile-edit-phone"/>
    <x-modals modalType="profile-edit-pfp"/>

    <x-modals modalType="success"/>
    <x-modals modalType="error"/>

    {{-- Navbar --}}
    <x-top_nav_doctor title="Edit My Profile" :doctor="$doctor"/>
    <x-side_nav_doctor activeLink="5" :doctor="$doctor"/>


    <div class="content-1 compressed d-flex flex-direction-y gap1">
            <div class="DP-edit-cont">
                <div class="w-100 mar-bottom-1">
                    <div class="EditPFPContainer">
                        <div class="editPen">
                            <i id="edit-pfp-btn" class="fa-solid fa-pen cursor-pointer"></i>
                        </div>
                        <img class="position-absolute h-100" src="/assets/media/pfp/{{$doctor->pfp}}" />
                    </div>
                </div>

                <div class="d-flex flex-direction-y gap2">
                    <div>
                        <div>Name</div>
                        <div class="w-100 d-flex justify-content-between gap1">
                            <div class="txt-l3">{{$doctor->firstname}} {{$doctor->middlename}} {{$doctor->lastname}}</div>
                            {{-- <i id="edit-name-btn" class="fa-solid fa-pen-to-square cursor-pointer"></i> --}}
                        </div>
                    </div>
                    <div>
                        <div>Email</div>
                        <div class="w-100 d-flex justify-content-between gap1">
                            <div class="txt-l3">{{$doctor->email}}</div>
                            {{-- <i id="edit-email-btn" class="fa-solid fa-pen-to-square cursor-pointer"></i> --}}
                        </div>
                    </div>

                    <div>
                        <div>Phone</div>
                        <div class="w-100 d-flex justify-content-between gap1">
                            <div class="txt-l3">{{$doctor->phone}}</div>
                            {{-- <i id="edit-phone-btn" class="fa-solid fa-pen-to-square cursor-pointer"></i> --}}
                        </div>
                    </div>
                </div>
            </div>      

    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/profile.js"></script>
    <script>
        const doctor = @json($doctor);
    </script>
    <script src="/assets/js/doctor-profile.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>