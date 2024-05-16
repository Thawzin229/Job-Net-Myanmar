<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status'
    ];


    public function scopeFetchData($query,$search)
    {
        $query->select('id','name','status',DB::raw("DATE_FORMAT(created_at,'%M / %e/ %Y') as date"))
        ->when($search,function($query,$search){
            $query->whereAny(['name','status'],"like","%{$search}%")->paginate()->withQueryString();
        });
    }
}
