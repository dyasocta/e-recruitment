<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Lowongan;
use Auth;
use App\Http\Controllers\Admin\CreateLowongan;
use App\Models\Regency;
use Illuminate\Support\Facades\DB;

class CreateLowonganController extends Controller
{
    public function index()
    {
        return view('admin.formdata.pengumuman.postlowongan', [
            'title' => 'Create Lowongan',
        ]);
    }

    public function create()
    {
        $regencies = Regency::all();
        $xusers = DB::table('lowongan')
            ->get();
        return view('formdata.pengumuman.postlowongan', compact('xusers', 'regencies'));
    }

    public function store(Request $request)
    {
        $message = [
            'nama_pt.required' => '*nama pt wajib diisi',
            'lokasi.required' => '*lokasi wajib diisi',
            'minimal_jenjang.required' => '*minimal jenjang wajib diisi',
            'kategori.required' => '*kategori wajib diisi',
            'js_kelamin.required' => '*jenis kelamin wajib diisi',
            'mask_usia.required' => '*maksimal usia wajib diisi',
            'keahlian.required' => '*keahlian wajib diisi',
            'pengalaman.required' => '*pengalaman wajib diisi',
            'desk_pekerjaan.required' => '*deskripsi pekerjaan wajib diisi',
            'hari_kerja.required' => '*hari kerja wajib diisi',
            'jam_kerja.required' => 'jam kerja wajib diisi',

        ];
        $this->validate($request, [
            'nama_pt' => 'required|string',
            'lokasi' => 'required',
            'minimal_jenjang' => 'required',
            'kategori' => 'required',
            'js_kelamin' => 'required',
            'mask_usia' => 'required',
            'keahlian' => 'required',
            'pengalaman' => 'required',
            'desk_pekerjaan' => 'required',
            'hari_kerja' => 'required',
            'jam_kerja' => 'required',
        ], $message);

        Lowongan::create([
            'nama_pt' => $request->nama_pt,
            'lokasi' => $request->lokasi,
            'minimal_jenjang' => $request->minimal_jenjang,
            'kategori' => $request->kategori,
            'js_kelamin' => $request->js_kelamin,
            'mask_usia' => $request->mask_usia,
            'keahlian' => $request->keahlian,
            'pengalaman' => $request->pengalaman,
            'desk_pekerjaan' => $request->desk_pekerjaan,
            'hari_kerja' => $request->hari_kerja,
            'jam_kerja' => $request->jam_kerja,
            'status' => 1
        ]);
        return redirect()->route('home');
    }
}
