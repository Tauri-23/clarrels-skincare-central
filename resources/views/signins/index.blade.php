<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    {{-- Icon --}}
    <link rel="icon" href="/assets/media/logos/logo1.png" type="image/x-icon" />

    {{-- CSS --}}
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/elements.css">
    <link rel="stylesheet" href="/assets/css/forms.css">
    <link rel="stylesheet" href="/assets/css/signin.css">
    <link rel="stylesheet" href="/assets/css/nav.css">
    <link rel="stylesheet" href="/assets/css/footer.css">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/04f0992e18.js" crossorigin="anonymous"></script>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Clarrel's | Signin</title>
</head>
<body>
    {{-- Modals --}}
    <x-modals modalType="success"/>
    <x-modals modalType="error"/>

    {{-- Nav --}}
    <x-topnav activeLink="5"/>

    {{-- Content --}}
    <div class="signin-outer-cont">
        {{-- Login Box --}}
        <div class="" id="login-box">
            @csrf
            <div class="signin-box d-flex flex-direction-y gap2">
                <div class="txt-l1 w-100 text-center color-black2">Signin</div>
                <div class="d-flex flex-direction-y gap3">
                    <div>
                        <label for="uname-in" class="txt-l3">Username</label>
                        <input type="text" class="edit-text-1 w-100" placeholder="Username" id="uname-in">
                    </div>

                    <div>
                        <label for="pass-in" class="txt-l3">Password</label>
                        <div class="position-relative w-100 d-flex align-items-center">
                            <input type="password" class="edit-text-1 w-100 password-input" placeholder="Password" id="pass-in">
                            <i class="bi bi-eye-fill position-absolute right3 txt-l3 see-pass cursor-pointer"></i>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a class="text-m3 color-black2 text-decoration-none cursor-pointer" id="forgot-pass-btn">Forgot Password</a>
                    </div>
                </div>
    
                <div class="d-flex flex-direction-y gap3">
                    <a class="primary-btn-small-violet1 txt-m1 text-center" id="signin-btn">Sign in</a>
                    <a href="/signupPatient" class="secondary-btn-violet1 txt-m1 text-center color-black2">Sign up</a>
                </div>
                
                
            </div>
        </div>





        {{-- Forgot Password Email Box --}}
        <div class="d-none" id="fp-email-box">
            @csrf
            <div class="signin-box d-flex flex-direction-y gap2">
                <div class="txt-l1 w-100 text-center color-black2">Forgot Password</div>
                <div class="d-flex flex-direction-y gap3">
                    <div>
                        <label for="email-in" class="txt-l3">Email</label>
                        <input type="text" class="edit-text-1 w-100" id="email-in">
                    </div>
                </div>
    
                <div class="d-flex flex-direction-y gap3">
                    <a class="primary-btn-small-violet1 txt-m1 text-center" id="next-btn">Next</a>
                </div>              
                
            </div>
        </div>





        {{-- Forgot Password OTP Box --}}
        <div class="d-none" id="fp-otp-box">
            @csrf
            <div class="signin-box d-flex flex-direction-y gap2">
                <div class="txt-l1 w-100 text-center color-black2">Forgot Password</div>
                <div class="d-flex flex-direction-y gap3">
                    <div>
                        <label for="otp-in" class="txt-l3">Enter 6-digit OTP</label>
                        <input type="text" class="edit-text-1 w-100" id="otp-in">
                    </div>
                </div>
    
                <div class="d-flex flex-direction-y gap3">
                    <a class="primary-btn-small-violet1 txt-m1 text-center" id="next-btn">Next</a>
                </div>              
                
            </div>
        </div>





        {{-- Forgot Password Change Pass Box --}}
        <div class="d-none" id="fp-change-pass-box">
            @csrf
            <div class="signin-box d-flex flex-direction-y gap2">
                <div class="txt-l1 w-100 text-center color-black2">Forgot Password</div>
                <div class="d-flex flex-direction-y gap3">
                    <div>
                        <label for="pass-in" class="txt-l3">Password</label>
                        <div class="position-relative w-100 d-flex align-items-center">
                            <input type="password" class="edit-text-1 w-100 password-input" placeholder="Password" id="pass-in">
                            <i class="bi bi-eye-fill position-absolute right3 txt-l3 see-pass cursor-pointer"></i>
                        </div>
                    </div>

                    <div>
                        <label for="con-pass-in" class="txt-l3">Confirm Password</label>
                        <div class="position-relative w-100 d-flex align-items-center">
                            <input type="password" class="edit-text-1 w-100 password-input" placeholder="Confirm Password" id="con-pass-in">
                            <i class="bi bi-eye-fill position-absolute right3 txt-l3 see-pass cursor-pointer"></i>
                        </div>
                    </div>
                </div>
    
                <div class="d-flex flex-direction-y gap3">
                    <a class="primary-btn-small-violet1 txt-m1 text-center" id="next-btn">Next</a>
                </div>              
                
            </div>
        </div>
        
    </div>

    {{-- Footer --}}
    <x-footer/>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/signin.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>