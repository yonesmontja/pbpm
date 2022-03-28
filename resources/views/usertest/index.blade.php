@extends('layouts.master5')

@section('title')
    <title> AdminLTE 3 | Test </title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data usertest</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Data usertest</li>
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
                            <div class="col">
                                <input class="form-control" type="text" name="q" value="{{ $q }}"
                                    placeholder="Search here..." />
                            </div>
                            <div class="col">
                                <button class="btn btn-success">Refresh</button>
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
                                            <th>NAMA USER</th>
                                            <th>EMAIL</th>
                                            <th>ROLE</th>
                                            <th>AVATAR</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usertests as $usertest)
                                            <tr>
                                                @if (auth()->user()->role == 'admin')
                                                    <td><a
                                                            href="/usertest/{{ $usertest->id }}">{{ $usertest->name }}</a>
                                                    </td>
                                                    <td>{{ $usertest->email }}</td>
                                                    <td>{{ $usertest->role }}</td>
                                                    <td>
                                                        <img src="{{ $usertest->avatar() }}" height="75" />
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-info"
                                                            href="{{ route('usertest.show', $usertest) }}">Show</a>
                                                        <a class="btn btn-sm btn-warning"
                                                            href="{{ route('usertest.edit', $usertest) }}">Edit</a>
                                                        </a>
                                                        <form method="post"
                                                            action="{{ route('usertest.destroy', $usertest->id) }}"
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
                                            <th>NAMA USER</th>
                                            <th>EMAIL</th>
                                            <th>ROLE</th>
                                            <th>AVATAR</th>
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
                                                <form action="{{ route('usertest.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div
                                                                class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                                <label for="exampleFormControlInput1">Nama User</label>
                                                                <input name="name" type="text" class="form-control"
                                                                    id="exampleFormControlInput1"
                                                                    placeholder="Masukkan nama user"
                                                                    value="{{ old('name') }}">
                                                                @if ($errors->has('name'))
                                                                    <span
                                                                        class="help-block">{{ $errors->first('name') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
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
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Role</label>
                                                                <input name="role" type="text" class="form-control"
                                                                    id="exampleFormControlInput3" placeholder="Role">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Avatar <span class="text-danger">*</span></label>
                                                        <div class="mb-3">

                                                            <input class="form-control" type="file" name="avatar" />
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
                            href="{{ route('usertest.destroy', $usertest) }}">Hapus</a></button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
