<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article ;
use App\Models\Profile ;
use App\Models\Video ;

class User extends Model
{
    //
    protected $fillable = ['name' , 'email' , 'password'];
    public function articles(){
        return $this->hasMany(Article::class);
    }
    public function profile(){
        return $this->hasOne(Profile::class);
    }
    public function videos(){
        return $this->hasMany(Video::class);
    }
}
