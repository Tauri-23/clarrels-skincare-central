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
    <link rel="stylesheet" href="/assets/css/content-management.css">

    <link rel="stylesheet" href="/assets/css/forms.css">

    <link rel="stylesheet" href="/assets/css/landing-page.css">
    <link rel="stylesheet" href="/assets/css/footer.css">

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
    <x-modals modalType="admin-edit-content-1"/>
    <x-modals modalType="admin-edit-content-1"/>
    <x-modals modalType="admin-edit-content-1"/>
    <x-modals modalType="admin-edit-content-1"/>
    
    <x-modals modalType="info-yn"/>
    <x-modals modalType="success"/>
    <x-modals modalType="error"/>

    {{-- Navs --}}
    <x-admin_top_nav title="Content Management"/>
    <x-admin_side_nav activeLink="4"/>

    {{-- Content --}}
    <div class="content-1 compressed">
        {{-- Nav --}}
        <div class="long-cont-nopadding d-flex gap1 mar-bottom-1">
            <div class="doc-appointment-nav-link active" id="pending-nav-btn">Home Page</div>
            <div class="doc-appointment-nav-link" id="approved-nav-btn">Faq's Page</div>
            <div class="doc-appointment-nav-link" id="rejected-nav-btn">Services</div>
        </div>

        {{-- Content 1 --}}
        <div class="d-flex justify-content-between w-100" style="height: 80vh; padding: 0 150px;">
            <div class="h-100 d-flex flex-direction-y justify-content-center gap2">
                <div class="txt-xl3 fw-bold position-relative">
                    {!!$content1->title!!}
                </div>

                <div class="txt-l3 position-relative">
                    {!!$content1->content!!}
                </div>

                <div class="txt-m1 primary-btn-small-violet1 align-self-start" id="edit-home-cont1"><i class="bi bi-pencil-square mar-end-3"></i>Edit Content 1</div>
            </div>

            <img src="/assets/media/dentist1.png" alt="dentist">
            
        </div>

        {{-- Content 2 --}}
        <div class="d-flex align-items-start" style="padding: 0 100px;">
            <div class="service-mini-cont">
                <div class="service-box">
                    <div class="service-icon-cont">
                        <img src="/assets/media/teeth1.png" alt="">
                    </div>
                    <div class="txt-l2 text-center">{!! $content2_1->title !!}</div>
                    <div class="txt-m1 text-center">{!! $content2_1->content !!}</div>
                    <div class="m-auto txt-m1 primary-btn-small-violet1 align-self-start" id="edit-home-cont2_1"><i class="bi bi-pencil-square mar-end-3"></i>Edit Content2.1</div>
                </div>

                <div class="service-box">
                    <div class="service-icon-cont">
                        <img src="/assets/media/teeth1.png" alt="">
                    </div>
                    <div class="txt-l2 text-center">{!! $content2_2->title !!}</div>
                    <div class="txt-m1 text-center">{!! $content2_2->content !!}</div>
                    <div class="m-auto txt-m1 primary-btn-small-violet1 align-self-start" id="edit-home-cont2_2"><i class="bi bi-pencil-square mar-end-3"></i>Edit Content2.2</div>
                </div>

                <div class="service-box">
                    <div class="service-icon-cont">
                        <img src="/assets/media/teeth1.png" alt="">
                    </div>
                    <div class="txt-l2 text-center">{!! $content2_3->title !!}</div>
                    <div class="txt-m1 text-center">{!! $content2_3->content !!}</div>
                    <div class="m-auto txt-m1 primary-btn-small-violet1 align-self-start" id="edit-home-cont2_3"><i class="bi bi-pencil-square mar-end-3"></i>Edit Content2.3</div>
                </div>
            </div>
        </div>


        {{-- Content 3 --}}
        <div class="d-flex justify-content-between align-items-center" style="height: 80vh; padding: 0 150px;">
            <div class="d-flex flex-direction-y gap3">
                <div class="txt-xl3 fw-bold">
                    We're welcoming new patients <br>
                    and can't wait to meet you.
                </div>

                <div class="txt-m1">
                    We use only the best quality materials on the market <br>
                    in order to provide the best products to our patients, <br>
                    So don't worry about anything and book yourself.
                </div>
            </div>

            <img src="/assets/media/pic1.png">
        </div>


        {{-- Content 4 --}}
        <div class="d-flex justify-content-between align-items-center" style="padding: 0 150px;">

            <div class="content-4-box">
                <div class="content-4-pic">
                    <img src="/assets/media/pic2.png" alt="">
                </div>

                <div class="w-50 d-flex flex-direction-y gap1">
                    <div class="txt-xl3 fw-bold">Why choose cabantog for all your dental treatments?</div>
                    <div class="txt-l3">We use only the best quality materials on the market in order to provide the best products to our patients.</div>

                    <div class="d-flex flex-direction-y gap3">
                        <div class="txt-m1">
                            <i class="bi bi-check-square-fill color-violet1 mar-end-3"></i>
                            Top quality dental team
                        </div>

                        <div class="txt-m1">
                            <i class="bi bi-check-square-fill color-violet1 mar-end-3"></i>
                            State of the art dental services
                        </div>

                        <div class="txt-m1">
                            <i class="bi bi-check-square-fill color-violet1 mar-end-3"></i>
                            Discount on all dental treatment
                        </div>

                        <div class="txt-m1">
                            <i class="bi bi-check-square-fill color-violet1 mar-end-3"></i>
                            Enrollment is quick and easy
                        </div>
                    </div>

                    <a href="/signinPatient" class="primary-btn-small-violet1 align-self-start txt-l3">Book Appointment</a>
                </div>
            </div>
        </div>


        {{-- Content 5 --}}
        <div class="d-flex justify-content-between align-items-center" style="height: 80vh; padding: 0 150px;">
            <div class="d-flex flex-direction-y gap3">
                <div class="txt-xl3 fw-bold">
                    Leave your worries at the door <br>
                    and enjoy healthier skin <br> 
                    and a brighter smile.
                </div>

                <div class="txt-m1">
                    We use only the best quality materials on the market <br>
                    in order to provide the best products to our patients, <br>
                    So don't worry about anything and book yourself.
                </div>
            </div>

            <img src="/assets/media/pic3.png">
            
        </div>


        {{-- Content 6 --}}
        <div class="d-flex flex-direction-y justify-content-center gap1 bg-violet4 mar-bottom-1" style=" padding: 150px 100px;">
            <div class="text-center txt-xl3 fw-bold">Meet our specialist</div>
            <div class="text-center txt-m1">
                We use only the best quality materials on the market <br>
                in order to provide the best products to our patients.
            </div>

            <div class="d-flex gap1 justify-content-center">

                @foreach ($doctors as $doc)
                    <div class="doctor-card">
                        <img src="/assets/media/pfp/{{$doc->pfp}}" alt="">
                        <div class="doctor-card-name">
                            <div class="txt-l3">
                                {{$doc->firstname}} {{$doc->lastname}}
                            </div>
                            <div class="txt-m3">
                                {{$doc->doctor_type}}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>


        {{-- Footer --}}
        <x-footer/>
        
    </div>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script>
        const content1Db = {!!json_encode($content1)!!};
        const content2_1Db = {!!json_encode($content2_1)!!};
        const content2_2Db = {!!json_encode($content2_2)!!};
        const content2_3Db = {!!json_encode($content2_3)!!};
    </script>
    <script src="/assets/js/content-management.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>