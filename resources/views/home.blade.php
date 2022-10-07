@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 card shadow" style="border-radius: 25px;">
            <h3 class="mt-2">Halaman Dashboard</h3>
            <hr>
            <h1 class="card-header" style="border-radius: 10px;">Hai! {{ Auth::user()->name }} </h1>

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

            <div class="card-body">
                <div class="accordion mt-3 mb-3" id="accordionExample" style="background-color: white">
                    <div class="accordion-item" style="background-color: white">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" style="background-color: white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                BIODATA
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="col-md-12">
                                    @if (Auth::user()->kualifikasi == 'freelance' || Auth::user()->kualifikasi == 'magang' || Auth::user()->kualifikasi == 'mobile' || Auth::user()->kualifikasi == 'juniorweb' || Auth::user()->kualifikasi == 'seniorweb')
                                    <div class="table-responsive">
                                        <table class="table table-lg table-striped">
                                            @forelse ($biodatas as $biodata)
                                            @if ($biodata->biodata_user_id == Auth::user()->id)
                                            <tr>
                                                <th style="width: 30%">No. KTP</th>
                                                <td style="width: 57%">{{ $biodata->no_ktp }}</td>
                                                <td><i class="bi bi-check-circle"></i> </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Nama</th>
                                                <td style="width: 57%">{{ $biodata->nama }}</td>
                                                <td><i class="bi bi-check-circle"></i> </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Tanggal Lahir</th>
                                                <td style="width: 57%">{{ $biodata->tanggal_lahir }}</td>
                                                <td><i class="bi bi-check-circle"></i> </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Tempat Lahir</th>
                                                <td style="width: 57%">{{ $biodata->tempat_lahir }}</td>
                                                <td><i class="bi bi-check-circle"></i> </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Email</th>
                                                <td style="width: 57%">{{ $biodata->email }}</td>
                                                <td><i class="bi bi-check-circle"></i> </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Jenis Kelamin</th>
                                                <td style="width: 57%">{{ $biodata->jenis_kelamin }}</td>
                                                <td><i class="bi bi-check-circle"></i> </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Status Nikah</th>
                                                <td style="width: 57%">{{ $biodata->status_nikah }}</td>
                                                <td><i class="bi bi-check-circle"></i> </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Kewarganegaraan</th>
                                                <td style="width: 57%">{{ $biodata->kewarganegaraan }}</td>
                                                <td><i class="bi bi-check-circle"></i> </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Agama</th>
                                                <td style="width: 57%">{{ $biodata->agama }}</td>
                                                <td><i class="bi bi-check-circle"></i> </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Provinsi</th>
                                                <td style="width: 57%">{{ $biodata->xprovinsi }}</td>
                                                <td><i class="bi bi-check-circle"></i> </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Kabupaten / Kota</th>
                                                <td style="width: 57%">{{ $biodata->xkabupaten }}</td>
                                                <td><i class="bi bi-check-circle"></i> </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Kecamatan</th>
                                                <td style="width: 57%">{{ $biodata->xkecamatan }}</td>
                                                <td><i class="bi bi-check-circle"></i> </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Desa</th>
                                                <td style="width: 57%">{{ $biodata->xdesa }}</td>
                                                <td><i class="bi bi-check-circle"></i> </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Alamat KTP</th>
                                                <td style="width: 57%">{{ $biodata->alamat_ktp }}</td>
                                                <td><i class="bi bi-check-circle"></i> </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">Handphone</th>
                                                <td style="width: 57%">{{ $biodata->handphone }}</td>
                                                <td><i class="bi bi-check-circle"></i> </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%">No. NPWP</th>
                                                <td style="width: 57%">{{ $biodata->no_npwp }}</td>
                                                <td><?php
                                                    if ($biodata->no_npwp == '') {
                                                        $b = '';
                                                    } else {
                                                        $b = 'bi bi-check-circle';
                                                    }
                                                    ?>
                                                    <i class="<?php echo $b ?>"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 30%"></th>
                                                <th></th>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('biodata.destroy', $biodata->id) }}" method="POST">
                                                        <a href="{{ route('biodata.edit', $biodata->id) }}" class="btn btn-sm btn-primary mb-1 mt-1">EDIT</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger mb-1 mt-1">HAPUS</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endif
                                            @empty
                                            <tr>
                                                <td class="text-center text-mute" colspan="4">Data Biodata tidak
                                                    tersedia</td>
                                            </tr>
                                            @endforelse
                                        </table>
                                    </div>
                                    @else
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" style="background-color: white">
                        <h2 class="accordion-header" id="headingTwo" style="background-color: white">
                            <button class="accordion-button collapsed" style="background-color: white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                PENDIDIKAN
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="col-md-12">
                                    @if (Auth::user()->kualifikasi == 'freelance' || Auth::user()->kualifikasi == 'magang' || Auth::user()->kualifikasi == 'mobile' || Auth::user()->kualifikasi == 'juniorweb' || Auth::user()->kualifikasi == 'seniorweb')
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" style="width: 100%">
                                            <thead>

                                                <tr>

                                                    <th scope="col" class="text-center align-middle" style="width: 5%">TINGKAT</th>
                                                    <th scope="col" class="text-center align-middle" style="width: 15%">JURUSAN</th>
                                                    <th scope="col" class="text-center align-middle" style="width: 15%">NAMA SEKOLAH
                                                        <br> (INSTITUSI)
                                                    </th>
                                                    <th scope="col" class="text-center align-middle" style="width: 15%">KOTA</th>
                                                    <th scope="col" class="text-center align-middle" style="width: 10%">NILAI UAN <br>
                                                        (IPK)</th>
                                                    <th scope="col" class="text-center align-middle" style="width: 15%">TANGGAL
                                                        KELULUSAN</th>
                                                    <th scope="col" class="text-center align-middle" style="width: 15%">AKREDITASI</th>
                                                    <th scope="col" class="text-center align-middle" style="width: 10%">#</th>
                                                    <th scope="col" class="text-center align-middle " style="width: 10%">#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($pendidikans as $pendidikan)
                                                @if ($pendidikan->pendidikan_user_id == Auth::user()->id)
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
                                                        {{ date('d-m-Y', strtotime($pendidikan->tanggal_lulus)) }}
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        {{ $pendidikan->akreditasi }}
                                                    </td>
                                                    <td class="text-center">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pendidikan.destroy', $pendidikan->id) }}" method="POST">
                                                            <a href="{{ route('pendidikan.edit', $pendidikan->id) }}" class="btn btn-sm btn-primary mb-1 mt-1">EDIT</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger mb-1 mt-1">HAPUS</button>
                                                        </form>
                                                    </td>
                                                    <td class="text-center align-middle">
                                                        <i class="bi bi-check-circle"></i>
                                                    </td>
                                                </tr>
                                                @endif
                                                @empty
                                                <tr>
                                                    <td class="text-center text-mute" colspan="7">Data Pendidikan
                                                        tidak tersedia
                                                    </td>
                                                </tr>
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
                    <div class="accordion-item" style="background-color: white">
                        <h2 class="accordion-header" id="headingThree" style="background-color: white">
                            <button class="accordion-button collapsed" style="background-color: white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                DOKUMEN
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="col-md-12">
                                    @if (Auth::user()->kualifikasi == 'freelance' || Auth::user()->kualifikasi == 'magang' || Auth::user()->kualifikasi == 'mobile' || Auth::user()->kualifikasi == 'juniorweb' || Auth::user()->kualifikasi == 'seniorweb')
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center align-middle" style="width: 50%">JENIS</th>
                                                    <th scope="col" class="text-center align-middle" style="width: 50%">#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($dokumens as $dokumen)
                                                @if ($dokumen->dokumen_user_id == Auth::user()->id)
                                                <tr>
                                                    <td class="text-center align-middle">{{ $dokumen->jenis }}
                                                    </td>
                                                    <td class="text-center">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('dokumen.destroy', $dokumen->id) }}" method="POST">
                                                            <a href="{{ Storage::url($dokumen->file) }}" class="btn btn-sm btn-primary mb-1 mt-1" target="_blank" rel="noopener noreferrer">PREVIEW</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger mb-1 mt-1">HAPUS</button>
                                                        </form>

                                                </tr>
                                                @endif
                                                @empty
                                                <tr>
                                                    <td class="text-center text-mute" colspan="2">Data Dokumen
                                                        tidak tersedia</td>
                                                </tr>
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
                    <div class="accordion-item" style="background-color: white">
                        <h2 class="accordion-header" id="headingFour" style="background-color: white">
                            <button class="accordion-button collapsed" style="background-color: white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                FOTO PELAMAR </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="col-md-12">
                                    @if (Auth::user()->kualifikasi == 'freelance' || Auth::user()->kualifikasi == 'magang' || Auth::user()->kualifikasi == 'mobile' || Auth::user()->kualifikasi == 'juniorweb' || Auth::user()->kualifikasi == 'seniorweb')
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                        <thead>
                                                <tr>
                                                    <th scope="col" class="text-center align-middle" style="width: 50%">FOTO </th>
                                                    <th scope="col" class="text-center align-middle" style="width: 50%">#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($files as $file)
                                                @if ($file->foto_user_id == Auth::user()->id)
                                                <tr>
                                                    <td class="text-center align-middle" style="width: 50%">
                                                        <img src="{{ Storage::url($file->file_path) }}" alt="" height="300">
                                                        <!-- {{ $file->file_name }} -->
                                                    </td>
                                                    <td class="text-center align-middle" style="width: 50%">
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('fotopelamar.destroy', $file->id) }}" method="POST">
                                                            <a href="{{ Storage::url($file->file_path) }}" class="btn btn-sm btn-primary" target="_blank" rel="noopener noreferrer">VIEW</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endif
                                                @endforeach
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
            </div>
        </div>


    </div>
</div>
@endsection