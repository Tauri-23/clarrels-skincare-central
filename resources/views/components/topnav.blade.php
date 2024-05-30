<div class="top-nav-0">
    <div class="top-nav-logo d-flex align-items-center txt-l2">
        {{-- <img src="/assets/media/logos/logo2.jpeg" alt=""> --}}
        Cabantog's Clinic
    </div>
    <div class="top-nav-0-links">
        <a href="/" class="top-nav-link {{$activeLink == 1 ? "active" : ""}}">Home</a>
        <a href="/faqs" class="top-nav-link {{$activeLink == 2 ? "active" : ""}}">FAQ's</a>
        <a href="/services" class="top-nav-link {{$activeLink == 3 ? "active" : ""}}">Services</a>
        <a href="/about" class="top-nav-link {{$activeLink == 4 ? "active" : ""}}">About</a>
        
    </div>

    <a href="/signinPatient" class="top-nav-link {{$activeLink == 5 ? "active" : ""}}">Sign in</a>
</div>