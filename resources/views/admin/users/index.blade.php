@extends('layouts.admin')

@section('title', 'Administrator')

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
                            <li class="breadcrumb-item active" aria-current="page">Data Cards Administrator</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!--end breadcrumb-->
            <div class="card">
                <div class="col-12">
                    <div class="text-center text-bold">
                        <h3 class="page-title">Administrator Management
                        </h3>
                    </div>
                </div>
                @include('layouts.notify')
                <div class="row">

                    <div class="pull-right">
                        <a class="btn " style="color: #FFF;
                        background-color: #4F46E5;"
                            href="{{ route('users.create') }}"> Create New Administrator</a>
                    </div>
                    <div></br></div>
                </div>
               
                <div class="table-responsive">
                    <table class="table text-center  mb-0 table-hover" id="example">
                        <thead class="table-light text-center text-primary">
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th width="280px">Action</th>
                        </thead>
                        <tbody class="text-bold">
                            @foreach ($data as $key => $user)
                                <?php
                                $pageNumber = $data->currentPage();
                                $resultsPerPage = $data->perPage();
                                $start = ($pageNumber - 1) * $resultsPerPage;
                                ?>
                                <tr>
                                    <?php $i = $start + $key + 1; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $v)
                                                <label class="badge badge-success bg-dark">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a> --}}
                                        <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteSuperAdminModal-{{ $user->id }}">
                                            <i class="bi-trash"></i> Delete
                                        </button>
                                        <div class="modal fade" id="deleteSuperAdminModal-{{ $user->id }}"
                                            tabindex="-1"
                                            aria-labelledby="deleteSuperAdminModal-{{ $user->id }}-label"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="deleteSuperAdminModal-{{ $user->id }}-label">
                                                            Confirm Delete Administrator</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this administrator?</p>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" value="{{ $user->name }}" readonly>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('users.destroy', $user->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
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
    </div>
    <div class="d-flex justify-content-center">
        <nav aria-label="users">
            {{ $data->links('vendor.pagination.bootstrap-4') }}
        </nav>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
@section('script')
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                paging: false,
                pageLength: 5,
                buttons: ['copy','pdf','excel', 'colvis']

            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>

@endsection
@endsection
