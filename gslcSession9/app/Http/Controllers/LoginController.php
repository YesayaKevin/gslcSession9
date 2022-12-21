<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function view() {
        return view('authentication.login');
    }

    public function login(Request $req){
        $credentials = $req->validate([
            'name' => ['required'],
            'email' => ['email:dns', 'required'],
        ]);
        $remember_me = $req->has('remember_me') ? true : false;
        if(Auth::attempt($credentials,$remember_me)){
            $req->session()->regenerate();
            return redirect()->intended('/home');
        }
        dd('Error');
        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
