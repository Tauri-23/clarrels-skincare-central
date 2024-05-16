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

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/04f0992e18.js" crossorigin="anonymous"></script>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Clarrel's | Sign up</title>
</head>
<body>
    {{-- Modals --}}
    <x-modals modalType="success"/>
    <x-modals modalType="error"/>


    <div class="signin-outer-cont">
        <form method="post">
            @csrf
            <div class="signup-box d-flex flex-direction-y gap1">
                <div class="txt-l1 w-100 text-center color-black2">Sign up</div>
                <div class="d-flex flex-direction-y gap3">

                    <div class="d-flex gap2">
                        <div class="flex-grow-1">
                            <label for="fname-in" class="txt-l3">First name</label>
                            <input type="text" class="edit-text-1 w-100" placeholder="e.g. John" id="fname-in">
                        </div>
                        <div class="flex-grow-1">
                            <label for="mname-in" class="txt-l3">Middle name</label>
                            <input type="text" class="edit-text-1 w-100" placeholder="e.g. Delacruz" id="mname-in">
                        </div>
                        <div class="flex-grow-1">
                            <label for="lname-in" class="txt-l3">Last name</label>
                            <input type="text" class="edit-text-1 w-100" placeholder="" id="lname-in">
                        </div>
                    </div>

                    <div class="flex-grow-1">
                        <label for="uname-in" class="txt-l3">Username</label>
                        <input type="text" class="edit-text-1 w-100" placeholder="e.g. john123" id="uname-in">
                    </div>

                    <div class="d-flex gap2">
                        <div class="flex-grow-1">
                            <label for="pass-in" class="txt-l3">Password</label>
                            <input type="password" class="edit-text-1 w-100" placeholder="Password" id="pass-in">
                        </div>
                        <div class="flex-grow-1">
                            <label for="conpass-in" class="txt-l3">Confirm Password</label>
                            <input type="password" class="edit-text-1 w-100" placeholder="Confirm Password" id="conpass-in">
                        </div>
                    </div>

                    <div class="d-flex gap2">
                        <div class="flex-grow-1">
                            <label for="email-in" class="txt-l3">Email</label>
                            <input type="text" class="edit-text-1 w-100" id="email-in">
                        </div>
                        <div class="flex-grow-1">
                            <label for="phone-in" class="txt-l3">Phone</label>
                            <input type="text" maxlength="10" class="edit-text-1 w-100" id="phone-in">
                        </div>
                    </div>

                    <div class="d-flex gap2">
                        <div class="flex-grow-1">
                            <label for="bdate-in" class="txt-l3">Birth Date</label>
                            <input type="date" class="edit-text-1 w-100" id="bdate-in">
                        </div>
                        <div class="flex-grow-1">
                            <label for="gender-in" class="txt-l3">Gender</label>
                            
                            <select class="edit-text-1 w-100" id="gender-in">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex-grow-1">
                        <label for="address-in" class="txt-l3">Address</label>
                        <input type="text" class="edit-text-1 w-100" placeholder="Address" id="address-in">
                    </div>

                </div>
    
                <div class="d-flex flex-direction-y gap3">
                    <a class="primary-btn-small-violet1 txt-m1 text-center" id="signup-btn">Sign up</a>
                    <a class="text-decoration-none color-black2 text-center" href="/signinPatient">Already have an account? Sign in</a>
                </div>
                
                
            </div>
        </form>
        
    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/signup.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>