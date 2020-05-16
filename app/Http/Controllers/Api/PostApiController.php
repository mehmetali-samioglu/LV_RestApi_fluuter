<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostsResource;
use App\Models\Post;

class PostApiController extends Controller
{
    public function index()
    {
        //posta ait "images" ve "author" ları getirdik
        $post = Post::with(['author','images','videos','category'])->paginate();

        return  PostResource::collection( $post );
//        return new PostsResource($post);
    }
}
