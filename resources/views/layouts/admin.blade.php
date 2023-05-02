<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <!--favicon-->
    <link rel="icon" href="{{ URL::asset('assets/images/logo-purple.png') }}" type="image/png" />
    <!--plugins-->
    <script src="{{ asset('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>

    @yield('style')
    <link href="{{ URL::asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ URL::asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ URL::asset('assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/icons.css') }}" rel="stylesheet">

    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/header-colors.css') }}" />
    <title> @yield('title')</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--start header -->
        @include('layouts.header')

        <!--end header -->
        <!--navigation-->
        @include('layouts.nav')
        <!--end navigation-->
        <!--start page wrapper -->

        @yield('wrapper')
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon">

        </div>
        <!--end overlay-->
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright Kamal Nadir © 2023. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->
    <!--start switcher-->
    <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
            </div>
            <hr />
            <h6 class="mb-0">Theme Styles</h6>
            <hr />
            <div class="d-flex align-items-center justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="radio"addEventListener() name="flexRadioDefault"
                        id="lightmode" checked>
                    <label class="form-check-label" for="lightmode">Light</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" addEventListener ()name="flexRadioDefault"
                        id="darkmode">
                    <label class="form-check-label" for="darkmode">Dark</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                    <label class="form-check-label" for="semidark">Semi Dark</label>
                </div>
            </div>
            <hr />
            <div class="form-check">
                <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
                <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
            </div>
            <hr />
            <h6 class="mb-0">Header Colors</h6>
            <hr />
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator headercolor1" id="headercolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor2" id="headercolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor3" id="headercolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor4" id="headercolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor5" id="headercolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor6" id="headercolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor7" id="headercolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor8" id="headercolor8"></div>
                    </div>
                </div>
            </div>
            <hr />
            <h6 class="mb-0">Sidebar Colors</h6>
            <hr />
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
                    </div>

                </div>

                <!--end switcher-->
                <!-- Bootstrap JS -->
                <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>
                <!--plugins-->
                <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
                <script src="{{ URL::asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
                <script src="{{ URL::asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
                <script src="{{ URL::asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
                <script src="{{ URL::asset('assets/js/app.js') }}"></script>
                {{-- <script>
                    const lightRadio = document.querySelector('#lightmode');
                    const darkRadio = document.querySelector('#darkmode');
                    const semiDarkRadio = document.querySelector('#semidark');

                    // Apply the saved theme on page load (if there is one)
                    const savedTheme = getCookie('theme');
                    if (savedTheme) {
                        const {
                            theme
                        } = JSON.parse(savedTheme);
                        if (theme === 'light') {
                            lightRadio.checked = true;
                            setTheme('light');
                        } else if (theme === 'dark') {
                            darkRadio.checked = true;
                            setTheme('dark');
                        } else if (theme === 'semidark') {
                            semiDarkRadio.checked = true;
                            setTheme('semidark');
                        }
                    }

                    lightRadio.addEventListener('change', () => {
                        setTheme('light');
                    });

                    darkRadio.addEventListener('change', () => {
                        setTheme('dark');
                    });

                    semiDarkRadio.addEventListener('change', () => {
                        setTheme('semidark');
                    });

                    const headerColorIndicators = document.querySelectorAll('.header-colors-indigators .indigator');
                    headerColorIndicators.forEach(indigator => {
                        indigator.addEventListener('click', () => {
                            const color = indigator.classList[1];
                            setHeaderColor(color);
                        });
                    });

                    const sidebarColorIndicators = document.querySelectorAll('.sidebar-colors-indigators .indigator');
                    sidebarColorIndicators.forEach(indigator => {
                        indigator.addEventListener('click', () => {
                            const color = indigator.classList[1];
                            setSidebarColor(color);
                        });
                    });

                    function setTheme(theme) {
                        document.body.classList.remove('light', 'dark', 'semidark');
                        document.body.classList.add(theme);
                        setCookie('theme', {
                            theme
                        });
                        updateSidebarColors();
                    }

                    function setHeaderColor(color) {
                        const header = document.querySelector('.header');

                        // Remove any existing header color classes
                        const headerClasses = Array.from(header.classList).filter(cls => cls.startsWith('header-'));
                        header.classList.remove(...headerClasses);

                        // Add the new header color class
                        header.classList.add(`header-${color}`);
                        setCookie('headerColor', {
                            color
                        });
                    }

                    function setSidebarColor(color) {
                        const sidebar = document.getElementById('sidebar');

                        // Remove any existing sidebar color classes
                        const sidebarClasses = Array.from(sidebar.classList).filter(cls => cls.startsWith('sidebar-'));
                        sidebar.classList.remove(...sidebarClasses);

                        // Add the new sidebar color class
                        sidebar.classList.add(`sidebar-${color}`);
                        setCookie('sidebarColor', {
                            color
                        });
                    }

                    function updateSidebarColors() {
                        const sidebar = document.getElementById('sidebar');

                        // Example: change the color of all links in the sidebar
                        const links = sidebar.querySelectorAll('a');
                        links.forEach(link => {
                            if (document.body.classList.contains('light')) {
                                link.style.color = 'blue';
                            } else if (document.body.classList.contains('dark')) {
                                link.style.color = 'red';
                            } else if (document.body.classList.contains('semidark')) {
                                link.style.color = 'green';
                            }
                        });

                        // Add more code here to update other elements in the sidebar as needed
                    }

                    function setCookie(name, value) {
                        document.cookie = `${name}=${JSON.stringify(value)}; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/`;
                    }

                    function getCookie(name) {
                        const cookies = document.cookie.split('; ');
                        for (let i = 0; i < cookies.length; i++) {
                            const cookie = cookies[i].split('=');
                            if (cookie[0] === name) {
                                return cookie[1];
                            }
                        }
                    }
                </script> --}}


                <!--app JS-->
                @yield('script')
</body>

</html>
