<?php

namespace App\Http\Controllers;

use App\FormData;
use App\Models\Jobs;
use Inertia\Inertia;
use App\Getcategories;
use App\Models\Category;
use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainJobController extends Controller
{
    //page 
    public function index()
    {
        $category_id = request('category_id');
        $filters = request('param');
        $search = request('search') !== null ? "%" . preg_replace("/[^A-Za-z0-9က-အ]/u", '', request('search')) . "%" : null;
        $jobs = Jobs::query()->GetMainJobs($filters,$search)->paginate(5)->withQueryString();
        $user_applications = Application::where('user_id',Auth::id())->pluck('job_id')->toArray();

        foreach ($jobs as $key => $job) {
            $job_id = $job['id'];
            $categories = json_decode($job['jobdetails']['category']);
            $final_categories = Category::whereIn('id', $categories)->get()->pluck('name','id');
            $jobs[$key]['jobdetails']['category_data'] = $final_categories;  // current job
            $description =  Str::limit($job['jobdetails']['tag_line'],100);
            $jobs[$key]['jobdetails']['main_description'] = $description;  // current job

            $jobs[$key]['jobdetails']['is_applied']  = in_array($job_id,$user_applications) ? true:false;

            if($category_id !== null){
            if(!in_array($category_id,json_decode($jobs[$key]['jobdetails']['category'])))
            {
                unset($jobs[$key]);
            }
            }
        }
        $data  = FormData::data();
        return Inertia::render('user/browse-jobs/index',['jobs' => $jobs,'data'=>$data]);
    }

    //Job Detail
    public function show($id)
    {
        $job = Jobs::GetJob($id)->first();
        Getcategories::get($job);

        return Inertia::render("user/browse-jobs/job",['job'=>$job]);
    }
}
