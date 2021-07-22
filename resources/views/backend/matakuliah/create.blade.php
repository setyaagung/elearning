@extends('layouts.back-main')

@section('title','Tambah Mata Kuliah')

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
                                Tambah Mata Kuliah
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('matakuliah.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Nama Mata Kuliah</label>
                                    <input type="text" class="form-control @error('nama_matkul') is-invalid @enderror" name="nama_matkul" value="{{ old('nama_matkul') }}" autofocus>
                                    @error('nama_matkul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select class="form-control @error('kategori') is-invalid @enderror" name="kategori">
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="Akuntansi" {{ old('kategori') == 'Akuntansi' ? 'selected':''}}>Akuntansi</option>
                                        <option value="Managemen" {{ old('kategori') == 'Managemen' ? 'selected':''}}>Managemen</option>
                                        <option value="Umum" {{ old('kategori') == 'Umum' ? 'selected':''}}>Umum</option>
                                    </select>
                                    @error('kategori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="float-right">
                                    <a href="{{ route('matakuliah.index')}}" class="btn btn-secondary">Kembali</a>
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
