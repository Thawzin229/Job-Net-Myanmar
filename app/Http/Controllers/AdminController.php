<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JobFuntionality;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Campany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //dashboard 
    public function dashboard()
    {
        $count = DB::select("SELECT
        (select count(*) from users where role='user') as users,
        (select count(*) from campanies ) as campanies,
        (select count(*) from employers ) as employers,
        (select count(*) from categories ) as categories,
        (select count(*) from locations ) as locations,
        (select count(*) from job_funtionalities ) as jobs
        ");
        
        $members = User::with('profile')->where("role",'member')->take(5)->get()->toArray();
        $campanies = Campany::take(10)->get()->toArray();
        $jobs = JobFuntionality::take(5)->get()->toArray();
        $categories = Category::take(5)->get()->toArray();
        $admin = Auth::guard('admin')->user()->only(['id', 'email']);

        return Inertia::render('admin/dashboard/index', [
            'admin' => $admin,'count'=> $count,
            'members'=>$members,'campanies' => $campanies,
            'jobs' => $jobs,
            'categories' => $categories
        ]);
    }
}
