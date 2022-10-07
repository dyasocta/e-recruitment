@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card shadow" style="border-radius: 25px; background-color: white ">
                <h3 class="fs-5 fw-bold text-left align-middle mt-3">Halaman Input Foto
                    <hr class="diveader">
                </h3>
                <div class=" col alert alert-warning d-flex align-items-center " role="alert" style="border-radius: 5px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                        aria-label="Warning:">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    <div class="ms-1">
                        Ketentuan upload foto : <br>
                        <div class="ms-3">
                            - Foto berukjuran 2 x 3.<br>
                            - Gambar berformat .jpg.<br>
                            - Ukuran Foto maximal 2 mb.
                        </div>
                    </div>
                </div>

                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-error alert-dismissible fade show">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="col-md-12 ">
                    <h3 class="card-header fs-5 fw-bold text-left align-middle mt-3" style="border-radius: 5px">Foto Pelamar
                        {{-- <hr class="diveader"> --}}
                    </h3>
                    <div class="card-body">
                        <form action="{{ route('fotopelamar.upload') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('post') }}

                            <div class="mb-3 {{ !$errors->has('file') ?: 'has-error' }}">
                                <label for="formFile" class="form-label"><b>Pilih File</b></label>
                                <input class="form-control @error('file') is-invalid @enderror" type="file"
                                    id="file" name="file" accept=".jpe, .jpg, .jpeg">
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- <span class="help-block text-danger">{{ $errors->first('file') }}</span> --}}
                            </div>
                            <button type="submit" class="btn"
                                style="background-color: #fe5900; color:white">Upload</button>
                            <a href="{{ route('home') }}" class="btn btn-md btn-secondary">back</a>
                        </form>
                        <div class="mt-2">
                            <hr class="diveader ">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
