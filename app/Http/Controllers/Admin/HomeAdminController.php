<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Auth;

class HomeAdminController extends Controller
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
        $title = 'Home-Admin';
        $users = User::orderBy('created_at', 'ASC')->get();
        return view('admin.homeadmin', compact('title', 'users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        if ($user) {
            return redirect()
                ->route('admin.homeadmin')
                ->with([
                    'success' => 'User berhasil dihapus.'
                ]);
        } else {
            return redirect()
                ->route('admin.homeadmin')
                ->with([
                    'error' => 'Beberapa masalah terjadi, silakan coba lagi.'
                ]);
        }
    }

    public function changePassword()
    {
        return view('admin.change-password');
    }

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
