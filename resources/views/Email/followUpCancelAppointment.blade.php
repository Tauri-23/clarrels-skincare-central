<!DOCTYPE html>
<html>
<head>
    <title>Clarrels Clinic Appointment</title>
</head>
<body>
    <h2>Good Day!</h2>
    <div>Dr. {{ $doctor }} has canceled your Follow-up Appointment for {{ $service }} due to {{$reason}}.</div>
    <strong>Appointment ID: {{$appointmentId}}</strong>
</body>
</html>