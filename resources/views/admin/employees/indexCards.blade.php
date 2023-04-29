@extends('layouts.admin')

@section('title', 'Employees')
@section('style')
<style>

 </style>
@endsection
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
            <!--end breadcrumb-->
            @include('layouts.notify')
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

                            <img src="{{ asset('storage/assets/users/' . $employee->image) }}"
                            class="img-fluid rounded-circle rounded card-img mx-auto" alt="..." style="height: 10rem;width:10rem">

                            <h4 class="text-center"> {{ $employee->getFirstName() }}
                                {{ $employee->getLastName() }}</h4>
                            <h4 class="text-center"><span class="badge bg-dark text-white ">{{ $employee->job->title }}</span></h4>
                            <div class="card-body">

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

                                        <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteEmployeeModal{{ $employee->getId() }}"> <i
                                                class='bx bxs-archive-in'></i>Archive
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
                                            Archive Employee</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to archive this employee?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('admin.employees.destroy', $employee->getId()) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-warning">Archive</button>
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
@endsection
