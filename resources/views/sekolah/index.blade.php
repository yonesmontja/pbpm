@extends('layouts.master5')

@section('title')
    <title> Sekolah </title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @if (auth()->user()->role == 'admin')
                            <h1>Data <a href="/sekolah/{{ 1 }}/profile">Sekolah</a></h1>
                        @else
                            <h1>Data Sekolah</h1>
                        @endif
                    </div>
                    @if (auth()->user()->role == 'admin')
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Data <a
                                        href="/sekolah/{{ 1 }}/profile">Sekolah</a></li>
                            </ol>
                        </div>
                    @endif
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
                                        <div class="col-sm-8">
                                            <button type="button" class="btn btn-primary float-left btn-sm"
                                                data-toggle="modal" data-target="#staticBackdrop">
                                                Tambah Data Sekolah
                                            </button>
                                        </div>

                                        <div class="col-sm-1">
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#importExcel">
                                                IMPOR EXCEL
                                            </button>
                                            <!-- Import Excel -->
                                            <div class="modal fade" id="importExcel" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form method="post" action="/sekolah/import_excel"
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
                                        <div class="col-sm-1">
                                            <a href="/sekolah/export_excel" class="btn btn-primary float-right btn-sm"
                                                target="_blank">EXPOR EXCEL</a>
                                        </div>
                                        <div class="col-sm-1">
                                            <a href="/sekolah/export_pdf" class="btn btn-primary float-right btn-sm"
                                                target="_blank">EXPOR PDF</a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">

                                @if (session('sukses'))
                                    <div class="alert alert-success" role="alert">
                                        Data <a href="#" class="alert-link">Sekolah</a> {{ session('sukses') }}
                                    </div>
                                @endif

                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>NAMA</th>
                                            <th>NPSN</th>
                                            <th>NSS</th>
                                            <th>KEPSEK</th>
                                            <th>ALAMAT</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_sekolah as $sekolah)
                                            <tr>
                                                <td><a href="/sekolah/{{ $sekolah->id }}/profile">{{ $sekolah->nama }}</a>
                                                </td>
                                                <td>{{ $sekolah->npsn }}</td>
                                                <td>{{ $sekolah->nss }}</td>
                                                <td>{{ $sekolah->kepsek }}</td>
                                                <td>{{ $sekolah->alamat }}</td>
                                                <td>
                                                    <a href="/sekolah/{{ $sekolah->id }}/sekolahedit"
                                                        class="btn btn-warning btn-sm">Ubah
                                                    </a>
                                                    @if (auth()->user()->role == 'admin')
                                                        <button href="/sekolah/{{ $sekolah->id }}/sekolahdelete"
                                                            type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                            data-target="#modal-danger">
                                                            Hapus
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>NAMA</th>
                                            <th>NPSN</th>
                                            <th>NSS</th>
                                            <th>KEPSEK</th>
                                            <th>ALAMAT</th>
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
                                                <form action="/sekolah/sekolahcreate" method="POST"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div
                                                                class="form-group {{ $errors->has('nama_sekolah') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlInput1">Nama sekolah</label>
                                                                <input name="nama_sekolah" type="text"
                                                                    class="form-control" id="exampleFormControlInput1"
                                                                    placeholder="Masukkan nama sekolah"
                                                                    value="{{ old('nama_sekolah') }}">
                                                                @if ($errors->has('nama_sekolah'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('nama_sekolah') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div
                                                                class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlInput1">E-mail</label>
                                                                <input name="email" type="email" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="Masukkan email"
                                                                    value="{{ old('email') }}">
                                                                @if ($errors->has('email'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('email') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div
                                                                class="form-group {{ $errors->has('is_bk') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlSelect1">Mengajar BK?</label>
                                                                <select name="is_bk" class="form-control"
                                                                    id="exampleFormControlSelect2">
                                                                    <option>---</option>
                                                                    <option value="1"
                                                                        {{ old('is_bk') == '1' ? 'selected' : '' }}>
                                                                        Tidak</option>
                                                                    <option value="2"
                                                                        {{ old('is_bk') == '2' ? 'selected' : '' }}>
                                                                        Ya</option>
                                                                </select>
                                                                @if ($errors->has('is_bk'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('is_bk') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">KODE sekolah</label>
                                                                <input name="kode_sekolah" type="text"
                                                                    class="form-control" id="exampleFormControlInput3"
                                                                    placeholder="KODE sekolah">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">TELPON</label>
                                                                <input name="telpon" type="text" class="form-control"
                                                                    id="exampleFormControlInput3" placeholder="Telpon">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div
                                                                class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlSelect1">status</label>
                                                                <select name="status" class="form-control"
                                                                    id="exampleFormControlSelect2">
                                                                    <option>---</option>
                                                                    <option value="1"
                                                                        {{ old('status') == '1' ? 'selected' : '' }}>
                                                                        Aktif</option>
                                                                    <option value="0"
                                                                        {{ old('status') == '0' ? 'selected' : '' }}>Non
                                                                        Aktif</option>
                                                                </select>
                                                                @if ($errors->has('status'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('status') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div
                                                                class="form-group {{ $errors->has('jk') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlSelect1">Jenis
                                                                    Kelamin</label>
                                                                <select name="jk" class="form-control"
                                                                    id="exampleFormControlSelect1">
                                                                    <option>---</option>
                                                                    <option value="L"
                                                                        {{ old('jk') == 'L' ? 'selected' : '' }}>
                                                                        Laki-laki</option>
                                                                    <option value="P"
                                                                        {{ old('jk') == 'P' ? 'selected' : '' }}>
                                                                        Perempuan</option>
                                                                </select>
                                                                @if ($errors->has('jk'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('jk') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div
                                                                class="form-group {{ $errors->has('agama') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlSelect1">Agama</label>
                                                                <select name="agama" class="form-control"
                                                                    id="exampleFormControlSelect2">
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
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div
                                                                class="form-group {{ $errors->has('stat_data') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlSelect1">Stat data?</label>
                                                                <select name="stat_data" class="form-control"
                                                                    id="exampleFormControlSelect2">
                                                                    <option>---</option>
                                                                    <option value="A"
                                                                        {{ old('stat_data') == 'A' ? 'selected' : '' }}>
                                                                        A</option>
                                                                    <option value="P"
                                                                        {{ old('stat_data') == 'P' ? 'selected' : '' }}>
                                                                        P</option>
                                                                    <option value="M"
                                                                        {{ old('stat_data') == 'M' ? 'selected' : '' }}>
                                                                        M</option>
                                                                </select>
                                                                @if ($errors->has('stat_data'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('stat_data') }}</span>
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
                                                    @if ($errors->has('avatar'))
                                                        <span class="help-block">{{ $errors->first('avatar') }}</span>
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
                    <button type="button" class="btn btn-default"><a href="/sekolah/{{ $data_sekolah }}/sekolahdelete"
                            sekolah-id="{{ $data_sekolah }}">Hapus</a></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <script>
        function previewImage() {
            const image = document.querySelector('#avatar');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(OFREevent) {
                imgPreview.src = OFREevent.target.result;
            }
        }
    </script>
@endsection
