<?php

namespace App\Models;

use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'blog_id',
        'cmt'
    ];

    // scope function 
    public function scopeComments($query,$id)
    {
        $query->select('comments.*',DB::raw("DATE_FORMAT(created_at,'%M %e,%Y') as date"))
        ->addSelect([
            'authed_name' => UserProfile::select('name')->whereColumn('user_profiles.user_id','comments.user_id')->take(1),
            'user_image' => UserProfile::select('image')->whereColumn('user_profiles.user_id','comments.user_id')->take(1),
            'user_avatar' => UserProfile::select('avatar')->whereColumn('user_profiles.user_id','comments.user_id')->take(1)
            ])
        ->where('blog_id',$id);
    }
}
