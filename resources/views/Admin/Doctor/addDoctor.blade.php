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
    <link rel="stylesheet" href="/assets/css/nav.css">
    <link rel="stylesheet" href="/assets/css/table.css">
    <link rel="stylesheet" href="/assets/css/forms.css">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/04f0992e18.js" crossorigin="anonymous"></script>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Clarrel's | Admin</title>
</head>
<body class="bg-white2">
    {{-- modals --}}
    <x-modals modalType="info-yn"/>
    <x-modals modalType="success"/>
    <x-modals modalType="error"/>

    {{-- Navbar --}}
    <x-admin_top_nav title="Add Doctor"/>
    <x-admin_side_nav activeLink="5"/>


    <div class="content-1 compressed">

        <div class="long-cont d-flex flex-direction-y gap2">
            <div class="txt-l3 mar-bottom-2">Add Doctor</div>
            <div class="d-flex w-100 gap2">
                <div class="w-100">
                    <label for="fname-in">Firstname</label>
                    <input type="text" class="edit-text-1 w-100" id="fname-in">
                </div>
                <div class="w-100">
                    <label for="lname-in">Lastname</label>
                    <input type="text" class="edit-text-1 w-100" id="lname-in">
                </div>
            </div>

            <div class="d-flex w-100 gap2">
                <div class="w-100">
                    <label for="prc-in">PRC</label>
                    <input type="text" class="edit-text-1 w-100" id="prc-in" maxlength="9">
                </div>
                <div class="w-100">
                    <label for="doctor-type-in">Doctor Type</label>
                    <select class="edit-text-1 w-100" id="doctor-type-in">
                        <option value="Orthodontist">Orthodontist</option>
                        <option value="Skin care">Skin care</option>
                    </select>
                </div>
            </div>

            <div class="d-flex w-100 gap2">
                <div class="w-100">
                    <label for="uname-in">Username</label>
                    <input type="text" class="edit-text-1 w-100" id="uname-in">
                </div>
                <div class="w-100">
                    <label for="email-in">Email</label>
                    <input type="text" class="edit-text-1 w-100" id="email-in">
                </div>
                <div class="w-100">
                    <label for="phone-in">Phone</label>
                    <input type="text" class="edit-text-1 w-100" id="phone-in" maxlength="10">
                </div>
            </div>

            <div class="d-flex w-100 gap2">
                <div class="w-100">
                    <label for="pass-in">Password</label>
                    <div class="position-relative w-100 d-flex align-items-center">
                        <input type="password" class="edit-text-1 w-100 password-input" placeholder="Password" id="pass-in">
                        <i class="bi bi-eye-fill position-absolute right3 txt-l3 see-pass cursor-pointer"></i>
                    </div>
                </div>
                
                <div class="w-100">
                    <label for="con-pass-in">Confirm Password</label>
                    <div class="position-relative w-100 d-flex align-items-center">
                        <input type="password" class="edit-text-1 w-100 password-input" placeholder="Password" id="con-pass-in">
                        <i class="bi bi-eye-fill position-absolute right3 txt-l3 see-pass cursor-pointer"></i>
                    </div>
                </div>
            </div>

            <div class="d-flex w-100 gap2">
                <div class="w-100">
                    <label for="bdate-in">Birth Date</label>
                    <input type="date" class="edit-text-1 w-100" id="bdate-in">
                </div>
                <div class="w-100">
                    <label for="gender-in">Gender</label>
                    <select class="edit-text-1 w-100" id="gender-in">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>

            <div class="d-flex w-100 gap2">
                <div class="w-100">
                    <label for="address-in">Address</label>
                    <input type="text" class="edit-text-1 w-100" id="address-in">
                </div>

                <div class="w-100">
                    <label for="signature-in">Signature</label>
                    <input type="file" class="edit-text-1 w-100" id="signature-in">
                </div>
            </div>

            <div class="d-flex justify-content-end mar-top-2">
                <div class="primary-btn-small-violet1" id="add-doctor-btn">Add Doctor</div>
            </div>

        </div>

    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/admin-add-doctor.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>