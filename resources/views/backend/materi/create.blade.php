@extends('layouts.back-main')

@section('title','Tambah Materi')

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
                                Tambah Materi
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('materi.store')}}" method="POST">
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

                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ old('deskripsi')}}</textarea>
                                    @error('deskripsi')
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
                                <div class="form-group">
                                    <label for="">Group WA Kelas A</label>
                                    <input type="text" name="group_a" class="form-control" value="{{ old('group_a')}}" placeholder="ex: https://chat.whatsapp.com/qewqewqrqrcc">
                                </div>
                                <div class="form-group">
                                    <label for="">Group WA Kelas B</label>
                                    <input type="text" name="group_b" class="form-control" value="{{ old('group_b')}}" placeholder="ex: https://chat.whatsapp.com/qewqewqrqrcc">
                                </div>
                                <div class="form-group">
                                    <label for="">Group WA Kelas C</label>
                                    <input type="text" name="group_c" class="form-control" value="{{ old('group_c')}}" placeholder="ex: https://chat.whatsapp.com/qewqewqrqrcc">
                                </div>
                                <div class="form-group">
                                    <label for="">Group WA Kelas D</label>
                                    <input type="text" name="group_d" class="form-control" value="{{ old('group_d')}}" placeholder="ex: https://chat.whatsapp.com/qewqewqrqrcc">
                                </div>
                                <div class="form-group">
                                    <label for="">Group WA Kelas E</label>
                                    <input type="text" name="group_e" class="form-control" value="{{ old('group_e')}}" placeholder="ex: https://chat.whatsapp.com/qewqewqrqrcc">
                                </div>
                                <div class="form-group">
                                    <label for="">Group WA Kelas F</label>
                                    <input type="text" name="group_f" class="form-control" value="{{ old('group_f')}}" placeholder="ex: https://chat.whatsapp.com/qewqewqrqrcc">
                                </div>
                                <div class="form-group">
                                    <label for="">Group WA Kelas G</label>
                                    <input type="text" name="group_g" class="form-control" value="{{ old('group_g')}}" placeholder="ex: https://chat.whatsapp.com/qewqewqrqrcc">
                                </div>
                                <div class="form-group">
                                    <label for="">Group WA Kelas H</label>
                                    <input type="text" name="group_h" class="form-control" value="{{ old('group_h')}}" placeholder="ex: https://chat.whatsapp.com/qewqewqrqrcc">
                                </div>
                                <div class="form-group">
                                    <label for="">Group WA Kelas Umum</label>
                                    <input type="text" name="group_umum" class="form-control" value="{{ old('group_umum')}}" placeholder="ex: https://chat.whatsapp.com/qewqewqrqrcc">
                                </div>
                                <div class="float-right">
                                    <a href="{{ route('materi.index')}}" class="btn btn-secondary">Kembali</a>
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
