<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }

    public function changePassword(Request $request){
     
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        // The passwords matches
        return redirect()->back()->with("error","Password Sekarang yang Anda masukkan salah. Silahkan coba lagi.");
        }
         
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        //Current password and new password are same
        return redirect()->back()->with("error","Password Baru Anda tidak boleh sama dengan Password Sekarang. Silahkan pilih password lainnya.");
        }
        if(!(strcmp($request->get('new-password'), $request->get('new-password_confirmation'))) == 0){
                    //New password and confirm password are not same
                    return redirect()->back()->with("error","Password Baru harus sesuai dengan Konfirmasi Password. Silahkan coba lagi.");
        }
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
         
        return redirect()->back()->with("success","Password berhasil diubah !");
     
    }
}
