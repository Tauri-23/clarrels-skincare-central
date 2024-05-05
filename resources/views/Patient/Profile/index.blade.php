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
    <x-topnav navType="1" activeLink="0"/>
    <x-sidenav navType="0" activeLink="1"/>
    <div class="content-1 compressed d-flex flex-direction-y gap1">
        
        <div class="DP-ProfileSection1">
            <div class="profileDiv">
                <div style="display: flex;">
                    <div class="DP-PFP">
                        <img class="DP-PFPImg" src="~/media/PFP/@Model.renderUser.PFP" />
                    </div>
                    <div class="DP-infoContainer">
                        <div style="position: absolute;width: 100%;display:flex; justify-content: flex-end;">
                            <a asp-route-ID="@Model.renderUser.Id" asp-page="/Dashboard/Patient/DashboardPatient_EditProfile" style="padding: 8px 25px; border-radius: 10px;background: #06283D; color: #fff; text-decoration:none;">Edit Profile</a>
                        </div>
                        <div class="DP-ProfileName">@Model.renderUser.Fname @Model.renderUser.Lname</div>
                        <div style="margin: 0 0 20px 0;" class="DP-Profileinfo">@Model.renderUser.UserType | @Model.renderUser.Email | @Model.renderUser.Phone </div>
                        <div style="font-size: 1.3rem;" class="DP-Profileinfo">Appointments @Model.appointments.Count</div>
                    </div>
                </div>
        
                <div style="margin: 50px 0 0 0;width: 100%;display:flex;justify-content:center;">
                    <div class="DP-ProfileMiniNav">
                        <a class="DP-Links DP-LinksActive" onclick="showAppointments()">Appointments</a>
                        <a class="DP-Links" onclick="showPrescriptions()">Prescriptions</a>
                        <a class="DP-Links" onclick="showHistory()">History</a>
                        <span class="DP-Links_indicator"></span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/signin.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>