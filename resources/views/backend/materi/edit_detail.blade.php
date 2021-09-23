@extends('layouts.back-main')

@section('title')
    Edit Materi {{ $materi->matakuliah->nama_matkul}}
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
                                Edit Materi {{ $materi->matakuliah->nama_matkul}}
                            </h3>
                        </div>
                        <div class="card-body">
                            @if ($message = Session::get('update'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Updated!</strong> {{$message}}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form action="{{ route('update_detail',[$materi->id_materi,$detail->id_detail_materi])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="">Judul Materi</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ $detail->judul}}" autofocus>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis</label>
                                    <select name="jenis" class="form-control">
                                        <option value="Materi" {{ $detail->jenis == 'Materi' ? 'selected':''}}>Materi</option>
                                        <option value="Tugas" {{ $detail->jenis == 'Tugas' ? 'selected':''}}>Tugas</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Kelas</label>
                                    <input type="text" name="kelas" class="form-control" value="{{ $detail->kelas}}" placeholder="ex: A">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Perkuliahan</label>
                                    <input type="date" name="tanggal" class="form-control" value="{{ $detail->tanggal}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Jam Mulai Perkuliahan</label>
                                    <input type="time" name="jam_mulai" class="form-control" value="{{ $detail->jam_mulai}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Jam Selesai Perkuliahan</label>
                                    <input type="time" name="jam_selesai" class="form-control" value="{{ $detail->jam_selesai}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Video</label>
                                    <input type="text" class="form-control @error('video') is-invalid @enderror" name="video" value="{{ $detail->video}}" placeholder="Masukkan id link video youtube">
                                    @error('video')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">File</label>
                                    <input type="file" class="p-1 form-control @error('file') is-invalid @enderror" name="file" value="{{ Storage::url($detail->file)}}">
                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Zoom</label>
                                    <input type="text" name="zoom" class="form-control" value="{{ $detail->zoom}}" placeholder="ex: https://us04web.zoom.us/j/75454394887?pwd=SmlQWHhNWUxoSjloY2dDMml5WllkZz09">
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">{{ $detail->deskripsi}}</textarea>
                                    @error('deskripsi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="float-right">
                                    <a href="{{ route('materi.show',$materi->id_materi)}}" class="btn btn-secondary">Kembali</a>
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
