<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = [
        'resume_id',
        'employer',
        'job_title',
        'start_and_end_date',
        'note'
    ];
    public  function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
