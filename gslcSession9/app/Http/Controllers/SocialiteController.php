<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;

class SocialiteController extends Controller
{
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider){
        try{
            $socialiteUser = Socialite::driver($provider)->user();
        } catch(\Exception $th){
            abort(404);
        }

        $user = User::where([
            'provider' => $provider,
            'provider_id' => $socialiteUser->provider_id
        ])->first();

        if(!$user){
            $validator = Validator::make(
                ['email' => $socialiteUser->email],
                ['email' => ['unique:users,email']],
                ['email.unique' => 'Couldn\'t log in. Maybe you used a different login method?']
            );
            if($validator->fails()){
                return redirect('/login')->withErrors($validator);
            }

            $user = User::create()([
                'name' => ucwords($socialiteUser->getName()),
                'email' => $socialiteUser->email,
                'password' => '0',
                'provider' => $provider,
                'provider_id' => $socialiteUser->provider_id,
                'email_verified_at' => now()
            ]);
        }
        
        Auth::login($user);
        return redirect()->intended('/home');
    }
} 
