@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card shadow" style="border-radius: 25px; background-color: white ">

                <div class="col-md-12 " >

                    <div class="mt-3">
                        <!-- Notifikasi menggunakan flash session data -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-error">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>

                    <h3 class="card-header fs-5 fw-bold text-left align-middle mt-3" style="border-radius: 5px">Biodata
                        {{-- <hr class="diveader"> --}}
                    </h3>
                    <div class="card-body">
                        <form action="{{ route('biodata.update', $biodata->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                            <div class="form-group row mb-2">
                                <label for="no_ktp" class="col-sm-3 col-form-label">NO. KTP<span style="color:red">*</span></label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control phone" name="no_ktp" value="{{ old('no_ktp', $biodata->no_ktp) }}" id="no_ktp" placeholder="NO. KTP" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="nama" class="col-sm-3 col-form-label">NAMA<span style="color:red">*</span></label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" value="{{ old('nama', $biodata->nama) }}" id="nama" placeholder="NAMA" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="tanggal_lahir" class="col-sm-3 col-form-label">TANGGAL LAHIR<span style="color:red">*</span></label>
                                <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir', $biodata->tanggal_lahir) }}" id="tanggal_lahir" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="tempat_lahir" class="col-sm-3 col-form-label">TEMPAT LAHIR<span style="color:red">*</span></label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir', $biodata->tempat_lahir) }}" id="tempat_lahir" placeholder="TEMPAT LAHIR" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="email" class="col-sm-3 col-form-label">EMAIL<span style="color:red">*</span></label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" value="{{ old('email', $biodata->email) }}" id="email" placeholder="EMAIL" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="jenis_kelamin" class="col-sm-3 col-form-label">JENIS KELAMIN<span style="color:red">*</span></label>
                                <div class="col-sm-9">
                                    <select name="jenis_kelamin" class="form-select" required>
                                        <option value="">PILIH JENIS KELAMIN</option>
                                        <option value="Pria" {{ $biodata->jenis_kelamin == "Pria" ? 'selected' : '' }}>PRIA</option>
                                        <option value="Wanita" {{ $biodata->jenis_kelamin == "Wanita" ? 'selected' : '' }}>WANITA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="status_nikah" class="col-sm-3 col-form-label">STATUS NIKAH<span style="color:red">*</span></label>
                                <div class="col-sm-9">
                                    <select name="status_nikah" class="form-select" required>
                                        <option value="">PILIH STATUS NIKAH</option>
                                        <option value="SUDAH MENIKAH" {{ $biodata->status_nikah == "SUDAH MENIKAH" ? 'selected' : '' }}>SUDAH MENIKAH</option>
                                        <option value="BELUM MENIKAH" {{ $biodata->status_nikah == "BELUM MENIKAH" ? 'selected' : '' }}>BELUM MENIKAH</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="kewarganegaraan" class="col-sm-3 col-form-label">KEWARGANEGARAAN<span style="color:red">*</span></label>
                                <div class="col-sm-9">
                                    <select name="kewarganegaraan" class="form-select" required>
                                        <option value="">PILIH KEWARGANEGARAAN</option>
                                        <option value="WNI" {{ $biodata->kewarganegaraan == "WNI" ? 'selected' : '' }}>WNI</option>
                                        <option value="WNA" {{ $biodata->kewarganegaraan == "WNA" ? 'selected' : '' }}>WNA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="agama" class="col-sm-3 col-form-label">AGAMA<span style="color:red">*</span></label>
                                <div class="col-sm-9">
                                    <select name="agama" class="form-select" required>
                                        <option value="">PILIH AGAMA</option>
                                        <option value="ISLAM" {{ $biodata->agama == "ISLAM" ? 'selected' : '' }}>ISLAM</option>
                                        <option value="KRISTEN PROTESTAN" {{ $biodata->agama == "KRISTEN PROTESTAN" ? 'selected' : '' }}>KRISTEN PROTESTAN</option>
                                        <option value="KRISTEN KATOLIK" {{ $biodata->agama == "KRISTEN KATOLIK" ? 'selected' : '' }}>KRISTEN KATOLIK</option>
                                        <option value="HINDU" {{ $biodata->agama == "HINDU" ? 'selected' : '' }}>HINDU</option>
                                        <option value="BUDDHA" {{ $biodata->agama == "BUDDHA" ? 'selected' : '' }}>BUDDHA</option>
                                        <option value="KONGHUCU" {{ $biodata->agama == "KONGHUCU" ? 'selected' : '' }}>KONGHUCU</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="provinsi" class="col-sm-3 col-form-label">PROVINSI<span style="color:red">*</span></label>
                                <div class="col-sm-9">
                                    <select name="provinsi" class="form-select" id="provinsi" required>
                                        <option value="">PILIH PROVINSI</option>
                                        @foreach ($provinces as $provinsi)
                                        <option value="{{$provinsi->id}}" {{$provinsi->id == $biodata->provinsi ? 'selected' : '' }}>{{$provinsi->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="kabupaten" class="col-sm-3 col-form-label">KOTA / KABUPATEN<span style="color:red">*</span></label>
                                <div class="col-sm-9">
                                    <select name="kabupaten" class="form-select" id="kabupaten" required>
                                        <option value="">PILIH KOTA / KABUPATEN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="kecamatan" class="col-sm-3 col-form-label">KECAMATAN<span style="color:red">*</span></label>
                                <div class="col-sm-9">
                                    <select name="kecamatan" class="form-select" id="kecamatan" required>
                                        <option value="">PILIH KECAMATAN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="desa" class="col-sm-3 col-form-label">DESA / KELURAHAN<span style="color:red">*</span></label>
                                <div class="col-sm-9">
                                    <select name="desa" class="form-select" id="desa" required>
                                        <option value="">PILIH DESA / KELURAHAN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="alamat_ktp" class="col-sm-3 col-form-label">ALAMAT (KTP)<span style="color:red">*</span></label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="alamat_ktp" value="{{ old('alamat_ktp', $biodata->alamat_ktp) }}" id="alamat_ktp" placeholder="ALAMAT (KTP)" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="handphone" class="col-sm-3 col-form-label">HANDPHONE<span style="color:red">*</span></label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control phone" name="handphone" value="{{ old('handphone', $biodata->handphone) }}" id="handphone" placeholder="HANDPHONE" required>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="no_npwp" class="col-sm-3 col-form-label">NO. NPWP</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_npwp" value="{{ old('no_npwp', $biodata->no_npwp) }}" id="no_npwp" placeholder="NO. NPWP">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md" style="background-color: #fe5900; color:white">Update</button>
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
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $('#provinsi').on('change', function() {
                let id_provinsi = $('#provinsi').val();

                $.ajax({
                    type : 'POST',
                    url : "{{route('getkabupaten')}}",
                    data : {id_provinsi:id_provinsi,id_kabupaten:{{$biodata->kabupaten}}},
                    cache : false,

                    success: function(msg) {
                        $('#kabupaten').html(msg);
                        $('#kabupaten').trigger('change');
                        $('#kecamatan').html('<option value="">PILIH KECAMATAN</option>');
                        $('#desa').html('<option value="">PILIH DESA / KELURAHAN</option>');
                    },
                    error: function(data) {
                        console.log('error:', data)
                    }
                })
            })

            $('#provinsi').trigger('change');
            $('#kabupaten').on('change', function() {
                let id_kabupaten = $('#kabupaten').val();

                $.ajax({
                    type : 'POST',
                    url : "{{route('getkecamatan')}}",
                    data : {id_kabupaten:id_kabupaten,id_kecamatan:{{$biodata->kecamatan}}},
                    cache : false,

                    success: function(msg) {
                        $('#kecamatan').html(msg);
                        $('#kecamatan').trigger('change');
                        $('#desa').html('<option value="">PILIH DESA / KELURAHAN</option>');
                    },
                    error: function(data) {
                        console.log('error:', data)
                    }
                })
            })

            $('#kabupaten').trigger('change');
            $('#kecamatan').on('change', function() {
                let id_kecamatan = $('#kecamatan').val();

                $.ajax({
                    type : 'POST',
                    url : "{{route('getdesa')}}",
                    data : {id_kecamatan:id_kecamatan,id_desa:{{$biodata->desa}}},
                    cache : false,

                    success: function(msg) {
                        $('#desa').html(msg);
                        $('#desa').trigger('change');
                    },
                    error: function(data) {
                        console.log('error:', data)
                    }
                })
            })
        })
    </script>
@endsection
