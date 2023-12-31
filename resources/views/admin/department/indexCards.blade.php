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
                            <li class="breadcrumb-item active" aria-current="page">Data Cards Departments</li>
                        </ol>
                    </nav>
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
            <!--end breadcrumb-->
            @include('layouts.notify')
            <!-- Button trigger modal -->
            @can('add-Department')
                <button style="color: #FFF; background-color: #4F46E5;" type="button" class="btn btn-primary"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">Add Department</button>
            @endcan


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.department.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input type="hidden" name="id" id="id" value="">
                                    <label for="name" class="form-label">Name department:</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description:</label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header display-flex text-center">
                    <h3>Departments List Cards</h3>
                </div>
                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
                    @foreach ($viewData['departments'] as $department)
                        <div class="col mb-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <h4 class="card-title"><strong>{{ $department->getName() }}</strong></h4>
                                    <h6>Department Head:</h6>
                                    <div class="d-flex flex-column align-items-center">
                                        @if ($department->employeeDepartmentHead)
                                            <a
                                                href="{{ route('admin.employees.show', $department->employeeDepartmentHead) }}">
                                                <img src="{{ asset('storage/assets/users/' . $department->employeeDepartmentHead->image) }}"
                                                    alt="Profile Picture" width="150"
                                                    class="img-thumbnail rounded-circle">
                                                </br>
                                                <span
                                                    class="badge p-2"style="background-color:#8971d0">{{ $department->employeeDepartmentHead->firstName . ' ' . $department->employeeDepartmentHead->lastName }}</span>
                                            </a>
                                            {{-- <strong>{{ $department->employeeDepartmentHead->firstName . ' ' . $department->employeeDepartmentHead->lastName }}</strong> --}}
                                        @else
                                            <span class="badge p-2" style="background-color:#8971d0"><strong>N/A</strong>
                                            </span>
                                        @endif
                                        </br>
                                        <h6>Number of
                                            employees:</br><strong>{{ $department->NumberOfEmployeesByDepartment($department->id) }}</strong>
                                        </h6>
                                    </div>


                                    <div class="row">
                                        <div class="col">
                                            @can('edit-Department')
                                                <button type="button" class="btn btn-outline-success btn-sm me-2"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editDepartment{{ $department->getId() }}">
                                                    <i class="bx bxs-edit"></i> Edit
                                                </button>
                                            @endcan

                                            @can('delete-Department')
                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteDepartmentModal{{ $department->getId() }}"> <i
                                                        class='bx bxs-trash'></i>Delete
                                                </button>
                                            @endcan

                                        </div>
                                    </div>
                                    <div class="d-flex flex-row justify-content-center mt-3">

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editDepartment{{ $department->getId() }}"
                                            tabindex="-1" aria-labelledby="editDepartment{{ $department->getId() }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="editDepartment{{ $department->getId() }}">Edit
                                                            Department</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form
                                                        action="{{ route('admin.department.update', $department->getId()) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name" class="col-form-label">Name:</label>
                                                                <input type="text" class="form-control" id="name"
                                                                    name="name" value="{{ $department->getName() }}"
                                                                    required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="departmentHead"
                                                                    class="col-form-label">Department Head:</label>
                                                                <select name="departmentHead" id="departmentHead"
                                                                    class="form-control">
                                                                    <option value="">Select Department Head</option>

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
                                        {{-- delete Modal --}}
                                        <div class="modal fade" id="deleteDepartmentModal{{ $department->getId() }}"
                                            tabindex="-1"
                                            aria-labelledby="deleteDepatmentModalLabel{{ $department->getId() }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="deleteDepatmentModalLabel{{ $department->getId() }}">
                                                            Delete Department</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want
                                                            to delete this
                                                            Department?</p>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" value="{{ $department->name }}" readonly>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <form
                                                            action="{{ route('admin.department.destroy', $department->getId()) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal content -->
                                        {{-- <form action="{{ route('admin.department.destroy', $department->getId()) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <i class="bx bxs-trash"></i> Delete
                                                </button>
                                            </div>
                                        </form> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    <nav aria-label="departments">
                        {{ $viewData['departments']->appends(['view' => 'card'])->links('vendor.pagination.bootstrap-4') }}
                    </nav>
                </div>
            </div>
        </div>
        <!--end page-content-->
    </div>
    <!--end page-wrapper-->
@endsection
