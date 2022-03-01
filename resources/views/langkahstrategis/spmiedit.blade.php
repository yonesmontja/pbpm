@extends('layouts.master4')

@section('title')
<title> AdminLTE 3 | SPMI </title>
@endsection

@section('content')

<div class="content-wrapper" style="min-height: 1400.83px;">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Form Data SPMI</h1>
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
					<h3 class="card-title">SPMI</h3>
				</div>
				<!-- /.card-header -->
				<!-- form start -->
				<form action="/spmi/{{$spmi->id}}/spmiupdate" method="POST" enctype="multipart/form-data" role="form">
					{{csrf_field()}}
					<div class="card-body">
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label for="formGroupExampleInput1">Mulai tahun ajaran?</label>
									<input name="spmi_start" type="text" class="form-control" id="formGroupExampleInput1" placeholder="Kapan mulai?" value="{{$spmi->spmi_start}}">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="formGroupExampleInput2">Akhir tahun ajaran?</label>
									<input name="spmi_end" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Kapan selesai?" value="{{$spmi->spmi_end}}">
								</div>            			
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label for="formGroupExampleInput3">Waktu Pelaksanaan</label>
									<input name="waktu" type="text" class="form-control" id="formGroupExampleInput3" placeholder="Waktu pelaksanaan?" value="{{$spmi->waktu}}">
								</div>            			
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Tahapan</label>
										<textarea name="tahapan" class="form-control" id="exampleFormControlTextarea1" rows="5" >{{$spmi->tahapan}}</textarea>
									</div>
								</div>           			
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Kegiatan</label>
										<textarea name="kegiatan" class="form-control" id="exampleFormControlTextarea1" rows="5" >{{$spmi->kegiatan}}</textarea>
									</div>
								</div>           			
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Output</label>
										<textarea name="output" class="form-control" id="exampleFormControlTextarea1" rows="5" >{{$spmi->output}}</textarea>
									</div>
								</div>           			
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Pihak yg terlibat</label>
										<textarea name="pihak_terlibat" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$spmi->pihak_terlibat}}</textarea>
									</div>
								</div>								
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Catatan</label>
										<textarea name="catatan" class="form-control" id="exampleFormControlTextarea2" rows="3" >{{$spmi->catatan}}</textarea>
									</div>
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

<h1>Edit Data SPMI</h1>
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