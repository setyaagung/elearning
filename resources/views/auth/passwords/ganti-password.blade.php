@extends('layouts.front-main')

@section('title', 'Ganti Password')
@section('content')
<section class="container p-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white">
                        <h3 class="card-title font-weight-bold text-dark">
                            Ganti Password
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
                        <form action="{{ route('home.ganti-password',$user->id)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input id="nama" type="text" class="form-control" name="name" value="{{ $user->name}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Password Baru</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Konfirmasi Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
