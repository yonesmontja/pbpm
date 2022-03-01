@extends('layouts.master4')

@section('title')
  <title> AdminLTE 3 | Data User </title>
@endsection

@section('content')

<div class="content-wrapper" style="min-height: 1400.83px;">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Form Data User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
  </section>
  <section class="content">
      <div class="container-fluid">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
          {{session('sukses')}}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger" role="alert">
          {{session('error')}}
        </div>
        @endif
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Data User</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="/user/{{$user->id}}/update" method="POST" enctype="multipart/form-data" role="form">
            {{csrf_field()}}
            <div class="card-body">
              <div class="form-group">
                <label for="formGroupExampleInput">Username</label>
                <input name="nama" type="text" class="form-control" id="formGroupExampleInput" placeholder="" value="{{$user->name}}" dissabled>
              </div>
              <div class="form-group {{$errors->has('email')?' has-error' : ''}}">
                <label for="formGroupExampleInput">Email</label>
                <input name="email" type="email" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Email" value="{{old('email')}}">
                @if($errors->has('email'))
                <span class="help-block">{{$errors->first('email')}}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Avatar</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="avatar" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text" id="">Upload</span>
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



@stop
@section('content1')

    <h1>Edit Data user</h1>
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
      {{session('sukses')}}
    </div>
    @endif
    <div class="row">
      <div class="col-lg-12">

      </div>
    </div>
@endsection('content1')