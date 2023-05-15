@extends('layouts.admin')
@section('title', 'Employees')
@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Tables</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Table Attendance Employees</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <div class="card m-auto">
                <!--end breadcrumb-->
                @include('layouts.notify')
                <div class="col-12">
                    <div class="text-center text-bold">
                        <h2 class="page-title">Employees Attendances
                        </h2>
                    </div>
                    <div class="badge" style="color: #FFF; background-color: #8730c2;">
                        <h5 class="text text-center text-white">DATE:{{ \Carbon\Carbon::now()->format('d/m/Y') }}
                        </h5>
                    </div>
                </div>
                </br>
                <div class="table-responsive mx-2">
                    <table id="example" class="table table-bordered -mb-2 text-center table-hover">
                        <thead class="table-light text-center text-primary ">
                            <tr>
                                <th>#</th>
                                <th>Employee</th>
                                <th>Job</th>
                                <th>Department</th>
                                <th>First Login Time</th>
                                <th>Last Logout Time</th>
                                <th>Total Login Duration</th>
                                <th>IP Address /conected From</th>
                                <th>Number of Logins</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach ($viewData['employees'] as $employee)
                                @php
                                    $i++;
                                    $login_times = [];
                                    $total_login_duration = 0;
                                @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        <a href="{{ route('admin.employees.show', $employee->getId()) }}">
                                            <img src="{{ asset('storage/assets/users/' . $employee->image) }}"
                                                class="user-img" alt="user avatar"></br>
                                            <span class="badge p-2"
                                                style="background-color:#23067a">{{ $employee ? $employee->firstName . ' ' . $employee->lastName : '' }}</span>
                                        </a>
                                    </td>
                                    <td>{{ $employee->job->title }}</td>
                                    <td>{{ $employee->department->getName() }}</td>
                                    <td>
                                        @php $first_login_time = null; @endphp
                                        @foreach ($viewData['attendances'] as $attendance)
                                            @if ($employee->id == $attendance->employee_id)
                                                @php
                                                    $login_time = strtotime($attendance->getLoginTime());
                                                    if (!$first_login_time || $login_time < $first_login_time) {
                                                        $first_login_time = $login_time;
                                                    }
                                                @endphp
                                            @endif
                                        @endforeach
                                        @if ($first_login_time !== null)
                                            {{ date('Y-m-d H:i:s', $first_login_time) }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        @php $last_logout_time = null; @endphp
                                        @foreach ($viewData['attendances'] as $attendance)
                                            @if ($employee->id == $attendance->employee_id && $attendance->getLogoutTime() !== null)
                                                @php
                                                    $logout_time = strtotime($attendance->getLogoutTime());
                                                    if (is_null($last_logout_time) || $logout_time > $last_logout_time) {
                                                        $last_logout_time = $logout_time;
                                                    }
                                                @endphp
                                            @endif
                                        @endforeach
                                        @if ($last_logout_time !== null)
                                            {{ date('Y-m-d H:i:s', $last_logout_time) }}
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        @foreach ($viewData['attendances'] as $attendance)
                                            @if ($employee->id == $attendance->employee_id && $attendance->getLogoutTime() !== null)
                                                @php
                                                    $logout_time = strtotime($attendance->getLogoutTime());
                                                    if ($logout_time > $first_login_time) {
                                                        $duration = $logout_time - $first_login_time;
                                                        $total_login_duration += $duration;
                                                        $first_login_time = null;
                                                        $login_times[] = $attendance->getLoginTime();
                                                    }
                                                @endphp
                                            @endif
                                        @endforeach
                                        {{ gmdate('H:i:s', $total_login_duration) }}
                                    </td>
                                    <td>
                                        @php $unique_ips = []; @endphp
                                        @foreach ($viewData['attendances'] as $attendance)
                                            @if ($employee->id == $attendance->employee_id && $attendance->ip_address !== null)
                                                @if (!in_array($attendance->ip_address, $unique_ips))
                                                    {{ $attendance->ip_address }}<br>
                                                    @php $unique_ips[] = $attendance->ip_address; @endphp
                                                @endif
                                            @endif
                                        @endforeach
                                        
                                    </td>
                                       <td> {{ count($login_times) }}</td>
                                    <td>
                                        @php $statusDisplayed = false; @endphp
                                        @foreach ($viewData['attendances'] as $attendance)
                                        @if ($employee->id == $attendance->employee_id && !$statusDisplayed)
                                            @if ($attendance->status == 1)
                                                <span class="badge bg-success">Present</span>
                                            @else
                                                <span class="badge bg-danger">Absent</span>
                                            @endif
                                            @php $statusDisplayed = true; @endphp
                                        @endif
                                    @endforeach
                                    
                                    @if (!$statusDisplayed)
                                        <span class="badge bg-danger">Absent</span>
                                    @endif
                                    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @section('script')
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                paging: true,
                pageLength: 10
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>

@endsection
@endsection
