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
            <h6 class="mb-0 text-uppercase">Employees Import</h6>
    
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>image</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    {{-- <th>Email</th> --}}
                                    <th>Phone</th>
                                    <th>Job</th>
                                    <th>Department</th>
                                    <th>Fattening Date</th>
                                    <th>Salary</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($viewData['employees'] as $employee)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>
                                            <img src="{{ $employee->getImage() }}" class="user-img" alt="user avatar">
                                        </td>

                                        <td>{{ $employee->getFirstName() }} {{ $employee->getLastName() }}</td>
                                        <td>{{ $employee->getAge() }}</td>
                                        {{-- <td>{{ $employee->getEmail() }}</td> --}}
                                        <td>{{ $employee->getPhone() }}</td>
                                        <td>{{ $employee->getJob() }}</td>
                                        <td>{{ $employee->department->getName() }}</td>
                                        <td>{{ $employee->getFatteningDate() }}</td>
                                        <td>{{ $employee->getSalary() }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <button type="button" class="btn btn-outline-success btn-sm">
                                                        <a style="text-decoration: none;color:rgb(34, 178, 65)" href="{{ route('admin.employees.edit', $employee->getId()) }}">
                                                            <i class='bx bxs-edit bx-rotate-180' ></i> Edit</a>
                                                    </button>

                                                    <button type="button" class="btn btn-outline-primary btn-sm">
                                                        <a style="text-decoration: none;color:rgb(25, 40, 154)" href="{{ route('admin.employees.show', $employee->getId()) }}"><i
                                                                class='bx bxs-show me-0'></i> Show</a>
                                                    </button>

                                                    <button type="button" class="btn btn-outline-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteEmployeeModal{{ $employee->getId() }}"><i
                                                            class='bx bxs-trash me-0'></i>
                                                    </button>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    <div class="modal fade" id="deleteEmployeeModal{{ $employee->getId() }}" tabindex="-1"
                                        aria-labelledby="deleteEmployeeModalLabel{{ $employee->getId() }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="deleteEmployeeModalLabel{{ $employee->getId() }}">
                                                        Delete Employee
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this employee?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <form
                                                        action="{{ route('admin.employees.destroy', $employee->getId()) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!--end page wrapper -->
@endsection

@section('script')
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>

@endsection
