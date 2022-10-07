<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Http\Controllers\Controller;

class ListPengumumanController extends Controller
{
    public function index()
    {

        return view('admin.formdata.pengumuman.listpengumuman', [
            'pengumuman' => Pengumuman::all(),
            'title' => 'List Pengumuman'
        ]);
    }

    public function destroy($id)
    {
        Pengumuman::find($id)->delete();
        return back();
    }

    public function edit(Pengumuman $pengumuman, $id)
    {

        $title = 'Edit Pengumuman';
        $pengumuman = Pengumuman::whereId($id)->first();
        return view('admin.formdata.pengumuman.editpengumuman', compact('pengumuman'), [
            'pengumuman' => Pengumuman::where('id', $id)->first(),
            'title' => 'Edit pengumuman'
        ]);
    }

    public function update(Request $request, Pengumuman $pengumuman, $id)
    {
        //validate form
        $pengumuman            = Pengumuman::find($id);
        $pengumuman->judul = $request->judul;
        $pengumuman->desk_pekerjaan  = $request->desk_pekerjaan;
        $pengumuman->save();

        //redirect to index
        return redirect()->route('admin.homeadmin')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function changeStatus(Request $request)
    {
        $pengumuman = Pengumuman::find($request->id);
        $pengumuman->status = $request->status;
        $pengumuman->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}
