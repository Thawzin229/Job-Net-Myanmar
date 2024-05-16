<?php

namespace App\Http\Controllers;

use App\Models\AdminProfile;
use Inertia\Inertia;
use App\Models\Admin;
use App\Mail\AdminMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;

class AdminAuthController extends Controller
{
    //sing up page 
    public function signuppage()
    {
        return Inertia::render('admin/auth/signup');
    }

    //sign in page 
    public function signinpage()
    {
        return Inertia::render('admin/auth/signin');
    }

    // otp page 
    public function otppage()
    {
        return Inertia::render('admin/auth/otp');
    }

    // otpLoginPage
    public function otpLoginPage()
    {
        return Inertia::render('admin/auth/otplogin');
    }


    #process start here
    //sing up
    public function signup(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:admins,email',
            'password' => [
                'required',
                'min:8',
                'max:16',
                'confirmed',
                "regex:/[A-Z]/",
                "regex:/[a-z]/",
                "regex:/[0-9]/",
                "regex:/[!@#$%&*()<>]/"
            ],
            'password_confirmation' => 'required'
        ]);

        $token = Str::upper(Str::random(4));
        $data['jwt_token'] = $token;
        $data['password'] = Hash::make($request->password);
        $admin = Admin::create($data);
        AdminProfile::create(['admin_id' =>$admin->id ]);

        return redirect('admin/auth/sign-in');
    }

    // // sign in 
    public function signin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|',
            'password' => [
                'required',
                'min:8',
                'max:16',
            ],
        ]);

        if (Auth::guard('admin')->attempt($data)) {
            $new_token = Str::upper(Str::random(4));
            Admin::where('email', $request->email)->update(['jwt_token' => $new_token]);
            return redirect('admin/dashboard')->withCookie('job_net_token', $new_token, 60);
        }

        return back()->withErrors(['status' => 'Email or Password is invalid']);
    }

    // otp login start here
    public function sendEmail(Request $request)
    {
        $data = $request->validate(['email' => 'required|email|exists:admins,email']);
        $token = Admin::where('email', $request->email)->first()->jwt_token;
        Mail::to($request->email)->send(new AdminMail($token));

        return redirect('admin/auth/sign-in/otp-login')->withErrors(['email' => $request->email]);
    }

    // login 
    public function optlogin(Request $request)
    {
        $data = $request->validate([
            'token' => 'required|min:4',
            'email' => 'required|exists:admins,email'
        ]);

        if ($admin = Admin::where('email', $request->email)->where('jwt_token', $request->token)->first()) {
            Auth::guard('admin')->login($admin);
            return redirect('admin/dashboard');
        }

        return back()->withErrors(['status' => 'Try again , token is invalid to login.']);

    }

    // logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        Cookie::queue(Cookie::forget('job_net_token'));

        return redirect('admin/auth/sign-in');
    }
}
