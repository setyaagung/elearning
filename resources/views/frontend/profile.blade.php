@extends('layouts.front-main')

@section('title', 'Update Profile')
@section('content')
<section class="container p-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white">
                        <h3 class="card-title font-weight-bold text-dark">
                            Update Profile
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
                        <form action="{{ route('home.update-profile',$user->id)}}" method="POST">
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
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="id_kelas" class="label-font-register">Kelas</label>
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fas fa-home" aria-hidden="true"></i></div>
                                    <div class="form-select" id="default-select">
                                        <select name="id_kelas">
                                            <option value="">-- Pilih Kelas --</option>
                                            @foreach ($kelases as $kelas)
                                                <option value="{{ $kelas->id_kelas}}" {{ $mahasiswa->id_kelas == $kelas->id_kelas ? 'selected':''}}>{{ $kelas->nama_kelas}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @error('id_kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="progdi" class="label-font-register">Program Studi</label>
                                <div class="input-group-icon">
                                    <div class="icon"><i class="fas fa-home" aria-hidden="true"></i></div>
                                    <div class="form-select" id="default-select">
                                        <select name="progdi">
                                            <option value="">-- Pilih Program Studi --</option>
                                            <option value="S1 - Akuntansi" {{ $mahasiswa->progdi == 'S1 - Akuntansi' ? 'selected':''}}>S1 - Akuntansi</option>
                                            <option value="S1 - Managemen" {{ $mahasiswa->progdi == 'S1 - Managemen' ? 'selected':''}}>S1 - Managemen</option>
                                        </select>
                                    </div>
                                </div>
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

@push('scripts')
    <link rel="stylesheet" href="{{ asset('frontend/css/user_style.css')}}">
@endpush
