  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      @if (auth()->user()->role == 'siswa')
          <a href="/dashboard_siswa" class="brand-link">
              <img src="{{ asset('/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                  class="brand-image img-circle elevation-3" style="opacity: .8">
              <span class="brand-text font-weight-light">SDI Dabolding</span>
          </a>
      @elseif (auth()->user()->role == 'guru')
          <a href="/dashboard_guru" class="brand-link">
              <img src="{{ asset('/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                  class="brand-image img-circle elevation-3" style="opacity: .8">
              <span class="brand-text font-weight-light">SDI Dabolding</span>
          </a>
      @else
          <a href="/dashboard" class="brand-link">
              <img src="{{ asset('/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                  class="brand-image img-circle elevation-3" style="opacity: .8">
              <span class="brand-text font-weight-light">SDI Dabolding</span>
          </a>
      @endif
      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ auth()->user()->avatar() }}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ auth()->user()->name }}</a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item has-treeview menu-open">
                      @if (auth()->user()->role == 'siswa')
                          <a href="/dashboard_siswa" class="nav-link active">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                  DASHBOARD
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                      @elseif(auth()->user()->role == 'guru')
                          <a href="/dashboard_guru" class="nav-link active">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                  DASHBOARD
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                      @else
                          <a href="/dashboard" class="nav-link active">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                  DASHBOARD
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                      @endif
                      <ul class="nav nav-treeview">
                          @if (auth()->user()->role == 'siswa')
                              <li class="nav-item">
                                  <a href="/dashboard_siswa" class="nav-link {{ set_active('dashboard_siswa') }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>CAPAIAN SISWA</p>
                                  </a>
                              </li>
                          @else
                              <li class="nav-item">
                                  <a href="/tdu" class="nav-link {{ set_active('tdu') }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>CAPAIAN SISWA</p>
                                  </a>
                              </li>
                          @endif
                          @if (auth()->user()->role == 'admin')
                              <li class="nav-item">
                                  <a href="/kurikulum" class="nav-link {{ set_active('kurikulum') }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>CAPAIAN KELAS</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="/kesiswaan" class="nav-link {{ set_active('kesiswaan') }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>CAPAIAN BELAJAR</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="/sekolah" class="nav-link {{ set_active('sekolah') }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>SEKOLAH</p>
                                  </a>
                              </li>
                          @endif
                      </ul>
                  </li>
                  @if (auth()->user()->role == 'admin')
                      <li class="nav-item has-treeview">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-copy"></i>
                              <p>
                                  Jurnal
                                  <i class="fas fa-angle-left right"></i>
                                  <span class="badge badge-info right">{{ totalJournal() }}</span>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="/jurnalpost" class="nav-link {{ set_active('jurnalpost') }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Jurnal Belajar</p>
                                  </a>
                              </li>

                              <li class="nav-item">
                                  <a href="/jurnalringkasan" class="nav-link {{ set_active('jurnalringkasan') }}">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Ringkasan Jurnal</p>
                                  </a>
                              </li>

                          </ul>
                      </li>
                      <li class="nav-item has-treeview">
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="/grafiknilai" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Grafik Nilai</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="/grafikmateri" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Grafik Materi</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="/grafikkompetensi" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Grafik Kompetensi</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li class="nav-item has-treeview">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-table"></i>
                              <p>
                                  Raport
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="/test" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Raport Siswa</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="/extra" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Absensi & Catatan</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li class="nav-item has-treeview">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-table"></i>
                              <p>
                                  Tabel Data
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="/kelas" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Data Kelas</p>
                                  </a>
                              </li>
                          </ul>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="/guru" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Data Guru</p>
                                  </a>
                              </li>
                          </ul>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="/mapel" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Data Mapel</p>
                                  </a>
                              </li>
                          </ul>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="/nilai" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Data Nilai</p>
                                  </a>
                              </li>
                          </ul>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="/user" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Data Users</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li class="nav-item has-treeview menu-open">
                          <a href="/dashboard" class="nav-link active">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                  PBPM
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="/kalender" class="nav-link">
                                      <i class="nav-icon far fa-calendar-alt"></i>
                                      <p>
                                          Kalender
                                          <span class="badge badge-info right">2</span>
                                      </p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="/portofolio" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Portofolio</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="/projects" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Project Siswa</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li class="nav-item has-treeview">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-book"></i>
                              <p>
                                  Kontak & Pengumuman
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="/contacts" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Kontak Siswa</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="/posting" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Pengumuman</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                  @endif
                  @if (auth()->user()->role == 'guru')
                      <li class="nav-item has-treeview">
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="/grafiknilai" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Grafik Nilai</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="/grafikmateri" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Grafik Materi</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="/grafikkompetensi" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Grafik Kompetensi</p>
                                  </a>
                              </li>
                          </ul>
                      </li>
                      <li class="nav-item has-treeview">
                          <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-table"></i>
                              <p>
                                  Raport
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="/test" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Raport Siswa</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="/extra" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Absensi & Catatan</p>
                                  </a>
                              </li>
                          </ul>
                      </li>

                      <li class="nav-item has-treeview menu-open">
                          <a href="/dashboard_guru" class="nav-link active">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                  KURIKULUM
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="/isinilai/{{ $guru_profile }}" class="nav-link">
                                      <i class="nav-icon far fa-calendar-alt"></i>
                                      <p>
                                          Isi Nilai Siswa
                                          <span class="badge badge-info right">{{ dataNilai() }}</span>
                                      </p>
                                  </a>
                              </li>

                          </ul>
                      </li>
                  @endif
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>