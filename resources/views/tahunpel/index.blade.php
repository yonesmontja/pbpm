@extends('layouts.master5')

@section('title')
    <title> AdminLTE 3 | TP </title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data tahun pelajaran</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Data tahun pelajaran</li>
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

                            <div class="col-12">
                                <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal"
                                    data-target="#staticBackdrop">
                                    Tambah Data user
                                </button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (session('sukses'))
                                    <div class="alert alert-success" role="alert">
                                        Data <a href="#" class="alert-link">user</a> {{ session('sukses') }}
                                    </div>
                                @endif

                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>TP</th>
                                            <th>SEMESTER</th>
                                            <th>TAHUN</th>
                                            <th>AKTIF</th>
                                            <th>KEPSEK</th>
                                            <th>NIP</th>
                                            <th>TANGGAL RAPORT</th>
                                            <th>TANGGAL IJAZAH</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tahunpel as $tahunpel)
                                            <tr>
                                                @if (auth()->user()->role == 'admin')
                                                    <td><a
                                                            href="/tahunpel/{{ $tahunpel->id }}">{{ $tahunpel->thn_pel }}</a>
                                                    </td>
                                                    <td>{{ $tahunpel->semester }}</td>
                                                    <td>{{ $tahunpel->tahun }}</td>
                                                    <td>{{ $tahunpel->aktif }}</td>
                                                    <td>{{ $tahunpel->nama_kepsek }}</td>
                                                    <td>{{ $tahunpel->kode_kepsek }}</td>
                                                    <td>{{ $tahunpel->tgl_raport }}</td>
                                                    <td>{{ $tahunpel->tgl_raport_kelas3 }}</td>
                                                    <td>
                                                        <a class="btn btn-sm btn-warning"
                                                            href="{{ route('tahunpel.edit', $tahunpel) }}">Edit</a>
                                                        </a>
                                                        <form method="post"
                                                            action="{{ route('tahunpel.destroy', $tahunpel->id) }}"
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
                                            <th>TP</th>
                                            <th>SEMESTER</th>
                                            <th>TAHUN</th>
                                            <th>AKTIF</th>
                                            <th>KEPSEK</th>
                                            <th>NIP</th>
                                            <th>TANGGAL RAPORT</th>
                                            <th>TANGGAL IJAZAH</th>
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
                                                <form action="{{ route('tahunpel.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div
                                                                class="form-group {{ $errors->has('thn_pel') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlInput1">TP</label>
                                                                <input name="thn_pel" type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="Masukkan nama user"
                                                                    value="{{ old('thn_pel') }}">
                                                                @if ($errors->has('thn_pel'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('thn_pel') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div
                                                                class="form-group {{ $errors->has('semester') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlInput1">Semester</label>
                                                                <input name="semester" type="semester"
                                                                    class="form-control" id="exampleFormControlInput1"
                                                                    placeholder="Masukkan semester"
                                                                    value="{{ old('semester') }}">
                                                                @if ($errors->has('semester'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('semester') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Tahun</label>
                                                                <input name="tahun" type="text" class="form-control"
                                                                    id="exampleFormControlInput3" placeholder="Tahun">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div
                                                                class="form-group {{ $errors->has('aktif') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlSelect1">Aktif</label>
                                                                <select name="aktif" class="form-control"
                                                                    id="exampleFormControlSelect1">
                                                                    <option>---</option>
                                                                    <option value="Y"
                                                                        {{ old('aktif') == 'Y' ? ' selected' : '' }}>
                                                                        Aktif</option>
                                                                    <option value="N"
                                                                        {{ old('aktif') == 'N' ? ' selected' : '' }}>
                                                                        Nonaktif</option>
                                                                </select>
                                                                @if ($errors->has('aktif'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('aktif') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Kepsek</label>
                                                                <input name="nama_kepsek" type="text" class="form-control"
                                                                    id="exampleFormControlInput3" placeholder="Kepsek">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">NIP</label>
                                                                <input name="kode_kepsek" type="text" class="form-control"
                                                                    id="exampleFormControlInput3" placeholder="NIP">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Tanggal terima raport:</label>
                                                                <div class="input-group date" id="reservationdate1"
                                                                    data-target-input="nearest">
                                                                    <input name="tgl_raport" type="text"
                                                                        class="form-control datetimepicker-input"
                                                                        data-target="#reservationdate1" />
                                                                    <div class="input-group-append"
                                                                        data-target="#reservationdate1"
                                                                        data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i
                                                                                class="fa fa-calendar"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label>Tanggal Ijazah:</label>
                                                                <div class="input-group date" id="reservationdate2"
                                                                    data-target-input="nearest">
                                                                    <input name="tgl_raport_kelas3" type="text"
                                                                        class="form-control datetimepicker-input"
                                                                        data-target="#reservationdate2" />
                                                                    <div class="input-group-append"
                                                                        data-target="#reservationdate2"
                                                                        data-toggle="datetimepicker">
                                                                        <div class="input-group-text"><i
                                                                                class="fa fa-calendar"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
                            href="{{ route('tahunpel.destroy', $tahunpel) }}">Hapus</a></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

@endsection
