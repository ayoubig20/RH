@extends('layouts.admin')

@section('title', 'Job')

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
                            <li class="breadcrumb-item active" aria-current="page">Data Table job</li>
                        </ol>
                    </nav>
                </div>
            </div>
            {{-- <div class="text-sm-end">
                <div class="btn-group mb-3 d-none d-sm-inline-block">
                    <a href="{{ route('admin.jobs.index', ['view' => 'card']) }}" class="btn btn-muted"
                        style="{{ request()->get('view') == 'card' ? 'background-color: #6c757d;border-color: #6c757d;color: #fff;font-weight: bold;' : 'background-color: transparent;border-color: #6c757d;color: #6c757d;' }}"><i
                            class='bx bxs-grid-alt'></i></a>
                    <a href="{{ route('admin.jobs.index', ['view' => 'list']) }}" class="btn btn-muted"
                        style="{{ request()->get('view') != 'card' ? 'background-color: #6c757d;border-color: #6c757d;color: #fff;font-weight: bold;' : 'background-color: transparent;border-color: #6c757d;color: #6c757d;' }}"><i
                            class='bx bx-list-ul'></i></a>
                </div>
            </div> --}}
            <!--end breadcrumb-->
            @include('layouts.notify')
            <!-- Button trigger modal -->
            <button style="    color: #FFF;
                background-color: #4F46E5;" type="button" class="btn btn"
                data-bs-toggle="modal" data-bs-target="#exampleModal">add
                Job</button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">add Job</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('admin.jobs.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="">
                                    <label for="title"> Job title :</label>
                                    <input type="text" id="title" name="title" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="department_id" class="form-label">Department:</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bx bx-building"></i></span>
                                        <select class="form-control" id="department_id" name="department_id" required>
                                            <option value="">Select department</option>
                                            @foreach ($viewData['departments'] as $department)
                                                <option value="{{ $department->id }}">{{ $department->getName() }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                {{-- <button type="submit" class="btn btn-success">Submit</button> --}}
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
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
                        <th>Tile job</th>
                        <th>Department</th>
                        <th>description</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="text-bold">
                        <?php
                        $pageNumber = $viewData['jobs']->currentPage();
                        $resultsPerPage = $viewData['jobs']->perPage();
                        $start = ($pageNumber - 1) * $resultsPerPage;
                        ?>
                        @foreach ($viewData['jobs'] as $key => $job)
                            <?php $i = $start + $key + 1; ?>
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->department->name }}</td>

                                <td>{{ substr($job->description, 0, 43) }}...</td>

                                <td>
                                    <div class="d-flex flex-row">
                                        <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editjob{{ $job->getId() }}">
                                            <i class="bx bxs-edit"></i> Edit
                                        </button>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editjob{{ $job->getId() }}" tabindex="-1"
                                            aria-labelledby="editjob{{ $job->getId() }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editjob{{ $job->getId() }}">Edit
                                                            job</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('admin.jobs.update', $job->getId()) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <label for="title" class="col-form-label">job
                                                                Title</label>
                                                            <input type="text" class="form-control" id="title"
                                                                name="title" value="{{ $job->title }}" required>
                                                            <label for="department_id"
                                                                class="form-label ">Department:</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-building"></i></span>
                                                                <select name="department_id" id="department_id"
                                                                    class="form-control">
                                                                    <option value="">Select job department
                                                                    </option>

                                                                    @foreach ($viewData['departments'] as $department)
                                                                        <option value="{{ $department->id }}"
                                                                            {{ $department->id == $job->department_id ? 'selected' : '' }}>
                                                                            {{ $department->name }}
                                                                        </option>
                                                                    @endforeach

                                                                </select>
                                                            </div>
                                                            <label for="description"
                                                                class="col-form-label">Description:</label>
                                                            <textarea class="form-control" id="description" name="description">{{ $job->getDescription() }}</textarea>
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
                                            data-bs-target="#deleteDepartement{{ $job->getId() }}">
                                            <i class="bx bxs-trash"></i> Delete
                                        </button>
                                        <div class="modal fade" id="deleteDepartement{{ $job->getId() }}" tabindex="-1"
                                            aria-labelledby="deleteDepartement" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="deleteDepartement{{ $job->getId() }}">
                                                            Confirm Delete Departement</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this Departement?</p>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" value="{{ $job->title }}" readonly>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('admin.jobs.destroy', $job->getId()) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
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
    <div class="d-flex justify-content-center">
        <nav aria-label="jobs">
            {{ $viewData['jobs']->links('vendor.pagination.bootstrap-4') }}
        </nav>
    </div>

@endsection
