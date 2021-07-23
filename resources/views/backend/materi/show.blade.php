@extends('layouts.back-main')

@section('title')
    Detail Materi {{ $materi->matakuliah->nama_matkul}}
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
                                Detail Materi {{ $materi->matakuliah->nama_matkul}}
                            </h3>
                            <a href="{{ route('create_detail',$materi->id_materi)}}" class="btn btn-primary btn-sm float-right">Tambah</a>
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
                                        <th>JUDUL</th>
                                        <th>DESKRIPSI</th>
                                        <th>VIDEO</th>
                                        <th>FILE</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $detail)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $detail->judul}}</td>
                                            <td>{{ str_limit($detail->deskripsi,40)}}</td>
                                            <td>
                                                @if ($detail->video == null)

                                                @else
                                                    <a href="{{ Storage::url($detail->video)}}" class="btn btn-sm btn-secondary" target="_blank"><i class="fas fa-video"></i> Lihat Video</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($detail->file == null)

                                                @else
                                                    <a href="{{ Storage::url($detail->file)}}" class="btn btn-sm btn-secondary" target="_blank"><i class="fas fa-file-pdf"></i> Lihat File</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('edit_detail',[$materi->id_materi,$detail->id_detail_materi])}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                <form action="{{ route('destroy_detail', [$materi->id_materi,$detail->id_detail_materi])}}" method="POST" class="d-inline">
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
