<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'jwt_token',
        'google_id',
        'github_id',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function scopeFetchData($query,$search,$status)
    {
        $query->select('users.*',DB::raw("DATE_FORMAT(created_at,'%M / %e / %Y') as date"))
        ->addSelect([
            'image' => UserProfile::select('image')->whereColumn('user_id','users.id')->take(1),
            'avatar' => UserProfile::select('avatar')->whereColumn('user_id','users.id')->take(1)
            ])
        ->when($search,function($query,$search){
            $query->whereAny(['email','status','role'],'like',"%{$search}%")->paginate()->withQueryString();
        })
        ->when($status,function($query,$status){
            $query->whereAny(['status'],'like',"%{$status}%")->paginate()->withQueryString();
        });
    }

    // realations 
    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }
}
