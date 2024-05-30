
<div class="side-nav-1">
    <div class="d-flex align-items-center txt-l2 justify-content-center" style="padding: 10px 0;">
        {{-- <img src="/assets/media/logos/logo2.jpeg" alt=""> --}}
        Cabantog's Clinic
    </div>
    <div class="side-nav-1-links">
        <a href="/AdminDash" class="side-nav-1-link {{$activeLink == 1 ? "active" : ""}}">
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

        <a href="/ContentManagement" class="side-nav-1-link {{$activeLink == 4 ? "active" : ""}}">
            <i class="{{$activeLink == 4 ? "bi bi-aspect-ratio-fill" : "bi bi-aspect-ratio"}} txt-l2"></i>
            Content
        </a>
        
    </div>
</div>