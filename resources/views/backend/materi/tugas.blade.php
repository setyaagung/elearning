@extends('layouts.back-main')

@section('title','Data Tugas')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">

    </div>
    <!-- /.content-header -->
    <section class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">
                                Data Tugas {{ $detail->judul}} - Kelas {{ $detail->kelas}}
                            </h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA MAHASISWA</th>
                                        <th>NIM</th>
                                        <th>KELAS</th>
                                        <th>PROGDI</th>
                                        <th>FILE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tugas as $t)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $t->mahasiswa->nama_mahasiswa}}</td>
                                            <td>{{ $t->mahasiswa->nim}}</td>
                                            <td>{{ $t->mahasiswa->kelas->nama_kelas}}</td>
                                            <td>{{ $t->mahasiswa->progdi}}</td>
                                            <td>
                                                <a href="{{ Storage::url($t->file)}}" class="btn btn-sm btn-danger" target="_blank"><i class="fas fa-file-pdf"></i> Lihat Tugas</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
