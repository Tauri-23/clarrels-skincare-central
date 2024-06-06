<!DOCTYPE html>
@php
    use Carbon\Carbon;
@endphp

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
    <link rel="stylesheet" href="/assets/css/prescription.css">

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
    <x-modals modalType="info-yn"/>
    <x-modals modalType="success"/>
    <x-modals modalType="error"/>

    {{-- Navs --}}
    <x-patient_top_nav title="Prescription for appointment {{$appointment->id}}" :patient="$patient"/>
    <x-sidenav activeLink="4"/>


    <div class="content-1 compressed d-flex flex-direction-y gap1">

        <div class="txt-l1">Prescription</div>


        {{-- Prescription Box --}}
        <div class="prescription" id="prescription">
            {{-- Header --}}
            <div class="txt-l2 text-center fw-bold color-violet1">Cabantog's Skincare and Dental Clinic</div>
            <div class="txt-m3 text-center">1234 Mabuhay St. Brgy. UMAK Taguig City</div>

            {{-- Doctor Name and Patient Name --}}
            <div class="d-flex flex-direction-y gap3 mar-top-1">
                <div class="d-flex">
                    <div class="d-flex gap3 w-100">
                        <div class="txt-m2">Doctor:</div>
                        <div class="txt-m2 prescrition-edit-text flex-grow-1" style="padding-left: 20px;">Dr. {{$appointment->doctors()->first()->firstname}} {{$appointment->doctors()->first()->lastname}}</div>
                    </div>
                    <div class="d-flex gap3 w-25">
                        <div class="txt-m2">Date:</div>
                        <div class="txt-m2 prescrition-edit-text flex-grow-1">{{Carbon::parse($prescription->created_at)->format('m/d/y')}}</div>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="d-flex gap3 w-100">
                        <div class="txt-m2">Prescribed to:</div>
                        <div class="txt-m2 prescrition-edit-text flex-grow-1" style="padding-left: 20px;">{{$appointment->patients()->first()->firstname}} {{$appointment->patients()->first()->lastname}}</div>
                    </div>

                    <div class="d-flex gap3 w-25">
                        <div class="txt-m2">Age:</div>
                        <div class="txt-m2 prescrition-edit-text flex-grow-1" style="padding-left: 20px;">{{Carbon::parse($appointment->patients()->first()->birthdate)->age}}</div>
                    </div>

                    <div class="d-flex gap3 w-25">
                        <div class="txt-m2">Sex:</div>
                        <div class="txt-m2 prescrition-edit-text flex-grow-1" style="padding-left: 20px;">{{$appointment->patients()->first()->gender[0]}}</div>
                    </div>
                </div>

                
            </div>

            {{-- Prescription Content --}}
            <div class="d-flex mar-top-1 gap1" style="min-height: 30vh;">
                <div>
                    <img src="/assets/media/rx-prescription.png" class="rx-logo" alt="">
                </div>
                <div class="prescription-content">
                    {!!$prescription->prescription!!}
                </div>
            </div>

            {{-- Footer Notes --}}
            <div class="d-flex mar-top-1 justify-content-end">
                <div class="d-flex flex-direction-y gap3">
                    <div class="d-flex gap3 w-100">
                        <div class="txt-m2">Physician's Signature:</div>
                        <div class="txt-m2 prescrition-edit-text flex-grow-1 position-relative" style="width: 200px;">
                            {{-- Insert Signature here --}}
                            <img class="position-absolute w-100" style="margin-top: -20px;" src="/assets/media/signatures/{{$appointment->doctors()->first()->signature}}" alt="">
                        </div>
                    </div>

                    <div class="d-flex gap3 w-100">
                        <div class="txt-m2">PRC #:</div>
                        <div class="txt-m2 prescrition-edit-text flex-grow-1" style="padding-left: 20px;">{{$appointment->doctors()->first()->prc_number}}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-auto primary-btn-small-violet1" id="print-btn">Print Prescription</div>

    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/printThis.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Print the Payslip
        $(document).ready(function () {
            const printBtn = $('#print-btn');

            printBtn.on('click', () => {
                const elements = $('#prescription');

                let appointmentID = {!! json_encode($appointment->id) !!};

                // Generate a timestamp or any unique string
                const timestamp = new Date().toISOString().replace(/[-T:Z]/g, '');

                // Set the filename with the desired name and the timestamp
                const filename = `${appointmentID}_prescription_${timestamp}.pdf`;

                // Print the container
                elements.printThis({
                    pageTitle: filename,
                    importCSS: true,
                    importStyle: true,
                    loadCSS: ['/assets/css/app.css', '/assets/css/elements.css', '/assets/css/navbar.css', '/assets/css/prescription.css'],
                    beforePrint: function () {
                        document.title = filename;
                    }
                });
            });
        });
    </script>
</html>