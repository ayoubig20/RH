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
                <li> <a href="{{ route('admin.home.index') }}"><i class="bx bx-right-arrow-alt"></i><i
                            class='bx bx-bar-chart-alt-2'></i>Statistical</a>
                </li>
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
    </li>
    <li> <a href="{{ url('app-file-manager') }}"><i class="bx bx-right-arrow-alt"></i>File Manager</a>
    </li>
    </li>
    <li> <a href="{{ url('app-to-do') }}"><i class="bx bx-right-arrow-alt"></i>Todo List</a>
    </li>
    {{-- <li> <a href="{{ url('app-invoice') }}"><i class="bx bx-right-arrow-alt"></i>Invoice</a> --}}
    </li>
    <li> <a href="{{ url('app-fullcalender') }}"><i class="bx bx-right-arrow-alt"></i>Calendar</a>
    </li>
    </ul>
    </li>
    {{-- <li class="menu-label">UI Elements</li> --}}

    <li>
        <a href="javascript:;" class="has-arrow">
            <div class="parent-icon"><i class='bx bxs-group'></i>
            </div>
            <div class="menu-title">Employes</div>
        </a>
        <ul>
            <li> <a href="{{ route('admin.employees.index') }}"><i class="bx bx-right-arrow-alt"><i
                            class='bx bxs-group'></i></i>Employes</a>
            </li>
            {{-- <li> <a href="{{ route('admin.employees.index') }}"><i class="bx bx-right-arrow-alt"></i>Employe
                        Details</a>
                </li> --}}
            <li> <a href="{{ route('admin.employees.create') }}"><i class="bx bx-right-arrow-alt"></i><i
                        class='bx bx-user-plus'></i>Add New
                    Employes</a>
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
            <li> <a href="{{ route('admin.tasks.index') }}"><i class="bx bx-right-arrow-alt"></i> <i
                        class="bx bx-task"></i>Tasks</a>
            </li>
            <li> <a href="{{ route('admin.kanban.index') }}"><i class="bx bx-right-arrow-alt"></i><i
                        class='bx bx-list-ol'></i>Kanban Board</a>
            </li>

        </ul>
    </li>
    <li>
        <a class="has-arrow" href="{{ route('admin.projects.index') }}">
            <div class="parent-icon"> <i class="bx bx-atom"></i>
            </div>
            <div class="menu-title">Projects</div>
        </a>

    </li>
    <li>
        <a class="has-arrow" href="{{route('admin.department.index') }}">
            <div class="parent-icon"> <i class="bx bx-buildings"></i>
            </div>
            <div class="menu-title">Departement</div>
        </a>

    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"> <i class='bx bxs-cog'></i>
            </div>
            <div class="menu-title">Setting</div>
        </a>
        <ul>
            <li> <a href="{{ route('admin.category.index') }}"><i class="bx bx-right-arrow-alt"></i><i
                        class='bx bxs-briefcase'></i></i>Project Category</a>
            </li>
            <li> <a href="{{ url('icons-feather-icons') }}"><i class="bx bx-right-arrow-alt"></i><i
                        class='bx bxs-briefcase-alt-2'></i>list job</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;">
            <div class="parent-icon"> <i class='bx bxs-archive'></i>
            </div>
            <div class="menu-title">Archive</div>
        </a>
        <ul>
            <li> <a href="{{ route('admin.archiveEmployees.index') }}""><i class="bx bx-right-arrow-alt"></i><i
                        class='bx bxs-group'></i>Archive Empolyes</a>
            </li>
            <li> <a href="{{ route('admin.archiveprojects.index') }}"><i class="bx bx-right-arrow-alt"></i><i
                        class='bx bx-atom'></i></i>Archive Project </a>
            </li>
            {{-- <li> <a href="{{ url('icons-feather-icons') }}"><i class="bx bx-right-arrow-alt"></i><i class='bx bxs-briefcase-alt-2'></i>list job</a> --}}
    </li>
    </ul>
    </li>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
