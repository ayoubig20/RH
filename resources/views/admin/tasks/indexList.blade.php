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

                <!-- Button trigger modal -->
                <button style="    color: #FFF;
                background-color: #4F46E5;" type="button" class="btn btn"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">add
                    Task</button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">add Task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
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
                                            <option value="Medium" {{ old('priority') == 'Medium' ? 'selected' : '' }}>
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
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>#</th>
                            <th>Name</th>
                            {{-- <th>Description</th> --}}
                            <th>Image</th>
                            <th>Assigned To</th>
                            <th>Project</th>
                            <th>Priority</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>status</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($viewData['tasks'] as $task)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $task->name }}</td>
                                    {{-- <td>{{ $task->description }}</td> --}}
                                    <td>
                                        @if ($task->employee)
                                            <img src="{{ asset('storage/assets/users/' . $task->employee->image) }}"
                                                class="user-img" alt="user avatar">
                                        @endif
                                    </td>
                                    <td>{{ $task->employee ? $task->employee->firstName . ' ' . $task->employee->lastName : '' }}
                                    </td>

                                    <td>{{ $task->getProject()->name }}</td>
                                    <td style="padding: 5px;">
                                        @if ($task->priority == 'high')
                                            <span class="badge bg-danger ">{{ $task->priority }}</span>
                                        @elseif ($task->priority == 'Medium')
                                            <span class="badge bg-warning ">{{ $task->priority }}</span>
                                        @else
                                            <span class="badge bg-info ">{{ $task->priority }}</span>
                                        @endif
                                    </td>

                                    <td>{{ $task->start_date->format('Y-m-d') }}</td>
                                    <td>{{ $task->end_date->format('Y-m-d') }}</td>

                                    <td
                                        class="{{ $task->status === 'to do' ? 'text-info text-center' : ($task->status === 'in progress' ? 'text-primary text-center' : ($task->status === 'waiting' ? 'text-warning text-center' : ($task->status === 'done' ? 'text-success text-center' : 'text-danger text-center'))) }}">
                                        {{ $task->status }}</td>
                                    <td>
                                        <div class="d-flex flex-row">
                                            <button type="button" class="btn btn-outline-success btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#editTask{{ $task->getId() }}">
                                                <i class="bx bxs-edit"></i> Edit
                                            </button>
                                            <div class="modal fade" id="editTask{{ $task->getId() }}" tabindex="-1"
                                                aria-labelledby="editTask{{ $task->getId() }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editTask{{ $task->getId() }}">
                                                                Edit
                                                                Task</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('admin.tasks.update', $task->getId()) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="name">Name:</label>
                                                                    <input type="text" class="form-control"
                                                                        id="name" name="name"
                                                                        value="{{ $task->getName() }}" required>
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
                                                                    <label for="assigned_to">Assigned To:</label>
                                                                    <select name="assigned_to" id="assigned_to"
                                                                        class="form-control" required>
                                                                        <option value="">Select an employee
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
                                                                        <option value="">Select a Status</option>
                                                                        <option value="to do"
                                                                            {{ old('status', $task->status) == 'to do' ? 'selected' : '' }}
                                                                            class="text-info">To do</option>
                                                                        <option value="in progress"
                                                                            {{ old('status', $task->status) == 'in progress' ? 'selected' : '' }}
                                                                            class="text-primary">In progress</option>
                                                                        <option value="done"
                                                                            {{ old('status', $task->status) == 'done' ? 'selected' : '' }}
                                                                            class="text-success">Done</option>
                                                                        <option value="cancelled"
                                                                            {{ old('status', $task->status) == 'cancelled' ? 'selected' : '' }}
                                                                            class="text-danger">Cancelled</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="start_date">Start Date:</label>
                                                                    <input type="date" name="start_date"
                                                                        id="start_date" class="form-control"
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
                                                                        <option value="">choice Priority</option>
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

                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#deleteTask{{ $task->getId() }}">
                                                <i class="bx bxs-trash"></i> Delete
                                            </button>
                                            <div class="modal fade" id="deleteTask{{ $task->getId() }}" tabindex="-1"
                                                aria-labelledby="deleteTask" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteTask{{ $task->getId() }}">
                                                                Confirm Delete Task</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this Task?</p>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" value="{{ $task->getName() }}" readonly>
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
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Show notification function
        function showNotification(message, type) {
            // Get the notification element
            var notification = document.getElementById("notification");

            // Set the message and type
            notification.innerHTML = message;
            notification.classList.add(type);

            // Show the notification for 3 seconds
            setTimeout(function() {
                notification.innerHTML = "";
                notification.classList.remove(type);
            }, 3000);
        }
    </script>


@endsection
