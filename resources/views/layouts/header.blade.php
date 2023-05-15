<!--start header -->
<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>

            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">

                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"> <i class='bx bx-category'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="row row-cols-3 g-3 p-3">
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-cosmic text-white"><i
                                            class='bx bx-group'></i>
                                    </div>
                                    <div class="app-title">Teams</div>

                                </div>
                                <div class="col text-center">

                                    @if (auth()->guard('web')->check())
                                        <a style="color:black"href="{{ route('admin.projects.index') }}">
                                            <div class="app-box mx-auto bg-gradient-burning text-white"><i
                                                    class='bx bx-atom'></i>
                                            </div>
                                            <div class="app-title">Projects</div>
                                        </a>
                                    @elseif (auth()->guard('employee')->check())
                                        <a style="color:black" href="#">
                                            <div class="app-box mx-auto bg-gradient-burning text-white"><i
                                                    class='bx bx-atom'></i>
                                            </div>
                                            <div class="app-title">Projects</div>
                                        </a>
                                    @endif
                                </div>
                                <div class="col text-center">
                                    @if (auth()->guard('web')->check())
                                        <a style="color:black"href="{{ route('admin.tasks.index') }}">
                                            <div class="app-box mx-auto bg-gradient-lush text-white"><i
                                                    class='bx bx-shield'></i>
                                            </div>
                                            <div class="app-title">Tasks</div>
                                        </a>
                                    @elseif (auth()->guard('employee')->check())
                                        <a style="color:black" href="{{ route('employee.tasks.index') }}">
                                            <div class="app-box mx-auto bg-gradient-lush text-white"><i
                                                    class='bx bx-shield'></i></div>
                                            <div class="app-title">Tasks</div>
                                        </a>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="alert-count" >
                                @if (auth()->user()->unreadNotifications->count() > 0)
                                    {{ auth()->user()->unreadNotifications->count() }}
                                @else
                                    &nbsp; 
                                @endif
                            </span>
                            <i class='bx bx-bell'></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>
                                    <p class="msg-header-clear ms-auto">
                                        @if (auth()->guard('web')->check())
                                            <form action="{{ url('/notifications/mark-as-read/admin') }}"
                                                method="POST">
                                                @csrf
                                                <button style="border:none" type="submit">Mark all notifications as
                                                    read</button>
                                            </form>
                                        @elseif (auth()->guard('employee')->check())
                                            <form action="{{ url('/notifications/mark-as-read') }}" method="POST">
                                                @csrf
                                                <button style="border:none" type="submit">Mark all notifications as
                                                    read</button>
                                            </form>
                                        @endif

                                    </p>
                                </div>
                                <div class="header-notifications-list">
                                    <a class="" href="#">
                                        <div id="unreadNotifications">
                                            @foreach (auth()->user()->unreadNotifications as $notification)
                                                <div class="main-notification-list Notification-scroll">
                                                    {{-- <a class="d-flex p-3 border-bottom"
                                                        href="{{ url('/employee/tasks') }}/{{ $notification->data['id'] }}">  --}}
                                                    <a class="d-flex p-3 border-bottom"
                                                        href="{{ $notification->data['url'] }}">
                                                        <div class="notifyimg bg-pink">
                                                            <i class="la la-file-alt text-white"></i>
                                                        </div>
                                                        <div class="mr-3">
                                                            <p class="notification-label mb-1">
                                                                {{ $notification->data['title'] }}
                                                            </p>
                                                            <div class="notification-subtext">
                                                                {{-- created by --}}
                                                                {{ $notification->data['user'] }} at
                                                                {{ $notification->created_at }}

                                                            </div>
                                                        </div>

                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </a>
                                </div>
                            </a>
                            <a href="#">
                                <div class="text-center msg-footer">View All Notifications</div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="header-message-list">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">

                    {{-- <img src="{{ Avatar::create(auth()->guard('web')->user())->toBase64() }}" class="user-img"
                            alt="user avatar"> --}}
                    @if (auth()->guard('web')->check())
                        <?php $user = auth()
                            ->guard('web')
                            ->user(); ?>
                        <img src="{{ Avatar::create($user->name)->toBase64() }}" class="user-img" alt="user avatar">
                    @elseif (auth()->guard('employee')->check())
                        <img src="{{ asset('storage/assets/users/' .auth()->guard('employee')->user()->getImage()) }}"
                            class="user-img" alt="user avatar">
                    @endif

                    <div class="user-info ps-3">
                        @if (auth()->guard('web')->check())
                            <p class="user-name mb-0">{{ auth()->guard('web')->user()->name }}</p>
                            {{-- <p class="designation mb-0">{{ auth()->guard('web')->user()->email }}</p> --}}
                        @elseif (auth()->guard('employee')->check())
                            <p class="user-name mb-0">{{ auth()->guard('employee')->user()->firstName }}
                                {{ auth()->guard('employee')->user()->lastName }}</p>
                            {{-- <p class="designation mb-0">{{ auth()->guard('employee')->user()->email }}</p> --}}
                        @endif
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        @auth('web')
                        <li><a class="dropdown-item" href="#"><i class='bx bx-user'></i><span>Profile</span></a>
                        </li>
                    @else
                        <li><a class="dropdown-item"
                                href="{{ route('employee.employee.edit',auth()->guard('employee')->user()) }}"><i
                                    class='bx bx-user'></i><span>Profile</span></a>
                        </li>
                    @endauth
                    </li>

                    @auth('web')
                        <li><a class="dropdown-item" href="{{ route('admin.home.index') }}"><i
                                    class='bx bx-home-circle'></i><span>Dashboard</span></a>
                        </li>
                    @else
                        <li><a class="dropdown-item" href="{{ route('employee.home.index') }}"><i
                                    class='bx bx-home-circle'></i><span>Dashboard</span></a>
                        </li>
                    @endauth
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class='bx bx-log-out-circle'></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</header>
{{-- <script>
    setInterval(function() {
        $("#notifications_count").load(window.location.href + " #notifications_count");
        $("#unreadNotifications").load(window.location.href + " #unreadNotifications");
    }, 1000);
</script> --}}
<!--end header -->
