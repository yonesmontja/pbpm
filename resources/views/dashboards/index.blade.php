@extends('layouts.master1')

@section('title')
    <title> CAPAIAN SISWA </title>
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('/jqvmap/css/style.css') }}">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">CAPAIAN SISWA</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">CAPAIAN SISWA</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ count($high_pemetaan_1) }} siswa</h3>
                                <p>High</p>
                                @if (count($high_pemetaan_1) == !null)
                                    <h5>Nilai rata-rata: {{ number_format((float)array_sum($high_pemetaan_1)/count($high_pemetaan_1), 1, '.','') }}</h5>
                                @endif
                                @if (count($high_pemetaan_1) == null)
                                    <h5>Nilai rata-rata: {{ count($high_pemetaan_1) }}</h5>
                                @endif
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="/test" class="small-box-footer">Info lebih lanjut <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ count($pass_pemetaan_1) }} siswa</h3>
                                <p>Pass</p>
                                @if (count($pass_pemetaan_1) == !null)
                                    <h5>Nilai rata-rata: {{ number_format((float)array_sum($pass_pemetaan_1)/count($pass_pemetaan_1), 1, '.','') }}</h5>
                                @endif
                                @if (count($pass_pemetaan_1) == null)
                                    <h5>Nilai rata-rata: {{ count($pass_pemetaan_1) }}</h5>
                                @endif
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="/test" class="small-box-footer">Info lebih lanjut <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning text-white">
                            <div class="inner">
                                <h3 class="text-white">{{ count($low_pemetaan_1) }} siswa</h3>
                                <p class="text-white">Low</p>
                                @if (count($low_pemetaan_1) == !null)
                                    <h5 class="text-white">Nilai rata-rata: {{ number_format((float)array_sum($low_pemetaan_1)/count($low_pemetaan_1), 1, '.','') }}</h5>
                                @endif
                                @if (count($low_pemetaan_1) == null)
                                    <h5 class="text-white">Nilai rata-rata: {{ count($low_pemetaan_1) }}</h5>
                                @endif
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="/test" class="small-box-footer text-white">Info lebih lanjut <i
                                    class="text-white fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ count($underlow_pemetaan_1) }} siswa</h3>
                                <p>Under Low</p>
                                @if (count($underlow_pemetaan_1) == !null)
                                    <h5>Nilai rata-rata: {{ number_format((float)array_sum($underlow_pemetaan_1)/count($underlow_pemetaan_1), 1, '.','') }}</h5>
                                @endif
                                @if (count($underlow_pemetaan_1) == null)
                                    <h5>Nilai rata-rata: {{ count($underlow_pemetaan_1) }}</h5>
                                @endif
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="/test" class="small-box-footer">Info lebih lanjut <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-6 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Nilai Siswa
                                </h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Nilai
                                                Siswa</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#sales-chart" data-toggle="tab">Rata-rata
                                                Nilai</a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="revenue-chart"
                                        style="position: relative; height: 300px;">
                                        <canvas id="areaChart"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                        <canvas id="donutChart"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- solid sales graph -->
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-th mr-1"></i>
                                    Rata-rata Nilai Siswa
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="lineChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer bg-transparent">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true"
                                            value="{{ $sikap_average }}" data-width="60" data-height="60"
                                            data-fgColor="#39CCCC">

                                        <div class="text-dark">Sikap</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true"
                                            value="{{ $skill_average }}" data-width="60" data-height="60"
                                            data-fgColor="#39CCCC">

                                        <div class="text-dark">Skill</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <input type="text" class="knob" data-readonly="true"
                                            value="{{ $budaya_average }}" data-width="60" data-height="60"
                                            data-fgColor="#39CCCC">

                                        <div class="text-dark">SBK</div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-footer -->
                        </div>
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-6 connectedSortable">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Nilai Siswa</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body-->
                            <div class="card-footer bg-transparent">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <div id="sparkline-1"></div>
                                        <div class="text-primary">Sikap</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <div id="sparkline-2"></div>
                                        <div class="text-primary">Skill</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <div id="sparkline-3"></div>
                                        <div class="text-primary">Pengetahuan</div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- STACKED BAR CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Nilai Siswa</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="stackedBarChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('footer')
    <script src="{{ asset('/jqvmap/js/asmat-map.js') }}"></script>
    <script>
        $(function() {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

            var areaChartData = {
                labels: {!! json_encode($matpel) !!},
                datasets: [{
                        label: 'Nilai Siswa',
                        backgroundColor: 'rgba(255, 0, 0, 0.4)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#B7E675',
                        pointStrokeColor: 'rgba(148, 233, 78, 0.57)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(148, 233, 78, 0.57)',
                        data: {!! json_encode($matang1) !!}
                    },
                    {
                        label: 'Nilai Siswa',
                        backgroundColor: 'rgba(255, 0, 0, 0.4)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#B7E675',
                        pointStrokeColor: 'rgba(148, 233, 78, 0.57)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(148, 233, 78, 0.57)',
                        data: {!! json_encode($matang1) !!}
                    },

                ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            var areaChart = new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            })

            //-------------
            //- LINE CHART -
            //--------------
            var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
            var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
            var lineChartData = jQuery.extend(true, {}, areaChartData)
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, {
                type: 'line',
                data: lineChartData,
                options: lineChartOptions
            })

            //-------------
            //- DONUT CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            var donutData = {
                labels: {!! json_encode($matpel) !!},
                datasets: [{
                    data: {!! json_encode($matang1) !!},
                    backgroundColor: [
                        '#f56954',
                        '#00a65a',
                        '#f39c12',
                        '#00c0ef',
                        '#3c8dbc',
                        '#1F8708',
                        '#325E3E',
                        '#C064DE',
                        '#d2d6de',
                        '#40CC19'
                    ],
                }]
            }
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var donutChart = new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            })

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            //var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            //var pieData = donutData;
            //var pieOptions = {
            //    maintainAspectRatio: false,
            //    responsive: true,
            //}
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            /*var pieChart = new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })
            */
            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = {
                labels: ['Agama Islam', 'Agama Kristen', 'Agama Katolik', 'PPKn', 'B. Indonesia', 'Matematika',
                    'IPA', 'IPS', 'PJOK', 'SBK'
                ],
                datasets: [{
                        label: 'Pemetaan Awal',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [{!! json_encode($pemetaan_islam_average) !!},
                            {!! json_encode($pemetaan_protestan_average) !!},
                            {!! json_encode($pemetaan_katolik_average) !!},
                            {!! json_encode($pemetaan_ppkn_average) !!},
                            {!! json_encode($pemetaan_indonesia_average) !!},
                            {!! json_encode($pemetaan_matematika_average) !!},
                            {!! json_encode($pemetaan_ipa_average) !!},
                            {!! json_encode($pemetaan_ips_average) !!},
                            {!! json_encode($pemetaan_pjok_average) !!},
                            {!! json_encode($pemetaan_sbk_average) !!},
                        ]
                    },
                    {
                        label: 'Nilai Rata-rata Saat Ini',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [{!! json_encode($islam_average) !!},
                            {!! json_encode($protestan_average) !!},
                            {!! json_encode($katolik_average) !!},
                            {!! json_encode($ppkn_average) !!},
                            {!! json_encode($indonesia_average) !!},
                            {!! json_encode($matematika_average) !!},
                            {!! json_encode($ipa_average) !!},
                            {!! json_encode($ips_average) !!},
                            {!! json_encode($pjok_average) !!},
                            {!! json_encode($sbk_average) !!},
                        ]
                    },
                ]
            }

            var barChartData = jQuery.extend(true, {}, barChartData)
            var temp0 = barChartData.datasets[0]
            var temp1 = barChartData.datasets[1]
            barChartData.datasets[0] = temp0
            barChartData.datasets[1] = temp1

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            var barChart = new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })
            // Sparkline charts
            var sparkline1 = new Sparkline($('#sparkline-1')[0], {
                width: 80,
                height: 50,
                lineColor: '#92c1dc',
                endColor: '#ebf4f9',
            });
            var sparkline2 = new Sparkline($('#sparkline-2')[0], {
                width: 80,
                height: 50,
                lineColor: '#92c1dc',
                endColor: '#ebf4f9',
            });
            var sparkline3 = new Sparkline($('#sparkline-3')[0], {
                width: 80,
                height: 50,
                lineColor: '#92c1dc',
                endColor: '#ebf4f9',
            });

            sparkline1.draw({!! json_encode($matang1) !!});
            sparkline2.draw({!! json_encode($matang1) !!});
            sparkline3.draw({!! json_encode($matang1) !!});

            //---------------------
            //- STACKED BAR CHART -
            //---------------------
            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = jQuery.extend(true, {}, barChartData)

            var stackedBarChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }

            var stackedBarChart = new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: stackedBarChartData,
                options: stackedBarChartOptions
            })
        })
    </script>
@endsection
