<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'surname', 'role', 'email', 'nick', 'password',
    ];

   
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /* -- ONE TO MANY -- */
    public function posts(){
        return $this->hasMany('App\Post');
    }
    
    public function likes(){
        return $this->hasMany('App\Like');
    }
    
    public function comments(){
        return $this->hasMany('App\Comment');
    }
   
}
