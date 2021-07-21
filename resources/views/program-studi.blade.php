@extends('layouts.front-main')

@section('title', 'Program Studi')
@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="pelajaran bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
            </div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Program Studi</h2>
                    <div class="page_link">
                        <a href="/">Beranda</a>
                        <a href="{{ route('program-studi')}}">Program Studi</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->


    <!--================Courses Area =================-->
    <section class="courses_area p_120">
        <div class="container">
            <div class="main_title">
                <h2>Program Studi di <br> STIE Cendekia Karya Utama</h2>
                <p>Dibawah ini merupakan Program Studi yang tersedia di website Learning. Tiap semester mempunyai
                    materi yang berbeda namun dengan matakuliah yang sama. Oleh karena itu nikmati materi dan selamat
                    belajar! tunggu update selanjutnya untuk penambahan matakuliah!</p>
            </div>
            <div class="row courses_inner">
                <div class="col-lg-12">
                    <div class="grid_inner">
                        <div class="grid_item wd55">
                            <div class="courses_item">
                                <img src="{{ asset('frontend/img/courses/WM1.jpg')}}" alt="">
                                <div class="hover_text">
                                    <a class="cat" href="#">Gratis</a>
                                    <a href="#">
                                        <h4>PRODI MANAGEMENT</h4>
                                    </a>
                                    <ul class="list">
                                        <li><a href="#"><i class="lnr lnr-users"></i> 34</a></li>
                                        <li><a href="#"><i class="lnr lnr-bubble"></i> 0</a></li>
                                        <li><a href="#"><i class="lnr lnr-user"></i>DOSEN MANAGEMENT</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="grid_item wd44">
                            <div class="courses_item">
                                <img src="{{ asset('frontend/img/courses/WK1.jpg')}}" alt="">
                                <div class="hover_text">
                                    <a class="cat" href="#">Gratis</a>
                                    <a href="#">
                                        <h4>PRODI AKUNTANSI</h4>
                                    </a>
                                    <ul class="list">
                                        <li><a href="#"><i class="lnr lnr-users"></i> 34</a></li>
                                        <li><a href="#"><i class="lnr lnr-bubble"></i> 0</a></li>
                                        <li><a href="#"><i class="lnr lnr-user"></i> DOSEN AKUNTANSI</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Courses Area =================-->
@endsection
