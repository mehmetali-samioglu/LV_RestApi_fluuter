@extends('layouts.app')

@section('content')



    <h1 class="mt-3">Postlar</h1>
    <a class="btn btn-primary" href="{{ route('add-post')  }}">Yeni post Ekle</a>
    <div class="row mb-3">
        @foreach($posts as $post)
            <div class="col-md-4 mt-2">
                <div class="card" >
                    <div class="card-body">
                        <p class="card-title badge-dark">{{ $post->id}} - {{ $post->title}}</p>
                        <p class="card-title  ">{{ $post->content}}</p>
                        <h4 class="card-title ">{{ $post->category->title}}  </h4>
                        <h5 class="card-title">{{ $post->post_type}}  </h5>
                        <a class="btn btn-info" href="{{ route('show-post',['id'=> $post->id]) }}">Posta Git</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $posts->links() }}
@endsection
