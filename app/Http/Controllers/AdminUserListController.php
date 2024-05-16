<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\ImageUploading;
use App\Validation;
use App\Models\Location;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AdminUserListController extends Controller
{
    //usrdlist page 
    public function index()
    {
        $limit = request('limit') ?? 12;
        $search = request('search');
        $status = request('status');
        $admin = Auth::guard('admin')->user()->only(['id', 'email']);
        $users = User::FetchData($search, $status)->paginate($limit)->withQueryString();

        return Inertia::render("admin/userlist/index", ['users' => $users,'admin'=>$admin]);
    }

    //edit 
    public function show($id)
    {
        $admin = Auth::guard('admin')->user()->only(['id', 'email']);
        $user_profile = User::with('profile')->where('id', $id)->get();
        $states = Location::get()->toArray();

        return Inertia::render('admin/userlist/show', [
            'admin' => $admin,
            'profile' => $user_profile,
            'states' => $states
        ]);
    }

    public function update(Request $request)
    {
        $imageuploading = new ImageUploading();
        $data = Validation::profileValidation($request);

        $file_name = ImageUploading::uploadPivotImage($request, $id = $request->user_id, "user_profile_images", UserProfile::class, 'user_id');
        $data['image'] = $file_name;
        UserProfile::where('user_id', $request->user_id)->update($data);
        User::where('id', $request->user_id)->update(['role' => $request->role, 'status' => $request->status]);

        return back();
    }

    // delete 
    public function delete($id)
    {
        $user = User::find($id);
        $old_image = UserProfile::where('user_id', $id)->first()->image;
        if ($old_image !== null) {
            Storage::delete('user_profile_images/' . $old_image);
        }
        $user->delete();
        UserProfile::where('user_id', $id)->delete();

        return back();
    }
}
