@extends('layouts.master5')

@section('title')
    <title> SD Dabolding NILAI </title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>NILAI</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">NILAI</li>
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
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-primary float btn-sm" data-toggle="modal"
                                            data-target="#importExcel">
                                            IMPORT NILAI
                                        </button>
                                        <!-- Import Excel -->
                                        <div class="modal fade" id="importExcel" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form method="post" action="/nilai/import_excel"
                                                    enctype="multipart/form-data">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Import Excel
                                                            </h5>
                                                        </div>
                                                        <div class="modal-body">

                                                            {{ csrf_field() }}

                                                            <label>Pilih file excel</label>
                                                            <div class="form-group">
                                                                <input type="file" name="file" required="required">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Import</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <form action="/nilai_filter" method="GET">
                                            <div class="input-group mb-3">
                                                <input type="date" class="form-control" name="start_date">
                                                <input type="date" class="form-control" name="end_date">
                                            </div>
                                            <div class="input-group mb-3">
                                                <button class="btn btn-primary float-right btn-sm" type="submit">FILTER</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal"
                                            data-target="#staticBackdrop">
                                            TAMBAH NILAI
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (session('sukses'))
                                    <div class="alert alert-success" role="alert">
                                        Data <a href="#" class="alert-link">Nilai</a> {{ session('sukses') }}
                                    </div>
                                @endif
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>

                                            <th>KI</th>
                                            <th>MAPEL</th>
                                            <th>GURU</th>
                                            <th>PENILAIAN</th>
                                            <th>KELAS</th>
                                            <th>SISWA</th>
                                            <th>NILAI</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $nilai)
                                            <tr>

                                                <td>{{ $nilai->kompetensiinti->kompetensi_inti }}</td>
                                                <td>{{ $nilai->mapel->nama_mapel }}</td>
                                                <td><a href="/guru/{{ $nilai->guru->id }}/profile">{{ $nilai->guru->nama_guru }}</a></td>
                                                <td>{{ $nilai->penilaian->nama_tes }}</td>
                                                <td><a href="/kelas/{{ $nilai->kelas->id }}/profile">{{ $nilai->kelas->nama }}</a></td>
                                                <td><a href="/test/{{ $nilai->siswa->id }}/profile">{{ $nilai->siswa->nama_depan }} {{ $nilai->siswa->nama_belakang }}</a>
                                                </td>
                                                <td>{{ $nilai->nilai }}</td>
                                                <td>
                                                    <a href="/nilai/{{ $nilai->id }}/nilaiedit"
                                                        class="btn btn-warning btn-sm">Ubah
                                                    </a>
                                                    <!--a href="/nilai/{{ $nilai->id }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')" >Hapus</a-->
                                                    <a href="/nilai/{{ $nilai->id }}/nilaidelete"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin mau dihapus?')">Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>KI</th>
                                            <th>MAPEL</th>
                                            <th>GURU</th>
                                            <th>PENILAIAN</th>
                                            <th>KELAS</th>
                                            <th>SISWA</th>
                                            <th>NILAI</th>
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
                                                <form action="/nilai/nilaicreate" method="POST"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div
                                                                class="form-group {{ $errors->has('nilai_start') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlInput1">Mulai</label>
                                                                <input name="nilai_start" type="text" class="form-control"
                                                                    id="exampleFormControlInput1" placeholder="Kapan mulai?"
                                                                    value="{{ old('nilai_start') }}">
                                                                @if ($errors->has('nilai_start'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('nilai_start') }}</span>
                                                                @endif
                                                            </div>
                                                            @if ($errors->has('nilai_start'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('nilai_start') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div
                                                                class="form-group {{ $errors->has('nilai_end') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlInput1">Berakhir</label>
                                                                <input name="nilai_end" type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="Kapan selesai?"
                                                                    value="{{ old('nilai_end') }}">
                                                                @if ($errors->has('nilai_end'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('nilai_end') }}</span>
                                                                @endif
                                                            </div>
                                                            @if ($errors->has('nilai_end'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('nilai_end') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div
                                                                class="form-group {{ $errors->has('nilai') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlInput1">Nilai</label>
                                                                <input name="nilai" type="text" class="form-control"
                                                                    id="exampleFormControlInput1" placeholder="Nilai"
                                                                    value="{{ old('nilai') }}">
                                                                @if ($errors->has('nilai'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('nilai') }}</span>
                                                                @endif
                                                            </div>
                                                            @if ($errors->has('nilai'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('nilai') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Kompetensi
                                                                    Inti</label>
                                                                <select name="kompetensi_inti_id" class="form-control"
                                                                    id="exampleFormControlSelect2">
                                                                    <option>---</option>
                                                                    @foreach ($kompetensiinti as $key => $m)
                                                                        <option value="{{ $m->id }}">
                                                                            {{ $m->kompetensi_inti }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">MAPEL</label>
                                                                <select name="mapel_id" class="form-control"
                                                                    id="exampleFormControlSelect2">
                                                                    <option>---</option>
                                                                    @foreach ($mapel as $key => $m)
                                                                        <option value="{{ $m->id }}">
                                                                            {{ $m->nama_mapel }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">PENILAIAN</label>
                                                                <select name="penilaian_id" class="form-control"
                                                                    id="exampleFormControlSelect2">
                                                                    <option>---</option>
                                                                    @foreach ($penilaian as $key => $m)
                                                                        <option value="{{ $m->id }}">
                                                                            {{ $m->nama_tes }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect12">GURU</label>
                                                                <select name="guru_id" class="form-control"
                                                                    id="exampleFormControlSelect12">
                                                                    <option>---</option>
                                                                    @foreach ($guru as $key => $m)
                                                                        <option value="{{ $m->id }}">
                                                                            {{ $m->nama_guru }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">KELAS</label>
                                                                <select name="kelas_id" class="form-control"
                                                                    id="exampleFormControlSelect2">
                                                                    <option>---</option>
                                                                    @foreach ($kelas as $key => $m)
                                                                        <option value="{{ $m->id }}">
                                                                            {{ $m->nama }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">SISWA</label>
                                                                <select name="siswa_id" class="form-control"
                                                                    id="exampleFormControlSelect2">
                                                                    <option>---</option>
                                                                    @foreach ($siswa as $key => $m)
                                                                        <option value="{{ $m->id }}">
                                                                            {{ $m->nama_depan }}
                                                                            {{ $m->nama_belakang }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="form-group {{ $errors->has('nilai_deskripsi') ? ' has-error' : '' }}">
                                                        <label for="exampleFormControlTextarea1">PERNYATAAN
                                                            NILAI</label>
                                                        <textarea name="nilai_deskripsi" class="form-control" id="exampleFormControlTextarea1" placeholder="Pernyataan nilai"
                                                            value="{{ old('nilai_deskripsi') }}" rows="3"></textarea>
                                                    </div>
                                                    @if ($errors->has('nilai_deskripsi'))
                                                        <span
                                                            class="help-block">{{ $errors->first('nilai_deskripsi') }}</span>
                                                    @endif
                                                    <div
                                                        class="form-group {{ $errors->has('nilai_notes') ? ' has-error' : '' }}">
                                                        <label for="exampleFormControlTextarea1">NOTES</label>
                                                        <textarea name="nilai_notes" class="form-control" id="exampleFormControlTextarea1" placeholder="Catatan"
                                                            value="{{ old('nilai_notes') }}" rows="3"></textarea>
                                                    </div>
                                                    @if ($errors->has('nilai_notes'))
                                                        <span
                                                            class="help-block">{{ $errors->first('nilai_notes') }}</span>
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
                                <!-- End Modal -->
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
    <!-- /.content-wrapper -->
@endsection
