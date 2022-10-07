<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use App\Models\Regency;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Auth;

class PendidikanController extends Controller
{
    public function create()
    {
        $regencies = Regency::all();
        $xusers = DB::table('pendidikans')
                ->join('regencies', 'regencies.id','pendidikans.kota')
                ->select('*', 'pendidikans.id as id')
                ->get();
        return view('form.pendidikan.create' , compact('xusers', 'regencies'));
    }

    public function store(Request $request)
    {
        $message=[
            'jenjang.required' => 'Form :attribute Wajib Diisi',
            'institusi.required' => 'Form :attribute Wajib Diisi',
            'jurusan.required' => 'Form :attribute Wajib Diisi',
            'kota.required' => 'Form :attribute Wajib Diisi',
            'tanggal_lulus.required' => 'Form :attribute Wajib Diisi',
            'nilai_uan_ipk.required' => 'Form :attribute Wajib Diisi',
            'akreditasi.required' => 'Form :attribute Wajib Diisi'
        ];

        $this->validate($request, [
            'jenjang' => 'required',
            'institusi' => 'required',
            'jurusan' => 'required',
            'kota' => 'required',
            'tanggal_lulus' => 'required',
            'nilai_uan_ipk' => 'required',
            'akreditasi' => 'required'
        ],$message);

        $pendidikan = new Pendidikan;

        $pendidikan->jenjang = $request->jenjang;
        $pendidikan->institusi = $request->institusi;
        $pendidikan->jurusan = $request->jurusan;
        $pendidikan->kota = $request->kota;
        $pendidikan->tanggal_lulus = $request->tanggal_lulus;
        $pendidikan->nilai_uan_ipk = $request->nilai_uan_ipk;
        $pendidikan->akreditasi = $request->akreditasi;
        $pendidikan->pendidikan_user_id = Auth::user()->id;
        $pendidikan->save();


        if ($pendidikan) {
            return redirect()
                ->route('home')
                ->with([
                    'success' => 'Pendidikan Baru telah berhasil dibuat.'
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
        $pendidikans = Pendidikan::findOrFail($id);
        $regencies = Regency::all();
        return view('form.pendidikan.edit', compact('pendidikans','regencies'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jenjang' => 'required',
            'institusi' => 'required',
            'jurusan' => 'required',
            'kota' => 'required',
            'tanggal_lulus' => 'required',
            'nilai_uan_ipk' => 'required',
            'akreditasi' => 'required'

        ]);

        $pendidikans = Pendidikan::findOrFail($id);

        $pendidikans->update([
            'jenjang' => $request->jenjang,
            'institusi' => $request->institusi,
            'jurusan' => $request->jurusan,
            'kota' => $request->kota,
            'tanggal_lulus' => $request->tanggal_lulus,
            'nilai_uan_ipk' => $request->nilai_uan_ipk,
            'akreditasi' => $request->akreditasi,

        ]);

        if ($pendidikans) {
            return redirect()
                ->route('home')
                ->with([
                    'success' => 'Pendidikan telah berhasil diperbarui.'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Beberapa masalah telah terjadi, silakan coba lagi.'
                ]);
        }
    }

    public function destroy($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->delete();

        if ($pendidikan) {
            return redirect()
                ->route('home')
                ->with([
                    'success' => 'Pendidikan telah berhasil dihapus.'
                ]);
        } else {
            return redirect()
                ->route('home')
                ->with([
                    'error' => 'Beberapa masalah telah terjadi, silakan coba lagi.'
                ]);
        }
    }
}
