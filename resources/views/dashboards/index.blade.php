@extends('layouts.master1')

@section('title')
    <title> CAPAIAN SISWA </title>
@endsection
@section('header')
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
                <div class="row mb-6">
                    <div class="col-sm-6">
                        <h5 class="m-0 text-dark">PEMETAAN AWAL BAHASA INDONESIA</h5>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ count($high_pemetaan_indonesia_total) }} siswa</h3>
                                <p>High</p>
                                @if (count($high_pemetaan_indonesia_total) == !null)
                                    <h5>Nilai rata-rata:
                                        {{ number_format((float) array_sum($high_pemetaan_indonesia_total) / count($high_pemetaan_indonesia_total), 1, '.', '') }}
                                    </h5>
                                @endif
                                @if (count($high_pemetaan_indonesia_total) == null)
                                    <h5>Nilai rata-rata: {{ count($high_pemetaan_indonesia_total) }}</h5>
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
                                <h3>{{ count($pass_pemetaan_indonesia_total) }} siswa</h3>
                                <p>Pass</p>
                                @if (count($pass_pemetaan_indonesia_total) == !null)
                                    <h5>Nilai rata-rata:
                                        {{ number_format((float) array_sum($pass_pemetaan_indonesia_total) / count($pass_pemetaan_indonesia_total), 1, '.', '') }}
                                    </h5>
                                @endif
                                @if (count($pass_pemetaan_indonesia_total) == null)
                                    <h5>Nilai rata-rata: {{ count($pass_pemetaan_indonesia_total) }}</h5>
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
                                <h3 class="text-white">{{ count($low_pemetaan_indonesia_total) }} siswa</h3>
                                <p class="text-white">Low</p>
                                @if (count($low_pemetaan_indonesia_total) == !null)
                                    <h5 class="text-white">Nilai rata-rata:
                                        {{ number_format((float) array_sum($low_pemetaan_indonesia_total) / count($low_pemetaan_indonesia_total), 1, '.', '') }}
                                    </h5>
                                @endif
                                @if (count($low_pemetaan_indonesia_total) == null)
                                    <h5 class="text-white">Nilai rata-rata: {{ count($low_pemetaan_indonesia_total) }}
                                    </h5>
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
                                <h3>{{ count($underlow_pemetaan_indonesia_total) }} siswa</h3>
                                <p>Under Low</p>
                                @if (count($underlow_pemetaan_indonesia_total) == !null)
                                    <h5>Nilai rata-rata:
                                        {{ number_format((float) array_sum($underlow_pemetaan_indonesia_total) / count($underlow_pemetaan_indonesia_total), 1, '.', '') }}
                                    </h5>
                                @endif
                                @if (count($underlow_pemetaan_indonesia_total) == null)
                                    <h5>Nilai rata-rata: {{ count($underlow_pemetaan_indonesia_total) }}</h5>
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
                <!-- Small boxes (Stat box) -->
                <div class="row mb-6">
                    <div class="col-sm-6">
                        <h5 class="m-0 text-dark">PEMETAAN AWAL MATEMATIKA</h5>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ count($high_pemetaan_matematika_total) }} siswa</h3>
                                <p>High</p>
                                @if (count($high_pemetaan_matematika_total) == !null)
                                    <h5>Nilai rata-rata:
                                        {{ number_format((float) array_sum($high_pemetaan_matematika_total) / count($high_pemetaan_matematika_total), 1, '.', '') }}
                                    </h5>
                                @endif
                                @if (count($high_pemetaan_matematika_total) == null)
                                    <h5>Nilai rata-rata: {{ count($high_pemetaan_matematika_total) }}</h5>
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
                                <h3>{{ count($pass_pemetaan_matematika_total) }} siswa</h3>
                                <p>Pass</p>
                                @if (count($pass_pemetaan_matematika_total) == !null)
                                    <h5>Nilai rata-rata:
                                        {{ number_format((float) array_sum($pass_pemetaan_matematika_total) / count($pass_pemetaan_matematika_total), 1, '.', '') }}
                                    </h5>
                                @endif
                                @if (count($pass_pemetaan_matematika_total) == null)
                                    <h5>Nilai rata-rata: {{ count($pass_pemetaan_matematika_total) }}</h5>
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
                                <h3 class="text-white">{{ count($low_pemetaan_matematika_total) }} siswa</h3>
                                <p class="text-white">Low</p>
                                @if (count($low_pemetaan_matematika_total) == !null)
                                    <h5 class="text-white">Nilai rata-rata:
                                        {{ number_format((float) array_sum($low_pemetaan_matematika_total) / count($low_pemetaan_matematika_total), 1, '.', '') }}
                                    </h5>
                                @endif
                                @if (count($low_pemetaan_matematika_total) == null)
                                    <h5 class="text-white">Nilai rata-rata:
                                        {{ count($low_pemetaan_matematika_total) }}</h5>
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
                                <h3>{{ count($underlow_pemetaan_matematika_total) }} siswa</h3>
                                <p>Under Low</p>
                                @if (count($underlow_pemetaan_matematika_total) == !null)
                                    <h5>Nilai rata-rata:
                                        {{ number_format((float) array_sum($underlow_pemetaan_matematika_total) / count($underlow_pemetaan_matematika_total), 1, '.', '') }}
                                    </h5>
                                @endif
                                @if (count($underlow_pemetaan_matematika_total) == null)
                                    <h5>Nilai rata-rata: {{ count($underlow_pemetaan_matematika_total) }}</h5>
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
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-header">
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Nilai
                                                Siswa</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#donut-chart" data-toggle="tab">Pemetaan Awal</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="revenue-chart"
                                        style="position: relative; height: 350px;">
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span class="text-bold text-lg">{{ $this_month }}</span>
                                                <span>Nilai saat ini</span>
                                            </p>
                                            <p class="ml-auto d-flex flex-column text-right">
                                                @if ($last_average < 0)
                                                    <span class="text-danger">
                                                        <i class="fas fa-arrow-down"></i> {{ $last_average * -1 }}%
                                                    </span>
                                                @elseif($last_average == 0)
                                                    <span class="text-info">
                                                        <i class="fas fa-arrow-circle-right"></i> {{ $last_average }}%
                                                    </span>
                                                @elseif ($last_average > 0)
                                                    <span class="text-success">
                                                        <i class="fas fa-arrow-up"></i> {{ $last_average }}%
                                                    </span>
                                                @endif
                                                <span class="text-muted">dibandingkan Pemetaan Awal</span>
                                            </p>
                                        </div>
                                        <!-- /.d-flex -->
                                        <canvas id="sales-chart"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                        </canvas>
                                    </div>
                                    <div class="chart tab-pane" id="donut-chart"
                                        style="position: relative; height: 350px;">
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span class="text-bold text-lg">{{ number_format((float) $pemetaan_indonesia_total, 1, '.', '') }}</span>
                                                <span class="text-bold text-lg">Nilai Bahasa Indonesia</span>
                                            </p>
                                            <p class="ml-auto d-flex flex-column text-right">
                                                    <span class="text-bold text-lg">
                                                        {{ number_format((float) $pemetaan_matematika_total, 1, '.', '') }}
                                                    </span>
                                                <span class="text-bold text-lg">Nilai Matematika</span>
                                            </p>
                                        </div>
                                        <!-- /.d-flex -->
                                        <canvas id="sales-chart1"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                        </canvas>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-6 connectedSortable">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Nilai Siswa
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart" style="position: relative; height: 400px;">
                                    <canvas id="barChart"
                                        style="min-height: 250px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body-->

                        </div>
                    </section>
                    <!-- right col -->
                </div>
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
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-header">
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#kelas-1" data-toggle="tab">Kelas 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#donut-kelas-1" data-toggle="tab">Jumlah Siswa</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="kelas-1"
                                        style="position: relative; height: 350px;">
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_indonesia_1 + $rata_low_pemetaan_indonesia_1 + $rata_pass_pemetaan_indonesia_1 + $rata_high_pemetaan_indonesia_1) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Bahasa Indonesia</span>
                                            </p>
                                            <p class="ml-auto d-flex flex-column text-right">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_matematika_1 + $rata_low_pemetaan_matematika_1 + $rata_pass_pemetaan_matematika_1 + $rata_high_pemetaan_matematika_1) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Matematika</span>
                                            </p>
                                        </div>
                                        <!-- /.d-flex -->
                                        <canvas id="chart-kelas-1"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                        </canvas>

                                    </div>
                                    <div class="chart tab-pane" id="donut-kelas-1"
                                        style="position: relative; height: 350px;">
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_indonesia_1 + $rata_low_pemetaan_indonesia_1 + $rata_pass_pemetaan_indonesia_1 + $rata_high_pemetaan_indonesia_1) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Bahasa Indonesia</span>
                                            </p>
                                            <p class="ml-auto d-flex flex-column text-right">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_matematika_1 + $rata_low_pemetaan_matematika_1 + $rata_pass_pemetaan_matematika_1 + $rata_high_pemetaan_matematika_1) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Matematika</span>
                                            </p>
                                        </div>
                                        <!-- /.d-flex -->
                                        <canvas id="donut-chart-kelas-1"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                        </canvas>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- solid sales graph -->
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-6 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Nilai Siswa
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-header">
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#kelas-2" data-toggle="tab">Kelas 2</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#donut-kelas-2" data-toggle="tab">Jumlah Siswa</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="kelas-2"
                                        style="position: relative; height: 350px;">
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_indonesia_2 + $rata_low_pemetaan_indonesia_2 + $rata_pass_pemetaan_indonesia_2 + $rata_high_pemetaan_indonesia_2) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Bahasa Indonesia</span>
                                            </p>
                                            <p class="ml-auto d-flex flex-column text-right">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_matematika_2 + $rata_low_pemetaan_matematika_2 + $rata_pass_pemetaan_matematika_2 + $rata_high_pemetaan_matematika_2) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Matematika</span>
                                            </p>
                                        </div>
                                        <!-- /.d-flex -->
                                        <canvas id="chart-kelas-2"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                        </canvas>

                                    </div>
                                    <div class="chart tab-pane" id="donut-kelas-2"
                                        style="position: relative; height: 350px;">
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_indonesia_2 + $rata_low_pemetaan_indonesia_2 + $rata_pass_pemetaan_indonesia_2 + $rata_high_pemetaan_indonesia_2) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Bahasa Indonesia</span>
                                            </p>
                                            <p class="ml-auto d-flex flex-column text-right">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_matematika_2 + $rata_low_pemetaan_matematika_2 + $rata_pass_pemetaan_matematika_2 + $rata_high_pemetaan_matematika_2) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Matematika</span>
                                            </p>
                                        </div>
                                        <!-- /.d-flex -->
                                        <canvas id="donut-chart-kelas-2"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                        </canvas>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- solid sales graph -->
                    </section>
                    <!-- right col -->
                </div>
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
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-header">
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#kelas-3" data-toggle="tab">Kelas 3</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#donut-kelas-3" data-toggle="tab">Jumlah Siswa</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="kelas-3"
                                        style="position: relative; height: 350px;">
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_indonesia_3 + $rata_low_pemetaan_indonesia_3 + $rata_pass_pemetaan_indonesia_3 + $rata_high_pemetaan_indonesia_3) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Bahasa Indonesia</span>
                                            </p>
                                            <p class="ml-auto d-flex flex-column text-right">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_matematika_3 + $rata_low_pemetaan_matematika_3 + $rata_pass_pemetaan_matematika_3 + $rata_high_pemetaan_matematika_3) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Matematika</span>
                                            </p>
                                        </div>
                                        <!-- /.d-flex -->
                                        <canvas id="chart-kelas-3"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                        </canvas>

                                    </div>
                                    <div class="chart tab-pane" id="donut-kelas-3"
                                        style="position: relative; height: 350px;">
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_indonesia_3 + $rata_low_pemetaan_indonesia_3 + $rata_pass_pemetaan_indonesia_3 + $rata_high_pemetaan_indonesia_3) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Bahasa Indonesia</span>
                                            </p>
                                            <p class="ml-auto d-flex flex-column text-right">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_matematika_3 + $rata_low_pemetaan_matematika_3 + $rata_pass_pemetaan_matematika_3 + $rata_high_pemetaan_matematika_3) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Matematika</span>
                                            </p>
                                        </div>
                                        <!-- /.d-flex -->
                                        <canvas id="donut-chart-kelas-3"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                        </canvas>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- solid sales graph -->
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-6 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Nilai Siswa
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-header">
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#kelas-4" data-toggle="tab">Kelas 4</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#donut-kelas-4" data-toggle="tab">Jumlah Siswa</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="kelas-4"
                                        style="position: relative; height: 350px;">
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_indonesia_4 + $rata_low_pemetaan_indonesia_4 + $rata_pass_pemetaan_indonesia_4 + $rata_high_pemetaan_indonesia_4) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Bahasa Indonesia</span>
                                            </p>
                                            <p class="ml-auto d-flex flex-column text-right">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_matematika_4 + $rata_low_pemetaan_matematika_4 + $rata_pass_pemetaan_matematika_4 + $rata_high_pemetaan_matematika_4) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Matematika</span>
                                            </p>
                                        </div>
                                        <!-- /.d-flex -->
                                        <canvas id="chart-kelas-4"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                        </canvas>

                                    </div>
                                    <div class="chart tab-pane" id="donut-kelas-4"
                                        style="position: relative; height: 350px;">
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_indonesia_4 + $rata_low_pemetaan_indonesia_4 + $rata_pass_pemetaan_indonesia_4 + $rata_high_pemetaan_indonesia_4) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Bahasa Indonesia</span>
                                            </p>
                                            <p class="ml-auto d-flex flex-column text-right">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_matematika_4 + $rata_low_pemetaan_matematika_4 + $rata_pass_pemetaan_matematika_4 + $rata_high_pemetaan_matematika_4) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Matematika</span>
                                            </p>
                                        </div>
                                        <!-- /.d-flex -->
                                        <canvas id="donut-chart-kelas-4"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                        </canvas>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- solid sales graph -->
                    </section>
                    <!-- right col -->
                </div>
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
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-header">
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#kelas-5" data-toggle="tab">Kelas 5</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#donut-kelas-5" data-toggle="tab">Jumlah Siswa</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="kelas-5"
                                        style="position: relative; height: 350px;">
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_indonesia_5 + $rata_low_pemetaan_indonesia_5 + $rata_pass_pemetaan_indonesia_5 + $rata_high_pemetaan_indonesia_5) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Bahasa Indonesia</span>
                                            </p>
                                            <p class="ml-auto d-flex flex-column text-right">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_matematika_5 + $rata_low_pemetaan_matematika_5 + $rata_pass_pemetaan_matematika_5 + $rata_high_pemetaan_matematika_5) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Matematika</span>
                                            </p>
                                        </div>
                                        <!-- /.d-flex -->
                                        <canvas id="chart-kelas-5"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                        </canvas>

                                    </div>
                                    <div class="chart tab-pane" id="donut-kelas-5"
                                        style="position: relative; height: 350px;">
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_indonesia_5 + $rata_low_pemetaan_indonesia_5 + $rata_pass_pemetaan_indonesia_5 + $rata_high_pemetaan_indonesia_5) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Bahasa Indonesia</span>
                                            </p>
                                            <p class="ml-auto d-flex flex-column text-right">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_matematika_5 + $rata_low_pemetaan_matematika_5 + $rata_pass_pemetaan_matematika_5 + $rata_high_pemetaan_matematika_5) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Matematika</span>
                                            </p>
                                        </div>
                                        <!-- /.d-flex -->
                                        <canvas id="donut-chart-kelas-5"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                        </canvas>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- solid sales graph -->
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-6 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Nilai Siswa
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-header">
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#kelas-6" data-toggle="tab">Kelas 6</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#donut-kelas-6" data-toggle="tab">Jumlah Siswa</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- Morris chart - Sales -->
                                    <div class="chart tab-pane active" id="kelas-6"
                                        style="position: relative; height: 350px;">
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_indonesia_6 + $rata_low_pemetaan_indonesia_6 + $rata_pass_pemetaan_indonesia_6 + $rata_high_pemetaan_indonesia_6) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Bahasa Indonesia</span>
                                            </p>
                                            <p class="ml-auto d-flex flex-column text-right">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_matematika_6 + $rata_low_pemetaan_matematika_6 + $rata_pass_pemetaan_matematika_6 + $rata_high_pemetaan_matematika_6) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Matematika</span>
                                            </p>
                                        </div>
                                        <!-- /.d-flex -->
                                        <canvas id="chart-kelas-6"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                        </canvas>

                                    </div>
                                    <div class="chart tab-pane" id="donut-kelas-6"
                                        style="position: relative; height: 350px;">
                                        <div class="d-flex">
                                            <p class="d-flex flex-column">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_indonesia_6 + $rata_low_pemetaan_indonesia_6 + $rata_pass_pemetaan_indonesia_6 + $rata_high_pemetaan_indonesia_6) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Bahasa Indonesia</span>
                                            </p>
                                            <p class="ml-auto d-flex flex-column text-right">
                                                <span
                                                    class="text-bold text-lg">{{ number_format(($rata_underlow_pemetaan_matematika_6 + $rata_low_pemetaan_matematika_6 + $rata_pass_pemetaan_matematika_6 + $rata_high_pemetaan_matematika_6) / 4, 1, '.', '') }}</span>
                                                <span>Nilai rata-rata Matematika</span>
                                            </p>
                                        </div>
                                        <!-- /.d-flex -->
                                        <canvas id="donut-chart-kelas-6"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                                        </canvas>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                        <!-- solid sales graph -->
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
    <script>
        $(function() {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //--------------
            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = {
                labels: ['B. Indonesia', 'Matematika'],
                datasets: [{
                        label: 'Nilai Rata-rata',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data:
                        [
                            {!! json_encode(number_format((float) $pemetaan_indonesia_total, 1, '.', '')) !!},
                            {!! json_encode(number_format((float) $pemetaan_matematika_total, 1, '.', '')) !!}
                        ]
                    },
                    {
                        label: 'Standard Deviasi',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data:
                        [
                            {!! json_encode(number_format((float)Stand_Deviation($std_dev_pemetaan_indonesia_total), 1, '.', '')) !!},
                            {!! json_encode(number_format((float)Stand_Deviation($std_dev_pemetaan_matematika_total), 1, '.', '')) !!}
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

            //--------------
            'use strict'
            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            }
            var mode = 'index'
            var intersect = true
            var $salesChart = $('#sales-chart')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($matpel_pemetaan) !!},
                    datasets: [{
                            label: ' Pemetaan Awal',
                            backgroundColor: '#252626',
                            borderColor: '#252626',
                            data: [{!! json_encode(number_format((float) $pemetaan_indonesia_total, 1, '.', '')) !!},
                                {!! json_encode(number_format((float) $pemetaan_matematika_total, 1, '.', '')) !!}
                            ]
                        },
                        {
                            label: ' Nilai saat ini',
                            backgroundColor: '#007bff',
                            borderColor: '#007bff',
                            data: [
                                {!! json_encode(number_format((float) $indonesia_average, 1, '.', '')) !!},
                                {!! json_encode(number_format((float) $matematika_average, 1, '.', '')) !!}
                            ]
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: true
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 100,
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

            var $salesChart = $('#sales-chart1')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($matpel_pemetaan) !!},
                    datasets:
                    [
                        {
                            label: ' Underlow',
                            backgroundColor: '#eb4034',
                            borderColor: '#eb4034',
                            data: [{!! json_encode(number_format(array_sum($underlow_pemetaan_indonesia_total) / count($underlow_pemetaan_indonesia_total), 1, '.', '')) !!},
                                {!! json_encode(number_format(array_sum($underlow_pemetaan_matematika_total) / count($underlow_pemetaan_matematika_total), 1, '.', '')) !!}
                            ]
                        },
                        {
                            label: ' Low',
                            backgroundColor: '#ebeb34',
                            borderColor: '#ebeb34',
                            data: [{!! json_encode(number_format(array_sum($low_pemetaan_indonesia_total) / count($low_pemetaan_indonesia_total), 1, '.', '')) !!},
                                {!! json_encode(number_format(array_sum($low_pemetaan_matematika_total) / count($low_pemetaan_matematika_total), 1, '.', '')) !!}
                            ]
                        },
                        {
                            label: ' Pass',
                            backgroundColor: '#34eb77',
                            borderColor: '#34eb77',
                            data: [{!! json_encode(number_format(array_sum($pass_pemetaan_indonesia_total) / count($pass_pemetaan_indonesia_total), 1, '.', '')) !!},
                                {!! json_encode(number_format(array_sum($pass_pemetaan_matematika_total) / count($pass_pemetaan_matematika_total), 1, '.', '')) !!}
                            ]
                        },
                        {
                            label: ' High',
                            backgroundColor: '#347aeb',
                            borderColor: '#347aeb',
                            data: [{!! json_encode(number_format(array_sum($high_pemetaan_indonesia_total) / count($high_pemetaan_indonesia_total), 1, '.', '')) !!},
                                {!! json_encode(number_format(array_sum($high_pemetaan_matematika_total) / count($high_pemetaan_matematika_total), 1, '.', '')) !!}
                            ]
                        },
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: true
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 100,
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

            var $salesChart = $('#chart-kelas-1')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($matpel_pemetaan) !!},
                    datasets: [{
                            label: " Underlow",
                            backgroundColor: '#eb4034',
                            borderColor: '#eb4034',
                            data: [
                                {!! json_encode($rata_underlow_pemetaan_indonesia_1) !!},
                                {!! json_encode($rata_underlow_pemetaan_matematika_1) !!}
                            ]
                        },
                        {
                            label: " Low",
                            backgroundColor: '#ebeb34',
                            borderColor: '#ebeb34',
                            data: [
                                {!! json_encode($rata_low_pemetaan_indonesia_1) !!},
                                {!! json_encode($rata_low_pemetaan_matematika_1) !!}
                            ]
                        },
                        {
                            label: " Pass",
                            backgroundColor: '#34eb77',
                            borderColor: '#34eb77',
                            data: [
                                {!! json_encode($rata_pass_pemetaan_indonesia_1) !!},
                                {!! json_encode($rata_pass_pemetaan_matematika_1) !!}
                            ]
                        },
                        {
                            label: " High",
                            backgroundColor: '#347aeb',
                            borderColor: '#347aeb',
                            data: [
                                {!! json_encode($rata_high_pemetaan_indonesia_1) !!},
                                {!! json_encode($rata_high_pemetaan_matematika_1) !!}
                            ]
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: true
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 100,
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

            var $salesChart = $('#donut-chart-kelas-1')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($matpel_pemetaan) !!},
                    datasets: [{
                            label: " Underlow",
                            backgroundColor: '#eb4034',
                            borderColor: '#eb4034',
                            data: [
                                {!! json_encode(count($siswa_rata_underlow_pemetaan_indonesia_1)) !!},
                                {!! json_encode(count($siswa_rata_underlow_pemetaan_matematika_1)) !!}
                            ]
                        },
                        {
                            label: " Low",
                            backgroundColor: '#ebeb34',
                            borderColor: '#ebeb34',
                            data: [
                                {!! json_encode(count($siswa_rata_low_pemetaan_indonesia_1)) !!},
                                {!! json_encode(count($siswa_rata_low_pemetaan_matematika_1)) !!}
                            ]
                        },
                        {
                            label: " Pass",
                            backgroundColor: '#34eb77',
                            borderColor: '#34eb77',
                            data: [
                                {!! json_encode(count($siswa_rata_pass_pemetaan_indonesia_1)) !!},
                                {!! json_encode(count($siswa_rata_pass_pemetaan_matematika_1)) !!}
                            ]
                        },
                        {
                            label: " High",
                            backgroundColor: '#347aeb',
                            borderColor: '#347aeb',
                            data: [
                                {!! json_encode(count($siswa_rata_high_pemetaan_indonesia_1)) !!},
                                {!! json_encode(count($siswa_rata_high_pemetaan_matematika_1)) !!}
                            ]
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: true
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: {!! json_encode(max($data_1)) !!},
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

            var $salesChart = $('#chart-kelas-2')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($matpel_pemetaan) !!},
                    datasets: [{
                            label: " Underlow",
                            backgroundColor: '#eb4034',
                            borderColor: '#eb4034',
                            data: [
                                {!! json_encode($rata_underlow_pemetaan_indonesia_2) !!},
                                {!! json_encode($rata_underlow_pemetaan_matematika_2) !!}
                            ]
                        },
                        {
                            label: " Low",
                            backgroundColor: '#ebeb34',
                            borderColor: '#ebeb34',
                            data: [
                                {!! json_encode($rata_low_pemetaan_indonesia_2) !!},
                                {!! json_encode($rata_low_pemetaan_matematika_2) !!}
                            ]
                        },
                        {
                            label: " Pass",
                            backgroundColor: '#34eb77',
                            borderColor: '#34eb77',
                            data: [
                                {!! json_encode($rata_pass_pemetaan_indonesia_2) !!},
                                {!! json_encode($rata_pass_pemetaan_matematika_2) !!}
                            ]
                        },
                        {
                            label: " High",
                            backgroundColor: '#347aeb',
                            borderColor: '#347aeb',
                            data: [
                                {!! json_encode($rata_high_pemetaan_indonesia_2) !!},
                                {!! json_encode($rata_high_pemetaan_matematika_2) !!}
                            ]
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: true
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 100,
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

            var $salesChart = $('#donut-chart-kelas-2')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($matpel_pemetaan) !!},
                    datasets: [{
                            label: " Underlow",
                            backgroundColor: '#eb4034',
                            borderColor: '#eb4034',
                            data: [
                                {!! json_encode(count($siswa_rata_underlow_pemetaan_indonesia_2)) !!},
                                {!! json_encode(count($siswa_rata_underlow_pemetaan_matematika_2)) !!}
                            ]
                        },
                        {
                            label: " Low",
                            backgroundColor: '#ebeb34',
                            borderColor: '#ebeb34',
                            data: [
                                {!! json_encode(count($siswa_rata_low_pemetaan_indonesia_2)) !!},
                                {!! json_encode(count($siswa_rata_low_pemetaan_matematika_2)) !!}
                            ]
                        },
                        {
                            label: " Pass",
                            backgroundColor: '#34eb77',
                            borderColor: '#34eb77',
                            data: [
                                {!! json_encode(count($siswa_rata_pass_pemetaan_indonesia_2)) !!},
                                {!! json_encode(count($siswa_rata_pass_pemetaan_matematika_2)) !!}
                            ]
                        },
                        {
                            label: " High",
                            backgroundColor: '#347aeb',
                            borderColor: '#347aeb',
                            data: [
                                {!! json_encode(count($siswa_rata_high_pemetaan_indonesia_2)) !!},
                                {!! json_encode(count($siswa_rata_high_pemetaan_matematika_2)) !!}
                            ]
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: true
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: {!! json_encode(max($data_2)) !!},
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

            var $salesChart = $('#chart-kelas-3')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($matpel_pemetaan) !!},
                    datasets: [{
                            label: " Underlow",
                            backgroundColor: '#eb4034',
                            borderColor: '#eb4034',
                            data: [
                                {!! json_encode($rata_underlow_pemetaan_indonesia_3) !!},
                                {!! json_encode($rata_underlow_pemetaan_matematika_3) !!}
                            ]
                        },
                        {
                            label: " Low",
                            backgroundColor: '#ebeb34',
                            borderColor: '#ebeb34',
                            data: [
                                {!! json_encode($rata_low_pemetaan_indonesia_3) !!},
                                {!! json_encode($rata_low_pemetaan_matematika_3) !!}
                            ]
                        },
                        {
                            label: " Pass",
                            backgroundColor: '#34eb77',
                            borderColor: '#34eb77',
                            data: [
                                {!! json_encode($rata_pass_pemetaan_indonesia_3) !!},
                                {!! json_encode($rata_pass_pemetaan_matematika_3) !!}
                            ]
                        },
                        {
                            label: " High",
                            backgroundColor: '#347aeb',
                            borderColor: '#347aeb',
                            data: [
                                {!! json_encode($rata_high_pemetaan_indonesia_3) !!},
                                {!! json_encode($rata_high_pemetaan_matematika_3) !!}
                            ]
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: true
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 100,
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

            var $salesChart = $('#donut-chart-kelas-3')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($matpel_pemetaan) !!},
                    datasets: [{
                            label: " Underlow",
                            backgroundColor: '#eb4034',
                            borderColor: '#eb4034',
                            data: [
                                {!! json_encode(count($siswa_rata_underlow_pemetaan_indonesia_3)) !!},
                                {!! json_encode(count($siswa_rata_underlow_pemetaan_matematika_3)) !!}
                            ]
                        },
                        {
                            label: " Low",
                            backgroundColor: '#ebeb34',
                            borderColor: '#ebeb34',
                            data: [
                                {!! json_encode(count($siswa_rata_low_pemetaan_indonesia_3)) !!},
                                {!! json_encode(count($siswa_rata_low_pemetaan_matematika_3)) !!}
                            ]
                        },
                        {
                            label: " Pass",
                            backgroundColor: '#34eb77',
                            borderColor: '#34eb77',
                            data: [
                                {!! json_encode(count($siswa_rata_pass_pemetaan_indonesia_3)) !!},
                                {!! json_encode(count($siswa_rata_pass_pemetaan_matematika_3)) !!}
                            ]
                        },
                        {
                            label: " High",
                            backgroundColor: '#347aeb',
                            borderColor: '#347aeb',
                            data: [
                                {!! json_encode(count($siswa_rata_high_pemetaan_indonesia_3)) !!},
                                {!! json_encode(count($siswa_rata_high_pemetaan_matematika_3)) !!}
                            ]
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: true
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: {!! json_encode(max($data_3)) !!},
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

            var $salesChart = $('#chart-kelas-4')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($matpel_pemetaan) !!},
                    datasets: [{
                            label: " Underlow",
                            backgroundColor: '#eb4034',
                            borderColor: '#eb4034',
                            data: [
                                {!! json_encode($rata_underlow_pemetaan_indonesia_4) !!},
                                {!! json_encode($rata_underlow_pemetaan_matematika_4) !!}
                            ]
                        },
                        {
                            label: " Low",
                            backgroundColor: '#ebeb34',
                            borderColor: '#ebeb34',
                            data: [
                                {!! json_encode($rata_low_pemetaan_indonesia_4) !!},
                                {!! json_encode($rata_low_pemetaan_matematika_4) !!}
                            ]
                        },
                        {
                            label: " Pass",
                            backgroundColor: '#34eb77',
                            borderColor: '#34eb77',
                            data: [
                                {!! json_encode($rata_pass_pemetaan_indonesia_4) !!},
                                {!! json_encode($rata_pass_pemetaan_matematika_4) !!}
                            ]
                        },
                        {
                            label: " High",
                            backgroundColor: '#347aeb',
                            borderColor: '#347aeb',
                            data: [
                                {!! json_encode($rata_high_pemetaan_indonesia_4) !!},
                                {!! json_encode($rata_high_pemetaan_matematika_4) !!}
                            ]
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: true
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 100,
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

            var $salesChart = $('#donut-chart-kelas-4')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($matpel_pemetaan) !!},
                    datasets: [{
                            label: " Underlow",
                            backgroundColor: '#eb4034',
                            borderColor: '#eb4034',
                            data: [
                                {!! json_encode(count($siswa_rata_underlow_pemetaan_indonesia_4)) !!},
                                {!! json_encode(count($siswa_rata_underlow_pemetaan_matematika_4)) !!}
                            ]
                        },
                        {
                            label: " Low",
                            backgroundColor: '#ebeb34',
                            borderColor: '#ebeb34',
                            data: [
                                {!! json_encode(count($siswa_rata_low_pemetaan_indonesia_4)) !!},
                                {!! json_encode(count($siswa_rata_low_pemetaan_matematika_4)) !!}
                            ]
                        },
                        {
                            label: " Pass",
                            backgroundColor: '#34eb77',
                            borderColor: '#34eb77',
                            data: [
                                {!! json_encode(count($siswa_rata_pass_pemetaan_indonesia_4)) !!},
                                {!! json_encode(count($siswa_rata_pass_pemetaan_matematika_4)) !!}
                            ]
                        },
                        {
                            label: " High",
                            backgroundColor: '#347aeb',
                            borderColor: '#347aeb',
                            data: [
                                {!! json_encode(count($siswa_rata_high_pemetaan_indonesia_4)) !!},
                                {!! json_encode(count($siswa_rata_high_pemetaan_matematika_4)) !!}
                            ]
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: true
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: {!! json_encode(max($data_4)) !!},
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

            var $salesChart = $('#chart-kelas-5')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($matpel_pemetaan) !!},
                    datasets: [{
                            label: " Underlow",
                            backgroundColor: '#eb4034',
                            borderColor: '#eb4034',
                            data: [
                                {!! json_encode($rata_underlow_pemetaan_indonesia_5) !!},
                                {!! json_encode($rata_underlow_pemetaan_matematika_5) !!}
                            ]
                        },
                        {
                            label: " Low",
                            backgroundColor: '#ebeb34',
                            borderColor: '#ebeb34',
                            data: [
                                {!! json_encode($rata_low_pemetaan_indonesia_5) !!},
                                {!! json_encode($rata_low_pemetaan_matematika_5) !!}
                            ]
                        },
                        {
                            label: " Pass",
                            backgroundColor: '#34eb77',
                            borderColor: '#34eb77',
                            data: [
                                {!! json_encode($rata_pass_pemetaan_indonesia_5) !!},
                                {!! json_encode($rata_pass_pemetaan_matematika_5) !!}
                            ]
                        },
                        {
                            label: " High",
                            backgroundColor: '#347aeb',
                            borderColor: '#347aeb',
                            data: [
                                {!! json_encode($rata_high_pemetaan_indonesia_5) !!},
                                {!! json_encode($rata_high_pemetaan_matematika_5) !!}
                            ]
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: true
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 100,
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

            var $salesChart = $('#donut-chart-kelas-5')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($matpel_pemetaan) !!},
                    datasets: [{
                            label: " Underlow",
                            backgroundColor: '#eb4034',
                            borderColor: '#eb4034',
                            data: [
                                {!! json_encode(count($siswa_rata_underlow_pemetaan_indonesia_5)) !!},
                                {!! json_encode(count($siswa_rata_underlow_pemetaan_matematika_5)) !!}
                            ]
                        },
                        {
                            label: " Low",
                            backgroundColor: '#ebeb34',
                            borderColor: '#ebeb34',
                            data: [
                                {!! json_encode(count($siswa_rata_low_pemetaan_indonesia_5)) !!},
                                {!! json_encode(count($siswa_rata_low_pemetaan_matematika_5)) !!}
                            ]
                        },
                        {
                            label: " Pass",
                            backgroundColor: '#34eb77',
                            borderColor: '#34eb77',
                            data: [
                                {!! json_encode(count($siswa_rata_pass_pemetaan_indonesia_5)) !!},
                                {!! json_encode(count($siswa_rata_pass_pemetaan_matematika_5)) !!}
                            ]
                        },
                        {
                            label: " High",
                            backgroundColor: '#347aeb',
                            borderColor: '#347aeb',
                            data: [
                                {!! json_encode(count($siswa_rata_high_pemetaan_indonesia_5)) !!},
                                {!! json_encode(count($siswa_rata_high_pemetaan_matematika_5)) !!}
                            ]
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: true
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: {!! json_encode(max($data_5)) !!},
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

            var $salesChart = $('#chart-kelas-6')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($matpel_pemetaan) !!},
                    datasets: [{
                            label: " Underlow",
                            backgroundColor: '#eb4034',
                            borderColor: '#eb4034',
                            data: [
                                {!! json_encode($rata_underlow_pemetaan_indonesia_6) !!},
                                {!! json_encode($rata_underlow_pemetaan_matematika_6) !!}
                            ]
                        },
                        {
                            label: " Low",
                            backgroundColor: '#ebeb34',
                            borderColor: '#ebeb34',
                            data: [
                                {!! json_encode($rata_low_pemetaan_indonesia_6) !!},
                                {!! json_encode($rata_low_pemetaan_matematika_6) !!}
                            ]
                        },
                        {
                            label: " Pass",
                            backgroundColor: '#34eb77',
                            borderColor: '#34eb77',
                            data: [
                                {!! json_encode($rata_pass_pemetaan_indonesia_6) !!},
                                {!! json_encode($rata_pass_pemetaan_matematika_6) !!}
                            ]
                        },
                        {
                            label: " High",
                            backgroundColor: '#347aeb',
                            borderColor: '#347aeb',
                            data: [
                                {!! json_encode($rata_high_pemetaan_indonesia_6) !!},
                                {!! json_encode($rata_high_pemetaan_matematika_6) !!}
                            ]
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: true
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 100,
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

            var $salesChart = $('#donut-chart-kelas-6')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($matpel_pemetaan) !!},
                    datasets: [{
                            label: " Underlow",
                            backgroundColor: '#eb4034',
                            borderColor: '#eb4034',
                            data: [
                                {!! json_encode(count($siswa_rata_underlow_pemetaan_indonesia_6)) !!},
                                {!! json_encode(count($siswa_rata_underlow_pemetaan_matematika_6)) !!}
                            ]
                        },
                        {
                            label: " Low",
                            backgroundColor: '#ebeb34',
                            borderColor: '#ebeb34',
                            data: [
                                {!! json_encode(count($siswa_rata_low_pemetaan_indonesia_6)) !!},
                                {!! json_encode(count($siswa_rata_low_pemetaan_matematika_6)) !!}
                            ]
                        },
                        {
                            label: " Pass",
                            backgroundColor: '#34eb77',
                            borderColor: '#34eb77',
                            data: [
                                {!! json_encode(count($siswa_rata_pass_pemetaan_indonesia_6)) !!},
                                {!! json_encode(count($siswa_rata_pass_pemetaan_matematika_6)) !!}
                            ]
                        },
                        {
                            label: " High",
                            backgroundColor: '#347aeb',
                            borderColor: '#347aeb',
                            data: [
                                {!! json_encode(count($siswa_rata_high_pemetaan_indonesia_6)) !!},
                                {!! json_encode(count($siswa_rata_high_pemetaan_matematika_6)) !!}
                            ]
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: true
                    },
                    scales: {
                        yAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: {!! json_encode(max($data_6)) !!},
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: true,
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })
        })
    </script>
@endsection
