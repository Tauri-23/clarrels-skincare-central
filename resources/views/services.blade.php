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
    <link rel="stylesheet" href="/assets/css/landing-page.css">
    <link rel="stylesheet" href="/assets/css/footer.css">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/04f0992e18.js" crossorigin="anonymous"></script>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Clarrel's | Services</title>
</head>
<body>
    <x-topnav activeLink="3"/>

    {{-- content --}}
    {{-- Content 1 --}}
    <div class="d-flex flex-direction-y gap1 w-100" style="padding: 50px 150px;">
        <div class="text-center txt-xl3 fw-bold">
            Services
        </div>

        <div class="text-center txt-m1">
            At Cabantog's Clinic, we offer a comprehensive range of dental and skincare services designed to meet all your health and beauty needs. <br>
            Our expert team utilizes state-of-the-art technology and the highest quality materials to provide exceptional care <br> 
            in a comfortable and welcoming environment.
        </div>

        <div class="" style="margin-top: 80px">

            <div class="txt-xl3 mar-bottom-2">Skincare</div>
            <div class="d-flex flex-wrap gap2 mar-bottom-1">
                @foreach ($skinCareServices as $service)
                    <div class="service-box-2 d-flex flex-direction-y justify-content-center">
                        <div class="text-center txt-l2">
                            {{$service->service}}
                        </div>

                        <div class="txt-m3 text-center">
                            {{"₱ " . number_format($service->price, 2, '.', ',')}}
                        </div>

                        {{-- <div class="text-center txt-m1 ellipsis3">
                            {{$service->description}}
                        </div> --}}
                    </div>                    
                @endforeach
            </div>



            <div class="txt-xl3 mar-bottom-2">Dental</div>
            <div class="d-flex flex-wrap gap2">
                @foreach ($dentalServices as $service)
                    <div class="service-box-2 d-flex flex-direction-y justify-content-center">
                        <div class="text-center txt-l2">
                            {{$service->service}}
                        </div>

                        <div class="txt-m3 text-center">
                            {{"₱ " . number_format($service->price, 2, '.', ',')}}
                        </div>

                        {{-- <div class="text-center txt-m1 ellipsis3">
                            {{$service->description}}
                        </div> --}}
                    </div>                    
                @endforeach
            </div>

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