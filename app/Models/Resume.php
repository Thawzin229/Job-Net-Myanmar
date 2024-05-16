<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'email',
        'professional_title',
        'location',
        'image',
        'video',
        'resume_content',
        'about_me'
    ];
    public  function socials()
    {
        return $this->hasMany(Social::class);
    }

    public  function educations()
    {
        return $this->hasMany(Education::class);
    }

    public  function experiences()
    {
        return $this->hasMany(Experience::class);
    }
}
