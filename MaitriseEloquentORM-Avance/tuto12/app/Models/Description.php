<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag ;

class Description extends Model
{
    //
    protected $fillable = ['name'] ;

    public function tag(){
        return $this->belongsToMany(Tag::class , 'article_tag');
    }
}
