<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'image',
        'avatar',
        'address',
        'address_number',
        'gender',
        'birthday',
        'city',
        'state',
        'hobby'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
