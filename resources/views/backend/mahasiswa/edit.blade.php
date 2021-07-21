@extends('layouts.back-main')

@section('title','Edit Mahasiswa')

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
                                Edit Mahasiswa
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('mahasiswa.update',$mahasiswa->id_mahasiswa)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="">NIM</label>
                                    <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ $mahasiswa->nim }}" autofocus>
                                    @error('nim')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Mahasiswa</label>
                                    <input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror" name="nama_mahasiswa" value="{{ $mahasiswa->nama_mahasiswa }}">
                                    @error('nama_mahasiswa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Kelas</label>
                                    <select name="id_kelas" class="form-control @error('id_kelas') is-invalid @enderror">
                                        <option value="">-- Pilih Kelas --</option>
                                        @foreach ($kelases as $kelas)
                                            <option value="{{ $kelas->id_kelas}}" {{ $mahasiswa->id_kelas == $kelas->id_kelas ? 'selected':''}}>{{ $kelas->nama_kelas}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_kelas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Program Studi</label>
                                    <select name="progdi" class="form-control @error('progdi') is-invalid @enderror">
                                        <option value="">-- Pilih Program Studi --</option>
                                        <option value="S1 - Managemen" {{ $mahasiswa->progdi == 'S1 - Managemen' ? 'selected':''}}>S1 - Managemen</option>
                                        <option value="S1 - Akuntansi" {{ $mahasiswa->progdi == 'S1 - Akuntansi' ? 'selected':''}}>S1 - Akuntansi</option>
                                    </select>
                                    @error('progdi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="float-right">
                                    <a href="{{ route('mahasiswa.index')}}" class="btn btn-secondary">Kembali</a>
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
