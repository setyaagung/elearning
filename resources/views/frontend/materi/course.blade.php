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
                        data-aos-duration="1400">{{ $detail->judul}}</h1>
                    <p>{{ $materi->matakuliah->nama_matkul}} - Semester {{ $materi->semester}}</p>
                    <hr>
                    <p data-aos="fade-down" data-aos-duration="1800">
                        {{ $detail->deskripsi}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Greetings Card -->
    <br>
    <div class="container mb-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow-sm mb-4" style="border-radius: 10px !important" data-aos="fade-down" data-aos-duration="1400">
                    <div class="card-body bg-white text-dark text-justify">
                        <h4 class="mb-4">Video :</h4>
                        @if ($detail->video == null)
                            <p class="text-center text-dark">
                                Video tidak tersedia
                            </p>
                        @else
                            <div class=" text-center">
                                <iframe width="880" height="495" src="https://youtube.com/embed/{{ $detail->video}}" frameborder="0" allowfullscreen></iframe>
                            </div>
                        @endif
                        <h4 class="mt-4">File :</h4>
                        @if ($detail->file == null)
                            <p class="text-center text-dark">
                                File tidak tersedia
                            </p>
                        @else
                            <a href="{{ Storage::url($detail->file)}}" class="btn btn-sm btn-danger" target="_blank"><i class="fas fa-file-pdf"></i> Download File</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="{{ asset('frontend/css/user_style.css')}}">
@endpush
