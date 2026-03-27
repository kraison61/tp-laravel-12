<!DOCTYPE html>
<!--[if lt IE 10]> <html  lang="en" class="iex"> <![endif]-->
<!--[if (gt IE 10)|!(IE)]><!-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('child-title', 'Default Title')</title>
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="description" content="{{ trim($__env->yieldContent('child-description', 'Service-Theeraphong')) }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:locale" content="th_TH">
    @php
        $locales = ['th', 'en'];
        $currentPath = request()->path();
    @endphp
    <meta property="og:type" content="@yield('og-type', 'article')">
    <meta property="og:title" content="@yield('child-title', 'บริษัทธีรพงษ์เซอร์วิส จำกัด')">
    <meta property="og:description" content="@yield('child-description', 'บริการรับเหมาก่อสร้างมาตรฐานวิศวกรรม')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Theeraphong Construction">
    <meta property="og:image" content="@yield('child-image', Storage::url('images/img_landing_1.png'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('child-title', 'บริษัทธีรพงษ์เซอร์วิส จำกัด')">
    <meta name="twitter:description" content="@yield('child-description', 'บริการรับเหมาก่อสร้างมาตรฐานวิศวกรรม')">
    <meta name="twitter:image" content="@yield('child-image', Storage::url('images/img_landing_1.png'))">
    <meta name="twitter:label1" content="ให้บริการโดย">
    <meta name="twitter:data1" content="ช่างรัก (ประสบการณ์ 15 ปี)">

    @stack('seo-schema')

    <script src="{{ asset('HTWF/scripts/jquery.min.js') }}"></script>

    <link rel="canonical" href="{{ url()->current() }}" />

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
    @php
        $path = 'images/favicon.png';
    @endphp
    <link rel="icon" type="image/png" href="{{ \Illuminate\Support\Facades\Storage::url($path) }}?width=32&format=webp">
    <link rel="apple-touch-icon" href="{{ \Illuminate\Support\Facades\Storage::url($path) }}?width=180&format=png">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('skin.css') }}">
    <link rel="stylesheet" href="{{ asset('custom.css') }}">
    @livewireStyles
</head>

<body>
    <div id="preloader"></div>

    @yield('child-content')

    <i class="scroll-top scroll-top-mobile show fa fa-sort-asc"></i>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

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