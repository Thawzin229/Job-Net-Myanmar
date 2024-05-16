<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\UserProfile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{

    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function login()
    {

    $github_user = Socialite::driver("github")->stateless()->user();
    $user  = User::where("github_id",$github_user->getId())->first();
    if(!$user){
        $new_user = User::create([
            'email' => $github_user->email,
            'github_id' => $github_user->id,
            'jwt_token' => Str::upper(Str::random(4))
        ]);
        UserProfile::create([
            'user_id' => $new_user->id,
            'name' => $github_user->getNickname(),
            'avatar' => $github_user->getAvatar(),
        ]);
        Auth::login($new_user);
        return redirect('/user/home');

    }
    Auth::login($user);
    return redirect('/user/home');
}
}
