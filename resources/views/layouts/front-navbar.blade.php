
    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="top_menu row m0">
            <div class="container">
                <div class="float-right">
                    <a class="dn_btn" target="_blank" href="tel:+6287830016267"><i class="fas fa-phone"></i> 024 - 76440587</a>
                    <a class="dn_btn" target="_blank" href="mailto:baakcku@gmail.com"><i class="fas fa-envelope"></i> admin@cendekiaku.com</a>
                    <a class="dn_btn" target="_blank" href="http://cendekiaku.ac.id/"><i class="fas fa-globe"></i> cendekiaku.ac.id</a>
                </div>
            </div>
        </div>
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="/"><img
                            src="{{ asset('img/logo.png')}}" height="50px" width="50px" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item {{ (request()->segment(1) == '') ? 'active' : '' }}" id="nav"><a class="nav-link" href="/">Beranda</a></li>
                            <li class="nav-item {{ (request()->segment(1) == 'tentang') ? 'active' : '' }}" id="navtentang"><a class="nav-link" href="{{ route('tentang')}}">Tentang</a>
                            </li>
                            <li class="nav-item {{ (request()->segment(1) == 'program-studi') ? 'active' : '' }}" id="navprogdi"><a class="nav-link" href="{{ route('program-studi')}}">Program Studi</a>
                            </li>
                            <li class="nav-item {{ (request()->segment(1) == 'kontak') ? 'active' : '' }}" id="navkontak"><a class="nav-link" href="{{ route('kontak')}}">Kontak</a>
                            </li>
                            @auth ('id_role' == 3)
                                <li class="nav-item" id="navmateri">
                                    <a class="nav-link" href="{{ route('semester.courses')}}">Materi</a>
                                </li>
                            @endauth
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                                </li>
                            @else
                                <li class="nav-item submenu dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="fas fa-caret-down"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('LOG OUT') }}
                                            </a>
                                        </li>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--================ END Header Menu Area =================-->
