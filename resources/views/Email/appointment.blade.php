<!DOCTYPE html>
<html>
<head>
    <title>Clarrels Clinic Appointment</title>
</head>
<body>
    <h2>Good Day!</h2>
    @if ($alertType == "Pending")
        <div>You've booked an appointment for {{ $service }} at {{$date}}.</div>
        <div>Dr. {{ $doctor }} will be assigned for you.</div><br/>

    @elseif($alertType == "Approved")
        <div>Your appointment {{ $service }} has been approved please go to the clinic at {{$date}}.</div>
        <div>Appointment ID : <strong>{{$appointmentId}}</strong></div>
        <div>- Dr. {{ $doctor }}.</div><br/>

    @elseif($alertType == "Rejected")
        <div>Your appointment {{ $service }} has been rejected.</div>
        <div>- Dr. {{ $doctor }}.</div><br/>

    @else
        <div>Your appointment {{ $service }} has been completed.</div>
        <div>- Dr. {{ $doctor }}.</div><br/>
    @endif

</body>
</html>