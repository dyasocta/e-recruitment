@extends('layouts.noapp2')

@section('content')

    <div class="container-fluid">
        <a  href="{{ url('/') }}" >
            <img src="asset/img/logo1.png"  alt="" width="auto" height="40" class="position-absolute top-0 end-0" style="padding-right: 2%">
        </a>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row mt-5">
                <div class="mb-3 col-md-6">
                    <div class="card shadow" style="border-radius: 40px; margin-right: 6%; margin-left: 6%">
                        <div class="mt-3 mb-2 ms-4 me-4">
                            <div class="card-body">

                                <p class="p-0 m-0 fw-bold text-end">Sudah punya akun?</p>

                                @if (Route::has('login'))
                                    <a class="p-0 nav-link text-end" href="{{ route('login') }}" style="color: #E8630A">
                                        {{ __('Masuk') }}
                                    </a>
                                @endif

                                <p class="fs-2 fw-bold">Registrasi</p>

                                <div class="form-group mb-1">
                                    <label for="kualifikasi" class="col-sm-12 col-form-label">Kualifikasi :</label>

                                    <div class="col-sm-12">
                                        <select name="kualifikasi" id="kualifikasi" class="form-select" >
                                            <option value="">Pilih Kualifikasi</option>
                                            <option value="freelance" {{ old('kualifikasi') == "freelance" ? 'selected' : '' }}>Freelance</option>
                                            <option value="magang" {{ old('kualifikasi') == "magang" ? 'selected' : '' }}>Magang/PKL/PSG</option>
                                            <option value="mobile" {{ old('kualifikasi') == "mobile" ? 'selected' : '' }}>Mobile Developer IOS/Android</option>
                                            <option value="juniorweb" {{ old('kualifikasi') == "juniorweb" ? 'selected' : '' }}>Junior Web Developer</option>
                                            <option value="seniorweb" {{ old('kualifikasi') == "seniorweb" ? 'selected' : '' }}>Senior Web Developer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mb-1 d-none">
                                    <label for="level" class="col-md-12 col-form-label text-start">
                                        {{ __('Level') }} :
                                    </label>

                                    <div class="col-md-12">
                                        <input id="level" type="text" class="form-control @error('level') is-invalid @enderror"
                                            name="level" value="{{ ('user') }}"   autocomplete="level">

                                        @error('level')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-1">
                                    <label for="no_ktp" class="col-sm-12 col-form-label">Nomor Identitas :</label>

                                    <div class="col-sm-12">
                                        {{-- <input id="level" name="level" type="hidden" value="user"> --}}
                                        <input id="no_ktp" type="text" maxlength="16" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                            class="form-control @error('no_ktp') is-invalid @enderror"
                                            name="no_ktp" value="{{ old('no_ktp') }}" placeholder="Nomor KTP"  autocomplete="no_ktp">

                                        @error('no_ktp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-1">
                                    <label for="name" class="col-md-12 col-form-label text-start">
                                        {{ __('Nama Lengkap') }} :
                                    </label>

                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" placeholder="Nama Lengkap"  autocomplete="name">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-1">
                                    <label for="tempat_lahir" class="col-sm-12 col-form-label">Tempat Lahir :</label>

                                    <div class="col-sm-12">
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                        name="tempat_lahir" value="{{ old('tempat_lahir') }}" id="tempat_lahir" placeholder="Tempat Lahir" >

                                        @error('tempat_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="tanggal_lahir" class="col-sm-12 col-form-label">Tanggal Lahir</label>

                                    <div class="col-sm-12">
                                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" id="tanggal_lahir" >

                                        @error('tanggal_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5 col-md-6">
                    <div class="card shadow" style="border-radius: 40px; height: 106%; margin-right: 6%; margin-left: 6%">
                        <div class="card-body">
                            <div class="mt-2 mb-2 ms-4 me-4">

                                <div class="form-group mb-1">
                                    <label for="jenis_kelamin" class="col-sm-12 col-form-label">Jenis Kelamin :</label>

                                    <div class="col-sm-12">
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" >
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Pria" {{ old('jenis_kelamin') == "Pria" ? 'selected' : '' }}>Pria</option>
                                            <option value="Wanita" {{ old('jenis_kelamin') == "Wanita" ? 'selected' : '' }}>Wanita</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-1 input-group">
                                    <label for="no_hp" class="col-sm-12 col-form-label">Nomor Handphone :</label>

                                    <div class="col-sm-12">
                                        <input type="tel" maxlength="12" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                        class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" placeholder="Masukkan Nomor Handphone " value="{{ old('no_hp') }}">
                                    {{-- <span id="valid-msg" class="hide ">Valid</span><span id="error-msg" class="hide">Invalid number</span> --}}

                                        @error('no_hp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-1">
                                    <label for="email" class="col-md-12 col-form-label text-start">
                                        {{ __('Email') }} :
                                    </label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" placeholder="Masukkan Email"  autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-1">
                                    <label for="password" class="col-md-12 col-form-label text-start">
                                        {{ __('Password') }} :
                                    </label>

                                    <div class="col-md-12 input-group">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                             autocomplete="new-password" placeholder="Password">
                                        <span class="btn border" style="background-color: #f8fafc">
                                            <i class="bi bi-eye-slash " id="togglePassword" style="cursor: pointer;" ></i>
                                        </span>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <small>Untuk membuat password gunakan minimal 8 karakter, kombinasikan huruf besar,huruf kecil, angka dan simbol (.,@) </small>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="password-confirm" class="col-md-12 col-form-label text-start">
                                        {{ __('Konfirmasi Password') }} :
                                    </label>

                                    <div class="col-md-12 input-group">
                                        <input id="password-confirm" type="password"
                                            class="form-control @error('password') is-invalid @enderror" placeholder="Konfirmasi Password"
                                            name="password_confirmation" required autocomplete="new-password">
                                        <span class="btn border" style="background-color: #f8fafc">
                                            <i class="bi bi-eye-slash" id="toggleKonfirmasi" style="cursor: pointer;" ></i>
                                        </span>

                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="d-grid">
                                        <button type="submit" class="btn" style="background-color:#FE5900; color:white">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        // hide & show password///////////////////////////////////////////
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("bi-eye");
        });
        // hide & show confirm-password///////////////////////////////////////////
        const toggleKonfirmasi = document.querySelector("#toggleKonfirmasi");
        const passwords = document.querySelector("#password-confirm");

        toggleKonfirmasi.addEventListener("click", function () {
            // toggle the type attribute
            const type = passwords.getAttribute("type") === "password" ? "text" : "password";
            passwords.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("bi-eye");
        });
    </script>
    {{-- <script src="js/nomor.js"></script> --}}

    {{-- <script>
        function myFunction() {
          document.getElementById("level").defaultValue = "user";
        }
    </script> --}}
@endsection
