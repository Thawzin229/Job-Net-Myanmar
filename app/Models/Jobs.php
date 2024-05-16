<?php

namespace App\Models;

use App\Models\Campany;
use App\Models\Location;
use Illuminate\Support\Str;
use App\Models\JobFuntionality;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jobs extends Model
{
    use HasFactory;
    protected $fillable = [
        'campany_id',
        'employer_id',
        'user_id'
    ];

    //relations 
    public function jobdetails()
    {
        return $this->hasOne(JobDetail::class);
    }

    // scope functions 
    public function scopeGetJob($query, $id)
    {
        $query->select('jobs.*', DB::raw("DATE_FORMAT(created_at,'%M / %e / %Y') as date"))->with([
            'jobdetails' => function ($subquery) {
                $subquery->addSelect([
                    'job_type_name' => JobFuntionality::select('name')->whereColumn('id', 'job_details.job_type')->take(1),
                    'location_name' => Location::select('name')->whereColumn('id', 'job_details.location')->take(1),
                ]);
            }
        ])
        ->addSelect([
            'campany_name' => Campany::select('name')->whereColumn('id', 'jobs.campany_id')->take(1)
        ])
        ->where('id', $id);
    }

    public function scopeGetJobs($query)
    {
        $query->select('jobs.*', DB::raw("DATE_FORMAT(created_at,'%M / %e / %Y') as date"))->with([
            'jobdetails' => function ($subquery) {
                $subquery->addSelect([
                    'job_type_name' => JobFuntionality::select('name')->whereColumn('id', 'job_details.job_type')->take(1),
                    'location_name' => Location::select('name')->whereColumn('id', 'job_details.location')->take(1),
                ]);
            }
        ])->where('user_id', Auth::id());
    }
    public function scopeGetMainJobs($query, $filters = null,$search=null)
    {
        $query->select('jobs.*', DB::raw("DATE_FORMAT(jobs.created_at,'%M / %e / %Y') as date"))->with([
            'jobdetails' => function ($subquery) {
                $subquery->addSelect([
                    'job_type_name' => JobFuntionality::select('name')->whereColumn('id', 'job_details.job_type')->take(1),
                    'location_name' => Location::select('name')->whereColumn('id', 'job_details.location')->take(1),
                ]);
            }
        ])
            ->join('job_details', 'jobs.id', 'job_details.jobs_id')
            ->join('job_funtionalities', 'job_funtionalities.id', 'job_details.job_type')
            ->when($filters ?? null, function ($query, $filters) {
                $sorting = $filters['sorting']??null;
                $location = $filters['location']??null;
                $campany = $filters['campany']??null;
                $types = $filters['job_type']??null;
                $full_time = $types['full_time']??null;
                $part_time = $types['part_time']??null;
                $internship = $types['internship']??null;
                $freelance = $types['freelance']??null;
                $any = $types['any']??null;

                // fee 
                $fee = $filters['fee']??null;
                $zero_one = $fee['zero_one']??null;
                $one_five = $fee['one_five']??null;
                $five_ten = $fee['five_ten']??null;
                $ten_twoten = $fee['ten_twoten']??null;
                $query
                    ->when($sorting !== null, function ($query) use ($sorting) {
                        $query->orderBy('jobs.created_at', $sorting)->paginate()->withQueryString();
                    })
                    ->when($location !== null, function ($query) use ($location) {
                        $query->where('job_details.location', $location)->paginate()->withQueryString();
                    })
                    ->when($campany !== null, function ($query) use ($campany) {
                        $query->where('jobs.campany_id', $campany)->paginate()->withQueryString();
                    })
                    // for one way of filtering
                    ->when($full_time === 'true', function ($query) use ($full_time) {
                        $query->where('job_funtionalities.name', 'full_time')->paginate()->withQueryString();
                    })
                    ->when($part_time === 'true', function ($query) use ($part_time) {
                        $query->where('job_funtionalities.name', 'part_time')->paginate()->withQueryString();
                    })
                    ->when($internship === 'true', function ($query) use ($internship) {
                        $query->where('job_funtionalities.name', 'internship')->paginate()->withQueryString();
                    })
                    ->when($freelance === 'true', function ($query) use ($freelance) {
                        $query->where('job_funtionalities.name', 'freelance')->paginate()->withQueryString();
                    })
                    // for two way of filtering (fulltime)
                    ->when($full_time === 'true' && $part_time === 'true', function ($query) use ($part_time) {
                        $query->orwhere('job_funtionalities.name','part_time')
                        ->orwhere('job_funtionalities.name','full_time')
                        ->paginate()->withQueryString();
                    })
                    ->when($full_time === 'true' && $internship === 'true', function ($query) use ($part_time) {
                        $query->orwhere('job_funtionalities.name','full_time')
                        ->orwhere('job_funtionalities.name','internship')
                        ->paginate()->withQueryString();
                    })
                    ->when($full_time === 'true' && $freelance === 'true', function ($query) use ($part_time) {
                        $query->orwhere('job_funtionalities.name','full_time')
                        ->orwhere('job_funtionalities.name','freelance')
                        ->paginate()->withQueryString();
                    })
                    // for two way of filtering (parttime)
                    ->when($part_time === 'true' && $internship === 'true', function ($query) use ($part_time) {
                        $query->orwhere('job_funtionalities.name','part_time')
                        ->orwhere('job_funtionalities.name','internship')
                        ->paginate()->withQueryString();
                    })
                    ->when($part_time === 'true' && $freelance === 'true', function ($query) use ($part_time) {
                        $query->orwhere('job_funtionalities.name','part_time')
                        ->orwhere('job_funtionalities.name','freelance')
                        ->paginate()->withQueryString();
                    })
                    // for two way of filtering (intern)
                    ->when($internship === 'true' && $freelance === 'true', function ($query) use ($part_time) {
                        $query->orwhere('job_funtionalities.name','internship')
                        ->orwhere('job_funtionalities.name','freelance')
                        ->paginate()->withQueryString();
                    })
                    // for three way of filtering 
                    ->when($full_time === 'true' && $part_time === 'true' && $internship === 'true', function ($query) use ($part_time) {
                        $query->orwhere('job_funtionalities.name','full_time')
                        ->orwhere('job_funtionalities.name','part_time')
                        ->orwhere('job_funtionalities.name','internship')
                        ->paginate()->withQueryString();
                    })
                    ->when($part_time === 'true' && $internship === 'true' && $freelance === 'true', function ($query) use ($part_time) {
                        $query->orwhere('job_funtionalities.name','part_time')
                        ->orwhere('job_funtionalities.name','internship')
                        ->orwhere('job_funtionalities.name','freelance')
                        ->paginate()->withQueryString();
                    })
                    ->when($any === 'true', function ($query) use ($part_time) {
                        $query->paginate()->withQueryString();
                    })
                    // fee start here
                    ->when($zero_one === 'true', function ($query) use ($part_time) {
                        $query->whereBetween('job_details.fee',[0,100])
                        ->paginate()->withQueryString();
                    })
                    ->when($one_five === 'true', function ($query) use ($part_time) {
                        $query->whereBetween('job_details.fee',[100,500])
                        ->paginate()->withQueryString();
                    })
                    ->when($five_ten === 'true', function ($query) use ($part_time) {
                        $query->whereBetween('job_details.fee',[500,1000])
                        ->paginate()->withQueryString();
                    })
                    ->when($ten_twoten === 'true', function ($query) use ($part_time) {
                        $query->whereBetween('job_details.fee',[1000,2000])
                        ->paginate()->withQueryString();
                    })
                    ->when($zero_one === 'true' && $one_five === 'true', function ($query) use ($part_time) {
                        $query->orwhereBetween('job_details.fee',[0,100])
                        ->orwhereBetween('job_details.fee',[100,500])
                        ->paginate()->withQueryString();
                    })
                    ->when($zero_one === 'true' && $five_ten === 'true', function ($query) use ($part_time) {
                        $query->orwhereBetween('job_details.fee',[0,100])
                        ->orwhereBetween('job_details.fee',[500,1000])
                        ->paginate()->withQueryString();
                    })
                    ->when($zero_one === 'true' && $ten_twoten === 'true', function ($query) use ($part_time) {
                        $query->orwhereBetween('job_details.fee',[0,100])
                        ->orwhereBetween('job_details.fee',[1000,2000])
                        ->paginate()->withQueryString();
                    })
                    ->when($one_five === 'true' && $five_ten === 'true', function ($query) use ($part_time) {
                        $query->orwhereBetween('job_details.fee',[100,500])
                        ->orwhereBetween('job_details.fee',[500,1000])
                        ->paginate()->withQueryString();
                    })
                    ->when($one_five === 'true' && $ten_twoten === 'true', function ($query) use ($part_time) {
                        $query->orwhereBetween('job_details.fee',[100,500])
                        ->orwhereBetween('job_details.fee',[1000,2000])
                        ->paginate()->withQueryString();
                    })
                    ->when($five_ten === 'true' && $ten_twoten === 'true', function ($query) use ($part_time) {
                        $query->orwhereBetween('job_details.fee',[500,1000])
                        ->orwhereBetween('job_details.fee',[1000,2000])
                        ->paginate()->withQueryString();
                    })
                    // three way
                    ->when($zero_one === 'true' && $one_five === 'true' &&  $five_ten === 'true', function ($query) use ($part_time) {
                        $query->orwhereBetween('job_details.fee',[0,100])
                        ->orwhereBetween('job_details.fee',[100,500])
                        ->orwhereBetween('job_details.fee',[500,1000])
                        ->paginate()->withQueryString();
                    })   
                    ->when($one_five === 'true' &&  $five_ten === 'true' && $ten_twoten === 'true', function ($query) use ($part_time) {
                        $query
                        ->orwhereBetween('job_details.fee',[100,500])
                        ->orwhereBetween('job_details.fee',[500,1000])
                        ->orwhereBetween('job_details.fee',[1000,2000])
                        ->paginate()->withQueryString();
                    });
            })
            ->when($search,function($query,$search){
                $query->whereRaw("regexp_replace(job_details.job_title, '[^A-Za-z0-9က-အ]', '') like ?", [$search])
                ->paginate()->withQueryString();
            })
            ->addSelect([
                'campany_name' => Campany::select('name')->whereColumn('id', 'jobs.campany_id')->take(1)
            ]);
    }
}

