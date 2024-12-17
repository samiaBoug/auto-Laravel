<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment ;

class Video extends Model
{
    //
    
    protected $fillable = ['title' , 'description', 'user_id', 'category_id'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsTo(Category::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class , 'commentable') ;
    }
}
