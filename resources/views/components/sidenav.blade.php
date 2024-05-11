
<div class="side-nav-1">
    <div class="side-nav-logo">
        <img src="/assets/media/logos/logo2.jpeg" alt="">
    </div>
    <div class="side-nav-1-links mar-top-1">
        <a href="/PatientDash" class="side-nav-1-link {{$activeLink == 1 ? "active" : ""}}">
            <i class="bi bi-speedometer2 txt-l2"></i>
            Dashboard
        </a>
        <a href="/PatientProfile/{{session('logged_patient')}}" class="side-nav-1-link {{$activeLink == 2 ? "active" : ""}}">
            <i class="{{$activeLink == 2 ? "bi bi-person-fill" : "bi bi-person"}} txt-l2"></i>
            Profile
        </a>
        <a href="/PatientAppointments" class="side-nav-1-link {{$activeLink == 3 ? "active" : ""}}">
            <i class="{{$activeLink == 3 ? "bi bi-calendar2-week-fill" : "bi bi-calendar2-week"}} txt-l2"></i>
            Appointment
        </a>
        {{-- <a class="side-nav-0-link {{$activeLink == 3 ? "active" : ""}}">
            <i class="bi bi-prescription txt-l2"></i>
            Prescription
        </a> --}}
        <a href="/PatientHistory" class="side-nav-1-link {{$activeLink == 4 ? "active" : ""}}">
            <i class="bi bi-clock-history txt-l2"></i>
            History
        </a>
    </div>
</div>