<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    //redirect 
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // login 

    public function login(Request $request)
    {
        
        $google_user = Socialite::driver('google')->stateless()->user();
        $user = User::where('google_id', $google_user->getId())->first();
        if (!$user) {
            $new_user = User::create([
                'email' => $google_user->getEmail(),
                'google_id' => $google_user->getId(),
                'jwt_token' => Str::upper(Str::random(4))
            ]);
            UserProfile::create([
                'user_id' => $new_user->id,
                'name' => $google_user->getName(),
                'avatar' => $google_user->getAvatar(),
            ]);

            Auth::login($new_user);
            return redirect('/user/home');
        }

        Auth::login($user);
        return redirect('/user/home');
    }
}
