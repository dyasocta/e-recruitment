<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lowongan;
use Illuminate\Support\Facades\DB;

class ListLowonganController extends Controller
{
    public function index()
    {
        return view('admin.formdata.pengumuman.listlowongan', [
            'lowongan' => Lowongan::all(),
            'title' => 'List Pengumuman'
        ]);
    }

    public function destroy($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->delete();

        if ($lowongan) {
            return redirect()
                ->route('admin.homeadmin')
                ->with([
                    'success' => 'User berhasil dihapus.'
                ]);
        } else {
            return redirect()
                ->route('admin.homeadmin')
                ->with([
                    'error' => 'Beberapa masalah terjadi, silakan coba lagi.'
                ]);
        }
    }

    public function edit(Lowongan $lowongan, $id)
    {

        $title = 'Edit Lowongan';
        $lowongan = Lowongan::whereId($id)->first();
        return view('admin.formdata.pengumuman.editlowongan', compact('lowongan'), [
            'lowongan' => Lowongan::where('id', $id)->first(),
            'title' => 'Edit Lowongan'
        ]);
    }

    public function update(Request $request, Lowongan $lowongan, $id)
    {
        //validate form
        $lowongan            = Lowongan::find($id);
        $lowongan->nama_pt = $request->nama_pt;
        $lowongan->lokasi  = $request->lokasi;
        $lowongan->minimal_jenjang  = $request->minimal_jenjang;
        $lowongan->kategori  = $request->kategori;
        $lowongan->js_kelamin  = $request->js_kelamin;
        $lowongan->mask_usia  = $request->mask_usia;
        $lowongan->keahlian = $request->keahlian;
        $lowongan->pengalaman = $request->pengalaman;
        $lowongan->desk_pekerjaan = $request->desk_pekerjaan;
        $lowongan->hari_kerja = $request->hari_kerja;
        $lowongan->jam_kerja = $request->jam_kerja;
        $lowongan->save();

        //redirect to index
        return redirect()->route('admin.homeadmin')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function changeeStatus(Request $request)
    {
        $lowongan = Lowongan::find($request->id);
        $lowongan->status = $request->status;
        $lowongan->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}
