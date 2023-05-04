@extends('layouts.employee')
@section('title', 'Employee Details')
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
                            <li class="breadcrumb-item"><a href="{{ route('employee.home.index') }}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Employee</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <!--employee details section-->
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-bold">
                            <h3 class="page-title"><strong>Empolyee
                                    Profile</strong></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="mb-0">Employee Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Name:</strong> {{ $employee->firstName }} {{ $employee->lastName }}</p>
                                        <p><strong>Email:</strong> {{ $employee->email }}</p>
                                        <p><strong>Phone:</strong> {{ $employee->phone }}</p>
                                        <p><strong>Gender:</strong> {{ $employee->gender }}</p>
                                        <p><strong>Date of Birth:</strong> {{ $employee->DateOfBirth }}</p>
                                        <p><strong>Marital Status:</strong> {{ $employee->martialStatus }}</p>
                                        <p><strong>Fattening Date:</strong>{{ $employee->fatteningDate }}</p>
                                        <p><strong>Employee status:</strong>{{ $employee->status }}</p>
                                        <p><strong>Address:</strong> {{ $employee->address }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <img src="{{ asset('storage/assets/users/' . $employee->image) }}"
                                            alt="Profile Picture" width="200" class="img-thumbnail rounded-circle">
                                        {{-- <img src="{{ asset('storage/images/' . $employee->image) }}" alt="Profile Picture"
                                        width="200"> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-secondary text-white">
                                <h3 class="mb-0">Assigned Tasks</h3>
                            </div>
                            <div class="card-body">
                                @if ($employee->tasks && $employee->tasks->count() > 0)
                                    <ul class="list-group">
                                        @php
                                            $toDoCount = 0;
                                            $inProgressCount = 0;
                                            $doneCount = 0;
                                        @endphp
                                        @foreach ($employee->tasks as $task)
                                            @if ($task->status == 'to do')
                                                @php $toDoCount++; @endphp
                                                <li class="list-group-item list-group-item-danger">{{ $task->name }} -
                                                    {{ $task->status }}</li>
                                            @elseif ($task->status == 'in progress')
                                                @php $inProgressCount++; @endphp
                                                <li class="list-group-item list-group-item-warning">{{ $task->name }} -
                                                    {{ $task->status }}</li>
                                            @elseif ($task->status == 'done')
                                                @php $doneCount++; @endphp
                                                <li class="list-group-item list-group-item-success">{{ $task->name }} -
                                                    {{ $task->status }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <p><strong> Total tasks:</strong> {{ $employee->tasks->count() }}</p>
                                    <p><strong>To do:</strong> <span class="badge bg-danger">{{ $toDoCount }}</span></p>
                                    <p><strong>In progress: </strong><span
                                            class="badge bg-warning text-dark">{{ $inProgressCount }}</span></p>
                                    <p><strong>Done: </strong><span class="badge bg-success">{{ $doneCount }}</span></p>
                                @else
                                    <p>No tasks assigned.</p>
                                @endif
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header bg-info text-white">
                                <h3 class="mb-0">Assigned Projects</h3>
                            </div>
                            <div class="card-body">
                                @if ($employee->projects->count() > 0)
                                    <ul class="list-group">
                                        @foreach ($employee->projects->unique('id') as $project)
                                            <li>{{ $project->name }}</li>
                                        @endforeach
                                    </ul>
                                    <p><strong>Total projects:</strong> {{ $employee->projects->unique('id')->count() }}
                                    </p>
                                @else
                                    <p><strong>No projects assigned.</strong></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--end employee details section-->
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection
