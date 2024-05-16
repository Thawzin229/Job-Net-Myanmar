<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Resume;
use App\Models\Social;
use App\ImageUploading;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{

    //validation 
    public function validationRules($id)
    {
        return $id === null ? [
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email'],
            'about_me' => ['required', 'string','max:400'],
            'professional_title' => ['required', 'string', 'max:300'],
            'location' => ['required', 'string', 'max:400'],
            'image' => ['required', 'file', 'image', 'max:1000'],
            'video' => ['required', 'string', 'max:1000'],
            'resume_content' => ['required', 'string', 'max:2000'],
        ]:
        [
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email'],
            'about_me' => ['required', 'string','max:400'],
            'professional_title' => ['required', 'string', 'max:300'],
            'location' => ['required', 'string', 'max:400'],
            'video' => ['required', 'string', 'max:1000'],
            'resume_content' => ['required', 'string', 'max:2000'],
        ];
    }
    //page 
    public function createPage()
    {
        return Inertia::render('user/resume/create');
    }

    // inde page 
    public function index()
    {
        $my_resumes = Resume::select('resumes.*',DB::raw("DATE_FORMAT(created_at,'%M %e , %Y') as date"))
        ->with('socials','educations','experiences')->where('user_id',Auth::id())->paginate(5)->withQueryString();
        return Inertia::render('user/resume/index',['resumes' => $my_resumes]);
    }

    // show
    public function show($id)
    {
        $my_resume = Resume::select('resumes.*',DB::raw("DATE_FORMAT(created_at,'%M %e , %Y') as date"))
        ->with('socials','educations','experiences')->where('user_id',Auth::id())->where('id',$id)->first();
        return Inertia::render('user/resume/show',['resume' => $my_resume]);
    }

    //create 
    public function create(Request $request)
    {
        $data = $request->validate($this->validationRules(null));

        $image_uploading = new ImageUploading();
        $file_name = $image_uploading->upload($request,$id=null,'resume_images',Resume::class);
        $data['image'] = $file_name;
        $data['user_id'] = Auth::id();

        $resume = Resume::create($data);
        if ($request->social_data !== null) {
            foreach ($request->social_data as $social) {
                Social::create([
                    'resume_id' => $resume->id,
                    'name' => $social['name'],
                    'link' => $social['link']
                ]);
            }
        }

        if ($request->education_data !== null) {
            foreach ($request->education_data as $education) {
                Education::create([
                    'resume_id' => $resume->id,
                    'school_name' => $education['school_name'],
                    'qualifications' => $education['qualifications'],
                    'start_and_end_date' => $education['start_and_end_date'],
                    'note' => $education['note'],
                ]);
            }
        }

        if ($request->experience_data !== null) {
            foreach ($request->experience_data as $experience) {
                Experience::create([
                    'resume_id' => $resume->id,
                    'employer' => $experience['employer'],
                    'job_title' => $experience['job_title'],
                    'start_and_end_date' => $experience['start_and_end_date'],
                    'note' => $experience['note'],
                ]);
            }
        }
        return redirect('/user/resumes');

    }

    // edit 
    public function edit($id){
        
        $my_resume = Resume::select('resumes.*',DB::raw("DATE_FORMAT(created_at,'%M %e , %Y') as date"))
        ->with('socials','educations','experiences')->where('user_id',Auth::id())->where('id',$id)->first()->toArray();
        // dd($my_resume);
        return Inertia::render('user/resume/edit',['resume' => $my_resume]);
    }
    // update 
    public function update(Request $request)
    {
        $data = $request->validate($this->validationRules($request->id));
        $image_uploading = new ImageUploading();
        $file_name = $image_uploading->upload($request,$request->id,'resume_images',Resume::class);

        $data['image'] = $file_name;
        $data['user_id'] = Auth::id();
        $resume = Resume::find($request->id)->update($data);
        if ($request->socials !== null) {
            Social::where("resume_id",$request->id)->delete();
            foreach ($request->socials as $social) {
                Social::create([
                    'resume_id' => $request->id,
                    'name' => $social['name'],
                    'link' => $social['link']
                ]);
            }
        }

        if ($request->educations !== null) {
            Education::where("resume_id",$request->id)->delete();
            foreach ($request->educations as $education) {
                Education::create([
                    'resume_id' => $request->id,
                    'school_name' => $education['school_name'],
                    'qualifications' => $education['qualifications'],
                    'start_and_end_date' => $education['start_and_end_date'],
                    'note' => $education['note'],
                ]);
            }
        }

        if ($request->experiences !== null) {
            Experience::where("resume_id",$request->id)->delete();
            foreach ($request->experiences as $experience) {
                Experience::create([
                    'resume_id' => $request->id,
                    'employer' => $experience['employer'],
                    'job_title' => $experience['job_title'],
                    'start_and_end_date' => $experience['start_and_end_date'],
                    'note' => $experience['note'],
                ]);
            }
        }

        return back()->withErrors(['status' => 'Resume saved.']);


    }

    // delete 
    public function delete($id)
    {
        $old_image = Resume::find($id)->image;
        if($old_image !== null)
        {
            Storage::delete('resume_images/'.$old_image);
        }
        Resume::find($id)->delete();
        Social::where("resume_id",$id)->delete();
        Education::where("resume_id",$id)->delete();
        Experience::where("resume_id",$id)->delete();
        return back();
    }
}
