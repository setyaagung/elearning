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
                            <div class="float-right">
                                <a href="{{ route('semester.courses')}}" class="btn btn-success btn-sm" target="_blank"><i class="fas fa-folder-open"></i> Lihat Materi Di Website</a>
                                @if (Auth::user()->id_role != 4)
                                    <a href="{{ route('materi.create')}}" class="btn btn-primary btn-sm">Tambah</a>
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
                                        <th>MATA KULIAH</th>
                                        <th>DOSEN</th>
                                        <th>KATEGORI</th>
                                        <th>DESKRIPSI</th>
                                        <th>SEMESTER</th>
                                        <th>STATUS</th>
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
                                                @if (Auth::user()->id_role != 4)
                                                    @if ($materi->status == 1)
                                                        <input type="checkbox" class="status" name="status" data-id="{{ $materi->id_materi}}" checked>
                                                    @else
                                                        <input type="checkbox" class="status" name="status" data-id="{{ $materi->id_materi}}">
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('materi.show',$materi->id_materi)}}" class="btn btn-info btn-sm"><i class="fas fa-file"></i> Detail Materi</a>
                                                @if (Auth::user()->id_role != 4)
                                                    <a href="{{ route('materi.edit',$materi->id_materi)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                    <form action="{{ route('materi.destroy', $materi->id_materi)}}" method="POST" class="d-inline">
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

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.status').click(function (e) {
                e.preventDefault();
                var id = $(this).attr('data-id');

                $.ajax({
                    url: '/status/'+id,
                    type: 'GET',
                    success: function (response) {
                        alert('Status Materi Berhasil Diperbarui') ? "": location.reload();
                        //alertify.set('notifier', 'position', 'top-right');
                        //alertify.success(response.status);
                    }
                });

            });
        });
    </script>
@endpush
