@extends('layouts.master5')

@section('title')
    <title> AdminLTE 3 | Penilaian </title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Penilaian</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Data Penilaian</li>
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
                            <div class="row">
                                <div class="col-sm-8">
                                    <button type="button" class="btn btn-primary float-left btn-sm" data-toggle="modal"
                                        data-target="#staticBackdrop">
                                        Tambah Data Penilaian
                                    </button>
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-primary float-left btn-sm" data-toggle="modal"
                                        data-target="#staticBackdrop">
                                        AKTIVASI USER
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
                                            <form method="post" action="/penilaian/import_excel"
                                                enctype="multipart/form-data">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
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
                                <div class="col-sm-1">
                                    <a href="/penilaian/export_excel" class="btn btn-primary float-right btn-sm"
                                        target="_blank">EXPOR EXCEL</a>
                                </div>
                                <div class="col-sm-1">
                                    <a href="/penilaian/export_pdf" class="btn btn-primary float-right btn-sm"
                                        target="_blank">EXPOR PDF</a>
                                </div>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">

                                @if (session('sukses'))
                                    <div class="alert alert-success" role="alert">
                                        Data <a href="#" class="alert-link">Penilaian</a> {{ session('sukses') }}
                                    </div>
                                @endif
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>NAMA</th>
                                            <th>KODE PENILAIAN</th>
                                            <th>SEMESTER</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_penilaian as $penilaian)
                                            <tr>
                                                <td><a
                                                        href="/penilaian/{{ $penilaian->id }}/profile">{{ $penilaian->nama_tes }}</a>
                                                </td>
                                                <td>{{ $penilaian->kode }}</td>
                                                <td>{{ $penilaian->semester }}</td>
                                                <td>
                                                    <a href="/penilaian/{{ $penilaian->id }}/penilaianedit"
                                                        class="btn btn-warning btn-sm">Ubah
                                                    </a>
                                                    <!--a href="/penilaian/{{ $penilaian->id }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')" >Hapus</a-->
                                                    <button href="/penilaian/{{ $penilaian->id }}/penilaiandelete"
                                                        type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#modal-danger">
                                                        Hapus
                                                    </button>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>NAMA</th>
                                            <th>KODE PENILAIAN</th>
                                            <th>SEMESTER</th>
                                            <th>AKSI</th>
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
                                                <form action="/penilaian/penilaiancreate" method="POST"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div
                                                                class="form-group {{ $errors->has('nama_tes') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlInput1">Nama Penilaian</label>
                                                                <input name="nama_tes" type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="Masukkan nama penilaian"
                                                                    value="{{ old('nama_tes') }}">
                                                                @if ($errors->has('nama_tes'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('nama_tes') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">KODE Penilaian</label>
                                                                <input name="kode" type="text" class="form-control"
                                                                    id="exampleFormControlInput3"
                                                                    placeholder="KODE Penilaian">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Semester</label>
                                                                <input name="semester" type="text" class="form-control"
                                                                    id="exampleFormControlInput3" placeholder="Semester">
                                                            </div>
                                                        </div>
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
                                                                <img class="img-preview img-fluid mb-3 col-sm-2" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('avatar'))
                                                        <span
                                                            class="help-block">{{ $errors->first('avatar') }}</span>
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
                    <button type="button" class="btn btn-default"><a
                            href="/penilaian/{{ $penilaian->id }}/penilaiandelete"
                            penilaian-id="{{ $penilaian->id }}">Hapus</a></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modal-dialog2">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Aktivasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin mengaktifkan user atas nama penilaian ini&hellip;?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-default"><a href="/test/{{ $penilaian->id }}/aktivasi"
                            penilaian-id="{{ $penilaian->id }}">Aktivasi</a></button>
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
