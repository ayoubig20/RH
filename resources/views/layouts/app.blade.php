<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet" />
    <link rel="icon" href="{{ URL::asset('assets/images/logo-purple.png') }}" type="image/png" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <title>@yield('title', 'Empolye Mangement')</title>
</head>

<body>
 
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <a href="{{ route('home.index') }}" class="logo me-auto me-lg-0"><img src="{{ asset('assets/images/logo-purple.png') }}"
                    alt="" class="img-fluid"></a>

            <h1 class="logo me-auto"><a href="{{ route('home.index') }}"><span>Employee</span>Mangement Systeme</a></h1>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a href="{{ route('home.index') }}" class="active">Home</a></li>
                    {{-- <li><a href="{{ route('home.about') }}">About Us</a></li> --}}
                    <li><a href="#team">Team</a></li>
                    {{-- <li><a href="services.html">Services</a></li> --}}
                    @guest
                    <a class="nav-link " href="{{ route('login',['type'=>'employee']) }}">employee space</a>
                    {{-- <a class="nav-link" href="{{ route('register') }}">Register</a> --}}
                    
                    <a class="nav-link " href="{{ route('login',['type'=>'user']) }}">administrator space</a>
                    {{-- <a class="nav-link" href="{{ route('register') }}">Register</a> --}}
                    @else
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                    <a role="button" class="nav-link active"
                    onclick="document.getElementById('logout').submit();">Logout</a>
                    @csrf
                    </form>

                    @endguest
                    <li><a href="#contact">Contact</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <div class="header-social-links d-flex">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>

        </div>
    </header><!-- End Header -->

    <!-- header -->
    {{-- <div class="container my-4"> --}}
    @yield('content')
    {{-- </div> --}}
    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src='{{ asset('assets/vendor/aos/aos.js') }}'></script>
    <script src='{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}'></script>
    <script src='{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}'></script>
    <script src='{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}'></script>
    <script src='{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}'></script>
    <script src='{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}'></script>
    <script src='{{ asset('assets/vendor/php-email-form/validate.js') }}'></script>
    <script src='{{ asset('assets/js/main.js') }}'></script>
</body>

</html>
