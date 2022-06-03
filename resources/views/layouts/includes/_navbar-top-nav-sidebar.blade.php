  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
          <a href="/tdu" class="navbar-brand">
              <img src="{{ asset('/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                  class="brand-image img-circle elevation-3" style="opacity: .8">
              <span class="brand-text font-weight-light">SD Inpres Dabolding</span>
          </a>

          <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
              aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse order-3" id="navbarCollapse">
              <!-- Left navbar links -->
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                              class="fas fa-bars"></i></a>
                  </li>
                  <li class="nav-item">
                      <a href="/tdu" class="nav-link">Home</a>
                  </li>
                  <li class="nav-item">
                      <a href="/kurikulum" class="nav-link">Capaian Siswa</a>
                  </li>
              </ul>

              <!-- SEARCH FORM -->
              <form class="form-inline ml-0 ml-md-3">
                  <div class="input-group input-group-sm">
                      <input class="form-control form-control-navbar" type="search" placeholder="Search"
                          aria-label="Search">
                      <div class="input-group-append">
                          <button class="btn btn-navbar" type="submit">
                              <i class="fas fa-search"></i>
                          </button>
                      </div>
                  </div>
              </form>
          </div>
          <!-- Right navbar links -->
          <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
              <!-- Messages Dropdown Menu -->
              <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="#">
                      <i class="fas fa-comments"></i>
                      <span class="badge badge-danger navbar-badge">{{ count($userjournal_this_week) }}</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                      @isset($userjournal_this_week_1)
                          <a href="{{ route('site.single.post', $userjournal_this_week_1->slug) }}" class="dropdown-item">
                              <!-- Message Start -->
                              <div class="media">
                                  <img src="{{ $userjournal_this_week_1->avatar() }}" alt="User Avatar"
                                      class="img-size-50 mr-3 img-circle">
                                  <div class="media-body">
                                      <h3 class="dropdown-item-title">
                                          {{ $userjournal_this_week_1->user->name }}
                                          <span class="float-right text-sm text-danger"><i
                                                  class="fas fa-star"></i></span>
                                      </h3>
                                      <p class="text-sm">{{ $userjournal_this_week_1->title }} ...</p>
                                      <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>
                                          {{ $userjournal_this_week_1->created_at->diffForHumans() }}
                                      </p>
                                  </div>
                              </div>
                              <!-- Message End -->
                          </a>
                      @endisset

                      <div class="dropdown-divider"></div>
                      @isset($userjournal_this_week_2)
                          <a href="{{ route('site.single.post', $userjournal_this_week_2->slug) }}" class="dropdown-item">
                              <!-- Message Start -->
                              <div class="media">
                                  <img src="{{ $userjournal_this_week_2->avatar() }}" alt="User Avatar"
                                      class="img-size-50 img-circle mr-3">
                                  <div class="media-body">
                                      <h3 class="dropdown-item-title">
                                          {{ $userjournal_this_week_2->user->name }}
                                          <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                      </h3>
                                      <p class="text-sm">{{ $userjournal_this_week_2->title }}</p>
                                      <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>
                                          {{ $userjournal_this_week_2->created_at->diffForHumans() }}
                                      </p>
                                  </div>
                              </div>
                              <!-- Message End -->
                          </a>
                      @endisset

                      <div class="dropdown-divider"></div>
                      @isset($userjournal_this_week_3)
                          <a href="{{ route('site.single.post', $userjournal_this_week_3->slug) }}" class="dropdown-item">
                              <!-- Message Start -->
                              <div class="media">
                                  <img src="{{ $userjournal_this_week_3->avatar() }}" alt="User Avatar"
                                      class="img-size-50 img-circle mr-3">
                                  <div class="media-body">
                                      <h3 class="dropdown-item-title">
                                          {{ $userjournal_this_week_3->user->name }}
                                          <span class="float-right text-sm text-warning"><i
                                                  class="fas fa-star"></i></span>
                                      </h3>
                                      <p class="text-sm">{{ $userjournal_this_week_3->title }}</p>
                                      <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>
                                          {{ $userjournal_this_week_3->created_at->diffForHumans() }}</p>
                                  </div>
                              </div>
                              <!-- Message End -->
                          </a>
                      @endisset
                      <div class="dropdown-divider"></div>
                      <a href="/jurnalpost" class="dropdown-item dropdown-footer">Lihat semua jurnal</a>
                  </div>
              </li>
              <!-- Notifications Dropdown Menu -->
              <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="/user">
                      <i class="far fa-bell"></i>
                      <span class="badge badge-warning navbar-badge">{{ $total_jml_this_date }}</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                      <span class="dropdown-header">{{ $total_jml_this_date }} jurnal baru</span>

                      <div class="dropdown-divider"></div>
                      @isset($userjournal_this_date_1)
                          <a href="{{ route('site.single.post', $userjournal_this_date_1->slug) }}" class="dropdown-item">
                              <i class="fas fa-file mr-2"></i> {{ $jml_this_date_1 }} jurnal belajar
                              <span class="float-right text-muted text-sm">{{ $userjournal_this_date_1 -> created_at -> diffForHumans() }}</span>
                          </a>
                      @endisset
                      @isset($userjournal_this_date_2)
                          <a href="{{ route('site.single.post', $userjournal_this_date_2->slug) }}" class="dropdown-item">
                              <i class="fas fa-file mr-2"></i> {{ $jml_this_date_2 }} jurnal kelas
                              <span class="float-right text-muted text-sm">{{ $userjournal_this_date_2 -> created_at -> diffForHumans() }}</span>
                          </a>
                      @endisset
                      @isset($userjournal_this_date_3)
                          <a href="{{ route('site.single.post', $userjournal_this_date_3->slug) }}" class="dropdown-item">
                              <i class="fas fa-file mr-2"></i> {{ $jml_this_date_3 }} jurnal siswa
                              <span class="float-right text-muted text-sm">{{ $userjournal_this_date -> created_at -> diffForHumans() }}</span>
                          </a>
                      @endisset
                      <div class="dropdown-divider"></div>
                      <a href="/jurnalpost" class="dropdown-item dropdown-footer">Lihat semua jurnal</a>
                  </div>
              </li>
              <li class="nav-item dropdown">
                  <a href="/profile" class="nav-link" data-toggle="dropdown">

                      <!--span>{{ !empty(auth()->user()) ? auth()->user()->name : '' }}</span-->
                      <span>{{ auth()->user()->name }}</span>
                      <i class="icon-submenu lnr lnr-chevron-down"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                      <span class="dropdown-item dropdown-header">--00--</span>
                      <div class="dropdown-divider"></div>
                      <a href="{{ auth()->user()->name }}" class="dropdown-item">
                          <i class="lnr lnr-user"></i> <span>My Profile</span>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="/logout" class="dropdown-item">
                          <i class="lnr lnr-exit"></i> <span>Logout</span>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item dropdown-footer">ALIRENA | {{ date('Y') }}</a>
                  </div>
              </li>

          </ul>
      </div>
  </nav>
  <!-- /.navbar -->
