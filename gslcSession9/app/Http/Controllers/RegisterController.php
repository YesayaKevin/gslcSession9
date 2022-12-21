<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function view() {
        return view('authentication.register');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:6', 'max:255'],
            'repassword' => ['same:password']
        ],
        [
            'repassword.same' => "Pasword must match"
        ]
        );
        $lower_name = strtolower($validated['name']);
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        return redirect('/login')->with('success', 'Sign-up sucessful! Please login');
    }
}
