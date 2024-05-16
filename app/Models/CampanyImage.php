<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampanyImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'campany_id',
        'image'
    ];
}
