@extends('layouts.employee')


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
            @include('layouts.notify')

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">

                                    <h4 class="page-title">Projects Card</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row mb-2">
                            <div class="col-sm-4">
                              
                                <button style="    color: #FFF;
                background-color: #4F46E5;" type="button"
                                    class="btn btn rounded " data-bs-toggle="modal" data-bs-target="#exampleModal">add
                                    Projects</button>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">add Project</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form class="form-horizontal" enctype="multipart/form-data"method="POST"
                                                action="{{ route('employee.projects.store') }}">
                                                {{ csrf_field() }}

                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="name" class="col-md-4 control-label">Name</label>

                                                    <div class="col">
                                                        <input id="name" type="text" class="form-control"
                                                            name="name" value="{{ old('name') }}" required autofocus>

                                                        @if ($errors->has('name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div
                                                    class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                                    <label for="category_id" class="col-md-4 control-label">Category</label>

                                                    <div class="col">
                                                        <select id="category_id" class="form-control" name="category_id"
                                                            required>
                                                            <option value="">Select a category</option>
                                                            @foreach ($viewData['categorys'] as $category)
                                                                <option value="{{ $category->getId() }}"
                                                                    {{ $category->getId() == $category->getName() ? 'selected' : '' }}>
                                                                    {{ $category->getName() }}</option>
                                                            @endforeach
                                                        </select>

                                                        @if ($errors->has('category_id'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('category_id') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                                    <label for="image" class="col-md-4 control-label">Image</label>

                                                    <div class="col-md-6">
                                                        <input id="image" type="file" class="form-control"
                                                            name="image">

                                                        @if ($errors->has('image'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('image') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                                                    <label for="document" class="col-md-4 control-label">Document</label>

                                                    <div class="col-md-6">
                                                        <input id="document" type="file" class="form-control"
                                                            name="document">

                                                        @if ($errors->has('document'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('document') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div
                                                    class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                                    <label for="start_date" class="col-md-4 control-label">started
                                                        date</label>

                                                    <div class="col">
                                                        <input id="start_date" type="date" class="form-control"
                                                            name="start_date" value="{{ old('start_date') }}" required>

                                                        @if ($errors->has('start_date'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('start_date') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                                    <label for="end_date" class="col-md-4 control-label">End
                                                        date</label>

                                                    <div class="col">
                                                        <input id="end_date" type="date" class="form-control"
                                                            name="end_date" value="{{ old('end_date') }}" required>

                                                        @if ($errors->has('end_date'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('end_date') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">

                                                    <div class="form-group">
                                                        <div class="col">

                                                            <label for="priority">Priority</label>
                                                            <select class="form-control" id="priority" name="priority"
                                                                required>
                                                                <option value="">choice Priority</option>
                                                                <option value="high"
                                                                    {{ old('priority') == 'high' ? 'selected' : '' }}>
                                                                    high</option>
                                                                <option value="Medium"
                                                                    {{ old('priority') == 'medium' ? 'selected' : '' }}>
                                                                    Medium
                                                                </option>
                                                                <option value="High"
                                                                    {{ old('priority') == 'low' ? 'selected' : '' }}>
                                                                    low
                                                                </option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    @if ($errors->has('priority'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('priority') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>


                                                <div
                                                    class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                                    <label for="description"
                                                        class="col-md-4 control-label">Description</label>

                                                    <div class="col">
                                                        <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>

                                                        @if ($errors->has('description'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('description') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col col-md-offset-4">
                                                        <button type="submit" class="btn btn-success">
                                                            create project </button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-sm-end">
                            <div class="col-auto float-right ml-auto">
                                <div class="btn-group mb-3 d-none d-sm-inline-block">
                                    <a href="{{ route('employee.projects.index', ['view' => 'card']) }}"
                                        class="btn btn-muted {{ request()->get('view') == 'card' ? 'active' : '' }}"><i
                                            class='bx bxs-grid-alt'></i></a>
                                    <a href="{{ route('employee.projects.index', ['view' => 'list']) }}"
                                        class="btn btn-muted {{ request()->get('view') != 'card' ? 'active' : '' }}"><i
                                            class='bx bx-list-ul'></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row-->
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4">
                        @foreach ($projects as $project)
                            <div class="col-md-6 col-xxl-3 mb-4">
                                <!-- project card -->
                                <div class="card d-block h-100">
                                    <?php
                                    $imagePath = 'storage/assets/projects/' . $project->image; // Get the path to the image
                                    
                                    if (file_exists($imagePath)) {
                                        // Check if the image exists
                                        $imageSrc = $imagePath; // If the image exists, set the source to the image path
                                    } else {
                                        $imageSrc = 'storage/assets/projects/project-4.jpg'; // If the image does not exist, set the source to a default image path
                                    }
                                    ?>

                                    <img class="card-img-top" src="<?php echo asset($imageSrc); ?>" alt="project image cap">
                                    <div class="card-img-overlay">
                                        {{-- <div class="badge bg-success p-1">{{ $project->status }}</div> --}}
                                        @if ($project->status == 'Panding')
                                            <span class="badge bg-info p-1">{{ $project->status }}</span>
                                        @elseif ($project->status == 'In progress')
                                            <span class="badge bg-warning p-1">{{ $project->status }}</span>
                                        @else
                                            <span class="badge bg-success p-1">{{ $project->status }}</span>
                                        @endif
                                        {{-- <div class="badge bg-success p-1">{{ $project->status }}</div> --}}
                                    </div>
                                    <div class="card-body position-relative">


                                        <!-- project title-->
                                        <h4 class="mt-0">
                                            <a href="{{ route('employee.projects.show', $project->id) }}"
                                                class="text-title">{{ $project->name }}</a>
                                        </h4>
                                        <p class="text-muted font-13 my-3 project-description">
                                            {{ Str::limit($project->description, $limit = 150, $end = '...') }}
                                            {{-- <a href="javascript:void(0);" class="fw-bold text-muted view-more">view more</a> --}}
                                        </p>

                                        {{-- <div class="hidden-content">
                                                    <p>{{ $project->description }}</p>
                                                    <a href="javascript:void(0);" class="fw-bold text-muted view-less">view less</a>
                                                </div> --}}

                                        <!-- project detail-->
                                        <p class="mb-1">
                                            <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                                <i class="mdi mdi-format-list-bulleted-type text-muted"></i>
                                                <b>{{ $project->totalTasks() }}</b> Tasks
                                            </span>

                                        </p>
                                        <div id="tooltip-container">
                                            @php
                                                $uniqueEmployees = $project->tasks->unique(function ($task) {
                                                    return $task->employee->id;
                                                });
                                            @endphp

                                            @foreach ($uniqueEmployees as $task)
                                                <a href="{{ route('employee.employees.show',  $task->employee->getId()) }}"
                                                    class="team-member-avatar"
                                                    title="{{  $task->employee->firstName }} {{  $task->employee->lastName }}"
                                                    data-toggle="tooltip"
                                                    style="position: relative; display: inline-block; margin-right: 10px;">
                                                    <img src="{{ asset('storage/assets/users/' . $task->employee->image) }}"
                                                        class="user-img" alt="user avatar">


                                                </a>
                                            @endforeach

                                            @if ($project->tasks->count() > 3)
                                                <a href="javascript:void(0);"
                                                    class="d-inline-block text-muted fw-bold ms-2"
                                                    onclick="updateHeading('')">
                                                    +{{ $project->tasks->count() - 3 }} more
                                                </a>
                                            @endif
                                        </div>
                                        <div id="image-heading"></div>
                                    </div> <!-- end card-body-->
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item p-3">
                                            <!-- project progress-->

                                            <p class="mb-2 fw-bold">Progress <span
                                                    class="float-end">{!! $project->progression() !!}%</span></p>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar
                                                        @if ($project->progression() < 50) bg-warning
                                                        @elseif ($project->progression() >= 50 && $project->progression() < 75)
                                                            bg-info
                                                        @else
                                                            bg-success @endif
                                                        "
                                                    role="progressbar" aria-valuenow="{!! $project->progression() !!}"
                                                    aria-valuemin="0" aria-valuemax="100"
                                                    style="width: {!! $project->progression() !!}%;">
                                                </div><!-- /.progress-bar -->
                                            </div>
                                        </li>
                                    </ul>


                                </div> <!-- end card-->
                            </div> <!-- container -->
                        @endforeach

                    </div> <!-- end col -->
                </div> <!-- end col -->

            </div> <!-- content -->

        </div>
    </div>

    {{-- issue i didnit fixed to make javascript work css issue --}}
    {{-- <script>
            $('.view-more').click(function() {
                $(this).closest('.project-description').hide();
                $(this).closest('.project-description').next('.hidden-content').slideDown();
            });

            $('.view-less').click(function() {
                $(this).closest('.hidden-content').slideUp();
                $(this).closest('.hidden-content').prev('.project-description').show();
            });
        </script> --}}
    <script>
        // Initialize all tooltips with default settings
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('.avatar-tooltip'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        // Change the background color of the tooltip
        var tooltipEl = document.querySelector('.avatar-tooltip')
        tooltipEl.style.backgroundColor = 'red'

        // Update the tooltip content dynamically
        var tooltipTriggerEl = document.querySelector('.avatar-tooltip')
        tooltipTriggerEl.setAttribute('data-bs-original-title', 'New tooltip content')

        // Add a custom function to be called when the tooltip is shown
        var tooltipTriggerEl = document.querySelector('.avatar-tooltip')
        tooltipTriggerEl.addEventListener('shown.bs.tooltip', function() {
            console.log('The tooltip was shown')
        })
    </script>


@endsection
