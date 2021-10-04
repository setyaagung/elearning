@extends('layouts.back-main')

@section('title','Tambah Buku Kemajuan Perkuliahan')

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
                                Tambah Buku Kemajuan Perkuliahan
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('perkuliahan.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Mata Kuliah</label>
                                    <select id="id_matkul" name="id_matkul" class="form-control @error('id_matkul') is-invalid @enderror select2" style="width: 100%;">
                                        <option value="">-- Pilih Mata Kuliah --</option>
                                        @foreach ($matkuls as $matkul)
                                            <option value="{{ $matkul->id_matkul}}" {{ old('id_matkul') == $matkul->id_matkul ? 'selected':''}}>{{ $matkul->nama_matkul}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_matkul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Program Studi</label>
                                    <select class="form-control @error('program_studi') is-invalid @enderror" name="program_studi">
                                        <option value="">-- Pilih Program Studi --</option>
                                        <option value="Akuntansi" {{ old('program_studi') == 'Akuntansi' ? 'selected':''}}>Akuntansi</option>
                                        <option value="Manajemen" {{ old('program_studi') == 'Manajemen' ? 'selected':''}}>Manajemen</option>
                                        <option value="Umum" {{ old('program_studi') == 'Umum' ? 'selected':''}}>Umum</option>
                                    </select>
                                    @error('program_studi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Kelas</label>
                                    <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" value="{{ old('kelas')}}">
                                    @error('kelas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Semester</label>
                                    <input type="number" min="1" max="8" name="semester" class="form-control @error('semester') is-invalid @enderror" value="{{ old('semester')}}" placeholder="max : 8">
                                    @error('semester')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="float-right">
                                    <a href="{{ route('perkuliahan.index')}}" class="btn btn-secondary">Kembali</a>
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
