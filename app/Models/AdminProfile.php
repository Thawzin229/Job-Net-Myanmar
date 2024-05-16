<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
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
        'hobby',
        'job'
    ];
    
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
