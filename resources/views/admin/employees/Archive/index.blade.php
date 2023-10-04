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
            @include('layouts.notify')

            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-bold">
                            <h3 class="page-title"><strong>Employees Archive List</strong></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    {{-- Button trigger modal --}}
                    <button class="btn btn-rounded bg-danger text-white" id="delete-selected">
                        <span class="text-white">Delete Selected</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  text-center table-hover" id="example">
                            <thead class="table-light text-center text-success">
                                <tr>
                                    <th><input type="checkbox" id="select-all" onclick="CheckAll('box1', this)"></th>
                                    <th>#</th>
                                    {{-- <th>image</th> --}}
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
                                        <td><input type="checkbox" name="selected[]" value="{{ $employee->id }}"
                                                class="box1"></td>

                                        <td>{{ $i }}</td>
                                        <td class="text-center">
                                                <img src="{{ asset('storage/assets/users/' . $employee->image) }}"
                                                    class="user-img" alt="user avatar"></br>
                                                <span class="badge p-2"
                                                    style="background-color:#23067a">{{ $employee ? $employee->firstName . ' ' . $employee->lastName : '' }}</span>
                                        </td>
                                        <td>{{ $employee->getAge() }}</td>
                                        {{-- <td>{{ $employee->getEmail() }}</td> --}}
                                        <td>{{ $employee->getPhone() }}</td>
                                        <td>{{ $employee->job->title }}</td>
                                        <td>{{ $employee->department->getName() }}</td>
                                        <td>{{ $employee->getFatteningDate() }}</td>
                                        <td>{{ $employee->deleted_at }}</td>
                                        <td>{{ $employee->getSalary() }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-outline-secondary dropdown-toggle btn-sm"
                                                    type="button" id="employeeActionsDropdown" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="employeeActionsDropdown">
                                                    <button class="dropdown-item" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#retrieveEmployeeModal{{ $employee->getId() }}">
                                                        <i class='bx bxs-archive me-0'></i> retrieve
                                                    </button>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.employees.show', $employee->getId()) }}">
                                                        <i class='bx bxs-show me-0'></i> Show
                                                    </a>
                                                    <button class="dropdown-item" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#deleteEmployeeModal{{ $employee->getId() }}">
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
                                    <div class="modal fade" id="retrieveEmployeeModal{{ $employee->getId() }}"
                                        tabindex="-1" aria-labelledby="retrieveEmployeeModalLabel{{ $employee->getId() }}"
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
                                                <form
                                                    action="{{ route('admin.archiveEmployees.update', $employee->getId()) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        Are you sure you want to retrieve this employee?
                                                        <input type="text" value="{{ $employee->getId() }}"
                                                            name="id" hidden>
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

    <!--end page wrapper -->
    {{-- delete all code  --}}
    <!-- The confirmation modal dialog box -->
    <div class="modal fade" id="confirm-delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
                    <button type="button" class="close" onclick="closeModal()"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete the selected Employees?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>

                    <button type="button" class="btn btn-danger" id="confirm-delete-btn">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirm-delete-modal1" tabindex="-1" role="dialog"
        aria-labelledby="confirm-delete-modal-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title" id="confirm-delete-modal-label">Confirm Delete</h4>
                    <button type="button" class="close" onclick="closeModal1()"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body bg-warning">
                    <p><strong>Please select at least one project to delete.</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal1()">Cancel</button>
                </div>
            </div>
        </div>
    </div>
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
    <script>
        function closeModal() {
            $('#confirm-delete-modal').modal('hide');
        }

        function closeModal1() {
            $('#confirm-delete-modal1').modal('hide');
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
        $('#delete-selected').click(function() {
            var ids = [];
            $('input[name="selected[]"]').each(function() {
                if (this.checked) {
                    ids.push($(this).val());
                    console.log(ids);
                }
            });

            if (ids.length == 0) {
                // Display the modal with the message
                $('#confirm-delete-modal1').modal('show');
            } else {
                // Show a confirmation modal dialog box
                $('#confirm-delete-modal').modal('show');
                $('#confirm-delete-modal').on('click', '#confirm-delete-btn', function() {
                    $.ajax({
                        url: '/admin/archiveEmp/deleteAll',
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            ids: JSON.stringify(ids)
                        },
                        success: function(response) {
                            console.log('Task status updated successfully');
                            console.log(response);
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.log('Error delete project: ' + error);
                        }
                    });
                });
            }
        });
    </script>
    <script>
        function CheckAll(className, select_all) {
            var elements = document.getElementsByClassName(className);
            var l = elements.length;
            if (select_all.checked) {
                for (var i = 0; i < l; i++) {
                    elements[i].checked = true;
                }
            } else {
                for (var i = 0; i < l; i++) {
                    elements[i].checked = false;
                }
            }
        }
    </script>
        @section('script')

        <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    paging: true,
                    buttons: ['copy','pdf','excel', 'colvis']

                });

                table.buttons().container()
                    .appendTo('#example_wrapper .col-md-6:eq(0)');
            });
        </script>

    @endsection

@endsection
