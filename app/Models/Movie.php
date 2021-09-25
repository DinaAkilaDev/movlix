<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    public function Users(){
        return $this->belongsToMany(User::class, 'user_movies');
    }
    public function Reviews(){
        return $this->hasMany(Review::class,'review_id','id');
    }
    public function Crews(){
        return $this->belongsToMany(Crew::class, 'crew_movies');
    }
}
