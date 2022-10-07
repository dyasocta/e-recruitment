<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Soal;
use App\Http\Controllers\Controller;


class ListSoalController extends Controller
{
    public function index()
    {

        return view('admin.formdata.soal.listsoal', [
            'soal' => Soal::all(),
            'title' => 'List Soal'
        ]);
    }

    public function destroy($id)
    {
        Soal::find($id)->delete();
        return back();
    }

    public function edit(Soal $soal, $id)
    {

        $title = 'Edit Soal';
        $soal = Soal::whereId($id)->first();
        return view('admin.formdata.soal.editsoal', compact('soal'), [
            'soal' => Soal::where('id', $id)->first(),
            'title' => 'Edit soal'
        ]);
    }

    public function update(Request $request, Soal $soal, $id)
    {
        //validate form
        $soal          = Soal::find($id);
        $soal->soal    = $request->soal;
        $soal->pil_a   = $request->pil_a;
        $soal->pil_b   = $request->pil_b;
        $soal->pil_c   = $request->pil_c;
        $soal->pil_d   = $request->pil_d;
        $soal->pil_e   = $request->pil_e;
        $soal->jawaban = $request->jawaban;
        $soal->save();

        //redirect to index
        return redirect()->route('admin.homeadmin')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function changeStatus(Request $request)
    {
        $soal = Soal::find($request->id);
        $soal->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}
