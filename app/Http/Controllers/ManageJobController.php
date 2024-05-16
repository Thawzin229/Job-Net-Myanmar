<?php

namespace App\Http\Controllers;

use App\FormData;
use App\Validation;
use App\Models\Jobs;
use Inertia\Inertia;
use App\ImageUploading;
use App\Models\Category;
use App\Models\Location;
use App\Models\JobDetail;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\JobFuntionality;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ManageJobController extends Controller
{
    //page 
    public function index()
    {
        //relations eager loading
        $campany_jobs = Jobs::query()->GetJobs()->paginate(5)->withQueryString();
        //covert the string to array and fetch the data of category
        foreach ($campany_jobs->items() as $key => $job) {
            $job_id = $job['id'];
            $app_count = Application::where('job_id',$job_id)->count();

            $categories = json_decode($job['jobdetails']['category']);
            $final_categories = Category::whereIn('id', $categories)->get()->pluck('name');
            $campany_jobs[$key]['jobdetails']['category_data'] = $final_categories;  // current job
            $campany_jobs[$key]['jobdetails']['applications'] = $app_count;  // current job

        }
        return Inertia::render("user/Jobs/manage", ['jobs' => $campany_jobs]);
    }

    // delete
    public function delete($id)
    {
        Jobs::find($id)->delete();
        $old_image = JobDetail::where('jobs_id', $id)->first()->image;
        if ($old_image !== null) {
            Storage::delete('job_images/' . $old_image);
        }
        JobDetail::where('jobs_id', $id)->delete();
        return back();
    }

    // detail 
    public function show($id)
    {
        $form_data = FormData::data();
        $campany_jobs = Jobs::query()->GetJob($id)->first();
        return Inertia::render('user/Jobs/edit', ['job' => $campany_jobs, 'form_data' => $form_data]);
    }

    // update 
    public function update(Request $request)
    {   
        $data = Validation::jobValidation($request,$request->id);
        unset($data['campany_id'],$data['employer_id']);
        Jobs::find($request->id)->update([
            'campany_id' => $request->campany_id,
            'employer_id' => $request->employer_id,
        ]);
        $file_name = ImageUploading::uploadPivotImage($request,$request->id,'job_images',JobDetail::class,'jobs_id');
        $data['image'] = $file_name;
        $data['category'] = is_array($request->category) ?  json_encode($request->category) : $request->category;
        JobDetail::where('jobs_id',$request->id)->update($data);
        return back()->withErrors(['status' => 'Job has been updateed successfully.']);
    }

}
