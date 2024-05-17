<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashBoardController extends Controller
{
    //page 
    public function index()
    {
        $user_profile = User::with(['profile','applications','resume' => function($query){
            $query->with('socials')->get()->toArray();}])->where('id',Auth::id())->first()->toArray();
        return Inertia::render('user/dashboard/index',['user_profile' => $user_profile]);
    }

    //edit 
    public function edit()
    {
        $user_profile = User::with('profile')->where('id',Auth::id())->first()->toArray();
        return Inertia::render('user/dashboard/edit',['user_profile' => $user_profile]);
    }
}
