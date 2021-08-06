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
                    <p>Hello {{ Auth::user()->name}}! , Ini merupakan halaman utama learning ! Silahkan pilih mata kuliah dan semester yang ingin kamu pelajari. Selamat belajar ya {{ Auth::user()->name}}!</p>
                    <hr>
                    <h4 style="line-height: 4px;" data-aos="fade-down" data-aos-duration="1700">{{ Auth::user()->name}} - Learning Mahasiswa</h4>
                    <p data-aos="fade-down" data-aos-duration="1800">Silahkan pilih mata kuliah yang akan kamu akses
                        dibawah
                        ini!
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Greetings Card -->
    <!-- Start Greetings Card -->
    <div class="container mt-3">
        <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400"
            style="width: 100%; border-radius:10px;">
            <div class="row" style="color: black; font-family: 'poppins';">
                <div class="col-md-12 mt-1">
                    <form action="{{ route('semester.courses')}}" method="GET">
                        <div class="input-group mb-3">
                            <input type="search" class="form-control" placeholder="Cari mata kuliah ..." name="search">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Greetings Card -->
    <br>
    <div class="container mb-5">
        <div class="row">
            @foreach ($materis as $materi)
                <div class="col-sm-4">
                    <div class="card shadow-sm mb-4" style="border-radius: 10px !important" data-aos="fade-down" data-aos-duration="1400">
                        <a href="{{ route('detail.courses',$materi->id_materi)}}">
                            <div class="card-header" style="background: #04091e">
                                <h5 class="card-title text-white text-center">{{ $materi->matakuliah->nama_matkul}}</h5>
                            </div>
                            <div class="card-body bg-white text-dark text-justify">
                                {{ str_limit($materi->deskripsi, 150)}}
                                <hr>
                                <div class="text-center font-weight-bold">
                                    {{ $materi->user->name}} - Semester {{ $materi->semester}}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            {{ $materis->links()}}
        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="{{ asset('frontend/css/user_style.css')}}">
@endpush
