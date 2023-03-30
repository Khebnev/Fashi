<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/front.css') }}">

</head>

<body>
<!-- Page Preloder -->
{{--<div id="preloder">--}}
{{--    <div class="loader"></div>--}}
{{--</div>--}}

<!-- Header Section Begin -->
@include('layouts.parts.header')
<!-- Header End -->



<!-- Product Shop Section Begin -->

            
        <main>
           @yield('content')
        </main>


<!-- Product Shop Section End -->

<!-- Partner Logo Section Begin -->
<div class="partner-logo">
    <div class="container">
        <div class="logo-carousel owl-carousel">
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="/assets/front/img/logo-carousel/logo-1.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="/assets/front/img/logo-carousel/logo-2.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="/assets/front/img/logo-carousel/logo-3.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="/assets/front/img/logo-carousel/logo-4.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="/assets/front/img/logo-carousel/logo-5.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Partner Logo Section End -->

<!-- Footer Section Begin -->
@include('layouts.parts.footer')
<!-- Footer Section End -->

<!-- Js Plugins -->
<script scr="{{ asset('assets/front/js/front.js') }}"></script>
<!-- <script scr="{{ 'resourses/assets/front/js/bootstrap.min.js' }}"></script>
<script scr="{{ 'resourses/assets/front/js/imagesloaded.pkgd.min.js '}}"></script>
<script scr="{{ 'resourses/assets/front/js/jquery-3.3.1.min.js' }}"></script>
<script scr="{{ 'resourses/assets/front/js/jquery-ui.min.js' }}"></script>
<script scr="{{ 'resourses/assets/front/js/jquery.countdown.min.js' }}"></script>
<script scr="{{ 'resourses/assets/front/js/jquery.dd.min.js' }}"></script>
<script scr="{{ 'resourses/assets/front/js/jquery.nice-select.min.js' }}"></script>
<script scr="{{ 'resourses/assets/front/js/jquery.slicknav.js' }}"></script>
<script scr="{{ 'resourses/assets/front/js/jquery.zoom.min.js' }}"></script>
<script scr="{{ 'resourses/assets/front/js/main.js '}}"></script>
<script scr="{{ 'resourses/assets/front/js/owl.carousel.min.js' }}"></script> -->



</body>

</html>
