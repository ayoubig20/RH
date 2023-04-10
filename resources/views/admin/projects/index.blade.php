@extends('layouts.admin')
{{-- @section('style')
{.hidden-content {
    display: none !important;
}

.view-more,
.view-less {
    display: block !important;
    margin-top: 10px !important;
}} --}}

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
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button"
                            class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                                link</a>
                        </div>
                    </div>
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
                <div class="content-page">
                    <div class="content">

                        <!-- Start Content-->
                        <div class="container-fluid">

                            <!-- start page title -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box">
                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                                                <li class="breadcrumb-item active">Projects List</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Projects List</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title -->

                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    {{-- <a href="apps-projects-add.html" class="btn btn-danger rounded-pill mb-3"><i
                                            class="mdi mdi-plus"></i> Create Project</a> --}}
                                    <!-- Button trigger modal -->
                                    <button style="    color: #FFF;
                background-color: #4F46E5;"
                                        type="button" class="btn btn rounded " data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">add
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
                                                    action="{{ route('admin.projects.store') }}">
                                                    {{ csrf_field() }}

                                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                        <label for="name" class="col-md-4 control-label">Name</label>

                                                        <div class="col">
                                                            <input id="name" type="text" class="form-control"
                                                                name="name" value="{{ old('name') }}" required
                                                                autofocus>

                                                            @if ($errors->has('name'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                                        <label for="category"
                                                            class="col-md-4 control-label">Category</label>

                                                        <div class="col">
                                                            <select id="category" class="form-control" name="category"
                                                                required>
                                                                <option value="">Select a category</option>
                                                                @foreach ($viewData['categorys'] as $category)
                                                                    <option value="{{ $category->getId() }}"
                                                                        {{ $category->getId() == $category->getName() ? 'selected' : '' }}>
                                                                        {{ $category->getName() }}</option>
                                                                @endforeach
                                                            </select>

                                                            @if ($errors->has('category'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('category') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
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

                                                    <div
                                                        class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                                                        <label for="document"
                                                            class="col-md-4 control-label">Document</label>

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
                                                                name="start_date" value="{{ old('start_date') }}"
                                                                required>

                                                            @if ($errors->has('start_date'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('start_date') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
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


                                                    <div
                                                        class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">

                                                        <div class="form-group">
                                                            <div class="col">

                                                                <label for="priority">Priority</label>
                                                                <select class="form-control" id="priority"
                                                                    name="priority" required>
                                                                    <option value="">choice Priority</option>
                                                                    <option value="highest"
                                                                        {{ old('priority') == 'highest' ? 'selected' : '' }}>
                                                                        highest</option>
                                                                    <option value="Medium"
                                                                        {{ old('priority') == 'medium' ? 'selected' : '' }}>
                                                                        Medium
                                                                    </option>
                                                                    <option value="High"
                                                                        {{ old('priority') == 'low' ? 'selected' : '' }}>
                                                                        low
                                                                    </option>
                                                                    <option value="High"
                                                                        {{ old('priority') == 'lowest' ? 'selected' : '' }}>
                                                                        lowest
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
                                                            <button type="submit" class="btn btn-primary">
                                                                create project </button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <div class="btn-group mb-3">
                                        <button type="button" class="btn btn-primary">All</button>
                                    </div>
                                    <div class="btn-group mb-3 ms-1">
                                        <button type="button" class="btn btn-light">Ongoing</button>
                                        <button type="button" class="btn btn-light">Finished</button>
                                    </div>
                                    <div class="btn-group mb-3 ms-2 d-none d-sm-inline-block">
                                        <button type="button" class="btn btn-secondary"><i
                                                class="ri-function-line"></i></button>
                                    </div>
                                    <div class="btn-group mb-3 d-none d-sm-inline-block">
                                        <button type="button" class="btn btn-link text-muted"><i
                                                class="ri-list-check-2"></i></button>
                                    </div>
                                </div>
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
                        <div class="row">
                            @foreach ($projects as $project)
                                <div class="col-md-6 col-xxl-3">
                                    <!-- project card -->
                                    <div class="card d-block">
                                        <?php
                                        $imagePath = asset($project->image); // Get the path to the image
                                    
                                        if (file_exists($imagePath)) { // Check if the image exists
                                            $imageSrc = $imagePath; // If the image exists, set the source to the image path
                                        } else {
                                            $imageSrc = "assets/images/gallery/09.png"; // If the image does not exist, set the source to a default image path
                                        }
                                        ?>
                                    
                                        <img class="card-img-top" src="<?php echo asset($imageSrc); ?>" alt="project image cap">
                                        <div class="card-img-overlay">
                                            <div class="badge bg-success p-1">Finished</div>
                                        </div>                              
                                        <div class="card-body position-relative">
                                           
                                            
                                            <!-- project title-->
                                            <h4 class="mt-0">
                                                <a href="apps-projects-details.html"
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
                                                    <b>21</b> Tasks
                                                </span>

                                            </p>
                                            <div id="tooltip-container">
                                                <a href="javascript:void(0);" data-bs-container="#tooltip-container"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Mat Helme"
                                                    class="d-inline-block">
                                                    <img src="assets/images/users/avatar-6.jpg"
                                                        class="rounded-circle avatar-xs" alt="friend">
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="d-inline-block text-muted fw-bold ms-2">
                                                    +7 more
                                                </a>
                                            </div>
                                        </div> <!-- end card-body-->
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item p-3">
                                                <!-- project progress-->
                                                <p class="mb-2 fw-bold">Progress <span class="float-end">100%</span>
                                                </p>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                                        aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                                    </div><!-- /.progress-bar -->
                                                </div><!-- /.progress -->
                                            </li>
                                        </ul>
                                    </div> <!-- end card-->
                                </div> <!-- container -->
                            @endforeach

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
        @endsection
