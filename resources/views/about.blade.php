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
    <link rel="stylesheet" href="/assets/css/forms.css">
    <link rel="stylesheet" href="/assets/css/landing-page.css">
    <link rel="stylesheet" href="/assets/css/footer.css">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/04f0992e18.js" crossorigin="anonymous"></script>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Clarrel's | About</title>
</head>
<body>
    <x-topnav activeLink="4"/>

    {{-- content --}}
    {{-- Content 1 --}}
    <div class="d-flex flex-direction-y gap1 w-100 position-relative" style="">

        <img src="/assets/media/pic6.png" class="w-100 h-100" alt="">
        
        <div class="position-absolute" style="width: 800px; bottom: 300px; left: 50px;">
            <div class="text-center txt-l2 fw-bold color-violet1">
                Welcome to Cabantog's clinic
            </div>
    
            <div class="text-center txt-xl3">
                A Great Place to Skin and Dental Care
            </div>

            <div class="text-center txt-m1">
                We prioritize your overall well-being by providing personalized care that addresses both your aesthetic and oral health needs.
            </div>
        </div>
        
    </div>

    {{-- Content 2 --}}
    <div class="d-flex flex-direction-y gap1 w-100 position-relative" style="padding: 0 0 80px 0;">
        
        <div class="text-center txt-xl2 fw-bold">
            About Us
        </div>

        <img src="/assets/media/pic7.png" class="" alt="" style="margin: 0 150px;">

        <div class="text-center txt-l2" style="margin: 0 150px;">
            At Clarrel's Skincare and Cabantog Dental Clinic, we are passionate about providing top-tier skincare and dental services. 
            Located in the heart of Makati, we offer luxurious, science-backed skincare products designed to enhance your natural beauty, 
            and comprehensive dental care to ensure your oral health is at its best.
        </div>
        
    </div>


    {{-- Content 3 --}}
    <div class="d-flex flex-direction-y gap1 w-100" style="padding: 80px 150px;">

        <div class="bg-violet4 d-flex justify-content-center" style="padding: 0 50px; gap: 10%;">
            <img src="/assets/media/pic8.png" class="" alt="">
            <div class="text-center w-25 d-flex align-items-center" style="padding: 50px;">
                <div>
                    <div class="txt-xl3 fw-bold">
                        Mission
                    </div>
                    
                    <div class="text-center">
                        To empower individuals to embrace their natural beauty and 
                        achieve optimal skin and oral health through personalized care, 
                        cutting-edge solutions, and a commitment to excellence.
                    </div>
                </div>
            </div>
        </div>

    </div>


    {{-- Content 4 --}}
    <div class="d-flex flex-direction-y gap1 w-100" style="padding: 80px 150px;">

        <div class="d-flex justify-content-center" style="padding: 0 50px; gap: 10%;">
            
            <div class="text-center w-25 d-flex align-items-center" style="padding: 50px;">
                <div>
                    <div class="txt-xl3 fw-bold">
                        Vision
                    </div>
                    
                    <div class="text-center">
                        To empower individuals to embrace their natural beauty and 
                        achieve optimal skin and oral health through personalized care, 
                        cutting-edge solutions, and a commitment to excellence.
                    </div>
                </div>
            </div>

            <img src="/assets/media/pic9.png" class="" alt="">

        </div>

    </div>


    {{-- Content 5 --}}
    <div class="d-flex flex-direction-y gap1 w-100" style="padding: 80px 150px;">

        <div class="bg-violet4 d-flex justify-content-center" style="padding: 0 50px; gap: 10%;">
            <img src="/assets/media/pic10.png" class="" alt="">
            <div class="text-center w-25 d-flex align-items-center" style="padding: 50px;">
                <div>
                    <div class="txt-xl3 fw-bold">
                        Approach
                    </div>
                    
                    <div class="text-center">
                        We believe in a holistic approach to wellness, recognizing the interconnectedness of 
                        skin and oral health. Our team of experienced professionals is committed to providing 
                        personalized care that addresses your unique needs and goals. We strive to create a welcoming 
                        and relaxing environment where you feel comfortable and confident in our care.
                    </div>
                </div>
            </div>
        </div>

    </div>



    {{-- Content 6 --}}
    <div class="d-flex flex-direction-y gap1 w-100" style="padding: 80px 150px;">

        <div class="d-flex justify-content-center" style="padding: 0 50px; gap: 10%;">
            
            <div class="text-center w-25 d-flex align-items-center" style="padding: 50px;">
                <div>
                    <div class="txt-xl3 fw-bold">
                        Innovation
                    </div>
                    
                    <div class="text-center">
                        We are constantly seeking out new advancements in skincare and dental technology 
                        to ensure that our clients receive the most effective and innovative treatments available. 
                        We invest in ongoing education and training for our staff to stay at the forefront of our respective fields.
                    </div>
                </div>
            </div>

            <img src="/assets/media/pic11.png" class="" alt="">

        </div>

    </div>

    


    {{-- Footer --}}
    <x-footer/>
    
</body>
    {{-- Scripts --}}
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/faqs.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>