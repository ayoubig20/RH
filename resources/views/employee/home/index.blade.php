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
                        <div style="background-color: rgb(72, 209, 204);" class="card text-white text-center">
                            <div class="card-body">
                                @if (auth()->guard('web')->check())
                                    <strong>
                                        <h1 class="text-white">Welcome {{ auth()->guard('web')->user()->name }}</h1>
                                    </strong>
                                @else
                                    <strong>
                                        <h1 class="text-white">Welcome {{ auth()->guard('employee')->user()->firstName }}
                                        </h1>
                                    </strong>
                                @endif
                            </div>
                        </div>
                        <!--end row-->
                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
                            <div class="col">
                                <div style="background-color: rgb(123, 104, 238);" class="card text-white text-center">
                                    <div class="card-body">
                                        <h3 class="text-white">Total Tasks</h3>
                                        <strong>
                                            <h4 class="text-center text-white">{{ $viewData['numTasks'] }}</h4>
                                        </strong>
                                    </div>
                                </div>

                            </div>
                            <div class="col">
                                <div style="background-color: rgb(123, 104, 238);" class="card text-white text-center">
                                    <div class="card-body">
                                        <h3 class="text-white">Total Projects</h3>
                                        <strong>
                                            <h4 class="text-center text-white">{{ $viewData['numProject'] }}</h4>
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end row-->

                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
                            <div class="col-md-12 d-flex">
                                <div class="card radius-10 w-100">
                                    <div class="card-body">
                                        <div class="col">
                                            <div class="card  text-white" style="background-color:#FF4858;">
                                                <div class="card-body">
                                                    <h3>High Priority Tasks</h3>
                                                    <strong>
                                                        <h4 class="text-center">{{ $viewData['priorityHighTasks'] }}</h4>
                                                    </strong>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="card"style="background-color: #FFEC5C;">
                                                <div class="card-body">
                                                    <h3>Medium Priority tasks</h3>
                                                    <strong>
                                                        <h4 class="text-center">{{ $viewData['priorityMediumTasks'] }}</h4>
                                                    </strong>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="card  text-white" style="background-color: rgb(240, 248, 255);">
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
                                    <div class="card-body">
                                        <canvas id="task-chart" style="width: 800px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="card radius-10 w-100">
                                    <div class="card-body">
                                        <canvas id="chart-order-status"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end row-->
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="table-responsive lead-table">
                                    <table class="table mb-0 align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Tasks</th>
                                                <th>Projects</th>
                                                <th>Status</th>
                                                <th>End date</th>
                                                <th>Priority</th>
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


            @endsection
