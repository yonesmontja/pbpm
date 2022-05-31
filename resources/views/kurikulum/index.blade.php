@extends('layouts.master2')

@section('title')
    <title> SD Dabolding Kurikulum </title>
@endsection

@section('header')
    <style type="text/css">
        /* Chart.js */
        @keyframes chartjs-render-animation {
            from {
                opacity: .99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            animation: chartjs-render-animation 1ms
        }

        .chartjs-size-monitor,
        .chartjs-size-monitor-expand,
        .chartjs-size-monitor-shrink {
            position: absolute;
            direction: ltr;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            visibility: hidden;
            z-index: -1
        }

        .chartjs-size-monitor-expand>div {
            position: absolute;
            width: 1000000px;
            height: 1000000px;
            left: 0;
            top: 0
        }

        .chartjs-size-monitor-shrink>div {
            position: absolute;
            width: 200%;
            height: 200%;
            left: 0;
            top: 0
        }

    </style>
@endsection

@section('content2')
    <div class="content-wrapper" style="min-height: 454px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">CAPAIAN KELAS</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">CAPAIAN KELAS</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"><a href="/kelas/1/profile">Kelas 1</a></span>
                                <span class="info-box-number">
                                    {{ totalKelas1() }}
                                    <small> siswa</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"><a href="/kelas/2/profile">Kelas 2</a></span>
                                <span class="info-box-number">
                                    {{ totalKelas2() }}
                                    <small> siswa</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"><a href="/kelas/3/profile">Kelas 3</a></span>
                                <span class="info-box-number">
                                    {{ totalKelas3() }}
                                    <small> siswa</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"><a href="/kelas/4/profile">Kelas 4</a></span>
                                <span class="info-box-number">
                                    {{ totalKelas4() }}
                                    <small> siswa</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"><a href="/kelas/5/profile">Kelas 5</a></span>
                                <span class="info-box-number">
                                    {{ totalKelas5() }}
                                    <small> siswa</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text"><a href="/kelas/6/profile">Kelas 6</a></span>
                                <span class="info-box-number">
                                    {{ totalKelas6() }}
                                    <small> siswa</small>
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Laporan Bulanan</h5>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                            <i class="fas fa-wrench"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                                            <a href="/kelas" class="dropdown-item">Data Kelas</a>
                                            <a href="/mapel" class="dropdown-item">Data Mapel</a>
                                            <a href="/test" class="dropdown-item">Data Siswa</a>
                                            <a class="dropdown-divider"></a>
                                            <a href="/nilai" class="dropdown-item">Nilai</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="text-center">
                                            <strong>Rata-rata Nilai: Jan-Jun, 2022</strong>
                                        </p>

                                        <div class="chart">
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                            <!-- Sales Chart Canvas -->
                                            <canvas id="salesChart" height="180"
                                                style="height: 180px; display: block; width: 1044px;" width="1044"
                                                class="chartjs-render-monitor"></canvas>
                                        </div>
                                        <!-- /.chart-responsive -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <p class="text-center">
                                            <strong>Persentase Jumlah Siswa</strong>
                                        </p>

                                        <div class="progress-group">
                                            Kelas 1
                                            <span
                                                class="float-right"><b>{{ totalKelas1() }}</b>/{{ totalSiswa() }}</span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-primary"
                                                    style="width: {{ totalKelas1Percentage() }}%"></div>
                                            </div>
                                        </div>
                                        <!-- /.progress-group -->

                                        <div class="progress-group">
                                            Kelas 2
                                            <span
                                                class="float-right"><b>{{ totalKelas2() }}</b>/{{ totalSiswa() }}</span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-primary"
                                                    style="width: {{ totalKelas2Percentage() }}%"></div>
                                            </div>
                                        </div>

                                        <!-- /.progress-group -->
                                        <div class="progress-group">
                                            <span class="progress-text">Kelas 3</span>
                                            <span
                                                class="float-right"><b>{{ totalKelas3() }}</b>/{{ totalSiswa() }}</span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-primary"
                                                    style="width: {{ totalKelas3Percentage() }}%"></div>
                                            </div>
                                        </div>

                                        <!-- /.progress-group -->
                                        <div class="progress-group">
                                            Kelas 4
                                            <span
                                                class="float-right"><b>{{ totalKelas4() }}</b>/{{ totalSiswa() }}</span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-primary"
                                                    style="width: {{ totalKelas4Percentage() }}%"></div>
                                            </div>
                                        </div>
                                        <!-- /.progress-group -->
                                        <div class="progress-group">
                                            Kelas 5
                                            <span
                                                class="float-right"><b>{{ totalKelas5() }}</b>/{{ totalSiswa() }}</span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-primary"
                                                    style="width: {{ totalKelas5Percentage() }}%"></div>
                                            </div>
                                        </div>
                                        <!-- /.progress-group -->
                                        <div class="progress-group">
                                            Kelas 6
                                            <span
                                                class="float-right"><b>{{ totalKelas6() }}</b>/{{ totalSiswa() }}</span>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-primary"
                                                    style="width: {{ totalKelas6Percentage() }}%"></div>
                                            </div>
                                        </div>
                                        <!-- /.progress-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- ./card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-success"><i
                                                    class="fas fa-caret-up"></i> {{ totalKelas6Percentage() }}%</span>
                                            <h5 class="description-header">{{ totalKelas6() }}</h5>
                                            <span class="description-text">Skill Kelas 6</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-warning"><i
                                                    class="fas fa-caret-left"></i> {{ totalKelas5Percentage() }}%</span>
                                            <h5 class="description-header">{{ totalKelas5() }}</h5>
                                            <span class="description-text">Skill Kelas 5</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-success"><i
                                                    class="fas fa-caret-up"></i> {{ totalKelas4Percentage() }}%</span>
                                            <h5 class="description-header">{{ totalKelas4() }}</h5>
                                            <span class="description-text">Skill Kelas 4</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block">
                                            <span class="description-percentage text-danger"><i
                                                    class="fas fa-caret-down"></i>
                                                {{ totalKelas4Percentage() + totalKelas5Percentage() + totalKelas6Percentage() }}%</span>
                                            <h5 class="description-header">
                                                {{ totalKelas4() + totalKelas5() + totalKelas6() }}</h5>
                                            <span class="description-text">Kelas 4+5+6</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Penilaian Siswa</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="chart-responsive">
                                            <h4 class="header-title" align="center">Jumlah Penilaian Semua Mapel per Bulan</h4>
                                            <canvas id="mataChart" class="chartjs" width="undefined"
                                                height="undefined"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Nilai Rata-rata Siswa per Kelas</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="chart-responsive">
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                            <canvas id="pieChart" height="159" width="318" class="chartjs-render-monitor"
                                                style="display: block; width: 318px; height: 159px;"></canvas>
                                        </div>
                                        <!-- ./chart-responsive -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-3">
                                        <ul class="chart-legend clearfix">
                                            <li><i class="far fa-circle text-danger"></i> Kelas 1</li>
                                            <li><i class="far fa-circle text-success"></i> Kelas 2</li>
                                            <li><i class="far fa-circle text-warning"></i> Kelas 3</li>
                                            <li><i class="far fa-circle text-info"></i> Kelas 4</li>
                                            <li><i class="far fa-circle text-primary"></i> Kelas 5</li>
                                            <li><i class="far fa-circle text-secondary"></i> Kelas 6</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="chart-responsive">
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                            <canvas id="pieChart2" height="159" width="318" class="chartjs-render-monitor"
                                                style="display: block; width: 318px; height: 159px;"></canvas>
                                        </div>
                                        <!-- ./chart-responsive -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-3">
                                        <ul class="chart-legend clearfix">
                                            <li><i class="far fa-circle text-danger"></i> Kelas 1</li>
                                            <li><i class="far fa-circle text-success"></i> Kelas 2</li>
                                            <li><i class="far fa-circle text-warning"></i> Kelas 3</li>
                                            <li><i class="far fa-circle text-info"></i> Kelas 4</li>
                                            <li><i class="far fa-circle text-primary"></i> Kelas 5</li>
                                            <li><i class="far fa-circle text-secondary"></i> Kelas 6</li>
                                        </ul>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer bg-white p-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Sikap
                                            <span class="float-right text-danger">
                                                <i class="fas fa-arrow-down text-sm"></i>
                                                12%</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Keterampilan
                                            <span class="float-right text-success">
                                                <i class="fas fa-arrow-up text-sm"></i> 4%
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            Pengetahuan
                                            <span class="float-right text-warning">
                                                <i class="fas fa-arrow-left text-sm"></i> 0%
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.footer -->
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Penilaian Siswa</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Info Boxes Style 2 -->
                                @foreach ($kelas_average as $l => $k)
                                    <!-- /.info-box -->
                                    <div class="info-box mb-3 bg-info">
                                        <span class="info-box-icon"><i class="far fa-comment"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Kelas {{ $l + 1 }}</span>
                                            <span class="info-box-number">{{ $k }}</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                @endforeach
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.row -->

        </section>
    </div>
@endsection

@section('footer')
    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('/admin/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('/admin/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('/admin/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <!--script src="{{ asset('/admin/plugins/jquery-mapael/maps/usa_states.min.js') }}"></!--script-->
    <script src="{{ asset('/admin/plugins/jquery-mapael/maps/pegubin.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('/admin/plugins/chart.js/Chart.min.js') }}"></script>
@endsection
