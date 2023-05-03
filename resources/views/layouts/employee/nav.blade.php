<div class="sidebar-wrapper" data-simplebar="true" id="sidebar">>
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
            <a href="{{ route('employee.home.index') }}" class="">
                <div class="parent-icon"><i class="bx bx-home-circle"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{ route('employee.employee.show', auth()->user()->id) }}" class="has-arrow">
                <div class="parent-icon"><i class='bx bxs-group'></i>
                </div>
                <div class="menu-title">Employes</div>
            </a>
        </li>

        {{-- <li>
            <a class="" href="{{ route('employee.projects.index') }}">
                <div class="parent-icon"> <i class="bx bx-atom"></i>
                </div>
                <div class="menu-title">Projects</div>
            </a>

        </li> --}}
        <li>
            <a class="" href="{{ route('employee.tasks.index') }}">
                <div class="parent-icon"> <i class="bx bx-task"></i>
                </div>
                <div class="menu-title">Tasks</div>
            </a>

        </li>
        <li>
            <a class="" href="{{ route('employee.kanban.index') }}">
                <div class="parent-icon"> <i class='bx bx-list-check'></i>
                </div>
                <div class="menu-title">Kanban</div>
            </a>
        </li>  
        <li>
            <a class="" href="#">
                <div class="parent-icon"> <i class='bx bxs-calendar'></i>
                </div>
                <div class="menu-title">Calendar</div>
            </a>
        </li>


        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class='bx bx-file'></i>
                </div>
                <div class="menu-title">Documents</div>
            </a>
            <ul>
                <li> <a href="{{ route('employee.printWorkCertifacte', auth()->user()->id) }}"><i
                            class="bx bx-right-arrow-alt"></i>
                        <i class='bx bx-file'></i>Work certificate</a>
                </li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar wrapper -->
