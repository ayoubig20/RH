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
                                    <div class="app-box mx-auto bg-gradient-burning text-white"><i
                                            class='bx bx-atom'></i>
                                    </div>
                                    <div class="app-title">Projects</div>
                                </div>
                                <div class="col text-center">
                                    <div class="app-box mx-auto bg-gradient-lush text-white"><i
                                            class='bx bx-shield'></i>
                                    </div>
                                    <div class="app-title">Tasks</div>
                                </div>

                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">
                                {{ auth()->user()->unreadNotifications->count() }}
                            </span>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="#">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>
                                    <p class="msg-header-clear ms-auto">
                                    <form action="{{ url('/notifications/mark-as-read') }}" method="POST">
                                        @csrf
                                        <button style="border:none" type="submit">Mark all notifications as read</button>
                                    </form></p>
                                </div>
                                <div class="header-notifications-list">
                                    <a class="" href="#">
                                        <div id="unreadNotifications">
                                            @foreach (auth()->user()->unreadNotifications as $notification)
                                                <div class="main-notification-list Notification-scroll">
                                                    {{-- <a class="d-flex p-3 border-bottom"
                                                        href="{{ url('/employee/tasks') }}/{{ $notification->data['id'] }}">  --}}
                                                         <a class="d-flex p-3 border-bottom"
                                                        href="{{ url('/employee/tasks') }}">
                                                        <div class="notifyimg bg-pink">
                                                            <i class="la la-file-alt text-white"></i>
                                                        </div>
                                                        <div class="mr-3">
                                                            <h5 class="notification-label mb-1">
                                                                {{ $notification->data['title'] }}
                                                            </h5>
                                                            <div class="notification-subtext">
                                                                created by
                                                                {{ $notification->data['user'] }} at {{ $notification->created_at }}

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
                    @if (auth()->guard('web')->check())
                        <img src="{{ Avatar::create(auth()->guard('')->user())->toBase64() }}" class="user-img"
                            alt="user avatar">


                        {{-- <img src="{{Avatar::create(auth()->guard('')->user())->toBase64()}}" class="user-img"alt="user avatar">  --}}
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
                    <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
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
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</header>
<!--end header -->
