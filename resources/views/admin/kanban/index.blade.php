@extends('layouts.admin')

@section('title', 'Kanban')

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
            <div class="col-12">
                <div class="text-center text-bold">
                    <h3 class="page-title"><strong>Kanban Tasks
                        </strong></h3>
                </div>
            </div>
            <div class="text-sm-end">
                <div class="btn-group mb-3">
                    <a href="{{ route('admin.tasks.index') }}"
                        class="btn btn-primary{{ !request()->has('status') && !request()->has('view') ? ' active' : '' }}"
                        style="{{ !request()->has('status') && !request()->has('view') ? 'background-color: #0d6efd;' : 'background-color: transparent;border-color: #0d6efd;color: #0d6efd;' }}">All</a>
                </div>
                <div class="btn-group mb-3 ms-1">
                    <a href="{{ route('admin.tasks.index', ['status' => 'to do']) }}" class="btn btn-light"
                        style="{{ request()->get('status') == 'to do' ? 'background-color: #0d6efd;border-color: #0d6efd;color: #fff;font-weight: bold;' : 'background-color: transparent;border-color: #0d6efd;color: #0d6efd;' }}">
                        To do</a>
                    <a href="{{ route('admin.tasks.index', ['status' => 'in_progress']) }}" class="btn btn-light"
                        style="{{ request()->get('status') == 'in_progress' ? 'background-color: #0d6efd;border-color: #0d6efd;color: #fff;font-weight: bold;' : 'background-color: transparent;border-color: #0d6efd;color: #0d6efd;' }}">In
                        Progress</a>
                    <a href="{{ route('admin.tasks.index', ['status' => 'done']) }}" class="btn btn-light"
                        style="{{ request()->get('status') == 'done' ? 'background-color: #0d6efd;border-color: #0d6efd;color: #fff;font-weight: bold;' : 'background-color: transparent;border-color: #0d6efd;color: #0d6efd;' }}">Done</a>
                </div>
                <div class="btn-group mb-3 d-none d-sm-inline-block">
                    <a href="{{ route('admin.tasks.index', ['view' => 'card']) }}" class="btn btn-muted"
                        style="{{ request()->get('view') == 'card' ? 'background-color: #6c757d;border-color: #6c757d;color: #fff;font-weight: bold;' : 'background-color: transparent;border-color: #6c757d;color: #6c757d;' }}"><i
                            class='bx bxs-grid-alt'></i></a>
                    <a href="{{ route('admin.tasks.index', ['view' => 'list']) }}" class="btn btn-muted"
                        style="{{ request()->get('view') != 'card' ? 'background-color: #6c757d;border-color: #6c757d;color: #fff;font-weight: bold;' : 'background-color: transparent;border-color: #6c757d;color: #6c757d;' }}"><i
                            class='bx bx-list-ul'></i></a>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        <button style="    color: #FFF;
                background-color: #4F46E5;" type="button" class="btn btn"
            data-bs-toggle="modal" data-bs-target="#exampleModal">add
            Task</button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">add Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="{{ route('admin.tasks.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="">
                                <label for="name">Name Tasks:</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="project_id">Project:</label>
                                <select name="project_id" id="project_id" class="form-control">
                                    <option value="">project refernce</option>

                                    @foreach ($viewData['projects'] as $project)
                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="assigned_to">Assigned To:</label>
                                <select name="assigned_to" id="assigned_to" class="form-control" required>
                                    <option value="">assigned_to</option>

                                    @foreach ($viewData['employees'] as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->firstName }}
                                            {{ $employee->lastName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select a Status</option>
                                    <option value="to do" selected class="text-light">To do</option>
                                    <option value="in progress" class="text-info">In progress</option>
                                    <option value="waiting" class="text-warning">Waiting</option>
                                    <option value="done" class="text-success">Done</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start Date:</label>
                                <input type="date" name="start_date" id="start_date" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="end_date">End Date:</label>
                                <input type="date" name="end_date" id="end_date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="priority">Priority</label>
                                <select class="form-control" id="priority" name="priority" required>
                                    <option value="">choice Priority</option>
                                    <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>
                                        high</option>
                                    <option value="Medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>
                                        Medium
                                    </option>
                                    <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>low
                                    </option>

                                </select>
                            </div>

                            @if ($errors->has('priority'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('priority') }}</strong>
                                </span>
                            @endif

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="col-md-4 float-start">
                    <div class="board">
                        <div class="tasks" data-plugin="dragula"
                            data-containers='["task-list-to do", "task-list-in progress", "task-list-done"]'>
                            <h4 class="card-header  task-header bg-secondary text-sm-center">To Do</h4>
                            <div id="task-list-to do" class="task-list-items ">
                                @if ($viewData['tasks']->where('status', 'to do')->isEmpty())
                                    <!-- Render an empty div when there are no tasks -->
                                    <div class="card ">
                                        <div class="card-body p-3">
                                            No tasks
                                        </div>
                                    </div>
                                @else
                                    @foreach ($viewData['tasks']->where('status', 'to do') as $task)
                                        <div class="card" data-task-id="{{ $task->id }} ">
                                            <div class="card-body p-3">
                                                <small
                                                    class="float-end text-muted">{{ $task->created_at->format('d M Y') }}</small>
                                                {{-- <span class="badge bg-danger">High</span> --}}
                                                @if ($task->priority == 'high')
                                                    <span class="badge bg-danger ">{{ $task->priority }}</span>
                                                @elseif ($task->priority == 'Medium')
                                                    <span class="badge bg-warning ">{{ $task->priority }}</span>
                                                @else
                                                    <span class="badge bg-info ">{{ $task->priority }}</span>
                                                @endif
                                                <h5 class="mt-2 mb-2">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#task-detail-modal"
                                                        class="text-body">{{ $task->name }}</a>
                                                </h5>
                                                <p class="mb-0">
                                                    <span class="badge bg-secondary">{{ ucfirst($task->status) }}</span>
                                                </p>
                                                <div class="dropdown float-end">
                                                    <a class="text-muted arrow-none dropdown-toggle" id="dropdownMenu2"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical font-18"></i>
                                                    </a>
                                                    <div class="dropdown-menu " aria-labelledby="dropdownMenu2">
                                                        <button type="button" class="dropdown-item"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editTask{{ $task->getId() }}">
                                                            <i class="bx bxs-edit"></i> Edit
                                                        </button>

                                                        <button type="button" class="dropdown-item"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteTask{{ $task->getId() }}">
                                                            <i class="bx bxs-trash"></i> Delete
                                                        </button>
                                                    </div>
                                                    <div class="modal fade" id="deleteTask{{ $task->getId() }}"
                                                        tabindex="-1" aria-labelledby="deleteTask" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="deleteTask{{ $task->getId() }}">
                                                                        Confirm Delete Task</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this Task?
                                                                    </p>
                                                                    <input type="text" class="form-control"
                                                                        id="name" name="name"
                                                                        value="{{ $task->getName() }}" readonly>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Cancel</button>
                                                                    <form
                                                                        action="{{ route('admin.tasks.destroy', $task->getId()) }}"
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
                                                <p class="mb-0">
                                                    @if ($task->employee)
                                                        <img src="{{ asset('storage/assets/users/' . $task->employee->image) }}"
                                                            class="user-img" alt="user avatar">
                                                    @endif
                                                    <span class="align-middle"><a
                                                            href="{{ route('admin.employees.show', $task->employee->getId()) }}"></a></span>
                                                    <span class="badge  p-2" style="background-color:#8971d0;">
                                                        {{ $task->employee ? $task->employee->firstName . ' ' . $task->employee->lastName : '' }}</span></a>

                                                </p>
                                                <p class="card-text"><strong>Description:</strong>
                                                    {{ $task->description }}
                                            </div>
                                        </div>
                                        <div class="modal fade" id="editTask{{ $task->getId() }}" tabindex="-1"
                                            aria-labelledby="editTask{{ $task->getId() }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editTask{{ $task->getId() }}">
                                                            Edit
                                                            Task</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('admin.tasks.update', $task->getId()) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name">Name:</label>
                                                                <input type="text" class="form-control" id="name"
                                                                    name="name" value="{{ $task->getName() }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="project_id">Project:</label>
                                                                <select name="project_id" id="project_id"
                                                                    class="form-control">
                                                                    <option value="">Select a project
                                                                    </option>

                                                                    @foreach ($viewData['projects'] as $project)
                                                                        <option value="{{ $project->id }}"
                                                                            {{ $task->project_id == $project->id ? 'selected' : '' }}>
                                                                            {{ $project->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="assigned_to">Assigned
                                                                    To:</label>
                                                                <select name="assigned_to" id="assigned_to"
                                                                    class="form-control" required>
                                                                    <option value="">Select an
                                                                        employee
                                                                    </option>

                                                                    @foreach ($viewData['employees'] as $employee)
                                                                        <option value="{{ $employee->id }}"
                                                                            {{ $task->assigned_to == $employee->id ? 'selected' : '' }}>
                                                                            {{ $employee->firstName }}
                                                                            {{ $employee->lastName }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="status">Status:</label>
                                                                <select name="status" id="status"
                                                                    class="form-control">
                                                                    <option value="">Select a Status
                                                                    </option>
                                                                    <option value="to do"
                                                                        {{ old('status', $task->status) == 'to do' ? 'selected' : '' }}
                                                                        class="text-info">To do</option>
                                                                    <option value="in progress"
                                                                        {{ old('status', $task->status) == 'in progress' ? 'selected' : '' }}
                                                                        class="text-primary">In progress
                                                                    </option>
                                                                    <option value="done"
                                                                        {{ old('status', $task->status) == 'done' ? 'selected' : '' }}
                                                                        class="text-success">Done</option>
                                                                    <option value="cancelled"
                                                                        {{ old('status', $task->status) == 'cancelled' ? 'selected' : '' }}
                                                                        class="text-danger">Cancelled
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="start_date">Start Date:</label>
                                                                <input type="date" name="start_date" id="start_date"
                                                                    class="form-control"
                                                                    value="{{ old('start_date', $task->start_date->format('Y-m-d')) }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="end_date">End Date:</label>
                                                                <input type="date" name="end_date" id="end_date"
                                                                    class="form-control"
                                                                    value="{{ old('end_date', $task->end_date->format('Y-m-d')) }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="priority">Priority</label>
                                                                <select class="form-control" id="priority"
                                                                    name="priority" required>
                                                                    <option value="">choice Priority
                                                                    </option>
                                                                    <option value="high"
                                                                        {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>
                                                                        high</option>
                                                                    <option value="Medium"
                                                                        {{ old('priority', $task->priority) == 'Medium' ? 'selected' : '' }}>
                                                                        Medium
                                                                    </option>
                                                                    <option value="low"
                                                                        {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>
                                                                        low
                                                                    </option>

                                                                </select>
                                                            </div>

                                                            @if ($errors->has('priority'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('priority') }}</strong>
                                                                </span>
                                                            @endif

                                                            <div class="form-group">
                                                                <label for="description">Description:</label>
                                                                <textarea class="form-control" id="description" name="description">{{ $task->getDescription() }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-success">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tasks" data-plugin="dragula"
                    data-containers='["task-list-to do", "task-list-in progress", "task-list-done"]'>
                    <div class="col-md-4 float-start ">
                        <h4 class="card-header task-header bg-info text-center">In progress</h4>
                        <div id="task-list-in progress" class="task-list-items ">
                            @if ($viewData['tasks']->where('status', 'in progress')->isEmpty())
                                <!-- Render an empty div when there are no tasks -->
                                <div class="card">
                                    <div class="card-body">
                                        No tasks
                                    </div>
                                </div>
                            @else
                                @foreach ($viewData['tasks']->where('status', 'in progress') as $task)
                                    <div class="card" data-task-id="{{ $task->id }}">
                                        <div class="card-body ">
                                            <small
                                                class="float-end text-muted">{{ $task->created_at->format('d M Y') }}</small>
                                            @if ($task->priority == 'high')
                                                <span class="badge bg-danger ">{{ $task->priority }}</span>
                                            @elseif ($task->priority == 'Medium')
                                                <span class="badge bg-warning ">{{ $task->priority }}</span>
                                            @else
                                                <span class="badge bg-info ">{{ $task->priority }}</span>
                                            @endif
                                            <h5 class="mt-2 mb-2">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#task-detail-modal"
                                                    class="text-body">{{ $task->name }}</a>
                                            </h5>
                                            <p class="mb-0">
                                                <span class="badge bg-info">{{ ucfirst($task->status) }}</span>
                                            </p>
                                            <div class="dropdown float-end">
                                                <a class="text-muted arrow-none dropdown-toggle" id="dropdownMenu2"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical font-18"></i>
                                                </a>
                                                <div class="dropdown-menu " aria-labelledby="dropdownMenu2">
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#editTask{{ $task->getId() }}">
                                                        <i class="bx bxs-edit"></i> Edit
                                                    </button>

                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#deleteTask{{ $task->getId() }}">
                                                        <i class="bx bxs-trash"></i> Delete
                                                    </button>

                                                </div>
                                                <div class="modal fade" id="deleteTask{{ $task->getId() }}"
                                                    tabindex="-1" aria-labelledby="deleteTask" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="deleteTask{{ $task->getId() }}">
                                                                    Confirm Delete Task</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this Task?
                                                                </p>
                                                                <input type="text" class="form-control" id="name"
                                                                    name="name" value="{{ $task->getName() }}"
                                                                    readonly>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <form
                                                                    action="{{ route('admin.tasks.destroy', $task->getId()) }}"
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
                                            <p class="mb-0">
                                                @if ($task->employee)
                                                    <img src="{{ asset('storage/assets/users/' . $task->employee->image) }}"
                                                        class="user-img" alt="user avatar">
                                                @endif
                                                <span class="align-middle"><a
                                                        href="{{ route('admin.employees.show', $task->employee->getId()) }}"></a></span>
                                                <span class="badge  p-2" style="background-color:#8971d0;">
                                                    {{ $task->employee ? $task->employee->firstName . ' ' . $task->employee->lastName : '' }}</span></a>

                                            </p>
                                            <p class="card-text"><strong>Description:</strong>
                                                {{ $task->description }}
                                        </div>
                                    </div>
                                    <div class="modal fade" id="editTask{{ $task->getId() }}" tabindex="-1"
                                        aria-labelledby="editTask{{ $task->getId() }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editTask{{ $task->getId() }}">
                                                        Edit
                                                        Task</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('admin.tasks.update', $task->getId()) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="name">Name:</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" value="{{ $task->getName() }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="project_id">Project:</label>
                                                            <select name="project_id" id="project_id"
                                                                class="form-control">
                                                                <option value="">Select a project
                                                                </option>

                                                                @foreach ($viewData['projects'] as $project)
                                                                    <option value="{{ $project->id }}"
                                                                        {{ $task->project_id == $project->id ? 'selected' : '' }}>
                                                                        {{ $project->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="assigned_to">Assigned
                                                                To:</label>
                                                            <select name="assigned_to" id="assigned_to"
                                                                class="form-control" required>
                                                                <option value="">Select an
                                                                    employee
                                                                </option>

                                                                @foreach ($viewData['employees'] as $employee)
                                                                    <option value="{{ $employee->id }}"
                                                                        {{ $task->assigned_to == $employee->id ? 'selected' : '' }}>
                                                                        {{ $employee->firstName }}
                                                                        {{ $employee->lastName }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="status">Status:</label>
                                                            <select name="status" id="status" class="form-control">
                                                                <option value="">Select a Status
                                                                </option>
                                                                <option value="to do"
                                                                    {{ old('status', $task->status) == 'to do' ? 'selected' : '' }}
                                                                    class="text-info">To do</option>
                                                                <option value="in progress"
                                                                    {{ old('status', $task->status) == 'in progress' ? 'selected' : '' }}
                                                                    class="text-primary">In progress
                                                                </option>
                                                                <option value="done"
                                                                    {{ old('status', $task->status) == 'done' ? 'selected' : '' }}
                                                                    class="text-success">Done</option>
                                                                <option value="cancelled"
                                                                    {{ old('status', $task->status) == 'cancelled' ? 'selected' : '' }}
                                                                    class="text-danger">Cancelled
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="start_date">Start Date:</label>
                                                            <input type="date" name="start_date" id="start_date"
                                                                class="form-control"
                                                                value="{{ old('start_date', $task->start_date->format('Y-m-d')) }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="end_date">End Date:</label>
                                                            <input type="date" name="end_date" id="end_date"
                                                                class="form-control"
                                                                value="{{ old('end_date', $task->end_date->format('Y-m-d')) }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="priority">Priority</label>
                                                            <select class="form-control" id="priority" name="priority"
                                                                required>
                                                                <option value="">choice Priority
                                                                </option>
                                                                <option value="high"
                                                                    {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>
                                                                    high</option>
                                                                <option value="Medium"
                                                                    {{ old('priority', $task->priority) == 'Medium' ? 'selected' : '' }}>
                                                                    Medium
                                                                </option>
                                                                <option value="low"
                                                                    {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>
                                                                    low
                                                                </option>

                                                            </select>
                                                        </div>

                                                        @if ($errors->has('priority'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('priority') }}</strong>
                                                            </span>
                                                        @endif

                                                        <div class="form-group">
                                                            <label for="description">Description:</label>
                                                            <textarea class="form-control" id="description" name="description">{{ $task->getDescription() }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-success">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="tasks" data-plugin="dragula"
                    data-containers='["task-list-to do", "task-list-in progress", "task-list-done"]'>
                    <div class="col-md-4 float-start">
                        <h4 class="card-header  task-header bg-success text-center">Done</h4>
                        <div id="task-list-done" class="task-list-items">
                            @if ($viewData['tasks']->where('status', 'done')->isEmpty())
                                <!-- Render an empty div when there are no tasks -->
                                <div class="card ms-2">
                                    <div class="card-body p-3">
                                        No tasks
                                    </div>
                                </div>
                            @else
                                @foreach ($viewData['tasks']->where('status', 'done') as $task)
                                    <div class="card" data-task-id="{{ $task->id }}">
                                        <div class="card-body ">
                                            <small
                                                class="float-end text-muted">{{ $task->created_at->format('d M Y') }}</small>
                                            @if ($task->priority == 'high')
                                                <span class="badge bg-danger ">{{ $task->priority }}</span>
                                            @elseif ($task->priority == 'Medium')
                                                <span class="badge bg-warning ">{{ $task->priority }}</span>
                                            @else
                                                <span class="badge bg-info ">{{ $task->priority }}</span>
                                            @endif
                                            <h5 class="mt-2 mb-2">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#task-detail-modal"
                                                    class="text-body">{{ $task->name }}</a>
                                            </h5>
                                            <p class="mb-0">
                                                <span class="badge bg-success">{{ ucfirst($task->status) }}</span>
                                            </p>
                                            <div class="dropdown float-end">
                                                <a class="text-muted arrow-none dropdown-toggle" id="dropdownMenu2"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical font-18"></i>
                                                </a>
                                                <div class="dropdown-menu " aria-labelledby="dropdownMenu2">
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#editTask{{ $task->getId() }}">
                                                        <i class="bx bxs-edit"></i> Edit
                                                    </button>

                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#deleteTask{{ $task->getId() }}">
                                                        <i class="bx bxs-trash"></i> Delete
                                                    </button>
                                                </div>
                                                <div class="modal fade" id="deleteTask{{ $task->getId() }}"
                                                    tabindex="-1" aria-labelledby="deleteTask" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="deleteTask{{ $task->getId() }}">
                                                                    Confirm Delete Task</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this Task?
                                                                </p>
                                                                <input type="text" class="form-control" id="name"
                                                                    name="name" value="{{ $task->getName() }}"
                                                                    readonly>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <form
                                                                    action="{{ route('admin.tasks.destroy', $task->getId()) }}"
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

                                            <p class="mb-0">
                                                @if ($task->employee)
                                                    <img src="{{ asset('storage/assets/users/' . $task->employee->image) }}"
                                                        class="user-img" alt="user avatar">
                                                @endif
                                                <span class="align-middle"><a
                                                        href="{{ route('admin.employees.show', $task->employee->getId()) }}"></a></span>
                                                <span class="badge  p-2" style="background-color:#8971d0;">
                                                    {{ $task->employee ? $task->employee->firstName . ' ' . $task->employee->lastName : '' }}</span></a>

                                            </p>
                                            <p class="card-text"><strong>Description:</strong>
                                                {{ $task->description }}
                                        </div>
                                    </div>
                                    <div class="modal fade" id="editTask{{ $task->getId() }}" tabindex="-1"
                                        aria-labelledby="editTask{{ $task->getId() }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editTask{{ $task->getId() }}">
                                                        Edit
                                                        Task</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('admin.tasks.update', $task->getId()) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="name">Name:</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" value="{{ $task->getName() }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="project_id">Project:</label>
                                                            <select name="project_id" id="project_id"
                                                                class="form-control">
                                                                <option value="">Select a project
                                                                </option>

                                                                @foreach ($viewData['projects'] as $project)
                                                                    <option value="{{ $project->id }}"
                                                                        {{ $task->project_id == $project->id ? 'selected' : '' }}>
                                                                        {{ $project->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="assigned_to">Assigned
                                                                To:</label>
                                                            <select name="assigned_to" id="assigned_to"
                                                                class="form-control" required>
                                                                <option value="">Select an
                                                                    employee
                                                                </option>

                                                                @foreach ($viewData['employees'] as $employee)
                                                                    <option value="{{ $employee->id }}"
                                                                        {{ $task->assigned_to == $employee->id ? 'selected' : '' }}>
                                                                        {{ $employee->firstName }}
                                                                        {{ $employee->lastName }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="status">Status:</label>
                                                            <select name="status" id="status" class="form-control">
                                                                <option value="">Select a Status
                                                                </option>
                                                                <option value="to do"
                                                                    {{ old('status', $task->status) == 'to do' ? 'selected' : '' }}
                                                                    class="text-info">To do</option>
                                                                <option value="in progress"
                                                                    {{ old('status', $task->status) == 'in progress' ? 'selected' : '' }}
                                                                    class="text-primary">In progress
                                                                </option>
                                                                <option value="done"
                                                                    {{ old('status', $task->status) == 'done' ? 'selected' : '' }}
                                                                    class="text-success">Done</option>
                                                                <option value="cancelled"
                                                                    {{ old('status', $task->status) == 'cancelled' ? 'selected' : '' }}
                                                                    class="text-danger">Cancelled
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="start_date">Start Date:</label>
                                                            <input type="date" name="start_date" id="start_date"
                                                                class="form-control"
                                                                value="{{ old('start_date', $task->start_date->format('Y-m-d')) }}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="end_date">End Date:</label>
                                                            <input type="date" name="end_date" id="end_date"
                                                                class="form-control"
                                                                value="{{ old('end_date', $task->end_date->format('Y-m-d')) }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="priority">Priority</label>
                                                            <select class="form-control" id="priority" name="priority"
                                                                required>
                                                                <option value="">choice Priority
                                                                </option>
                                                                <option value="high"
                                                                    {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>
                                                                    high</option>
                                                                <option value="Medium"
                                                                    {{ old('priority', $task->priority) == 'Medium' ? 'selected' : '' }}>
                                                                    Medium
                                                                </option>
                                                                <option value="low"
                                                                    {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>
                                                                    low
                                                                </option>

                                                            </select>
                                                        </div>

                                                        @if ($errors->has('priority'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('priority') }}</strong>
                                                            </span>
                                                        @endif

                                                        <div class="form-group">
                                                            <label for="description">Description:</label>
                                                            <textarea class="form-control" id="description" name="description">{{ $task->getDescription() }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-success">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    </div>

    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <!-- dragula js-->
    <script src="{{ asset('assets/vendor/dragula/dragula.min.js') }}"></script>
    <!-- demo js -->
    <script src="{{ asset('assets/js/ui/component.dragula.js') }}"></script>

    <script>
        $(document).on('click', '.dropdown-menu', function(e) {
            e.stopPropagation();
        });

        $(document).on('click', '.dropdown-toggle', function(e) {
            var $el = $(this);
            var $parent = $(this).offsetParent(".dropdown-menu");
            $(this).parent("li").toggleClass('open');

            if (!$parent.parent().hasClass('navbar-nav')) {
                if ($parent.hasClass('show')) {
                    $parent.removeClass('show');
                    $el.next().removeClass('show');
                    $el.next().css({
                        "top": -999,
                        "left": -999
                    });
                } else {
                    $parent.parent().find('.show').removeClass('show');
                    $parent.addClass('show');
                    $el.next().addClass('show');
                    $el.next().css({
                        "top": $el[0].offsetTop,
                        "left": $parent.outerWidth() - 4
                    });
                }
                e.preventDefault();
                e.stopPropagation();
            }
        });
    </script>
    <script>
        $(function() {
            // Initialize dragula containers
            var drake = dragula($('.task-list-items').toArray(), {
                revertOnSpill: true
            });

            // Add event listener for "drop" event on each container
            drake.on('drop', function(el, target, source, sibling) {
                // Get the task ID and new status after a drop event
                var taskId = $(el).data('task-id');
                var status = target.id.replace('task-list-', '');
                console.log(taskId);
                console.log(status);
                // Send an AJAX request to update the task status in the database
                $.ajax({
                    url: '/admin/tasks/' + taskId + '/status',
                    type: 'PUT',
                    data: {
                        status: status
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        location.reload();
                        // console.log('Task status updated successfully');
                        // console.log(response);

                    },
                    error: function(xhr, status, error) {
                        console.log('Error updating task status: ' + error);

                    }
                });
            });
        });
    </script>


@endsection
