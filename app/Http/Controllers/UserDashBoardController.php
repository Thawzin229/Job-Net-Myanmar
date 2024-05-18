<?php

namespace App\Http\Controllers;

use App\Validation;
use App\Models\User;
use Inertia\Inertia;
use App\ImageUploading;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    // update 
    public function update(Request $request)
    {
            $data  = Validation::profileValidation($request,'user');
            $file_name = ImageUploading::uploadPivotImage($request,$request->user_id, "user_profile_images", UserProfile::class, 'user_id');
            $data['image'] = $file_name;
            $data['image'] !== null ? UserProfile::where('user_id',$request->user_id)->update(['avatar'=>null]) : '';
            UserProfile::where('user_id', $request->user_id)->update($data);
            return redirect('user/dashboards/');
}
    //chnage password page 
    public function passwordPage()
    {
        return Inertia::render('user/dashboard/password');
    }

    // update the pass
    public function updatePass(Request $request)
    {
        $data = $request->validate([
            "old_password" => "required|min:8|max:16",
            'new_password' => [
                'required',
                'min:8',
                'max:16',
                "regex:/[A-Z]/",
                "regex:/[a-z]/",
                "regex:/[0-9]/",
                "regex:/[!@#$%&*()<>]/"
            ],
        ]);

        // chcekc the password that stored in the database.
        $db_password  = Auth::user()->getAuthPassword();
        if(Hash::check($request->old_password,$db_password)){
            User::where('id',Auth::user()->id)->update(['password' => Hash::make($request->new_password)]);
            Auth::logout();
            cookie()->forget('job_net_token');
            session()->regenerate();
            return redirect('user/auth/sign-in');
        }
        return back()->withErrors(['password_status'=>'Your old password is invalid.']);
    }
}
