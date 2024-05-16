<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Inertia\Inertia;
use App\ImageUploading;
use App\Validation;
use App\FormData;
use App\Models\Campany;
use App\Models\Category;
use App\Models\Employer;
use App\Models\Location;
use App\Models\JobDetail;
use Illuminate\Http\Request;
use App\Models\JobFuntionality;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AddJobsController extends Controller
{
    //add job page 
    public function index()
    {
        $form_data = FormData::data();

        // $campany_jobs = Jobs::with([
        //     'jobdetails' => function ($query) {
        //         $query->addSelect([
        //             'job_type_name' => JobFuntionality::select('name')->whereColumn('id', 'job_details.job_type')->take(1),
        //             'location_name' => Location::select('name')->whereColumn('id', 'job_details.location')->take(1),
        //         ]);
        //     }
        // ])->where('campany_id', 1)->get()->toArray();
        // foreach ($campany_jobs as $key => $job) {
        //     $categories = json_decode($job['jobdetails']['category']);
        //     dd($categories);
        //     $final_categories = Category::whereIn('id', $categories)->get()->pluck('id', 'name');
        //     $campany_jobs[$key]['jobdetails']['category_data'] = $final_categories;  // current job
        // }
        return Inertia::render('user/Jobs/index', ['form_data' => $form_data]);
    }

    // create job 
    public function create(Request $request)
    {
        $imageuploading = new ImageUploading();
        $data = Validation::jobValidation($request);
        
        $job = Jobs::create([
            'campany_id' => $request->campany,
            'employer_id' => $request->employer,
            'user_id' => Auth::id()
        ]);

        $file_name = $imageuploading->upload($request, $id = null, "job_images", JobDetail::class);
        $data['image'] = $file_name;
        unset($data['campany'],$data['employer']);
        $data['category'] = json_encode($request->category);
        $data['jobs_id'] = $job->id;
        JobDetail::create($data);
        return back()->withErrors(['status' => 'Job offer has been post to the community.']);
    }
}
