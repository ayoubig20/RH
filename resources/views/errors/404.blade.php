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

            <a href="{{ route('home.index') }}" class="logo me-auto me-lg-0"><img
                    src="{{ asset('assets/images/logo-purple.png') }}" alt="" class="img-fluid"></a>

            <h1 class="logo me-auto"><a href="{{ route('home.index') }}"><span>Employee</span>Mangement Systeme</a></h1>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a href="{{ route('home.index') }}" class="active">Home</a></li>
                    {{-- <li><a href="{{ route('home.about') }}">About Us</a></li> --}}
                    <li><a href="#team">Team</a></li>
                    {{-- <li><a href="services.html">Services</a></li> --}}
                    @guest
                        <a class="nav-link " href="{{ route('login') }}">Login</a>
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

    <div class="error-404 d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="card py-5">
                <div class="row g-0">
                    <div class="col col-xl-5">
                        <div class="card-body p-4">
                            <h1 class="display-1"><span class="text-primary">4</span><span
                                    class="text-danger">0</span><span class="text-success">4</span></h1>
                            <h2 class="font-weight-bold display-4">Lost in Space</h2>
                            <p>You have reached the edge of the universe.
                                <br>The page you requested could not be found.
                                <br>Dont'worry and return to the previous page.
                            </p>
                            <div class="mt-5"> <a href="{{ route('home.index') }}"
                                    class="btn btn-primary btn-lg px-md-5 radius-30">Go Home</a>
                                <a href="javascript:;"
                                    class="btn btn-outline-dark btn-lg ms-3 px-md-5 radius-30">Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <img src="https://cdn.searchenginejournal.com/wp-content/uploads/2019/03/shutterstock_1338315902.png"
                            class="img-fluid" alt="">
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>

    </div>
    <!-- end wrapper -->
    @include('layouts.footer')

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>
