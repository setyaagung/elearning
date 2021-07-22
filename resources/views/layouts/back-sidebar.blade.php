<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>E-Learning CKU</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard')}}" class="nav-link {{ (request()->segment(1) == 'dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('materi.index')}}" class="nav-link {{ (request()->segment(1) == 'materi') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-archive"></i>
                        <p>Materi</p>
                    </a>
                </li>
                @if (Auth::user()->id_role == 1)
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link {{ (request()->segment(1) == 'dosen') ? 'active' : '' }} {{ (request()->segment(1) == 'kelas') ? 'active' : '' }} {{ (request()->segment(1) == 'mahasiswa') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Master Data
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dosen.index')}}" class="nav-link {{ (request()->segment(1) == 'dosen') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dosen</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kelas.index')}}" class="nav-link {{ (request()->segment(1) == 'kelas') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('mahasiswa.index')}}" class="nav-link {{ (request()->segment(1) == 'mahasiswa') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Mahasiswa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('matakuliah.index')}}" class="nav-link {{ (request()->segment(1) == 'matakuliah') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Mata Kuliah</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.index')}}" class="nav-link {{ (request()->segment(1) == 'user') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Kelola Pengguna</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
