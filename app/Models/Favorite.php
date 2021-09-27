<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = [
        'movie_id',
        'user-id'
    ];
    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}
