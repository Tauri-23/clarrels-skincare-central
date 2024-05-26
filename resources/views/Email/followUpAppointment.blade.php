<!DOCTYPE html>
<html>
<head>
    <title>Clarrels Clinic Appointment</title>
</head>
<body>
    <h2>Good Day!</h2>
    @if ($alertType == "Approved")
        <div>Dr. {{ $doctor }} has booked a Follow-up Appointment for {{ $service }} at {{$date}}.</div>
        <div> please book again if the schedule is not suitable for you.</div><br/>

    @elseif($alertType == "Canceled")
        <div>Your appointment {{ $service }} has been approved please go to the clinic at {{$date}}.</div>
        <div>Appointment ID : <strong>{{$appointmentId}}</strong></div>
        <div>- Dr. {{ $doctor }}.</div><br/>

        <div>Dr. {{ $doctor }} cancelled the Follow-up Appointment for {{ $service }} at {{$date}}.</div>
        <div>Thank you.</div><br/>

    @else
        <div>Your appointment {{ $service }} has been completed.</div>
        <div>- Dr. {{ $doctor }}.</div><br/>
    @endif

</body>
</html>