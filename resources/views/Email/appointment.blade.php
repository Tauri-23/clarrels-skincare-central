<!DOCTYPE html>
<html>
<head>
    <title>Clarrels Clinic Appointment</title>
</head>
<body>
    <h2>Good Day!</h2>
    @if ($alertType == "Pending")
        <p>You've booked an appointment for {{ $service }} at {{$date}}.</p><br/>
        <p>Dr. {{ $doctor }} will be assigned for you.</p><br/>
    @elseif($alertType == "Rejected")
        <p>Your appointment {{ $service }} has been rejected.</p><br/>
        <p>- Dr. {{ $doctor }}.</p><br/>
    @else
        <p>Your appointment {{ $service }} has been completed.</p><br/>
        <p>- Dr. {{ $doctor }}.</p><br/>
    @endif

</body>
</html>