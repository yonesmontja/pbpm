<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SD Inpres Dabolding</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('/frontend2/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('/frontend2/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/frontend2/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend2/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend2/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend2/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend2/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/frontend2/assets/vendor/remixicon/remixicon.cs') }}s" rel="stylesheet">
    <link href="{{ asset('/frontend2/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('/frontend2/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Bootslander - v4.9.1
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="https://pbpm.sdinpresdabolding.sch.id"><span>SD Inpres Dabolding</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">Profil</a></li>
                    <li><a class="nav-link scrollto" href="#features">Target 2023</a></li>
                    <li><a class="nav-link scrollto" href="#gallery">Program</a></li>
                    <li><a class="nav-link scrollto" href="#team">Tim Guru</a></li>
                    <li><a class="nav-link scrollto" href="#pricing">Kurikulum</a></li>
                    <li class="dropdown"><a href="/login"><span>Login</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="/login">Admin</a></li>
                            <li><a href="/login">Siswa</a></li>
                            <li><a href="/login">Guru</a></li>

                        </ul>
                    </li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                    <div data-aos="zoom-out">
                        <h1>Skill, Imajinasi & Kecendekiaan <span>#CeritaMasaDepanPapua</span></h1>
                        <h2>Generasi beriman, menguasai IPTEK, berbudaya, peduli & cinta lingkungan</h2>
                        <div class="text-center text-lg-start">
                            <a href="#about" class="btn-get-started scrollto">Profil Sekolah</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                    <img src="{{ asset('/frontend2/assets/img/hero-img.png') }}" class="img-fluid animated"
                        alt="">
                </div>
            </div>
        </div>
        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg>
    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch"
                        data-aos="fade-right">
                        <a href="https://www.youtube.com/watch?v=e7VjVK3PD7w" class="glightbox play-btn mb-4"></a>
                    </div>
                    <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5"
                        data-aos="fade-left">
                        @foreach ($visi as $v)
                            <h3>{{ $v->visi }}</h3>
                            <p>{{ $v->visi_deskripsi }}</p>
                        @endforeach
                        @foreach ($misi as $m)
                            @if ($m->id == 1)
                                <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="icon"><i class="bx bx-fingerprint"></i></div>
                                    <h4 class="title"><a href="">{{ $m->misi_deskripsi }}</a></h4>
                                    <p class="description"> {{ $m->misi_notes }}</p>
                                </div>
                            @elseif($m->id == 2)
                                <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                                    <div class="icon"><i class="bx bx-gift"></i></div>
                                    <h4 class="title"><a href="">{{ $m->misi_deskripsi }}</a></h4>
                                    <p class="description">{{ $m->misi_notes }}
                                    </p>
                                </div>
                            @elseif($m->id == 3)
                                <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                                    <div class="icon"><i class="bx bx-atom"></i></div>
                                    <h4 class="title"><a href="">{{ $m->misi_deskripsi }}</a></h4>
                                    <p class="description">{{ $m->misi_notes }}</p>
                                </div>
                            @else
                                <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="icon"><i class="bx bx-fingerprint"></i></div>
                                    <h4 class="title"><a href="">{{ $m->misi_deskripsi }}</a></h4>
                                    <p class="description"> {{ $m->misi_notes }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>TARGET 2023</h2>
                    <p>Akselerasi, Matematika-Bahasa-Komputer, dan Manajemen Sekolah</p>
                </div>

                <div class="row" data-aos="fade-left">
                    <div class="col-lg-3 col-md-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                            <i class="ri-store-line" style="color: #ffbb2c;"></i>
                            <h3><a href="">Akselerasi</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                            <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
                            <h3><a href="">MBK</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="150">
                            <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
                            <h3><a href="">Manajemen Sekolah</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                            <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
                            <h3><a href="">Sekolah Adiwiyata</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="250">
                            <i class="ri-database-2-line" style="color: #47aeff;"></i>
                            <h3><a href="">Story Telling</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                            <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
                            <h3><a href="">Mitra Pendidik</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="350">
                            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                            <h3><a href="">Digitalisasi</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
                            <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
                            <h3><a href="">Lab. Komputer</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="450">
                            <i class="ri-anchor-line" style="color: #b2904f;"></i>
                            <h3><a href="">Literasi</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="500">
                            <i class="ri-disc-line" style="color: #b20969;"></i>
                            <h3><a href="">Numerasi</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="550">
                            <i class="ri-base-station-line" style="color: #ff5828;"></i>
                            <h3><a href="">Skill</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="600">
                            <i class="ri-fingerprint-line" style="color: #29cc61;"></i>
                            <h3><a href="">Keimanan</a></h3>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Features Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">

                <div class="row" data-aos="fade-up">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ totalSiswa() }}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Jumlah Peserta Didik</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="206" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Laki-laki</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-headset"></i>
                            <span data-purecounter-start="0" data-purecounter-end="147" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Perempuan</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ totalGuru() }}" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Guru</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Details Section ======= -->
        <section id="details" class="details">
            <div class="container">

                <div class="row content">
                    <div class="col-md-4" data-aos="fade-right">
                        <img src="{{ asset('/frontend2/assets/img/details-5.jpg') }}" class="img-fluid"
                            alt="">
                    </div>
                    <div class="col-md-8 pt-4" data-aos="fade-up">
                        <h3>Ujian Praktek siswa Kelas 6 Tahun Pelajaran 2021/2022.</h3>
                        <p class="fst-italic">
                            Dalam kelompok kerja, siswa membuat model miniatur rumah Bokam.
                        </p>
                        <ul>
                            <li><i class="bi bi-check"></i> Ide berdasarkan realita budaya Ngalum.</li>
                            <li><i class="bi bi-check"></i> Siswa menemukan ide dalam realitas budaya.</li>
                            <li><i class="bi bi-check"></i> Siswa mengembangkan setiap temuan menjadi Imajinasi dan
                                Pemaknaan.</li>
                            <li><i class="bi bi-check"></i> Siswa menguasai fungsi-fungsi penting dalam rumah Bokam.
                            </li>
                        </ul>
                        <p>
                            Dalam proses ini, guru menjadi fasilitator bagi siswa untuk belajar. Guru menjadi penilai
                            hasil karya siswa</p>
                    </div>
                </div>

                <div class="row content">
                    <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
                        <img src="{{ asset('/frontend2/assets/img/details-6.jpg') }}" class="img-fluid"
                            alt="">
                    </div>
                    <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
                        <h3>Siswa belajar dengan bahan-bahan yang ada di alam lingkungan sekitar kampung</h3>
                        <p class="fst-italic">
                            Pembelajaran berbasis budaya, menggunakan modal-modal budaya dan mengembangkannya melalui
                            pembelajaran kontekstual.
                        </p>
                        <p>
                            Bahan-bahan, seperti rotan, kayu bulat, mudah ditemukan di dusun-dusun atau hutan di sekitar
                            kampung tempat tinggal siswa.
                        </p>
                        <p>
                            Penilaian proses pembelajaran diarahkan untuk mengukur kemampuan siswa dalam skill yang ada
                            pada fungsi-fungsi budaya lokal masyarakat.
                        </p>
                    </div>
                </div>

                <div class="row content">
                    <div class="col-md-4" data-aos="fade-right">
                        <img src="{{ asset('/frontend2/assets/img/details-7.jpg') }}" class="img-fluid"
                            alt="">
                    </div>
                    <div class="col-md-8 pt-5" data-aos="fade-up">
                        <h3>Matematika-Bahasa-Komputer</h3>
                        <p>Mata pelajaran inti menuju globalisasi. Dalam metode ini, kemampuan siswa diukur dalam:</p>
                        <ul>
                            <li><i class="bi bi-check"></i> Ide.</li>
                            <li><i class="bi bi-check"></i> Nalar.</li>
                            <li><i class="bi bi-check"></i> Logika.</li>
                        </ul>
                        <p>
                            Pembelajaran dimulai dari ide-ide yang siswa miliki, misalnya di keluarga, rumah, lingkungan
                            dll.
                        </p>
                        <p>
                            Pembelajaran dikembangkan untuk melatih ide, nalar, dan logika siswa.
                        </p>
                    </div>
                </div>

                <div class="row content">
                    <div class="col-md-4 order-1 order-md-2" data-aos="fade-left">
                        <img src="{{ asset('/frontend2/assets/img/details-8.jpg') }}" class="img-fluid"
                            alt="">
                    </div>
                    <div class="col-md-8 pt-5 order-2 order-md-1" data-aos="fade-up">
                        <h3>Akselerasi</h3>
                        <p class="fst-italic">
                            Mengejar ketertinggalan siswa dalam materi bahasa Indonesia dan Matematika.
                        </p>
                        <p>
                            Siswa normal akademis.
                        </p>
                        <ul>
                            <li><i class="bi bi-check"></i> Setiap peningkatan dalam capaian belajar harus terukur.
                            </li>
                            <li><i class="bi bi-check"></i> Tes dan Ukur (TDU) menggagalkan sedini mungkin dan
                                mengoptimalkan belajar siswa.</li>
                            <li><i class="bi bi-check"></i> Ortu terlibat dalam mendampingi siswa ber-akselerasi.</li>
                        </ul>
                    </div>
                </div>

            </div>
        </section><!-- End Details Section -->

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>PROGRAM</h2>
                    <p>KURIKULUM PENDIDIKAN KONTEKSTUAL PAPUA</p>
                </div>

                <div class="row g-0" data-aos="fade-left">

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                            <a href="{{ asset('/frontend2/assets/img/gallery/gallery-9.jpg') }}"
                                class="gallery-lightbox">
                                <img src="{{ asset('/frontend2/assets/img/gallery/gallery-9.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="150">
                            <a href="{{ asset('/frontend2/assets/img/gallery/gallery-10.jpg') }}"
                                class="gallery-lightbox">
                                <img src="{{ asset('/frontend2/assets/img/gallery/gallery-10.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="200">
                            <a href="{{ asset('/frontend2/assets/img/gallery/gallery-11.jpg') }}"
                                class="gallery-lightbox">
                                <img src="{{ asset('/frontend2/assets/img/gallery/gallery-11.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="250">
                            <a href="{{ asset('/frontend2/assets/img/gallery/gallery-12.jpg') }}"
                                class="gallery-lightbox">
                                <img src="{{ asset('/frontend2/assets/img/gallery/gallery-12.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="300">
                            <a href="{{ asset('/frontend2/assets/img/gallery/gallery-13.jpg') }}"
                                class="gallery-lightbox">
                                <img src="{{ asset('/frontend2/assets/img/gallery/gallery-13.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="350">
                            <a href="{{ asset('/frontend2/assets/img/gallery/gallery-14.jpg') }}"
                                class="gallery-lightbox">
                                <img src="{{ asset('/frontend2/assets/img/gallery/gallery-14.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="400">
                            <a href="{{ asset('/frontend2/assets/img/gallery/gallery-15.jpg') }}"
                                class="gallery-lightbox">
                                <img src="{{ asset('/frontend2/assets/img/gallery/gallery-15.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-delay="450">
                            <a href="{{ asset('/frontend2/assets/img/gallery/gallery-16.jpg') }}"
                                class="gallery-lightbox">
                                <img src="{{ asset('/frontend2/assets/img/gallery/gallery-16.jpg') }}" alt=""
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Gallery Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container">

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        @foreach ($testimony as $t)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="{{ $t -> image() }}"
                                        class="testimonial-img" alt="">
                                    <h3>{{ $t -> nama }}</h3>
                                    <h4>{{ $t -> pekerjaan }}</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        {{ $t -> komentar }}
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Guru</h2>
                    <p>Tim Guru Hebat</p>
                </div>

                <div class="row" data-aos="fade-left">

                    @foreach ($guru as $g)
                        <div class="col-lg-3 col-md-6">
                            <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                <div class="pic"><img src="{{ $g->avatar() }}" class="img-fluid"
                                        alt=""></div>
                                <div class="member-info">
                                    <h4>{{ $g->nama_guru }}</h4>
                                    <span>Jumlah mapel: {{ $g->mapel->count() }}</span>
                                    <div class="social">
                                        <a href=""><i class="bi bi-twitter"></i></a>
                                        <a href=""><i class="bi bi-facebook"></i></a>
                                        <a href=""><i class="bi bi-instagram"></i></a>
                                        <a href=""><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Kurikulum</h2>
                    <p>Pengkajian Budaya Papua dan Modernisasi</p>
                </div>

                <div class="row" data-aos="fade-left">

                    <div class="col-lg-3 col-md-6">
                        <div class="box featured" data-aos="zoom-in" data-aos-delay="100">
                            <h3>Kelas 1-2</h3>
                            <h4><sup>*</sup>Expert<span> Keluarga </span></h4>
                            <ul>
                                <li>Citra Allah</li>
                                <li>Expert Keluarga</li>
                                <li>Expert Tempat Tinggal</li>

                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Expert Keluarga</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                        <div class="box featured" data-aos="zoom-in" data-aos-delay="200">
                            <h3>Kelas 3-4</h3>
                            <h4><sup>*</sup>Expert<span> Lingkungan </span></h4>
                            <ul>
                                <li>Lingkungan Tempat Tinggal</li>
                                <li>Kampung Halaman</li>
                                <li>Sumber Daya Alam</li>

                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Expert Lingkungan</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        <div class="box featured" data-aos="zoom-in" data-aos-delay="300">
                            <h3>Kelas 5-6</h3>
                            <h4><sup>*</sup>Expert<span> Kampung </span></h4>
                            <ul>
                                <li>Story Telling</li>
                                <li>Sosial-Budaya</li>
                                <li>#CeritaMasaDepan</li>

                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Expert Kampung</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                        <div class="box featured" data-aos="zoom-in" data-aos-delay="400">
                            <span class="advanced">PBPM</span>
                            <h3>Akselerasi</h3>
                            <h4><sup>*</sup>Normal<span> Akademis</span></h4>
                            <ul>
                                <li>Matematika</li>
                                <li>Bahasa Indonesia</li>
                                <li>Komputer</li>

                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Akselerasi</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Pricing Section -->

        <!-- ======= Contact Section ======= -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/frontend2/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('/frontend2/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('/frontend2/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/frontend2/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('/frontend2/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('/frontend2/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/frontend2/assets/js/main.js') }}"></script>

</body>

</html>
