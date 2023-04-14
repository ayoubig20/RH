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
                                    <label for="description">Description:</label>
                                    <textarea name="description" id="description" cols="10" rows="10" class="form-control"></textarea>
                                </div>
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
        </div>
        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="col-md-4 float-start">
                        <div class="board">
                            <div class="tasks" data-plugin="dragula"
                                data-containers='["task-list-one", "task-list-two", "task-list-three"]'>
                                <h4 class="card-header  task-header bg-primary">To Do</h4>
                                <div id="task-list-one" class="task-list-items">
                                    @foreach ($viewData['tasks']->where('status', 'to do') as $task)
                                        <div class="card ms-2">
                                            <div class="card-body p-3">
                                                <small
                                                    class="float-end text-muted">{{ $task->created_at->format('d M Y') }}</small>
                                                <span class="badge bg-danger">High</span>

                                                <h5 class="mt-2 mb-2">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#task-detail-modal"
                                                        class="text-body">{{ $task->name }}</a>
                                                </h5>
                                                <p class="mb-0">
                                                    <span class="badge bg-secondary">{{ ucfirst($task->status) }}</span>
                                                </p>

                                                <div class="dropdown float-end">
                                                    <a href="#" class="dropdown-toggle text-muted arrow-none"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="mdi mdi-dots-vertical font-18"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                                class="mdi mdi-pencil me-1"></i>Edit</a>
                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item"><i
                                                                class="mdi mdi-delete me-1"></i>Delete</a>

                                                    </div>
                                                </div>
                                                <p class="mb-0">
                                                    @if ($task->employee)
                                                        <img src="{{ asset('storage/assets/users/' . $task->employee->image) }}"
                                                            class="user-img" alt="user avatar">
                                                    @endif
                                                    <span
                                                        class="align-middle">{{ $task->employee ? $task->employee->firstName . ' ' . $task->employee->lastName : '' }}</span>
                                                </p>
                                                <p class="card-text"><strong>Description:</strong>
                                                    {{ $task->description }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="tasks" data-plugin="dragula"
                        data-containers='["task-list-one", "task-list-two", "task-list-three"]'>
                        <div class="col-md-4 float-start">
                            <h4 class="card-header  task-header bg-warning">In progress</h4>
                            <div id="task-list-two" class="task-list-items">
                                @foreach ($viewData['tasks']->where('status', 'in progress') as $task)
                                    <div class="card  ms-2">
                                        <div class="card-body p-3">
                                            <small
                                                class="float-end text-muted">{{ $task->created_at->format('d M Y') }}</small>
                                            <span class="badge bg-danger">High</span>

                                            <h5 class="mt-2 mb-2">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#task-detail-modal"
                                                    class="text-body">{{ $task->name }}</a>
                                            </h5>
                                            <p class="mb-0">
                                                <span class="badge bg-warning">{{ ucfirst($task->status) }}</span>
                                            </p>

                                            <div class="dropdown float-end">
                                                <a href="#" class="dropdown-toggle text-muted arrow-none"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical font-18"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- item-->
                                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                                            class="mdi mdi-pencil me-1"></i>Edit</a>
                                                    <!-- item-->
                                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                                            class="mdi mdi-delete me-1"></i>Delete</a>

                                                </div>
                                            </div>
                                            <p class="mb-0">
                                                @if ($task->employee)
                                                    <img src="{{ asset('storage/assets/users/' . $task->employee->image) }}"
                                                        class="user-img" alt="user avatar">
                                                @endif
                                                <span
                                                    class="align-middle">{{ $task->employee ? $task->employee->firstName . ' ' . $task->employee->lastName : '' }}</span>
                                            </p>
                                            <p class="card-text"><strong>Description:</strong>
                                                {{ $task->description }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tasks" data-plugin="dragula"
                    data-containers='["task-list-one", "task-list-two", "task-list-three"]'>
                    <div class="col-md-4 float-start">
                        <h4 class="card-header  task-header bg-success">Done</h4>
                        <div id="task-list-three" class="task-list-items">
                            @foreach ($viewData['tasks']->where('status', 'done') as $task)
                                <div class="card ms-2">
                                    <div class="card-body p-3">
                                        <small
                                            class="float-end text-muted">{{ $task->created_at->format('d M Y') }}</small>
                                        <span class="badge bg-danger">High</span>

                                        <h5 class="mt-2 mb-2">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#task-detail-modal"
                                                class="text-body">{{ $task->name }}</a>
                                        </h5>
                                        <p class="mb-0">
                                            <span class="badge bg-success">{{ ucfirst($task->status) }}</span>
                                        </p>

                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle text-muted arrow-none"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical font-18"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item"><i
                                                        class="mdi mdi-pencil me-1"></i>Edit</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item"><i
                                                        class="mdi mdi-delete me-1"></i>Delete</a>

                                            </div>
                                        </div>
                                        <p class="mb-0">
                                            @if ($task->employee)
                                                <img src="{{ asset('storage/assets/users/' . $task->employee->image) }}"
                                                    class="user-img" alt="user avatar">
                                            @endif
                                            <span
                                                class="align-middle">{{ $task->employee ? $task->employee->firstName . ' ' . $task->employee->lastName : '' }}</span>
                                        </p>
                                        <p class="card-text"><strong>Description:</strong>
                                            {{ $task->description }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>

    </div>

    <script>
                    $(document).ready(function() {
                        $('.dropdown-toggle').on('click', function(e) {
                            e.preventDefault();
                            var menu = $(this).next('.dropdown-menu');
                            menu.toggleClass('show');
                        });
                    });
                </script>
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <!-- dragula js-->
    <script src="{{ asset('assets/vendor/dragula/dragula.min.js') }}"></script>

    <!-- demo js -->
    <script src="{{ asset('assets/js/ui/component.dragula.js') }}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/dragula/3.6.6/dragula.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/dragula/3.6.6/dragula.css'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/dragula/3.6.6/dragula.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/dragula/3.6.6/dragula.min.css'></script>
    <script>
        // Initialize drag and drop
        dragula([].slice.apply(document.querySelectorAll('.tasks')), {
            isContainer: function(el) {
                return true; // only elements in drake.containers will be taken into account
            },
            moves: function(el, source, handle, sibling) {
                return true; // elements are always draggable by default
            },
            accepts: function(el, target, source, sibling) {
                return true; // elements can be dropped in any container by default
            },
            invalid: function(el, handle) {
                return true; // don't prevent any drags from initiating by default
            },
            direction: 'vertical', // Y axis is considered when determining where an element would be dropped
            copy: false, // elements are moved by default, not copied
            revertOnSpill: false, // spilling will put the element back where it was dragged from, if this is true
            removeOnSpill: false, // spilling will `.remove` the element, if this is true
        });
    </script>
    </div>
    </div>
@endsection
