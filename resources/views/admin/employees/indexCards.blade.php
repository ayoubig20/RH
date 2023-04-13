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

            <div class="col">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session()->has('Add'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                        <strong>{{ session()->get('Add') }}</strong>

                    </div>
                    <script>
                        // Set a timer to hide the success message after 5 seconds
                        setTimeout(function() {
                            $('#success-alert').alert('close');
                        }, 2000);
                    </script>
                @endif
                <div id="notification"></div>


                @if (session()->has('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('delete') }}</strong>

                    </div>
                @endif

                @if (session()->has('edit'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('edit') }}</strong>

                    </div>
                @endif
                <div class="text-sm-end">
                    <div class="col-auto float-right ml-auto">
                        <div class="btn-group mb-3 d-none d-sm-inline-block">
                            <a href="{{ route('admin.employees.index', ['view' => 'card']) }}"
                                class="btn btn-muted {{ request()->get('view') == 'card' ? 'active' : '' }}"><i
                                    class='bx bxs-grid-alt'></i></a>
                            <a href="{{ route('admin.employees.index', ['view' => 'list']) }}"
                                class="btn btn-muted {{ request()->get('view') != 'card' ? 'active' : '' }}"><i
                                    class='bx bx-list-ul'></i></a>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-4 g-3">
                    @foreach ($viewData['employees'] as $employee)
                        <div class="col">
                            <div class="card" style="width: 18rem;">
                                <img src="{{asset('storage/assets/users/'.$employee->image)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $employee->getFirstName() }}
                                        {{ $employee->getLastName() }}</h5>
                                    <p class="card-text">{{ $employee->getJob() }}</p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Age: {{ $employee->getAge() }}</li>
                                        <li class="list-group-item">Phone: {{ $employee->getPhone() }}</li>
                                        <li class="list-group-item">Department: {{ $employee->department->getName() }}</li>
                                        <li class="list-group-item">Fattening Date: {{ $employee->getFatteningDate() }}
                                        </li>
                                        <li class="list-group-item">Salary: {{ $employee->getSalary() }}</li>
                                    </ul>
                                    <div class="row">
                                        <div class="col">
                                            <button type="button" class="btn btn-outline-success btn-sm">
                                                <a style="text-decoration: none;color:rgb(34, 178, 65)"
                                                    href="{{ route('admin.employees.edit', $employee->getId()) }}">
                                                    <i class='bx bxs-edit bx-rotate-180'></i> Edit</a>
                                            </button>

                                            <button type="button" class="btn btn-outline-primary btn-sm">
                                                <a style="text-decoration: none;color:rgb(25, 40, 154)"
                                                    href="{{ route('admin.employees.show', $employee->getId()) }}">
                                                    <i class='bx bxs-show me-0'></i> Show</a>
                                            </button>

                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteEmployeeModal{{ $employee->getId() }}"><i
                                                    class='bx bxs-trash me-0'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteEmployeeModal{{ $employee->getId() }}" tabindex="-1"
                                aria-labelledby="deleteEmployeeModalLabel{{ $employee->getId() }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteEmployeeModalLabel{{ $employee->getId() }}">
                                                Delete Employee</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this employee?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('admin.employees.destroy', $employee->getId()) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
