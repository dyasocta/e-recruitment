@extends('layouts.appCP')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-5" style="width: 500px">
            <div class="card shadow" style="border-radius: 40px">
                <div class="mt-3 mb-1 ms-4 me-4">
                    <form action="{{ route('update-password') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <p class="fs-2 fw-bold text-center align-middle">Ubah Password!</p>

                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @elseif (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                            @endif
                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">Password Lama</label>
                                <div class="input-group">
                                    <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                        placeholder="Password Lama">
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <span class="btn border" style="background-color: #f8fafc">
                                        <i class="bi bi-eye-slash " id="togglePasswordOld" style="cursor: pointer;" ></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">Password Baru</label>
                                <div class="input-group">
                                    <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                        placeholder="Password Baru">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <span class="btn border" style="background-color: #f8fafc">
                                        <i class="bi bi-eye-slash " id="togglePasswordBaru" style="cursor: pointer;" ></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Konfirmasi Password Baru</label>
                                <div class="input-group">
                                    <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                        placeholder="Konfirmasi Password Baru">
                                    <span class="btn border" style="background-color: #f8fafc">
                                        <i class="bi bi-eye-slash " id="togglePasswordKonfirmasi" style="cursor: pointer;" ></i>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn" style="background-color: #fe5900; color:white">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // hide & show password///////////////////////////////////////////
    const togglePasswordOld = document.querySelector("#togglePasswordOld");
    const password = document.querySelector("#oldPasswordInput");

    togglePasswordOld.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("bi-eye");
    });
</script>
<script>
    // hide & show password///////////////////////////////////////////
    const togglePasswordBaru = document.querySelector("#togglePasswordBaru");
    const passwords = document.querySelector("#newPasswordInput");

    togglePasswordBaru.addEventListener("click", function () {
        // toggle the type attribute
        const type = passwords.getAttribute("type") === "password" ? "text" : "password";
        passwords.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("bi-eye");
    });

    // hide & show password///////////////////////////////////////////
    const togglePasswordKonfirmasi = document.querySelector("#togglePasswordKonfirmasi");
    const passwordss = document.querySelector("#confirmNewPasswordInput");

    togglePasswordKonfirmasi.addEventListener("click", function () {
        // toggle the type attribute
        const type = passwordss.getAttribute("type") === "password" ? "text" : "password";
        passwordss.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("bi-eye");
    });
</script>
@endsection
