@extends('layouts.master4')

@section('title')
    <title> AdminLTE 3 | Data Sekolah </title>
@endsection

@section('content')

    <div class="content-wrapper" style="min-height: 1400.83px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Form Data Sekolah</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Form Data Sekolah</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                @if (session('sukses'))
                    <div class="alert alert-success" role="alert">
                        {{ session('sukses') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Sekolah</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/sekolah/{{ $sekolah->id }}/sekolahupdate" method="POST" enctype="multipart/form-data"
                        role="form">
                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Nama Sekolah</label>
                                        <input name="nama" type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Masukkan kode" value="{{ $sekolah->nama }}">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">NPSN</label>
                                        <input name="npsn" type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Masukkan nama sekolah" value="{{ $sekolah->npsn }}">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">NSS</label>
                                        <input name="nss" type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Masukkan nomor nss" value="{{ $sekolah->nss }}">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Alamat</label>
                                        <input name="alamat" type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Masukkan alamat" value="{{ $sekolah->alamat }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Kode Pos</label>
                                        <input name="kode_pos" type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Masukkan kode_pos" value="{{ $sekolah->kode_pos }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">No. Telp</label>
                                        <input name="no_telp" type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Masukkan no_telp" value="{{ $sekolah->no_telp }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Kelurahan</label>
                                        <input name="kelurahan" type="text" class="form-control"
                                            id="formGroupExampleInput" placeholder="Masukkan nomor kelurahan"
                                            value="{{ $sekolah->kelurahan }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Kecamatan</label>
                                        <input name="kecamatan" type="text" class="form-control"
                                            id="formGroupExampleInput" placeholder="Masukkan nomor kecamatan"
                                            value="{{ $sekolah->kecamatan }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Kabupaten</label>
                                        <input name="kota" type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Masukkan nomor kota" value="{{ $sekolah->kota }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Provinsi</label>
                                        <input name="provinsi" type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Masukkan nomor provinsi" value="{{ $sekolah->provinsi }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">E-mail</label>
                                        <input name="email" type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Masukkan nomor email" value="{{ $sekolah->email }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Website</label>
                                        <input name="website" type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Masukkan nomor website" value="{{ $sekolah->website }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Kepala Sekolah</label>
                                        <input name="kepsek" type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Masukkan nomor kepsek" value="{{ $sekolah->kepsek }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">NIP Kepsek</label>
                                        <input name="nip_kepsek" type="text" class="form-control"
                                            id="formGroupExampleInput" placeholder="Masukkan nomor nip_kepsek"
                                            value="{{ $sekolah->nip_kepsek }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Kepala Sekolah</label>
                                        <input name="kepsek" type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Masukkan nomor kepsek" value="{{ $sekolah->kepsek }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="logo" class="form-label">Logo Sekolah</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input class="form-control" type="file" name="logo"
                                                    class="custom-file-input" id="logo" onchange="previewImage()">
                                                <label class="custom-file-label" for="logo">Choose file</label>
                                            </div>
                                            <div>
                                                <img class="img-preview img-fluid mb-3 col-sm-2" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="kop_1" class="form-label">Kop 1</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input class="form-control" type="file" name="kop_1"
                                                    class="custom-file-input" id="kop_1" onchange="previewImage1()">
                                                <label class="custom-file-label" for="kop_1">Choose file</label>
                                            </div>
                                            <div>
                                                <img class="img-preview img-fluid mb-3 col-sm-2" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="kop_2" class="form-label">Kop 2</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input class="form-control" type="file" name="kop_2"
                                                    class="custom-file-input" id="kop_2" onchange="previewImage2()">
                                                <label class="custom-file-label" for="kop_2">Choose file</label>
                                            </div>
                                            <div>
                                                <img class="img-preview img-fluid mb-3 col-sm-2" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <script>
        function previewImage() {
            const image = document.querySelector('#logo');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(OFREevent) {
                imgPreview.src = OFREevent.target.result;
            }
        }
    </script>
    <script>
        function previewImage1() {
            const image = document.querySelector('#kop_1');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(OFREevent) {
                imgPreview.src = OFREevent.target.result;
            }
        }
    </script>
    <script>
        function previewImage2() {
            const image = document.querySelector('#kop_2');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(OFREevent) {
                imgPreview.src = OFREevent.target.result;
            }
        }
    </script>
@stop
@section('content1')

    <h1>Edit Data sekolah</h1>
    @if (session('sukses'))
        <div class="alert alert-success" role="alert">
            {{ session('sukses') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">

        </div>
    </div>
@endsection('content1')
