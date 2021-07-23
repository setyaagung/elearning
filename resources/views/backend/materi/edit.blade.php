@extends('layouts.back-main')

@section('title','Edit Materi')

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
                                Edit Materi
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('materi.update',$materi->id_materi)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="">Mata Kuliah</label>
                                    <select id="id_matkul" name="id_matkul" class="form-control @error('id_matkul') is-invalid @enderror select2" style="width: 100%;">
                                        <option value="">-- Pilih Mata Kuliah --</option>
                                        @foreach ($matkuls as $matkul)
                                            <option value="{{ $matkul->id_matkul}}" {{ $materi->id_matkul == $matkul->id_matkul ? 'selected':''}}>{{ $matkul->nama_matkul}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_matkul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select class="form-control @error('kategori') is-invalid @enderror" name="kategori">
                                        <option value="">-- Pilih Kategori --</option>
                                        <option value="Akuntansi" {{ $materi->kategori == 'Akuntansi' ? 'selected':''}}>Akuntansi</option>
                                        <option value="Managemen" {{  $materi->kategori == 'Managemen' ? 'selected':''}}>Managemen</option>
                                        <option value="Umum" {{  $materi->kategori == 'Umum' ? 'selected':''}}>Umum</option>
                                    </select>
                                    @error('kategori')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ $materi->deskripsi}}</textarea>
                                    @error('deskripsi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Semester</label>
                                    <input type="number" min="1" max="8" name="semester" class="form-control @error('semester') is-invalid @enderror" value="{{ $materi->semester}}" placeholder="max : 8">
                                    @error('semester')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="float-right">
                                    <a href="{{ route('materi.index')}}" class="btn btn-secondary">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
