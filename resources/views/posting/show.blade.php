@extends('layouts.master5')
@section('title')
    <title> AdminLTE 3 | POSTING </title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>POSTING</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">POSTING</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tahun Pelajaran 2020/2021</h3>
                            </div>
                            <div class="card-header">
                                <h3 class="card-title">{{ $posting->title }}</h3>
                            </div>
                            <div class="col-12">
                                <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal"
                                    data-target="#staticBackdrop">
                                    Tambah Langkah Strategis
                                </button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- /.card-body -->
                                <img src="{{ $posting->image() }}" height="75" />

                            </div>
                            <div class="card-body">
                                <!-- /.card-body -->

                                {{ $posting->description }}
                            </div>
                            <!-- /.card -->
                            <!-- /.card-body -->
                            <div class="card-footer">
                                SMP Persiapan Negeri 3 Agats
                            </div>
                            <!-- /.card-footer-->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
