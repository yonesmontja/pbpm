@extends('layouts.master4')

@section('title')
    <title> SD Dabolding ABSEN-CATATAN WALI KELAS </title>
@endsection

@section('content')

    <div class="content-wrapper" style="min-height: 1400.83px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Form Data Absen dan Catatan Wali Kelas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @if(auth()->user()->role == 'admin')
                                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            @endif
                            @if(auth()->user()->role == 'guru')
                                <li class="breadcrumb-item"><a href="/dashboard_guru">Home</a></li>
                            @endif
                            <li class="breadcrumb-item active">ABSEN-CATATAN WALI KELAS</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                @if (session('sukses'))
                    <div class="alert alert-success" role="alert">
                        {{ session('sukses') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">ABSEN, DESKRIPSI SIKAP & CATATAN WALI KELAS</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/extra/{{ $extra->id }}/extraupdate" method="POST" enctype="multipart/form-data"
                        role="form">
                        {{ csrf_field() }}
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">PENDENGARAN</label>
                                        <input name="pendengaran" type="text" class="form-control"
                                            id="formGroupExampleInput" placeholder="Pendengaran"
                                            value="{{ $extra->pendengaran }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">PENGLIHATAN</label>
                                        <input name="penglihatan" type="text" class="form-control"
                                            id="formGroupExampleInput" placeholder="Penglihatan"
                                            value="{{ $extra->penglihatan }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">GIGI</label>
                                        <input name="gigi" type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Gigi" value="{{ $extra->gigi }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">ABSEN</label>
                                        <input name="alpa" type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Absen" value="{{ $extra->alpa }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">IJIN</label>
                                        <input name="ijin" type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Ijin" value="{{ $extra->ijin }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">SAKIT</label>
                                        <input name="sakit" type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Sakit" value="{{ $extra->sakit }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">DESKRIPSI SIKAP SPIRITUAL</label>
                                            <textarea name="saran" class="form-control" id="exampleFormControlTextarea1"
                                                rows="3">{{ $extra->saran }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">DESKRIPSI SIKAP SOSIAL</label>
                                            <textarea name="ekskul" class="form-control" id="exampleFormControlTextarea2"
                                                rows="3">{{ $extra->ekskul }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">CATATAN WALI KELAS</label>
                                            <textarea name="prestasi" class="form-control" id="exampleFormControlTextarea2"
                                                rows="3">{{ $extra->prestasi }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@stop
@section('content1')

    <h1>Edit Data extra</h1>
    @if (session('sukses'))
        <div class="alert alert-success" role="alert">
            {{ session('sukses') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">

        </div>
    </div>
@endsection('content1')
