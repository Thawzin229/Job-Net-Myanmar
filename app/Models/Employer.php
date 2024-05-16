<?php

namespace App\Models;

use App\Models\Campany;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' ,
        'career',
        'image',
        'role',
        'campany_id'
    ];

    public function scopeFetchData($query,$search)
    {
        $query->select('employers.*',DB::raw("DATE_FORMAT(employers.created_at,'%M / %e/ %Y') as date"))
        ->join('campanies','employers.campany_id','campanies.id')
        ->addSelect(['campany' => Campany::select('name')->whereColumn('id','employers.campany_id')->take(1)])
        ->when($search,function($query,$search){
            $query->whereAny(['employers.name','campanies.name'],"like","%{$search}%")->paginate(10)->withQueryString();
        });
    }
}
