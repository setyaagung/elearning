@extends('layouts.front-main')

@section('title', 'Materi E-Learning')
@section('content')
    <!-- Start Greetings Card -->
    <div class="container" style="margin-top: 170px">
        <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400"
            style="width: 100%; border-radius:10px;">
            <div class="row" style="color: black; font-family: 'poppins';">
                <div class="col-md-12 mt-1">
                    <h1 style="color: black; font-family:'poppins';" data-aos="fade-down"
                        data-aos-duration="1400">{{ $materi->matakuliah->nama_matkul}}</h1>
                    <p>Semester {{ $materi->semester}}</p>
                    <hr>
                    <p data-aos="fade-down" data-aos-duration="1800">
                        {{ $materi->deskripsi}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Greetings Card -->
    <br>
    <div class="container mb-5">
        <div class="row">
            @foreach ($details as $detail)
                <div class="col-sm-12">
                    <div class="card shadow-sm mb-4" style="border-radius: 10px !important" data-aos="fade-down" data-aos-duration="1400">
                        <a href="{{ route('courses',[$materi->id_materi,$detail->slug])}}">
                            <div class="card-header" style="background: #04091e">
                                <h5 class="card-title text-white text-center">{{ $detail->judul}}</h5>
                            </div>
                            <div class="card-body bg-white text-dark text-justify">
                                {{ $detail->deskripsi}}
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="{{ asset('frontend/css/user_style.css')}}">
@endpush
