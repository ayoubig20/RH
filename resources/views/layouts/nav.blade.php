<!--sidebar wrapper -->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ URL::asset('assets/images/logo-purple.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Employes Mangement</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-menu'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            <ul>
                <li> <a href="{{ url('index') }}"><i class="bx bx-right-arrow-alt"></i>Default</a>
                </li>
                <li> <a href="{{ url('dashboard-alternate') }}"><i class="bx bx-right-arrow-alt"></i>Alternate</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Application</div>
            </a>
            <ul>
                <li> <a href="{{ url('app-emailbox') }}"><i class="bx bx-right-arrow-alt"></i>Email</a>
                </li>
                <li> <a href="{{ url('app-chat-box') }}"><i class="bx bx-right-arrow-alt"></i>Chat Box</a>
                </li>
                <li> <a href="{{ url('app-file-manager') }}"><i class="bx bx-right-arrow-alt"></i>File Manager</a>
                </li>
                <li> <a href="{{ url('app-contact-list') }}"><i class="bx bx-right-arrow-alt"></i>Contatcs</a>
                </li>
                <li> <a href="{{ url('app-to-do') }}"><i class="bx bx-right-arrow-alt"></i>Todo List</a>
                </li>
                <li> <a href="{{ url('app-invoice') }}"><i class="bx bx-right-arrow-alt"></i>Invoice</a>
                </li>
                <li> <a href="{{ url('app-fullcalender') }}"><i class="bx bx-right-arrow-alt"></i>Calendar</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">UI Elements</li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bxs-group'></i>
                </div>
                <div class="menu-title">Employes</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.employees.index') }}"><i class="bx bx-right-arrow-alt"><i class='bx bxs-group' ></i></i>Employes</a>
                </li>
                {{-- <li> <a href="{{ route('admin.employees.index') }}"><i class="bx bx-right-arrow-alt"></i>Employe
                        Details</a>
                </li> --}}
                <li> <a href="{{ route('admin.employees.create') }}"><i class="bx bx-right-arrow-alt"></i><i class='bx bx-user-plus' ></i>Add New
                        Employes</a>
                </li> 
                <li> <a href="{{ route('admin.employees.create') }}"><i class="bx bx-right-arrow-alt"></i><i class='bx bxs-archive' ></i></i>Archivist</a>
                </li>
        </li>

    </ul>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"> <i class="bx bx-task"></i>
            </div>
            <div class="menu-title">Tasks</div>
        </a>
        <ul>
            <li> <a href="{{ url('icons-line-icons') }}"><i class="bx bx-right-arrow-alt"></i> pr</a>
            </li>
            <li> <a href="{{ url('icons-boxicons') }}"><i class="bx bx-right-arrow-alt"></i>Boxicons</a>
            </li>
            <li> <a href="{{ url('icons-feather-icons') }}"><i class="bx bx-right-arrow-alt"></i>Feather Icons</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"> <i class="bx bx-atom"></i>
            </div>
            <div class="menu-title">Projects</div>
        </a>
        <ul>
            <li> <a href="{{ url('icons-line-icons') }}"><i class="bx bx-right-arrow-alt"></i>Line Icons</a>
            </li>
            <li> <a href="{{ url('icons-boxicons') }}"><i class="bx bx-right-arrow-alt"></i>Boxicons</a>
            </li>
            <li> <a href="{{ url('icons-feather-icons') }}"><i class="bx bx-right-arrow-alt"></i>Feather Icons</a>
            </li>
        </ul>
    </li>   
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"> <i class='bx bxs-cog'></i>
            </div>
            <div class="menu-title">Setting</div>
        </a>
        <ul>
            <li> <a href="{{ route('admin.department.index') }}"><i class="bx bx-right-arrow-alt"></i><i class='bx bx-buildings' ></i>Departement</a>
            </li>
            <li> <a href="{{ url('icons-boxicons') }}"><i class="bx bx-right-arrow-alt"></i><i class='bx bxs-briefcase'></i></i>Project Category</a>
            </li>
            <li> <a href="{{ url('icons-feather-icons') }}"><i class="bx bx-right-arrow-alt"></i>Feather Icons</a>
            </li>
        </ul>
    </li>
    <li>

        <a href="https://codervent.com/rocker/documentation/" target="_blank">
            <div class="parent-icon"><i class="bx bx-folder"></i>
            </div>
            <div class="menu-title">Documentation</div>
        </a>
    </li>
    <li>
        <a href="https://themeforest.net/user/codervent" target="_blank">
            <div class="parent-icon"><i class="bx bx-support"></i>
            </div>
            <div class="menu-title">Support</div>
        </a>
    </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
