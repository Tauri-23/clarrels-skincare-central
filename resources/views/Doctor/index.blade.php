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
    <link rel="stylesheet" href="/assets/css/calendar.css">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/04f0992e18.js" crossorigin="anonymous"></script>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    {{-- Calendar CDN --}}
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>

    <title>Clarrel's | Doctor</title>
</head>
<body class="bg-white2">
    <x-top_nav_doctor title="Dashboard" :doctor="$doctor"/>
    <x-side_nav_doctor activeLink="1" :doctor="$doctor"/>
    <div class="content-1 compressed">
        <div class="d-flex gap1">
            <div class="long-cont">
                <div class="txt-xl3 w-100">{{$patients->count()}}</div>
                <div class="txt-m1 w-100 d-flex justify-content-end">Total Patients</div>
            </div>
            <div class="long-cont">
                <div class="txt-xl3 w-100">{{$appointment_today->count()}}</div>
                <div class="txt-m1 w-100 d-flex justify-content-end">Today's Appointments</div>
            </div>
            <div class="long-cont">
                <div class="txt-xl3 w-100">{{$totalAppointments->count()}}</div>
                <div class="txt-m1 w-100 d-flex justify-content-end">Total Appoinements</div>
            </div>
        </div>
        
        <div class="long-cont mar-top-1">
            <div id='calendar'></div>
        </div>
        
    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>

    <script>
        $(document).ready(function() {
            const appointments = @json($appointments);

            console.log(appointments);
            const events = appointments.map(appointment => {
                const startTime = moment(appointment.appointment_date).format('YYYY-MM-DD') + ' ' + appointment.appointment_time; // Assuming appointment_time is a separate field
                const formattedTime = moment(startTime).format('h:mm A');
                return {
                    title: appointment.services[0].service,
                    start: appointment.appointment_date,
                    end: appointment.appointment_date,
                    description: formattedTime,
                    patient: appointment.patients[0].firstname + " " + appointment.patients[0].lastname,
                    status: appointment.status
                };
            });

            $('#calendar').fullCalendar({
                events: events,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month'
                },
                editable: false,
                eventLimit: true,
                eventRender: function(event, element) {
                    element.find('.fc-title').html(
                        `<div class="event-details">
                            <div><h6>${event.title}</h6></div>
                            ${event.status}<br>
                            ${event.description}<br>
                            ${event.patient}
                         </div>`
                    );
                    if (event.status === 'Approved') {
                        element.find('.event-details').addClass('completed-note');
                    }
                    else {
                        element.find('.event-details').addClass('pending-note');
                    }
                },
                eventAfterAllRender: function(view) {
                    // Modify the "more" links
                    $('.fc-more').each(function() {
                        const numberOfAppointments = $(this).text().match(/\d+/)[0];
                        $(this).html(`+${numberOfAppointments} appointments more`);
                    });
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>