<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Tag extends Model
{
    //
    protected $fillable = ['name'];

    public function tags(){
        return $this->belongsToMany(Article::class , 'article_tag');
    }
}
