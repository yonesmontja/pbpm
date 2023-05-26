@extends('layouts.master4')

@section('title')
    <title> SD Dabolding NILAI </title>
@endsection

@section('content')

    <div class="content-wrapper" style="min-height: 1400.83px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Form Data Nilai</h1>
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
                        <h3 class="card-title">NILAI</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/nilai/{{ $nilai->id }}/nilaiupdate" method="POST" enctype="multipart/form-data"
                        role="form">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group {{ $errors->has('nilai_start') ? ' has-error' : '' }}">
                                        <label for="exampleFormControlInput1">Mulai</label>
                                        <input name="nilai_start" type="text" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Kapan mulai?"
                                            value="{{ $nilai->nilai_start }}">
                                        @if ($errors->has('nilai_start'))
                                            <span class="help-block">{{ $errors->first('nilai_start') }}</span>
                                        @endif
                                    </div>
                                    @if ($errors->has('nilai_start'))
                                        <span class="help-block">{{ $errors->first('nilai_start') }}</span>
                                    @endif
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group {{ $errors->has('nilai_end') ? ' has-error' : '' }}">
                                        <label for="exampleFormControlInput1">Berakhir</label>
                                        <input name="nilai_end" type="text" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Kapan selesai?"
                                            value="{{ $nilai->nilai_end }}">
                                        @if ($errors->has('nilai_end'))
                                            <span class="help-block">{{ $errors->first('nilai_end') }}</span>
                                        @endif
                                    </div>
                                    @if ($errors->has('nilai_end'))
                                        <span class="help-block">{{ $errors->first('nilai_end') }}</span>
                                    @endif
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">PENILAIAN</label>
                                        <select name="penilaian_id" class="form-control" id="exampleFormControlSelect2">
                                            <option value="{{ $nilai->penilaian_id }}">{{ $penilaian[0] }}</option>
                                            @foreach ($penilaian as $key => $m)
                                                <option value="{{ $m->id }}">
                                                    {{ $m->nama_tes }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group {{ $errors->has('tahunpel_id') ? ' has-error' : '' }}">
                                        <label for="exampleFormControlSelect1">THN PELAJARAN</label>
                                        <select name="tahunpel_id" class="form-control" id="exampleFormControlSelect2">
                                            @if ($nilai->tahunpel_id)
                                                <option value="{{ $nilai->tahunpel_id }}">{{ $tahunpel1[0] }}</option>
                                            @else
                                                <option>---</option>
                                            @endif
                                            @foreach ($tahunpel as $key => $m)
                                                <option value="{{ $m->id }}">
                                                    {{ $m->thn_pel }} - {{ $m->semester }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">KELAS</label>
                                        <select name="kelas_id" class="form-control" id="kelas">
                                            <option value="{{ $nilai->kelas_id }}">{{ $kelas[0] }} </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">ROMBEL</label>
                                        <select name="rombel_id" class="form-control" id="rombel">
                                            <option value="{{ $nilai->rombel_id }}">{{ $nilai->rombel->rombel }} </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">SISWA</label>
                                        <select name="siswa_id" class="form-control" id="siswa">
                                            <option value="{{ $nilai->siswa_id }}">{{ $siswa1[0] }}
                                                {{ $siswa2[0] }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">KInti</label>
                                        <select name="kompetensi_inti_id" class="form-control" id="kompetensi_inti_id">
                                            <option value="{{ $nilai->kompetensi_inti_id }}">
                                                {{ $nilai->kompetensiinti->kompetensi_inti }}</option>
                                            @foreach ($kompetensiinti as $key => $m)
                                                <option value="{{ $m->id }}">
                                                    {{ $m->kompetensi_inti }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">GURU</label>
                                        <select name="guru_id" class="form-control" id="exampleFormControlSelect2">
                                            <option value="{{ $nilai->guru_id }}">{{ $guru1[0] }}</option>
                                            @foreach ($guru as $key => $m)
                                                <option value="{{ $m->id }}">
                                                    {{ $m->nama_guru }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">MAPEL</label>
                                        <select name="mapel_id" class="form-control" id="exampleFormControlSelect2">
                                            <option value="1" @if ($nilai->mapel_id == 1) selected @endif>
                                                Agama Islam
                                            </option>
                                            <option value="2" @if ($nilai->mapel_id == 2) selected @endif>
                                                Agama Protestan
                                            </option>
                                            <option value="3" @if ($nilai->mapel_id == 3) selected @endif>
                                                Agama Katolik
                                            </option>
                                            <option value="3" @if ($nilai->mapel_id == 4) selected @endif>
                                                PPKn
                                            </option>
                                            <option value="5" @if ($nilai->mapel_id == 5) selected @endif>
                                                B. Indonesia
                                            </option>
                                            <option value="6" @if ($nilai->mapel_id == 6) selected @endif>
                                                Matematika
                                            </option>
                                            <option value="7" @if ($nilai->mapel_id == 7) selected @endif>
                                                IPA
                                            </option>
                                            <option value="8" @if ($nilai->mapel_id == 8) selected @endif>
                                                IPS
                                            </option>
                                            <option value="9" @if ($nilai->mapel_id == 9) selected @endif>
                                                PJOK
                                            </option>
                                            <option value="10" @if ($nilai->mapel_id == 10) selected @endif>
                                                SBK
                                            </option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group {{ $errors->has('nilai') ? ' has-error' : '' }}">
                                        <label for="exampleFormControlInput1">Nilai</label>
                                        <input name="nilai" type="text" class="form-control"
                                            id="exampleFormControlInput1" placeholder="Nilai"
                                            value="{{ $nilai->nilai }}">
                                        @if ($errors->has('nilai'))
                                            <span class="help-block">{{ $errors->first('nilai') }}</span>
                                        @endif
                                    </div>
                                    @if ($errors->has('nilai'))
                                        <span class="help-block">{{ $errors->first('nilai') }}</span>
                                    @endif
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group {{ $errors->has('tanggal') ? ' has-error' : '' }}">
                                        <label for="exampleFormControlInput1">Tanggal</label>
                                        <input name="tanggal" type="text" class="form-control"
                                            id="exampleFormControlInput1" placeholder="tanggal"
                                            value="{{ $nilai->tanggal }}">
                                        @if ($errors->has('tanggal'))
                                            <span class="help-block">{{ $errors->first('tanggal') }}</span>
                                        @endif
                                    </div>
                                    @if ($errors->has('tanggal'))
                                        <span class="help-block">{{ $errors->first('tanggal') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('nilai_deskripsi') ? ' has-error' : '' }}">
                                <label for="exampleFormControlTextarea1">Materi</label>
                                <textarea name="nilai_deskripsi" class="form-control" id="exampleFormControlTextarea1"
                                    placeholder="{{ $nilai->nilai_deskripsi }}" value="{{ $nilai->nilai_deskripsi }}" rows="3">{{ $nilai->nilai_deskripsi }}</textarea>
                            </div>
                            @if ($errors->has('nilai_deskripsi'))
                                <span class="help-block">{{ $errors->first('nilai_deskripsi') }}</span>
                            @endif
                            <div class="form-group {{ $errors->has('nilai_notes') ? ' has-error' : '' }}">
                                <label for="exampleFormControlTextarea1">Indikator Capaian</label>
                                <textarea name="nilai_notes" class="form-control" id="exampleFormControlTextarea1"
                                    placeholder="{{ $nilai->nilai_notes }}" value="{{ $nilai->nilai_notes }}" rows="3">{{ $nilai->nilai_notes }}</textarea>
                            </div>
                            @if ($errors->has('nilai_notes'))
                                <span class="help-block">{{ $errors->first('nilai_notes') }}</span>
                            @endif
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
@stop
@section('content1')

    <h1>Edit Data nilai</h1>
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
