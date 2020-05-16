<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('author','post')->paginate();
        return view('comments.comments')->withComments( $comments );
    }

    public function show ( $id )
    {
        return view('comments.comment')->withComment( Comment::find($id) );
    }



}
