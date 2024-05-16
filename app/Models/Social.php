<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    protected $fillable = [
        'resume_id',
        'name',
        'link',
    ];

    public  function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
