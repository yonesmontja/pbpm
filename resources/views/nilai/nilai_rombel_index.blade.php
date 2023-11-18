@extends('layouts.master5')

@section('title')
    <title> SD Dabolding NILAI </title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DATA NILAI SISWA</h1>
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


                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (session('sukses'))
                                    <div class="alert alert-success" role="alert">
                                        Data <a href="#" class="alert-link">Nilai</a> {{ session('sukses') }}
                                    </div>
                                @endif
                                <form method="GET" action="/nilai_rombel">
                                    <select name="rombel">
                                        <option value="">Pilih Rombel</option>
                                        @foreach ($rombel as $nilai)
                                            <option value="{{ $nilai->id }}">{{ $nilai->rombel }}</option>
                                        @endforeach

                                        <!-- Tambahkan opsi rombel lain di sini -->
                                    </select>
                                    <button type="submit">Tampilkan</button>
                                </form>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>KI</th>
                                            <th>MAPEL</th>
                                            <th>GURU</th>
                                            <th>PENILAIAN</th>
                                            <th>ROMBEL</th>
                                            <th>TANGGAL</th>
                                            <th>SISWA</th>
                                            <th>NILAI</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_nilai as $nilai)
                                        @if ($rombelTerpilih == $nilai->rombel->id)
                                            <tr>
                                                <td>{{ $nilai->kompetensiinti->kompetensi_inti }}</td>
                                                <td><a href="/mapel/{{ $nilai->mapel->id }}">{{ $nilai->mapel->nama_mapel }}
                                                </td>
                                                <td><a
                                                        href="/guru/{{ $nilai->guru->id }}/profile">{{ $nilai->guru->nama_guru }}</a>
                                                </td>
                                                <td><a href="/penilaian/{{ $nilai->penilaian->id }}/profile">{{ $nilai->penilaian->nama_tes }}
                                                </td>
                                                <td><a href="#">{{ $nilai->rombel->rombel }}</a>
                                                </td>

                                                <td><a
                                                        href="/kelas/{{ $nilai->kelas->id }}/profile">{{ $nilai->tanggal }}</a>
                                                </td>

                                                <td><a href="#">{{ $nilai->siswa->nama_depan }}
                                                        {{ $nilai->siswa->nama_belakang }}</a>
                                                </td>

                                                <td>{{ $nilai->nilai }}</td>
                                                <td>
                                                    <a href="/nilai/{{ $nilai->id }}/nilaiedit"
                                                        class="btn btn-warning btn-sm">Ubah
                                                    </a>
                                                    <!--a href="/nilai/{{ $nilai->id }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')" >Hapus</a-->
                                                    <a href="/nilai/{{ $nilai->id }}/nilaidelete"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin mau dihapus?')">Hapus</a>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>KI</th>
                                            <th>MAPEL</th>
                                            <th>GURU</th>
                                            <th>PENILAIAN</th>
                                            <th>ROMBEL</th>
                                            <th>TANGGAL</th>
                                            <th>SISWA</th>
                                            <th>NILAI</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>

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
