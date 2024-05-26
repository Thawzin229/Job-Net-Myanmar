<?php

namespace App\Models;

use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'statement',
        'body',
        'image'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //scope function 
    public function scopeGetBlog($query)
    {
        $query->select('blogs.*',DB::raw("DATE_FORMAT(blogs.created_at,'%M %e,%Y') as date"))
        ->join('users','users.id','blogs.user_id')
        ->addSelect([
            'user_name' => UserProfile::select('name')->whereColumn('user_profiles.user_id','users.id')->take(1),
        ]);
    }

    // popular blog
    public function scopePopularBlogs($query)
    {
        $query->select('blogs.*',DB::raw("DATE_FORMAT(blogs.created_at,'%M %e, %Y') as date"))
        ->withCount('comments')
        ->orderBy('comments_count','desc')
        ->take(3);
    }

    // recnet blog 
    public function scopeRecentBlogs($query)
    {
        $query->select('blogs.*',DB::raw("DATE_FORMAT(blogs.created_at,'%M %e, %Y') as date"))->latest()->take(3);
    }
}
