@extends('admin.layouts.appadmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card shadow" style="border-radius: 25px;">
                <h3 class="mt-2">Halaman Daftar Pelamar Junior Web Developer</h3>
                <hr>

                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-error alert-dismissible fade show">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="col-md-12">
                    <h3 class="card-header fs-5 fw-bold text-left align-middle" style="border-radius: 5px">
                        Daftar Pelamar Junior Web Developer
                    </h3>
                    <div class="card-body">
                        @if (Auth::user()->level == 'admin')
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center align-middle" style="width: 50%">Nama
                                                Pelamar</th>
                                            <th scope="col" class="text-center align-middle" style="width: 50%">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                            @if ($user->kualifikasi == 'juniorweb')
                                                <tr>
                                                    <td class="text-left align-middle">
                                                        {{ $user->name }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <a class="btn" style="background-color: #FE5900; color:white" href="{{route('juniorDev.tampil_data', $user->id)}}"><i class="bi bi-eye me-1" ></i><b>Preview</b></a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        @else
                        @endif
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
