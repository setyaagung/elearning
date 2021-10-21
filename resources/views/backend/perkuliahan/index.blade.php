@extends('layouts.back-main')

@section('title','Data Buku Kemajuan Perkuliahan')

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
                                Data Buku Kemajuan Perkuliahan
                            </h3>
                            @if (Auth::user()->id_role != 4)
                                <div class="float-right">
                                    <a href="{{ route('perkuliahan.create')}}" class="btn btn-primary btn-sm">Tambah</a>
                                </div>
                            @endif
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
                                        <th>KELAS</th>
                                        <th>PRODI</th>
                                        <th>SEMESTER</th>
                                        <th>DOSEN</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($perkuliahans as $perkuliahan)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $perkuliahan->matakuliah->nama_matkul}}</td>
                                            <td>{{ $perkuliahan->kelas}}</td>
                                            <td>{{ $perkuliahan->program_studi}}</td>
                                            <td>{{ $perkuliahan->semester}}</td>
                                            <td>{{ $perkuliahan->user->name}}</td>
                                            <td>
                                                <a href="{{ route('perkuliahan.show',$perkuliahan->id_perkuliahan)}}" class="btn btn-info btn-sm"><i class="fas fa-file"></i> Detail</a>
                                                @if (Auth::user()->id_role != 4)
                                                    <a href="{{ route('perkuliahan.edit',$perkuliahan->id_perkuliahan)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                    <form action="{{ route('perkuliahan.destroy', $perkuliahan->id_perkuliahan)}}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini??')"><i class="fas fa-trash"></i> Hapus</button>
                                                    </form>
                                                @endif
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
