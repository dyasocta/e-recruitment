<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
//Wilayah Indonesia
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class BiodataController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function create()
    {
        $provinces = Province::all();

        return view('form.biodata.create', compact('provinces'));
    }

    public function getkabupaten(Request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $id_kabupaten = $request->id_kabupaten;
        $kabupatens = Regency::where('province_id', $id_provinsi)->get();
        $option = "<option value=''>PILIH KOTA / KABUPATEN</option>";
        foreach ($kabupatens as $kabupaten) {
            $option .= "<option value='$kabupaten->id' " . ($kabupaten->id == $id_kabupaten ? 'selected' : '') . " >$kabupaten->name</option>";
        }
        echo $option;
    }

    public function getkecamatan(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;
        $id_kecamatan = $request->id_kecamatan;
        $kecamatans = District::where('regency_id', $id_kabupaten)->get();
        $option = "<option value=''>PILIH KECAMATAN</option>";
        foreach ($kecamatans as $kecamatan) {
            $option .= "<option value='$kecamatan->id' " . ($kecamatan->id == $id_kecamatan ? 'selected' : '') . " >$kecamatan->name</option>";
        }
        echo $option;
    }

    public function getdesa(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;
        $id_desa = $request->id_desa;
        $desas = Village::where('district_id', $id_kecamatan)->get();
        $option = "<option value=''>PILIH DESA / KELURAHAN</option>";
        foreach ($desas as $desa) {
            $option .= "<option value='$desa->id' " . ($desa->id == $id_desa ? 'selected' : '') . " >$desa->name</option>";
        }
        echo $option;
    }

    public function store(Request $request)
    {
        $message=[
            'no_ktp.required' => 'Form wjib diisi',
            'nama.required' => 'Form wjib diisi',
            'tanggal_lahir.required' => 'Form wjib diisi',
            'tempat_lahir.required' => 'Form wjib diisi',
            'email.required' => 'Form wjib diisi',
            'jenis_kelamin.required' => 'Form wjib diisi',
            'status_nikah.required' => 'Form wjib diisi',
            'kewarganegaraan.required' => 'Form wjib diisi',
            'agama.required' => 'Form wjib diisi',
            'provinsi.required' => 'Form wjib diisi',
            'kabupaten.required' => 'Form wjib diisi',
            'kecamatan.required' => 'Form wjib diisi',
            'desa.required' => 'Form wjib diisi',
            'alamat_ktp.required' => 'Form wjib diisi',
            'handphone.required' => 'Form wjib diisi',
        ];
        $this->validate($request, [
            'no_ktp' => 'required|string',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'status_nikah' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'alamat_ktp' => 'required',
            'handphone' => 'required',
            'no_npwp' => 'nullable',
        ],$message);

        $biodata = new Biodata;
        $biodata->no_ktp = $request->no_ktp;
        $biodata->nama = $request->nama;
        $biodata->tanggal_lahir = $request->tanggal_lahir;
        $biodata->tempat_lahir = $request->tempat_lahir;
        $biodata->email = $request->email;
        $biodata->jenis_kelamin = $request->jenis_kelamin;
        $biodata->status_nikah = $request->status_nikah;
        $biodata->kewarganegaraan = $request->kewarganegaraan;
        $biodata->agama = $request->agama;
        $biodata->provinsi = $request->provinsi;
        $biodata->kabupaten = $request->kabupaten;
        $biodata->kecamatan = $request->kecamatan;
        $biodata->desa = $request->desa;
        $biodata->alamat_ktp = $request->alamat_ktp;
        $biodata->handphone = $request->handphone;
        $biodata->no_npwp = $request->no_npwp;
        $biodata->biodata_user_id = Auth()->user()->id;
        $biodata->save();

        if ($biodata) {
            return redirect()
                ->route('home')
                ->with([
                    'success' => 'Biodata Baru telah berhasil dibuat.'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Beberapa masalah terjadi, silakan coba lagi.'
                ]);
        }
    }

    public function edit($id)
    {
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $biodata = Biodata::findOrFail($id);
        return view('form.biodata.edit', compact('biodata', 'provinces', 'regencies', 'districts', 'villages'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'no_ktp' => 'required|string',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'status_nikah' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'alamat_ktp' => 'required',
            'handphone' => 'required',
            'no_npwp' => 'nullable',
        ]);

        $biodata = Biodata::findOrFail($id);

        $biodata->update([
            'no_ktp' => $request->no_ktp,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_nikah' => $request->status_nikah,
            'kewarganegaraan' => $request->kewarganegaraan,
            'agama' => $request->agama,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
            'alamat_ktp' => $request->alamat_ktp,
            'handphone' => $request->handphone,
            'no_npwp' => $request->no_npwp,
        ]);

        if ($biodata) {
            return redirect()
                ->route('home')
                ->with([
                    'success' => 'Biodata telah berhasil diperbarui.'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Beberapa masalah terjadi, silakan coba lagi.'
                ]);
        }
    }

    public function destroy($id)
    {
        $biodata = Biodata::findOrFail($id);
        $biodata->delete();

        if ($biodata) {
            return redirect()
                ->route('home')
                ->with([
                    'success' => 'Biodata berhasil dihapus.'
                ]);
        } else {
            return redirect()
                ->route('home')
                ->with([
                    'error' => 'Beberapa masalah terjadi, silakan coba lagi.'
                ]);
        }
    }
}
