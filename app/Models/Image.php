<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable =[
      'description','url','featured','post_id'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
