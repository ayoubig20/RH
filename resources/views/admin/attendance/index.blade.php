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
                        <h2 class="page-title">Employee Attendance
                        </h2>
                    </div>
                    <div class="badge" style="color: #FFF; background-color: #8730c2;">
                        <h5 class="text text-center text-white">DATE:{{ \Carbon\Carbon::now()->format('d/m/Y') }}
                        </h5>
                    </div>
                </div>
                </br>

                <div class="table-responsive">
                    <table id="example2" class="table table-bordered -mb-2 text-center table-hover">
                        <thead class="table-light text-center text-primary ">
                            <tr>
                                <th>#</th>

                                <th>Employee</th>
                                <th>Job</th>
                                <th>Department</th>
                                <th>Login Time</th>
                                <th>Logout Time</th>
                                <th>duration</th>
                                <th>Connected From</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($viewData['employees'] as $employee)
                                <?php
                                $i++;
                                $total_login_duration = 0;
                                ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        <a href="{{ route('admin.employees.show', $employee->getId()) }}">
                                            <img src="{{ asset('storage/assets/users/' . $employee->image) }}"
                                                class="user-img" alt="user avatar"></br>
                                            <span class="badge p-2" style="background-color:#23067a">
                                                {{ $employee ? $employee->firstName . ' ' . $employee->lastName : '' }}
                                            </span>
                                        </a>
                                    </td>
                                    <td>{{ $employee->job->title }}</td>
                                    <td>{{ $employee->department->getName() }}</td>
                                    <td>
                                        @foreach ($viewData['attendances'] as $attendance)
                                            @if ($employee->id == $attendance->employee_id)
                                                <li style="list-style: none">{{ $attendance->getLoginTime() }}</li>
                                                @if (empty($first_login_time[$employee->id]))
                                                    <?php $first_login_time[$employee->id] = strtotime($attendance->getLoginTime()); ?>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($viewData['attendances'] as $attendance)
                                            @if ($employee->id == $attendance->employee_id)
                                                <li style="list-style: none">
                                                    {{ $attendance->getLogoutTime() ?? 'No logout time recorded' }}</li>
                                                @if (!empty($first_login_time[$employee->id]))
                                                    <?php
                                                    $logout_time = strtotime($attendance->getLogoutTime());
                                                    $duration = $logout_time - $first_login_time[$employee->id];
                                                    $total_login_duration += $duration; // Ajouter la durée de connexion à la durée totale de connexion pour cet employé
                                                    $hours = floor($duration / 3600);
                                                    $minutes = floor(($duration / 60) % 60);
                                                    $seconds = $duration % 60;
                                                    $duration_formatted = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
                                                    ?>
                                                    <li style="list-style: none">Duration: {{ $duration_formatted }}</li>
                                                    <?php unset($first_login_time[$employee->id]); ?>
                                                @endif
                                            @endif
                                        @endforeach

                                    </td>

                                    <td style="list-style: none">Total login duration:
                                        {{ gmdate('H:i:s', $total_login_duration) }}</td>
                                    <td>
                                        @foreach ($viewData['attendances'] as $attendance)
                                            @if ($employee->id == $attendance->employee_id)
                                                <li style="list-style: none">
                                                    {{ $attendance->ip_address ?? 'No IP address recorded' }}</li>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @php $statusDisplayed = false; @endphp
                                        @foreach ($viewData['attendances'] as $attendance)
                                            @if ($employee->id == $attendance->employee_id && !$statusDisplayed)
                                                @if ($attendance->status == 'present')
                                                    <span class="badge bg-success">Present</span>
                                                @else
                                                    <span class="badge bg-danger">Absent</span>
                                                @endif
                                                @php $statusDisplayed = true; @endphp
                                            @endif
                                        @endforeach
                                    </td>

                                </tr>
                            @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
