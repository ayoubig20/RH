@extends('layouts.admin')
@section('style')
    {{-- .employee-wrapper {
    position: relative;
    display: inline-block;
    }
    .employee-badge {
    position: absolute;
    top: -20px; /* adjust this value as needed */
    left: 50%;
    transform: translateX(-50%);
    background-color: #333;
    color: #fff;
    padding: 5px 10px;
    border-radius: 10px;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
    }
    .employee-wrapper:hover .employee-badge {
    opacity: 1;
    } --}}
@endsection
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
                <div class="content-page">
                    <div class="content">

                        <!-- Start Content-->
                        <div class="container-fluid">

                            <!-- start page title -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box">

                                        <h4 class="page-title">Projects List</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title -->

                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    {{-- <a href="apps-projects-add.html" class="btn btn-danger rounded-pill mb-3"><i
                                            class="mdi mdi-plus"></i> Create Project</a> --}}
                                    <!-- Button trigger modal -->
                                    <button style="    color: #FFF;
                background-color: #4F46E5;"
                                        type="button" class="btn btn rounded " data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">add
                                        Projects</button>
                                </div>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">add Project</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <form class="form-horizontal" enctype="multipart/form-data"method="POST"
                                                    action="{{ route('admin.projects.store') }}">
                                                    {{ csrf_field() }}

                                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                        <label for="name" class="col-md-4 control-label">Name</label>

                                                        <div class="col">
                                                            <input id="name" type="text" class="form-control"
                                                                name="name" value="{{ old('name') }}" required
                                                                autofocus>

                                                            @if ($errors->has('name'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                                        <label for="category_id" class="col-md-4 control-label">category
                                                        </label>

                                                        <div class="col">
                                                            <select id="category_id" class="form-control" name="category_id"
                                                                required>
                                                                <option value="">Select a category </option>
                                                                @foreach ($viewData['categorys'] as $category)
                                                                    <option value="{{ $category->getId() }}"
                                                                        {{ $category->getId() == $category->getName() ? 'selected' : '' }}>
                                                                        {{ $category->getName() }}</option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('category_id'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('category_id') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                                        <label for="image" class="col-md-4 control-label">Image</label>

                                                        <div class="col-md-6">
                                                            <input id="image" type="file" class="form-control"
                                                                name="image">

                                                            @if ($errors->has('image'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('image') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                                                        <label for="document"
                                                            class="col-md-4 control-label">Document</label>

                                                        <div class="col-md-6">
                                                            <input id="document" type="file" class="form-control"
                                                                name="document">

                                                            @if ($errors->has('document'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('document') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                                        <label for="start_date" class="col-md-4 control-label">started
                                                            date</label>

                                                        <div class="col">
                                                            <input id="start_date" type="date" class="form-control"
                                                                name="start_date" value="{{ old('start_date') }}"
                                                                required>

                                                            @if ($errors->has('start_date'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('start_date') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                                        <label for="end_date" class="col-md-4 control-label">End
                                                            date</label>

                                                        <div class="col">
                                                            <input id="end_date" type="date" class="form-control"
                                                                name="end_date" value="{{ old('end_date') }}" required>

                                                            @if ($errors->has('end_date'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('end_date') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="form-group{{ $errors->has('budget') ? ' has-error' : '' }}">
                                                        <label for="budget"
                                                            class="col-md-4 control-label">Budget</label>

                                                        <div class="col">
                                                            <input id="budget" type="number" class="form-control"
                                                                name="budget">

                                                            @if ($errors->has('budget'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('budget') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">

                                                        <div class="form-group">
                                                            <div class="col">

                                                                <label for="priority">Priority</label>
                                                                <select class="form-control" id="priority"
                                                                    name="priority" required>
                                                                    <option value="">choice Priority</option>
                                                                    <option value="high"
                                                                        {{ old('priority') == 'high' ? 'selected' : '' }}>
                                                                        highest</option>
                                                                    <option value="Medium"
                                                                        {{ old('priority') == 'medium' ? 'selected' : '' }}>
                                                                        Medium
                                                                    </option>
                                                                    <option value="High"
                                                                        {{ old('priority') == 'low' ? 'selected' : '' }}>
                                                                        low
                                                                    </option>

                                                                </select>
                                                            </div>
                                                        </div>

                                                        @if ($errors->has('priority'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('priority') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>


                                                    <div
                                                        class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                                        <label for="description"
                                                            class="col-md-4 control-label">Description</label>

                                                        <div class="col">
                                                            <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>

                                                            @if ($errors->has('description'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('description') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col col-md-offset-4">
                                                            <button type="submit" class="btn btn-success">
                                                                create project </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class=" text-primary">
                                            <th>#</th>
                                            <th>Project name</th>
                                            <th>Project status</th>
                                            <th>Start date</th>
                                            <th>End date</th>
                                            <th>progresion</th>
                                            <th>Nombre of tasks</th>
                                            <th>team projects</th>
                                            <th>Action</th>

                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($projects as $project)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>
                                                        <span class="badge bg-dark p-2">{{ $project->getName() }}</span>
                                                    </td>

                                                    <td>
                                                        @if ($project->status == 'Panding')
                                                            <span class="badge bg-info p-1">{{ $project->status }}</span>
                                                        @elseif ($project->status == 'In progress')
                                                            <span
                                                                class="badge bg-warning p-1">{{ $project->status }}</span>
                                                        @else
                                                            <span
                                                                class="badge bg-success p-1">{{ $project->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $project->start_date->format('d-m-Y') }}</td>
                                                    <td>{{ $project->end_date->format('d-m-Y') }}</td>


                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar {{ $project->progression() < 50 ? 'bg-warning' : ($project->progression() < 75 ? 'bg-info' : 'bg-success') }}"
                                                                role="progressbar"
                                                                style="width: {{ $project->progression() }}%"
                                                                aria-valuenow="{{ $project->progression() }}"
                                                                aria-valuemin="0" aria-valuemax="100">
                                                                {{ $project->progression() }}%</div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $project->Totaltasks() }}</td>
                                                    <td>
                                                        @foreach ($project->tasks->unique('employee_id') as $task)
                                                            <div
                                                                style="position: relative; display: inline-block; margin-right: 10px;">
                                                                <img src="{{ asset('storage/assets/users/' . $task->employee->image) }}"
                                                                    class="user-img" alt="user avatar">
                                                                {{ $task->employee->firstName }}
                                                                {{ $task->employee->lastName }}
                                                            </div>
                                                        @endforeach
                                                    </td>

                                                    {{-- <td>{{ $project->getDescription() }}</td> --}}
                                                    <td>
                                                        <div class="d-flex flex-row">

                                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteProject{{ $project->getId() }}">
                                                                <i class="bx bxs-trash"></i> Delete
                                                            </button>
                                                            <div class="modal fade"
                                                                id="deleteProject{{ $project->getId() }}" tabindex="-1"
                                                                aria-labelledby="deleteProject" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="deleteProject{{ $project->getId() }}">
                                                                                Confirm Delete
                                                                                Project</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p><strong>Are you sure you want
                                                                                to delete this
                                                                                Project?</strong></p>
                                                                            <input type="text" class="form-control"
                                                                                id="name" name="name"
                                                                                value="{{ $project->getName() }}"
                                                                                readonly>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Cancel</button>
                                                                            <form
                                                                                action="{{ route('admin.projects.destroy', $project->getId()) }}"
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
                                                            <button type="button" class="btn btn-outline-warning btn-sm"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#retrieveProject{{ $project->getId() }}">
                                                                <i class="bx bxs-archive"></i> Retrieve
                                                            </button>
                                                            <div class="modal fade"
                                                                id="retrieveProject{{ $project->getId() }}"
                                                                tabindex="-1" aria-labelledby="retrieveProject"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="retrieveProject{{ $project->getId() }}">
                                                                                Confirm retrieve
                                                                                Project</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>

                                                                        </div>
                                                                        <form
                                                                            action="{{ route('admin.archiveprojects.update', $project->getId()) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="modal-body">
                                                                               <p><strong>Are you sure you want
                                                                                to retrieve this
                                                                                Project?</strong></p> 
                                                                                <input type="text" class="form-control"
                                                                                    id="name" name="name"
                                                                                    value="{{ $project->getName() }}"
                                                                                    readonly>
                                                                                <input type="text"
                                                                                    value="{{ $project->getId() }}"
                                                                                    name="id" hidden>

                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-warning">Retrieve</button>
                                                                        </form>
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

                    </div>
                </div>
            </div>
        </div>
    @endsection