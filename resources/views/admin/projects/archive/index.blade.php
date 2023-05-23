@extends('layouts.admin')
@section('style')

@endsection
@section('title', 'Projects Archive')
@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
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
            <!-- Start Content-->
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-bold">
                            <h3 class="page-title"><strong>Projects Archive List</strong></h3>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row mb-2">
                    <div class="col-sm-4">
                        {{-- Button trigger modal --}}
                        <button class="btn btn-rounded bg-danger text-white" id="delete-selected">
                            <span class="text-white">Delete Selected</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered -mb-4 text-center table-hover" id="example">
                                <thead class="table-light text-center text-success ">
                                    <th><input type="checkbox" id="select-all" onclick="CheckAll('box1', this)">
                                    </th>
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
                                            <td><input type="checkbox" name="selected[]" value="{{ $project->id }}"
                                                    class="box1"></td>

                                            <td>{{ $i }}</td>
                                            <td><a href="{{ route('admin.projects.show', $project->getId()) }}"><span
                                                        class="badge bg-dark p-2">{{ $project->getName() }}</span></a>
                                            </td>

                                            <td>
                                                @if ($project->status == 'Panding')
                                                    <span class="badge bg-info p-1">{{ $project->status }}</span>
                                                @elseif ($project->status == 'In progress')
                                                    <span class="badge bg-warning p-1">{{ $project->status }}</span>
                                                @else
                                                    <span class="badge bg-success p-1">{{ $project->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $project->start_date->format('d-m-Y') }}</td>
                                            <td>{{ $project->end_date->format('d-m-Y') }}</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar {{ $project->progression() < 50 ? 'bg-warning' : ($project->progression() < 75 ? 'bg-info' : 'bg-success') }}"
                                                        role="progressbar" style="width: {{ $project->progression() }}%"
                                                        aria-valuenow="{{ $project->progression() }}" aria-valuemin="0"
                                                        aria-valuemax="100">
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
                                            <td>
                                                <div class="d-flex flex-row">
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
                                                                        Confirm Delete
                                                                        Project</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p><strong>Are you sure you want
                                                                            to delete this
                                                                            Project?</strong></p>
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
                                                    </div>
                                                    <button type="button" class="btn btn-outline-warning btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#retrieveProject{{ $project->getId() }}">
                                                        <i class="bx bxs-archive"></i> Retrieve
                                                    </button>
                                                    <div class="modal fade" id="retrieveProject{{ $project->getId() }}"
                                                        tabindex="-1" aria-labelledby="retrieveProject" aria-hidden="true">
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
                                                                            value="{{ $project->getName() }}" readonly>
                                                                        <input type="text"
                                                                            value="{{ $project->getId() }}"
                                                                            name="id" hidden>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
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

                {{-- delete list of projects modal --}}

            </div>
        </div>
    </div>

    {{-- delete all code  --}}
    <!-- The confirmation modal dialog box -->
    <div class="modal fade" id="confirm-delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
                    <button type="button" class="close" onclick="closeModal()"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete the selected projects?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>

                    <button type="button" class="btn btn-danger" id="confirm-delete-btn">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirm-delete-modal1" tabindex="-1" role="dialog"
        aria-labelledby="confirm-delete-modal-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4 class="modal-title" id="confirm-delete-modal-label">Confirm Delete</h4>
                    <button type="button" class="close" onclick="closeModal1()"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body bg-warning">
                    <p><strong>Please select at least one project to delete.</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal1()">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function closeModal() {
            $('#confirm-delete-modal').modal('hide');
        }

        function closeModal1() {
            $('#confirm-delete-modal1').modal('hide');
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
        $('#delete-selected').click(function() {
            var ids = [];
            $('input[name="selected[]"]').each(function() {
                if (this.checked) {
                    ids.push($(this).val());
                    console.log(ids);
                }
            });

            if (ids.length == 0) {
                // Display the modal with the message
                $('#confirm-delete-modal1').modal('show');
            } else {
                // Show a confirmation modal dialog box
                $('#confirm-delete-modal').modal('show');
                $('#confirm-delete-modal').on('click', '#confirm-delete-btn', function() {
                    $.ajax({
                        url: '/admin/archivePro/deleteAll',
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            ids: JSON.stringify(ids)
                        },
                        success: function(response) {
                            console.log('Task status updated successfully');
                            console.log(response);
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.log('Error delete project: ' + error);
                        }
                    });
                });
            }
        });
    </script>
    <script>
        function CheckAll(className, select_all) {
            var elements = document.getElementsByClassName(className);
            var l = elements.length;
            if (select_all.checked) {
                for (var i = 0; i < l; i++) {
                    elements[i].checked = true;
                }
            } else {
                for (var i = 0; i < l; i++) {
                    elements[i].checked = false;
                }
            }
        }
    </script>
{{-- @section('script')

    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                paging: true,
                buttons: ['copy', 'excel', 'colvis']
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>

@endsection --}}
@endsection
