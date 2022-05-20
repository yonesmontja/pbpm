@extends('layouts.top-nav')

@section('title')
    <title> AdminLTE 3 | Jurnal </title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"> Ringkasan <small>Jurnal</small></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item"><a href="/jurnalpost">Jurnal</a></li>
                            <li class="breadcrumb-item active">Ringkasan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Jurnal Belajar</h5>

                                <p class="card-text">
                                    Jurnal Belajar
                                </p>

                                <a href="#" class="card-link">Tautan Jurnal Belajar</a>
                                <a href="#" class="card-link">Detil Jurnal Belajar</a>
                            </div>
                        </div>
                        @foreach ($jurnal as $j)
                            @if ($j->kategori_id == 1)
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $j->title }}</h5>

                                        <p class="card-text">
                                            {{ $j->kategori->kategori }}
                                        </p>
                                        <a href="#" class="card-link">Tautan Jurnal Belajar</a>
                                        <a href="#" class="card-link">Detil Jurnal Belajar</a>
                                    </div>
                                </div><!-- /.card -->
                            @endif
                        @endforeach
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Jurnal Kelas</h5>

                                <p class="card-text">
                                    Jurnal Kelas
                                </p>

                                <a href="#" class="card-link">Tautan Jurnal Kelas</a>
                                <a href="#" class="card-link">Detil Jurnal Kelas</a>
                            </div>
                        </div>
                        @foreach ($jurnal as $j)
                            @if ($j->kategori_id == 2)
                                <div class="card card-primary card-outline">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $j->title }}</h5>

                                        <p class="card-text">
                                            {{ $j->kategori->kategori }}
                                        </p>
                                        <a href="#" class="card-link">Tautan Jurnal Kelas</a>
                                        <a href="#" class="card-link">Detil Jurnal Kelas</a>
                                    </div>
                                </div><!-- /.card -->
                            @endif
                        @endforeach

                    </div>
                    <!-- /.col-md-6 -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title m-0">Jurnal Siswa</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Jurnal Baca</h6>

                                <p class="card-text">Imajinasi adalah modal dasar perubahan di masa depan.</p>
                                <a href="#" class="btn btn-primary">Tautan Jurnal Baca</a>
                            </div>
                        </div>

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title m-0">Jurnal Siswa</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Surat Keberagaman</h6>

                                <p class="card-text">Kekuatan dalam kebhinekaan.</p>
                                <a href="#" class="btn btn-primary">Tautan Jurnal Keberagaman</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
