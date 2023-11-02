@extends('layouts.employee')
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
                        <!--end row-->
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
                            {{-- <div class="col">
                                <div style="background-color: rgb(123, 104, 238);" class="card text-white text-center">
                                    <div class="card-body">
                                        <h3 class="text-white">Total Tasks</h3>
                                        <strong>
                                            <h4 class="text-center text-white">{{ $viewData['numTasks'] }}</h4>
                                        </strong>
                                    </div>
                                </div>

                            </div> --}}
                            <div class="col-xl-6 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 p-0">
                                    <div class="card-body d-flex justify-content-start align-items-center p-0 m-0">
                                        <div class="container py-2 mx-2 d-flex justify-content-between  align-items-end">
                                            <div class=" mr-2">
                                                <h6>
                                                    <p class="mb-3  bold text-success text-uppercase">Total Tasks</p>
                                                </h6>
                                                <span class="h5 mt-3 font-weight-bold text-secondary">
                                                    {{ $viewData['numTasks'] }}
                                                </span>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    height="50px"style="fill-opacity:30%;fill:#15ca20;" stroke-width="10"
                                                    viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    <path
                                                        d="M280 64h40c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128C0 92.7 28.7 64 64 64h40 9.6C121 27.5 153.3 0 192 0s71 27.5 78.4 64H280zM64 112c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320c8.8 0 16-7.2 16-16V128c0-8.8-7.2-16-16-16H304v24c0 13.3-10.7 24-24 24H192 104c-13.3 0-24-10.7-24-24V112H64zm128-8a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 mb-4 ">
                                <div class="card border-left-primary shadow h-100 p-0">
                                    <div class="card-body d-flex justify-content-start align-items-center p-0 m-0">
                                        <div class="container py-2 mx-2 d-flex justify-content-between  align-items-end">
                                            <div class=" mr-2">
                                                <h6>
                                                    <p class="mb-3  bold text-primary text-uppercase">Total Projects</p>
                                                    <span class="h5 mt-3 font-weight-bold text-secondary">
                                                        {{ $viewData['numProject'] }}
                                                    </span>
                                                </h6>
                                            </div>
                                            <div class="col-auto">
                                                {{-- <i class="fas fa-atom fa-2xl text-perso"></i> --}}
                                                <svg xmlns="http://www.w3.org/2000/svg" height="50px"
                                                    style="fill-opacity:30%;fill:#008cff;"
                                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    <path
                                                        d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col">
                                <div style="background-color: rgb(123, 104, 238);" class="card text-white text-center">
                                    <div class="card-body">
                                        <h3 class="text-white">Total Projects</h3>
                                        <strong>
                                            <h4 class="text-center text-white">{{ $viewData['numProject'] }}</h4>
                                        </strong>
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                        <!--end row-->

                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
                            <div class="col-md-12 d-flex">
                                <div class="card radius-10 w-100">
                                    <div class="card-body">
                                        <div class="col">
                                            <div class="text-center">
                                                <span class="badge  m-auto text-center" style="background-color:#8971d0">
                                                    <h4 class="mb-0 text-white text-center"> Tasks Priority</h4>
                                                </span>
                                            </div> </br>
                                            <div class="card  text-white" style="background-color:#8665db;">

                                                <div class="card-body">
                                                    <h3>High Priority Tasks</h3>
                                                    <strong>
                                                        <h4 class="text-center">{{ $viewData['priorityHighTasks'] }}</h4>
                                                    </strong>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="card"style="background-color: #8665db;">
                                                <div class="card-body">
                                                    <h3>Medium Priority tasks</h3>
                                                    <strong>
                                                        <h4 class="text-center">{{ $viewData['priorityMediumTasks'] }}</h4>
                                                    </strong>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="card  text-white" style="background-color:#8665db;">
                                                <div class="card-body">
                                                    <h3>Low Priority Tasks</h3>
                                                    <strong>
                                                        <h4 class="text-center">{{ $viewData['priorityLowTasks'] }}</h4>
                                                    </strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="card radius-10 w-100">
                                    </br>
                                    <div class="text-center">
                                        <span class="badge  m-auto text-center" style="background-color:#8971d0">
                                            <h4 class="mb-0 text-white text-center"> Tasks status</h4>
                                        </span>
                                    </div>
                                    <div class="card-body">

                                        <canvas id="task-chart" style="width: 800px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex">

                                <div class="card radius-10 w-100">
                                    </br>
                                    <div class="text-center">
                                        <span class="badge  m-auto text-center" style="background-color:#8971d0">
                                            <h4 class="mb-0 text-white text-center"> Projects status</h4>
                                        </span>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="chart-order-status"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="background-image: url('{{ URL::asset('assets/images/bg-themes/5.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;"
                            class="card text-white text-center">
                            <h1 class="text-white">Tasks</h1>
                        </div>
                        <!--end row-->
                        <div class="card radius-10">
                            <div class="card-body">
                                <table class="table table-mb-4 text-center table-hover" id="example">
                                    <thead class="table-light text-center text-primary ">
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
                                                                class="badge p-2"
                                                                style="background-color:#8971d0">{{ $task->getProject()->name }}</span></a>
                                                    @else
                                                        <span class="badge p-2" style="background-color:#a6acec">No project
                                                            assigned</span>
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
                    </div>
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
                            'rgb(186, 85, 211)', //
                            'rgb(255, 255, 0)', // yellow
                            'rgb(124, 252, 0)' // green
                        ],
                        hoverBackgroundColor: [
                            'rgb(186, 85, 211)', //
                            'rgb(255, 255, 0)', // yellow
                            'rgb(124, 252, 0)' // green
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
            <script>
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
            </script>

        @section('script')

            <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
            <script>
                $(document).ready(function() {
                    var table = $('#example').DataTable({
                        // paging: true,
                        // pageLength: 5
                    });

                    table.buttons().container()
                        .appendTo('#example_wrapper .col-md-6:eq(0)');
                });
            </script>

        @endsection
    @endsection
