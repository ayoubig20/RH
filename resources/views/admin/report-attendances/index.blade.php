@extends('layouts.admin')
@section('title', 'Employees')
<style>
    body {
        line-height: 1.6;
        margin: 2em;
    }

    th {
        background-color: #001f3f;
        color: #191616;
        padding: 0.5em 1em;
    }

    td {
        border-top: 1px solid #eee;
        padding: 0.5em 1em;
    }

    input {
        cursor: pointer;
    }

    /* Column types */
    th.missed-col {
        background-color: #f00;
    }

    td.missed-col {
        background-color: #ffecec;
        color: #f00;
        text-align: center;
    }

</style>


@section('wrapper')
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
                @include('layouts.notify')


                <div class="text-center mb-3">
                    <h2 class="page-title">Report Employees Attendances</h2>
                </div>

                <div class="form-group m-3 col-2">
                    <label for="start">Select month:</label>
                    <input type="month" id="start" name="start" onchange="updateDays()" class="form-control">
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="name-col">Name</th>
                                <!-- Dynamically generated day columns -->
                                <script>
                                    // Get the selected month from the input field
                                    let startDate = document.getElementById('start').value;
                                    let year = startDate.slice(0, 4);
                                    let month = startDate.slice(5, 7);
                                    // Calculate the number of days in the selected month
                                    let numDays = new Date(year, month, 0).getDate();
                                    // Generate the day columns dynamically
                                    for (let i = 1; i <= numDays; i++) {
                                        document.write(`<th>${i}</th>`);
                                    }
                                </script>
                                <th class="missed-col">Days Missed</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($viewData['employees'] as $employee)
                                <tr>
                                    <td class="text-center">
                                        <a href="{{ route('admin.employees.show', $employee->getId()) }}">
                                            <img src="{{ asset('storage/assets/users/' . $employee->image) }}"
                                                class="user-img" alt="user avatar"></br>
                                            <span class="badge p-2"
                                                style="background-color:#23067a">{{ $employee ? $employee->firstName . ' ' . $employee->lastName : '' }}</span>
                                        </a>
                                    </td>
                                    <script>
                                        function generateCheckboxes() {
                                            startDate = document.getElementById('start').value;
                                            year = startDate.slice(0, 4);
                                            month = startDate.slice(5, 7);
                                            numDays = new Date(year, month, 0).getDate();
                                            let checkboxesHtml = '';
                                            for (let i = 1; i <= numDays; i++) {
                                                checkboxesHtml += `<td class="attend-col"><input type="checkbox" class="form-check-input"></td>`;
                                            }
                                            return checkboxesHtml;
                                        }
                                        document.write(generateCheckboxes());
                                    </script>
                                    <td class="missed-col">0</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <script>
                    document.getElementById('start').addEventListener('change', updateDays);

                    function updateDays() {
                        // Get the new selected month
                        let startDate = document.getElementById('start').value;
                        let year = startDate.slice(0, 4);
                        let month = startDate.slice(5, 7);
                        // Calculate the number of days in the new month
                        let numDays = new Date(year, month, 0).getDate();

                        // Remove any existing day columns 
                        let dayHeaders = document.querySelectorAll('th:not(.name-col, .missed-col)');
                        for (let i = 0; i < dayHeaders.length; i++) {
                            dayHeaders[i].remove();
                        }

                        // Generate the new day columns
                        for (let i = 1; i <= numDays; i++) {
                            document.querySelector('thead tr').innerHTML += `<th>${i}</th>`;
                        }

                        // Remove and regenerate the checkbox columns
                        let checkboxCols = document.querySelectorAll('.attend-col');
                        for (let i = 0; i < checkboxCols.length; i++) {
                            checkboxCols[i].remove();
                        }
                        let tbodyRows = document.querySelectorAll('tbody tr');
                        for (let i = 0; i < tbodyRows.length; i++) {
                            tbodyRows[i].innerHTML += generateCheckboxes();
                        }
                    }
                </script>

            @endsection
