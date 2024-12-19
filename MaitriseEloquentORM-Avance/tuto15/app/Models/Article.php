<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = ['title' , 'content' , 'user_id' , 'category_id'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsTo(User::class);
    }
    //tag
    public function tags(){
        return $this->belongsToMany(Tag::class , 'article_tag');
    }

    //comments
}
