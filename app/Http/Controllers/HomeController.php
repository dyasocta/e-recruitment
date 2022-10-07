<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Dokumen;
use App\Models\Pendidikan;
use App\Models\FotoPelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use app\Models\User;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $pendidikans = Pendidikan::latest()->get();
        $biodatas = DB::table('biodatas')
                ->join('provinces', 'provinces.id','biodatas.provinsi')
                ->join('regencies', 'regencies.id','biodatas.kabupaten')
                ->join('districts', 'districts.id','biodatas.kecamatan')
                ->join('villages', 'villages.id','biodatas.desa')
                ->select('*', 'biodatas.id as id', 'provinces.name as xprovinsi', 'regencies.name as xkabupaten', 'districts.name as xkecamatan', 'villages.name as xdesa')
                ->distinct()
                ->get();
        $pendidikans = DB::table('pendidikans')
                ->join('regencies', 'regencies.id','pendidikans.kota')
                ->select('*', 'pendidikans.id as id')
                ->distinct()
                ->get();
        $dokumens = Dokumen::orderBy('created_at', 'DESC')->get();
        $files = FotoPelamar::orderBy('created_at', 'DESC')->get();
        return view('home',compact('pendidikans','biodatas', 'dokumens', 'files'));
    }

    public function changePassword()
    {
        return view('change-password');
    }

    // public function dashBoard()
    // {
    //     return view('dashboard.biodata1');
    // }

    // public function penDidikan()
    // {
    //     return view('dashboard.pendidikan1');
    // }
    // public function upDokumen()
    // {
    //     return view('dashboard.updokumen1');
    // }

    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        Auth::logout();
        return redirect('/')->with("status", "Password changed successfully!");
        // return back()->with("status", "Password changed successfully!");
    }
}
