<!DOCTYPE html>
<!--[if lt IE 10]> <html  lang="en" class="iex"> <![endif]-->
<!--[if (gt IE 10)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('child-title','Default Title')</title>
    <meta name="description" content="{{ trim($__env->yieldContent('child-description', 'Service-Theeraphong')) }}">
    <script src="../HTWF/scripts/jquery.min.js"></script>
    <link rel="stylesheet" href="../HTWF/scripts/bootstrap/css/bootstrap.css">
    <script src="../HTWF/scripts/script.js"></script>
    <link rel="stylesheet" href="../HTWF/style.css">
    <link rel="stylesheet" href="../HTWF/css/content-box.css">
    <link rel="stylesheet" href="../HTWF/css/image-box.css">
    <link rel="stylesheet" href="../HTWF/css/animations.css">
    <link rel="stylesheet" href="../HTWF/css/components.css">
    <link rel="stylesheet" href="../HTWF/scripts/flexslider/flexslider.css">
    <link rel="stylesheet" href="../HTWF/scripts/magnific-popup.css">
    <link rel="stylesheet" href="../HTWF/scripts/php/contact-form.css">
    <!-- <link rel="icon" href="../images/favicon.ico"> -->
    <link rel="stylesheet" href="../skin.css">

    {{-- ถ้าไฟล์อยู่ใน public/HTWF/ --}}
    <link rel="stylesheet" href="{{ asset('HTWF/style.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/css/content-box.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/css/image-box.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/css/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/scripts/flexslider/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/scripts/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/scripts/php/contact-form.css') }}">
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('skin.css') }}">



</head>

<body>
    <div id="preloader"></div>

    @yield('child-content');


    <link rel="stylesheet" href="../HTWF/scripts/font-awesome/css/font-awesome.css">
    <script async src="../HTWF/scripts/bootstrap/js/bootstrap.min.js"></script>
    <script src="../HTWF/scripts/imagesloaded.min.js"></script>
    <script src="../HTWF/scripts/parallax.min.js"></script>
    <script src="../HTWF/scripts/flexslider/jquery.flexslider-min.js"></script>
    <script async src="../HTWF/scripts/isotope.min.js"></script>
    <script async src="../HTWF/scripts/php/contact-form.js"></script>
    <script async src="../HTWF/scripts/jquery.progress-counter.js"></script>
    <script async src="../HTWF/scripts/jquery.tab-accordion.js"></script>
    <script async src="../HTWF/scripts/bootstrap/js/bootstrap.popover.min.js"></script>
    <script async src="../HTWF/scripts/jquery.magnific-popup.min.js"></script>
    <script src="../HTWF/scripts/social.stream.min.js"></script>
    <script src="../HTWF/scripts/jquery.slimscroll.min.js"></script>
    <script src="../HTWF/scripts/google.maps.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="../HTWF/scripts/smooth.scroll.min.js"></script>
    @stack('scripts')
</body>

</html>
