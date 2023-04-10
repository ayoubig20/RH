<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            @foreach ($projects as $project)

                    <div class="row">
                            <div class="col-md-6 col-xxl-3">
                                <!-- project card -->
                                <div class="card d-block">
                                    <!-- project-thumbnail -->
                                    <img class="card-img-top" src="assets/images/projects/project-2.jpg"
                                        alt="project image cap">
                                    <div class="card-img-overlay">
                                        <div class="badge bg-success p-1">Finished</div>
                                    </div>

                                    <div class="card-body position-relative">
                                        <!-- project title-->
                                        <h4 class="mt-0">
                                            <a href="apps-projects-details.html" class="text-title">Landing
                                                page
                                                design - Home</a>
                                        </h4>

                                        <!-- project detail-->
                                        <p class="mb-3">
                                            <span class="pe-2 text-nowrap">
                                                <i class="mdi mdi-format-list-bulleted-type"></i>
                                                <b>11</b> Tasks
                                            </span>
                                            <span class="text-nowrap">
                                                <i class="mdi mdi-comment-multiple-outline"></i>
                                                <b>254</b> Comments
                                            </span>
                                        </p>
                                        <div class="mb-3" id="tooltip-container5">
                                            <a href="javascript:void(0);"
                                                data-bs-container="#tooltip-container5"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Mat Helme" class="d-inline-block">
                                                <img src="assets/images/users/avatar-10.jpg"
                                                    class="rounded-circle avatar-xs" alt="friend">
                                            </a>

                                            <a href="javascript:void(0);"
                                                data-bs-container="#tooltip-container5"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Michael Zenaty" class="d-inline-block">
                                                <img src="assets/images/users/avatar-5.jpg"
                                                    class="rounded-circle avatar-xs" alt="friend">
                                            </a>

                                            <a href="javascript:void(0);"
                                                data-bs-container="#tooltip-container5"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="James Anderson" class="d-inline-block">
                                                <img src="assets/images/users/avatar-7.jpg"
                                                    class="rounded-circle avatar-xs" alt="friend">
                                            </a>
                                            <a href="javascript:void(0);"
                                                class="d-inline-block text-muted fw-bold ms-2">
                                                +2 more
                                            </a>
                                        </div>

                                        <!-- project progress-->
                                        <p class="mb-2 fw-bold">Progress <span class="float-end">100%</span>
                                        </p>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            </div><!-- /.progress-bar -->
                                        </div><!-- /.progress -->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        @endforeach
                    {{-- end --}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection
