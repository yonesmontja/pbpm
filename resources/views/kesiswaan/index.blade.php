@extends('layouts.master3')

@section('title')
    <title> AdminLTE 3 | Kesiswaan </title>
@endsection

@section('content3')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Kesiswaan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Kesiswaan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Nilai Siswa</h3>
                                    <a href="javascript:void(0);">View Report</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">{{ $last0week_average }}</span>
                                        <span>Rata-rata Nilai</span>
                                    </p>
                                    <p class="ml-auto d-flex flex-column text-right">
                                        @if ($last_week_average < 0)
                                            <span class="text-danger">
                                                <i class="fas fa-arrow-down"></i> {{ $last_week_average * -1 }}%
                                            </span>
                                        @elseif($last_week_average == 0)
                                            <span class="text-info">
                                                <i class="fas fa-arrow-circle-right"></i> {{ $last_week_average }}%
                                            </span>
                                        @elseif ($last_week_average > 0)
                                            <span class="text-success">
                                                <i class="fas fa-arrow-up"></i> {{ $last_week_average }}%
                                            </span>
                                        @endif
                                        <span class="text-muted">Sejak minggu lalu</span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->

                                <div class="position-relative mb-4">
                                    <canvas id="visitors-chart" height="200"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-gray"></i> Minggu lalu
                                    </span>

                                    <span>
                                        <i class="fas fa-square text-primary"></i> Minggu ini

                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Nilai Siswa</h3>
                                    <a href="javascript:void(0);">View Report</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">{{ $last0week_average }}</span>
                                        <span>Rata-rata Nilai</span>
                                    </p>
                                    <p class="ml-auto d-flex flex-column text-right">
                                        @if ($last_week_average < 0)
                                            <span class="text-danger">
                                                <i class="fas fa-arrow-down"></i> {{ $last_week_average * -1 }}%
                                            </span>
                                        @elseif($last_week_average == 0)
                                            <span class="text-info">
                                                <i class="fas fa-arrow-circle-right"></i> {{ $last_week_average }}%
                                            </span>
                                        @elseif ($last_week_average > 0)
                                            <span class="text-success">
                                                <i class="fas fa-arrow-up"></i> {{ $last_week_average }}%
                                            </span>
                                        @endif
                                        <span class="text-muted">Since last week</span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->
                                <div class="position-relative mb-4">
                                    <canvas id="sales-chart2" height="200"></canvas>
                                </div>
                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-gray"></i> Minggu lalu

                                    </span>
                                    <span>
                                        <i class="fas fa-square text-primary"></i> Minggu ini
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Nilai Siswa</h3>
                                    <a href="javascript:void(0);">View Report</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">{{ $this_month }}</span>
                                        <span>Rata-rata nilai siswa</span>
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

                                        <span class="text-muted">Sejak bulan lalu</span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->

                                <div class="position-relative mb-4">
                                    <canvas id="sales-chart" height="200"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-grey"></i> Bulan lalu
                                    </span>
                                    <span></span>
                                    <span class="mr-2">
                                        <i class="fas fa-square text-primary"></i> Bulan ini
                                    </span>

                                </div>
                            </div>
                        </div>
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Nilai Siswa</h3>
                                    <a href="javascript:void(0);">View Report</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">{{ $this_month }}</span>
                                        <span>Rata-rata nilai siswa</span>
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

                                        <span class="text-muted">Sejak bulan lalu</span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->

                                <div class="position-relative mb-4">
                                    <canvas id="sales-chart1" height="200"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                        <i class="fas fa-square text-grey"></i> Bulan lalu
                                    </span>
                                    <span></span>
                                    <span class="mr-2">
                                        <i class="fas fa-square text-primary"></i> Bulan ini
                                    </span>

                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
