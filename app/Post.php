<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    
    /* -- MANY TO ONE -- */
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
    
    /* -- ONE TO MANY -- */
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    
     public function likes(){
        return $this->hasMany('App\Like');
    }
    
}
