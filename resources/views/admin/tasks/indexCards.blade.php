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

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <h3>A faire</h3>
                            <div class="card-deck">
                                @foreach( $viewData['tasks'] ->where('status', 'to do') as $task)
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $task->title }}</h5>
                                            <p class="card-text">{{ $task->description }}</p>
                                            <a href="{{ route('admin.tasks.edit', $task) }}" class="btn btn-primary">Modifier</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h3>En cours</h3>
                            <div class="card-deck">
                                @foreach ($viewData['tasks']->where('status', 'in_progress') as $task)
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $task->title }}</h5>
                                            <p class="card-text">{{ $task->description }}</p>
                                            <a href="{{ route('admin.tasks.edit', $task) }}" class="btn btn-primary">Modifier</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h3>En attente</h3>
                            <div class="card-deck">
                                @foreach ($viewData['tasks']->where('status', 'pending') as $task)
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $task->title }}</h5>
                                            <p class="card-text">{{ $task->description }}</p>
                                            <a href="{{ route('admin.tasks.edit', $task) }}" class="btn btn-primary">Modifier</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h3>Terminé</h3>
                            <div class="card-deck">
                                @foreach ($viewData['tasks']->where('status','done') as $task)
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $task->title }}</h5>
                                            <p class="card-text">{{ $task->description }}</p>
                                            <a href="{{ route('admin.tasks.edit', $task) }}" class="btn btn-primary">Modifier</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    @endsection
