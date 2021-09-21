@extends('layouts.front-main')

@section('title', 'Materi E-Learning')
@section('content')
    <!-- Start Greetings Card -->
    <div class="container" style="margin-top: 170px">
        <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400"
            style="width: 100%; border-radius:10px;">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hadir!</strong> {{$message}}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if ($message = Session::get('upload'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{$message}}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Peringatan!</strong> {{$message}}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if ($message = Session::get('gagal'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Peringatan!</strong> {{$message}}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row" style="color: black; font-family: 'poppins';">
                <div class="col-md-10 mt-1">
                    <h1 style="color: black; font-family:'poppins';" data-aos="fade-down"
                        data-aos-duration="1400">{{ $detail->judul}}</h1>
                </div>
                <div class="col-md-2 mt-1">
                    @if (Auth::user()->id_role == 3)
                        <form action="{{ route('absensi',[$materi->id_materi,$detail->slug])}}" method="POST">
                            @csrf
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Hadir</button>
                            </div>
                        </form>
                    @endif
                </div>
                <div class="col-md-12">
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
                        <h4 class="mt-4">Zoom :</h4>
                        @if ($detail->zoom == null)
                            <p class="text-center text-dark">
                                Zoom tidak tersedia
                            </p>
                        @else
                            <a href="{{ $detail->zoom}}" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-video"></i> Join Zoom</a>
                        @endif
                        @if (Auth::user()->id_role == 3)
                            @if ($detail->jenis == 'Tugas')
                                <h4 class="mt-4">Upload Tugas :</h4>
                                <div class="container">
                                    <p class="text-justify text-dark">
                                        <strong>Perhatikan</strong> <br>
                                        Silahkan upload file tugas anda yang telah diberikan kepada dosen dengan cara klik choose file form dibawah.
                                        File yang anda dikirim kan harus dengan format <b>PDF</b> dengan maksimal ukuran sebesar <b>5 mb</b>.
                                        Jika sudah silahkan klik tombol upload dibawah untuk mengirimkan file yang sudah anda buat.
                                    </p>
                                    <form action="{{ route('upload_tugas',[$materi->id_materi,$detail->slug])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="">Upload Tugas</label>
                                            <input type="file" class="p-1 form-control @error('file') is-invalid @enderror" name="file" value="{{ old('file')}}">
                                            @error('file')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Upload</button>
                                        </div>
                                    </form>
                                </div>
                            @endif
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
