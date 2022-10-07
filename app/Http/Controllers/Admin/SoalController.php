<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Soal;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.formdata.soal.postsoal',  [
            'title' => 'Create Soal',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'soal.required' => 'Form wjib diisi',
            'pil_a.required' => 'Form wjib diisi',
            'pil_b.required' => 'Form wjib diisi',
            'pil_c.required' => 'Form wjib diisi',
            'pil_d.required' => 'Form wjib diisi',
            'pil_e.required' => 'Form wjib diisi',
            'jawaban.required' => 'Form wjib diisi',
        ];

        $this->validate($request, [
            'soal' => 'required',
            'pil_a' => 'required',
            'pil_b' => 'required',
            'pil_c' => 'required',
            'pil_d' => 'required',
            'pil_e' => 'required',
            'jawaban' => 'required',
        ], $message);

        Soal::create([
            'soal' => $request->soal,
            'pil_a' => $request->pil_a,
            'pil_b' => $request->pil_b,
            'pil_c' => $request->pil_c,
            'pil_d' => $request->pil_d,
            'pil_e' => $request->pil_e,
            'jawaban' => $request->jawaban,
        ]);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show(Soal $soal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function edit(Soal $soal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Soal $soal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soal $soal)
    {
        //
    }
}
