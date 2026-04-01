<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Awaiken">
	<!-- Page Title -->
    <title>Hairloom Root Nourishing Oil</title>
	<!-- Favicon Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{ url ('assets/images/favicon.png')}}">
	<!-- Google Fonts Css-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="../../css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
	<!-- Bootstrap Css -->
	<link href="{{ url ('assets/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
	<!-- SlickNav Css -->
	<link href="{{ url ('assets/css/slicknav.min.css')}}" rel="stylesheet">
	<!-- Swiper Css -->
	<link rel="stylesheet" href="{{ url ('assets/css/swiper-bundle.min.css')}}">
	<!-- Font Awesome Icon Css-->
	<link href="{{ url ('assets/css/all.min.css')}}" rel="stylesheet" media="screen">
	<!-- Animated Css -->
	<link href="{{ url ('assets/css/animate.css')}}" rel="stylesheet">
    <!-- Magnific Popup Core Css File -->
	<link rel="stylesheet" href="{{ url ('assets/css/magnific-popup.css')}}">
	<!-- Mouse Cursor Css File -->
	<link rel="stylesheet" href="{{ url ('assets/css/mousecursor.css')}}">
	<!-- Main Custom Css -->
	<link href="{{ url ('assets/css/custom.css')}}" rel="stylesheet" media="screen">
</head>
<body>

{{-- @include('components.preloader') --}}
@include('components.navbar')
@yield('content')
@include('components.footer')


 <!-- Jquery Library File -->
    <script src="{{ url ('assets/js/jquery-3.7.1.min.js')}}"></script>
    <!-- Bootstrap js file -->
    <script src="{{ url ('assets/js/bootstrap.min.js')}}"></script>
    <!-- Validator js file -->
    <script src="{{ url ('assets/js/validator.min.js')}}"></script>
    <!-- SlickNav js file -->
    <script src="{{ url ('assets/js/jquery.slicknav.js')}}"></script>
    <!-- Swiper js file -->
    <script src="{{ url ('assets/js/swiper-bundle.min.js')}}"></script>
    <!-- Counter js file -->
    <script src="{{ url ('assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{ url ('assets/js/jquery.counterup.min.js')}}"></script>
    <!-- Magnific js file -->
    <script src="{{ url ('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- SmoothScroll -->
    <script src="{{ url ('assets/js/SmoothScroll.js')}}"></script>
    <!-- Parallax js -->
    <script src="{{ url ('assets/js/parallaxie.js')}}"></script>
    <!-- MagicCursor js file -->
    <script src="{{ url ('assets/js/gsap.min.js')}}"></script>
    <script src="{{ url ('assets/js/magiccursor.js')}}"></script>
    <!-- Text Effect js file -->
    <script src="{{ url ('assets/js/SplitText.js')}}"></script>
    <script src="{{ url ('assets/js/ScrollTrigger.min.js')}}"></script>
    <!-- YTPlayer js File -->
    <script src="{{ url ('assets/js/jquery.mb.YTPlayer.min.js')}}"></script>
    <!-- Wow js file -->
    <script src="{{ url ('assets/js/wow.min.js')}}"></script>
    <!-- Main Custom js file -->
    <script src="{{ url ('assets/js/function.js')}}"></script>
</body>
</html>