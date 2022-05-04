@extends('layouts.master1')

@section('title')
    <title> AdminLTE 3 | TDU </title>
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
                        <h1 class="m-0 text-dark">TDU</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">TDU</li>
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
                                <h3>{{ totalSiswa() }}</h3>
                                <p>Jumlah Siswa</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
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
                                <h3>{{ totalMapel() }}</h3>
                                <p>Jumlah Mapel</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="/mapel" class="small-box-footer">Info lebih lanjut <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ totalKi() }}</h3>

                                <p>Kompetensi Inti</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="/kompetensiinti" class="small-box-footer">Info lebih lanjut <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ totalOAP() }}</h3>

                                <p>Siswa OAP</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">Info lebih lanjut <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-9 connectedSortable">
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
                                            <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Nilai Siswa</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#sales-chart" data-toggle="tab">Rata-rata Nilai</a>
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
                        <!-- /.card -->
                        <!-- BAR CHART -->
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
                            <!-- /.card-body -->
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
                        <!-- /.card -->
                        <!-- /.card -->
                        <!-- Calendar -->
                        <div class="card bg-gradient-success">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="far fa-calendar-alt"></i>
                                    Calendar
                                </h3>
                                <!-- tools card -->
                                <div class="card-tools">
                                    <!-- button with a dropdown -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                            data-toggle="dropdown" data-offset="-52">
                                            <i class="fas fa-bars"></i></button>
                                        <div class="dropdown-menu" role="menu">
                                            <a href="/load-events" class="dropdown-item">Add new event</a>
                                            <a href="/incalendar" class="dropdown-item">Clear events</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="/kalender" class="dropdown-item">View calendar</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pt-0">
                                <!--The calendar -->
                                <div id="calendar" style="width: 100%"></div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-3 connectedSortable">
                        <!-- Map card -->
                        <div class="card bg-gradient-primary">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    Pegunungan Bintang Wilayah
                                </h3>
                                <!-- card tools -->
                                <div class="card-tools">

                                    <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <div class="card-body">
                                <div class="mapdiv">
                                    <!-- Creator: CorelDRAW X7 -->
                                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100%" height="250px"
                                        version="1.0"

                                        viewBox="0 0 3608 2580" xmlns:xlink="http://www.w3.org/1999/xlink" id="asmat-map">
                                        <defs>
                                            <style type="text/css">
                                                <![CDATA[
                                                .str18 {
                                                    stroke: #499566;
                                                    stroke-width: 2.08346
                                                }

                                                .str13 {
                                                    stroke: #4CA5AB;
                                                    stroke-width: 2.08346
                                                }

                                                .str16 {
                                                    stroke: #52869C;
                                                    stroke-width: 2.08346
                                                }

                                                .str2 {
                                                    stroke: #5F759C;
                                                    stroke-width: 2.08346
                                                }

                                                .str9 {
                                                    stroke: #648E7A;
                                                    stroke-width: 2.08346
                                                }

                                                .str10 {
                                                    stroke: #64AB4F;
                                                    stroke-width: 2.08346
                                                }

                                                .str14 {
                                                    stroke: #668D4C;
                                                    stroke-width: 2.08346
                                                }

                                                .str11 {
                                                    stroke: #6CE057;
                                                    stroke-width: 2.08346
                                                }

                                                .str12 {
                                                    stroke: #899265;
                                                    stroke-width: 2.08346
                                                }

                                                .str4 {
                                                    stroke: #98695F;
                                                    stroke-width: 2.08346
                                                }

                                                .str15 {
                                                    stroke: #99B058;
                                                    stroke-width: 2.08346
                                                }

                                                .str6 {
                                                    stroke: #A38259;
                                                    stroke-width: 2.08346
                                                }

                                                .str5 {
                                                    stroke: #AB52A6;
                                                    stroke-width: 2.08346
                                                }

                                                .str0 {
                                                    stroke: #AC5D60;
                                                    stroke-width: 2.08346
                                                }

                                                .str1 {
                                                    stroke: #AD9F54;
                                                    stroke-width: 2.08346
                                                }

                                                .str3 {
                                                    stroke: #BF1925;
                                                    stroke-width: 2.08346
                                                }

                                                .str8 {
                                                    stroke: #E785D0;
                                                    stroke-width: 2.08346
                                                }

                                                .str17 {
                                                    stroke: #E7AC36;
                                                    stroke-width: 2.08346
                                                }

                                                .str7 {
                                                    stroke: #E9E836;
                                                    stroke-width: 2.08346
                                                }

                                                .fil22 {
                                                    fill: #07BD38
                                                }

                                                .fil5 {
                                                    fill: #16F03A
                                                }

                                                .fil12 {
                                                    fill: #1F8708
                                                }

                                                .fil15 {
                                                    fill: #325E3E
                                                }

                                                .fil7 {
                                                    fill: #360D5E
                                                }

                                                .fil27 {
                                                    fill: #38E635
                                                }

                                                .fil0 {
                                                    fill: #40CC19
                                                }

                                                .fil23 {
                                                    fill: #4C98DB
                                                }

                                                .fil14 {
                                                    fill: #586E0A
                                                }

                                                .fil4 {
                                                    fill: #58EBF0
                                                }

                                                .fil29 {
                                                    fill: #5E5CE6
                                                }

                                                .fil1 {
                                                    fill: #630B57
                                                }

                                                .fil28 {
                                                    fill: #78EBE1
                                                }

                                                .fil33 {
                                                    fill: #87BAED
                                                }

                                                .fil21 {
                                                    fill: #8BCEF0
                                                }

                                                .fil13 {
                                                    fill: #9EB569
                                                }

                                                .fil8 {
                                                    fill: #A11856
                                                }

                                                .fil9 {
                                                    fill: #ACE364
                                                }

                                                .fil10 {
                                                    fill: #B5DBA2
                                                }

                                                .fil11 {
                                                    fill: #B7E675
                                                }

                                                .fil16 {
                                                    fill: #C064DE
                                                }

                                                .fil18 {
                                                    fill: #C596F5
                                                }

                                                .fil26 {
                                                    fill: #C8F748
                                                }

                                                .fil32 {
                                                    fill: #C9CCF0
                                                }

                                                .fil6 {
                                                    fill: #E336AF
                                                }

                                                .fil25 {
                                                    fill: #E6DA57
                                                }

                                                .fil31 {
                                                    fill: #E82C77
                                                }

                                                .fil24 {
                                                    fill: #EA2525
                                                }

                                                .fil30 {
                                                    fill: #EB32D8
                                                }

                                                .fil17 {
                                                    fill: #EB8888
                                                }

                                                .fil20 {
                                                    fill: #ED9CE2
                                                }

                                                .fil2 {
                                                    fill: #F2CD66
                                                }

                                                .fil19 {
                                                    fill: #F51694
                                                }

                                                .fil3 {
                                                    fill: #F5E642
                                                }

                                                ]]>
                                            </style>
                                        </defs>
                                        <g id="batani">
                                            <title>Batani: {{ totalJoerat() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg"
                                                    alt="A range of rocky snowcapped mountains, partly hidden by cloud">
                                                </image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil0 str0"
                                                d="M980.27 78.21c22,0 22.94,14.6 65.21,13.45 20.13,-0.55 19.38,25.72 30.64,-5.98 5.03,-14.17 34.31,11.16 48.12,-9.91 11.59,-17.67 45.91,-21.81 60.24,-3.54 15.49,19.75 68.63,6.02 67.81,16.44 -1.08,13.65 39.35,13.13 57.18,-3.67 12.86,-12.13 7.24,-1.97 18.78,-21.06 13.21,-21.82 47.47,-4.8 64.66,-18.49 9.18,-7.31 42.11,7.16 54.23,-3.37 5.81,-5.04 22.29,-0.1 23.29,13.71 1.66,22.87 3.94,18.84 -0.74,41.78 -5.3,25.97 58.3,31.26 36.93,52.64 -5.53,5.53 -12.56,8.06 -21.37,19.17 -2.13,2.68 -17.93,15.22 -18.62,18.55 -9.48,1.97 -51.17,56.97 -49.94,71.87 1,12.1 -16.65,17.19 -27.65,17.19 -21.56,0 -14.86,9.21 -13.51,25.41 1.12,13.53 37.75,-1.4 21.99,22.61 -7.6,11.58 -9.23,6.2 -9.23,23.72l-1.49 11.96c0,22.89 33.63,1.58 33.63,15.69 0,31.41 71.84,47.8 41.29,62.96 -7.91,3.93 -20.07,-26.14 -25.66,1.24 -4.42,21.63 35.34,-1.14 47.14,32.95 4.37,12.62 -28.72,0.47 -10.95,27.58 1.02,1.56 -10.24,20.38 -14.59,20.24 -47.28,-1.5 -12.71,35.71 -27.15,46.89 -0.58,0.45 -20.84,32.11 -27.33,38.24 -5.85,5.51 -14.46,30.88 -21.48,32.33 -0.37,3.21 -32.41,21.46 -40.55,43.02 -10.45,27.69 0.81,-1.49 0.81,11.4l-2.24 17.19c0,7.54 6.86,23.08 14.2,23.85 8.51,0.89 17.75,2.59 25.41,3.8 -0.01,0.12 5.23,22.54 5.23,29.89 0,3.34 -26.65,18.43 -37.3,33.89 -12.6,18.28 -42,7.35 -54.62,-3.8 -11.14,-9.85 -5.45,0.49 -18.19,-16.45 -10.06,-13.36 -27.39,20.4 -45.69,32.89 -16.89,11.52 -25.56,18.72 -22.12,-12.77 4.85,-44.49 -8.97,-23.03 -22.55,-49.45 -15.95,-31.02 -61.51,52.67 -78.21,55.3 -16.23,2.56 -25.56,14.31 -35.19,-16.51 -5.9,-18.91 -39.83,-17.2 -38.86,-38.05 0.7,-14.81 -32.71,-8.56 -40.35,-11.2l-11.21 -663.6z" />
                                        </g>
                                        <g id="pamek">
                                            <title>Pamek: {{ totalBetcbamu() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg"
                                                    alt="A range of rocky snowcapped mountains, partly hidden by cloud">
                                                </image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil1 str1"
                                                d="M991.48 741.81c-0.02,-0.33 44.15,-6.43 42.27,17.35 -1.23,15.53 22.44,6.17 32.61,35.58 4.85,14 20.52,9.34 35.5,21 14.95,11.64 10.56,35.03 43.74,43.15 46.95,11.49 -3.91,31.95 -3.14,51.48 0.29,7.26 -3.49,29.84 -6.1,37.38 -20.04,4.15 21.84,62.43 -12.67,59.47 -26.78,-2.29 -20.62,-1.65 -47.44,-11.6 -3.78,-1.4 -30.7,-9.15 -34.59,-9.15 -15.1,0 -10.12,24.47 -34.34,2.62 -2.5,-2.26 -21.11,-0.52 -18.04,-4.6l2.2 -242.68z" />
                                        </g>
                                        <g id="epumek">
                                            <title>Epumek: {{ totalSuator() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil2 str2"
                                                d="M989.28 984.49c1.07,-2.03 20.5,1.62 25.95,12.59 9.16,18.47 27.69,-33.69 65.7,0.6 0.26,0.23 63.85,26.05 53.71,-15.34 -2.92,-11.91 7.36,-83.86 18.05,-71.32 9.9,11.61 13.55,74.42 45.37,47.94 10.27,-8.54 76.8,28.57 87.96,49.98 21.44,41.14 -8.94,40.91 -7.17,82.29 1.14,26.67 -44.63,-25.73 -58.23,57.4 -2.25,13.8 -104.6,46.96 -108.79,66.14 -0.69,3.15 -14.93,2.06 -10.96,50.65 0.85,10.34 18.81,38.82 2.23,38.29 -4.77,-0.15 -12.77,8.9 -20.92,8.9l-23.72 12.85c-17.35,28.49 29.65,4.97 29.65,19.76 0,48.08 -6.91,28.9 -46.45,45.21 -0.39,0.16 -34.26,2.24 -41.77,7.99 -3.55,2.72 -11.89,0.12 -12.59,0.17l1.98 -414.1z" />
                                        </g>
                                        <g id="teriaplu">
                                            <title>Teriaplu: {{ totalAgats() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil3 str3"
                                                d="M1510.92 143.08c31.97,-5.93 -1.2,19.75 27.94,28.94 2.36,0.74 7.7,-14.52 7.9,-16.55 20.99,-5.4 7.64,10.02 29.23,-9.4 18.82,-16.94 28.3,18.73 51.73,0.34 4.84,-3.81 45.62,-9.96 45.46,-5.93 -0.92,23.54 -17.93,10.93 -0.25,23.88 13.41,9.83 -20.39,17.52 3.95,30.73 24.02,13.03 -21.26,10.41 9.4,31.2 29.64,20.08 -41.77,14.95 -4.85,36.48 12.3,7.17 22.93,-19.84 13.41,26.85 -4.09,20.1 20.05,13.11 21.83,20.84l-5.93 8.9c-1.25,1.13 -23.34,42.83 -18.13,47.78 10.47,9.93 -6.15,13.35 -12.76,3.61 -1.52,-2.24 -14.33,-4.19 2.96,19.03 1.05,1.41 -24.53,16.25 8.16,17.54 11.67,0.46 0.25,-32.52 39.54,-11.52 23.45,12.54 -38.44,16.07 -7.01,36.06 39.39,25.05 -33.98,40.92 41.6,34.84 25.13,-2.02 16.15,2.31 34.33,27.84 0.59,0.83 0.26,6.28 0.26,7.66l-10.87 8.89c9.01,8.73 27.89,19.01 30.63,31.71 0.03,0.14 15.51,29.23 17.06,31.54 19.54,29.21 51.49,36.4 0.25,40.44 -10.06,0.79 -15.82,14.8 -38.06,13.92 -2.29,-0.09 -42.69,45.71 -84.26,19.03 -0.16,-0.1 -33.8,-4.69 -43.88,-12.45 -3.35,-2.58 -41.43,-4.58 -49.02,-22.14 -0.07,-0.16 -29.03,-18.57 -34.25,-24.96 -1.85,-2.26 -39.56,-24.78 -47.78,-37.64 -4.09,-6.39 -90.71,-32.78 -99.14,-7.49 -19.8,6.05 -16.09,-20.33 15.39,-26.2 21.57,-4.02 3.66,-34.87 17.87,-40.6 6.11,-2.47 6.61,-14.92 1.89,-16.55 -13.65,-4.73 -42.49,-11.37 -42.49,-21.74 0,-34.64 40.98,28.08 30.63,-16.81 -3.85,-16.72 -49.51,-20.05 -48.42,-45.46 0.64,-14.99 -24.35,-1.17 -28.92,-15.81 -11.85,-37.98 33.1,-47.34 -5.76,-55.26 -0.19,-0.04 -22.97,-31.71 15.98,-31.71 23.85,0 18.95,-26.48 33.86,-39.2 3.67,-3.12 19.07,-35.97 34.98,-47.12 5.9,-4.14 27.8,-26.95 28.92,-27.34l16.62 -16.17z" />
                                        </g>
                                        <g id="borme">
                                            <title>Borme: {{ totalSirets() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil4 str4"
                                                d="M1339.31 808.9c-0.85,-11.13 42.32,-28.64 42.32,-53.7 0,-47.23 -32.88,4.88 -45.37,-56.42 -8.3,-40.7 44.61,-57.44 60.45,-86.63 14.61,-26.92 23.9,-23.59 39.45,-60.88 8.55,-20.49 61.26,-24.79 70.48,-17.45 6.54,5.21 28.74,11.44 36.74,26.77 5.37,10.31 96.67,64.88 109.87,66.05 21.67,1.92 45.68,23.84 83.44,22.81 21.25,-0.58 10.51,23.56 -14.09,30.64 -10.28,2.96 -8.32,50.4 -41.76,28.92 -14.61,-9.38 -31.03,38.81 -54.19,45.46 -4.94,1.42 -10.79,7.63 -10.79,12.59 3.63,-0.28 49.4,17.76 33.26,42.42 -9.62,14.71 15.66,21.56 27.68,39.87 6.38,9.72 26.03,13.94 26.03,26.43l10.87 -1.68c17.58,5.29 4.45,30.4 39.54,43.44 12.17,4.52 -10.25,21.81 29.81,23.38 28.08,1.1 -6.85,52.8 58.06,56.71 0,0.21 6.36,8.59 9.71,11.94l2.24 17.42c14.16,17.33 34.87,10 20.58,29.39 -20.7,28.08 -60.31,29.21 -23.63,72.83 0.94,1.12 11.98,21.8 11.94,22.3l2.49 3.1c16.09,41.92 -21.33,8.94 -52.16,47.39 -12.8,15.97 -52.39,8.92 -67.2,18.44 -14.63,9.4 -37.17,-40.78 -45.04,-42.41 -5.07,-24.51 -37.06,-37.86 -35.75,-70.99 0.47,-12.05 -39.03,-15.25 -47.69,-35.32 -5.41,-12.54 -40.88,-33.86 -60.04,-33.86 -20.88,0 -51.65,-8.52 -24.96,-32.61 30.17,-27.24 -54.59,-3.3 -86.46,-41.51 -8.92,-10.7 -53.51,-13.97 -56.5,-50.66 -2.35,-28.74 -39.05,6.47 -42.76,-31.29 -2.17,-22.12 -40.98,5.66 -36.14,-27.5 0.96,-6.59 19.67,-24.06 20.5,-28.92l9.07 -16.47z" />
                                        </g>
                                        <g id="nongme">
                                            <title>Nongme: {{ totalAtsj() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil5 str5"
                                                d="M1236.16 972.88c-18.81,-4.65 -18.88,-20.45 -41.62,-12.43 -30.67,10.83 -25.51,-34.78 -47.15,-48.52 -8.63,-5.48 11.49,-27.98 16.7,-35.12 9.47,-12.98 -16.62,-17.8 -16.63,-17.82l-17.4 -6.39c-6.89,-7.87 -22.84,-17.82 -26.7,-34.78 -3.1,-13.65 -15.43,2.49 10.46,-18.68 9.4,-7.68 61.76,-72.54 65.71,-49.2 1.63,9.61 22.94,18.96 24.67,29.15 1.55,9.15 -0.07,58.52 14.82,38.11 1.53,-2.1 36.08,-23.36 40.74,-32.75 7.21,-14.52 21.08,12.48 41.67,18.68 15,4.52 5.03,6.53 29.89,6.53 15.86,0 -18.58,31.48 -20.86,42.67 -0.49,2.39 -3.94,10.56 -0.06,11.9 4.58,13.24 32.1,-4.66 36.68,22.36 3.37,19.84 30.36,5.84 39,18.74 2.48,3.71 12.36,26.05 -0.2,27.59 -7.01,0.87 -17.13,13.73 -18.68,14.27 -28.09,22.86 -31.13,32.71 -63.5,34.13 -9.45,0.41 -8.99,0.92 -14.69,2.68 -9.13,9.7 -25.01,1.33 -28.09,0.84 -4.9,-0.78 -11.29,-8.63 -24.76,-11.96z" />
                                        </g>
                                        <g id="weime">
                                            <title>Weime: {{ totalUnir() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil6 str6"
                                                d="M1279.26 1079.44c-3.12,-15.57 36.07,-50.09 -0.98,-82.22 -18.52,-16.06 -0.74,-6.9 11.22,-15.34 4.34,-3.06 26.87,6.29 57.44,-17.94 11.76,-9.33 34.59,-48.21 51.52,-29.39 20.01,22.24 31.65,12.47 54.58,35.14 26.13,25.83 87.69,8.86 84.05,26.72 -0.31,1.54 -41.95,37.03 21.07,40.24 47.65,2.43 45.75,42.26 94.01,56.14 9.88,2.84 15.47,31.82 23.04,44.79 13.66,23.39 -28.4,22.72 -27.53,33.71 1.49,18.84 -42.9,13.99 -47.59,21.75 -7.55,12.46 -42.46,8.85 -59.07,26.36 -11.93,12.57 -15.58,-6.22 -30.91,-11.67 -4.3,-1.53 -14.02,-12.1 -18.43,-16.51 -0.8,-0.79 -59.99,-29.18 -62.25,-29.71 -22.99,-5.41 -36.16,9 -49.9,-14.21 -4.39,-7.42 -10.03,-14.61 -12.21,-23.11 -6.75,-26.21 -45.23,-40.37 -72.52,-40.37l-15.54 -4.38z" />
                                        </g>
                                        <g id="bime">
                                            <title>Bime: {{ totalJetsy() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil7 str7"
                                                d="M1422.04 1476.99c1.56,-0.53 -30.72,-38.09 -69.68,-36.55 -2.96,0.12 -9.09,-19.39 -9.84,-23.05 -7.25,-0.83 -6.4,-3.86 -26.04,-3.86 -27.38,0 -30.7,9.83 -48.05,-13.46 -10.72,-14.41 -22,-1.39 -22.1,-1.37 -0.04,0.19 -20.52,31.54 -36.02,25.85 -23.56,-8.66 -39.14,-2.17 -67.16,-18.01l-2.37 -0.49 -12.49 -15.92c-3.39,-1 -16.32,-8.11 -16.47,-8.13 -14.59,-23.5 -27.15,14.55 -24.87,-38.75 0.66,-15.28 -37.75,5.22 -29.78,-17.82 1.5,-0.31 50.92,-24.42 50.72,-27.04 6.57,-1.36 -8,-44.5 -7.48,-50.09l1.41 -17.05c-4.56,-17.41 52.04,-44.24 67.31,-53.49 19.72,-11.93 37.67,-13.29 49.9,-31.95 10.72,-16.38 2.91,-51.38 51.84,-49.28 10.69,0.45 -0.03,-21.35 20.19,-17.01 32.6,7.01 34.2,4.92 62.73,23.93 20.33,13.54 8.45,57.09 57.64,55.88 38.31,-0.94 64.99,30.19 81.55,32.08 0.96,0.11 19.45,12.82 23.05,14.4 4.1,1.8 9.2,0.91 10.66,7.97 1.66,0.34 26.04,32.91 26.04,38.19 0,31.93 -24.13,30.01 22.62,48.04 25.91,10 61.48,-0.82 71.03,29.78 4.95,15.88 -1.12,13.44 7.84,35.14 4.27,10.35 -0.66,47.1 -23.93,47.1 -19.06,0 -23.85,-17.14 -40.8,11.9 -17.33,29.69 -17.56,26.23 -60.69,26.23 -18.92,0 -40.92,-14.95 -71.77,-14.95 -21.18,0 -23.56,12.69 -26.23,34.39 -0.01,0.07 0.06,3.33 0.06,3.74l-8.82 3.65z" />
                                        </g>
                                        <g id="yefta">
                                            <title>Yefta: {{ totalSawa() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil8 str8"
                                                d="M1878.46 594.86c-20.57,6 -18.01,13.88 -36.59,-16.06 -13.27,-21.4 -23.88,-45.12 -43.36,-61.13 -25.23,-20.74 15.08,-7.04 -10.83,-39.37 -14.88,-18.57 -29.16,-12.78 -55.52,-12.78 3.86,-45.04 -16.19,-18.53 -17.19,-44.11 -0.42,-10.68 31.5,-8.49 16.38,-24.67 -5.79,-6.2 -31.32,-15.88 -32.77,0.75 -0.81,9.35 -31.47,12.16 -18.95,-5.43 2.68,-3.76 -17.67,-27.73 1.69,-20.55 18.46,6.85 15.15,7.17 14.21,-16.64 -0.18,-4.37 19.59,-35.74 20.93,-39.62l-4.49 -12.71c-22.94,0 -22.89,-10 -17.19,-32.15 6.25,-24.33 -15.53,-1.13 -25.97,-17.39 -7.64,-11.89 45.85,-6.29 12.45,-30.65 -5.22,-3.81 -5.3,-8.27 -4.3,-13.14 7.14,-1.48 6.12,-15.6 -4.61,-18.07 -12.77,-2.95 10.4,-18.76 -3.25,-30.4 -7.43,-6.33 6.76,-16.7 20.38,-16.7 17.95,0 10.42,16.85 45.29,8.42 31.94,-7.73 17.58,46.48 59.45,25.71 4.96,-2.46 22.38,-1.13 37.74,-6.21 27.08,-8.96 38.98,24.32 54.96,23.67 5.59,-0.23 11.65,-23.43 31.53,-27.6 27.1,-5.69 35.63,8.37 65.92,3.12 31.51,-5.47 30.44,15.09 54.32,16.19 14.81,0.68 36.58,54.18 62.06,48.66 8.35,-1.81 0.95,-18.55 41.05,-11.9 37.49,6.21 10.1,2.38 29.03,17.39 30.45,24.13 15.22,-14.66 53.83,39.56 6.41,9 -6.1,18.35 7.48,33.45 7.41,8.25 -2.53,53.81 6.66,65.24 11.61,14.42 11.25,30.44 23.99,44.3 24.52,26.67 9.83,-8.48 30.91,-4.19 1.62,0.33 12.39,13.81 11.77,15.02 -6.58,12.89 -11.89,1.39 -11.09,20.19 0.28,6.55 -20.41,-4.29 -17.13,22.42 3.91,31.74 -27.6,24.87 -37.57,41.94 -0.09,0.15 -27.01,16.39 -35.5,26.36 -8.5,9.96 -22.65,10.9 -21.94,28.9 0.27,6.9 -26.04,20.36 -36.89,31.82 -5.72,6.05 -4.23,1.93 -4.23,12.29l6.73 16.45c4.29,-0.14 41.1,23.67 27.85,44.3 -14.32,22.29 -2.01,28.28 -26.36,59.62 -9.55,12.29 -10.09,40.26 -3.86,53.89 10.27,22.48 18.11,46.29 -7.42,61.74 -28.28,17.11 -17.22,-11.77 -42.61,-0.62 -14.1,6.18 -2.79,-44.07 -9.66,-49.9 -24.97,-21.22 -24.36,5.48 -32.89,-31.6 -2.59,-11.24 -15.02,0.22 -17.88,-23.05 -1.59,-12.89 -36.88,-12.37 -35.2,-51.58 0.19,-4.65 -19.5,-30.48 -20.87,-47.85 -0.28,-3.41 -13.14,-11.95 -1.31,-26.85 6.89,-8.68 -35.61,-9.25 -42.19,-30.16 -4.6,-14.64 -37.68,-15.32 -46.03,-5.54 -0.6,0.7 -5.98,1.32 -6.98,4.23l-3.98 2.99z" />
                                        </g>
                                        <g id="aboy">
                                            <title>Aboy: {{ totalSuru() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil9 str9"
                                                d="M1894.07 1076.56c3.42,-19.07 -17.61,-1.27 -17.61,-24.89 0,-19.66 -18.34,-2.96 -24.61,-33.71 -7.19,-35.25 -38.42,-2.46 -49.47,-56.69 -8.19,-40.16 -35.67,-8.47 -46.1,-39.69 -0.78,-2.33 -21.08,-21.21 -29.1,-34.45 -16.68,-27.57 -15.64,4.93 -35.65,-28.61 -12.64,-21.19 -53.75,-23.33 -38.81,-59.55 8.9,-21.58 -59.47,-32.66 -22.24,-43.36 13.74,-3.96 29.41,-55.37 62.25,-45.35 29.16,8.9 16.11,-22.92 43.79,-32.96 6.55,-2.38 6.57,-19.01 25.16,-23.86 0.71,-0.19 47.07,-23.16 55.58,-26.68 18.99,-7.87 32.91,-6.43 42.75,-13.21l6.22 -14.29c9.29,-12.51 56.47,-25.07 68.73,-12.81 3.73,3.73 6.88,16.02 19.06,22.06 35.34,17.54 17.81,-1.76 23.43,43.92 3.21,26.12 20.08,30.79 19.38,48.6 -0.75,18.83 15.3,38.37 34.26,42.74 5.13,22.24 15.06,15.32 24.99,43.24 7.19,20.21 27.47,0.71 27.47,29.9 0,49.26 7.92,29.74 32.15,38.13 23.59,8.17 -11.43,16.39 -18.69,37.38 -5.32,15.35 -23.74,41.42 3.74,44.8 3.9,0.48 14.22,-2.93 28.41,-2.93 6.13,0 6.45,-13 15.14,-0.68 7.15,10.12 -2.15,-18.36 7.29,8.9 11.15,32.24 74.52,34.96 48.4,56.7 -2,1.66 -23.16,0.82 -11.96,18.26 3.64,5.67 -4.17,16.32 -9.53,19.99l-14.95 20.19c-11.41,19.91 -9.73,22.54 -14.27,44.8 -1.54,7.55 -31.39,-6.44 -38.82,3.31 -13.39,17.57 -53.23,6.41 -78.75,35.63 -3.07,3.51 -31.95,1.79 -47.66,9.22 -6.13,2.9 -23.86,-3.25 -23.86,-19.69 0,-4.81 -0.7,-11.22 -3.74,-14.95l-11.21 -14.96c-16.61,0 -37.33,1.74 -41.87,-17.94l-9.3 -6.51z" />
                                        </g>
                                        <g id="okbab">
                                            <title>Okbab: {{ totalAkat() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil10 str10"
                                                d="M1848.64 1518.19c7.73,-1.93 -15.33,-2.63 -21.27,9.04 -2.7,5.3 -20.02,33.24 -29.22,20.87 -7.05,-9.47 -61.54,-17.99 -68.29,-23.73 -38.56,-32.81 -20.66,-37.28 -83.68,-34.59 -13.65,0.59 -85.23,-21.01 -85.23,-34.39 0,-9.62 19.73,-14.03 30.85,-36.44 9.84,-19.83 31.49,-0.25 54.26,-13.91 19.01,-11.4 9.11,-17.62 10.59,-36.37 0.06,-0.79 -8.55,-13.96 -8.22,-28.54 0.96,-43.14 -63.28,-39.2 -91.09,-46.03 -26.79,-6.58 7.07,-24.8 -15.08,-51.78 -4.41,-5.38 -13.06,-25.84 2.31,-28.35 3.68,-0.6 30.75,-13.95 43.92,-13.46 2.54,0.1 20.94,-12.35 40.63,-13.45 8.66,-0.49 25.48,-18.01 38.92,-25.49 14.57,-8.11 19.61,-11.99 30.09,8.78 21.99,43.54 28.54,66.38 78.14,44.86 14.31,-6.21 19.82,5.62 45.35,-18.5 24.51,-23.15 68.8,-9.2 38.52,-50.28 -13.01,-17.64 -16.89,-19.46 -24.8,-40.93 -8.96,-24.31 28.45,-29.69 39.81,-44.11 4.14,-5.25 16.1,-1.69 19.44,11.41 4.13,16.2 26.62,30.16 45.16,29.71 36.19,-0.88 -8.73,47.85 60.69,47.85 44.11,0 20.47,-15.6 29.28,18.69 2.91,11.31 7.36,4.39 6.73,25.35 -0.25,8.41 15.36,19.81 14.21,34.46 -0.03,0.28 32.99,45.99 10.95,64.79 -15.33,13.08 3.59,54.2 -44.66,39.13 -27.17,-8.49 -50.59,28.2 -66.29,47.79 -10.2,12.73 23.54,23.64 -3.18,33.15 -15.52,5.52 -28.82,34.57 -31.34,49.96 -3.74,22.89 -45.67,41.81 -45.67,50.78l-21.83 3.73z" />
                                        </g>
                                        <g id="oksop">
                                            <title>Oksop: {{ totalKolfbrasa() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil11 str11"
                                                d="M1892.15 1708.09c-15.97,-21.72 -51.83,-16.7 -47.78,-36.57 5.6,-27.49 -9.78,-15.74 -9.78,-51.65 0,-5.5 1.26,-10.7 -2.24,-14.2 -16,-16 -36.02,6.32 -28.48,-38.2 3.62,-21.37 29.34,-61.33 53.77,-41.8 4.43,3.54 2.48,12.32 21.19,16.38 45.82,9.96 21.63,12.36 44.47,20.88 22.63,8.43 37.64,-5.42 37.64,42.74 0,15.24 -48.34,70.04 -11.34,68.78 4.58,-0.15 55.63,1.19 56.94,1.5 0,15.32 -8.36,18.94 -23.92,24.47 -10.56,3.76 -39.15,-1.92 -60.75,13.46 -4.84,3.45 -24.37,0.19 -24.48,0.19l-5.24 -5.98z" />
                                        </g>
                                        <g id="murkim">
                                            <title>Murkim: {{ totalAyip() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil12 str12"
                                                d="M2274.95 634.49c-0.39,-5.33 -52.46,-21.74 -53.21,-29.03 -15.52,-3.58 -12.13,-27.23 -35.76,-26.3 -11.62,0.46 -2.37,-25.09 13.45,-31.65 4.43,-1.84 55.06,-39.08 69.28,-45.55 19.27,-8.76 -7.37,-41.35 20.5,-45.41 1.61,-0.23 8.52,-18.39 14.15,-17.94 0,-20.17 -24.26,-24.89 -24.61,-15.7 -0.53,13.96 -26.25,-2.33 -26.92,-16.45 -0.69,-14.61 -18,-13.76 -18,-65.79 0,-38.01 -8.22,-23.43 -8.98,-41.12 -0.63,-14.93 8.73,-22.39 -15.7,-40.57 -9.82,-7.31 -9.76,-9.77 -27.04,-8.78 -12.84,0.74 -36.98,-27.66 -8.84,-27.66 40.66,0 18.09,-11.21 62.8,-11.21 4.07,0 60.91,-8.24 63.8,-10.21 45.3,-30.92 46.34,-1.22 88.72,12.64 32.8,10.73 60.05,-0.36 89.58,-11.9 22.05,-8.61 113.16,-11.17 137.7,-7.79 17.72,2.43 15.32,7.46 38.94,2.5 7.95,-1.68 25.82,-3.8 33.58,-0.2l-5.24 385.07c-3.5,14.72 -19.97,10.5 -33.58,14.23 -10.9,3 -47.69,-4.36 -77.62,3.49 -10.07,2.64 -19.93,12.28 -36.08,13.58 -18.05,1.46 -48.7,17.65 -69.4,-7.41 -37.5,-45.4 -70.23,21.43 -94.33,0.75 -10.22,-8.77 -36.65,1.2 -43.62,17.19 -7.76,17.8 -31,19.2 -47.59,13.46l-5.98 -2.24z" />
                                        </g>
                                        <g id="mofinop">
                                            <title>Mofinop: {{ totalFayit() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil13 str13"
                                                d="M2688.39 936.53c-20.83,-0.21 -5.5,17.71 -42.42,28.61 -5.67,1.67 -58.46,7.51 -64.43,5.59 -14.24,-4.57 -62.43,-6.39 -72.39,6.18 -8.21,10.35 -52.77,25.58 -68.78,47.1 -21.12,28.37 -14.56,45.6 -58.51,45.6 -24.03,0 -14.49,-30.65 -50.29,-33.58 -17.86,-1.46 2.44,-16.38 2.44,-41.93 0,-19.28 39,-30.84 -1.24,-78.01 -15.47,-18.13 0.69,-58.19 -32.47,-38.13 -10.11,6.12 -10.86,13.56 -31.21,6.37 -13.76,-4.87 -63.03,-5.62 -74.08,1.62 -39.75,26.04 -20.47,-47.1 -66.67,6.47 -8.05,9.35 -33.58,29.11 -33.58,5.24 0,-28.28 75.56,-42.7 60.76,-77.95 -27.81,-66.19 -12.6,-57.41 10.83,-114.2 3.37,-8.19 5.59,-19.82 11.66,-29.09 10.64,-16.24 -31.36,-39.55 -34.09,-47.91 -12.32,-37.67 14.95,-30.41 39.19,-46.91 17.23,-11.73 36.17,34.72 58.26,37.12 14.12,1.54 46.78,41.78 83.8,15.21 14.33,-10.29 16.84,-41.13 60.49,-25.05 30.24,11.14 43.63,-45.64 91.28,1.49 7.69,7.62 59.52,15.16 72.94,2.18 14.15,-13.68 34.1,-17.69 53.15,-17.69 22.09,0 48.97,15.41 74.59,-4.29 0.93,-0.71 2.06,-1.59 3.29,-2.44l7.48 348.4z" />
                                        </g>
                                        <g id="batom">
                                            <title>Batom: {{ totalPulautiga() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil14 str14"
                                                d="M2381.11 1131.67c-15.5,-0.89 -17.54,36.75 -59.06,19.63 -29.54,-12.19 -17.48,61.92 -53.77,37.74 -10.84,-7.22 -16.33,-41.09 -29.28,-53.19 -7.55,-7.05 -17.47,-50.55 -13.59,-61.07 8.8,-23.88 -19.54,-27.72 -24.97,-34.58 -6.61,-8.35 -36.1,7.14 -16.15,-20.87 6.92,-9.71 -14.06,-6.21 16.51,-23.99 16.18,-9.41 -19.39,-23.95 -26.04,-24.48 -24.08,-1.94 -16.01,-49.28 -48.72,-37.06 -11.27,4.21 -44.43,7.9 -40.31,-12.28 0.5,-2.47 2.63,-1.38 4.49,-10.47 2.8,-13.74 11.12,6.95 35.2,-17.13 5.34,-5.34 17.39,-16.53 23.99,-17.88 25.26,-5.15 3.6,11.9 41.99,11.9 32.38,0 44.28,-12.27 84.1,-0.69 17.23,5.02 13.54,-14.27 42.81,-14.27 0,2.6 4.38,5.95 3.74,20.94 -0.12,2.62 13.26,20.05 15.89,29.84 4.53,16.86 23.59,17.1 2.99,49.6 -0.2,0.31 -11.45,38.46 -11.47,38.62 -2.98,20.1 -15.76,16.92 15.76,26.42 3.96,1.2 7.78,8.54 9.6,8.91 5.49,23.82 54.19,25.39 55.58,18.69 4.66,-0.96 25.61,-30.37 26.78,-33.77 7.94,-22.93 56.33,-37.3 76.82,-54.09 33.16,-27.17 122.85,14.33 157.45,-31.69 1.97,-2.63 10.53,-8.16 13.95,-9.92l2.99 509.89c-13,-0.12 -16.75,5.4 -24.48,-7.6 -4.38,-7.36 -39.56,5.86 -46.35,9.84 -4.06,2.38 -50.57,4.69 -60.56,-9.78 -9.01,-13.05 -21.02,2.25 -19.63,-32.83 0.33,-8.41 -36.5,-14.35 -41.87,-35.95 -8.59,-34.51 -8.36,-30.93 -20.74,-62.74 -7.61,-19.53 57.91,-52.79 12.51,-58.38 -22.87,-2.81 -29.68,8.45 -25.48,-26.85 2.16,-18.19 38.37,-29.3 12.03,-46.55 -0.39,-0.25 -5.23,-14.67 -5.3,-15.31 -22.75,-10.78 -27.48,-5.11 -35.08,-33.77 -2.2,-8.34 -38.34,-4.89 -39.62,0.68l-12.71 4.49z" />
                                        </g>
                                        <g id="okbemtau">
                                            <title>Okbemtau: {{ totalDerkomour() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil15 str15"
                                                d="M2112.71 1326.8c0.3,-9.56 -16.19,-11.01 -24.05,-28.41 -8.09,-17.89 -42,6.37 -24.29,-13.27 15.59,-17.29 -16.4,-49.07 -18.26,-70.47 -0.43,-4.85 -10.43,-15.96 -10.34,-27.59 0.05,-7.12 -9.02,-8.46 -8.29,-26.98 0.03,-0.78 -3.63,-21.19 6.6,-23.31 2.46,-11.9 40.34,-11.62 52.65,-19.86 1.62,-1.08 15.23,-0.45 31.4,-11.97 9.34,-6.64 30.7,11.64 34.27,-17.38 2.07,-16.84 25.87,-64.97 49.21,-47.17 2.31,1.76 12.5,6.95 12.91,8.91 1.86,0.38 9.71,6.03 9.59,7.6 1.85,0.39 -3.53,31.9 0.55,43.37 5.85,16.44 4.92,23.82 16.39,42.31 14.12,22.78 11.42,48.9 45.86,48.9 1.29,-3.75 15.5,-36.62 17.94,-38.69 22.29,-18.85 31.3,23.23 65.54,-16.89 0.07,-0.1 27.3,-10.99 27.79,-11.09 0.49,-2.36 37.1,-16.43 36.01,9.1 -0.73,17.05 33.33,9.19 39.75,40.24 27.47,5.68 -4.83,29.83 -8.48,40.38 -2.79,0.58 -6.96,24.24 -0.74,25.67 1.72,8.34 63.28,0.4 32.76,31.28 -15.64,15.82 -32.23,25.99 -20.12,47.29 5.1,8.97 -1.67,22.87 18.69,54.58 8.45,13.14 14.06,21.72 30.91,25.16 10.88,2.21 0.04,28.47 35.83,43.23 11.51,4.75 16.9,6.05 -1.44,20.58 -16.87,13.36 -32.35,0.47 -46.61,20.74 -6.4,9.1 -25.93,8.03 -35.88,-3.74 -17.52,-20.73 -48,-31.09 -75.32,-27.73 -19.89,2.45 -4.66,22.3 -57.57,21 -14.27,-0.35 -32.41,4.48 -53.15,4.48 -18.01,0 -31.72,-6.93 -50.77,3.25 -9.25,4.94 -21.14,-16.72 -22,-17.19 -0.91,-5.44 -26.77,-19.87 -27.28,-36.15 -0.31,-9.94 -32.74,-10.23 -45.12,-44.86 -4.6,-12.87 -12.96,-36.58 -23.73,-46.35l-11.21 -8.97z" />
                                        </g>
                                        <g id="okbi">
                                            <title>Okbi: {{ totalSafan() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil13 str16"
                                                d="M2026.87 1512.21c12.05,13.71 -38.15,21.72 -45.49,30.91 -4.08,5.12 -28.46,25.91 -38.39,25.91 -46.13,0 -19.94,-24.69 -58.93,-26.98 -14,-0.82 -29.29,-7.61 -29.29,-23.86 10.37,0.82 52.64,-36.2 59.26,-48.4 7.87,-14.5 15.89,-40.68 27.73,-50.77 7.08,-6.04 23.57,-10.79 11.96,-23.69 -11.77,-13.08 12.87,-34.23 13.07,-34.27 3.29,-14.24 39.64,-33.6 60.88,-27.72 18.41,5.09 24.1,-2.1 18.98,12.51 -5.84,16.67 1.79,-0.35 -7.9,26.23 -16.47,45.19 -37.42,-2.53 -32.14,63.13 0.28,3.56 9.89,36.15 4.61,43.55 -4.04,5.67 4,27.34 11.77,26.72l3.88 6.73z" />
                                        </g>
                                        <g id="okaom">
                                            <title>Okaom: {{ totalKopay() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil17 str17"
                                                d="M2026.87 1740.93c-15.16,-4.42 -19,-15.58 -45.15,-7.97 -22.71,6.61 -21.41,-16.6 -50.35,-17.33 -14.34,-0.36 -0.15,-10.64 20.92,-9.81 2.87,0.12 22.29,-6.3 33.81,-5.85 6.94,0.27 44,-24.06 3.9,-24.06 -8.57,0 -48.44,0.66 -50.18,-7.69 -15.49,-3.19 14.17,-41.11 17.02,-50.23 3.75,-12.01 4.55,-0.07 4.55,-23.19 0,-21.88 -14.3,-18.74 -14.3,-30.07 11.47,0.9 26.61,-31.19 41.56,-19.34 21.49,17.04 38.67,51.21 63.66,55.04 17.63,2.71 -10.19,19.69 17.72,38.59 6.78,4.58 33.92,42.06 36.36,51.25 5.78,21.82 14.41,12.33 11.65,41.56 -1.88,19.81 39.95,46.8 7.97,38.96 -6.11,-1.5 -34.82,0.73 -44.98,-3.68 -12.36,-5.37 -17.11,-0.37 -34.35,-13.66 -0.05,-0.04 -9.48,-2.78 -9.86,-2.76l-9.95 -9.76z" />
                                        </g>
                                        <g id="okhika">
                                            <title>Okhika: {{ totalPantai() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil8 str18"
                                                d="M2138.09 1554.17c-9.99,0 -7.53,-1.22 -17.01,-2.94 -12.75,-2.31 -4.89,-7.22 -39.77,-5.59 -3.31,0.16 -54.3,-27.81 -55.27,-33.76 -1.05,-6.38 -26.68,-23.03 -13.77,-41.19 2.42,-3.4 -7.64,-39.77 -7.64,-52.5 0,-33.63 29.52,-14.16 40.81,-61.02 3.97,-16.51 -2.81,-74.51 30.78,-67.79 13.49,2.69 9.31,15.26 28.56,22.92 0.38,0.15 8.53,18.09 12.24,18.86 0.03,0.14 18.1,20.94 19.57,29.86 0.68,4.17 11.44,33.05 18.69,37.12 7.96,4.47 31.92,22.46 34.69,30.45 0.62,1.82 11.99,16.18 12.89,16.37 0.77,3.73 49.72,33.36 19.56,39.5 -19.77,4.03 -19.15,21.32 -37.01,22.76 -11.59,0.93 -1.05,13.5 -18.2,15.61 -11.66,1.43 -9.17,16.51 -16.83,24.98l-12.29 6.36z" />
                                        </g>
                                        <g id="oklip">
                                            <title>Oklip: {{ totalPantai() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil9 str18"
                                                d="M2112.95 1639.03c-5.51,-4.46 -43.06,-38.82 -42.29,-19.23 0.35,8.75 -24.16,22.73 -16.73,-13.77 2.95,-14.45 -23.1,-4.9 -39.9,-33.71 -4.77,-8.18 -48.75,-32.74 -25.38,-37.5 49.61,-10.1 11.69,-29.84 66.19,-0.73 11.43,6.11 35.57,12.07 49.45,11.53 0.14,-0.01 13.14,7.61 30.66,6.92 1.01,-0.04 15.76,45.77 68.25,43.52 0.14,-0.01 25.04,3.96 35.6,3.96 52.27,0 34.47,-16.88 48.21,21.75 3.92,11.01 -9.89,13.62 -22.75,29.68 -16.36,20.45 -32.24,-32.63 -58.35,0 -10.95,13.68 -36.23,-25.45 -62.06,-2.24 -11.26,10.13 -20.05,-3.41 -23.74,-4.69l-7.16 -5.49z" />
                                        </g>
                                        <g id="oksebang">
                                            <title>Oksebang: {{ totalPantai() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil10 str18"
                                                d="M2279.07 1597.37c3.39,3.36 10.61,34.24 0.12,39.99 -3.93,2.14 -28.53,22.04 -11.84,24.87 11.28,1.91 21.53,23.03 36.71,-2.99 9.31,-15.97 33.75,-28.52 49.98,-38.27 9.41,-5.66 3.55,-52.61 -1.99,-65.56 -11.13,-26.06 3.73,-32.1 -27.37,-9.98 -7.02,5 -16.51,-10.49 -14.77,33.85 0.3,7.54 -29.01,19.9 -30.84,18.09z" />
                                        </g>
                                        <g id="kiwirok">
                                            <title>Kiwirok: {{ totalPantai() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil11 str18"
                                                d="M2386.88 1518.85c-24.35,-14.39 -42.63,21.99 -65.81,26.71 -25.06,5.1 7.84,52.93 -55.22,50.92 -58.73,-1.87 -77.25,14.32 -124.15,-31.11 -15.74,-15.25 5.75,-9.79 14.89,-36.2 1.87,-5.4 11.88,-3.66 24.19,-20 1.36,-1.8 41.28,-29.18 48.36,-28.62 0.17,0.02 33.12,-5.23 43.38,-5.23 29.14,0 56.31,8.94 82.95,-4.36 8.23,-4.11 24.74,0.63 36.46,-13.1 10.91,-12.79 64.9,-1.56 72.93,11.28 0.36,0.58 10.07,7.1 10.47,9.04 14.3,2.97 32.76,25.01 43.25,24.06 12.68,-1.13 23.94,17.13 8.42,34.41 -13.42,14.92 -30.38,-8.23 -39.64,-8.23 -15.88,0 -66.92,-0.18 -78.72,-5.04 -1.32,-0.55 -15.27,-1.79 -16.46,-1.69l-5.3 -2.84z" />
                                        </g>
                                        <g id="kiwirok-timur">
                                            <title>Kiwirok Timur: {{ totalPantai() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil16 str18"
                                                d="M2688.35 1510.67c-11.25,0 -49.36,-3.72 -49.36,11.77 0,27.66 -5.35,66.53 -29.72,82.52 -21.59,14.17 -40.01,14.12 -64.58,1.86 -12.45,-6.21 -43.66,-14.19 -46.56,-17.63 -8.13,-9.65 11.9,-49.64 27.18,-54.04 1.17,-0.34 27.67,-24.23 -8.97,-33.66 -25.68,-6.6 -8.52,-13.96 7.41,-26.73 12.05,-9.65 22.72,6.31 47.38,-21.13 5.78,-6.44 40.69,-1.2 53.84,-9.53 3.06,-1.94 37.96,-16.56 40.95,-6.18 2.58,8.98 19.81,6 22.43,7.48l0 65.27z" />
                                        </g>
                                        <g id="oksamol">
                                            <title>Oksamol: {{ totalPantai() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil26 str18"
                                                d="M2687.21 1780.3c-0.28,-0.05 -31.79,9.18 -40.59,8.52 -14.46,-1.07 -33.81,5.79 -51.03,-1.6 -16.77,-7.19 -71.45,11.72 -77.29,-13.83 -2.79,-12.2 -36.55,-7.17 -46.5,-9.69 -5.67,-1.43 -30.01,-10.75 -35.67,-11.21 -4.47,-0.35 -12.15,-2.37 -18.12,-3.21l-17.43 -4.81c-0.04,-0.07 -11.51,-8.24 -13.1,-15.05 -0.02,-0.08 -10.45,-16.59 -12.87,-17.72 -12.26,-5.72 -31.67,-19.82 -38.06,-31.49 -12.48,-22.83 -52.15,9.87 -39.23,-14.04 16.53,-30.61 60.46,-35.09 63.14,-51 3.63,-21.49 -4.05,-56.11 -12.79,-75.45 -4.14,-9.16 13.67,-18.27 20.53,-21.05 13,-5.27 23.7,5.45 40.16,5.45 18.1,0 25.5,6.41 46.76,6.41 18.2,0 31.67,-9.35 46.46,2.96 9.37,7.8 11.26,7.9 2.72,19.32 -6.39,8.53 -8.67,16.57 -8.67,27.33 0.21,0.05 14.84,24.02 45.05,23.09 2.85,-0.09 19.45,9.53 29.4,11.08 14.61,2.29 22.9,5.74 35.03,-5.26 16.83,-15.27 13.45,-11.27 22.55,-32.55 8.8,-20.56 6.39,-28.13 9.06,-49.82 2.6,-21.16 35.75,-15.39 49.64,-15.39l0.85 269.01z" />
                                        </g>
                                        <g id="alemsom">
                                            <title>Alemsom: {{ totalPantai() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil32 str18"
                                                d="M987.3 1398.59c18.33,6.16 37.65,-5.32 55.43,-10.87 46.14,-14.41 63.86,-28.73 98.49,17.79 4.42,5.94 71.86,20.75 83.27,20.75 0.05,-0.15 24.58,-31.62 25.7,-31.62 23.81,0 10.53,29.42 63.17,18.69 8.42,-1.72 27.88,-2.06 31.71,8.98l3.95 13.84c21.48,0 49.99,11.63 62.6,28.4 11.65,15.5 6.84,0.38 15.48,28.02 5.12,16.39 30.07,20.89 41.08,39.02 6.08,10.02 29.67,28.51 34.68,50.35 11.05,2.3 -9.71,38.87 17.39,54.75 40.85,23.94 16.83,28.7 10.62,41.59l-8.9 13.84c-8.6,0.83 -12.56,12.29 -41.76,13.75 -54.44,2.72 -32.75,16.65 -66.78,32.95 -53.92,25.83 22.43,76.31 -8.42,108.21 -9.94,10.28 9.85,20.44 10.23,29.9 0.5,12.77 -17.17,24.5 -30.56,26.77 -25.33,4.29 -32.7,39.67 -32.7,60.2 0,18.91 -4.94,14.12 -4.94,21.75l-0.98 40.52c-14.41,40.34 -85.01,58.02 -57.58,124.52 0.76,1.85 6.47,31.93 -8.47,21.41 -2.88,-2.03 -106.76,-18.81 -117.95,-10.87 -13.54,9.6 -82.77,30.53 -104.59,38.62 -7.58,2.82 -70.33,24.75 -71.16,24.97l0.99 -826.23z" />
                                        </g>
                                        <g id="okbape">
                                            <title>Okbabpe: {{ totalPantai() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil16 str18"
                                                d="M1413.66 1872.15c-5.47,-16.98 -24.46,-14.16 -2.72,-38.26 14.51,-16.1 -31.14,-56.5 -13.36,-81.69 7.44,-10.53 25.67,-15.49 37.96,-29.15 11.29,-12.55 46.18,-17.39 64.85,-21.19 6.67,-1.36 16.99,-6.43 17.82,-6.6l0.87 -1.37 11.79 -15.61c-9.47,-8.29 20.15,-4.15 5.22,-32.79 -15.66,-30.05 -41.68,-11.94 -31.89,-59.94 4.78,-23.48 -40.1,-53.22 -52.21,-71.91 -0.62,-0.95 -33.15,-17.86 -26.98,-35.69 20.3,-4.2 -10.35,-46.31 44.8,-40.44 20.71,2.21 25.69,-0.42 45.86,7.97 13.56,5.64 39.97,1.61 49.51,11.67 12.08,12.72 65.53,34.88 83.8,34.88 66.85,0 39.95,-4.66 84.61,31.65 13.66,11.11 45.22,12.03 69.04,26.47 18.11,10.98 -22.93,37.05 14.76,48.98 33.84,10.71 14.16,40.96 27.67,50.46 0.52,0.36 18.94,44.3 -33.09,42.8 -21.46,-0.62 -9.95,8.53 -41.61,-6.47 -26.05,-12.33 -15.39,12.96 -21.56,21.62 -4.94,6.94 -2.37,7.27 -16.57,11.7 -11.49,3.59 -41.54,18.29 -44.93,31.47 -4.81,18.71 -51.82,41.59 -70.89,41.12 -31.56,-0.78 -12.58,35.98 -51.72,39.69 -25.25,2.39 -37.31,5.84 -61.31,-5.3 -22.27,-10.34 -35.75,17.48 -62.05,16.45 -8.53,-0.34 -18.57,29.82 -23.54,32.27 -1.5,0.75 -1.55,-0.03 -1.88,1.37l-2.25 -4.16z" />
                                        </g>
                                        <g id="awimbom">
                                            <title>Awimbom: {{ totalPantai() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil25 str18"
                                                d="M1290.7 2173.67c3.67,-30.26 -30.07,-53.99 -2.63,-75.5 3.21,-2.52 17.23,-27.3 35.2,-40.74 34.72,-25.96 14.21,-37.13 24.61,-70.4 8.71,-27.89 -1.3,-69.91 35.82,-78.63 3.93,-0.93 27.16,-12.99 27.66,-17.39 1.68,-14.73 16.96,-29.44 21.13,-41.48 2.33,-0.49 3.48,-6.68 19.05,-9.1 15.69,-2.44 35.38,-26.53 69.92,-7.48 12.1,6.68 39.63,1.53 51.09,-2.8 18.69,-7.05 19.03,-29.7 45.97,-38.51 9.31,-3.05 60.97,-21.44 67.54,-17.26 11.65,7.39 23.45,40.09 22.92,53.34 -1.5,38.14 57.01,20.66 61.25,45.66 2.26,13.38 36.34,14.89 41.18,37.94 4.75,22.64 25.62,24.58 -1.69,44.11 -9.05,6.48 -34.02,48.46 -20.67,55.95 5.31,2.98 28.85,37.51 29.77,42.93 2.37,13.98 11.43,41.36 -4.61,51.4 -23.18,14.5 -20.82,4.7 -40.37,14.89 -35.05,18.26 -22.8,30.53 -37,50.47 -8.38,11.77 14.01,39.89 14.01,47.47 0,30.35 -25.65,12.71 -23.24,32.34 1.88,15.31 16.28,10.62 -9.65,22.92 -3.95,1.87 -4.81,18.7 -35.21,4.87 -5.2,-2.37 -58.44,-8.49 -63.74,-15.08 -3.5,-4.36 -133.1,-23.85 -157.62,-35.33 -19.48,-9.13 -45.62,-3.88 -75.58,-22.05 -0.25,-0.16 -26.17,-7.55 -32.21,-10.66 -10.92,-5.61 -51.3,-7.77 -62.9,-21.88z" />
                                        </g>
                                        <g id="serambakon">
                                            <title>Serambakon: {{ totalPantai() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil31 str18"
                                                d="M1848.64 1909.21c-31.75,-22.41 -40.54,-7.07 -69.31,-24.93 -13.63,-8.46 -1.42,-9.59 -28.22,-25.29 -11.95,-7 -38.35,-9.24 -40.57,-20.12 -5.66,-27.78 -0.27,-53.71 -33.45,-67.85 -9.61,-4.09 17.66,-29.38 25.17,-31.72 12.35,-3.85 50.54,-24.96 50.09,-39.99 -1.07,-35.75 25.46,-1.68 40.99,-1.68 38.54,0 46.11,-14.64 53.64,-14.27 9.62,0.47 39.25,28.69 61.69,32.89 6.9,1.3 59.36,-11.55 56.01,29.23 -0.61,7.37 13.41,15.67 18.75,16.38 11.2,1.49 5.32,29.34 23.11,30.65 3.3,0.24 5.53,11.16 21.43,12.71 6.45,0.63 16.91,23.99 2.99,37.19 -5.8,5.5 -8.97,40.76 -22.73,52.79 -25.4,22.19 -42.08,19.52 -61.43,31.82 -8.32,5.29 -36.72,19.11 -45.42,15.21 -15.55,-6.97 -26.69,-24.85 -46.61,-30.03l-6.13 -2.99z" />
                                        </g>
                                        <g id="kawor">
                                            <title>Kawor: {{ totalPantai() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil24 str18"
                                                d="M1856.45 2302.46c16.09,-4.63 -97.24,-14.42 -100.56,-16.25 -7.36,-4.07 -70.09,1.58 -35.14,-20.57 15.94,-10.1 7.73,-1.82 6.93,-22.24 -0.21,-5.21 36.42,-4.55 22.68,-36.63 -6.07,-14.19 -26.67,-29.56 -7.92,-57.57 33.78,-50.49 55.18,-15.73 80.74,-55.52 7.07,-11.01 -8.37,-57.91 -17,-68.2 -4.33,-5.16 0.64,-5.66 -14.21,-16.96 -19.92,-15.17 4.79,-43.2 18.01,-53.15 9.02,-6.79 20.91,-21.3 8.16,-30.27 -0.16,-0.12 -29.83,-42.09 5.98,-28.79 41.79,15.51 72.98,58 121.12,57.01 13.49,-0.28 39.46,28.92 47.36,39.43 9.07,12.07 49.25,17.07 63.78,-8.84 14.13,-25.21 25.39,-8.28 25.61,14.2 0.23,23.74 54.27,29.22 54.45,29.42 25.36,27.36 -19.79,70.24 33.15,96.8 8.25,4.14 73.93,22.2 35.08,38.88 -9.42,4.05 -21.18,-4.9 -18.69,24.12 0.87,10.14 -35.04,43.36 -45.18,43.36 -11.67,0 -36.78,-4.97 -40.48,4.74 -32.26,10.76 -39.94,-2.96 -58.7,-4.67 -25.04,-2.29 -0.68,36.23 -28.22,41.93 -3.29,9.5 13.09,15.71 -16.64,28.02 -8.27,3.43 -1.88,14.34 -21.06,1.2 -7.78,-5.33 -12.52,1.77 -12.52,11.02 0,18.48 -25.86,0 -41.87,0.75 -4.74,0.22 -38.85,-7.48 -45.6,-7.48l-19.26 -3.74z" />
                                        </g>
                                        <g id="oksibil">
                                            <title>Oksibil: {{ totalPantai() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil30 str18"
                                                d="M2195.55 1940.27c-2.52,0.92 -6.48,3.62 -7.35,3.48 -2.86,-0.47 -3.32,9 -3.73,9.15 -8.91,3.32 -18.91,-10.76 -18.91,-7.8l-16.26 -9.1c-10.88,-13.65 9.29,-6.91 -16.9,-28.78 -3.53,-2.95 -21.17,-19.6 -14.31,-24.71 0.41,-0.31 9.42,-19.36 -9.92,-13.65 -38.22,11.28 10.3,-28.45 -24.54,-28.45 -16.08,0 -23.39,-2.31 -36.24,-10.57 -13.4,-8.6 -4.42,-5.74 -16.2,-19.56 -5.51,-6.45 -36.48,-14.08 -37.23,-29.2 -1.64,-32.88 -30.81,-8.57 -27.96,-44.05 0.7,-8.67 13.44,-2.82 27.74,-6.98 4.65,-1.36 31.38,13.76 38.41,16.2 2.04,9.88 57.06,23.94 71.58,23.94 14.06,0 28.56,0.65 43.62,0.65 -0.07,0.94 9.57,11.11 11,19.57 1.88,11.08 57.32,30.84 61.77,52.66 3.16,15.49 31.7,21.31 33.98,32.34 2.96,0.62 13.58,16.4 -3.42,20.27 -8.25,1.88 -8.22,27.49 -29.91,31.16 -2.64,0.44 -15.36,6.65 -19.45,9.16l-5.77 4.27z" />
                                        </g>
                                        <g id="kalomdol">
                                            <title>Kalomdol: {{ totalPantai() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil17 str18"
                                                d="M2203.62 1993.04c14.55,22.14 -10.71,14.9 -27.37,15.61 -1.83,0.08 -59.47,-18.06 -59.88,-22 -4.71,-1.09 -2.51,-4.3 -13.54,-5.26 -4.89,-0.42 -36.53,-26.62 -41.73,-1.47 -1.47,0.31 -14.49,28.36 -51.21,20.87 -22.71,-4.64 -22.25,-22.29 -44.27,-37.23 -17.3,-11.74 -1.17,-4.2 -20.87,-8.83 -8.32,-1.95 -40.39,-5.58 -31.16,-13.88 0.37,-0.33 79.01,-33.41 81.07,-35.82 8.51,-9.98 19.65,-5.75 26.06,-35.38 1.33,-6.11 13.79,-43.88 19.03,-41.95 19.27,7.08 19.05,11.22 44.81,11.22 22.97,0 2.58,15.48 10.35,29.86 4.86,8.99 36.28,-11.42 26.61,6.39 -14.59,26.88 23.58,27.79 23.58,50.24 0,10.96 24.8,23.61 34.83,23.41 14.95,-0.3 1.97,16.27 16.48,31.27 1.56,1.61 3.53,1.68 4.61,3.2l2.6 9.75z" />
                                        </g>
                                        <g id="pepera">
                                            <title>Pepera: {{ totalPantai() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil20 str18"
                                                d="M2352.92 1906.48c-18.65,8.69 -19.69,25.85 -53.48,9.1 -5.9,-2.93 -59.05,-11.85 -54.04,-20.13 0.09,-0.15 30,-13.98 -3.16,-29.24 -25.25,-11.6 -10.11,-28.14 -48.44,-51.28 -11.85,-7.15 -35.39,-19.37 -38.89,-29.23 -9.8,-27.55 -13,-11 -29.17,-39.64 -18.55,-32.83 -4.07,-20.02 -14.77,-50.99 -5.45,-15.79 -49.55,-63.48 -47.74,-66.5 0.29,-0.46 6.27,-2.28 8.1,-11.02 3.86,-18.37 47.43,31.75 53.98,32.71 9.32,1.37 5.22,14.17 34.34,-4.91 15.97,-10.46 50.08,22.9 57.27,-0.58 29.36,-9.81 25.41,17.17 57.78,19.7 14.46,1.14 12.74,16.73 40.64,8.49 21.64,-6.4 16.15,12.11 34.51,22.5 10.44,5.9 14.41,15.23 31.44,20.43 1.6,4.2 10.48,23.97 13.76,25.94 15.07,9.04 46.31,7.76 66.24,19.44 17.35,10.18 52.51,-7.46 60.09,17.7 4.89,16.24 56.09,1.2 75.67,8.78 10.09,3.91 67.62,1.13 80.83,-5.3 25.48,-12.39 7.52,28.31 14.77,45.88 7.42,17.99 -2.85,39.36 -22.57,47.25 -1.63,0.65 -14.33,37.36 -31.22,0.61 -23.6,-51.36 -40.75,14.5 -76.35,-12.45 -14.76,-11.19 -14.01,-0.12 -14.01,-30.11 0,-20.33 -27.66,-18.49 -47.12,-22.7 -25.88,-5.59 -40.04,43.58 -84.58,43.58 -31.55,0 -35.16,-4.84 -52.48,23.86 -4.91,8.14 -8.82,26.92 -11.4,28.11z" />
                                        </g>
                                        <g id="iwur">
                                            <title>Iwur: {{ totalPantai() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil12 str18"
                                                d="M2311.57 2372.81l-348.02 -51.64 -0.37 -8.24c-3.96,-28.83 21.11,3.6 26.98,-5.21 10.38,-15.57 24.73,-5.53 23.58,-32.45 -0.04,-0.8 10.08,-4.2 12.95,-18.27 6.61,-32.46 -3.65,-25.29 27.31,-20.7 12.56,1.87 42.65,7.91 50.56,-4.12 8.52,-12.96 39.52,7.75 49.81,-8.83 4.26,-0.55 33,-24.07 33,-37.82 0,-38.57 27.84,-14.39 28.61,-33.82 0.23,-5.97 -31.01,-17.09 -34.36,-17.67 -1.1,-2.14 -21.36,-10.62 -25.64,-19.23 -2.11,-4.25 -5.87,-3.58 -12.35,-20.32 -9.22,-23.79 10.61,-58.83 -12.25,-67.21 -33.87,-12.41 -42.98,3.78 -50.83,-45.63 -1.73,-10.88 -5.36,-10.13 12.52,-2.8 19.88,8.14 60.75,29.32 79.99,28.5 4.93,-0.21 26.57,9.78 28.61,3.9 12.07,0.95 5.79,-19.83 -1.3,-28.28 -1.95,-2.33 -21.75,-33.92 -11.82,-36.21 0.92,-4.43 35.63,-28.02 43.85,-13.6 13.92,24.41 -5.75,29.77 14.79,49.48 35.34,33.91 48.19,3.83 69.1,44.81 7.7,15.1 32.47,17.22 26.01,42.27 -3.47,13.45 22.42,18.18 31.16,25.19 13.09,10.51 39.29,-3.97 49.74,13.29 11.7,19.32 52.44,50.62 73.65,59.94 0.96,8.34 36.45,4.71 45.74,11.96 5.33,4.16 26.49,24.93 26.49,31.44 0,21.07 -2.44,10.45 -4.6,23.41 -0.95,5.67 25.99,2.74 35.76,7.69 11.89,6.02 20.62,-9.46 32.91,-10.24 32.62,-2.06 3.42,5.67 36.78,7.1 9.73,0.42 -8.57,-39.67 19.46,-39.67l-1.3 241.26 -44.87 -6.5c-13.23,-3.48 -87.96,-20.49 -96.25,-20.16 -0.37,0.01 -25.65,-7.46 -35.06,-7.16 -13.76,0.44 -60.81,-15.96 -87.78,-17.5 -15.41,-0.87 -77.85,-6.55 -89.95,-10.77l-1.8 -0.34 -20.81 -5.85z" />
                                        </g>
                                        <g id="tarup">
                                            <title>Tarup: {{ totalPantai() }} siswa</title>
                                            <desc>
                                                <image href="philipus.jpg" alt=""></image>
                                                <p>Kampung: Omor, Onavai, Yamas, Yaun, Yeni, dan Yufri (Smith). Penduduk
                                                    (2017): 2.776 jiwa (1.339 L, 1.437 P, 639 rumah tangga.</p>
                                            </desc>
                                            <path class="fil19 str18"
                                                d="M2689.39 2199.83c-24.99,-5.36 -1.46,58.79 -38.94,35.92 -27.14,-16.55 -30.15,18.63 -73.25,3.68 -33.78,-11.72 5.27,-22.78 -17.63,-43.96 -12.39,-11.47 -20.73,-22.55 -40.46,-21.31 -27.81,1.74 -55.8,-32.78 -60.65,-33.79 -1.5,-7.27 -32.76,-21.53 -36.53,-33.85 -1.58,-0.33 -5.61,-7.63 -8.55,-9.15 -10.44,-5.44 -82.72,6.85 -71.19,-40.4 4.46,-18.28 -26.58,-19.11 -27.42,-36.91 -0.51,-10.76 -18.38,-18.7 -30.93,-18.7 -21.75,0 -43.94,-14.98 -43.94,-39.65 0,-36.9 -19.29,-28.21 -11.41,-38.14 1.95,-2.46 13.4,-8.8 15.9,-20.01 2.5,-11.21 46.38,13.96 62.09,15.45 28.99,2.75 38.07,3.21 54.8,-24.43 3.89,-6.42 3.42,-13.31 13.83,-26.43 1.51,-1.92 6.7,-8.24 7.67,-9.66 12.26,-17.93 48.55,17.03 91.45,-30.67 33.73,-37.5 48.12,-8.75 72.99,-3.62 8.12,23.48 -4.81,47.33 41.53,43.33 15.99,-1.38 39.65,-26.17 47.06,-1.56 1.26,4.18 14.96,32.65 24.75,21.2 2.95,-3.46 27.46,-22.97 27.42,-23.45l1.41 336.11z" />
                                        </g>
                                    </svg>
                                </div>
                                <div id="distrikInfo"></div>
                            </div>
                            <!-- /.card-body-->
                            <div class="card-footer bg-transparent">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <div id="sparkline-1"></div>
                                        <div class="text-white">Sikap</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <div id="sparkline-2"></div>
                                        <div class="text-white">Skill</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <div id="sparkline-3"></div>
                                        <div class="text-white">Pengetahuan</div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.card -->
                        <!-- Map card -->
                        <div class="card bg-gradient-primary">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    Pegunungan Bintang
                                </h3>
                                <!-- card tools -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary btn-sm daterange" data-toggle="tooltip"
                                        title="Date range">
                                        <i class="far fa-calendar-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <div class="card-body">
                                <div id="world-map" style="height: 450px; width: 100%;">
                                </div>
                            </div>
                            <!-- /.card-body-->
                        </div>
                        <!-- /.card -->
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
                labels: ['Agama Islam', 'Agama Kristen', 'Agama Katolik', 'PPKn', 'B. Indonesia', 'Matematika', 'IPA','IPS','PJOK','SBK'],
                datasets: [{
                        label: 'Pemetaan Awal',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
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
                    {
                        label: 'Pemetaan Akhir',
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
