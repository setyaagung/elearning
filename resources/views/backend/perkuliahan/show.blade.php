@extends('layouts.back-main')

@section('title','Detail Data Buku Kemajuan Perkuliahan')

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
                                Detail Data Buku Kemajuan Perkuliahan - {{ $perkuliahan->matakuliah->nama_matkul}} Semester {{ $perkuliahan->semester}}
                            </h3>
                            <div class="float-right">
                                <a href="{{ route('perkuliahan.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
                                @if (Auth::user()->id_role != 4)
                                    <a href="{{ route('create_detail_perkuliahan',$perkuliahan->id_perkuliahan)}}" class="btn btn-primary btn-sm">Tambah</a>
                                @endif
                            </div>
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
                                        <th>HARI, TANGGAL</th>
                                        <th>KOMPETENSI DASAR</th>
                                        <th>SUB KOMPETENSI</th>
                                        <th>FILE</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $detail)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ \Carbon\Carbon::parse($detail->tanggal)->isoFormat('dddd, D MMMM Y')}}</td>
                                            <td>{{ $detail->kompetensi_dasar}}</td>
                                            <td>{{ $detail->sub_kompetensi}}</td>
                                            <td>
                                                <a href="{{ Storage::url($detail->file)}}" class="btn btn-sm btn-danger" target="_blank"><i class="fas fa-file-pdf"></i> Lihat File</a>
                                            </td>
                                            <td>
                                                @if (Auth::user()->id_role != 4)
                                                    <a href="{{ route('edit_detail_perkuliahan',[$perkuliahan->id_perkuliahan,$detail->id_detail_perkuliahan])}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                    <form action="{{ route('destroy_detail_perkuliahan', [$perkuliahan->id_perkuliahan,$detail->id_detail_perkuliahan])}}" method="POST" class="d-inline">
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
