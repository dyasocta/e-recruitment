<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Lowongan;
use App\Models\Apply;
use App\Models\Pengumuman;

class AnnouncementContoller extends Controller
{
    public function infolowongan(Request $request)
    {
        if ($request->filled('search')) {
            $lowongan = Lowongan::search($request->search)->get();
        } else {
            $lowongan = Lowongan::paginate(10);
        }
        return view('info.lowongan', compact('lowongan'));
    }

    public function apply($id, Request $request)
    {
        $apply = new Apply();
        $apply->apply_user_id = auth()->user()->id;
        $apply->lowongan_id = $request->input('id_lowongan');
        $apply->formasi = $request->input('kategori');
        $apply->lokasi = $request->input('lokasi');
        $apply->rekutmen = $request->input('nama_pt');
        $apply->tgl_apply = date('d-m-y');
        $apply->status = 'Prosses';
        $apply->save();

        if ($apply) {
            return redirect()
                ->route('home')
                ->with([
                    'success' => 'Anda Telah apply untuk Lamaran ini.'
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

    public function search(Request $request)
    {
        $query = $request->get('query');
        $filterResault = Pengumuman::where('judul', 'LIKE', '%' . $query . '%')->get();
        return response()->json($filterResault);
    }

    public function history($id)
    {
        $history = Apply::where('apply_user_id', $id)->get();
        return view('info.history', compact('history'));
    }

    public function annoucment(Request $request)
    {
        if ($request->filled('search')) {
            $annoucment = Pengumuman::search($request->search)->get();
        } else {
            $annoucment = Pengumuman::paginate(10);
        }
        return view('info.annoucment', compact('annoucment'));
    }

    public function dlowongan($id)
    {
        $lowongan = Lowongan::where('id', $id)->first();
        return view('info.detail.lowongan', compact('lowongan'));
    }

    public function dannoucment($id)
    {
        $annoucment = Pengumuman::where('id', $id)->first();
        return view('info.detail.annoucment', compact('annoucment'));
    }
}
