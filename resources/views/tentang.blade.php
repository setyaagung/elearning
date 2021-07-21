@extends('layouts.front-main')

@section('title', 'Tentang')
@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
            </div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Tentang Learning</h2>
                    <div class="page_link">
                        <a href="/">Beranda</a>
                        <a href="">Tentang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    <!--================About Area =================-->
    <section class="about_area p_60">
        <div class="container">
            <div class="main_title">
                <h2 style="font-size: 33px !important;">Tentang Learning </h2>
                <p class="text-justify">
                    Website pembelajaran dimana para mahasiswa dapat belajar dimana saja dan kapan saja.
                    Dosen dapat mengupload video dirinya sendiri sedang mengajar, sehingga tanpa takut adanya jam
                    kosong atau pun keadaan yang tidak terduga apapun karena Learning dapat diakses dimana saja dan
                    kapan saja untuk belajar.
                </p>
            </div>
            <div class="row about_inner">
                <div class="col-lg-6">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    Visi
                                    <i class="lnr lnr-chevron-down"></i>
                                    <i class="lnr lnr-chevron-up"></i>
                                </button>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    Membuat para mahasiswa di STIE Cendekia Karya Utama lebih pintar dan belajar dengan terstruktur. agar
                                    menjadi generasi emas yang menghasilkan beragam prestasi untuk mengharumkan nama STIE Cendekia Karya Utama.

                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Misi
                                    <i class="lnr lnr-chevron-down"></i>
                                    <i class="lnr lnr-chevron-up"></i>
                                </button>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    Membuat para Mahasiswa lebih rajin dan mengatasi beragam rintangan yang menghambat proses kegiatan belajar mengajar
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Tujuan
                                    <i class="lnr lnr-chevron-down"></i>
                                    <i class="lnr lnr-chevron-up"></i>
                                </button>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    Mengatasi beragam hambatan yang dilalui selama kegiatan kuliah Dan membuat para Mahasiswa bisa belajar dimana saja dan kapan saja dengan E-Learning.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingfour">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                    Manfaat
                                    <i class="lnr lnr-chevron-down"></i>
                                    <i class="lnr lnr-chevron-up"></i>
                                </button>
                            </div>
                            <div id="collapsefour" class="collapse" aria-labelledby="headingfour"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    - Mengatasi Beragam Rintangan dalam proses KBM <br>
                                    - Membuat para Mahasiswa bisa belajar dimana saja dan kapan saja <br>
                                    - Meningkatkan Prestasi Mahasiswa <br>
                                    - Materi Terstruktur
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="video_area" id="video">
                        <img class="img-fluid" src="{{ asset('frontend/img/4.jpg')}}" alt="" />
                        <a class="popup-youtube" href="https://www.youtube.com/watch?v=QHvPMSTzOp4">
                            <img src="{{ asset('frontend/img/icon/video-icon-1.png')}}" alt="" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="about_details">
                <p>
                    Learning adalah website pembelajaran dimana para mahasiswa dapat belajar dimana saja dan kapan saja.
                    dan Dosen dapat mengupload video dirinya sendiri sedang mengajar. sehingga tanpa takut adanya Jam
                    kosong atau pun keadaan yang tidak terduga apapun karena Learning dapat diakses dimana saja dan
                    kapan saja untuk belajar.
                </p>

            </div>
        </div>
    </section>
    <!--================End About Area =================-->
@endsection
