@extends('layouts.admin')

@section('title', 'Roles and permissions')

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
                            <li class="breadcrumb-item active" aria-current="page">Data Roles and permissions</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!--end breadcrumb-->
            <div class="card">
                <div class="col-12">
                    <div class="text-center text-bold">
                        <h3 class="page-title">Roles and Permissions
                        </h3>
                    </div>
                </div>
                @include('layouts.notify')
                <div class="row m-auto mx-2">
                    <div class="pull-right">
                        @can('role-create')
                            <a class="btn " style="color: #FFF;
                        background-color: #4F46E5;"
                                href="{{ route('roles.create') }}"> Create New Role</a>
                        @endcan
                    </div>
                    <div></br></div>
                    <table class="table table-bordered table-responsive text-center table-hover" id="example">
                        <thead class="table-light text-center text-primary">
                            <th>#</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                        </thead>
                        <?php $i = 0; ?>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}">Show</a>
                                    <?php if (Auth::user()->can('role-edit')): ?>
                                    <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                    <?php endif; ?>
                                    <?php if (Auth::user()->can('role-delete')): ?>
                                    {{-- <form method="POST" action="{{ route('roles.destroy', $role->id) }}"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form> --}}
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteSuperAdminModal-{{ $role->id }}">
                                        <i class="bi-trash"></i> Delete
                                    </button>
                                    <div class="modal fade" id="deleteSuperAdminModal-{{ $role->id }}" tabindex="-1"
                                        aria-labelledby="deleteSuperAdminModal-{{$role->id}}-label"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="deleteSuperAdminModal-{{$role->id}}-label">
                                                        Confirm Delete Role</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this Role?</p>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        value="{{ $role->name }}" readonly>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{route('roles.destroy', $role->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    @endsection
