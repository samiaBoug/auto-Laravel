<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article ;
use App\Models\Profile ;

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
}
