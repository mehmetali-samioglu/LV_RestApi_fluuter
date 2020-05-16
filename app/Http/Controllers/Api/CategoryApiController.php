<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoriesResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostsResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{

    //GET ALL
    public function index()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function posts( $id )
    {
        $category = Category::find($id);
        $posts = $category->posts;
        return PostResource::collection($posts);
    }

}
