@extends('layouts.master6')

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
                        <h1>Rombel Siswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Rombel Siswa</li>
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
                                                <th>Jumlah</th>
                                                <th>Wali Kelas</th>

                                                <th>Siswa</th>
                                                <th>Kode Siswa</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($rombel as $h)
                                                <tr>
                                                    <td><a href="#">{{ $h->rombel }}</a>
                                                    </td>
                                                    <td>{{ $h->siswa->count() }} siswa
                                                    </td>
                                                    <td><a href="/guru/{{ $h->guru->id }}/profile">{{ $h->guru->nama_guru }}
                                                    </td>

                                                    <td>
                                                        <ul>
                                                            @foreach ($h->siswa->sortBy('nama_depan') as $s)
                                                                <li><a href="/test/{{ $s->id }}/profile">{{ $s->nama_depan }}
                                                                        {{ $s->nama_belakang }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        @foreach ($h->siswa->sortBy('nama_depan') as $s)
                                                            <li><a href="/test/{{ $s->id }}/profile">
                                                                    {{ $s->id }}</a></li>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($h->siswa->sortBy('nama_depan') as $s)
                                                            <li><a href="/rombel/{{ $s->id }}/rombelsiswadelete"
                                                                    class="btn btn-danger btn-xs"
                                                                    onclick="return confirm('Yakin mau dihapus?')">
                                                                    Hapus {{ $s->nama_depan }} {{ $s->nama_belakang }}</a>
                                                            </li>
                                                            {{-- <li><button href="/rombel/{{ $s->id }}/rombelsiswadelete" type="button"
                                                        class="btn btn-danger btn-xs" data-toggle="modal"
                                                        data-target="#modal-danger">
                                                        Hapus
                                                    </button></li> --}}
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Rombel</th>
                                                <th>Jumlah</th>
                                                <th>Wali Kelas</th>

                                                <th>Siswa</th>
                                                <th>Kode Siswa</th>
                                                <th></th>

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
                                                    <form action="/rombel/rombelsiswacreate" method="POST"
                                                        enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="rombel">Rombel</label>
                                                                    <select name="rombel_id" class="form-control"
                                                                        id="rombel">
                                                                        <option hidden>Pilih Rombel</option>
                                                                        @foreach ($rombel as $key => $m)
                                                                            <option value="{{ $m->id }}">
                                                                                {{ $m->rombel }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="kelas">KELAS</label>
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
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="siswa">Siswa</label>
                                                                    <select name="siswa_id" class="form-control"
                                                                        id="siswa">
                                                                        <option hidden>Pilih siswa</option>
                                                                        @foreach ($siswa as $key => $m)
                                                                            <option value="{{ $m->id }}">
                                                                                {{ $m->nama_depan }}
                                                                                {{ $m->nama_belakang }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="nama_depan">Nama
                                                                        Depan</label>
                                                                    <select name="nama_depan" class="form-control"
                                                                        id="nama_depan">
                                                                        <option hidden>Pilih siswa 1</option>
                                                                        @foreach ($siswa as $key => $m)
                                                                            <option value="{{ $m->nama_depan }}">
                                                                                {{ $m->nama_depan }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="nama_belakang">Nama
                                                                        Belakang</label>
                                                                    <select name="nama_belakang" class="form-control"
                                                                        id="nama_belakang">
                                                                        <option hidden>Pilih siswa</option>
                                                                        @foreach ($siswa as $key => $m)
                                                                            <option value="{{ $m->nama_belakang }}">
                                                                                {{ $m->nama_belakang }}
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
                                                                    <label for="exampleFormControlSelect15">Wali Kelas/Guru
                                                                        Kelas</label>
                                                                    <select name="guru_id" class="form-control"
                                                                        id="exampleFormControlSelect15">
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
                                                                    <label
                                                                        for="exampleFormControlSelect16">Semester</label>
                                                                    <select name="tahunpelajaran_id" class="form-control"
                                                                        id="exampleFormControlSelect16">
                                                                        <option>---</option>
                                                                        @foreach ($tahunpel as $key => $m)
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
                                    <!-- Modal hapus data -->
                                    <div class="modal fade" id="modal-danger">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-danger">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Konfirmasi</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Anda yakin menghapus data ini&hellip;?</p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-default"><a
                                                            href="/rombel/{{ $s->id }}/rombelsiswadelete"
                                                            siswa-id="{{ $s->id }}">Hapus</a></button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
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
