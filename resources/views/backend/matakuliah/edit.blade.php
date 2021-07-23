@extends('layouts.back-main')

@section('title','Edit Mata Kuliah')

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
                                Edit Mata Kuliah
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('matakuliah.update',$matkul->id_matkul)}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="">Nama Mata Kuliah</label>
                                    <input type="text" class="form-control @error('nama_matkul') is-invalid @enderror" name="nama_matkul" value="{{ $matkul->nama_matkul }}" autofocus>
                                    @error('nama_matkul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="float-right">
                                    <a href="{{ route('matakuliah.index')}}" class="btn btn-secondary">Kembali</a>
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
