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
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button"
                            class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                                link</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card border-top border-0 border-5 border-dark">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-dark"></i></div>
                        <h4 class="mb-8 text-dark">Empolyee Registration</h4>
                    </div>
                    <hr>
                    <form method="POST" action="{{ route('admin.employees.store') }}" enctype="multipart/form-data"
                        class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" class="form-control" id="firstName" name="firstName" value="{{ old('firstName') }}" required>
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
                            <label for="job" class="form-label">Job:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bxs-briefcase-alt-2'></i></span>
                                <input type="text" class="form-control" id="job" name="job" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="fatteningDate" for="fatteningDate">Fattening Date:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-calendar-alt"></i></span>
                                <input type="date" class="form-control" id="fatteningDate" name="fatteningDate"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="salary" class="form-label">Salary:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-money"></i></span>
                                <input type="text" class="form-control" id="salary" name="salary" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="role" class="form-label">Role:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-user"></i></span>
                                <select class="form-control" id="role" name="role" required>
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="employee">Employee</option>
                                </select>
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
                        <div>        </div>
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
                                    <input class="form-check-input" type="radio" name="status" value="full-time"
                                        checked> Full-time
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
    </div>
@endsection
