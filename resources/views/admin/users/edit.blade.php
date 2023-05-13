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
                        <h3 class="page-title">Edit Administrator
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
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row m-auto">
                        <div class="col-md-6">
                            <label for="lastName" class="form-label"><strong>Name:</strong></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-user"></i></span>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}"" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email" required
                                    value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="col-md-6">

                            <label for="password" class="form-label"><strong>Password</strong> <span
                                    class="badge rounded-pill bg-warning">If you dont wante change old password late
                                    empty</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-lock"></i></span>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password">
                            </div>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 my-1">
                            <label for="confirm-password"><strong> Confirm Password</strong></label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-lock"></i></span>
                                <input type="password" class="form-control @error('confirm-password') is-invalid @enderror"
                                    id="confirm-password" name="confirm-password">
                            </div>
                            @error('confirm-password')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-12 my-1">
                            <div class="form-group">
                                <strong>Role:</strong>
                                <select name="roles[]" class="form-control" multiple>
                                    @foreach ($roles as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ old('roles.' . $key, $user->hasRole($key)) ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
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
