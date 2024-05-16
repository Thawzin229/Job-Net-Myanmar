<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'resume_id',
        'school_name',
        'qualifications',
        'start_and_end_date',
        'note'
];
public  function resume()
{
    return $this->belongsTo(Resume::class);
}
}
