<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User ;

class Profile extends Model
{
    //
    protected $fillable=['nom' , 'bio','user_id' , 'photo'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
