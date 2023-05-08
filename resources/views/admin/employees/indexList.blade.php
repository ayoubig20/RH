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
                            <li class="breadcrumb-item active" aria-current="page">Data Empolyees
                                List</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
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
            @include('layouts.notify')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center text-bold">
                                <h3 class="page-title">Employees list</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example2" class="table  text-center table-hover">
                            <thead class="table-light text-center text-primary">
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
                                            <img src="{{ asset('storage/assets/users/' . $employee->image) }}"
                                                class="user-img" alt="user avatar">
                                        </td>
                                        <td><a href="{{ route('admin.employees.show', $employee->getId()) }}"><span
                                                    class="badge p-2"style="background-color:#8971d0">{{ $employee->getFirstName() }}
                                                    {{ $employee->getLastName() }}</span></a>
                                        </td>
                                        <td>{{ $employee->getAge() }}</td>
                                        {{-- <td>{{ $employee->getEmail() }}</td> --}}
                                        <td>{{ $employee->getPhone() }}</td>
                                        <td>{{ $employee->job->title }}</td>
                                        <td>{{ $employee->department->getName() }}</td>
                                        <td>{{ $employee->getFatteningDate() }}</td>
                                        <td>{{ $employee->getSalary() }}DH</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-outline-secondary dropdown-toggle btn-sm"
                                                    type="button" id="employeeActionsDropdown" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="employeeActionsDropdown">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.employees.edit', $employee->getId()) }}">
                                                        <i class='bx bxs-edit bx-rotate-180'></i> Edit
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.employees.show', $employee->getId()) }}">
                                                        <i class='bx bxs-show me-0'></i> Show
                                                    </a>
                                                    <button class="dropdown-item" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#archiveEmployeeModal{{ $employee->getId() }}">
                                                        <i class='bx bxs-archive-in'></i>Archive Employee
                                                    </button>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <div class="modal fade" id="archiveEmployeeModal{{ $employee->getId() }}"
                                        tabindex="-1" aria-labelledby="archiveEmployeeModalLabel{{ $employee->getId() }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="archiveEmployeeModalLabel{{ $employee->getId() }}">
                                                        Archive Employee
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to Archive this employee?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <form
                                                        action="{{ route('admin.employees.destroy', $employee->getId()) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-warning">Archive</button>
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