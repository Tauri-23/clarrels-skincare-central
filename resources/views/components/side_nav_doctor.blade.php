<div class="side-nav-1">
    <div class="d-flex align-items-center txt-l2 justify-content-center" style="padding: 10px 0;">
        {{-- <img src="/assets/media/logos/logo2.jpeg" alt=""> --}}
        Cabantog's Clinic
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
            <i class="{{$activeLink == 2 ? "bi bi-calendar2-week-fill" : "bi bi-calendar2-week"}} txt-l2"></i>
            Calendar
        </a>
        <a href="/DoctorsAppointments/pending" class="side-nav-1-link {{$activeLink == 2 ? "active" : ""}}">
            <i class="{{$activeLink == 2 ? "bi bi-briefcase-fill" : "bi bi-briefcase"}} txt-l2"></i>
            Appointments
        </a>
        {{-- <a href="/DoctorsFollowUpAppointments" class="side-nav-1-link {{$activeLink == 3 ? "active" : ""}}">
            <i class="{{$activeLink == 3 ? "bi bi-calendar2-week-fill" : "bi bi-calendar2-week"}} txt-l2"></i>
            Follow-ups
        </a> --}}
        <a href="/DoctorsPatients" class="side-nav-1-link {{$activeLink == 4 ? "active" : ""}}">
            <i class="{{$activeLink == 4 ? "bi bi-person-fill" : "bi bi-person"}} txt-l2"></i>
            Patients
        </a>
        <a href="/DoctorProfile" class="side-nav-1-link {{$activeLink == 5 ? "active" : ""}}">
            <i class="{{$activeLink == 5 ? "bi bi-person-fill" : "bi bi-person"}} txt-l2"></i>
            My Profile
        </a>
        
    </div>
</div>