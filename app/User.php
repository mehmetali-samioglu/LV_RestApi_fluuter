<?php

namespace App;

use App\Models\Post;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','email','password','api_token',
        'disliked_posts','liked_posts','favourite_posts','favourite_categories',
        'preferences','avatar'
    ];


    public function posts()
    {
        return $this->hasMany(Post::class,'author_id','id');
    }





    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
