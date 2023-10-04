<!--sidebar wrapper -->

<div class="sidebar-wrapper" style="background-color:hsl(226, 64%, 37%)" data-simplebar="true" id="sidebar">
    <div class="sidebar-header" style="background-color:hsl(226, 64%, 37%)">
        <div>
            <img src="{{ URL::asset('assets/images/icon-light.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text" style="color:#ffffff">HR PLATFORM</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-menu'></i>
        </div>

    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <!-- @can('list-statistics')
    -->
            <li>
                <a href="{{ route('admin.home.index') }}" style="color:#ffffff">
                    <div class="parent-icon"><i class="bx bx-home-circle"></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <!--
@endcan -->
        @can('list-employees')
            <li>
                <a href="{{ route('admin.employees.index') }}" style="color:#ffffff">
                    <div class="parent-icon"><i class='bx bxs-group'></i>
                    </div>
                    <div class="menu-title">Employes</div>
                </a>

            </li>
        @endcan
        @can('list-adminstrator')
            <li>
                <a href="{{ route('users.index') }}" style="color:#ffffff">
                    <div class="parent-icon"><i class='bx bxs-user-account'></i>
                    </div>
                    <div class="menu-title">Administrator</div>
                </a>
            </li>
        @endcan
        @can('list-projects')
            <li>
                <a class="" href="{{ route('admin.projects.index') }}" style="color:#ffffff">
                    <div class="parent-icon"> <i class="bx bx-atom"></i>
                    </div>
                    <div class="menu-title">Projects</div>
                </a>

            </li>
        @endcan
        @can('list-tasks')
            <li>
                <a class="" href="{{ route('admin.tasks.index') }}" style="color:#ffffff">
                    <div class="parent-icon"> <i class="bx bx-task"></i>
                    </div>
                    <div class="menu-title">Tasks</div>
                </a>

            </li>
        @endcan
        @can('list-kanban')
            <li>
                <a class="" href="{{ route('admin.kanban.index') }}" style="color:#ffffff">
                    <div class="parent-icon"> <i class='bx bx-list-check'></i>
                    </div>
                    <div class="menu-title">Kanban</div>
                </a>
            </li>
        @endcan
        @can('list-department')
            <li>
                <a class="" href="{{ route('admin.department.index') }}" style="color:#ffffff">
                    <div class="parent-icon"> <i class="bx bx-buildings"></i>
                    </div>
                    <div class="menu-title">Departements</div>
                </a>
            </li>
        @endcan
        @can('list-setting')
            <li>
                <a class="has-arrow" href="javascript:;" style="color:#ffffff">
                    <div class="parent-icon"> <i class='bx bxs-cog'></i>
                    </div>
                    <div class="menu-title">Settings</div>
                </a>
                <ul style="background-color:hsl(226, 64%, 37%); border:none">
                    @can('list-category')
                        <li> <a href="{{ route('admin.category.index') }}" style="color:#ffffff" class="nav-link"></i><i
                                    class='bx bxs-briefcase'></i></i>Projects Category</a>
                        </li>
                    @endcan
                    @can('list-job')
                        <li> <a href="{{ route('admin.jobs.index') }}" style="color:#ffffff">
                                </i><i class='bx bxs-briefcase-alt-2'></i>list jobs</a>
                        </li>
                    @endcan
                    @can('list-roles')
                        <li> <a href="{{ route('roles.index') }}" style="color:#ffffff"><i class='bx bxs-shield'></i>Roles
                                Permissions</a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('archive')
            <li>
                <a class="has-arrow" href="javascript:;" style="color:#ffffff">
                    <div class="parent-icon"> <i class='bx bxs-archive'></i>
                    </div>
                    <div class="menu-title">Archives</div>
                </a>

                <ul style="background-color:hsl(226, 64%, 37%); border:none">
                    @can('archive-employee')
                        <li> <a href="{{ route('admin.archiveEmployees.index') }}"style="color:#ffffff"></i><i
                                    class='bx bxs-group'></i>Archive Empolyees</a>
                        </li>
                    @endcan
                    @can('archive-projects')
                        <li> <a href="{{ route('admin.archiveprojects.index') }}" style="color:#ffffff">
                                </i><i class='bx bx-atom'></i></i>Archive Projects </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

        @can('attendances')
            <li>
                <a class="" href="{{ route('admin.attendance.index') }}" style="color:#ffffff">
                    <div class="parent-icon"> <i class='bx bx-check-square'></i>
                    </div>
                    <div class="menu-title">Attendances</div>
                </a>
            </li>
        @endcan
        @can('Report')
            <li>
                <a href="javascript:;" class="has-arrow" style="color:#ffffff">
                    <div class="parent-icon"><i class='bx bxs-file'></i>
                    </div>
                    <div class="menu-title">Reports</div>
                </a>
                <ul style="background-color:hsl(226, 64%, 37%); border:none">
                    @can('report-projects')
                        <li> <a href="{{ route('admin.report-projects.index') }}" style="color:#ffffff">
                                <i class='bx bx-file'></i>Report projects</a>
                        </li>
                    @endcan
                    @can('report-attendances')
                        <li> <a href="{{ route('admin.report-attendances.index') }}" style="color:#ffffff">
                                <i class='bx bx-file'></i>Report attendances</a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        <!--end navigation-->
</div>
<!--end sidebar wrapper -->
