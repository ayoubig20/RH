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
            {{-- <div class="text-sm-end">
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
            </div> --}}
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
                                    <th>leaving Date</th>
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
                                            <img src="{{asset('storage/assets/users/'.$employee->image)}}" class="user-img" alt="user avatar">
                                        </td>

                                        <td>{{ $employee->getFirstName() }} {{ $employee->getLastName() }}</td>
                                        <td>{{ $employee->getAge() }}</td>
                                        {{-- <td>{{ $employee->getEmail() }}</td> --}}
                                        <td>{{ $employee->getPhone() }}</td>
                                        <td>{{ $employee->getJob() }}</td>
                                        <td>{{ $employee->department->getName() }}</td>
                                        <td>{{ $employee->getFatteningDate() }}</td>
                                        <td>{{ $employee->deleted_at }}</td>
                                        <td>{{ $employee->getSalary() }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-outline-secondary dropdown-toggle btn-sm" type="button" id="employeeActionsDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="employeeActionsDropdown">
                                                    <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#retrieveEmployeeModal{{ $employee->getId() }}">
                                                        <i class='bx bxs-archive me-0'></i> retrieve
                                                    </button>
                                                    <a class="dropdown-item" href="{{ route('admin.employees.show', $employee->getId()) }}">
                                                        <i class='bx bxs-show me-0'></i> Show
                                                    </a>
                                                    <button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deleteEmployeeModal{{ $employee->getId() }}">
                                                        <i class='bx bxs-trash me-0'></i> Delete
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
                                                        action="{{ route('admin.archiveEmployees.destroy', $employee->getId()) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="retrieveEmployeeModal{{ $employee->getId() }}" tabindex="-1"
                                        aria-labelledby="retrieveEmployeeModalLabel{{ $employee->getId() }}"
                                        aria-hidden="true">
                                       <div class="modal-dialog">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 class="modal-title"
                                                       id="retrieveEmployeeModalLabel{{ $employee->getId() }}">
                                                       Retrieve Employee
                                                   </h5>
                                                   <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                           aria-label="Close"></button>
                                               </div>
                                               <form action="{{ route('admin.archiveEmployees.update',  $employee->getId()) }}" method="POST">
                                                   @csrf
                                                   @method('PUT')
                                                   <div class="modal-body">
                                                       Are you sure you want to retrieve this employee?
                                                       <input type="text" value="{{ $employee->getId() }}" name="id" hidden>
                                                   </div>
                                                   <div class="modal-footer">
                                                       <button type="button" class="btn btn-secondary"
                                                               data-bs-dismiss="modal">Cancel</button>
                                                       <button type="submit" class="btn btn-warning">Retrieve</button>
                                                   </div>
                                               </form>
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
