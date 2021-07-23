@extends('layouts.front-main')

@section('title', 'Materi E-Learning')
@section('content')
    <!-- Start Greetings Card -->
    <div class="container" style="margin-top: 170px">
        <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400"
            style="width: 100%; border-radius:10px;">
            <div class="row" style="color: black; font-family: 'poppins';">
                <div class="col-md-12 mt-1">
                    <h1 class="display-4" style="color: black; font-family:'poppins';" data-aos="fade-down"
                        data-aos-duration="1400">Selamat Datang
                        di Learning <span style="font-size: 40px;">👋🏻
                        </span> </h1>
                    <p>Hello Mahasiswa! , Ini merupakan halaman utama learning ! Silahkan pilih Semester yang akan kamu
                        akses
                        dan pilih mata kuliah yang ingin kamu pelajari. Selamat belajar ya Mahasiswa!</p>
                    <hr>
                    <h4 style="line-height: 4px;" data-aos="fade-down" data-aos-duration="1700">{{ Auth::user()->name}} - Learning Mahasiswa</h4>
                    <p data-aos="fade-down" data-aos-duration="1800">Silahkan pilih semester yang akan kamu akses
                        dibawah
                        ini!
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Greetings Card -->
    <br>
    <div class="container mb-5">
        <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400"
            style="width: 100%; border-radius:10px;">
            <div class="row" style="color: black; font-family: 'poppins';">
                @foreach ($materis as $materi)
                    <div class="col-md-12 mt-1">
                        <h5 class="display-4" style="color: black; font-family:'poppins';" data-aos="fade-down"
                            data-aos-duration="1400">
                            <span style="font-size: 40px;">
                                {{ $materi->matakuliah->nama_matkul}}
                            </span>
                        </h5>

                        <hr>
                        <p data-aos="fade-down" data-aos-duration="1800">
                            {{ $materi->deskripsi}}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="{{ asset('frontend/css/user_style.css')}}">
@endpush
