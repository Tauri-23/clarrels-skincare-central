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
    <link rel="stylesheet" href="/assets/css/forms.css">
    <link rel="stylesheet" href="/assets/css/appointments.css">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/04f0992e18.js" crossorigin="anonymous"></script>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Clarrel's | Book Appointment</title>
</head>
<body class="bg-violet4">
    {{-- Modals --}}
    <x-modals modalType="success"/>
    <x-modals modalType="error"/>

    {{-- Navs --}}
    <x-topnav navType="1" activeLink="0"/>
    <x-sidenav navType="0" activeLink="2"/>

    {{-- Content --}}
    <div class="content-1 compressed d-flex flex-direction-y gap1">
        
        <div class="long-cont d-flex gap3 align-items-center">
            <a href="/PatientAppointments" class="txt-l3 fw-bold text-decoration-none color-black2"><i class="bi bi-chevron-left"></i></a>
            <div class="txt-l3 fw-bold color-black2">Book Appointment</div>
        </div>

        {{-- Book Appointments form --}}
        <div class="book-appointment-form">

            <form method="POST">
                @csrf
                <div class="d-flex flex-direction-y gap2">

                    <div class="d-flex align-items-center">
                        <label for="patient-name-in" class="txt-m1 appointment-label">Patient Name</label>
                        <input type="text" class="edit-text-1 w-100" id="patient-name-in"/>
                    </div>
    
                    <div class="d-flex align-items-center">
                        <label for="phone-in" class="txt-m1 appointment-label">Phone</label>
                        <input type="text" maxlength="10" class="edit-text-1 w-100" id="phone-in"/>
                    </div>
    
                    <div class="d-flex align-items-center">
                        <label for="appointment-date-in" class="txt-m1 appointment-label">Date</label>
                        <input type="date" class="edit-text-1 w-100" id="appointment-date-in" min="<?php echo date("Y-m-d"); ?>"/>
                    </div>
    
                    <div class="d-flex align-items-center">
                        <label for="service-type-in" class="txt-m1 appointment-label">Service Type</label>
                        <select id="service-type-in" class="edit-text-1 w-100">
                            <option value="invalid">---Select Service Type---</option>
                            @foreach ($service_types as $serType)
                                <option value="{{$serType->id}}">{{$serType->service_type}}</option>
                            @endforeach
                            
                        </select>
                    </div>
    
                    <div class="d-flex align-items-center">
                        <label for="service-in" class="txt-m1 appointment-label">Service</label>
                        <select class="edit-text-1 w-100" id="service-in" disabled>
                            <option value="invalid">---Select Service---</option>
                            @foreach ($services as $service)
                                <option value="{{$service->service}}">{{$service->service}}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <div class="d-flex align-items-center">
                        <div class="txt-m1 appointment-label">Time</div>
                        <div class="w-100 d-flex flex-direction-y gap3">
                            <div class="txt-l3">Morning Appointment</div>
                            <div class="d-flex gap3 w-100">
                                <div class="time-btn" id="9:00:00">9:00 am</div>
                                <div class="time-btn" id="10:00:00">10:00 am</div>
                                <div class="time-btn" id="11:00:00">11:00 am</div>
                            </div>

                            <div class="txt-l3">Afternoon Appointment</div>
                            <div class="d-flex gap3">
                                <div class="time-btn" id="13:00:00">1:00 pm</div>
                                <div class="time-btn" id="14:00:00">2:00 pm</div>
                                <div class="time-btn" id="15:00:00">3:00 pm</div>
                                <div class="time-btn" id="16:00:00">4:00 pm</div>
                                <div class="time-btn" id="17:00:00">5:00 pm</div>
                                <div class="time-btn" id="18:00:00">6:00 pm</div>
                            </div>
                        </div>
                    </div>
    
                    <div class="d-flex">
                        <label for="note-in" class="txt-m1 appointment-label">Note (optional)</label>
                        <textarea class="edit-text-1 note-form" id="note-in"></textarea>
                    </div>
    
                    <div class="mar-top-2 d-flex gap3 justify-content-end">
                        <a class="primary-btn-small-red">Clear</a>
                        <a id="submit-btn" class="primary-btn-small-violet1">Submit</a>
                    </div>
                </div>
            </form>
            
        </div>

    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/signin.js"></script>
    <script>
        const serviceTypes = {!! json_encode($service_types) !!};
        const services = {!! json_encode($services) !!};
    </script>
    <script src="/assets/js/book-appointment.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>