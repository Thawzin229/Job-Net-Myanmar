<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'rating',
        'job_id',
        'email',
        'full_name',
        'cover_letter',
        'cv',
        'status'
    ];

    public function notes()
    {
        return $this->hasMany(ApplicationNote::class);
    }


    public function scopeGetApplications($query,$id,$status,$sorting)
    {   
        $query->select('applications.*',DB::raw("DATE_FORMAT(created_at,'%M %e,%Y') as date"))
        ->addSelect([
            'user_name' => UserProfile::select('name')->whereColumn('user_id','applications.user_id')->take(1)
        ])
        ->when($status,function($query,$status){
            $query->where('status',$status)->paginate()->withQueryString();
        })
        ->when($sorting === 'desc',function($query,$sorting){
            $query->latest()->paginate()->withQueryString();
        })
        ->when($sorting === 'asc',function($query,$sorting){
            $query->orderBy('created_at','asc')->paginate()->withQueryString();
        }) 
        ->when($sorting === 'most',function($query,$sorting){
            $query->orderBy('rating','desc')->paginate()->withQueryString();
        })
        ->where('job_id',$id);
    }
}
