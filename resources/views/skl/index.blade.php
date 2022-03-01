@extends('layouts.master5')

@section('title')
  <title> AdminLTE 3 | SKL </title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Standar Kompetensi Lulusan (SKL)</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">SKL</li>
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
                  Tambah SKL
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                  Data <a href="#" class="alert-link">skl</a> {{session('sukses')}}
                </div>
                @endif

                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>DOMAIN</th>
                      <th>SKL</th>
                      <th>NOTES</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data_skl as $skl)
                      <tr>
                        <td>{{$skl -> skl_domain}}</td>
                        <td>{{$skl -> skl_smp}}</td>
                        <td>{{$skl -> skl_notes}}</td>
                        <td>
                          <a href="/skl/{{$skl->id}}/skledit" class="btn btn-warning btn-sm">Ubah
                          </a>
                          <!--a href="/skl/{{$skl->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')" >Hapus</a-->
                          <a href="/skl/{{$skl->id}}/skldelete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')" >Hapus</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>DOMAIN</th>
                        <th>SKL</th>
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
                        <form action="/skl/sklcreate" method="POST" enctype="multipart/form-data">
                          {{csrf_field()}}

                         <div class="form-group {{$errors->has('skl_domain')?' has-error' : ''}}">
                          <label for="exampleFormControlSelect1">Domain</label>
                          <select name="skl_domain" class="form-control" id="exampleFormControlSelect1">
                            <option>---</option>
                            <option value="Sikap Spiritual"{{(old('skl_domain') == 'L') ? ' selected' : ''}}>Sikap Spiritual</option>
                            <option value="Sikap Sosial"{{(old('skl_domain') == 'L') ? ' selected' : ''}}>Sikap Sosial</option>
                            <option value="Pengetahuan"{{(old('skl_domain') == 'L') ? ' selected' : ''}}>Pengetahuan</option>
                            <option value="Keterampilan"{{(old('skl_domain') == 'L') ? ' selected' : ''}}>Keterampilan</option>
                          </select>
                          @if($errors->has('skl_domain'))
                          <span class="help-block">{{$errors->first('skl_domain')}}</span>
                          @endif
                        </div>

                          <div class="form-group {{$errors->has('skl_smp')?' has-error' : ''}}">
                           <label for="exampleFormControlTextarea1">SKL SMP</label>
                           <textarea name="skl_smp" class="form-control" id="exampleFormControlTextarea1" placeholder="Tulis SKL" value="{{old('skl_smp')}}" rows="3"></textarea>
                         </div>
                         @if($errors->has('skl_smp'))
                         <span class="help-block">{{$errors->first('skl_smp')}}</span>
                         @endif

                          <div class="form-group {{$errors->has('skl_notes')?' has-error' : ''}}">
                           <label for="exampleFormControlTextarea1">NOTES</label>
                           <textarea name="skl_notes" class="form-control" id="exampleFormControlTextarea1" placeholder="Catatan" value="{{old('skl_notes')}}" rows="3"></textarea>
                         </div>
                         @if($errors->has('skl_notes'))
                         <span class="help-block">{{$errors->first('skl_notes')}}</span>
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

                          