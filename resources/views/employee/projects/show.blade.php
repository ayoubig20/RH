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
            @include('layouts.notify')

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Project</button>
                    <button class="nav-link " id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Attachments</button>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                    <div class="table-responsive mt-15">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th scope="row">Project ID</th>
                                    <td>{{ $project->id }}</td>
                                    <th scope="row">Date created</th>
                                    <td>{{ $project->start_date->format('d-m-Y') }}</td>
                                    <th scope="row">Due date</th>
                                    <td>{{ $project->end_date ->format('d-m-Y')}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Category</th>
                                    <td>{{ $project->category->name }}</td>
                                    <th scope="row">Status</th>
                                    <td>
                                        @if ($project->status == 'Finished')
                                            <span class="badge bg-success">{{ $project->status }}</span>
                                        @elseif ($project->status == 'In progress')
                                            <span class="badge bg-info ">{{ $project->status }}</span>
                                        @elseif ($project->status == 'Panding')
                                            <span class="badge bg-info">{{ $project->status }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $project->status }}</span>
                                        @endif
                                    </td>
                                    <th scope="row">Priority</th>
                                    <td style="padding: 5px;">
                                        @if ($project->priority == 'high')
                                            <span class="badge bg-danger ">{{ $project->priority }}</span>
                                        @elseif ($project->priority == 'Medium')
                                            <span class="badge bg-warning ">{{ $project->priority }}</span>
                                        @else
                                            <span class="badge bg-info ">{{ $project->priority }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Description</th>
                                    <td colspan="5">{{ $project->description }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive mt-5 border-dark ">
                        <table class="table table-hover mb-0 text-center border-dark ">
                            <thead class="bg-light text-dark">
                                <tr>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Progression</th>
                                    <th scope="col">Number of Tasks</th>
                                    <th scope="col">Task and Assigned Person</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $project->getName() }}</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar {{ $project->progression() < 50 ? 'bg-warning' : ($project->progression() < 75 ? 'bg-info' : 'bg-success') }}"
                                                role="progressbar" style="width: {{ $project->progression() }}%"
                                                aria-valuenow="{{ $project->progression() }}" aria-valuemin="0"
                                                aria-valuemax="100">
                                                {{ $project->progression() }}%
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $project->Totaltasks() }}</td>
                                    <td>
                                        <div class="table-responsive border-dark -my-5">
                                            <table class="table table-hover mb-0 text-black border-dark">
                                                <tbody>
                                                    @foreach ($project->tasks as $task)
                                                        <tr>
                                                            <td>
                                                                <strong>{{ $task->name }}</strong>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <img src="{{ asset('storage/assets/users/' . $task->employee->image) }}"
                                                                        class="rounded-circle user-img mr-2"
                                                                        alt="user avatar">
                                                                    <div class="user-name">
                                                                        <strong>{{ $task->employee->firstName }}
                                                                            {{ $task->employee->lastName }}</strong>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td style="padding: 5px;">
                                                                @if ($task->status == 'to do')
                                                                    <span
                                                                        class="badge bg-secondary ">{{ $task->status }}</span>
                                                                @elseif ($task->status == 'in progress')
                                                                    <span
                                                                        class="badge bg-info">{{ $task->status }}</span>
                                                                @else
                                                                    <span
                                                                        class="badge bg-success">{{ $task->status }}</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="card-body">
                        <h5 class="card-title text-center">Add Attachments</h5>

                        <p class="text-danger">* Attachment format: pdf, jpeg, .jpg, png</p>
                        <form method="post" action="{{ url('/ProjectAttachments') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="file_name"
                                        required>
                                    <label class="custom-file-label" for="customFile">Choose File</label>
                                </div>
                            </div>
                            <input type="hidden" id="project_id" name="project_id" value="{{ $project->id }}">
                            <button type="submit" class="btn btn-primary btn-sm mt-3"
                                name="uploadedFile">Confirm</button>
                        </form>
                    </div>

                    <div class="table-responsive table-bordered border-dark  my-5">
                        <table class="table center-aligned-table mb-0 table table-hover text-black border-dark "
                            style="text-align:center">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">name of file</th>
                                    <th scope="col">Add by</th>
                                    <th scope="col">date add</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($attachments as $attachment)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $attachment->file_name }}</td>
                                        <td>{{ $attachment->Created_by }}</td>
                                        <td>{{ $attachment->created_at }}</td>
                                        <td colspan="2">

                                            <a class="btn btn-outline-success btn-sm"
                                                href="{{ url('View_file') }}/{{ $project->id }}/{{ $attachment->file_name }}"
                                                role="button"><i class='bx bx-show'></i>&nbsp; Show</a>

                                            <a class="btn btn-outline-info btn-sm"
                                                href="{{ url('download') }}/{{ $project->id }}/{{ $attachment->file_name }}"
                                                role="button"><i class='bx bx-download'></i>&nbsp; Download</a>


                                            <button type="button" class="btn btn-outline-danger btn-sm"
                                                onclick="openDeleteModal({{ $attachment->id }}, '{{ $attachment->file_name }}')">
                                                <i class='bx bx-trash-alt'></i> &nbsp;Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- delete modal -->
                    <div class="modal fade" id="delete_file_modal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete attachment</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('admin.projects.destroy', $project->getId()) }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <p class="text-center">
                                        <h6 style="color:red">Are you sure you want to delete this attachment?</h6>
                                        </p>

                                        <input type="hidden" name="id_file" id="delete_id_file" value="">
                                        <input type="hidden" name="file_name" id="delete_file_name" value="">
                                        <input type="hidden" name="invoice_number" id="invoice_number" value="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Confirm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script>
                        function openDeleteModal(id, fileName) {
                            $('#delete_id_file').val(id);
                            $('#delete_file_name').val(fileName);
                            $('#delete_file_modal').modal('show');
                        }
                    </script>

                @endsection
