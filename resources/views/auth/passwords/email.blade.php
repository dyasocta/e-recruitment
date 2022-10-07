@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card shadow" style="border-radius: 40px">
                    {{-- <div class="card-header">{{ __('Reset Password') }}</div> --}}
                    <div class="mt-3 mb-1 ms-4 me-4">
                        <div class="card-body">
                            <p class="fs-2 fw-bold text-center align-middle">{{ __('Reset Password') }}</p>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="mb-3 row">
                                    <label for="email" class="col-md-12 col-form-label text-start">
                                        {{ __('E-Mail Address') }} :
                                    </label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn" style="background-color:#FE5900; color:white">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
