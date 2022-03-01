  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="{{asset('/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SMPN3 Agats</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{auth() -> user() -> getuserAvatar()}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth() -> user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="/dashboard" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/tdu" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TDU</p>
                </a>
              </li>
              @if(auth() -> user() -> role == 'admin')
              <li class="nav-item">
                <a href="/kurikulum" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kurikulum</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/kesiswaan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kesiswaan</p>
                </a>
              </li>
              @endif
            </ul>
            
          </li>
          @if(auth() -> user() -> role == 'admin')
          <li class="nav-item">
            <a href="/widget" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Jurnal
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{totalJournal()}}</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/jurnalringkasan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ringkasan Jurnal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/jurnalpost" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jurnal Post</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/jurnalsiswa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jurnal Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/jurnalasrama" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jurnal Asrama</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/jurnalbelajar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jurnal Belajar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Grafik
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
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
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/test" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Siswa</p>
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
                <a href="/user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Users</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/skl" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data SKL SMP</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/kompetensiinti" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data KI SMP</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/visi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>VISI</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/misi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>MISI</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/tujuan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TUJUAN</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/nilai" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>NILAI</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/sasaran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SASARAN</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/swot" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SWOT</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/swotanalysis" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SWOT ANALYSIS</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/langkahstrategis" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LANGKAH STRATEGIS</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">PBPM</li>
          <li class="nav-item">
            <a href="/kalender" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Kalender
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/inbox" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/compose" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/read" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/profile" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
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
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/projects-add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/projects-edit" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="projects-detail" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/contacts" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
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