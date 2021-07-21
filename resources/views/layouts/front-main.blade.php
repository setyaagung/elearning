<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/linericon/style.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/lightbox/simpleLightbox.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/nice-select/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/animate-css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/vendors/popup/magnific-popup.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/logo.png')}}" type="image/x-icon">
</head>
<body>
    @include('layouts.front-navbar')
    @yield('content')
    @include('layouts.front-footer')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.4/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('frontend/js/popper.js')}}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('frontend/js/stellar.js')}}"></script>
    <script src="{{ asset('frontend/vendors/lightbox/simpleLightbox.min.js')}}"></script>
    <script src="{{ asset('frontend/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('frontend/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('frontend/vendors/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('frontend/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('frontend/vendors/popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{ asset('frontend/vendors/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('frontend/vendors/counter-up/jquery.counterup.js')}}"></script>
    <script src="{{ asset('frontend/js/mail-script.js')}}"></script>
    <script src="{{ asset('frontend/js/theme.js')}}"></script>
    @stack('scripts')
</body>
</body>

</html>
