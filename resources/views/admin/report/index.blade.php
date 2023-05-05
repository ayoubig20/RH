@extends('layouts.admin')
@section('style')
    <link href="assets/plugins/datetimepicker/css/classic.css" rel="stylesheet" />
    <link href="assets/plugins/datetimepicker/css/classic.time.css" rel="stylesheet" />
    <link href="assets/plugins/datetimepicker/css/classic.date.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

@endsection
@section('title', 'Report')

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
                            <li class="breadcrumb-item active" aria-current="page">Data Rapport Projects</li>
                        </ol>
                    </nav>
                </div>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>error</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- row -->
            <div class="row">

                <div class="col-xl-12">
                    <div class="card mg-b-20">


                        <div class="card-header pb-0">

                            <form action="/Search_project" method="POST" role="search" autocomplete="off">
                                {{ csrf_field() }}

                                <div class="col-12">
                                    <div class="text-center text-bold">
                                        <h3 class="page-title"><strong>Projects Reports
                                            </strong></h3>
                                    </div>
                                </div>                                <hr />
                                <div class="col-lg-3">
                                    <label class="rdiobox">
                                        <input checked name="rdio" type="radio" value="1" id="type_div">
                                        <span>search by status</span></label>
                                </div>


                                <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                    <label class="rdiobox"><input name="rdio" value="2" type="radio"><span>
                                            search by id </span></label>
                                </div><br><br>

                                <div class="row">
                                    <div class="col-lg-3 mg-t-20 mg-lg-t-0" id="type">
                                        <p class="mg">Choose status</p>
                                        <select class="form-control select2" name="type" required>
                                            <option value="{{ $type ?? 'Choose status' }}" selected>
                                                {{ $type ?? 'Choose status' }}
                                            </option>
                                            <option value='all'>all</option>
                                            <option value='Panding'>Panding</option>
                                            <option value='In progress'>In progress</option>
                                            <option value='Finshed'>Finshed</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-3 mg-t-20 mg-lg-t-0" id="projectId">
                                        <p class="mg-b-10">search by id Project</p>
                                        <input type="text" class="form-control" id="projectId" name="projectId">

                                    </div><!-- col-4 -->

                                    <div class="col-lg-3" id="start_at">
                                        <label for="exampleFormControlSelect1">start date</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class='bx bxs-calendar'></i>
                                                </div>
                                            </div><input class="form-control fc-datepicker" id="date2"
                                                value="{{ $start_at ?? '' }}" name="start_at" placeholder="YYYY-MM-DD"
                                                type="text">
                                        </div><!-- input-group -->
                                    </div>

                                    <div class="col-lg-3" id="end_at">
                                        <label for="exampleFormControlSelect1">end date</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class='bx bxs-calendar'></i>
                                                </div>
                                            </div><input class="form-control fc-datepicker" name="end_at" id="date1"
                                                value="{{ $end_at ?? '' }}" placeholder="YYYY-MM-DD" type="text">
                                        </div><!-- input-group -->
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col-sm-1 col-md-1">
                                        <button class="btn btn-primary btn-block">search</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if (isset($details))
                                    <table id="example2" class="table key-buttons text-md-nowrap"
                                        style=" text-align: center">
                                        <thead class="table-dark table-bordered mb-0">
                                            <tr>
                                                <th class="border-bottom-0">#</th>
                                                <th class="border-bottom-0">Project Name</th>
                                                <th class="border-bottom-0">Project ID</th>
                                                <th class="border-bottom-0">Date created</th>
                                                <th class="border-bottom-0">Due date</th>
                                                <th class="border-bottom-0">Category</th>
                                                <th class="border-bottom-0">Status</th>
                                                <th class="border-bottom-0">Priority</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($details as $project)
                                                <?php $i++; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $project->name }}</td>
                                                    <td>{{ $project->id }}</td>
                                                    <td>{{ $project->start_date->format('d-m-Y') }}</td>
                                                    <td>{{ $project->end_date->format('d-m-Y') }}</td>
                                                    <td>{{ $project->category->name }}</td>
                                                    <td>
                                                        @if ($project->status == 'Finshed')
                                                            <span class="badge bg-success">{{ $project->status }}</span>
                                                        @elseif ($project->status == 'In progress')
                                                            <span class="badge bg-info ">{{ $project->status }}</span>
                                                        @elseif ($project->status == 'Panding')
                                                            <span class="badge bg-info">{{ $project->status }}</span>
                                                        @else
                                                            <span class="badge bg-secondary">{{ $project->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td style="padding: 5px;">
                                                        @if ($project->priority == 'high')
                                                            <span class="badge bg-danger ">{{ $project->priority }}</span>
                                                        @elseif ($project->priority == 'Medium')
                                                            <span
                                                                class="badge bg-warning ">{{ $project->priority }}</span>
                                                        @else
                                                            <span class="badge bg-info ">{{ $project->priority }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- datepicker --}}
    <script src="assets/plugins/datetimepicker/js/legacy.js"></script>
    <script src="assets/plugins/datetimepicker/js/picker.js"></script>
    <script src="assets/plugins/datetimepicker/js/picker.time.js"></script>
    <script src="assets/plugins/datetimepicker/js/picker.date.js"></script>
    <script src="assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
    <script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
    <script>
        $('.datepicker').pickadate({
                selectMonths: true,
                selectYears: true
            }),
            $('.timepicker').pickatime()
    </script>
    <script>
        $(function() {

            $('#date1').bootstrapMaterialDatePicker({
                time: false
            });
            $('#date2').bootstrapMaterialDatePicker({
                time: false
            });

        });
    </script>
    {{-- -----------------------  end------------------------------------------- --}}
    
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>

    <script>
        $(document).ready(function() {
            $('#projectId').hide();
            $('input[type="radio"]').click(function() {
                if ($(this).attr('id') == 'type_div') {
                    $('#projectId').hide();
                    $('#type').show();
                    $('#start_at').show();
                    $('#end_at').show();
                } else {
                    $('#projectId').show();
                    $('#type').hide();
                    $('#start_at').hide();
                    $('#end_at').hide();
                }
            });
        });
    </script>
@endsection
