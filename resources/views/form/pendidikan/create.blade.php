@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card shadow" style="border-radius: 25px; background-color: white ">
                <h3 class="fs-5 fw-bold text-left align-middle mt-3">Halaman Input Pendidikan
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
                    <h3 class="card-header fs-5 fw-bold text-left align-middle" style="border-radius: 5px">Pendidikan
                        {{-- <hr class="diveader"> --}}
                    </h3>
                    <div class="card-body">
                        <form action="{{ route('pendidikan.store') }}" method="POST">
                            @csrf
                            <div class="form-group row mb-2">
                                <label for="jenjang" class="col-sm-3 col-form-label">JENJANG</label>
                                <div class="col-sm-9">
                                    <select name="jenjang" class="form-select" required>
                                        <option value="">PILIH JENJANG</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SLTA / SEDERAJAT">SLTA / SEDERAJAT</option>
                                        <option value="D3">D3</option>
                                        <option value="D4 / S1">D4 / S1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="institusi" class="col-sm-3 col-form-label">SEKOLAH (INSTITUSI)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control phone" name="institusi" id="institusi"
                                        placeholder="NAMA INSTITUSI/SEKOLAH" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="jurusan" class="col-sm-3 col-form-label">JURUSAN</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control phone" name="jurusan" id="jurusan"
                                        placeholder="NAMA JURUSAN" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="kota" class="col-sm-3 col-form-label">KOTA</label>
                                <div class="col-sm-9">
                                    <select name="kota" class="form-select" id="kota" required>
                                        <option></option>
                                        @foreach ($regencies as $kota)
                                            <option value="{{ $kota->id }}">{{ $kota->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="tanggal_lulus" class="col-sm-3 col-form-label">TANGGAL LULUS</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="tanggal_lulus" id="tanggal_lulus"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="nilai_uan_ipk" class="col-sm-3 col-form-label">NILAI RATA-RATA UAN / IPK</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nilai_uan_ipk" id="nilai_uan_ipk"
                                        placeholder="NILAI RATA-RATA UAN / IPK" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="akreditasi" class="col-sm-3 col-form-label">AKREDITASI</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control phone" name="akreditasi" id="akreditasi"
                                        placeholder="AKREDITASI" required>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-md" style="background-color: #fe5900; color:white">Save</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#kota').select2({
                placeholder: 'PILIH KOTA',
                theme: 'bootstrap-5',
                dropdownCssClass: '#kota',
                allowClear: true
            });
        });
    </script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
@endsection
