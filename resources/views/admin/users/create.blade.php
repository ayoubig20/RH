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
                        <h3 class="page-title">Create New Administrator
                        </h3>
                    </div>
                </div>
                @include('layouts.notify')

                <div class="pull-right">
                    <a class="btn" style="color: #FFF;
                    background-color: #4F46E5;"
                        href="{{ route('users.index') }}"> Back</a>
                </div>
                <div></br></div>
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="row m-auto">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password"><i class="bx bx-lock"></i>Password:</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="confirm-password"><i class="bx bx-lock"></i>Confirm Password:</label>
                                <input type="password" name="confirm-password" id="confirm-password" class="form-control"
                                    placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Role:</strong>
                                <select name="roles[]" class="form-control" multiple>
                                    @foreach ($roles as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
