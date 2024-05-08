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
<body class="bg-violet4">
    {{-- Modals --}}
    <x-modals modalType="profile-edit-name"/>
    <x-modals modalType="profile-edit-email"/>
    <x-modals modalType="profile-edit-phone"/>
    <x-modals modalType="profile-edit-password"/>
    <x-modals modalType="success"/>
    <x-modals modalType="error"/>

    {{-- Navs --}}
    <x-topnav navType="1" activeLink="0"/>
    <x-sidenav navType="0" activeLink="1"/>
    <div class="content-1 compressed d-flex flex-direction-y gap1">
            <div class="DP-edit-cont">
                <div class="w-100 mar-bottom-1">
                    <div class="EditPFPContainer">
                        <div class="editPen">
                            <i class="fa-solid fa-pen cursor-pointer"></i>
                        </div>
                        <img class="position-absolute h-100" src="/assets/media/pfp/{{$patient->pfp}}" />
                    </div>
                </div>

                <div class="d-flex flex-direction-y gap2">
                    <div>
                        <div>Name</div>
                        <div class="w-100 d-flex justify-content-between gap1">
                            <div class="txt-l3">{{$patient->firstname}} {{$patient->lastname}}</div>
                            <i id="edit-name-btn" class="fa-solid fa-pen-to-square cursor-pointer"></i>
                        </div>
                    </div>
                    <div>
                        <div>Email</div>
                        <div class="w-100 d-flex justify-content-between gap1">
                            <div class="txt-l3">{{$patient->email}}</div>
                            <i id="edit-email-btn" class="fa-solid fa-pen-to-square cursor-pointer"></i>
                        </div>
                    </div>

                    <div>
                        <div>Phone</div>
                        <div class="w-100 d-flex justify-content-between gap1">
                            <div class="txt-l3">{{$patient->phone}}</div>
                            <i id="edit-phone-btn" class="fa-solid fa-pen-to-square cursor-pointer"></i>
                        </div>
                    </div>
                    <div>
                        <div>Password</div>
                        <div class="w-100 d-flex justify-content-between gap1">
                            <div class="txt-l3"><input class="passReadonly" type="password" value="{{$patient->password}}" readonly /></div>
                            <i id="edit-password-btn" class="fa-solid fa-pen-to-square cursor-pointer"></i>
                        </div>
                    </div>
                    <div>
                        <div>Address</div>
                        <div class="w-100 d-flex justify-content-between gap1">
                            <div class="txt-l3">{{$patient->address}}</div>
                            <i id="edit-address-btn" class="fa-solid fa-pen-to-square cursor-pointer"></i>
                        </div>
                    </div>
                </div>
            </div>      

    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/signin.js"></script>
    <script src="/assets/js/appointments.js"></script>
    <script>
        const patId = {!! json_encode($patient->id) !!};
        const oldFname = {!! json_encode($patient->firstname) !!};
        const oldLname = {!! json_encode($patient->lastname) !!};

        const oldEmail = {!! json_encode($patient->email) !!};
        const oldPhone = {!! json_encode($patient->phone) !!};

        const oldPass = {!! json_encode($patient->password) !!};
    </script>
    <script src="/assets/js/edit-patient-profile.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>