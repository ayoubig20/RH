<html lang="en" class="color-sidebar sidebarcolor5 color-header headercolor2">

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
        {{-- <div id="global-loader">
            <img src="{{ URL::asset('assets/img/loader.svg') }}" class="loader-img" alt="Loader">
        </div> --}}
        @include('layouts.preloader')
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
                    window.addEventListener('load', function() {
                        const preloader = document.querySelector('.preloader');
                        preloader.classList.add('hide-preloader');
                    })
                </script> --}}
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
                </script>  

                <script>
                    // Fonction pour définir un cookie
                    function setCookie(name, value, days) {
                        let date = new Date();
                        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                        let expires = "expires=" + date.toUTCString();
                        document.cookie = name + "=" + value + ";" + expires + ";path=/";
                    }

                    // Fonction pour obtenir un cookie
                    function getCookie(name) {
                        let cookie = document.cookie.match('(^|;)\\s*' + name + '\\s*=\\s*([^;]+)');
                        return cookie ? cookie.pop() : '';
                    }

                    // Fonction pour appliquer les préférences enregistrées dans les cookies
                    function applyPreferences() {
                        let themeStyle = getCookie('themeStyle');
                        let headerColor = getCookie('headerColor');
                        let sidebarColor = getCookie('sidebarColor');

                        if (themeStyle) {
                            // Appliquer le style du thème
                        }

                        if (headerColor) {
                            // Appliquer la couleur de l'en-tête
                        }

                        if (sidebarColor) {
                            // Appliquer la couleur de la barre latérale
                        }
                    }

                    // Fonction pour enregistrer les préférences et les appliquer
                    function saveAndApplyPreferences() {
                        let themeStyle = document.querySelector('input[name="flexRadioDefault"]:checked').id;
                        let headerColor = document.querySelector('.header-colors-indigators .indigator.active').id;
                        let sidebarColor = document.querySelector('.header-colors-indigators .indigator.active').id;

                        setCookie('themeStyle', themeStyle, 30);
                        setCookie('headerColor', headerColor, 30);
                        setCookie('sidebarColor', sidebarColor, 30);

                        applyPreferences();
                    }

                    // Ajout d'événements pour enregistrer et appliquer les préférences
                    document.querySelectorAll('input[name="flexRadioDefault"]').forEach(function(input) {
                        input.addEventListener('change', saveAndApplyPreferences);
                    });

                    document.querySelectorAll('.header-colors-indigators .indigator').forEach(function(indigator) {
                        indigator.addEventListener('click', function() {
                            document.querySelectorAll('.header-colors-indigators .indigator').forEach(function(
                                indigator) {
                                indigator.classList.remove('active');
                            });
                            indigator.classList.add('active');
                            saveAndApplyPreferences();
                        });
                    });

                    // Appliquer les préférences lors du chargement de la page
                    document.addEventListener('DOMContentLoaded', applyPreferences);
                </script> --}}
                <!--app JS-->
                {{-- <script>
                    // Set a cookie with the given name and value
                    function setCookie(name, value) {
                        document.cookie = `${name}=${value}; path=/`;
                    }

                    // Get the value of a cookie with the given name
                    function getCookie(name) {
                        const cookieString = document.cookie;
                        const cookies = cookieString.split('; ');
                        for (let i = 0; i < cookies.length; i++) {
                            const cookie = cookies[i].split('=');
                            if (cookie[0] === name) {
                                return cookie[1];
                            }
                        }
                        return null;
                    }

                    // Get all sidebar color indicators
                    const sidebarColorIndicators = document.querySelectorAll('.sidebar-colors-indigators .indigator');

                    // Loop through each indicator and add a click event listener
                    sidebarColorIndicators.forEach((indicator) => {
                        indicator.addEventListener('click', (event) => {
                            // Get the ID of the clicked indicator
                            const selectedColor = event.target.id;

                            // Store the selected color in a cookie
                            setCookie('selectedSidebarColor', selectedColor);

                            // Apply the selected color to the sidebar
                            applySidebarColor(selectedColor);
                        });
                    });

                    // Function to apply the selected sidebar color
                    function applySidebarColor(color) {
                        // Remove any existing sidebar color classes
                        document.body.classList.remove('sidebarcolor1', 'sidebarcolor2', 'sidebarcolor3', 'sidebarcolor4',
                            'sidebarcolor5', 'sidebarcolor6', 'sidebarcolor7', 'sidebarcolor8');

                        // Add the selected sidebar color class
                        document.body.classList.add(color);
                    }

                    // Check if a previously selected sidebar color exists in a cookie
                    const storedSidebarColor = getCookie('selectedSidebarColor');
                    if (storedSidebarColor) {
                        // Apply the stored sidebar color
                        applySidebarColor(storedSidebarColor);
                    }
                </script> --}}

                @yield('script')

</body>

</html>
