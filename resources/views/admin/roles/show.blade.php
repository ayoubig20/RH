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
                        <h3 class="page-title">Show Role and permission
                        </h3>
                    </div>
                </div>
                @include('layouts.notify')

                <div class="pull-right">
                    <a class="btn " style="color: #FFF;
                    background-color: #4F46E5;"
                        href="{{ route('roles.index') }}">Back</a>
                    <div></br></div>
                </div>
                <div class="row m-auto">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                           <strong>{{ $role->name }}</strong> 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permissions:</strong>
                            @if (!empty($rolePermissions))
                                @php $count = 0; @endphp
                                @foreach ($rolePermissions as $v)
                                    @if ($count % 2 == 0)
                                        <div class="row">
                                    @endif
                                    <div class="col-md-6">
                                        <label class="label label-success">{{ $v->name }}</label>
                                    </div>
                                    @php $count++; @endphp
                                    @if ($count % 2 == 0)
                        </div>
                        @endif
                        @endforeach
                        @if ($count % 2 != 0)
                    </div>
                    @endif
                    @endif
                </div>

            </div>
        </div>
    </div>
 

@endsection
