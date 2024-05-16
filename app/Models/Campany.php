<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campany extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type' ,
        'employee', 
        'image' ,
        'statement',
        'visions',
        'what_we_do',
        'why_you_should_us',
        'address',
    ];

    public function scopeFetchData($query,$search)
    {
        $query->select('campanies.*',DB::raw("DATE_FORMAT(created_at,'%M / %e/ %Y') as date"))
        ->when($search,function($query,$search){
            $query->whereAny(['name','status'],"like","%{$search}%")->paginate(10)->withQueryString();
        });
    }
}
