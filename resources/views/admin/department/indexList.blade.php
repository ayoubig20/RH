@extends('layouts.admin')

@section('title', 'Departement')

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
                            <li class="breadcrumb-item active" aria-current="page">Data Table Department</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!--end breadcrumb-->
            <div class="card">
                <div class="col-12">

                    <div class="text-center text-bold">
                        <h3 class="page-title"><strong>Department List
                            </strong></h3>
                    </div>
                </div>
                <div class="text-sm-end">
                    <div class="btn-group mb-3 d-none d-sm-inline-block">
                        <a href="{{ route('admin.department.index', ['view' => 'card']) }}" class="btn btn-muted"
                            style="{{ request()->get('view') == 'card' ? 'background-color: #6c757d;border-color: #6c757d;color: #fff;font-weight: bold;' : 'background-color: transparent;border-color: #6c757d;color: #6c757d;' }}"><i
                                class='bx bxs-grid-alt'></i></a>
                        <a href="{{ route('admin.department.index', ['view' => 'list']) }}" class="btn btn-muted"
                            style="{{ request()->get('view') != 'card' ? 'background-color: #6c757d;border-color: #6c757d;color: #fff;font-weight: bold;' : 'background-color: transparent;border-color: #6c757d;color: #6c757d;' }}"><i
                                class='bx bx-list-ul'></i></a>
                    </div>
                </div>
                @include('layouts.notify')
                <!-- Button trigger modal -->
                <button style="    color: #FFF;
                background-color: #4F46E5;" type="button" class="btn btn"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">add
                    Departement</button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">add Department</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="{{ route('admin.department.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="hidden" name="id" id="id" value="">
                                        <label for="name">Name department:</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    {{-- <button type="submit" class="btn btn-success">Submit</button> --}}

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center table-bordered mb-0 table-hover" id="exampl">
                            <thead class=" table-dark ">
                                <th>#</th>
                                <th>department name</th>
                                <th>department Head</th>
                                <th>Nombers of employees by department</th>
                                <th>description</th>
                                <th>Action</th>
                            </thead>
                            <tbody class="text-bold">
                                <?php
                                $pageNumber = $viewData['departments']->currentPage();
                                $resultsPerPage = $viewData['departments']->perPage();
                                $start = ($pageNumber - 1) * $resultsPerPage;
                                ?>
                                @foreach ($viewData['departments'] as $key => $department)
                                    <?php $i = $start + $key + 1; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $department->getName() }}</td>
                                    <td>
                                        @if ($department->employeeDepartmentHead)
                                            <a
                                                href="{{ route('admin.employees.show', $department->employeeDepartmentHead) }}"><img
                                                    src="{{ asset('storage/assets/users/' . $department->employeeDepartmentHead->image) }}"
                                                    class="user-img" alt="user avatar">
                                                <span class="badge bg-dark p-2">
                                                    {{ $department->employeeDepartmentHead->firstName . ' ' . $department->employeeDepartmentHead->lastName }}</span>
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td><strong>{{ $department->NumberOfEmployeesByDepartment($department->id) }}</strong>
                                    </td>
                                    <td>{{ substr($department->getDescription(), 0, 43) }}...</td>

                                    <td>
                                        <div class="d-flex flex-row">
                                            <button type="button" class="btn btn-outline-success btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editDepartment{{ $department->getId() }}">
                                                <i class="bx bxs-edit"></i> Edit
                                            </button>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editDepartment{{ $department->getId() }}"
                                                tabindex="-1" aria-labelledby="editDepartment{{ $department->getId() }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="editDepartment{{ $department->getId() }}">
                                                                Edit
                                                                Department</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form
                                                            action="{{ route('admin.department.update', $department->getId()) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="name"
                                                                        class="col-form-label">Name:</label>
                                                                    <input type="text" class="form-control"
                                                                        id="name" name="name"
                                                                        value="{{ $department->getName() }}" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="departmentHead"
                                                                        class="col-form-label">Department
                                                                        Head:</label>
                                                                    <select name="departmentHead" id="departmentHead"
                                                                        class="form-control">
                                                                        <option value="">Select Department Head
                                                                        </option>

                                                                        @foreach ($viewData['employees'] as $employee)
                                                                            <option value="{{ $employee->id }}"
                                                                                {{ $employee->id == $department->departmentHead ? 'selected' : '' }}>
                                                                                {{ $employee->firstName }}
                                                                                {{ $employee->lastName }}
                                                                            </option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="description"
                                                                        class="col-form-label">Description:</label>
                                                                    <textarea class="form-control" id="description" name="description">{{ $department->getDescription() }}</textarea>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteDepartement{{ $department->getId() }}">
                                                <i class="bx bxs-trash"></i> Delete
                                            </button>
                                            <div class="modal fade" id="deleteDepartement{{ $department->getId() }}"
                                                tabindex="-1" aria-labelledby="deleteDepartement" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="deleteDepartement{{ $department->getId() }}">
                                                                Confirm Delete Departement</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this Departement?</p>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" value="{{ $department->getName() }}"
                                                                readonly>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <form
                                                                action="{{ route('admin.department.destroy', $department->getId()) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <nav aria-label="departments">
                        {{ $viewData['departments']->links('vendor.pagination.bootstrap-4') }}
                    </nav>
                </div>

            @section('script')
                <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
                <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
                <script>
                    $(document).ready(function() {
                        var table = $('#example').DataTable({
                            paging: true,
                            pageLength: 5
                        });

                        table.buttons().container()
                            .appendTo('#example_wrapper .col-md-6:eq(0)');
                    });
                </script>

            @endsection
        @endsection
