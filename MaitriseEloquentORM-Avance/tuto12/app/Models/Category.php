<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Video ;

class Category extends Model
{
    //
    protected $fillable = ['name'];
    
    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function Videos(){
        return $this->hasMany(Video::class);
    }
}
