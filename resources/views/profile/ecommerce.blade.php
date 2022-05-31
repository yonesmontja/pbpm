 @extends('layouts.mailbox')

@section('title')
  <title> SD Dabolding Portofolio </title>
@endsection

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Portofolio</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/tdu">Home</a></li>
              <li class="breadcrumb-item active">Portofolio</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">Review Portofolio Siswa</h3>
              <div class="col-12">
                <img src="{{asset('/admin/dist/img/prod-1.jpeg')}}" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="{{asset('/admin/dist/img/prod-1.jpeg')}}" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="{{asset('/admin/dist/img/prod-2.jpeg')}}" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="{{asset('/admin/dist/img/prod-3.jpeg')}}" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="{{asset('/admin/dist/img/prod-4.jpeg')}}" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="{{asset('/admin/dist/img/prod-5.jpeg')}}" alt="Product Image"></div>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">Review portofolio siswa</h3>
              <p>Karya siswa kelas 6 SD Inpres Dabolding tentang bentuk rumah adat Ap Bokam, ciri khas suku Ngalum. Siswa melakukan pengkajian dan membuat model rumah adat dari bahan-bahan yang ada di kampung.</p>

              <hr>
              <h4>Status Capaian Siswa</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked="">
                  Hijau
                  <br>
                  <i class="fas fa-circle fa-2x text-green"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option2" autocomplete="off">
                  Biru
                  <br>
                  <i class="fas fa-circle fa-2x text-blue"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option3" autocomplete="off">
                  Ungu
                  <br>
                  <i class="fas fa-circle fa-2x text-purple"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option4" autocomplete="off">
                  Merah
                  <br>
                  <i class="fas fa-circle fa-2x text-red"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option5" autocomplete="off">
                  Orange
                  <br>
                  <i class="fas fa-circle fa-2x text-orange"></i>
                </label>
              </div>

              <h4 class="mt-3">Predikat <small>Silakan pilih salah satu predikat huruf</small></h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                  <span class="text-xl">D</span>
                  <br>
                  Kurang
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                  <span class="text-xl">C</span>
                  <br>
                  Cukup
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                  <span class="text-xl">B</span>
                  <br>
                  Baik
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                  <span class="text-xl">A</span>
                  <br>
                  Sangat Baik
                </label>
              </div>

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  76
                </h2>
                <h4 class="mt-0">
                  <small>Nilai akhir </small>
                </h4>
              </div>

              <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-flag-plus fa-lg mr-2"></i>
                  Input Nilai Siswa
                </div>

                <div class="btn btn-default btn-lg btn-flat">
                  <i class="fas fa-heart fa-lg mr-2"></i>
                  Ubah Nilai Siswa
                </div>
              </div>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fas fa-cloud-upload-alt fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-calendar-alt fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-book fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-list-alt fa-2x"></i>
                </a>
              </div>

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Indikator Capaian Kompetensi</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Materi Fungsi Mapel</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Kompetensi Inti</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Mampu menjelaskan fungsi-fungsi utama dalam rumah adat tradisional suku Ngalum. </div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Fungsi Mapel Bahasa Indonesia: menyajikan deskripsi dan teks prosedur. </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Memahami konsep abstrak dan konkrit melalui barang-barang budaya yang ada di Kampung. </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

@endsection
