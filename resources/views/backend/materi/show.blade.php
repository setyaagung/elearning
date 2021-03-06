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
                            <div class="float-right">
                                <a href="{{ route('materi.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
                                @if (Auth::user()->id_role != 4)
                                    <a href="{{ route('create_detail',$materi->id_materi)}}" class="btn btn-primary btn-sm">Tambah</a>
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
                            <table id="example1" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>JUDUL</th>
                                        <th>KELAS</th>
                                        <th>DESKRIPSI</th>
                                        <th>STATUS</th>
                                        <th>VIDEO</th>
                                        <th>FILE</th>
                                        <th>ZOOM</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $detail)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $detail->judul}} - <br>
                                                    @if ($detail->tanggal != null)
                                                        {{ \Carbon\Carbon::parse($detail->tanggal)->isoFormat('D MMMM Y')}},
                                                    @endif
                                                    @if ($detail->jam_mulai && $detail->jam_selesai)
                                                        Waktu : {{ Carbon\Carbon::parse($detail->jam_mulai)->format('H:i')}} - {{ Carbon\Carbon::parse($detail->jam_selesai)->format('H:i')}} WIB</td>
                                                    @endif

                                            <td>{{ $detail->kelas}}</td>
                                            <td>{{ $detail->deskripsi}}</td>
                                            <td>
                                                @if (Auth::user()->id_role != 4)
                                                    @if ($detail->status == 1)
                                                        <input type="checkbox" class="status" name="status" data-id="{{ $detail->id_detail_materi}}" checked>
                                                    @else
                                                        <input type="checkbox" class="status" name="status" data-id="{{ $detail->id_detail_materi}}">
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if ($detail->video == null)
                                                    Tidak ada video
                                                @else
                                                    <a href="https://www.youtube.com/watch?v={{ $detail->video}}" class="btn btn-sm btn-secondary" target="_blank"><i class="fas fa-video"></i> Lihat Video</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($detail->file == null)
                                                    Tidak ada file
                                                @else
                                                    <a href="{{ Storage::url($detail->file)}}" class="btn btn-sm btn-secondary" target="_blank"><i class="fas fa-file-pdf"></i> Lihat File</a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($detail->zoom == null)
                                                    Tidak ada zoom
                                                @else
                                                    <a href="{{ $detail->zoom}}" class="btn btn-sm btn-primary" target="_blank"><i class="fas fa-video"></i> Join Zoom</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('print_absensi',[$materi->id_materi,$detail->id_detail_materi])}}" class="btn btn-sm btn-info" target="_blank"><i class="fas fa-file-alt"></i> Absensi</a>
                                                @if ($detail->jenis == 'Tugas')
                                                    <a href="{{ route('tugas',[$materi->id_materi,$detail->id_detail_materi])}}" class="btn btn-sm btn-primary"><i class="fas fa-file-archive"></i> Lihat Tugas</a>
                                                @endif
                                                <a href="{{ route('courses',[$materi->id_materi,$detail->slug])}}" class="btn btn-sm btn-success" target="_blank"><i class="fas fa-folder"></i> Lihat Materi</a>
                                                @if (Auth::user()->id_role != 4)
                                                    <a href="{{ route('edit_detail',[$materi->id_materi,$detail->id_detail_materi])}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                                    <form action="{{ route('destroy_detail', [$materi->id_materi,$detail->id_detail_materi])}}" method="POST" class="d-inline">
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
                    url: '/update-status/detail/'+id,
                    type: 'GET',
                    success: function (response) {
                        alert('Status Detail Materi Berhasil Diperbarui') ? "": location.reload();
                        //alertify.set('notifier', 'position', 'top-right');
                        //alertify.success(response.status);
                    }
                });

            });
        });
    </script>
@endpush
