<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return view('tags.tags')->with([
            'tags' => Tag::orderBy('id','desc')->get()
        ]);
    }

    public function show( $id )
    {
        //üstteki de bu da aynı aslında
        $tag = Tag::find($id);
        return view('tags.tag')->withTag($tag);
    }


    public function store( Request $request)
    {
        $request->validate([
            'tag_title' => 'required'
        ]);

        $tag = new Tag();
        $tag->title = $request->get('tag_title');
        $tag->save();

        return redirect()->back()->with('message','Tag Kaydedildi');
    }

}
