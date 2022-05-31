@extends('layouts.master5')

@section('title')
    <title> SD Dabolding Data Tahun Pelajaran </title>
@endsection

@section('content')

    <div class="content-wrapper" style="min-height: 1400.83px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Form Data Tahun Pelajaran</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Form Data Tahun Pelajaran</li>
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
                        <h3 class="card-title">Data Tahun Pelajaran</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('tahunpel.update', $tahunpel) }}" method="POST" enctype="multipart/form-data"
                        role="form">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">TP</label>
                                        <input name="thn_pel" type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="" value="{{ $tahunpel->thn_pel }}" dissabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('semester') ? ' has-error' : '' }}">
                                        <label for="formGroupExampleInput">Semester</label>
                                        <input name="semester" type="semester" class="form-control"
                                            id="formGroupExampleInput" placeholder="Masukkan semester"
                                            value="{{ $tahunpel->semester }}">
                                        @if ($errors->has('semester'))
                                            <span class="help-block">{{ $errors->first('semester') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('tahun') ? ' has-error' : '' }}">
                                        <label for="formGroupExampleInput">Tahun</label>
                                        <input name="tahun" type="tahun" class="form-control" id="formGroupExampleInput"
                                            placeholder="Masukkan tahun" value="{{ $tahunpel->tahun }}">
                                        @if ($errors->has('tahun'))
                                            <span class="help-block">{{ $errors->first('tahun') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('nama_kepsek') ? ' has-error' : '' }}">
                                        <label for="formGroupExampleInput">Kepsek</label>
                                        <input name="nama_kepsek" type="nama_kepsek" class="form-control"
                                            id="formGroupExampleInput" placeholder="Masukkan nama_kepsek"
                                            value="{{ $tahunpel->nama_kepsek }}">
                                        @if ($errors->has('nama_kepsek'))
                                            <span class="help-block">{{ $errors->first('nama_kepsek') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group {{ $errors->has('kode_kepsek') ? ' has-error' : '' }}">
                                        <label for="formGroupExampleInput">NIP</label>
                                        <input name="kode_kepsek" type="kode_kepsek" class="form-control"
                                            id="formGroupExampleInput" placeholder="Masukkan tahun"
                                            value="{{ $tahunpel->kode_kepsek }}">
                                        @if ($errors->has('kode_kepsek'))
                                            <span class="help-block">{{ $errors->first('kode_kepsek') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Aktif</label>
                                        <select name="aktif" class="form-control" id="exampleFormControlSelect1">
                                            <option value="N" @if ($tahunpel->aktif == 'N') selected @endif>Nonaktif
                                            </option>
                                            <option value="Y" @if ($tahunpel->aktif == 'Y') selected @endif>Aktif
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tanggal terima raport:</label>
                                        <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                            <input name="tgl_raport" type="text" class="form-control datetimepicker-input"
                                                data-target="#reservationdate1"
                                                placeholder="{{ $tahunpel->tgl_raport }}" />
                                            <div class="input-group-append" data-target="#reservationdate1"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tanggal Ijazah:</label>
                                        <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                            <input name="tgl_raport_kelas3" type="text"
                                                class="form-control datetimepicker-input" data-target="#reservationdate2"
                                                placeholder="{{ $tahunpel->tgl_raport_kelas3 }}" />
                                            <div class="input-group-append" data-target="#reservationdate2"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
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

    <h1>Edit Data tahunpel</h1>
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
