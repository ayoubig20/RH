@extends('layouts.admin')

@section('title', 'Attendances')

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
                            <li class="breadcrumb-item active" aria-current="page">Data Cards Attendances</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!--end breadcrumb-->
            <div class="text-center mb-3">
                <h2 class="page-title">Report Employees Attendances</h2>
            </div>

            <div class="form-group m-3 col-2">
                <label for="start">Select month:</label>
                <input type="month" id="start" name="start" class="form-control">
            </div>

            <table id="attendanceReportsTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Employee </th>
                        <th>Working Days in month</th>
                        <th>Missed Days </th>
                        <th>Missed Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Attendance report data will be generated dynamically using AJAX -->
                </tbody>
            </table>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $('#start').on('change', function() {
                    var monthYear = $(this).val();
                    $.ajax({
                        url: '{{ route('admin.report-attendances.genrateAttendances') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            month: monthYear.split('-')[1], // extract month from monthYear value
                            year: monthYear.split('-')[0]
                        },
                        success: function(data) {
                            // Clear existing table rows before generating new ones
                            $('#attendanceReportsTable tbody tr').remove();

                            // Generate new table rows using the returned data
                            $.each(data.attendanceReports, function(key, value) {
                                var row = '<tr>' +

                                    '<td>' +
                                    '<a href="{{ route('admin.employees.show', '') }}/' + value
                                    .employeeId + '">' + '<span class="badge p-2" style="background-color:#23067a">' + value
                                    .employeeFirstName + ' ' + value.employeeLastName + '</span>' +
                                    '</a>' +
                                   
                                    '</td>' + '<td>' + value.workingDays + '</td>' +
                                    '<td>' + value.missedDays + '</td>' +
                                    '<td>' + value.missedPercentage + '%</td>' +
                                    '</tr>';
                                $('#attendanceReportsTable tbody').append(row);
                            });
                        },
                        error: function() {
                            alert('Failed to generate attendance reports data.');
                        }
                    });
                });
            </script>



        </div>
    </div>

@endsection
