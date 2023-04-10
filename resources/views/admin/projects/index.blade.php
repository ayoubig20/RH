
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
                <!-- Button trigger modal -->
                <button style="    color: #FFF;
                background-color: #4F46E5;" type="button" class="btn btn"
                    data-bs-toggle="modal" data-bs-target="#exampleModal">add
                    Projects</button>
                <!-- Modal -->
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

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control" name="name"
                                                value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                        <label for="category" class="col-md-4 control-label">Category</label>

                                        <div class="col-md-6">
                                            <select id="category" class="form-control" name="category" required>
                                                <option value="">Select a category</option>
                                                @foreach ($viewData['categorys'] as $category)
                                                <option value="{{ $category->getId() }}"
                                                    {{ $category->getId() == $category->getName() ? 'selected' : '' }}>
                                                    {{ $category->getName() }}</option>
                                                @endforeach
                                            </select>

                                            @if ($errors->has('category'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('category') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                        <label for="image" class="col-md-4 control-label">Image</label>

                                        <div class="col-md-6">
                                            <input id="image" type="file" class="form-control" name="image">

                                            @if ($errors->has('image'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                                        <label for="document" class="col-md-4 control-label">Document</label>

                                        <div class="col-md-6">
                                            <input id="document" type="file" class="form-control" name="document">

                                            @if ($errors->has('document'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('document') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                        <label for="start_date" class="col-md-4 control-label">started date</label>

                                        <div class="col-md-6">
                                            <input id="start_date" type="date" class="form-control" name="start_date"
                                                value="{{ old('start_date') }}" required>

                                            @if ($errors->has('start_date'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('start_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                        <label for="end_date" class="col-md-4 control-label">End date</label>

                                        <div class="col-md-6">
                                            <input id="end_date" type="date" class="form-control" name="end_date"
                                                value="{{ old('end_date') }}" required>

                                            @if ($errors->has('end_date'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('end_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                   

                                    <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">

                                        <div class="form-group">
                                            <div class="col-md-6">

                                                <label for="priority">Priority</label>
                                                <select class="form-control" id="priority" name="priority" required>
                                                    <option value="">choice Priority</option>
                                                    <option value="highest"
                                                        {{ old('priority') == 'highest' ? 'selected' : '' }}>
                                                        highest</option>
                                                    <option value="Medium"
                                                        {{ old('priority') == 'medium' ? 'selected' : '' }}>
                                                        Medium
                                                    </option>
                                                    <option value="High"
                                                        {{ old('priority') == 'low' ? 'selected' : '' }}>low
                                                    </option>
                                                    <option value="High"
                                                        {{ old('priority') == 'lowest' ? 'selected' : '' }}>
                                                        lowest
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


                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label for="description" class="col-md-4 control-label">Description</label>

                                        <div class="col-md-6">
                                            <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>

                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
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
                    <table class="table">
                        <thead class=" text-primary">
                            <th>#</th>
                            <th>Project Name</th>
                            <th>Category</th>
                            <th>Started date</th>
                            <th>End date</th>
                            <th>Priority</th>
                            <th>Progress</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($projects as $project)
                                <?php $i++; ?>
                                {{-- $viewData['departments']= Department::all(); --}}

                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->category }}</td>
                                    <td>{{ $project->start_date }}</td>
                                    <td>{{ $project->end_date }}</td>
                                    <td>{{ $project->priority }}</td>
                                    <td>{{ $project->progression }}%</td>
                                    <td>
                                        <div class="d-flex flex-row">
                                            <button type="button" class="btn btn-outline-success btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editProject{{ $project->getId() }}">
                                                <i class="bx bxs-edit"></i> Edit
                                            </button>
                                            <div class="modal fade" id="editProject{{ $project->getId() }}"
                                                tabindex="-1" aria-labelledby="editProject{{ $project->getId() }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="editProject{{ $project->getId() }}">Edit
                                                                project</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form
                                                            action="{{ route('admin.projects.edit', $project->getId()) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="name">Name:</label>
                                                                    <input type="text" class="form-control"
                                                                        id="name" name="name"
                                                                        value="{{ $project->getName() }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="description">Description:</label>
                                                                    <textarea class="form-control" id="description" name="description">{{ $project->getDescription() }}</textarea>
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
                                                data-bs-target="#deleteProject{{ $project->getId() }}">
                                                <i class="bx bxs-trash"></i> Delete
                                            </button>
                                            <div class="modal fade" id="deleteProject{{ $project->getId() }}"
                                                tabindex="-1" aria-labelledby="deleteProject" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="deleteProject{{ $project->getId() }}">
                                                                Confirm Delete Project</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this Project?</p>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" value="{{ $project->getName() }}"
                                                                readonly>
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
