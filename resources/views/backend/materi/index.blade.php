@extends('layouts.back-main')

@section('title','Data Materi')

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
                                Data Materi
                            </h3>
                            <a href="{{ route('materi.create')}}" class="btn btn-primary btn-sm float-right">Tambah</a>
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
                            @if ($message = Session::get('update'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Updated!</strong> {{$message}}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if ($message = Session::get('delete'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Deleted!</strong> {{$message}}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>MATA KULIAH</th>
                                        <th>DOSEN</th>
                                        <th>KATEGORI</th>
                                        <th>DESKRIPSI</th>
                                        <th>SEMESTER</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materis as $materi)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $materi->matakuliah->nama_matkul}}</td>
                                            <td>{{ $materi->user->name}}</td>
                                            <td>{{ $materi->kategori}}</td>
                                            <td>{{ str_limit($materi->deskripsi,20)}}</td>
                                            <td>{{ $materi->semester}}</td>
                                            <td>
                                                <a href="{{ route('materi.show',$materi->id_materi)}}" class="btn btn-success btn-sm"><i class="fas fa-file"></i> Detail Materi</a>
                                                <a href="{{ route('materi.edit',$materi->id_materi)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                <form action="{{ route('materi.destroy', $materi->id_materi)}}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini??')"><i class="fas fa-trash"></i> Hapus</button>
                                                </form>
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
