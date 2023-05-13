<!--sidebar wrapper -->
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
        @can('list-statistics')
            <li>
                <a href="{{ route('admin.home.index') }}" class="">
                    <div class="parent-icon"><i class="bx bx-home-circle"></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
        @endcan
        @can('list-employees')
            <li>
                <a href="{{ route('admin.employees.index') }}">
                    <div class="parent-icon"><i class='bx bxs-group'></i>
                    </div>
                    <div class="menu-title">Employes</div>
                </a>

            </li>
        @endcan
        @can('list-adminstrator')
            <li>
                <a href="{{ route('users.index') }}">
                    <div class="parent-icon"><i class='bx bxs-user-account'></i>
                    </div>
                    <div class="menu-title">Administrator</div>
                </a>
            </li>
        @endcan
        @can('list-projects')
            <li>
                <a class="" href="{{ route('admin.projects.index') }}">
                    <div class="parent-icon"> <i class="bx bx-atom"></i>
                    </div>
                    <div class="menu-title">Projects</div>
                </a>

            </li>
        @endcan
        @can('list-tasks')
            <li>
                <a class="" href="{{ route('admin.tasks.index') }}">
                    <div class="parent-icon"> <i class="bx bx-task"></i>
                    </div>
                    <div class="menu-title">Tasks</div>
                </a>

            </li>
        @endcan
        @can('list-kanban')
            <li>
                <a class="" href="{{ route('admin.kanban.index') }}">
                    <div class="parent-icon"> <i class='bx bx-list-check'></i>
                    </div>
                    <div class="menu-title">Kanban</div>
                </a>
            </li>
        @endcan
        @can('list-department')
            <li>
                <a class="" href="{{ route('admin.department.index') }}">
                    <div class="parent-icon"> <i class="bx bx-buildings"></i>
                    </div>
                    <div class="menu-title">Departement</div>
                </a>
            </li>
        @endcan
        @can('list-setting')
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"> <i class='bx bxs-cog'></i>
                    </div>
                    <div class="menu-title">Setting</div>
                </a>
                <ul>
                    @can('list-category')
                        <li> <a href="{{ route('admin.category.index') }}"><i class="bx bx-right-arrow-alt"></i><i
                                    class='bx bxs-briefcase'></i></i>Project Category</a>
                        </li>
                    @endcan
                    @can('list-job')
                        <li> <a href="{{ route('admin.jobs.index') }}"><i class="bx bx-right-arrow-alt"></i><i
                                    class='bx bxs-briefcase-alt-2'></i>list job</a>
                        </li>
                    @endcan
                    @can('list-roles')
                        <li> <a href="{{ route('roles.index') }}"><i class="bx bx-right-arrow-alt"></i><i
                                    class='bx bxs-shield'></i>Permissions</a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('archive')
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"> <i class='bx bxs-archive'></i>
                    </div>
                    <div class="menu-title">Archive</div>
                </a>

                <ul>
                    @can('archive-employee')
                        <li> <a href="{{ route('admin.archiveEmployees.index') }}""><i class="bx bx-right-arrow-alt"></i><i
                                    class='bx bxs-group'></i>Archive Empolyes</a>
                        </li>
                    @endcan
                    @can('archive-projects')
                        <li> <a href="{{ route('admin.archiveprojects.index') }}"><i class="bx bx-right-arrow-alt"></i><i
                                    class='bx bx-atom'></i></i>Archive Project </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

        @can('attendances')
            <li>
                <a class="" href="{{ route('admin.attendance.index') }}">
                    <div class="parent-icon"> <i class='bx bx-check-square'></i>
                    </div>
                    <div class="menu-title">Attendances</div>
                </a>
            </li>
        @endcan
        @can('Report')
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bxs-file'></i>
                    </div>
                    <div class="menu-title">Report</div>
                </a>
                <ul>
                    @can('report-projects')
                        <li> <a href="{{ route('admin.report-projects.index') }}"><i class="bx bx-right-arrow-alt"></i><i
                                    class='bx bx-file'></i>Report projects</a>
                        </li>
                    @endcan
                    @can('report-attendances')
                        <li> <a href="{{ route('admin.report-attendances.index') }}"><i class="bx bx-right-arrow-alt"></i><i
                                    class='bx bx-file'></i>Report attendances</a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan


        <!--end navigation-->
</div>
<!--end sidebar wrapper -->
