@extends('layouts.master5')

@section('title')
  <title> AdminLTE 3 | KD </title>
@endsection
@section('header')
<style>
  #loader
  {
    visibility:hidden;
  }
</style>
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kompetensi Dasar (KD)</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">KD</li>
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
                <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#staticBackdrop" action="/kompetensidasar/get/{id}" method="GET">
                  Tambah KD
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                  Data <a href="#" class="alert-link">KD</a> {{session('sukses')}}
                </div>
                @endif

                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>DOMAIN</th>
                      <th>KI</th>
                      <th>LEVEL</th>
                      <th>MAPEL</th>
                      <th>KD</th>
                      <th>JUMLAH</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                	@foreach($data_ki as $kid)
                	@foreach($kid ->kompetensidasar as $kad)
                	
                	<tr>
                		<td>{{$kid -> ki_domain}}</td>
                		<td>{{$kid -> ki_deskripsi}}</td>
                		<td>{{$kid -> level}}</td>
                		<td>{{$kad -> mapel -> nama_mapel}}</td>
                		<td>{{$kad -> kompetensi_dasar}}</td>
                		<td class="text-center">{{$kid->kompetensidasar->count()}}</td>
                		<td>
                			<a href="/kompetensidasar/{{$kad->id}}/kompetensidasaredit" class="btn btn-warning btn-sm">Ubah
                			</a>
                			
                			<a href="/kompetensidasar/{{$kad->id}}/kompetensidasardelete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')" >Hapus</a>
                		</td>
                	</tr>
                	
                	@endforeach
                	@endforeach
                    </tbody>
                    <tfoot>
                      <tr>
	                      <th>DOMAIN</th>
	                      <th>KI</th>
	                      <th>LEVEL</th>
	                      <th>MAPEL</th>
	                      <th>KD</th>
	                      <th>JUMLAH</th>
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
                        <form action="/kompetensidasar/kompetensidasarcreate" method="POST" enctype="multipart/form-data">
                          {{csrf_field()}}

                         <div class="form-group {{$errors->has('kompetensi_dasar')?' has-error' : ''}}">
                          <label for="exampleFormControlSelect1">Domain</label>
                          <select name="kd_domain" class="form-control" id="exampleFormControlSelect1">
                            <option>---</option>
                            <option value="Sikap Spiritual"{{(old('kd_domain') == 'Sikap Spiritual') ? ' selected' : ''}}>Sikap Spiritual</option>
                            <option value="Sikap Sosial"{{(old('kd_domain') == 'Sikap Sosial') ? ' selected' : ''}}>Sikap Sosial</option>
                            <option value="Pengetahuan"{{(old('kd_domain') == 'Pengetahuan') ? ' selected' : ''}}>Pengetahuan</option>
                            <option value="Keterampilan"{{(old('kd_domain') == 'Keterampilan') ? ' selected' : ''}}>Keterampilan</option>
                          </select>
                          @if($errors->has('kd_domain'))
                          <span class="help-block">{{$errors->first('kd_domain')}}</span>
                          @endif
                        </div>
                        <div class="form-group {{$errors->has('kompetensi_dasar')?' has-error' : ''}}">
                        	<label for="level">Level</label>
                        	<select name="level" class="form-control" id="level">
                        		<option>---</option>
                            @foreach($data_level as $dl)
                        		<option value="$dl->id"{{old('$dl->level')}}>{{$dl->level}}</option>
                            @endforeach
                        	</select>
                        	@if($errors->has('level'))
                        	<span class="help-block">{{$errors->first('level')}}</span>
                        	@endif
                        </div>
                      <div class="row">
                        <div class="col-sm-10">
                          <div class="form-group">
                            <label for="ki_deskripsi">KI</label>
                            <select class="form-control" id="ki_deskripsi" name="ki_deskripsi">

                              <option value="">--Deskripsi KI--</option>

                            </select>
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span>
                        </div>
                      </div>
                    	<div class="form-group {{$errors->has('kompetensi_dasar')?' has-error' : ''}}">
                    		<label for="exampleFormControlTextarea1">KD SMP</label>
                    		<textarea name="kompetensi_dasar" class="form-control" id="exampleFormControlTextarea2" placeholder="Tulis Kompetensi Dasar" value="{{old('kompetensi_dasar')}}" rows="3"></textarea>
                    	</div>

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
@section('footer')
 <script src="{{ asset('/dropdown/app.js') }}"></script>
 <script src="{{ asset('/dropdown/custom.js') }}"></script> @endsection
