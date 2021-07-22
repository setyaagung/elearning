@extends('layouts.front-main')

@section('title', 'Kontak')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="kontak bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
            </div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Kontak</h2>
                    <div class="page_link">
                        <a href="/">Beranda</a>
                        <a href="{{ route('kontak')}}">Kontak</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->


    <!--================Contact Area =================-->
    <section class="contact_area p_40">
        <div class="container">
            <div style="width: 100%">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.0235068705415!2d110.42553491414567!3d-7.006514770572629!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708c82c6b05ee3%3A0x190864007a900419!2sKampus%20STIE%20Cendekia%20Karya%20Utama!5e0!3m2!1sen!2sid!4v1617462210753!5m2!1sen!2sid" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div><br />
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Jawa Tengah, Indonesia</h6>
                            <p>Kota Semarang</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="#">
                                    024 - 76440587</a></h6>
                            <p>Senin - Jumat | Pukul 08.00 - 17.00 WIB</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#">info@cendekiaku.com</a></h6>
                            <p>Email diatas hanya untuk keperluan penting!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->
@endsection
