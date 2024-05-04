@if ($navType == 0) {{-- For Landing page --}}
    <div class="top-nav-0">
        <div class="logo d-flex color-white2">
            <div class="text-end">Clarrel's Skincare </br> Central</div>
            <div class="vertical-line-black mar-start-3 mar-end-3"></div>
            <div class="">Cabantog's Dental </br> Clinic</div>
        </div>
        <div class="top-nav-0-links">
            <a href="" class="top-nav-link {{$activeLink == 0 ? "active" : ""}}">FAQ's</a>
            <a href="" class="top-nav-link {{$activeLink == 1 ? "active" : ""}}">Out Story</a>
            <a href="" class="top-nav-link {{$activeLink == 2 ? "active" : ""}}">Updates</a>
            <a href="" class="top-nav-link {{$activeLink == 3 ? "active" : ""}}">Learning Resources</a>
            <a href="" class="top-nav-link {{$activeLink == 4 ? "active" : ""}}">Services</a>
            <a href="/signinPatient" class="top-nav-link {{$activeLink == 5 ? "active" : ""}}">Sign in</a>
        </div>
    </div>
@elseif($navType == 1) {{-- Patient --}}
<div class="top-nav-1">
    <div class="d-flex color-black2">
        <i class="bi bi-list txt-l1" id="burger-nav"></i>
    </div>
</div>
@endif