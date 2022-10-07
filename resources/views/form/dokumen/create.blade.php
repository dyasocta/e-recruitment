@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card shadow" style="border-radius: 25px; background-color: white ">
                <h3 class="fs-5 fw-bold text-left align-middle mt-3">Halaman Input Dokumen
                    <hr class="diveader">
                </h3>

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

                <div class="col-md-12 " >
                    <h3 class="card-header fs-5 fw-bold text-left align-middle" style="border-radius: 5px">Dokumen
                        {{-- <hr class="diveader"> --}}
                    </h3>
                    <div class="card-body">
                        <form action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row mb-2">
                                <label for="jenis" class="col-sm-2 col-form-label"><b>JENIS</b></label>
                                <div class="col-sm-10">
                                    <select name="jenis" class="form-select" >
                                        <option value=""></option>
                                        <option value="IDENTITAS KTP">IDENTITAS KTP</option>
                                        <option value="IJAZAH SD">IJAZAH SD</option>
                                        <option value="IJAZAH SMP">IJAZAH SMP</option>
                                        <option value="IJAZAH SLTA">IJAZAH SLTA</option>
                                        <option value="IJAZAH D4 / S1">IJAZAH D4 / S1</option>
                                        <option value="TRANSKRIP UN / UAN SLTA">TRANSKRIP UN / UAN SLTA</option>
                                        <option value="TRANSKRIP NILAI D4 / S1">TRANSKRIP NILAI D4 / S1</option>
                                        <option value="AKREDITASI S1">AKREDITASI S1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="file" class="col-sm-2 col-form-label"><b>FILE</b></label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="file" id="file" >
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md" style="background-color: #fe5900; color:white">Upload</button>
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
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"701dfd4d3e69495f","version":"2021.12.0","r":1,"token":"1ef4d2b656e941dc9d0531846d5b4bcc","si":100}' crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
        });
    </script>
@endsection
