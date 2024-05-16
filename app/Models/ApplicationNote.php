<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationNote extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'app_id',
        'note'
    ];

    public function applications()
    {
        return $this->belongsTo(Application::class);
    }
}
