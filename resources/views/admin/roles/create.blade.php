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


            <div class="card">
                <div class="col-12">
                    <div class="text-center text-bold">
                        <h3 class="page-title">Create New Roles and permissions
                        </h3>
                    </div>
                </div>
                @include('layouts.notify')

                <div class="pull-right">
                    <a class="btn " style="color: #FFF;
                    background-color: #4F46E5;" href="{{ route('roles.index') }}"> Back</a>
                </div>

                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    <div class="row m-auto">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="name"><strong>Name:</strong></label>
                                <input type="text" name="name" placeholder="Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Permission:</strong>
                                <br />
                                @foreach ($permission as $value)
                                    <label><input type="checkbox" name="permission[]" value="{{ $value->id }}"
                                            class="name">
                                        {{ $value->name }}</label>
                                    <br />
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    @endsection
