@extends('admin.layouts.appadmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card shadow" style="border-radius: 25px;">
                <h3 class="mt-2">Halaman Data Pelamar Junior Web Developer</h3>
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
                    <div class="card-body">
                        <h3 class="card-header fs-5 fw-bold text-left align-middle" style="border-radius: 5px">
                            Informasi Peserta
                        </h3>
                        <div class="row mt-2 justify-content-center">
                            <div class="col-md-4 d-block" style="text-align:center">
                                @foreach ($foto_pelamar as $fp)
                                <img class="border" src="{{Storage::url($fp->file_path)}}" alt=""
                                    style="color:blue;width: 200px;height:300px">
                                @endforeach
                            </div>
                            <div class="col-md-8">
                                <div class="table-responsive">
                                    <table class="table border table-lg table-striped">
                                        @foreach ($biodatas as $biodata)
                                            <tr>
                                                <th style="width: 30%">No. KTP</th>
                                                <td>{{ $biodata->bioktp }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Nama</th>
                                                <td>{{ $biodata->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Tanggal Lahir</th>
                                                <td>{{ $biodata->biotanggal }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Tempat Lahir</th>
                                                <td>{{ $biodata->biotempat }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Email</th>
                                                <td>{{ $biodata->bioemail }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Jenis Kelamin</th>
                                                <td>{{ $biodata->biokelamin }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Status Nikah</th>
                                                <td>{{ $biodata->status_nikah }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Kewarganegaraan</th>
                                                <td>{{ $biodata->kewarganegaraan }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Agama</th>
                                                <td>{{ $biodata->agama }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Provinsi</th>
                                                <td>{{ $biodata->xprovinsi }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Kabupaten / Kota</th>
                                                <td>{{ $biodata->xkabupaten }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Kecamatan</th>
                                                <td>{{ $biodata->xkecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Desa</th>
                                                <td>{{ $biodata->xdesa }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Alamat KTP</th>
                                                <td>{{ $biodata->alamat_ktp }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Handphone</th>
                                                <td>{{ $biodata->handphone }}</td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">No. NPWP</th>
                                                <td>{{ $biodata->no_npwp }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <h3 class="card-header fs-5 fw-bold text-left align-middle mt-3" style="border-radius: 5px">
                                Pendidikan
                            </h3>
                            <div class="row-md-12 mt-2">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center align-middle" style="width: 5%">
                                                    TINGKAT</th>
                                                <th scope="col" class="text-center align-middle" style="width: 15%">
                                                    JURUSAN</th>
                                                <th scope="col" class="text-center align-middle" style="width: 15%">NAMA
                                                    SEKOLAH
                                                    <br> (INSTITUSI)
                                                </th>
                                                <th scope="col" class="text-center align-middle" style="width: 15%">KOTA
                                                </th>
                                                <th scope="col" class="text-center align-middle" style="width: 10%">NILAI
                                                    UAN <br>
                                                    (IPK)</th>
                                                <th scope="col" class="text-center align-middle" style="width: 15%">
                                                    TANGGAL
                                                    KELULUSAN</th>
                                                <th scope="col" class="text-center align-middle" style="width: 15%">
                                                    AKREDITASI</th>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pendidikans as $pendidikan)
                                                <tr>
                                                    <td class="text-center align-middle">
                                                        {{ $pendidikan->jenjang }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $pendidikan->jurusan }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $pendidikan->institusi }}
                                                    </td>
                                                    <td class="text-center align-middle">{{ $pendidikan->name }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $pendidikan->nilai_uan_ipk }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $pendidikan->tanggal_lulus }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $pendidikan->akreditasi }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <h3 class="card-header fs-5 fw-bold text-left align-middle mt-3" style="border-radius: 5px">
                                Dokumen
                            </h3>
                            <div class="row-md-12 mt-2">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center align-middle" style="width: 50%">JENIS
                                                </th>
                                                <th scope="col" class="text-center align-middle" style="width: 50%">#
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dokumens as $dokumen)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $dokumen->jenis }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <a href="{{ Storage::url($dokumen->file) }}" class="btn"
                                                            style="background-color: #FE5900; color:white" target="_blank"
                                                            rel="noopener noreferrer"><i
                                                                class="bi bi-eye me-1"></i><b>Preview</b></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
