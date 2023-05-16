@extends('layouts.master4')

@section('title')
    <title> SD Dabolding Data Guru </title>
@endsection

@section('content')

    <div class="content-wrapper" style="min-height: 1400.83px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Form Data Guru</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Form Data Guru</li>
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
                        <h3 class="card-title">Data Guru</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/guru/{{ $guru->id }}/guruupdate" method="POST" enctype="multipart/form-data"
                        role="form">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Kode</label>
                                <input name="kode_guru" type="text" class="form-control" id="formGroupExampleInput"
                                    placeholder="Masukkan kode" value="{{ $guru->kode_guru }}">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nama</label>
                                <input name="nama_guru" type="text" class="form-control" id="formGroupExampleInput"
                                    placeholder="Masukkan nama guru" value="{{ $guru->nama_guru }}">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Email</label>
                                <input name="email" type="text" class="form-control" id="formGroupExampleInput"
                                    placeholder="Masukkan email" value="{{ $guru->email }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alamat</label>
                                <input name="alamat" type="text" class="form-control" id="formGroupExampleInput"
                                    placeholder="Masukkan alamat" value="{{ $guru->alamat }}">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Telpon</label>
                                <input name="telpon" type="text" class="form-control" id="formGroupExampleInput"
                                    placeholder="Masukkan nomor telpon" value="{{ $guru->telpon }}">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Kode User</label>
                                <input name="user_id" type="text" class="form-control" id="formGroupExampleInput"
                                    placeholder="Masukkan nomor user_id" value="{{ $guru->user_id }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mengajar BK?</label>
                                <select name="is_bk" class="form-control" id="exampleFormControlSelect1">
                                    <option value="1" @if ($guru->is_bk == '1') selected @endif>Tidak
                                    </option>
                                    <option value="2" @if ($guru->is_bk == '2') selected @endif>Ya
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status?</label>
                                <select name="status" class="form-control" id="exampleFormControlSelect1">
                                    <option value="0" @if ($guru->status == '0') selected @endif>Non aktif
                                    </option>
                                    <option value="1" @if ($guru->status == '1') selected @endif>Aktif
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <select name="jk" class="form-control" id="exampleFormControlSelect1">
                                    <option value="L" @if ($guru->jk == 'L') selected @endif>Laki-laki
                                    </option>
                                    <option value="P" @if ($guru->jk == 'P') selected @endif>Perempuan
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Stat Data?</label>
                                <select name="stat_data" class="form-control" id="exampleFormControlSelect1">
                                    <option value="A" @if ($guru->stat_data == 'A') selected @endif>A
                                    </option>
                                    <option value="P" @if ($guru->stat_data == 'P') selected @endif>P
                                    </option>
                                    <option value="M" @if ($guru->stat_data == 'M') selected @endif>M
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Agama</label>
                                <select name="agama" class="form-control" id="exampleFormControlSelect1">
                                    <option value"{{ $guru->agama }}
                                    <option value="Islam" @if ($guru->agama == 'Islam') selected @endif>Islam
                                    </option>
                                    <option value="Kristen Protestan" @if ($guru->agama == 'Kristen Protestan') selected @endif>
                                        Kristen Protestan
                                    </option>
                                    <option value="Kristen Katolik" @if ($guru->agama == 'Kristen Katolik') selected @endif>
                                        Kristen Katolik</option>
                                    <option value="Kristen Katolik" @if ($guru->agama == 'Kristen Katolik') selected @endif>
                                        Kristen Katolik
                                    </option>
                                    <option value="Hindu" @if ($guru->agama == 'Hindu') selected @endif>Hindu
                                    </option>
                                    <option value="Konghucu" @if ($guru->agama == 'Konghucu') selected @endif>Konghucu
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="avatar" class="form-label">Avatar</label>
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

    <h1>Edit Data guru</h1>
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
