<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\FotoPelamar;
use Auth;

class FotopelamarController extends Controller
{
    public function fotoPelamar()
    {
        $files = FotoPelamar::orderBy('created_at', 'DESC')->get();
        return view('form.fotopelamar.foto-pelamar', compact('files'));
    }

    public function upload(Request $request): RedirectResponse
    {
        $message = [
            'file.required' => '- MAsukkan File Foto Anda',
            'file.mimes' => '- File Harus Berupa Gambar (jpg)',
            'fil.emax' => '- File Gambar Maximal Beukuran 2 MB'
        ];
        $this->validate($request, [
            'file_name' => 'nullable|max:100',
            'file' => 'required|mimes:jpg,jpeg,jpe|max:2000', // max 2MB
        ], $message);

        // tampung berkas yang sudah diunggah ke variabel baru
        // 'file' merupakan nama input yang ada pada form
        $uploadedFile = $request->file('file');
        $explode = explode('.', $uploadedFile->getClientOriginalName());
        $originalName = $explode[0];

        // simpan berkas yang diunggah ke sub-direktori 'public/files'
        // direktori 'files' otomatis akan dibuat jika belum ada
        $path = $uploadedFile->store('public/fotoPelamar');

        $foto = new FotoPelamar;
        $foto->foto_user_id = Auth()->user()->id;
        $foto->file_name = $originalName;
        $foto->file_path = $path;
        $foto->save();

        if ($foto) {
            return redirect()
                ->route('home')
                ->withSuccess(sprintf('File %s telah diunggah.', $foto->file_name));
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(sprintf('Beberapa masalah terjadi, silakan coba lagi.'));
        }
    }

    public function destroy($id)
    {
        $foto = FotoPelamar::find($id);

        if ($foto) {

            if (Storage::exists($foto->file_path)) {
                Storage::delete($foto->file_path);
            }

            $foto->delete();

            return redirect()
                ->route('home')
                ->withSuccess(sprintf('Berhasil, file %s berhasil dihapus.', $foto->file_name));
        }

        return redirect()
            ->route('home')
            ->withErrors(sprintf('Error, tidak ada file ditemukan.'));
    }
}
