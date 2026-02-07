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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- jQuery ต้องโหลดก่อนสุด -->
    <script src="{{ asset('HTWF/scripts/jquery.min.js') }}"></script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('HTWF/scripts/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/style.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/css/content-box.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/css/image-box.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/css/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/scripts/flexslider/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/scripts/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/scripts/php/contact-form.css') }}">
    <link rel="stylesheet" href="{{ asset('HTWF/scripts/font-awesome/css/font-awesome.css') }}">
    <link rel="icon" href="{{ asset('storage/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('skin.css') }}">
    <link rel="stylesheet" href="{{ asset('custom.css') }}">
    @livewireStyles
</head>

<body>
    <div id="preloader"></div>

    @yield('child-content')

    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>

    <!-- ✅ Scripts โหลดตามลำดับ (ลบ async ออกหมด) -->
    <script src="{{ asset('HTWF/scripts/script.js') }}"></script>
    <script src="{{ asset('HTWF/scripts/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('HTWF/scripts/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('HTWF/scripts/parallax.min.js') }}"></script>
    <script src="{{ asset('HTWF/scripts/flexslider/jquery.flexslider-min.js') }}"></script>

    <!-- ✅ Isotope ต้องโหลดก่อน gallery-load-more.js -->
    <script src="{{ asset('HTWF/scripts/isotope.min.js') }}"></script>

    <script src="{{ asset('HTWF/scripts/php/contact-form.js') }}"></script>
    <script src="{{ asset('HTWF/scripts/jquery.progress-counter.js') }}"></script>
    <script src="{{ asset('HTWF/scripts/jquery.tab-accordion.js') }}"></script>
    <script src="{{ asset('HTWF/scripts/bootstrap/js/bootstrap.popover.min.js') }}"></script>
    <script src="{{ asset('HTWF/scripts/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('HTWF/scripts/social.stream.min.js') }}"></script>
    <script src="{{ asset('HTWF/scripts/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('HTWF/scripts/smooth.scroll.min.js') }}"></script>
    <script src="{{ asset('script.js') }}"></script>
    @livewireScripts
    @stack('scripts')
</body>

</html>
