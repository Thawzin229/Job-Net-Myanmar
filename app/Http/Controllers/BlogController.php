<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
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
        $blogs = Blog::GetBlog()->paginate()->withQueryString();
        $recent_blogs = Blog::RecentBlogs()->get()->toArray();
        $popular_blogs = Blog::PopularBlogs()->get()->toArray();

        return Inertia::render('user/blog/index', ['blogs' => $blogs, 'recents' => $recent_blogs, 'populars' => $popular_blogs]);
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
            'title' => ['required', 'string', 'max:200'],
            'statement' => ['required', 'string', 'max:200'],
            'body' => ['required', 'string', 'max:500'],
        ]);
        $image_uploading = new ImageUploading();
        $file_name = $image_uploading->upload($request, null, 'blog_images', Blog::class);
        $data['image'] = $file_name;
        $data['user_id'] = Auth::id();

        Blog::create($data);
        return back()->withErrors(['status' => 'Your blog posted successfully.']);
    }

    // show 
    public function show($id)
    {
        $blog = Blog::GetBlog()->find($id);
        $blog->cmts = Comment::where('blog_id', $id)->count();
        $recent_blogs = Blog::RecentBlogs()->get()->toArray();
        $popular_blogs = Blog::PopularBlogs()->get()->toArray();
        $cmts = Comment::Comments($id)->paginate(2)->withQueryString();
        
        return Inertia::render('user/blog/show', 
        [
            'blog' => $blog,
            'recents' => $recent_blogs,
            'populars' => $popular_blogs,
            'cmts' => $cmts
        ]);
    }

    // add comment to the blog
    public function cmt(Request $request)
    {
        $data = $request->validate([
            'cmt' => ['required', 'string', 'max:1000'],
            'user_id' => ['nullable'],
            'blog_id' => ['nullable'],
            'name' => Auth::id() ? ['nullable'] : ['required'],
        ]);
        Comment::create($data);
        return back();

    }

}

