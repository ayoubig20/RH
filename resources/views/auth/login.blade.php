<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ URL::asset('assets/images/logo-purple.png') }}" type="image/png" />
    <link href="assets/css/icons.css" rel="stylesheet">
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mukta:wght@400;500&family=Roboto&family=Source+Code+Pro:wght@300&display=swap"
        rel="stylesheet">


    <title>Employee Mangement systeme</title>
    <style>
        .bg-image-vertical {
            position: relative;
            overflow: hidden;
            background-repeat: no-repeat;
            background-position: right center;
            background-size: auto 100%;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        @media (min-width: 1025px) {
            .h-custom-2 {
                height: 100%;
            }

            body {
                overflow: hidden;
            }

            body,
            html {
                height: 100%;
            }

            .h-100 {
                height: 100%;
            }

            .background-radial-gradient {
                background: linear-gradient(to bottom, #512B81, #f8c538);
                background-image: radial-gradient(circle at top left, #3d0461, #592697c6 50%, #9561a8b7);
                z-index: 1000;
            }

            /* #radius-shape-1 {
                height: 220px;
                width: 220px;
                top: -60px;
                left: -130px;
                background: radial-gradient(#690f93, #a84fdb);
                overflow: hidden;
            } */

            /* #radius-shape-2 {
                border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
                bottom: -60px;
                right: -110px;
                width: 300px;
                height: 300px;
                background: radial-gradient(#8c21ca, #ad1fff);
                overflow: hidden;
            } */

            .bg-glass {
                background-color: hsla(0, 0%, 100%, 0.9) !important;
                backdrop-filter: saturate(200%) blur(25px);
            }

            @media screen and (min-width: 984px) {
                body {
                    background: linear-gradient(to bottom, #512B81, #f8c538);
                    background-image: radial-gradient(circle at top left, #3d0461, #592697c6 50%, #9561a8b7);
                    z-index: 1000;
                }
            }

            #email {

                background-image: url("assets/images/enveloppe.png");
                background-size: 20px;
                padding-right: 30px;
                background-repeat: no-repeat;
                background-size: 20px 20px;
                background-position: right center;
            }

        }
    </style>
</head>

<body>
    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden h-100 bg-primary d-flex align-items-center">

        <div class="container text-center text-lg-start p-0">

            <div class="row align-items-center p-0">
                <div class="col-lg-4 col-sm-4 col-md-4">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        HR<br />
                        <span style="color: hsl(199.8, 59.5%, 71%)">PLATFORM</span>
                    </h1>
                    <h2 class="mb-4 opacity-70" style="color: hsl(240, 33%, 88%)">
                        makes your work easier
                    </h2>
                </div>

                <div class="col-lg-4 col-sm-4 col-md-4 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass ">
                        <div class="card-body px-4 py-5 px-md-5">
                            <div class="mb-4 text-center">
                                <img src="{{ URL::asset('assets/images/logo-purple.png') }}" width="100%"
                                    alt="" />
                                <img src="{{ URL::asset('assets/images/cod1.png') }}" alt="">
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="form-group mb-3">

                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus
                                            placeholder="Enter Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="input-group" id="show_hide_password">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password" id="password" value=""
                                            placeholder="Enter Password">
                                        <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                class='bx bx-hide'></i></a>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="type" class="col-md-4 col-form-label text-md-right"
                                        hidden>{{ __('Login as') }}</label>

                                    <div class="form-group mb-3">
                                        <select id="type" value="user"
                                            class="form-control @error('type') is-invalid @enderror" name="type"
                                            hidden>
                                            <option value="user">Admin</option>
                                            <option value="employee" selected>Employee</option>
                                        </select>

                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <button type="submit" class="btn text-white"
                                        style="background-color: hsl(245, 51%, 56%)">
                                        {{ __('Login') }}
                                    </button>

                                    {{-- @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 position-relative">
                    <img src="{{ URL::asset('assets/images/image.png') }}" style="margin-left:0;" alt="icon"
                        width="100%">
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->

    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
</body>

</html>
