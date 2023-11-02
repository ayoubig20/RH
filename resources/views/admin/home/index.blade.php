@extends('layouts.admin')
@section('title', $viewData['title'])
@section('style')
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">

            <div class="card shadow-none bg-transparent border-bottom border-2">

                <div class="card-body">
                    <div class="row align-items-center">


                        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">

                            <div class="col-xl-3 col-md-6 mb-4 ">
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

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 p-0">
                                    <div class="card-body d-flex justify-content-start align-items-center p-0 m-0">
                                        <div class="container py-2 mx-2 d-flex justify-content-between  align-items-end">
                                            <div class=" mr-2">
                                                <h6>
                                                    <p class="mb-3  bold text-success text-uppercase">Total Tasks</p>
                                                </h6>
                                                <span class="h5 mt-3 font-weight-bold text-gray-800">
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

                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 p-0">
                                    <div class="card-body d-flex justify-content-start align-items-center p-0 m-0">
                                        <div class="container py-2 mx-2 d-flex justify-content-between  align-items-end">
                                            <div class=" mr-2">
                                                <h6>
                                                    <p class="mb-3 bold text-info text-uppercase">Total Employees</p>
                                                </h6>
                                                <span class="h5 mt-3 font-weight-bold text-secondary">
                                                    {{ $viewData['numEmployes'] }}
                                                </span>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    height="50px"style="fill-opacity:30%;fill:#0dcaf0;"viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    <path
                                                        d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                                                </svg>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col">
                            <div class="card radius-10 " style="background: #64379f"">
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
                        </div> --}}
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 p-0">
                                    <div class="card-body d-flex justify-content-start align-items-center p-0 m-0">
                                        <div class="container py-2 mx-2 d-flex justify-content-between  align-items-end">
                                            <div class=" mr-2">
                                                <h6>
                                                    <p class="mb-3 bold text-warning text-uppercase">Total
                                                        income</p>
                                                </h6>
                                                <span class="h5 mt-3 font-weight-bold text-secondary">
                                                    {{ $viewData['budgets'] }}
                                                </span>
                                            </div>
                                            <div class="col-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="50px"
                                                    style="fill-opacity:30%; fill:#ffc107;"
                                                    viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    <path
                                                        d="M160 0c17.7 0 32 14.3 32 32V67.7c1.6 .2 3.1 .4 4.7 .7c.4 .1 .7 .1 1.1 .2l48 8.8c17.4 3.2 28.9 19.9 25.7 37.2s-19.9 28.9-37.2 25.7l-47.5-8.7c-31.3-4.6-58.9-1.5-78.3 6.2s-27.2 18.3-29 28.1c-2 10.7-.5 16.7 1.2 20.4c1.8 3.9 5.5 8.3 12.8 13.2c16.3 10.7 41.3 17.7 73.7 26.3l2.9 .8c28.6 7.6 63.6 16.8 89.6 33.8c14.2 9.3 27.6 21.9 35.9 39.5c8.5 17.9 10.3 37.9 6.4 59.2c-6.9 38-33.1 63.4-65.6 76.7c-13.7 5.6-28.6 9.2-44.4 11V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V445.1c-.4-.1-.9-.1-1.3-.2l-.2 0 0 0c-24.4-3.8-64.5-14.3-91.5-26.3c-16.1-7.2-23.4-26.1-16.2-42.2s26.1-23.4 42.2-16.2c20.9 9.3 55.3 18.5 75.2 21.6c31.9 4.7 58.2 2 76-5.3c16.9-6.9 24.6-16.9 26.8-28.9c1.9-10.6 .4-16.7-1.3-20.4c-1.9-4-5.6-8.4-13-13.3c-16.4-10.7-41.5-17.7-74-26.3l-2.8-.7 0 0C119.4 279.3 84.4 270 58.4 253c-14.2-9.3-27.5-22-35.8-39.6c-8.4-17.9-10.1-37.9-6.1-59.2C23.7 116 52.3 91.2 84.8 78.3c13.3-5.3 27.9-8.9 43.2-11V32c0-17.7 14.3-32 32-32z" />
                                                </svg>
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
                                    <span class="badge m-auto text-center" style="background-color:#5f2fb2">
                                        <h4 class="mb-0 text-white text-center">Priority Projects</h4>
                                    </span>
                                </div> <br>
                                <div class="col">
                                    <div class="card  text-white" style="background-color:#A16AE8;">
                                        <div class="card-body">
                                            <h3>High Priority Projects</h3>
                                            <strong>
                                                <h4 class="text-center">{{ $viewData['priorityHighProject'] }}</h4>
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card"style="background-color:#A16AE8;">
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
                                    <div class="card  text-white" style="background-color: #A16AE8;">
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
                                <span class="badge m-auto text-center">
                                    <h4 class="mb-0 text-white text-center" style="background-color:#5f2fb2;"> Projects
                                        status</h4>
                                </span>
                            </div> </br>
                            <div class="card-body">
                                <canvas id="chart-order-status"></canvas>
                            </div>
                        </div>
                    </div>

                </div>

                <!--end row-->
                <div style="background-color:#5f2fb2; background-size: cover; background-position: center; background-repeat: no-repeat;"
                    {{-- <div style="background-image: url('{{ URL::asset('assets/images/bg-themes/5.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;" --}} class="card text-white text-center">
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
                                                        class="badge  p-2"
                                                        style="background-color:#5f2fb2;">{{ $project->getName() }}</span></a>
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

                                                        <div class="avatar-group">
                                                            <a href="{{ route('admin.employees.show', $employee->getId()) }}"
                                                                class="team-member-avatar"
                                                                title="{{ $employee->firstName }} {{ $employee->lastName }}"
                                                                data-toggle="tooltip">
                                                                <img src="{{ asset('storage/assets/users/' . $employee->image) }}"
                                                                    class="user-img" alt="user avatar">
                                                            </a>

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
                <div style="background-color:#5f2fb2; background-size: cover; background-position: center; background-repeat: no-repeat;"
                    {{-- <div style="background-image: url('{{ URL::asset('assets/images/bg-themes/5.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;" --}} class="card text-white text-center">
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
                                                                class="badge  p-2"
                                                                style="background-color:#5f2fb2;">{{ $task->getProject()->name }}</span></a>
                                                    @else
                                                        <span class="badge  p-2" style="background-color:#a6acec">No
                                                            project assigned</span>
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
                                            '#5f2fb2', // Tasks to do
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
                                        '#5f2fb2', //
                                        'rgb(79, 195, 247)', // bleu
                                        'rgb(105, 240, 174)' // vert
                                    ],
                                    hoverBackgroundColor: [
                                        '#5f2fb2', //
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
