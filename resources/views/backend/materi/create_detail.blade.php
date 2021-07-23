@extends('layouts.back-main')

@section('title')
    Tambah Materi {{ $materi->matakuliah->nama_matkul}}
@endsection

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
                                Tambah Materi {{ $materi->matakuliah->nama_matkul}}
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store_detail')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_materi" value="{{ $materi->id_materi}}">
                                <div class="form-group">
                                    <label for="">Judul Materi</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul')}}" autofocus>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Video</label>
                                    <input type="file" class="p-1 form-control @error('video') is-invalid @enderror" name="video" value="{{ old('video')}}">
                                    @error('video')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">File</label>
                                    <input type="file" class="p-1 form-control @error('file') is-invalid @enderror" name="file" value="{{ old('file')}}">
                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ old('deskripsi')}}</textarea>
                                    @error('deskripsi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="float-right">
                                    <a href="{{ route('materi.show',$materi->id_materi)}}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
