<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Inertia\Inertia;
use App\Models\Bookmark;
use App\Models\Category;
use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    //bookmark creation 
    public function create(Request $request)
    {
        $data = $request->validate([
            'job_id' => ['required','exists:jobs,id']
        ]);
        $data['user_id'] = Auth::id();
        Bookmark::create($data);
        return back()->withErrors(['status' => 'Bookmarked']);
    }
    //bookmark page 
    public function index()
    {
        $search = request('search') !== null ? "%" . preg_replace("/[^A-Za-z0-9က-အ]/u", '', request('search')) . "%" : null;
        $filters = request('param');
        $jobs = Jobs::query()->join('bookmarks','bookmarks.job_id','jobs.id')
                    ->GetMainJobs($filters,$search)->where('bookmarks.user_id',Auth::id())
                    ->paginate(5)->withQueryString();

        $user_applications = Application::where('user_id',Auth::id())->pluck('job_id')->toArray();
        foreach ($jobs as $key => $job) {
            $job_id = $job['id'];
            $categories = json_decode($job['jobdetails']['category']);
            $final_categories = Category::whereIn('id', $categories)->get()->pluck('name');
            $jobs[$key]['jobdetails']['category_data'] = $final_categories;  // current job
            $description =  Str::limit($job['jobdetails']['tag_line'],100);
            $jobs[$key]['jobdetails']['main_description'] = $description;  // current job
            $jobs[$key]['jobdetails']['is_applied']  = in_array($job_id,$user_applications) ? true:false;
        }
        return Inertia::render('user/bookmarks/index',['jobs' => $jobs]);
    }
}
