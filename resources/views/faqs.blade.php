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

    <title>Clarrel's | FAQ's</title>
</head>
<body>
    <x-topnav activeLink="2"/>

    {{-- content --}}
    {{-- Content 1 --}}
    <div class="d-flex flex-direction-y gap1 w-100" style="padding: 100px 150px;">
        <div class="text-center txt-xl3 fw-bold">
            Frequently Ask Question
        </div>

        <div class="text-center txt-m1">
            We use only the best quality materials on the market in <br>
            order to provide the best products to our patients.
        </div>

        <div class="d-flex align-items-center justify-content-between" style="margin-top: 80px">

            <div class="overflow-hidden" style="border-radius: 10px;"><img src="/assets/media/pic4.png" alt=""></div>

            <div class="w-50">

                <div class="faq-box">
                    <div class="question">
                        <div>
                            Can I see who reads my email campaigns?
                        </div>
                        <i class="bi bi-dash-circle minus-icon d-none"></i>
                    </div>
                    
                    <div class="faq-line"></div>

                    <div class="faq-ans">
                        Lorem ipsum dolor sit amet consectetur.
                        Convallis cras placerat dignissim aliquam massa.
                        Aliquet volutpat rhoncus in convallis consectetur.
                        Cras adipiscing volutpat non hac enim odio enim.
                    </div>
                </div>
                <div class="faq-box">
                    <div class="question">
                        <div>
                            Do you offer non-profit discounts?
                        </div>
                        <i class="bi bi-dash-circle minus-icon d-none"></i>
                    </div>
                    
                    <div class="faq-line"></div>

                    <div class="faq-ans">
                        Lorem ipsum dolor sit amet consectetur.
                        Convallis cras placerat dignissim aliquam massa.
                        Aliquet volutpat rhoncus in convallis consectetur.
                        Cras adipiscing volutpat non hac enim odio enim.
                    </div>
                </div>
                <div class="faq-box">
                    <div class="question">
                        <div>
                            Can I see who reads my email campaigns?
                        </div>
                        <i class="bi bi-dash-circle minus-icon d-none"></i>
                    </div>
                    
                    <div class="faq-line"></div>

                    <div class="faq-ans">
                        Lorem ipsum dolor sit amet consectetur.
                        Convallis cras placerat dignissim aliquam massa.
                        Aliquet volutpat rhoncus in convallis consectetur.
                        Cras adipiscing volutpat non hac enim odio enim.
                    </div>
                </div>
                <div class="faq-box">
                    <div class="question">
                        <div>
                            Can I see who reads my email campaigns?
                        </div>
                        <i class="bi bi-dash-circle minus-icon d-none"></i>
                    </div>
                    
                    <div class="faq-line"></div>

                    <div class="faq-ans">
                        Lorem ipsum dolor sit amet consectetur.
                        Convallis cras placerat dignissim aliquam massa.
                        Aliquet volutpat rhoncus in convallis consectetur.
                        Cras adipiscing volutpat non hac enim odio enim.
                    </div>
                </div>
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