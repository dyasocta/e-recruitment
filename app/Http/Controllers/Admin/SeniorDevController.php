<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use app\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;

class SeniorDevController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'ASC')->get();
        $title = 'Pelamar-Senior_WEB';
        return view('admin.pelamar.sdevelop', compact('title','users'));
    }

    public function tampil_data($id)
    {
        $title = 'Data-Pelamar';
        $biodatas = DB::table('biodatas')
                ->join('users', 'users.id', 'biodatas.biodata_user_id')
                ->join('provinces', 'provinces.id','biodatas.provinsi')
                ->join('regencies', 'regencies.id','biodatas.kabupaten')
                ->join('districts', 'districts.id','biodatas.kecamatan')
                ->join('villages', 'villages.id','biodatas.desa')
                ->select('*',
                        'biodatas.no_ktp as bioktp',
                        'biodatas.tanggal_lahir as biotanggal',
                        'biodatas.tempat_lahir as biotempat',
                        'biodatas.email as bioemail',
                        'biodatas.jenis_kelamin as biokelamin',
                        'provinces.name as xprovinsi',
                        'regencies.name as xkabupaten',
                        'districts.name as xkecamatan',
                        'villages.name as xdesa')
                ->distinct()
                ->where('biodata_user_id', $id)
                ->get();
        $pendidikans = DB::table('pendidikans')
                ->join('users', 'users.id', 'pendidikans.pendidikan_user_id')
                ->join('regencies', 'regencies.id','pendidikans.kota')
                ->select('*')
                ->distinct()
                ->where('pendidikan_user_id', $id)
                ->get();
        $dokumens = DB::table('dokumens')
                ->join('users', 'users.id', 'dokumens.dokumen_user_id')
                ->select('*')
                ->where('dokumen_user_id', $id)
                ->get();
        $foto_pelamar = DB::table('biodatas')
                ->join('foto_pelamars', 'foto_pelamars.foto_user_id', 'biodatas.biodata_user_id')
                ->where('biodata_user_id', $id)
                ->distinct()
                ->get();
        return view('admin.formdata.pelamar.datasenior',compact('title', 'biodatas', 'pendidikans', 'dokumens', 'foto_pelamar'));
    }
}
