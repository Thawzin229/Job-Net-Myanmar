<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Mail\UserMail;
use App\Models\UserProfile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;

class UserAuthController extends Controller
{
    public function signuppage()
    {
        return Inertia::render('user/auth/signup');
    }

    //sign in page 
    public function signinpage()
    {
        return Inertia::render('user/auth/signin');
    }

    // otp page 
    public function otppage()
    {
        return Inertia::render('user/auth/otp');
    }

    // otpLoginPage
    public function otpLoginPage()
    {
        return Inertia::render('user/auth/otplogin');
    }


    #process start here
    //sing up
    public function signup(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:users,email',
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
        $user = User::create($data);
        UserProfile::create(['user_id' => $user->id]);

        return redirect('user/auth/sign-in');
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

        if (Auth::attempt($data)) {
            $new_token = Str::upper(Str::random(4));
            User::where('email', $request->email)->update(['jwt_token' => $new_token]);
            return redirect('/user/home');
        }

        return back()->withErrors(['status' => 'Email or Password is invalid']);
    }

    // otp login start here
    public function sendEmail(Request $request)
    {
        $data = $request->validate(['email' => 'required|email|exists:users,email']);
        $token = User::where('email', $request->email)->first()->jwt_token;
        Mail::to($request->email)->send(new UserMail($token));

        return redirect('user/auth/sign-in/otp-login')->withErrors(['email' => $request->email]);
    }

    // login 
    public function optlogin(Request $request)
    {
        $data = $request->validate([
            'token' => 'required|min:4',
            'email' => 'required|exists:users,email'
        ]);

        if ($user = User::where('email', $request->email)->where('jwt_token', $request->token)->first()) {
            Auth::login($user);
            return redirect('/user/home');
        }

        return back()->withErrors(['status' => 'Try again , token is invalid to login.']);

    }

    // logout
    public function logout()
    {
        Auth::logout();
        session()->regenerate();
        Cookie::queue(Cookie::forget('job_net_token'));
        return back();
    }

    #forget passwrod 

    public function fgPage()
    {
        return Inertia::render('user/auth/forgetpass/index');
    }

    public function changepasspage()
    {
        return Inertia::render('user/auth/forgetpass/password');
    }

    public function updatepasspage()
    {
        return Inertia::render('user/auth/forgetpass/change');
    }

    public function sendtoken(Request $request)
    {
        $data = $request->validate(['email' => 'required|email|exists:users,email']);
        $token = User::where('email', $request->email)->first()->jwt_token;
        Mail::to($request->email)->send(new UserMail($token));

        return redirect('user/auth/forget-password/change')->withErrors(['email' => $request->email]);
    }

    public function checkToken(Request $request)
    {
        $data = $request->validate([
            'token' => 'required|min:4',
            'email' => 'required|exists:users,email'
        ]);

        if ($user = User::where('email', $request->email)->where('jwt_token', $request->token)->first()) {
            return redirect('user/auth/forget-password/update')->withErrors(['email' => $request->email]);
        }

        return back()->withErrors(['status' => 'Try again , token is invalid to login.']);
    }

    // update passwod 
    public function updatePass(Request $request)
    {
        $data = $request->validate([
            'password' => [
                'required',
                'min:8',
                'max:16',
                "regex:/[A-Z]/",
                "regex:/[a-z]/",
                "regex:/[0-9]/",
                "regex:/[!@#$%&*()<>]/"
            ],
            'email' => 'required|exists:users,email'
        ]);

        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        return redirect("user/auth/sign-in");
    }

}
