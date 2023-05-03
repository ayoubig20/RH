@extends('layouts.admin')
@section('title', $viewData['title'])
@section('style')
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="assets/plugins/highcharts/css/highcharts-white.css" rel="stylesheet" />
@endsection
@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">

            <div class="card shadow-none bg-transparent border-bottom border-2">

                <div class="card-body">
                    <div class="row align-items-center">
                        <div style="background-image: url('{{ URL::asset('assets/images/bg-themes/5.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;"
                            class="card text-white text-center">
                            <div class="card-body">
                                @if (auth()->guard('web')->check())
                                    <strong>
                                        <h1 class="text-white">Welcome {{ auth()->guard('web')->user()->name }} <img
                                                src="{{ URL::asset('assets/images/logo.png') }}" class="logo-icon"
                                                alt="logo icon">
                                        </h1>
                                    </strong>
                                @else
                                    <strong>
                                        <h1 class="text-white">Welcome
                                            {{ auth()->guard('employee')->user()->firstName }}
                                        </h1>
                                    </strong>
                                @endif
                            </div>
                        </div>

                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                            <div class="col">
                                <div class="card radius-10 bg-primary bg-gradient">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6>
                                                    <p class="mb-0 text-white bold">Total Projects</p>
                                                </h6>
                                                <h4 class="my-1 text-white">{{ $viewData['numProject'] }}</h4>
                                            </div>
                                            <div class="text-white ms-auto font-35"><i class='bx bx-atom'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card radius-10 bg-danger bg-gradient">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6>
                                                    <p class="mb-0 text-white bold">Total Tasks</p>
                                                </h6>
                                                <h4 class="my-1 text-white">{{ $viewData['numTasks'] }}</h4>
                                            </div>
                                            <div class="text-white ms-auto font-35"><i class='bx bx-task'></i></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card radius-10 bg-warning bg-gradient">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6>
                                                    <p class="mb-0 text-white bold">Total Employees</p>
                                                </h6>
                                                <h4 class="text-white my-1">{{ $viewData['numEmployes'] }}</h4>
                                            </div>
                                            <div class="text-white ms-auto font-35"><i class='bx bxs-user-circle'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card radius-10 bg-success bg-gradient">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <h6>
                                                    <p class="mb-0 text-white bold">Total income</p>
                                                </h6>
                                                <h4 class="my-1 text-white">{{ $viewData['budgets'] }}</h4>
                                            </div>
                                            <div class="text-white ms-auto font-35"><i class='bx bx-dollar'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>

                <!--end row-->

                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
                    <div class="col-md-12 d-flex">
                        <div class="card radius-10 w-100">
                            <div class="card-body">
                                <div class="text-center">
                                    <span class="badge bg-dark m-auto text-center">
                                        <h4 class="mb-0 text-white text-center">Priority Projects</h4>
                                    </span>
                                </div> </br>
                                <div class="col">
                                    <div class="card  text-white" style="background-color:#FF4858;">
                                        <div class="card-body">
                                            <h3>High Priority Projects</h3>
                                            <strong>
                                                <h4 class="text-center">{{ $viewData['priorityHighProject'] }}</h4>
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card"style="background-color:rgb(255, 255, 141);">
                                        <div class="card-body">
                                            <h3>Medium Priority Projects</h3>
                                            <strong>
                                                <h4 class="text-center">{{ $viewData['priorityMediumProject'] }}
                                                </h4>
                                            </strong>

                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card  text-white" style="background-color: rgb(240, 248, 255);">
                                        <div class="card-body">
                                            <h3>Low Priority Projects</h3>
                                            <strong>
                                                <h4 class="text-center">{{ $viewData['priorityLowProject'] }}</h4>
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="card-body">
                                <canvas id="task-chart" style="width: 800px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            </br>
                            <div class="text-center">
                                <span class="badge bg-dark m-auto text-center">
                                    <h4 class="mb-0 text-white text-center"> Projects status</h4>
                                </span>
                            </div> </br>
                            <div class="card-body">
                                <canvas id="chart-order-status"></canvas>
                            </div>
                        </div>
                    </div>

                </div>

                <!--end row-->
                <div style="background-image: url('{{ URL::asset('assets/images/bg-themes/5.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;"
                    class="card text-white text-center">
                    <h1 class="text-white">Projects</h1>
                </div>
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="table-responsive lead-table">
                            <table id="example1" class="table mb-0 align-middle text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Projects</th>
                                        <th>Priority</th>
                                        <th>End date</th>
                                        <th>Status</th>
                                        <th>Progression</th>
                                        <th>Total of tasks</th>
                                        <th>Team</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($viewData['Projects'] as $project)
                                        <?php $i++; ?>
                                        <tr>
                                            <td><strong>{{ $i }}</td></strong>
                                            <td><a href="{{ route('admin.projects.show', $project->getId()) }}"><span
                                                        class="badge bg-dark p-2">{{ $project->getName() }}</span></a>
                                            </td>
                                            <td style="padding: 5px;">
                                                @if ($project->priority == 'high')
                                                    <span class="badge bg-danger ">{{ $project->priority }}</span>
                                                @elseif ($project->priority == 'medium')
                                                    <span class="badge bg-warning ">{{ $project->priority }}</span>
                                                @else
                                                    <span class="badge bg-info ">{{ $project->priority }}</span>
                                                @endif
                                            </td>
                                            <td><strong>{{ $project->end_date->format('d-m-Y') }}</td></strong>

                                            <td>
                                                @if ($project->status == 'Panding')
                                                    <span class="badge bg-info p-1">{{ $project->status }}</span>
                                                @elseif ($project->status == 'In progress')
                                                    <span class="badge bg-warning p-1">{{ $project->status }}</span>
                                                @else
                                                    <span class="badge bg-success p-1">{{ $project->status }}</span>
                                                @endif

                                            </td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar {{ $project->progression() < 50 ? 'bg-warning' : ($project->progression() < 75 ? 'bg-info' : 'bg-success') }}"
                                                        role="progressbar" style="width: {{ $project->progression() }}%"
                                                        aria-valuenow="{{ $project->progression() }}" aria-valuemin="0"
                                                        aria-valuemax="100">
                                                        {{ $project->progression() }}%</div>
                                                </div>
                                            </td>
                                            <td><strong>{{ $project->Totaltasks() }}</strong></td>
                                            <td>
                                                @foreach ($project->tasks->groupBy('employee.id') as $tasksByEmployee)
                                                    @php
                                                        $employee = $tasksByEmployee->first()->employee;
                                                    @endphp
                                                    <div class="team-members text-nowrap">
                                                        <a href="{{ route('admin.employees.show', $employee->getId()) }}"
                                                            class="team-member-avatar"
                                                            title="{{ $employee->firstName }} {{ $employee->lastName }}"
                                                            data-toggle="tooltip">
                                                            <img src="{{ asset('storage/assets/users/' . $employee->image) }}"
                                                                class="user-img" alt="user avatar">
                                                        </a>
                                                        <div class="dropdown avatar-dropdown">

                                                            <div class="dropdown-menu dropdown-menu-right"
                                                                id="avatar-dropdown-{{ $employee->id }}">
                                                                <div class="avatar-group">
                                                                    @foreach ($tasksByEmployee as $task)
                                                                        <a class="avatar avatar-xs" href="#"
                                                                            title="{{ $task->name }}">
                                                                            <img src="{{ asset('storage/assets/users/' . $task->employee->image) }}"
                                                                                class="user-img" alt="user avatar">
                                                                        </a>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div style="background-image: url('{{ URL::asset('assets/images/bg-themes/5.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;"
                    class="card text-white text-center">
                    <h1 class="text-white">Tasks</h1>
                </div>
                <div class="card radius-10">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="table-responsive lead-table">
                                <table id="example" class="table mb-0 align-middle text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Tasks</th>
                                            <th>Projects</th>
                                            <th>Priority</th>
                                            <th>End date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        @foreach ($viewData['tasks'] as $task)
                                            <?php $i++; ?>
                                            <tr>
                                                <td><strong>{{ $i }}</td></strong>
                                                <td><strong>{{ $task->name }}</strong></td>
                                                <td>
                                                    @if ($task->getProject())
                                                        <a
                                                            href="{{ route('employee.projects.show', $task->getProject()->getId()) }}"><span
                                                                class="badge bg-dark p-2">{{ $task->getProject()->name }}</span></a>
                                                    @else
                                                        <span class="badge bg-danger p-2">No project assigned</span>
                                                    @endif
                                                    {{-- <a href="{{ route('admin.projects.show', $task->getProject()->getId()) }}"><span
                                          class="badge bg-dark p-2">{{ $task->getProject()->name }}</span></a></td> --}}
                                                </td>
                                                <td style="padding: 5px;">
                                                    @if ($task->priority == 'high')
                                                        <span class="badge bg-danger ">{{ $task->priority }}</span>
                                                    @elseif ($task->priority == 'Medium')
                                                        <span class="badge bg-warning ">{{ $task->priority }}</span>
                                                    @else
                                                        <span class="badge bg-info ">{{ $task->priority }}</span>
                                                    @endif
                                                </td>
                                                <td><strong>{{ $task->end_date->format('d-m-Y') }}</td></strong>

                                                <td>
                                                    <span
                                                        class="badge {{ $task->status === 'to do' ? 'bg-secondary' : ($task->status === 'in progress' ? 'bg-info' : ($task->status === 'waiting' ? 'bg-warning' : ($task->status === 'done' ? 'bg-success' : 'bg-danger'))) }}">
                                                        {{ $task->status }}
                                                    </span>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                        {{-- charte tasks --}}
                        <script>
                            var taskChart = new Chart(document.getElementById("task-chart"), {
                                type: 'pie',
                                data: {
                                    labels: ['Completed Tasks', 'Tasks in Progress', 'Tasks to do'],
                                    datasets: [{
                                        label: 'Number of Tasks',
                                        backgroundColor: [
                                            '#17a2b8', // Completed Tasks
                                            '#007bff', // Tasks in Progress
                                            '#28a745;' // Tasks to do
                                        ],
                                        data: [{{ $viewData['numCompletedTasks'] }}, {{ $viewData['numProgressTasks'] }},
                                            {{ $viewData['numToDOTasks'] }}
                                        ]
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    title: {
                                        display: true,
                                        text: 'Tasks Overview'
                                    },
                                    maintainAspectRatio: false,
                                    width: 800,
                                    height: 800
                                }
                            });
                        </script>
                        <script src="assets/plugins/chartjs/js/chartjs-custom.js"></script>
                        <script src="https://code.highcharts.com/highcharts.js"></script>
                        <script src="https://code.highcharts.com/modules/exporting.js"></script>
                        <script src="https://code.highcharts.com/modules/export-data.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        {{-- chart projects --}}
                        <script>
                            var data = {
                                labels: ["Pending", "In progress", "Finished"],
                                datasets: [{
                                    label: 'Projects',
                                    data: [{{ $viewData['numToDOTPoject'] }}, {{ $viewData['numProgerssPoject'] }},
                                        {{ $viewData['numCompletedPoject'] }}
                                    ],
                                    backgroundColor: [
                                        'rgb(97, 97, 97)', // gris
                                        'rgb(79, 195, 247)', // bleu
                                        'rgb(105, 240, 174)' // vert
                                    ],
                                    hoverBackgroundColor: [
                                        'rgb(97, 97, 97)', // gris
                                        'rgb(79, 195, 247)', // bleu
                                        'rgb(105, 240, 174)' // vert
                                    ],

                                    borderColor: "#fff",
                                    pointRadius: 6,
                                    pointHoverRadius: 6,
                                    pointHoverBackgroundColor: "#fff",
                                    borderWidth: 2
                                }]
                            };

                            // Get the context of the canvas element
                            var ctx = document.getElementById('chart-order-status').getContext('2d');

                            // Create the chart using the data and options
                            var myChart = new Chart(ctx, {
                                type: 'doughnut',
                                data: data,
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    title: {
                                        display: true,
                                        text: 'Projects Overview',
                                        fontColor: '#585757'
                                    },
                                    legend: {
                                        display: false,
                                    },
                                    tooltips: {
                                        enabled: true,
                                        mode: 'single',
                                        callbacks: {
                                            label: function(tooltipItems, data) {
                                                return data.labels[tooltipItems.index] + ": " + data.datasets[0].data[tooltipItems
                                                    .index];
                                            }
                                        }
                                    },
                                    scales: {
                                        xAxes: [{
                                            ticks: {
                                                fontColor: '#585757'
                                            },
                                            gridLines: {
                                                display: true,
                                                color: "rgba(0, 0, 0, 0.08)"
                                            }
                                        }],
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true,
                                                fontColor: '#585757'
                                            },
                                            gridLines: {
                                                display: false,
                                                color: "rgba(0, 0, 0, 0.08)"
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                        {{-- charte task priority --}}
                        {{-- <script>
                        Highcharts.chart('chart-priority', {
                            chart: {
                                type: 'bar',
                                backgroundColor: '#f5f5f5'
                            },
                            title: {
                                text: 'Tasks by Priority',
                                style: {
                                    fontSize: '24px',
                                    fontWeight: 'bold'
                                }
                            },
                            xAxis: {
                                categories: ['High Priority', 'Medium Priority', 'Low Priority'],
                                labels: {
                                    style: {
                                        fontSize: '16px'
                                    }
                                }
                            },
                            yAxis: {
                                title: {
                                    text: 'Number of Tasks',
                                    style: {
                                        fontSize: '16px'
                                    }
                                },
                                labels: {
                                    style: {
                                        fontSize: '16px'
                                    }
                                }
                            },
                            legend: {
                                enabled: false
                            },
                            tooltip: {
                                pointFormat: '{point.y} tasks'
                            },
                            plotOptions: {
                                bar: {
                                    colorByPoint: true,
                                    colors: ['#FFA500', '#008000', '#0000FF'],
                                    dataLabels: {
                                        enabled: true,
                                        style: {
                                            fontSize: '16px',
                                            textOutline: false
                                        }
                                    }
                                }
                            },
                            series: [{
                                name: 'Tasks',
                                data: [{
                                        y: {{ $viewData['priorityHighTasks'] }},
                                        name: 'High Priority'
                                    },
                                    {
                                        y: {{ $viewData['priorityMediumTasks'] }},
                                        name: 'Medium Priority'
                                    },
                                    {
                                        y: {{ $viewData['priorityLowTasks'] }},
                                        name: 'Low Priority'
                                    }
                                ]
                            }]
                        });
                    </script> --}}

                    @section('script')
                        <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
                        <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
                        <script>
                            $(document).ready(function() {
                                $('#example1').DataTable({
                                    paging: true,
                                    pageLength: 5
                                });
                            });


                            $(document).ready(function() {
                                $('#example').DataTable({
                                    // paging: true,
                                    // pageLength: 5
                                });
                            });
                        </script>

                    @endsection



                </div>
            </div>
        </div>
    </div>

@endsection
