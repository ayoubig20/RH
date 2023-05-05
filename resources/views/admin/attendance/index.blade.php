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
            <div class="card">
                <!--end breadcrumb-->
                @include('layouts.notify')
                <div class="col-12">
                    <div class="text-center text-bold">
                        <h2 class="page-title"><strong>Employee Attendance
                            </strong></h2>
                    </div>
                </div>
                </br>

                <div class="table-responsive">
                    <table id="example2" class="table table-bordered -mb-4 text-center table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>image</th>
                                <th>Name</th>
                                <th>Job</th>
                                <th>Department</th>
                                <th>Login Time</th>
                                <th>Logout Time</th>
                                <th>Connected From</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($viewData['employees'] as $employee)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        <img src="{{ asset('storage/assets/users/' . $employee->image) }}" class="user-img"
                                            alt="user avatar">
                                    </td>
                                    <td><a href="{{ route('admin.employees.show', $employee->getId()) }}"><span
                                                class="badge bg-dark p-2">{{ $employee->getFirstName() }}
                                                {{ $employee->getLastName() }}</span></a>
                                    </td>

                                    <td>{{ $employee->job->title }}</td>
                                    <td>{{ $employee->department->getName() }}</td>
                                    <td>
                                        @foreach ($viewData['attendances'] as $attendance)
                                            @if ($employee->id == $attendance->employee_id)
                                                <li style="list-style: none"> {{ $attendance->getLoginTime() }}</li>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($viewData['attendances'] as $attendance)
                                            @if ($employee->id == $attendance->employee_id)
                                                <li style="list-style: none">
                                                    {{ $attendance->getLogoutTime() ?? 'No logout time recorded' }}</li>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($viewData['attendances'] as $attendance)
                                            @if ($employee->id == $attendance->employee_id)
                                                <li style="list-style: none">
                                                    {{ $attendance->ip_address ?? 'No logout time recorded' }}</li>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($viewData['attendances'] as $attendance)
                                            @if ($employee->id == $attendance->employee_id)
                                                @if ($attendance->status == 'present')
                                                    <span class="badge bg-success">Present</span>
                                                @else
                                                    <span class="badge bg-danger">Absent</span>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
