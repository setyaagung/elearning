@extends('layouts.front-main')

@section('title','Daftar E-Learning')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="kontak bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0"
                data-background="">
            </div>
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Pendaftaran Learning</h2>
                    <div class="page_link">
                        <a href="/">Beranda</a>
                        <a href="{{ route('register')}}">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="registration"></div>

    </section>
    <!--================ End Home Banner Area =================-->
    <!--================ Registration Form Area =================-->
    <div class="container mt-5 mb-5" id="registration">
        <div class="row bg-registration p-3">
            <div class="col-md-12 text-center">
                <p class="registration-title font-weight-bold display-4 mt-4" style="font-size: 50px;">
                    Pendaftaran Learning</p>
                <p style="line-height:-30px;margin-top:-20px;">Silahkan isi data data yang diperlukan dibawah </p>
                <hr>
            </div>
            <div class="col-md-6 mx-auto text-center">
                <img src="{{ asset('frontend/img/1261.jpg')}}" class="img-fluid img-responsive">
            </div>
            <div class="col-md-6 mx-auto my-auto mt--5">
                <form action="{{ route('register')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="label-font-register">Nama Lengkap</label>
                        <input id="name" type="text" class="effect-9 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nim" class="label-font-register">NIM</label>
                        <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}" required autocomplete="nim">
                        @error('nim')
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
                                <select>
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach ($kelases as $kelas)
                                        <option value="{{ $kelas->id_kelas}}">{{ $kelas->nama_kelas}}</option>
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
                        <label for="id_kelas" class="label-font-register">Program Studi</label>
                        <div class="input-group-icon">
                            <div class="icon"><i class="fas fa-home" aria-hidden="true"></i></div>
                            <div class="form-select" id="default-select">
                                <select>
                                    <option value="">-- Pilih Program Studi --</option>
                                    <option value="S1 - Akuntansi">S1 - Akuntansi</option>
                                    <option value="S1 - Managemen">S1 - Managemen</option>
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
                        <label for="email" class="label-font-register">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password" class="label-font-register">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password-confirm" class="label-font-register">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input checkbox" type="checkbox" id="defaultCheck1"
                            onchange="document.getElementById('btnsubmit').disabled = !this.checked;">
                        <label class=" form-check-label" for="defaultCheck1">
                            Saya setuju dan ingin melanjutkan.
                        </label>
                    </div>
                    <p class="terms">Dengan daftar anda menyetujui <i>privasi dan persyaratan ketentuan
                            hukum kami </i> .
                        baca selengkapnya <a href="#"> disini.</a></p>

                    <button type="submit" name="submit" id="btnsubmit" disabled
                        class="btn btn-block btn-modal btn-submit">Daftar
                        Sekarang!</button>
                </form>
            </div>
        </div>
    </div>
    <!--================ End Registration Form Area =================-->
@endsection

@push('scripts')
    <script>
        $('.tab1_btn').prop('disabled', !$('.tab1_chk:checked')
            .length); //initially disable/enable button based on checked length
        $('input[type=checkbox]').click(function() {
            if ($('.tab1_chk:checkbox:checked').length > 0) {
                $('.btn-submit').prop('disabled', false);
            } else {
                $('.btn-submit').prop('disabled', true);
            }
        });
    </script>
@endpush
