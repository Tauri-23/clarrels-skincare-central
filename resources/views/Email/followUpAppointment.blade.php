<!DOCTYPE html>
<html>
<head>
    <title>Clarrels Clinic Appointment</title>
</head>
<body>
    @if ($alertType == "Pending")
        <h2>Good Day!</h2>
        <div>Dr. {{ $doctor }} has booked a Follow-up Appointment for {{ $service }} at {{$date}}.</div>
        <div> please book again if the schedule is not suitable for you.</div><br/>

        <strong>Appointment ID: {{$appointmentId}}</strong>
    @elseif($alertType == "Approved")
        <h2>Good Day!</h2>
        <div>You have Accepted the Follow-up Appointment for {{ $service }}.</div>
        <div>Please go to the clinic on {{$date}}, Dr. {{$doctor}} is assigned for you.</div><br/>

        <strong>Appointment ID: {{$appointmentId}}</strong>
    @endif
    

</body>
</html>