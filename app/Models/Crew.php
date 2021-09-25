<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory;
    public function Movies(){
        return $this->belongsToMany(Movie::class, 'crew_movies');
    }
}
