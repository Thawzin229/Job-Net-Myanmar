<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'jobs_id',
        'email',
        'job_title',
        'location',
        'job_type',
        'requirement',
        'category',
        'fee',
        'job_tag',
        'description',
        'application_email',
        'deadline',
        'website_link',
        'tag_line',
        'twitter_user_name',
        'image'
    ];

    public function jobs()
    {
        return $this->belongsTo(Jobs::class);
    }
}
