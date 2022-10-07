<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Dokumen;
use Auth;

class DokumenController extends Controller
{
    public function create()
    {
        $dokumens = Dokumen::orderBy('created_at', 'DESC')->get();
        return view('form.dokumen.create', compact('dokumens'));
    }

    public function store(Request $request)
    {
        $message=
        ['file.required' => 'from wajib di isi',
        'file.mimes' => 'file harus berupa: doc,docx,pdf',
        'jenis.required' => 'from wajib di isi'];
        $request->validate([
            'file' => 'required|mimes:doc,docx,pdf',
            'jenis' => 'required'
        ],$message);

        $file = $request->file('file');
        $explode = explode('.', $file->getClientOriginalName());
        $originalName = $explode[0];
        $extension = $file->getClientOriginalExtension();
        $jenis = $request->jenis;
        $path = $file->store('public/files');

        $dokumen = new Dokumen;
        $dokumen->dokumen_user_id = Auth()->user()->id;
        $dokumen->jenis = $jenis;
        $dokumen->nama_file = $originalName;
        $dokumen->file = $path;
        $dokumen->ekstensi = $extension;
        $dokumen->save();

        if ($dokumen) {
            return redirect()
                ->route('home')
                ->withSuccess(sprintf('Dokumen %s telah diunggah.', $dokumen->nama_file));
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(sprintf('Beberapa masalah terjadi, silakan coba lagi.'));
        }
    }

    public function destroy($id)
    {
        $dokumen = Dokumen::find($id);

        if ($dokumen) {

            if (Storage::exists($dokumen->file)) {
                Storage::delete($dokumen->file);
            }

            $dokumen->delete();

            return redirect()
                ->route('home')
                ->withSuccess(sprintf('Berhasil, dokumen %s berhasil dihapus.', $dokumen->nama_file));
        }

        return redirect()
            ->route('home')
            ->withErrors(sprintf('Error, tidak ada dokumen ditemukan.'));
    }
}
