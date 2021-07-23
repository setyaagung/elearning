@extends('layouts.back-main')

@section('title','Dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $dosen}}</h3>
                            <p>Dosen</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $mahasiswa}}</h3>
                            <p>Mahasiswa</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $matakuliah}}</h3>
                            <p>Mata Kuliah</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $materi}}</h3>
                            <p>Materi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-archive"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">
                                Aturan Input Materi :
                            </h3>
                        </div>
                        <div class="card-body">
                            <ol>
                                <li>Login ke sistem sesuai dengan email dan password</li>
                                <li>Pilih menu materi</li>
                                <li>Pilih tombol tambah pada tampilan data materi</li>
                                <li>Inputkan sesuai dengan form</li>
                                <li>Jika sudah klik tombol simpan untuk melakukan submit</li>
                                <li>Jika berhasil akan menampilkan pesan berhasil membuat materi baru</li>
                                <li>Pilih detail materi</li>
                                <li>Sistem akan menampilkan data detail materi yang dipilih</li>
                                <li>Klik tombol tambah pada tampilan detail materi</li>
                                <li>Inputkan sesuai form</li>
                                <li>Klik tombol simpan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
