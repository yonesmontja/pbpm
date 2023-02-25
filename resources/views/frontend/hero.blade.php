@extends('layouts.master5')

@section('title')
    <title> Hero </title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Hero</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Hero</li>
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
                                            Data <a href="#" class="alert-link">hero</a> {{ session('sukses') }}
                                        </div>
                                    @endif

                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Header 1</th>
                                                <th>Header 2</th>
                                                <th>Gambar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($hero as $h)
                                                <tr>
                                                    <td><a href="#">{{ $h->header1 }}</a>
                                                    </td>
                                                    <td>{{ $h->header2 }}</td>
                                                    <td>
                                                        <img src="{{ $h->image() }}" height="75" />
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Header 1</th>
                                                <th>Header 2</th>
                                                <th>Gambar</th>
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
                                                    <form action="/hero/herocreate" method="POST"
                                                        enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-group {{ $errors->has('header1') ? ' has-error' : '' }}">
                                                                    <label for="exampleFormControlInput1">Header 1</label>
                                                                    <input name="header1" type="text"
                                                                        class="form-control" id="exampleFormControlInput1"
                                                                        placeholder="Masukkan header 1"
                                                                        value="{{ old('header1') }}">
                                                                    @if ($errors->has('header1'))
                                                                        <span
                                                                            class="help-block">{{ $errors->first('header1') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div
                                                                    class="form-group {{ $errors->has('header2') ? ' has-error' : '' }}">
                                                                    <label for="exampleFormControlInput2">Header 2</label>
                                                                    <input name="header2" type="text"
                                                                        class="form-control" id="exampleFormControlInput2"
                                                                        placeholder="Masukkan header 2"
                                                                        value="{{ old('header2') }}">
                                                                    @if ($errors->has('header2'))
                                                                        <span
                                                                            class="help-block">{{ $errors->first('header2') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="image" class="form-label">Image</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">

                                                                    <input class="form-control" type="file"
                                                                        name="image" class="custom-file-input"
                                                                        id="image" onchange="previewImage()">
                                                                    <label class="custom-file-label" for="image">Choose
                                                                        file</label>
                                                                </div>
                                                                <div>
                                                                    <img class="img-preview img-fluid mb-3 col-sm-2"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if ($errors->has('image'))
                                                            <span class="help-block">{{ $errors->first('image') }}</span>
                                                        @endif
                                                        <!-- akhir form isian data -->
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
