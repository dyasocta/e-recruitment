<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Controllers\Controller;

class ListQuizController extends Controller
{
    public function index()
    {

        return view('admin.formdata.quiz.listquiz', [
            'quiz' => Quiz::all(),
            'title' => 'List Quiz'
        ]);
    }

    public function destroy($id)
    {
        Quiz::find($id)->delete();
        return back();
    }

    public function edit(Quiz $quiz, $id)
    {

        $title = 'Edit Quiz';
        $quiz = Quiz::whereId($id)->first();
        return view('admin.formdata.quiz.editquiz', compact('quiz'), [
            'quiz' => Quiz::where('id', $id)->first(),
            'title' => 'Edit quiz'
        ]);
    }

    public function update(Request $request, Quiz $quiz, $id)
    {
        //validate form
        $quiz            = Quiz::find($id);
        $quiz->judul = $request->judul;
        $quiz->desk_pekerjaan  = $request->desk_pekerjaan;
        $quiz->save();

        //redirect to index
        return redirect()->route('admin.homeadmin')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function changeStatus(Request $request)
    {
        $quiz = Quiz::find($request->id);
        $quiz->status = $request->status;
        $quiz->save();

        return response()->json(['success' => 'Status change successfully.']);
    }
}
