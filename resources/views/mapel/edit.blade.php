@extends('layouts.master4')

@section('title')
    <title> SD Dabolding Data Mapel </title>
@endsection

@section('content')

    <div class="content-wrapper" style="min-height: 1400.83px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Form Data Mapel</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Form Data Mapel</li>
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
                        <h3 class="card-title">Data Mapel</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('mapel.update', $mapel) }}" method="POST" enctype="multipart/form-data"
                        role="form">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Kode</label>
                                <input name="kode" type="text" class="form-control" id="formGroupExampleInput"
                                    placeholder="Masukkan kode" value="{{ $mapel->kode }}">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Mapel</label>
                                <input name="nama_mapel" type="text" class="form-control" id="formGroupExampleInput"
                                    placeholder="Masukkan nama matpel" value="{{ $mapel->nama_mapel }}">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Semester</label>
                                <input name="semester" type="text" class="form-control" id="formGroupExampleInput"
                                    placeholder="Masukkan semester" value="{{ $mapel->semester }}">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Deskripsi</label>
                                <input name="kd_singkat" type="text" class="form-control" id="formGroupExampleInput"
                                    placeholder="Masukkan kd singkat" value="{{ $mapel->kd_singkat }}">
                            </div>
                            <div class="form-group {{ $errors->has('guru_id') ? ' has-error' : '' }}">
                                <label for="guru_id">Guru</label>
                                <div class="col-md-6">
                                    <select name="guru_id" id="guru_id" class="form-control">
                                        <option value="{{ $mapel->guru->id }}">{{ $mapel->guru->nama_guru }}</option>
                                        @foreach ($gurus as $guru)
                                            <option value="{{ $guru->id }}">
                                                {{ $guru->nama_guru }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pilih Kelompok Mapel</label>
                                <select name="kelompok" class="form-control" id="exampleFormControlSelect1">
                                    <option value="A" @if ($mapel->kelompok == 'A') selected @endif>Kelompok A
                                    </option>
                                    <option value="B" @if ($mapel->kelompok == 'B') selected @endif>Kelompok B
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Apakah ada penilaian sikap?</label>
                                <select name="is_sikap" class="form-control" id="exampleFormControlSelect1">
                                    <option value="0" @if ($mapel->is_sikap == '0') selected @endif>Tidak
                                    </option>
                                    <option value="1" @if ($mapel->is_sikap == '1') selected @endif>Ya
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Pilih Sub-Mapel</label>
                                <select name="tambahan_sub" class="form-control" id="exampleFormControlSelect1">
                                    <option value="KEIMANAN" @if ($mapel->tambahan_sub == 'KEIMANAN') selected @endif>KEIMANAN
                                    </option>
                                    <option value="NO" @if ($mapel->tambahan_sub == 'NO') selected @endif>NO
                                    </option>
                                    <option value="MULOK" @if ($mapel->tambahan_sub == 'MULOK') selected @endif>
                                        MULOK</option>
                                    <option value="KATOLIK" @if ($mapel->tambahan_sub == 'KATOLIK') selected @endif>KATOLIK
                                    </option>
                                    <option value="PROTESTAN" @if ($mapel->tambahan_sub == 'PROTESTAN') selected @endif>PROTESTAN
                                    </option>
                                    <option value="ISLAM" @if ($mapel->tambahan_sub == 'ISLAM') selected @endif>ISLAM
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

    <h1>Edit Data mapel</h1>
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
