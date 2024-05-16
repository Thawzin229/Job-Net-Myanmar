<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Location;
use App\Models\Review;
use App\Models\User;
use App\Models\UserProfile;
use Inertia\Inertia;
use App\Models\Category;
use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserHomeController extends Controller
{
    //user home page
    public function index()
    {   
        $limit = request("limit") ?? 5;
        $category =  Category::take(8)->get()->toArray();
        $locations =  Location::take(8)->get()->toArray();
        $reviews =  Review::addSelect(['user_name' => UserProfile::select("name")->whereColumn('user_id','reviews.user_id')->take(1)])
        ->take(8)->get()->toArray();
        
        $jobs = Jobs::query()->GetMainJobs()->paginate($limit)->withQueryString();
        $user_applications = Application::where('user_id',Auth::id())->pluck('job_id')->toArray();

        foreach ($jobs as $key => $job) {
            $job_id = $job['id'];
            $categories = json_decode($job['jobdetails']['category']);
            $final_categories = Category::whereIn('id', $categories)->get()->pluck('name','id');
            $jobs[$key]['jobdetails']['category_data'] = $final_categories;  // current job
            $description =  Str::limit($job['jobdetails']['tag_line'],100);
            $jobs[$key]['jobdetails']['main_description'] = $description;  // current job

            $jobs[$key]['jobdetails']['is_applied']  = in_array($job_id,$user_applications) ? true:false;
        }
        return Inertia::render('user/home/index',[
            'categories' => $category,
            'jobs' => $jobs,
            'locations' => $locations,
            'reviews' => $reviews
        ]);
}
}
