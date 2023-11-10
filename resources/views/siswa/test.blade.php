@extends('layouts.master5')

@section('title')
    <title> SD Dabolding Raport </title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Raport Siswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Raport Siswa</li>
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
                                    @if (auth()->user()->role == 'admin')
                                        <div class="col-sm-2">
                                            <h6 class="card-title">
                                                <a href="/siswa/export_pdf" target="_blank">EXPOR
                                                    PDF
                                                </a>
                                            </h6>
                                        </div>
                                    @endif
                                    @if (auth()->user()->role == 'admin')
                                        <div class="col-sm-2">
                                            <h6 class="card-title">
                                                <a href="/siswa/export_excel" target="_blank">EXPOR EXCEL
                                                </a>
                                            </h6>
                                        </div>
                                    @endif
                                    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'tata_usaha')
                                        <div class="col-sm-2">
                                            <form action="/siswa/filter" method="GET">
                                                <div class="form-group">
                                                    <label for="rombel">Pilih Rombel:</label>
                                                    <select class="form-control" name="rombel" id="rombel">
                                                        <option value="13" selected>Rombel A</option>
                                                        <option value="14">Rombel B</option>
                                                    </select>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Filter</button>
                                            </form>
                                        </div>
                                    @endif
                                    @if (auth()->user()->role == 'admin')
                                        <div class="col-sm-2">
                                            <h6 class="card-title" data-toggle="modal" data-target="#importExcel">
                                                <a href="#">
                                                    IMPOR EXCEL</a>
                                            </h6>
                                            <!-- Import Excel -->
                                            <div class="modal fade" id="importExcel" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form method="post" action="/siswa/import_excel"
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
                                                                    <input type="file" name="file"
                                                                        required="required">
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Import</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (auth()->user()->role == 'admin')
                                        <div class="col-sm-2">
                                            <h6 class="card-title" data-toggle="modal" data-target="#staticBackdrop">
                                                <a href="#">AKTIVASI USER</a>
                                            </h6>
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-primary float-right btn-xs"
                                                data-toggle="modal" data-target="#staticBackdrop">
                                                Tambah Data Siswa
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                @if (session('sukses'))
                                    <div class="alert alert-success" role="alert">
                                        Data <a href="#" class="alert-link">siswa</a> {{ session('sukses') }}
                                    </div>
                                @endif

                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>NAMA DEPAN</th>
                                            <th>NAMA BELAKANG</th>
                                            <th>NIS</th>
                                            <th>JENIS KELAMIN</th>
                                            <th>AGAMA</th>
                                            <th>KELAS</th>
                                            <th>CETAK</th>
                                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'guru' || auth()->user()->role == 'tata_usaha')
                                                <th>AKSI</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $siswaWithRombel = [];

                                            foreach ($tampung as $siswa) {
                                                // Mengelompokkan siswa ke dalam rombel sesuai tahun_pelajaran
                                                foreach ($siswa->rombel as $r) {
                                                    if ($r->tahunpelajaran_id == $thn_id) {
                                                        $siswaWithRombel[] = [
                                                            'siswa' => $siswa,
                                                            'rombel' => $r->rombel,
                                                        ];
                                                    }
                                                }
                                            }
                                            //dd($siswaWithRombel);
                                        @endphp
                                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'tata_usaha')
                                            @foreach ($siswaWithRombel as $data)
                                                <tr>
                                                    <td><a
                                                            href="/test/{{ $data['siswa']->id }}/profile">{{ $data['siswa']->nama_depan }}</a>
                                                    </td>
                                                    <td><a
                                                            href="/test/{{ $data['siswa']->id }}/profile">{{ $data['siswa']->nama_belakang }}</a>
                                                    </td>
                                                    <td>{{ $data['siswa']->nis }}</td>
                                                    <td>{{ $data['siswa']->jenis_kelamin }}</td>
                                                    <td>{{ $data['siswa']->agama }}</td>
                                                    <td>{{ $data['rombel'] }}</td>
                                                    {{-- @foreach ($siswa->rombel as $r)
                                                        @if ($r->tahunpelajaran_id == $thn_id)
                                                            <td>{{ $r->rombel }}</td>
                                                        @endif
                                                    @endforeach --}}
                                                    <td>
                                                        <a href="/siswa/{{ $data['siswa']->id }}/cover_pdf"
                                                            class="btn btn-primary btn-xs">Cover
                                                        </a>
                                                        <a href="/siswa/{{ $data['siswa']->id }}/biodata_pdf"
                                                            class="btn btn-primary btn-xs">Bio
                                                        </a>
                                                        <a href="/siswa/{{ $data['siswa']->id }}/export_pdf"
                                                            class="btn btn-primary btn-xs">Raport
                                                        </a>
                                                        <a href="/siswa/{{ $data['siswa']->id }}/cetak_raport"
                                                            class="btn btn-success btn-xs">Lihat & Cetak Raport
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="/test/{{ $data['siswa']->id }}/edit"
                                                            class="btn btn-warning btn-xs">Ubah
                                                        </a>
                                                        @if (auth()->user()->role == 'admin')
                                                            <a href="/test/{{ $data['siswa']->id }}/delete"
                                                                class="btn btn-danger btn-xs"
                                                                onclick="return confirm('Yakin mau dihapus?')">Hapus
                                                            </a>
                                                        @endif
                                                        @if ($data['siswa']->user_id == null && auth()->user()->role == 'admin')
                                                            <a href="/test/{{ $data['siswa']->id }}/aktivasi"
                                                                class="btn btn-primary btn-xs" data-toggle="modal"
                                                                data-target="#modal-dialog2{{ $data['siswa']->id }}">Aktivasi

                                                            </a>
                                                        @else
                                                            <button type="button"
                                                                class="btn btn-default btn-xs disabled">User Aktif</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <!-- Modal aktivasi -->
                                                <div class="modal fade" id="modalAktivasi{{ $data['siswa']->id }}"
                                                    tabindex="-1" aria-labelledby="modalAktivasi" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <h4 class="text-center">Apakah anda yakin aktivasi user
                                                                    atas
                                                                    nama siswa ini? :
                                                                    <span>{{ $data['siswa']->nama_depan }}</span>
                                                                </h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="/test/{{ $data['siswa']->id }}/aktivasi"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('post')
                                                                    <button type="button"
                                                                        class="btn btn-primary">Aktivasi</button>
                                                                </form>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Tidak Jadi</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="modal-dialog2{{ $data['siswa']->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content bg-danger">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Aktivasi</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Anda yakin mengaktifkan user atas nama siswa: </p>
                                                                <p>{{ $data['siswa']->nama_depan }}
                                                                    {{ $data['siswa']->nama_belakang }} &hellip;?</p>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default">
                                                                    <a href="/test/{{ $data['siswa']->id }}/aktivasi">Aktivasi
                                                                    </a>
                                                                </button>
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">
                                                                    Close
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            @endforeach
                                        @endif
                                        @if (auth()->user()->role == 'guru')
                                            @foreach ($tampung as $data)
                                                <tr>
                                                    <td><a
                                                            href="/test/{{ $data->siswa_id }}/profile">{{ $data->nama_depan }}</a>
                                                    </td>
                                                    <td><a
                                                            href="/test/{{ $data->siswa_id }}/profile">{{ $data->nama_belakang }}</a>
                                                    </td>
                                                    <td>{{ $data->nis }}</td>
                                                    <td>{{ $data->jenis_kelamin }}</td>
                                                    <td>{{ $data->agama }}</td>
                                                    {{-- @foreach ($data->rombel as $r)
                                                        <td>{{ $r->rombel }}</td>
                                                    @endforeach --}}
                                                    <td>{{ $rombel3 }}</td>
                                                    <td>
                                                        <a href="/siswa/{{ $data->siswa_id }}/cover_pdf"
                                                            class="btn btn-primary btn-xs">Cover
                                                        </a>
                                                        <a href="/siswa/{{ $data->siswa_id }}/biodata_pdf"
                                                            class="btn btn-primary btn-xs">Bio
                                                        </a>
                                                        <a href="/siswa/{{ $data->siswa_id }}/export_pdf"
                                                            class="btn btn-primary btn-xs">Raport
                                                        </a>
                                                        <a href="/siswa/{{ $data->siswa_id }}/cetak_raport"
                                                            class="btn btn-success btn-xs">Lihat & Cetak Raport
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="/test/{{ $data->siswa_id }}/edit"
                                                            class="btn btn-warning btn-xs">Ubah
                                                        </a>
                                                        {{-- <a href="/test/{{ $data->id }}/delete"
                                                            class="btn btn-danger btn-xs"
                                                            onclick="return confirm('Yakin mau dihapus?')">Hapus
                                                        </a> --}}
                                                        @if ($data->user_id == null)
                                                            <a href="#" class="btn btn-primary btn-xs"
                                                                data-toggle="modal"
                                                                data-target="#modal-dialog2{{ $data->siswa_id }}">Aktivasi
                                                            </a>
                                                        @else
                                                            <button type="button"
                                                                class="btn btn-default btn-xs disabled">User Aktif</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <!-- Modal aktivasi -->
                                                <div class="modal fade" id="modalAktivasi{{ $data->siswa_id }}"
                                                    tabindex="-1" aria-labelledby="modalAktivasi" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <h4 class="text-center">Apakah anda yakin aktivasi user
                                                                    atas
                                                                    nama siswa ini? :
                                                                    <span>{{ $data->nama_depan }}</span>
                                                                </h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="/test/{{ $data->siswa_id }}/aktivasi"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('post')
                                                                    <button type="button"
                                                                        class="btn btn-primary">Aktivasi</button>
                                                                </form>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Tidak Jadi</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="modal-dialog2{{ $data->siswa_id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content bg-danger">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Aktivasi</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Anda yakin mengaktifkan user atas nama siswa: </p>
                                                                <p>{{ $data->nama_depan }}
                                                                    {{ $data->nama_belakang }} &hellip;?</p>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default">
                                                                    <a href="/test/{{ $data->siswa_id }}/aktivasi">Aktivasi
                                                                    </a>
                                                                </button>
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">
                                                                    Close
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>NAMA DEPAN</th>
                                            <th>NAMA BELAKANG</th>
                                            <th>NIS</th>
                                            <th>JENIS KELAMIN</th>
                                            <th>AGAMA</th>
                                            <th>KELAS</th>
                                            <th>CETAK</th>
                                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'guru' || auth()->user()->role == 'tata_usaha')
                                                <th>AKSI</th>
                                            @endif
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
                                                <form action="/test/testcreate" method="POST"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div
                                                                class="form-group {{ $errors->has('nama_depan') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlInput1">Nama Depan</label>
                                                                <input name="nama_depan" type="text"
                                                                    class="form-control" id="exampleFormControlInput1"
                                                                    placeholder="Masukkan nama depan"
                                                                    value="{{ old('nama_depan') }}">
                                                                @if ($errors->has('nama_depan'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('nama_depan') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput12">Nama
                                                                    Belakang</label>
                                                                <input name="nama_belakang" type="text"
                                                                    class="form-control" id="exampleFormControlInput12"
                                                                    placeholder="nama belakang">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div
                                                                class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlInput13">E-mail</label>
                                                                <input name="email" type="email" class="form-control"
                                                                    id="exampleFormControlInput13"
                                                                    placeholder="Masukkan email"
                                                                    value="{{ old('email') }}">
                                                                @if ($errors->has('email'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('email') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput14">NIS</label>
                                                                <input name="nis" type="text" class="form-control"
                                                                    id="exampleFormControlInput14" placeholder="NIS">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput15">NISN</label>
                                                                <input name="nisn" type="text" class="form-control"
                                                                    id="exampleFormControlInput15" placeholder="NISN">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div
                                                                class="form-group {{ $errors->has('kelas_id') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlSelect22">KELAS</label>
                                                                <select name="kelas_id" class="form-control"
                                                                    id="exampleFormControlSelect22">
                                                                    <option>---</option>
                                                                    @foreach ($kelas as $key => $m)
                                                                        <option value="{{ $m->id }}">
                                                                            {{ $m->nama }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @if ($errors->has('kelas_id'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('kelas_id') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div
                                                                class="form-group {{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlSelect12">Jenis
                                                                    Kelamin</label>
                                                                <select name="jenis_kelamin" class="form-control"
                                                                    id="exampleFormControlSelect12">
                                                                    <option>---</option>
                                                                    <option value="Laki-laki"
                                                                        {{ old('jenis_kelamin') == 'L' ? ' selected' : '' }}>
                                                                        Laki-laki</option>
                                                                    <option value="Perempuan"
                                                                        {{ old('jenis_kelamin') == 'P' ? ' selected' : '' }}>
                                                                        Perempuan</option>
                                                                </select>
                                                                @if ($errors->has('jenis_kelamin'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div
                                                                class="form-group {{ $errors->has('agama') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlSelect13">Agama</label>
                                                                <select name="agama" class="form-control"
                                                                    id="exampleFormControlSelect13">
                                                                    <option>---</option>
                                                                    <option>Islam</option>
                                                                    <option>Kristen Protestan</option>
                                                                    <option>Kristen Katolik</option>
                                                                    <option>Budha</option>
                                                                    <option>Hindu</option>
                                                                    <option>Konghucu</option>
                                                                </select>
                                                                @if ($errors->has('agama'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('agama') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1">Alamat</label>
                                                        <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="avatar" class="form-label">Avatar</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">

                                                                <input class="form-control" type="file" name="avatar"
                                                                    class="custom-file-input" id="avatar"
                                                                    onchange="previewImage()">
                                                                <label class="custom-file-label" for="avatar">Choose
                                                                    file</label>
                                                            </div>
                                                            <div>
                                                                <img class="img-preview img-fluid mb-3 col-sm-2"
                                                                    alt="">
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
                    <button type="button" class="btn btn-default"><a href="/test/{{ $siswa->id }}/delete"
                            siswa-id="{{ $siswa->id }}">Hapus</a></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
