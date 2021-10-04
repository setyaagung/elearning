@extends('layouts.back-main')

@section('title')
    Tambah Detail Data Buku Kemajuan Perkuliahan - {{ $perkuliahan->matakuliah->nama_matkul}}
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
                                Tambah Detail Data Buku Kemajuan Perkuliahan - {{ $perkuliahan->matakuliah->nama_matkul}} Semester {{ $perkuliahan->semester}}
                            </h3>
                        </div>
                        <div class="card-body">
                            @if ($message = Session::get('create'))
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> {{$message}}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form action="{{ route('store_detail_perkuliahan')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_perkuliahan" value="{{ $perkuliahan->id_perkuliahan}}">
                                <div class="form-group">
                                    <label for="">Tanggal Perkuliahan</label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" autofocus required>
                                    @error('tanggal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Kompetensi Dasar</label>
                                    <textarea name="kompetensi_dasar" class="form-control" rows="3">{{ old('kompentensi_dasar')}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Sub Kompetensi</label>
                                    <textarea name="sub_kompetensi" class="form-control" rows="3">{{ old('sub_kompetensi')}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">File</label>
                                    <input type="file" class="p-1 form-control @error('file') is-invalid @enderror" name="file" value="{{ old('file')}}" required>
                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="float-right">
                                    <a href="{{ route('perkuliahan.show',$perkuliahan->id_perkuliahan)}}" class="btn btn-secondary">Kembali</a>
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
