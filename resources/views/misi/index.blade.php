@extends('layouts.master5')

@section('title')
  <title> AdminLTE 3 | MISI </title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>MISI</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">MISI</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(session('error'))
        <div class="alert alert-danger" role="alert">
          {{session('error')}}
        </div>
        @endif
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tahun Pelajaran 2020/2021</h3>
              </div>
              <div class="col-12">
                <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                  Tambah MISI
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                  Data <a href="#" class="alert-link">misi</a> {{session('sukses')}}
                </div>
                @endif

                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>PERIODE</th>
                      <th>PERNYATAAN MISI</th>
                      <th>NOTES</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data_misi as $misi)
                      <tr>
                        <td>{{$misi -> misi_start}} - {{$misi -> misi_end}}</td>
                        <td><a href="/misi/{{$misi->id}}/misiprofile">{{$misi -> misi_deskripsi}}</a></td>
                        <td>{{$misi -> misi_notes}}</td>
                        <td>
                          <a href="/misi/{{$misi->id}}/misiedit" class="btn btn-warning btn-sm">Ubah
                          </a>
                          <!--a href="/misi/{{$misi->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')" >Hapus</a-->
                          <a href="/misi/{{$misi->id}}/misidelete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')" >Hapus</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
	                      <th>PERIODE</th>
	                      <th>PERNYATAAN MISI</th>
	                      <th>NOTES</th>
	                      <th></th>
                      </tr>
                    </tfoot>
                  </table>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Form Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <!-- form isian data -->
                        <form action="/misi/misicreate" method="POST" enctype="multipart/form-data">
                          {{csrf_field()}}

                          <div class="form-group {{$errors->has('misi_start')?' has-error' : ''}}">
                          	<label for="exampleFormControlInput1">Mulai</label>
                          	<input name="misi_start" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Kapan mulai?" value="{{old('misi_start')}}">
                          	@if($errors->has('misi_start'))
                          	<span class="help-block">{{$errors->first('misi_start')}}</span>
                          	@endif
                          </div>
                          @if($errors->has('misi_start'))
                          <span class="help-block">{{$errors->first('misi_start')}}</span>
                          @endif

                          <div class="form-group {{$errors->has('misi_end')?' has-error' : ''}}">
                          	<label for="exampleFormControlInput1">Berakhir</label>
                          	<input name="misi_end" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Kapan selesai?" value="{{old('misi_end')}}">
                          	@if($errors->has('misi_end'))
                          	<span class="help-block">{{$errors->first('misi_end')}}</span>
                          	@endif
                          </div>
                          @if($errors->has('misi_end'))
                          <span class="help-block">{{$errors->first('misi_end')}}</span>
                          @endif

                          <div class="form-group {{$errors->has('misi_deskripsi')?' has-error' : ''}}">
                           <label for="exampleFormControlTextarea1">PERNYATAAN MISI</label>
                           <textarea name="misi_deskripsi" class="form-control" id="exampleFormControlTextarea1" placeholder="Pernyataan Misi" value="{{old('misi_deskripsi')}}" rows="3"></textarea>
                         </div>
                         @if($errors->has('misi_deskripsi'))
                         <span class="help-block">{{$errors->first('misi_deskripsi')}}</span>
                         @endif

                          <div class="form-group {{$errors->has('misi_notes')?' has-error' : ''}}">
                           <label for="exampleFormControlTextarea1">NOTES</label>
                           <textarea name="misi_notes" class="form-control" id="exampleFormControlTextarea1" placeholder="Catatan" value="{{old('misi_notes')}}" rows="3"></textarea>
                         </div>
                         @if($errors->has('misi_notes'))
                         <span class="help-block">{{$errors->first('misi_notes')}}</span>
                         @endif


                        <!-- akhir form isian data -->
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
                SMP Persiapan Negeri 3 Agats
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

                          