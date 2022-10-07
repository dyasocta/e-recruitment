@extends('layouts.noapp')

@section('content')
<div class="">
    <div class="container-fluid">;
        <a  href="{{ url('/') }}" >
            <img src="asset/img/logo1.png"  alt="" width="auto" height="40" class="position-absolute top-0 end-0" style="padding-right: 2%" >
        </a>
        {{-- <img src="asset/login/saly-2.png"  alt="" width="auto" height="450px" class="position-absolute bottom-0 end-0">
        <img src="asset/login/saly-3.png"  alt="" width="auto" height="256px" class="position-absolute top-0 start-0"> --}}

        <div class="row mt-4" style="margin-right: 6%; margin-left: 6%">
            <div class="col-md-5" style="width: 500px">
                <div class="card shadow" style="border-radius: 40px">
                    <div class="mt-3 mb-1 ms-4 me-4">
                        <div class="card-body">
                            <p class="fs-5 fw-bold text-center align-middle">Selamat Datang <br class="p-0 m-0"> E-Recruitment mascitra.com</p>
                            <p class="fs-2 fw-bold">Masuk</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="col-md-12 col-form-label text-start fw-bold">
                                        {{ __('Masukkan Email') }}
                                    </label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Username atau Email anda">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <label for="password" class="col-md-12 col-form-label text-start fw-bold">
                                        {{ __('Masukkan Password') }}
                                    </label>

                                    <div class="col-md-12 input-group">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            autocomplete="current-password" placeholder="Password">
                                        <span class="btn border" style="background-color: #f8fafc">
                                            <i class="bi bi-eye-slash " id="togglePassword" style="cursor: pointer;" ></i>
                                        </span>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="text-end">
                                        @if (Route::has('password.request'))
                                            <a class="nav-link" href="{{ route('password.request') }}" style="color: #E8630A">
                                                {{ __('Lupa Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="d-grid">
                                        <button type="submit" class="btn" style="background-color:#FE5900; color:white">
                                            {{ __('Sign In') }}
                                        </button>
                                    </div>
                                </div>

                                {{-- <!-- <div class="mb-3">
                                    <div class="col-md-6 ">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div> --> --}}

                                <div class="mb-3 text-center">
                                    <label for="registrasi" class="col-md-12 col-form-label text-start fw-bold text-center p-0 m-0">
                                        {{ __('Belum punya akun?') }}
                                    </label>
                                    @if (Route::has('register'))
                                        <a class="nav-link p-0 m-0 text-center" href="{{ route('register') }}" style="color: #E8630A">
                                            {{ __('Registrasi') }}
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5" style="width: 500px">
            </div>
        </div>
        <div style="padding-right: 2%">
            <footer  style="ms-auto">
                <ul class="mt-2 nav justify-content-end d-flex " >
                  <li class="ms-3">
                      <a href="" target="_blank" style="color: black; text-decoration:none; font-size:10pt"><i class="bi bi-globe2"></i> www.mascitra.com  </a>
                  </li>
                  <li class="ms-3">
                    <a href="mailto: info@mascitra.co.id" target="_blank" style="color: black; text-decoration:none; font-size:10pt"><i class="bi bi-envelope"></i> info@mascitra.co.id  </a>
                  </li>
                  <li class="ms-3">
                    <a href="https://instagram.com/mascitradotcom?igshid=YmMyMTA2M2Y=" target="_blank" style="color: black; text-decoration:none; font-size:10pt"><i class="bi bi-instagram"></i> mascitradotcom  </a>
                  </li>
                  <li class="ms-3">
                    <a href="tel:0331-4350050" target="_blank" style="color: black; text-decoration:none; font-size:10pt"><i class="bi bi-telephone"></i> 0331-4350050  </a>
                  </li>
                </ul>
              </footer>
        </div>
    </div>
</div>

<script>
    const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            // toggle the icon
            this.classList.toggle("bi-eye");
        });
</script>
@endsection
