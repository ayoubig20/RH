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
                            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        @include('layouts.notify')

        <div class="card border-top border-0 border-5 border-dark">
            <div class="card-body p-5 font-18 text-strong">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-bold">
                            <h3 class="page-title"><strong>Empolyee
                                    Registration</strong></h3>
                        </div>
                    </div>
                </div>
                <hr>
                <form method="POST" action="{{ route('admin.employees.store') }}" enctype="multipart/form-data"
                    class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <label for="firstName" class="form-label">First Name:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" class="form-control" id="firstName" name="firstName"
                                value="{{ old('firstName') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="lastName" class="form-label">Last Name:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                            <input type="text" class="form-control" id="last_name" name="lastName" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="gender" class="form-label">Gender:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-gender-male-female"></i></span>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="DateOfBirth" class="form-label">Date Of Birth:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                            <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-phone"></i></span>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="martialStatus">Martial Status:</label>
                            <select class="form-control" id="martial_status" name="martialStatus" required>
                                <option value="{{ null }}">Select Martial Status</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="address" class="form-label">Address:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-map"></i></span>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="image" class="form-label">Profile Picture:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-image"></i></span>
                            <input type="file" class="form-control" id="image" name="image"
                                accept=".jpg,.jpeg,.png">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="department_id" class="form-label">Department:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-building"></i></span>
                            <select class="form-control" id="department_id" name="department_id" required>
                                <option value="">Select department</option>
                                @foreach ($viewData['departments'] as $department)
                                    <option value="{{ $department->getId() }}">{{ $department->getName() }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="job_id" class="form-label">job:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-briefcase"></i></span>
                            <select class="form-control" id="job_id" name="job_id" disabled required>
                                <option value="">Select department first</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="fatteningDate" for="fatteningDate">Fattening Date:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-calendar-alt"></i></span>
                            <input type="date" class="form-control" id="fatteningDate" name="fatteningDate" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="salary" class="form-label">Salary:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-money"></i></span>
                            <input type="number" min="2900" class="form-control" id="salary" name="salary"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="role" class="form-label">Role:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-user"></i></span>
                            <select class="form-control" id="role" name="role" required>
                                <option value="">Select Role</option>
                                <option value="departmentHead">department head</option>
                                <option value="employee">Employee</option>
                            </select>
                        </div>
                    </div>

                    <div> </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password:</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-lock"></i></span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-lock"></i></span>
                            <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation" required>
                        </div>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <label class="form-check-label mr-4">
                                <input class="form-check-input" type="radio" name="status" value="full-time" checked>
                                Full-time
                            </label>
                            <label class="form-check-label mr-4">
                                <input class="form-check-input" type="radio" name="status" value="part-time">
                                Part-time
                            </label>
                            <label class="form-check-label mr-4">
                                <input class="form-check-input" type="radio" name="status" value="contractor">
                                Contractor

                                <label class="form-check-label mr-4">
                                    <input class="form-check-input" type="radio" name="status" value="seasonal">
                                    Self-employed
                                </label>
                                <label class="form-check-label mr-4">
                                    <input class="form-check-input" type="radio" name="status" value="freelancer">
                                    Freelancer
                                </label>
                                <label class="form-check-label mr-4">
                                    <input class="form-check-input" type="radio" name="status" value="intern"> Intern
                                </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
        console.log('JavaScript code is running');

        $(document).ready(function() {

            $('#department_id').change(function() {
                var deptId = $(this).val();
                // console.log(deptId);
                if (deptId) {
                    $('#job_id').prop('disabled', true);
                    var job_idOptionsHtml = '<option value="">Select job_id</option>';
                    @foreach ($viewData['jobs'] as $job)
                        if ('{{ $job->getDepartmentId() }}' == deptId) {
                            job_idOptionsHtml +=
                                '<option value="{{ $job->getId() }}">{{ $job->title }}</option>';
                            // console.log(job_idOptionsHtml);

                        }
                    @endforeach
                    if (job_idOptionsHtml === '<option value="">Select job</option>') {
                        job_idOptionsHtml +=
                            '<option value="">No jobs found for selected department</option>';
                    }
                    $('#job_id').html(job_idOptionsHtml).prop('disabled', false);
                } else {
                    $('#job_id').html('<option value="">Select department first</option>').prop('disabled',
                        true);
                }
            });
        });
    </script>
@endsection
