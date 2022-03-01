@extends('layouts.master5')

@section('title')
  <title> AdminLTE 3 | LANGKAH STRATEGIS </title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>LANGKAH STRATEGIS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">LANGKAH STRATEGIS</li>
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
                  Tambah Langkah Strategis
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                  Data <a href="#" class="alert-link">Langkah Strategis</a> {{session('sukses')}}
                </div>
                @endif

                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>PERIODE</th>
                      <th>ASPEK</th>
                      <th>PERNYATAAN LANGKAH STRATEGIS</th>
                      <th>NOTES</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data_langkahstrategis as $langkahstrategis)
                      <tr>
                        <td>{{$langkahstrategis -> langkahstrategis_start}} - {{$langkahstrategis -> langkahstrategis_end}}</td>
                        <td>{{$langkahstrategis -> langkahstrategis_aspek}}</td>
                        <td>{{$langkahstrategis -> langkahstrategis_deskripsi}}</td>
                        <td>{{$langkahstrategis -> langkahstrategis_notes}}</td>
                        <td>
                          <a href="/langkahstrategis/{{$langkahstrategis->id}}/langkahstrategisedit" class="btn btn-warning btn-sm">Ubah
                          </a>
                          <!--a href="/langkahstrategis/{{$langkahstrategis->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')" >Hapus</a-->
                          <a href="/langkahstrategis/{{$langkahstrategis->id}}/langkahstrategisdelete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')" >Hapus</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
	                      <th>PERIODE</th>
	                      <th>ASPEK</th>
	                      <th>PERNYATAAN LANGKAH STRATEGIS</th>
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
                        <form action="/langkahstrategis/langkahstrategiscreate" method="POST" enctype="multipart/form-data">
                          {{csrf_field()}}

                          <div class="form-group {{$errors->has('langkahstrategis_start')?' has-error' : ''}}">
                          	<label for="exampleFormControlInput1">Mulai</label>
                          	<input name="langkahstrategis_start" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Kapan mulai?" value="{{old('langkahstrategis_start')}}">
                          	@if($errors->has('langkahstrategis_start'))
                          	<span class="help-block">{{$errors->first('langkahstrategis_start')}}</span>
                          	@endif
                          </div>
                          @if($errors->has('langkahstrategis_start'))
                          <span class="help-block">{{$errors->first('langkahstrategis_start')}}</span>
                          @endif

                          <div class="form-group {{$errors->has('langkahstrategis_end')?' has-error' : ''}}">
                          	<label for="exampleFormControlInput1">Berakhir</label>
                          	<input name="langkahstrategis_end" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Kapan selesai?" value="{{old('langkahstrategis_end')}}">
                          	@if($errors->has('langkahstrategis_end'))
                          	<span class="help-block">{{$errors->first('langkahstrategis_end')}}</span>
                          	@endif
                          </div>
                          @if($errors->has('langkahstrategis_end'))
                          <span class="help-block">{{$errors->first('langkahstrategis_end')}}</span>
                          @endif

                          <div class="form-group {{$errors->has('langkahstrategis_aspek')?' has-error' : ''}}">
                            <label for="exampleFormControlSelect1">ASPEK LANGKAH STRATEGIS</label>
                            <select name="langkahstrategis_aspek" class="form-control" id="exampleFormControlSelect2">
                              <option>---</option>
                              <option>Kurikulum</option>
                              <option>Pembelajaran</option>
                              <option>SDM</option>
                              <option>Sarana-Prasarana</option>
                              <option>Penilaian</option>
                              <option>Pengembangan Diri</option>
                            </select>
                            @if($errors->has('langkahstrategis_aspek'))
                            <span class="help-block">{{$errors->first('langkahstrategis_aspek')}}</span>
                            @endif
                          </div>

                          <div class="form-group {{$errors->has('langkahstrategis_deskripsi')?' has-error' : ''}}">
                           <label for="exampleFormControlTextarea1">PERNYATAAN LANGKAH STRATEGIS</label>
                           <textarea name="langkahstrategis_deskripsi" class="form-control" id="exampleFormControlTextarea1" placeholder="Pernyataan langkah strategis" value="{{old('langkahstrategis_deskripsi')}}" rows="3"></textarea>
                         </div>
                         @if($errors->has('langkahstrategis_deskripsi'))
                         <span class="help-block">{{$errors->first('langkahstrategis_deskripsi')}}</span>
                         @endif

                          <div class="form-group {{$errors->has('langkahstrategis_notes')?' has-error' : ''}}">
                           <label for="exampleFormControlTextarea1">NOTES</label>
                           <textarea name="langkahstrategis_notes" class="form-control" id="exampleFormControlTextarea1" placeholder="Catatan" value="{{old('langkahstrategis_notes')}}" rows="3"></textarea>
                         </div>
                         @if($errors->has('langkahstrategis_notes'))
                         <span class="help-block">{{$errors->first('langkahstrategis_notes')}}</span>
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

                          