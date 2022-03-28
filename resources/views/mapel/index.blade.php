@extends('layouts.master5')

@section('title')
    <title> AdminLTE 3 | Mapel </title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Mapel</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Data Mapel</li>
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
                                <h3 class="card-title">Tahun Pelajaran 2020/2021</h3>
                            </div>

                            <div class="col">
                                <button class="btn btn-success">Refresh</button>
                            </div>
                            <div class="col-12">
                                <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal"
                                    data-target="#staticBackdrop">
                                    Tambah Data Mapel
                                </button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (session('sukses'))
                                    <div class="alert alert-success" role="alert">
                                        Data <a href="#" class="alert-link">Mapel</a> {{ session('sukses') }}
                                    </div>
                                @endif

                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>KODE</th>
                                            <th>MAPEL</th>
                                            <th>SEMESTER</th>
                                            <th>KELOMPOK</th>
                                            <th>SUB-MAPEL</th>
                                            <th>GURU</th>
                                            <th>DESKRIPSI</th>
                                            <th>KI 1-2?</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mapel as $mapel)
                                            <tr>
                                                @if (auth()->user()->role == 'admin')
                                                    <td><a href="/mapel/{{ $mapel->id }}">{{ $mapel->kode }}</a>
                                                    </td>
                                                    <td>{{ $mapel->kode }}</td>
                                                    <td>{{ $mapel->nama_mapel }}</td>
                                                    <td>{{ $mapel->semester }}</td>
                                                    <td>{{ $mapel->kelompok }}</td>
                                                    <td>{{ $mapel->tambahan_sub }}</td>
                                                    <td>{{ $mapel->guru_id }}</td>
                                                    <td>{{ $mapel->kd_singkat }}</td>
                                                    <td>{{ $mapel->is_sikap }}</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info"
                                                            href="{{ route('mapel.show', $mapel) }}">Show</a>
                                                        <a class="btn btn-sm btn-warning"
                                                            href="{{ route('mapel.edit', $mapel) }}">Edit</a>
                                                        </a>
                                                        <form method="post"
                                                            action="{{ route('mapel.destroy', $mapel->id) }}"
                                                            style="display: inline-block;">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Hapus Data?')">Delete</button>
                                                        </form>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>KODE</th>
                                            <th>MAPEL</th>
                                            <th>SEMESTER</th>
                                            <th>KELOMPOK</th>
                                            <th>SUB-MAPEL</th>
                                            <th>GURU</th>
                                            <th>DESKRIPSI</th>
                                            <th>KI 1-2?</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <!-- Modal -->
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
                                                <form action="{{ route('mapel.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div
                                                                class="form-group {{ $errors->has('kode') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlInput1">Kode</label>
                                                                <input name="kode" type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="Masukkan kodel mapel"
                                                                    value="{{ old('kode') }}">
                                                                @if ($errors->has('kode'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('kode') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div
                                                                class="form-group {{ $errors->has('nama_mapel') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlInput1">Mapel</label>
                                                                <input name="nama_mapel" type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="Masukkan nama mapel"
                                                                    value="{{ old('nama_mapel') }}">
                                                                @if ($errors->has('nama_mapel'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('nama_mapel') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Semester</label>
                                                                <input name="semester" type="text" class="form-control"
                                                                    id="exampleFormControlInput3" placeholder="Semester">
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="form-group {{ $errors->has('kelompok') ? ' has-error' : '' }}">
                                                            <label for="exampleFormControlSelect1">Kelompok</label>
                                                            <select name="kelompok" class="form-control"
                                                                id="exampleFormControlSelect1">
                                                                <option>pilih kelompok mapel</option>
                                                                <option value="A"
                                                                    {{ old('kelompok') == 'A' ? ' selected' : '' }}>
                                                                    Kelompok A</option>
                                                                <option value="B"
                                                                    {{ old('kelompok') == 'B' ? ' selected' : '' }}>
                                                                    Kelompok B</option>
                                                            </select>
                                                            @if ($errors->has('kelompok'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('kelompok') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Sub-mapel</label>
                                                            <select name="tambahan_sub" class="form-control"
                                                                id="exampleFormControlSelect2">
                                                                <option>---</option>
                                                                <option>KEIMANAN</option>
                                                                <option>NO</option>
                                                                <option>MULOK</option>
                                                                <option>KATOLIK</option>
                                                                <option>PROTESTAN</option>
                                                                <option>ISLAM</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Deskripsi</label>
                                                                <input name="kd_singkat" type="text" class="form-control"
                                                                    id="exampleFormControlInput3" placeholder="Deskripsi">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="guru_id"
                                                                class="col-md-4 col-form-label">Guru</label>

                                                            <div class="col-md-6">
                                                                <select name="guru_id" id="guru_id"
                                                                    class="form-control">
                                                                    <option value="">== Pilih Guru ==</option>
                                                                    @foreach ($gurus as $id => $nama_guru)
                                                                        <option value="{{ $id }}">
                                                                            {{ $nama_guru }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="form-group {{ $errors->has('is_sikap') ? ' has-error' : '' }}">
                                                        <label for="exampleFormControlSelect1">KI 1 2?</label>
                                                        <select name="is_sikap" class="form-control"
                                                            id="exampleFormControlSelect1">
                                                            <option>---</option>
                                                            <option value="0"
                                                                {{ old('is_sikap') == '1' ? ' selected' : '' }}>Tidak
                                                            </option>
                                                            <option value="1"
                                                                {{ old('is_sikap') == '0' ? ' selected' : '' }}>Ya
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('is_sikap'))
                                                            <span
                                                                class="help-block">{{ $errors->first('is_sikap') }}</span>
                                                        @endif
                                                    </div>
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
                                <!-- End Modal -->
                                <!-- /.card-body -->
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
    <div class="modal fade" id="modal-danger">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin menghapus data ini&hellip;?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-default"><a
                            href="{{ route('mapel.destroy', $mapel) }}">Hapus</a></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
