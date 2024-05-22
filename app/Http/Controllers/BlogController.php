<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\UserProfile;
use Inertia\Inertia;
use App\ImageUploading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    //page 
    public function index()
    {
        $blogs = Blog::select('blogs.*',DB::raw("DATE_FORMAT(blogs.created_at,'%M %e,%Y') as date"))
        ->join('users','users.id','blogs.user_id')
        ->addSelect(['user_name' => UserProfile::select('name')->whereColumn('user_profiles.user_id','users.id')->take(1)])
        ->paginate()->withQueryString();

        $recent_blogs = Blog::select('blogs.*',DB::raw("DATE_FORMAT(blogs.created_at,'%M %e, %Y') as date"))->latest()->take(3)->get()->toArray();

        return Inertia::render('user/blog/index',['blogs'=>$blogs,'recents'=>$recent_blogs]);
    }

    //create page 
    public function createpage()
    {
        return Inertia::render('user/blog/create');
    }

    //create blog 
    public function create(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:200'],
            'statement' => ['required','string','max:200'],
            'body' => ['required','string','max:500'],
        ]);
        $image_uploading = new ImageUploading();
        $file_name  = $image_uploading->upload($request,null,'blog_images',Blog::class);
        $data['image'] = $file_name;
        $data['user_id'] = Auth::id();

        Blog::create($data);
        return back()->withErrors(['status' => 'Your blog posted successfully.']);
    }

    // show 
    public function show($id)
    {
        $blog = Blog::select('blogs.*',DB::raw("DATE_FORMAT(blogs.created_at,'%M %e,%Y') as date"))
        ->join('users','users.id','blogs.user_id')
        ->addSelect(['user_name' => UserProfile::select('name')->whereColumn('user_profiles.user_id','users.id')->take(1)])
        ->find($id);


        $recent_blogs = Blog::select('blogs.*',DB::raw("DATE_FORMAT(blogs.created_at,'%M %e, %Y') as date"))->latest()->take(3)->get()->toArray();
        return Inertia::render('user/blog/show',['blog'=>$blog,'recents'=>$recent_blogs]);
    }

}

