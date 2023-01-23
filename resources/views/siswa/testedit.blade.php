@extends('layouts.master4')

@section('title')
    <title> SD Dabolding Data Siswa </title>
@endsection

@section('content')

    <div class="content-wrapper" style="min-height: 1400.83px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Form Data Siswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Form Data Siswa</li>
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
                        <h3 class="card-title">Data Siswa</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/test/{{ $siswa->id }}/update" method="POST" enctype="multipart/form-data" role="form">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Nama Depan</label>
                                        <input name="nama_depan" type="text" class="form-control"
                                            id="formGroupExampleInput" placeholder="Masukkan Nama Depan"
                                            value="{{ $siswa->nama_depan }}">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Nama Belakang</label>
                                        <input name="nama_belakang" type="text" class="form-control"
                                            id="formGroupExampleInput" placeholder="Masukkan Nama Belakang"
                                            value="{{ $siswa->nama_belakang }}">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="formGroupExampleInput">Email</label>
                                        <input name="email" type="email" class="form-control" id="formGroupExampleInput"
                                            placeholder="Masukkan Email" value="{{ $siswa->email }}">
                                        @if ($errors->has('email'))
                                            <span class="help-block">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">KELAS</label>
                                        <select name="kelas_id" class="form-control" id="exampleFormControlSelect2">
                                            <option value="1" @if ($siswa->kelas_id == 1) selected @endif>
                                                Kelas 1
                                            </option>
                                            <option value="2" @if ($siswa->kelas_id == 2) selected @endif>
                                                Kelas 2
                                            </option>
                                            <option value="3" @if ($siswa->kelas_id == 3) selected @endif>
                                                Kelas 3
                                            </option>
                                            <option value="4" @if ($siswa->kelas_id == 4) selected @endif>
                                                Kelas 4
                                            </option>
                                            <option value="5" @if ($siswa->kelas_id == 5) selected @endif>
                                                Kelas 5
                                            </option>
                                            <option value="6" @if ($siswa->kelas_id == 6) selected @endif>
                                                Kelas 6
                                            </option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pilih Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                            <option value="Laki-laki" @if ($siswa->jenis_kelamin == 'Laki-laki') selected @endif>
                                                Laki-laki
                                            </option>
                                            <option value="Perempuan" @if ($siswa->jenis_kelamin == 'Perempuan') selected @endif>
                                                Perempuan
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pilih Agama</label>
                                        <select name="agama" class="form-control" id="exampleFormControlSelect1">
                                            <option value="islam" @if ($siswa->agama == 'islam') selected @endif>Islam
                                            </option>
                                            <option value="katolik" @if ($siswa->agama == 'katolik') selected @endif>
                                                Katolik
                                            </option>
                                            <option value="kristen protestan"
                                                @if ($siswa->agama == 'kristen protestan') selected @endif>
                                                Kristen Protestan</option>
                                            <option value="budha" @if ($siswa->agama == 'budha') selected @endif>Budha
                                            </option>
                                            <option value="hindu" @if ($siswa->agama == 'hindu') selected @endif>Hindu
                                            </option>
                                            <option value="konghucu" @if ($siswa->agama == 'konghucu') selected @endif>
                                                Konghucu
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">

                                </div>
                                <div class="col-sm-3">

                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Alamat</label>
                                        <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1"
                                            rows="3">{{ $siswa->alamat }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="avatar" class="form-label">Foto Siswa</label>
                                <div class="input-group">
                                    <div class="custom-file">

                                        <input class="form-control" type="file" name="avatar" class="custom-file-input"
                                            id="avatar" onchange="previewImage()">
                                        <label class="custom-file-label" for="avatar">Choose file</label>
                                    </div>
                                    <div>
                                        <img class="img-preview img-fluid mb-3 col-sm-2" alt="">
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


@stop
@section('content1')

    <h1>Edit Data Siswa</h1>
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
