@extends('layouts.master5')

@section('title')
    <title> SD Dabolding ABSENSI & CATATAN </title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ABSENSI & CATATAN</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">ABSENSI & CATATAN</li>
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
                                            IMPORT DATA
                                        </button>

                                        <!-- Import Excel -->
                                        <div class="modal fade" id="importExcel" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <form method="post" action="/extra/import_extra_excel"
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
                                        <form action="/extra_filter" method="GET">
                                            <div class="input-group mb-3">
                                                <input type="date" class="form-control" name="start_date">
                                                <input type="date" class="form-control" name="end_date">
                                                <button class="btn btn-primary float-right btn-sm"
                                                    type="submit">FILTER</button>
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
                                            TAMBAH DATA ABSEN DAN CATATAN WALI KELAS
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (session('sukses'))
                                    <div class="alert alert-success" role="alert">
                                        Data <a href="/extra" class="alert-link">Absensi dan Catatan Wali Kelas</a> {{ session('sukses') }}
                                    </div>
                                @endif
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SISWA</th>
                                            <th>SAKIT</th>
                                            <th>IJIN</th>
                                            <th>ALPA</th>
                                            <th>KELAS</th>
                                            <th>Catatan Wali Kelas: Sikap</th>
                                            <th>Catatan Wali Kelas: Kehadiran</th>
                                            <th>Catatan Wali Kelas: Motivasi</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_extra as $extra)
                                            <tr>
                                                <td><a href="/test/{{ $extra->siswa_id }}/profile">{{ $extra->siswa->nama_depan }} {{ $extra->siswa->nama_belakang }}</a></td>
                                                <td>{{ $extra->sakit }}</td>
                                                <td>{{ $extra->ijin }}</td>
                                                <td>{{ $extra->alpa }}</td>
                                                <td><a href="/kelas/{{ $extra->kelas_id }}/profile">{{ $extra->kelas->nama }}</a></td>
                                                <td>{{ $extra->saran }}</td>
                                                <td>{{ $extra->ekskul }}</td>
                                                <td>{{ $extra->prestasi }}</td>
                                                <td>
                                                    <a href="/extra/{{ $extra->id }}/extraedit"
                                                        class="btn btn-warning btn-sm">Ubah
                                                    </a>
                                                    <!--a href="/extra/{{ $extra->id }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')" >Hapus</a-->
                                                    <a href="/extra/{{ $extra->id }}/extradelete"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin mau dihapus?')">Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SISWA</th>
                                            <th>SAKIT</th>
                                            <th>IJIN</th>
                                            <th>ALPA</th>
                                            <th>KELAS</th>
                                            <th>Catatan Wali Kelas: Sikap</th>
                                            <th>Catatan Wali Kelas: Kehadiran</th>
                                            <th>Catatan Wali Kelas: Motivasi</th>
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
                                                <form action="/extra/extracreate" method="POST"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">KELAS</label>
                                                                <select name="kelas_id" class="form-control" id="kelas">
                                                                    <option hidden>Pilih Kelas</option>
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
                                                                <select name="siswa_id" class="form-control" id="siswa">

                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">PENDENGARAN</label>
                                                                <select name="pendengaran" class="form-control"
                                                                    id="exampleFormControlSelect2">
                                                                    <option>---</option>
                                                                    <option value="Baik">Baik</option>
                                                                    <option value="Baik">Cukup</option>
                                                                    <option value="Baik">Kurang</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">PENGLIHATAN</label>
                                                                <select name="penglihatan" class="form-control"
                                                                    id="exampleFormControlSelect2">
                                                                    <option>---</option>
                                                                    <option value="Baik">Baik</option>
                                                                    <option value="Baik">Cukup</option>
                                                                    <option value="Baik">Kurang</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">GIGI</label>
                                                                <select name="gigi" class="form-control"
                                                                    id="exampleFormControlSelect2">
                                                                    <option>---</option>
                                                                    <option value="Baik">Baik</option>
                                                                    <option value="Baik">Cukup</option>
                                                                    <option value="Baik">Kurang</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div
                                                                class="form-group {{ $errors->has('alpa') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlInput1">ALPA</label>
                                                                <input name="alpa" type="text" class="form-control"
                                                                    id="exampleFormControlInput1" placeholder="alpa"
                                                                    value="{{ old('alpa') }}">
                                                                @if ($errors->has('alpa'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('alpa') }}</span>
                                                                @endif
                                                            </div>
                                                            @if ($errors->has('alpa'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('alpa') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div
                                                                class="form-group {{ $errors->has('ijin') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlInput1">IJIN</label>
                                                                <input name="ijin" type="text" class="form-control"
                                                                    id="exampleFormControlInput1" placeholder="ijin"
                                                                    value="{{ old('ijin') }}">
                                                                @if ($errors->has('ijin'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('ijin') }}</span>
                                                                @endif
                                                            </div>
                                                            @if ($errors->has('ijin'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('ijin') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div
                                                                class="form-group {{ $errors->has('sakit') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlInput1">SAKIT</label>
                                                                <input name="sakit" type="text" class="form-control"
                                                                    id="exampleFormControlInput1" placeholder="sakit"
                                                                    value="{{ old('sakit') }}">
                                                                @if ($errors->has('sakit'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('sakit') }}</span>
                                                                @endif
                                                            </div>
                                                            @if ($errors->has('sakit'))
                                                                <span
                                                                    class="help-block">{{ $errors->first('sakit') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="form-group {{ $errors->has('saran') ? ' has-error' : '' }}">
                                                        <label for="exampleFormControlTextarea1">Catatan Wali Kelas: Sikap</label>
                                                        <textarea name="saran" class="form-control" id="exampleFormControlTextarea1" placeholder="catatan tentang sikap"
                                                            value="{{ old('saran') }}" rows="3"></textarea>
                                                    </div>
                                                    @if ($errors->has('saran'))
                                                        <span class="help-block">{{ $errors->first('saran') }}</span>
                                                    @endif
                                                    <div
                                                        class="form-group {{ $errors->has('ekskul') ? ' has-error' : '' }}">
                                                        <label for="exampleFormControlTextarea1">Catatan Wali Kelas: Kehadiran</label>
                                                        <textarea name="ekskul" class="form-control" id="exampleFormControlTextarea1" placeholder="catatan tentang kehadiran"
                                                            value="{{ old('ekskul') }}" rows="3"></textarea>
                                                    </div>
                                                    @if ($errors->has('ekskul'))
                                                        <span
                                                            class="help-block">{{ $errors->first('ekskul') }}</span>
                                                    @endif
                                                    <div
                                                        class="form-group {{ $errors->has('prestasi') ? ' has-error' : '' }}">
                                                        <label for="exampleFormControlTextarea1">Catatan Wali Kelas: Motivasi</label>
                                                        <textarea name="prestasi" class="form-control" id="exampleFormControlTextarea1" placeholder="catatan motivasi siswa (jika ada)"
                                                            value="{{ old('prestasi') }}" rows="3"></textarea>
                                                    </div>
                                                    @if ($errors->has('prestasi'))
                                                        <span
                                                            class="help-block">{{ $errors->first('prestasi') }}</span>
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
