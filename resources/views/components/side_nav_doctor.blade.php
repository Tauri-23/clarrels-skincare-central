<div class="side-nav-1">
    <div class="side-nav-logo">
        <img src="/assets/media/logos/logo2.jpeg" alt="">
    </div>
    <div class="d-flex flex-direction-y mar-top-1 mar-bottom-1 align-items-center">
        <div class="side-nav-pfp mar-bottom-3">
            <img src="/assets/media/pfp/{{$doctor->pfp}}" alt="">
        </div>
        <div class="txt-l3">{{$doctor->firstname}} {{$doctor->lastname}}</div>
        <div class="txt-m1">{{$doctor->doctor_type}}</div>
    </div>
    <div class="side-nav-1-links">
        <a href="/DoctorDash" class="side-nav-1-link {{$activeLink == 1 ? "active" : ""}}">
            <i class="txt-l3 bx bxs-dashboard icon"></i>
            Dashboard
        </a>
        <a href="/DoctorsPatients" class="side-nav-1-link {{$activeLink == 2 ? "active" : ""}}">
            <i class="{{$activeLink == 2 ? "bi bi-person-fill" : "bi bi-person"}} txt-l2"></i>
            Patients
        </a>
        <a href="/DoctorsAppointments" class="side-nav-1-link {{$activeLink == 3 ? "active" : ""}}">
            <i class="{{$activeLink == 3 ? "bi bi-calendar2-week-fill" : "bi bi-calendar2-week"}} txt-l2"></i>
            Appointments
        </a>
    </div>
</div>