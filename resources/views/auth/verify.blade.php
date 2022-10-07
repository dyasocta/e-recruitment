@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 style="text-align: center">Hai! {{ Auth::user()->name }}</h2>
                <div class="card shadow position-absolute top-50 start-50 translate-middle" style="border-radius: 25px" >

                    <div class="card-header " style="border-top-left-radius: 25px;border-top-right-radius: 25px" >{{ __('verifikasi email Anda!') }} </div>

                    <div class="card-body mt-2" >
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                            </div>
                        @endif

                        {{ __('Sebelum melanjutkan, harap periksa email Anda untuk tautan verifikasi.') }}
                        {{ __(' Jika Anda tidak menerima email.') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('klik di sini untuk mendapatkan tautan verifikasi') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
