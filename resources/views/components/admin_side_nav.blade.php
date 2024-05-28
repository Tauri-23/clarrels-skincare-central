
<div class="side-nav-1">
    <div class="side-nav-logo">
        <img src="/assets/media/logos/logo2.jpeg" alt="">
    </div>
    <div class="side-nav-1-links">
        <a href="/DoctorDash" class="side-nav-1-link {{$activeLink == 1 ? "active" : ""}}">
            <i class="txt-l3 bx bxs-dashboard icon"></i>
            Dashboard
        </a>
        <a href="/AdminPatients" class="side-nav-1-link {{$activeLink == 2 ? "active" : ""}}">
            <i class="{{$activeLink == 2 ? "bi bi-person-fill" : "bi bi-person"}} txt-l2"></i>
            Patients
        </a>
        <a href="/AdminDoctors" class="side-nav-1-link {{$activeLink == 3 ? "active" : ""}}">
            <i class="{{$activeLink == 3 ? "bi bi-person-fill" : "bi bi-person"}} txt-l2"></i>
            Doctors
        </a>
        
    </div>
</div>