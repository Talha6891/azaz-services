<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
{{--    <link--}}
{{--        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"--}}
{{--        rel="stylesheet">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>@yield('title', env('APP_NAME'))</title>
</head>

<body>

{{-- header start --}}
@include('site.partials.header')
{{-- header end --}}

<!-- Section one ------------------------------ -->

<div class="section_one">
    <div class="section_content">
        <div class="section_logo">
            <div class="logo_1"></div>
        </div>
        <div class="section_text">
            <p> WE DESIGN . . WE BUILD</p>
            <P id="second_P">LUXURY . MODERN . CLASSIC . CONTEMPORARY</P>
        </div>
    </div>
</div>

<!-- section_2 ----------------------------------------->

<div class="img-spazio_text">
    <div class="img-spazio_text-main">
        <div class="img-spazio_text-main-left">
            <img src=" {{ asset('site/images/p1-min-copy-1.webp') }}" alt="">
        </div>
        <div class="img-spazio_text-main-right">
            <div class="img-spazio_text-main-right-top_text">
                <p class="about">about</p>
                <p class="spazio">spazio</p>
            </div>
            <div class="img-spazio_text-main-right-center_text">
                <div class="img-spazio_text-main-right-center_text-main">
                    <li>
                        Spazio is a highly versatile design studio that provides an extensive range of services relating
                        to interior design, construction, audit, quantity surveying, project documentation, and more.
                    </li>
                    <li>
                        Our team specializes in the designing of shopping malls, retail outlets, hotels, offices,
                        headquarters, and commercial and residential projects.
                    </li>
                    <li>
                        We have built a reputation for excellence and set the bar high in our region, having
                        successfully completed thousands of projects through our expert team and established processes.
                    </li>
                </div>

            </div>

            <div class="img-spazio_text-main-right-bottom">
            </div>

        </div>

    </div>
</div>

<!-- section_3 -->

<div class="our_project">
    <div class="text">
        <div class="our">OUR</div>
        <div class="project">PROJECT</div>
    </div>
</div>

<div class="project-div-main-bottom-images">
    <div class="img-1">
        <a href=""> <img src="{{ asset('site/images/our-projects_img-1.avif') }}" alt=""></a>
    </div>
    <div class="img-2">
        <a href=""> <img src="{{ asset('site/images/our-projects_img-2.avif') }}" alt=""></a>
    </div>
    <div class="img-3">
        <a href=""> <img src="{{ asset('site/images/our-projects_img-3.avif') }}" alt=""></a>
    </div>
    <div class="img-4">
        <a href=""> <img src="{{ asset('site/images/our-projects_img-4.avif') }}" alt=""></a>
    </div>
</div>
<!-- years of success-area start -->

<div class="success-years-div-area">

    <div class="success-years-div-main">
        <div class="success-years-div-main-left">
            <div class="success-years-div-main-left-text_area">
                <div class="success-years-div-main-left-top_text">
                    <p>YEARS OF SUCCESSFUL WORK</p>
                </div>

                <div class="success-years-div-main-left-center_text">
                    <p class="counter">16</p>
                </div>
                <div class="success-years-div-main-left-bottom_text">
                    <p>IN THE MARKET</p>
                </div>
            </div>
        </div>
        <div class="success-years-div-main-right">
            <div class="success-years-div-main-right_img-center">
                <img src="{{ asset('site/images/Office_View1_2022-11-20-copy.webp') }}" alt="">
            </div>
        </div>
    </div>
</div>

<!-- our clients-area start -->

<div class="our-client-div-area">
    <div class="our-client-text-div">
        <div class="our-client-text">
            <p class="our-text">our</p>
            <p class="clients-text">clients</p>
        </div>
    </div>

    <div class="our-client-images-div">
        <div class="our-client-images-div-main">
            <div class="our-clients-img_1">
                <img src="{{ asset('site/images/logos-20.png') }}" alt="">
            </div>
            <div class="our-clients-img_1">
                <img src="{{ asset('site/images/logos-21.png') }}" alt="">
            </div>
            <div class="our-clients-img_1">
                <img src="{{ asset('site/images/logos-23.png') }}" alt="">
            </div>
            <div class="our-clients-img_1">
                <img src="{{ asset('site/images/logos-24.png') }}" alt="">
            </div>
            <div class="our-clients-img_1">
                <img src="{{ asset('site/images/logos-25.png') }}" alt="">
            </div>
        </div>
    </div>
    <div class="empty-div-after-images"></div>
</div>

{{-- footer start --}}
@include('site.partials.footer')
{{-- footer end --}}


{{-- scripts --}}
<script src="{{ asset('site/js/main.js') }}"></script>
@stack('scripts')
<script>
    let counterElement = document.querySelector('.counter');
    let counterValue = 0;

    setInterval(function () {
        if (counterValue !== 15) {
            counterValue++;
            counterElement.textContent = counterValue;
        }
    }, 200);
</script>
</body>
</html>
