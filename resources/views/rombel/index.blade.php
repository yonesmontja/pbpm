@extends('layouts.master5')

@section('title')
    <title> Rombel </title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Rombel</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Rombel</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tahun Pelajaran <a
                                        href="{{ route('tahunpel.index') }}">{{ thnPel() }}</a></h3>
                            </div>
                            <div class="card-header">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Tambah Data
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="#staticBackdrop" data-toggle="modal"
                                            data-target="#staticBackdrop">Tambah Data</a>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    @if (session('sukses'))
                                        <div class="alert alert-success" role="alert">
                                            Data <a href="#" class="alert-link">Rombel</a> {{ session('sukses') }}
                                        </div>
                                    @endif

                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Rombel</th>
                                                <th>Kelas</th>
                                                <th>Wali Kelas</th>
                                                <th>Semester</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rombel as $h)
                                                <tr>
                                                    <td><a href="#">{{ $h->rombel }}</a>
                                                    </td>
                                                    <td><a href="/kelas/{{ $h->kelas->id }}/profile">{{ $h->kelas->nama }}</a></td>
                                                    <td><a
                                                        href="/guru/{{ $h->guru->id }}/profile">{{ $h->guru->nama_guru }}</td>
                                                    <td>{{ $h->tahunpel->thn_pel }} {{ $h->tahunpel->semester }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Rombel</th>
                                                <th>Kelas</th>
                                                <th>Wali Kelas</th>
                                                <th>Semester</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <!-- Modal tambah data -->
                                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- form isian data -->
                                                    <form action="/rombel/rombelcreate" method="POST"
                                                        enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-group {{ $errors->has('rombel') ? ' has-error' : '' }}">
                                                                    <label for="exampleFormControlInput1">Rombel</label>
                                                                    <input name="rombel" type="text"
                                                                        class="form-control" id="exampleFormControlInput1"
                                                                        placeholder="Masukkan rombel"
                                                                        value="{{ old('rombel') }}">
                                                                    @if ($errors->has('rombel'))
                                                                        <span
                                                                            class="help-block">{{ $errors->first('rombel') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">KELAS</label>
                                                                    <select name="kelas_id" class="form-control"
                                                                        id="kelas">
                                                                        <option hidden>Pilih Kelas</option>
                                                                        @foreach ($kelas as $key => $m)
                                                                            <option value="{{ $m->id }}">
                                                                                {{ $m->nama }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!-- akhir form isian data -->
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Wali Kelas/Guru
                                                                        Kelas</label>
                                                                    <select name="guru_id" class="form-control"
                                                                        id="exampleFormControlSelect2">
                                                                        <option>---</option>
                                                                        @foreach ($guru as $key => $m)
                                                                            <option value="{{ $m->id }}">
                                                                                {{ $m->nama_guru }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Semester</label>
                                                                <select name="tahunpelajaran_id" class="form-control"
                                                                    id="exampleFormControlSelect2">
                                                                    <option>---</option>
                                                                    @foreach ($tahunpelajaran as $key => $m)
                                                                        <option value="{{ $m->id }}">
                                                                            {{ $m->thn_pel }} - {{ $m->semester }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    SD Inpres Dabolding
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
@endsection
