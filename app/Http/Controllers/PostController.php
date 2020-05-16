<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(8);
        return view('posts.posts')->with([
           'posts' => $posts
        ]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        //$images = $post->images;  //=> bu şekilde de eklenebilir. view içine de gömülebilir.
        $videos = $post->videos;
        return view('posts.post')->with([
            'post'=>$post,
            'videos'=>$videos
        ]);
    }

    public function newPost()
    {
        $category = Category::all();
        $tags = Tag::all();
        return view('posts.new-post')->with([
            'kategoriler'=>$category,
            'tags' =>$tags
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required',
            'post_content' => 'required',
            'post_type' => 'required',
            'post_category' => 'required',
        ]);

        $user = Auth::user();
        $post = new Post();

        $post-> title           = $request->input('post_title');
        $post-> content         = $request->input('post_content');
        $post-> post_type       = $request->input('post_type');
        $post-> category_id     = intval($request->input('post_category'));
        $post-> author_id       = $user->id;

        $post->save();

        if($request->has('post_tags')){
            foreach ($request->input('post_tags') as $id){
                DB::table('post_tag')->insert([
                   'post_id' => $post->id,
                   'tag_id' => $id
                ]);
            }
        }

        if($request->hasFile('post_images')){
            $counter = 0;
            $images = $request->file('post_images');

            foreach ($images as $image){
                $path = $image->store( 'public');
                $image_s = new Image();

//                //dosyaya kaydetme
//                $name = time().'.'.$image->getClientOriginalExtension();
//                $image->move(public_path().'/images/',$name);

                //Resmi Veritabanına Kaydet
                $image_s->description = '';
                $image_s->url = $path;
                $image_s->post_id = $post->id;
                if($counter == 0){
                    $image_s->featured = true;
                }else{
                    $image_s->featured = false;
                }
                $image_s->save();
                $counter ++;
            }
        }

        return redirect(route('posts'));

    }

}
