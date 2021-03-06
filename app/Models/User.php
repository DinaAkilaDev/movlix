<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'github_id',
        'auth_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function Favorites(){
        return $this->hasMany(Favorite::class,'favorite_id','id');
    }
    public function Reviews(){
        return $this->hasMany(Review::class,'review_id','id');
    }
    public function Movies(){
        return $this->belongsToMany(Movie::class, 'user_movies');
    }

//    public function linkedSocialAccounts()
//    {
//        return $this->hasMany(LinkedSocialAccount::class,'review_id','id');
//    }
}
