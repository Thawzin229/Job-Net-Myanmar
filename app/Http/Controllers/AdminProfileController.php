<?php

namespace App\Http\Controllers;

use App\Validation;
use Inertia\Inertia;
use App\Models\Admin;
use App\ImageUploading;
use App\Models\Location;
use App\Models\AdminProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminProfileController extends Controller
{
    //profile page 
    public function index()
    {
        $admin = Auth::guard('admin')->user()->only(['id', 'email']);
        $admin_profile = Admin::with('profile')->where('id', $admin['id'])->get();
        $states = Location::get()->toArray();

        return Inertia::render('admin/profile/index', [
            'admin' => $admin,
            'profile' => $admin_profile,
            'states' => $states
        ]);
    }

    // update 
    public function update(Request $request)
    {
        $imageuploading = new ImageUploading();
        $data  = Validation::profileValidation($request);


        $file_name = ImageUploading::uploadPivotImage($request, $id = $request->admin_id, "admin_profile_images", AdminProfile::class, 'admin_id');
        $data['image'] = $file_name;
        AdminProfile::where('admin_id', $request->admin_id)->update($data);
        
        return back();
    }

    // updatePass
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
        $db_password  = Auth::guard('admin')->user()->getAuthPassword();
        if(Hash::check($request->old_password,$db_password)){
            Admin::where('id',Auth::guard('admin')->user()->id)->update(['password' => Hash::make($request->new_password)]);
            Auth::guard('admin')->logout();
            cookie()->forget('job_net_token');
            session()->regenerate();
            return redirect('admin/auth/sign-in');
        }
        return back()->withErrors(['password_status'=>'Your old password is invalid.']);
    }
}


