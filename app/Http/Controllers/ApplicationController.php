<?php

namespace App\Http\Controllers;

use App\Models\JobDetail;
use App\Models\User;
use Inertia\Inertia;
use App\ImageUploading;
use App\Models\Application;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Models\ApplicationNote;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    //create a cv for a job
    public function create(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['required','integer','exists:users,id'],
            'job_id' => ['required','integer','exists:jobs,id'],
            'email' => ['required','email'],
            'full_name' => ['required','string','min:10','max:20'],
            'cover_letter' => ['required','string','min:10','max:1000'],
            'cv' => ['required','file','mimes:pdf','max:1000']
        ],['cv.mimes'=>'CV must be a file.']);

        $image_uploading = new ImageUploading();
        $file_name = $image_uploading->uploadCV($request,$id=null,'application_images',Application::class);
        $data['cv'] = $file_name;
        Application::create($data);
        return back()->withErrors(['status' => 'Application have been submited.']);
    }

    // application page 
    public function index($id)
    {
        $status = request('status');
        $sorting = request('sorting');
        $applications = Application::GetApplications($id,$status,$sorting)->latest()->paginate()->withQueryString();
        $job_name = JobDetail::where('jobs_id',$id)->first(['jobs_id','job_title']);
        return Inertia::render('user/applications/index',['applications' => $applications,'job'=>$job_name]);
    }

    // change status
    public function changeStatus(Request $request,$id)
    {
        if($request->rating > 5){
            return back()->withErrors(['rating' => 'Rating can be given up to 5.']);
        }
        if($request->rating === 0){
            return back()->withErrors(['rating' => 'Rating cannot be 0.']);
        }
    
        $data = [
            'status' => $request->status,
            'rating' => $request->rating,
        ];
        Application::find($id)->update($data);
        return back();
    }

    // add note 
    public function Note(Request $request)
    {
        $request->validate([
            'note' =>['required','string','max:100']
        ]);
        $data = [
            'user_id' => Auth::id(),
            'app_id' => $request->app_id,
            'note' => $request->note
        ];
        ApplicationNote::create($data);
        return back()->withErrors(['status' => 'Your note has been sent.']);
    }

    // delete the application
    public function Delete($id)
    {
        $old_cv = Application::find($id)->cv;
        if($old_cv !== null)
        {
            Storage::delete('application_images/'.$old_cv);
        }
        ApplicationNote::where('app_id',$id)->delete();
        Application::find($id)->delete();
        return back();
    }
}
