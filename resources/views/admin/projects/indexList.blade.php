@extends('layouts.admin')

@section('title', 'Projects')
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

            <div class="content-page">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="card">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center text-bold">
                                        <h3 class="page-title"><strong>Projects
                                                List</strong></h3>
                                    </div>
                                </div>
                            </div>
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
                                                                name="start_date" value="{{ old('start_date') }}" required>

                                                            @if ($errors->has('start_date'))
                                                                <span class="help-block bg-danger">
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
                                                                <span class="help-block bg-danger">
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
                                                                <span class="help-block bg-danger">
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
                                                                        high</option>
                                                                    <option value="Medium"
                                                                        {{ old('priority') == 'medium' ? 'selected' : '' }}>
                                                                        Medium
                                                                    </option>
                                                                    <option value="low"
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
                            <div class="text-sm-end">
                                <div class="col-auto float-right ml-auto">
                                    <div class="btn-group mb-3 d-none d-sm-inline-block">

                                    </div>
                                    <div class="text-sm-end">
                                        <div class="btn-group mb-3">
                                            <a href="{{ route('admin.projects.index') }}"
                                                class="btn btn-primary{{ !request()->has('status') && !request()->has('view') ? ' active' : '' }}"
                                                style="{{ !request()->has('status') && !request()->has('view') ? 'background-color: #0d6efd;' : 'background-color: transparent;border-color: #0d6efd;color: #0d6efd;' }}">All</a>
                                        </div>
                                        <div class="btn-group mb-3 ms-1">
                                            <a href="{{ route('admin.projects.index', ['status' => 'Panding']) }}"
                                                class="btn btn-light"
                                                style="{{ request()->get('status') == 'Panding' ? 'background-color: #0d6efd;border-color: #0d6efd;color: #fff;font-weight: bold;' : 'background-color: transparent;border-color: #0d6efd;color: #0d6efd;' }}">
                                                Panding</a>
                                            <a href="{{ route('admin.projects.index', ['status' => 'In progress']) }}"
                                                class="btn btn-light"
                                                style="{{ request()->get('status') == 'In progress' ? 'background-color: #0d6efd;border-color: #0d6efd;color: #fff;font-weight: bold;' : 'background-color: transparent;border-color: #0d6efd;color: #0d6efd;' }}">In
                                                Progress</a>
                                            <a href="{{ route('admin.projects.index', ['status' => 'Finshed']) }}"
                                                class="btn btn-light"
                                                style="{{ request()->get('status') == 'Finshed' ? 'background-color: #0d6efd;border-color: #0d6efd;color: #fff;font-weight: bold;' : 'background-color: transparent;border-color: #0d6efd;color: #0d6efd;' }}">Finshed</a>
                                        </div>
                                        <div class="btn-group mb-3 d-none d-sm-inline-block">
                                            <a href="{{ route('admin.projects.index', ['view' => 'card']) }}"
                                                class="btn btn-muted {{ request()->get('view') == 'card' ? 'active' : '' }}"><i
                                                    class='bx bxs-grid-alt'></i></a>
                                            <a href="{{ route('admin.projects.index', ['view' => 'list']) }}"
                                                class="btn btn-muted {{ request()->get('view') != 'card' ? 'active' : '' }}"><i
                                                    class='bx bx-list-ul'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-mb-4 text-center table-hover" id="example">
                                        <thead class="table-light text-center text-primary ">
                                            <th>#</th>
                                            <th>Project name</th>
                                            <th>Project Category</th>
                                            <th>Project status</th>
                                            <th>Update status</th>
                                            {{-- <th>start date</th> --}}
                                            <th>end date</th>
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
                                                    <td><a href="{{ route('admin.projects.show', $project->getId()) }}"><span
                                                                class="badge  p-2" style="background-color:#8971d0">{{ $project->getName() }}</span></a>
                                                    </td>
                                                    <td>{{ $project->category->name }}</td>
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
                                                    <td>
                                                        <button type="button" class="dropdown-item "
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#updateStatusModal{{ $project->getId() }}">
                                                            <i class="bx bxs-edit"></i> <strong>upadte status</strong>
                                                        </button>
                                                        <!-- Update Status Modal -->
                                                        <div class="modal fade"
                                                            id="updateStatusModal{{ $project->getId() }}" tabindex="-1"
                                                            role="dialog"
                                                            aria-labelledby="updateStatusLabel{{ $project->getId() }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <form method="POST"
                                                                    action="{{ route('admin.project.updateStatus', $project->getId()) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="updateStatusLabel{{ $project->getId() }}">
                                                                                Update Status
                                                                            </h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <input type="text"
                                                                                    value="{{ $project->getId() }}"
                                                                                    name="id" hidden>
                                                                                <label for="status">Select
                                                                                    Status:</label>
                                                                                <select class="form-control"
                                                                                    name="status" id="status">
                                                                                    <option value="Panding"
                                                                                        {{ old('status', $project->status) == 'Pending' ? 'selected' : '' }}>
                                                                                        Panding
                                                                                    </option>
                                                                                    <option value="In progress"
                                                                                        {{ old('status', $project->status) == 'In progress' ? 'selected' : '' }}>
                                                                                        In progress
                                                                                    </option>
                                                                                    <option value="Finshed"
                                                                                        {{ old('status', $project->status) == 'Finshed' ? 'selected' : '' }}>
                                                                                        Finshed
                                                                                    </option>
                                                                                </select>

                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Cancel</button>
                                                                            <button type="submit"
                                                                                class="btn btn-success">
                                                                                Update
                                                                                changes</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    {{-- <td>{{ $project->start_date->format('d-m-Y') }}</td> --}}
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
                                                    <td>
                                                        @if ($project->Totaltasks() == 0)
                                                            <strong class="badge bg-dark p-1">No tasks create</strong>
                                                        @else
                                                            <strong>{{ $project->Totaltasks() }}</strong>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @foreach ($project->tasks->groupBy('employee.id') as $tasksByEmployee)
                                                            @php
                                                                $employee = $tasksByEmployee->first()->employee;
                                                            @endphp
                                                            <div class="team-members text-nowrap">
                                                                <a href="{{ route('admin.employees.show', $employee->getId()) }}"
                                                                    class="team-member-avatar"
                                                                    title="{{ $employee->firstName }} {{ $employee->lastName }}"
                                                                    data-toggle="tooltip">
                                                                    <img src="{{ asset('storage/assets/users/' . $employee->image) }}"
                                                                        class="user-img" alt="user avatar">
                                                                </a>
                                                                <div class="dropdown avatar-dropdown">

                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        id="avatar-dropdown-{{ $employee->id }}">
                                                                        <div class="avatar-group">
                                                                            @foreach ($tasksByEmployee as $task)
                                                                                <a class="avatar avatar-xs" href="#"
                                                                                    title="{{ $task->name }}">
                                                                                    <img src="{{ asset('storage/assets/users/' . $task->employee->image) }}"
                                                                                        class="user-img"
                                                                                        alt="user avatar">
                                                                                </a>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach


                                                    </td>

                                                    {{-- <td>{{ $project->getDescription() }}</td> --}}
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle"
                                                                type="button" id="dropdownMenuButton"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <ul class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuButton">
                                                                <li>
                                                                    <button type="button" class="dropdown-item"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#editProject{{ $project->getId() }}">
                                                                        <i class="bx bxs-edit"></i> Edit
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('admin.projects.show', $project->getId()) }}">
                                                                        <i class='bx bxs-show me-0'></i> Show
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <button type="button" class="dropdown-item"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#archiveProject{{ $project->getId() }}">
                                                                        <i class='bx bxs-archive-in'></i> Archive
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" class="dropdown-item"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteProject{{ $project->getId() }}">
                                                                        <i class="bx bxs-trash"></i> Delete
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        {{-- edit modal --}}
                                                        <div class="modal fade" id="editProject{{ $project->getId() }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="editProject{{ $project->getId() }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="editProject{{ $project->getId() }}">
                                                                            Edit Project</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <form method="POST"
                                                                        action="{{ route('admin.projects.update', $project) }}"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="name"
                                                                                    class="control-label">Name:</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="name" name="name"
                                                                                    value="{{ $project->getName() }}"
                                                                                    required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="category_id"
                                                                                    class="control-label">Category:</label>
                                                                                <select id="category_id"
                                                                                    class="form-control"
                                                                                    name="category_id" required>
                                                                                    <option value="">Select a
                                                                                        category</option>
                                                                                    @foreach ($viewData['categorys'] as $category)
                                                                                        <option
                                                                                            value="{{ $category->getId() }}"
                                                                                            {{ old('category_id', $project->category_id) == $category->getId() ? 'selected' : '' }}>
                                                                                            {{ $category->getName() }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="image"
                                                                                    class="control-label">Image:</label>
                                                                                <input id="image" type="file"
                                                                                    class="form-control" name="image">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="document"
                                                                                    class="control-label">Document:</label>
                                                                                <input id="document" type="file"
                                                                                    class="form-control" name="document">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="start_date"
                                                                                    class="control-label">Start
                                                                                    Date:</label>
                                                                                <input type="date" name="start_date"
                                                                                    id="start_date" class="form-control"
                                                                                    value="{{ old('start_date', $project->start_date->format('Y-m-d')) }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="end_date"
                                                                                    class="control-label">End
                                                                                    Date:</label>
                                                                                <input type="date" name="end_date"
                                                                                    id="end_date" class="form-control"
                                                                                    value="{{ old('end_date', $project->end_date->format('Y-m-d')) }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="budget"
                                                                                    class="control-label">Budget:</label>
                                                                                <input id="budget" type="number"
                                                                                    class="form-control" name="budget"
                                                                                    value="{{ old('budget', $project->budget) }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="priority"
                                                                                    class="control-label">Priority:</label>
                                                                                <select class="form-control"
                                                                                    id="priority" name="priority"
                                                                                    required>
                                                                                    <option value="" selected
                                                                                        disabled>
                                                                                        Select priority
                                                                                    </option>
                                                                                    <option value="high"
                                                                                        {{ $project->priority == 'high' ? 'selected' : '' }}>
                                                                                        High</option>
                                                                                    <option value="medium"
                                                                                        {{ $project->priority == 'medium' ? 'selected' : '' }}>
                                                                                        Medium</option>
                                                                                    <option value="low"
                                                                                        {{ $project->priority == 'low' ? 'selected' : '' }}>
                                                                                        Low</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="description"
                                                                                    class="control-label">Description:</label>
                                                                                <textarea id="description" class="form-control" name="description">{{ $project->description }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Cancel</button>
                                                                            <button type="submit"
                                                                                class="btn btn-success">Save
                                                                                changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- archive modal --}}
                                                        <div class="modal fade"
                                                            id="archiveProject{{ $project->getId() }}" tabindex="-1"
                                                            aria-labelledby="archiveProject" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="archiveProject{{ $project->getId() }}">
                                                                            Confirm Archive
                                                                            Project</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                        <input type="hidden" name="id_page"
                                                                            value="1">
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want
                                                                            to archive this
                                                                            Project?</p>
                                                                        <input type="text" class="form-control"
                                                                            id="name" name="name"
                                                                            value="{{ $project->getName() }}" readonly>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cancel</button>
                                                                        <form
                                                                            action="{{ route('admin.projects.destroy', $project->getId()) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-warning">Archive</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- delete modal --}}
                                                        <div class="modal fade" id="deleteProject{{ $project->getId() }}"
                                                            tabindex="-1" aria-labelledby="deleteProject"
                                                            aria-hidden="true">
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
                                                                        <p>Are you sure you want
                                                                            to delete this
                                                                            Project?</p>
                                                                        <input type="text" class="form-control"
                                                                            id="name" name="name"
                                                                            value="{{ $project->getName() }}" readonly>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cancel</button>
                                                                        <form
                                                                            action="{{ route('admin.archiveprojects.destroy', $project->getId()) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Delete</button>
                                                                        </form>
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
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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
