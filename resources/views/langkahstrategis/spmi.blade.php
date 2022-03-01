@extends('layouts.master5')

@section('title')
<title> AdminLTE 3 | SPMI </title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>SPMI</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
						<li class="breadcrumb-item active">SPMI</li>
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
								Tambah SPMI
							</button>
						</div>
						<!-- /.card-header -->
						<div class="card-body">

							@if(session('sukses'))
							<div class="alert alert-success" role="alert">
								Data <a href="#" class="alert-link">SPMI</a> {{session('sukses')}}
							</div>
							@endif

							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>TAHUN PELAJARAN</th>
										<th>TAHAPAN</th>
										<th>KEGIATAN</th>
										<th>OUTPUT</th>
										<th>PIHAK YG TERLIBAT</th>
										<th>CATATAN</th>
										<th>WAKTU</th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($data_spmi as $spmi)
									<tr>
										<td>{{$spmi -> spmi_start}} - {{$spmi -> spmi_end}}</td>
										<td>{{$spmi -> tahapan}}</td>
										<td>{{$spmi -> kegiatan}}</td>
										<td>{{$spmi -> output}}</td>
										<td>{{$spmi -> pihak_terlibat}}</td>
										<td>{{$spmi -> catatan}}</td>
										<td>{{$spmi -> waktu}}</td>
										<td>
											<a href="/spmi/{{$spmi->id}}/spmiedit" class="btn btn-warning btn-sm">Ubah
											</a>
										</td>
										<td>
											<a href="/spmi/{{$spmi->id}}/spmidelete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')" >Hapus</a>
										</td>
									</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<th>TAHUN PELAJARAN</th>
										<th>TAHAPAN</th>
										<th>KEGIATAN</th>
										<th>OUTPUT</th>
										<th>PIHAK YG TERLIBAT</th>
										<th>CATATAN</th>
										<th>WAKTU</th>
										<th></th>
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
											<form action="/spmi/spmicreate" method="POST" enctype="multipart/form-data">
												{{csrf_field()}}

												<div class="form-group {{$errors->has('spmi_start')?' has-error' : ''}}">
													<label for="exampleFormControlInput1">Mulai</label>
													<input name="spmi_start" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Kapan mulai?" value="{{old('spmi_start')}}">
													@if($errors->has('spmi_start'))
													<span class="help-block">{{$errors->first('spmi_start')}}</span>
													@endif
												</div>
												@if($errors->has('spmi_start'))
												<span class="help-block">{{$errors->first('spmi_start')}}</span>
												@endif

												<div class="form-group {{$errors->has('spmi_end')?' has-error' : ''}}">
													<label for="exampleFormControlInput1">Berakhir</label>
													<input name="spmi_end" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Kapan selesai?" value="{{old('spmi_end')}}">
													@if($errors->has('spmi_end'))
													<span class="help-block">{{$errors->first('spmi_end')}}</span>
													@endif
												</div>
												@if($errors->has('spmi_end'))
												<span class="help-block">{{$errors->first('spmi_end')}}</span>
												@endif

												<div class="form-group {{$errors->has('waktu')?' has-error' : ''}}">
													<label for="exampleFormControlInput1">Waktu</label>
													<input name="waktu" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Waktu" value="{{old('waktu')}}">
													@if($errors->has('waktu'))
													<span class="help-block">{{$errors->first('waktu')}}</span>
													@endif
												</div>
												@if($errors->has('waktu'))
												<span class="help-block">{{$errors->first('waktu')}}</span>
												@endif

												<div class="form-group {{$errors->has('tahapan')?' has-error' : ''}}">
													<label for="exampleFormControlTextarea1">TAHAPAN</label>
													<textarea name="tahapan" class="form-control" id="exampleFormControlTextarea1" placeholder="tahapan" value="{{old('tahapan')}}" rows="3"></textarea>
												</div>
												@if($errors->has('tahapan'))
												<span class="help-block">{{$errors->first('tahapan')}}</span>
												@endif

												<div class="form-group {{$errors->has('kegiatan')?' has-error' : ''}}">
													<label for="exampleFormControlTextarea1">KEGIATAN</label>
													<textarea name="kegiatan" class="form-control" id="exampleFormControlTextarea1" placeholder="Kegiatan" value="{{old('kegiatan')}}" rows="3"></textarea>
												</div>
												@if($errors->has('kegiatan'))
												<span class="help-block">{{$errors->first('kegiatan')}}</span>
												@endif

												<div class="form-group {{$errors->has('output')?' has-error' : ''}}">
													<label for="exampleFormControlTextarea1">OUTPUT</label>
													<textarea name="output" class="form-control" id="exampleFormControlTextarea1" placeholder="output" value="{{old('output')}}" rows="3"></textarea>
												</div>
												@if($errors->has('output'))
												<span class="help-block">{{$errors->first('output')}}</span>
												@endif


												<div class="form-group {{$errors->has('catatan')?' has-error' : ''}}">
													<label for="exampleFormControlTextarea1">CATATAN</label>
													<textarea name="catatan" class="form-control" id="exampleFormControlTextarea1" placeholder="Catatan" value="{{old('catatan')}}" rows="3"></textarea>
												</div>
												@if($errors->has('catatan'))
												<span class="help-block">{{$errors->first('catatan')}}</span>
												@endif

												<div class="form-group {{$errors->has('pihak_terlibat')?' has-error' : ''}}">
													<label for="exampleFormControlTextarea1">PIHAK yg TERLIBAT</label>
													<textarea name="pihak_terlibat" class="form-control" id="exampleFormControlTextarea1" placeholder="pihak_terlibat" value="{{old('pihak_terlibat')}}" rows="3"></textarea>
												</div>
												@if($errors->has('pihak_terlibat'))
												<span class="help-block">{{$errors->first('pihak_terlibat')}}</span>
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

