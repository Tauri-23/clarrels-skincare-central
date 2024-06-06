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
    <link rel="stylesheet" href="/assets/css/edit-patient-profile.css">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/04f0992e18.js" crossorigin="anonymous"></script>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Clarrel's | Admin</title>
</head>
<body class="bg-white2">
    {{-- Modals --}}    
    <x-modals modalType="profile-edit-name2"/>
    <x-modals modalType="profile-edit-email"/>
    <x-modals modalType="profile-edit-phone"/>

    <x-modals modalType="success"/>
    <x-modals modalType="error"/>
    

    {{-- Navbar --}}
    <x-admin_top_nav title="{{$doctor->firstname}} {{$doctor->middlename}} {{$doctor->lastname}}"/>
    <x-admin_side_nav activeLink="5"/>


    <div class="content-1 compressed d-flex flex-direction-y gap1">
        
        <div class="DP-ProfileSection1">
            <div class="profile-div">
                <div class="d-flex">
                    <div class="DP-PFP d-flex justify-content-center">
                        <img class="position-absolute h-100" src="/assets/media/pfp/{{$doctor->pfp}}" />
                    </div>
                    <div class="DP-infoContainer">
                        <div class="txt-l1 fw-bold">{{$doctor->firstname}} {{$doctor->middlename}} {{$doctor->lastname}}</div>
                        <div class="mar-bottom-2" class="DP-Profileinfo"> {{$doctor->email}} | +63 {{$doctor->phone}} </div>
                        {{-- <div class="txt-l3" class="DP-Profileinfo">Appointments {{$appointments->count()}}</div> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="long-cont profile-div d-flex flex-direction-y gap2">
            <div class="txt-l2 fw-bold">Personal Information</div>

            <div>
                <div>Name</div>
                <div class="w-100 d-flex justify-content-between gap1">
                    <div class="txt-l3">{{$doctor->firstname}} {{$doctor->middlename}} {{$doctor->lastname}}</div>
                    <i id="edit-name-btn" class="fa-solid fa-pen-to-square cursor-pointer"></i>
                </div>
            </div>
        </div>

        <div class="long-cont profile-div d-flex flex-direction-y gap2">
            <div class="txt-l2 fw-bold">Contact Information</div>

            <div>
                <div>Email</div>
                <div class="w-100 d-flex justify-content-between gap1">
                    <div class="txt-l3">{{$doctor->email}}</div>
                    <i id="edit-email-btn" class="fa-solid fa-pen-to-square cursor-pointer"></i>
                </div>
            </div>

            <div>
                <div>Phone</div>
                <div class="w-100 d-flex justify-content-between gap1">
                    <div class="txt-l3">+63 {{$doctor->phone}}</div>
                    <i id="edit-phone-btn" class="fa-solid fa-pen-to-square cursor-pointer"></i>
                </div>
            </div>
        </div>
        
        {{-- <div class="long-cont profile-div d-flex flex-direction-y gap2">
            <div class="txt-l2 fw-bold">Sign-in Credentials</div>

            <div>
                <div>Username</div>
                <div class="w-100 d-flex justify-content-between gap1">
                    <div class="txt-l3">{{$doctor->username}}</div>
                </div>
            </div>

            <div>
                <div>Password</div>
                <div class="w-100 d-flex justify-content-between gap1">
                    <div class="txt-l3"><input class="passReadonly" type="password" value="{{$doctor->password}}" readonly /></div>
                    <i id="edit-password-btn" class="fa-solid fa-pen-to-square cursor-pointer"></i>
                </div>
            </div>
        </div> --}}

        {{-- <div class="long-cont profile-div d-flex flex-direction-y gap2">
            <div class="txt-l2 fw-bold">Profession</div>

            <div>
                <div>PRC</div>
                <div class="w-100 d-flex justify-content-between gap1">
                    <div class="txt-l3">{{$doctor->prc}}</div>
                </div>
            </div>
        </div> --}}

    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/profile.js"></script>
    <script>
        const doctor = @json($doctor);
    </script>
    <script src="/assets/js/admin-doctor-profile.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>