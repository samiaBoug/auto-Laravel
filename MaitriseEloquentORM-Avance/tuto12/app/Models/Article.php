<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category ;
use App\Models\Tag ;

class Article extends Model
{
    //
    protected $fillable= ['title' , 'content' , 'user_id' , 'category_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tag(){
        return $this->belongsToMany(Tag::class , 'article_tag')->withPivot('description');
    }
    public function comments(){
        return $this->morphMany(Comment::class , 'commantable');
    }
}
