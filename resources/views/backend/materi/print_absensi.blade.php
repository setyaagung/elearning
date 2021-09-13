@extends('layouts.print-layout')

@section('title','Daftar Absensi Mahasiswa')

@section('content')
    <div class="row" style="margin-bottom: -115px">
        <div class="col-md-2">
            <img src="{{ asset('img/logo.png')}}" class="img-fluid mt-2" style="width: 15%;height: 105px">
        </div>
        <div class="col-md-8">
            <div class="text-center">
                <p class="font-weight-bold" style="font-size: 18px;margin-bottom: -5px">
                    SEKOLAH TINGGI ILMU EKONOMI
                </p>
                <p class="font-weight-bold" style="font-size: 22px">CENDEKIA KARYA UTAMA</p>
                <p style="font-size: 14px;margin-top: -15px;margin-bottom: -10px">
                    Jl. Tegalsari Raya No. 102 Semarang Telp./Fax. (024) 67440587
                    <br>
                    Website : www.cendekiaku.ac.id / www.cendekiaku.com
                    <br>
                    Email : info@cendekiaku.com / admin@cendekiaku.com
                </p>
                <hr style="border: 1px solid black">
                <hr style="border: black;margin-top: -14px">
            </div>
        </div>
        <div class="col-md-2">

        </div>
    </div>

    <div class="header text-center mt-1">
        <h5 class="font-weight-bold"><u>DAFTAR ABSENSI MAHASISWA</u></h5>
    </div>

    <div class="row" style="font-size: 14px;">
        <div class="col-12">
            <table class="table table-sm table-borderless" style="width: 100%">
                <tbody>
                    <tr>
                        <td>MATA KULIAH</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>{{ strtoupper($materi->matakuliah->nama_matkul)}}</td>
                    </tr>
                    <tr>
                        <td>MATERI</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>{{ strtoupper($detail->judul)}}</td>
                    </tr>
                    <tr>
                        <td>SEMESTER</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>{{ strtoupper($materi->semester)}}</td>
                    </tr>
                    <tr>
                        <td>DOSEN PENGAMPU</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>{{ strtoupper($materi->user->name)}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <table class="table table-sm table-bordered" style="font-size: 14px;width:100%">
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA MAHASISWA</th>
                <th>NIM</th>
                <th>KELAS</th>
                <th>PROGRAM STUDI</th>
                <th>WAKTU ABSENSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absensi as $ab)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $ab->mahasiswa->nama_mahasiswa}}</td>
                    <td>{{ $ab->mahasiswa->nim}}</td>
                    <td>{{ $ab->mahasiswa->kelas->nama_kelas}}</td>
                    <td>{{ $ab->mahasiswa->progdi}}</td>
                    <td>{{ $ab->waktu}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
