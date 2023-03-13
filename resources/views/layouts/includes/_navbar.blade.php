<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        @if (auth()->user()->role == 'siswa')
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/dashboard_siswa" class="nav-link">Home</a>
            </li>
        @elseif (auth()->user()->role == 'guru')
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/dashboard_guru" class="nav-link">Home</a>
            </li>
        @else
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/tdu" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/kurikulum" class="nav-link">Kurikulum</a>
            </li>
        @endif
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Cari">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="/my_profile/{{ auth()->user()->id }}/myprofile" class="nav-link dropdown-toggle"
                data-toggle="dropdown">
                <img src="{{ auth()->user()->avatar() }}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="{{ auth()->user()->avatar() }}" class="img-circle elevation-2" alt="User Image">

                    <p>
                        {{ auth()->user()->name }} - {{ auth()->user()->role }}
                        <small>Member since {{ auth()->user()->created_at }}</small>
                    </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                    <div class="row">
                        <div class="col-4 text-center">
                            <a href="#">TDU</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="#">Mapel</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="#">Jurnal</a>
                        </div>
                    </div>
                    <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="/my_profile/{{ auth()->user()->id }}/myprofile"
                        class="btn btn-default btn-flat">Profile</a>
                    <a href="/logout" class="btn btn-default btn-flat float-right">Sign out</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
