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
            {{-- edit --}}
            @include('layouts.notify')
            <div class="card border-top border-0 border-5 border-dark">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user  font-22 text-drak"></i></div>
                        <h3 class="mb-0 text-dark">{{ $employee->firstName }} {{ $employee->lastName }} Update</h3>
                    </div>
                    <hr>
                    <form method="POST" action="{{ route('admin.employees.update', $employee->id) }}"
                        enctype="multipart/form-data" class="row g-3">
                        @csrf
                        @method('PATCH')
                        <div class="col-md-12">
                            <label for="image" class="form-label">Profile Picture:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-image"></i></span>
                                @if ($employee->image && !old('image'))
                                    <img src="{{ asset('storage/assets/users/' . $employee->image) }}" alt="Current Image"
                                        style="max-width: 100%" class="img-fluid">
                                @elseif (old('image'))
                                    <img src="{{ asset('storage/assets/users/' . old('image')) }}" alt="Old Image"
                                        style="max-width: 100%" class="img-fluid">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" class="form-control" id="firstName" name="firstName"
                                    value="{{ $employee->firstName }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" class="form-control" id="last_name" name="lastName"
                                    value="{{ $employee->lastName }}"" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="gender">{{ __('Gender') }}:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-gender-male-female"></i></span>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value={{ null }}>{{ __('Select Gender') }}</option>
                                    <option value="Male" {{ $employee->gender === 'Male' ? 'selected' : '' }}>
                                        {{ __('Male') }}</option>
                                    <option value="Female" {{ $employee->gender === 'Female' ? 'selected' : '' }}>
                                        {{ __('Female') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="DateOfBirth" class="form-label">Date Of Birth:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth"
                                    value="{{ $employee->DateOfBirth }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email" required
                                    value="{{ $employee->email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-phone"></i></span>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ $employee->phone }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="martialStatus">Martial Status:</label>
                                <select class="form-control" id="martial_status" name="martialStatus" required>
                                    <option value="{{ null }}">Select Martial Status</option>
                                    <option value="Single" {{ $employee->martialStatus == 'Single' ? 'selected' : '' }}>
                                        Single</option>
                                    <option value="Married" {{ $employee->martialStatus == 'Married' ? 'selected' : '' }}>
                                        Married</option>
                                    <option value="Divorced"
                                        {{ $employee->martialStatus == 'Divorced' ? 'selected' : '' }}>Divorced
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="address" class="form-label">Address:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-map"></i></span>
                                <input type="text" class="form-control" id="address" name="address"
                                    value="{{ $employee->address }}" required>
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
                                        <option value="{{ $department->getId() }}"
                                            {{ old('departement', $employee->getDepartmentId()) == $department->getId() ? 'selected' : '' }}>
                                            {{ $department->getName() }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="job_id" class="form-label">job:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-briefcase"></i></span>
                                <select class="form-control" id="job_id" name="job_id"
                                    @if (!old('job_id')) required @else disabled @endif>
                                    <option value="{{ $employee->job_id }}"
                                        {{ old('job_id', $employee->job_id) == $employee->job_id ? 'selected' : '' }}>
                                        {{ $employee->job->title }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="fatteningDate" for="fatteningDate">Fattening Date:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-calendar-alt"></i></span>
                                <input type="date" class="form-control" id="fatteningDate" name="fatteningDate"
                                    value="{{ $employee->fatteningDate }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="salary" class="form-label">Salary:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-money"></i></span>
                                <input type="number" class="form-control" id="salary" name="salary"
                                    value="{{ $employee->salary }}"required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="role" class="form-label">Role:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-user"></i></span>
                                <select class="form-control" id="role" name="role" required>
                                    <option value="">Select Role</option>
                                    <option value="{{ $employee->role }}"
                                        {{ $employee->role == 'departmentHead' ? 'selected' : '' }}>department head
                                    </option>
                                    <option value="employee" {{ $employee->role == 'employee' ? 'selected' : '' }}>
                                        Employee
                                    </option>

                                </select>
                            </div>
                        </div>

                        <div> </div>
                        <div class="col-md-6">

                            <label for="password" class="form-label">Password: <span
                                    class="badge rounded-pill bg-warning">If you dont wante change old password late
                                    empty</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-lock"></i></span>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password">
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
                                    id="password_confirmation" name="password_confirmation">
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
                                    <input class="form-check-input" type="radio" name="status" value="full-time"
                                        {{ old('status', $employee->getStatus()) == 'full-time' ? 'checked' : '' }}>
                                    Full-time
                                </label>
                                <label class="form-check-label mr-4">
                                    <input class="form-check-input" type="radio" name="status" value="part-time"
                                        {{ old('status', $employee->getStatus()) == 'part-time' ? 'checked' : '' }}>
                                    Part-time
                                </label>
                                <label class="form-check-label mr-4">
                                    <input class="form-check-input" type="radio" name="status" value="contractor"
                                        {{ old('status', $employee->getStatus()) == 'contractor' ? 'checked' : '' }}>
                                    Contractor
                                </label>
                                <label class="form-check-label mr-4">
                                    <input class="form-check-input" type="radio" name="status" value="freelancer"
                                        {{ old('status', $employee->getStatus()) == 'freelancer' ? 'checked' : '' }}>
                                    Freelancer
                                </label>
                                <label class="form-check-label mr-4">
                                    <input class="form-check-input" type="radio" name="status" value="intern"
                                        {{ old('status', $employee->getStatus()) == 'intern' ? 'checked' : '' }}>
                                    Intern
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-success px-5">Update</button>
                        </div>
                    </form>
                </div>
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
