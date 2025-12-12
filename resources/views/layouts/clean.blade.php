<!DOCTYPE html>
<!--[if lt IE 10]> <html  lang="en" class="iex"> <![endif]-->
<!--[if (gt IE 10)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') Business - Construction And Building Template</title>
    <meta name="description" content="Multipurpose HTML template.">
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


</body>
</html>
