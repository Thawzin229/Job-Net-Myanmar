<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\FormData;

class BrowseResumeController extends Controller
{
    //page 
    public function index()
    {
        $filters = request('param');
        $search = request('search') !== null ? "%" . preg_replace("/[^A-Za-z0-9က-အ]/u", '', request('search')) . "%" : null;
        $resumes = Resume::select('resumes.*',DB::raw("DATE_FORMAT(created_at,'%M %e , %Y') as date"))
        ->when($filters??null,function($query,$filters){
            $sorting = $filters['sorting']??null;
            $location = $filters['location']??null;
            $query->when($location,function($subquery,$location){
                $subquery->where('location',$location)->paginate()->withQueryString();
            });
            $query->when($sorting,function($subquery,$sorting){
                $subquery->orderBy('created_at',$sorting)->paginate()->withQueryString();
            });
        })
        ->when($search,function($query,$search){
            $query->whereRaw("regexp_replace(name, '[^A-Za-z0-9က-အ]', '') like ?", [$search])
            ->paginate()->withQueryString();
        })
        ->with('socials','educations','experiences')->paginate()->withQueryString();
        $data  = FormData::data();
        return Inertia::render('user/browse-resumes/index',['resumes'=>$resumes,'data'=>$data]);
    }
}
