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
                    <p data-aos="fade-down" data-aos-duration="1800">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-sm table-borderless">
                                    <tr>
                                        <th>Group WA Kelas A</th>
                                        <td>:</td>
                                        <td>
                                            @if ($materi->group_a == null)
                                                Group Kelas Tidak Ada
                                            @else
                                                <a href="{{ $materi->group_a}}" class="btn btn-sm btn-success" target="_blank"><i class="fab fa-whatsapp"></i> Join Group WA</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Group WA Kelas B</th>
                                        <td>:</td>
                                        <td>
                                            @if ($materi->group_b == null)
                                                Group Kelas Tidak Ada
                                            @else
                                                <a href="{{ $materi->group_b}}" class="btn btn-sm btn-success" target="_blank"><i class="fab fa-whatsapp"></i> Join Group WA</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Group WA Kelas C</th>
                                        <td>:</td>
                                        <td>
                                            @if ($materi->group_c == null)
                                                Group Kelas Tidak Ada
                                            @else
                                                <a href="{{ $materi->group_c}}" class="btn btn-sm btn-success" target="_blank"><i class="fab fa-whatsapp"></i> Join Group WA</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Group WA Kelas D</th>
                                        <td>:</td>
                                        <td>
                                            @if ($materi->group_d == null)
                                                Group Kelas Tidak Ada
                                            @else
                                                <a href="{{ $materi->group_d}}" class="btn btn-sm btn-success" target="_blank"><i class="fab fa-whatsapp"></i> Join Group WA</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Group WA Kelas E</th>
                                        <td>:</td>
                                        <td>
                                            @if ($materi->group_e == null)
                                                Group Kelas Tidak Ada
                                            @else
                                                <a href="{{ $materi->group_e}}" class="btn btn-sm btn-success" target="_blank"><i class="fab fa-whatsapp"></i> Join Group WA</a>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-sm table-borderless">
                                    <tr>
                                        <th>Group WA Kelas F</th>
                                        <td>:</td>
                                        <td>
                                            @if ($materi->group_f == null)
                                                Group Kelas Tidak Ada
                                            @else
                                                <a href="{{ $materi->group_f}}" class="btn btn-sm btn-success" target="_blank"><i class="fab fa-whatsapp"></i> Join Group WA</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Group WA Kelas G</th>
                                        <td>:</td>
                                        <td>
                                            @if ($materi->group_g == null)
                                                Group Kelas Tidak Ada
                                            @else
                                                <a href="{{ $materi->group_g}}" class="btn btn-sm btn-success" target="_blank"><i class="fab fa-whatsapp"></i> Join Group WA</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Group WA Kelas H</th>
                                        <td>:</td>
                                        <td>
                                            @if ($materi->group_h == null)
                                                Group Kelas Tidak Ada
                                            @else
                                                <a href="{{ $materi->group_h}}" class="btn btn-sm btn-success" target="_blank"><i class="fab fa-whatsapp"></i> Join Group WA</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Group WA Kelas Umum</th>
                                        <td>:</td>
                                        <td>
                                            @if ($materi->group_umum == null)
                                                Group Kelas Tidak Ada
                                            @else
                                                <a href="{{ $materi->group_umum}}" class="btn btn-sm btn-success" target="_blank"><i class="fab fa-whatsapp"></i> Join Group WA</a>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
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
                                <h5 class="card-title text-white text-center">{{ $detail->judul}} - Kelas {{ strtoupper($detail->kelas)}}</h5>
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
