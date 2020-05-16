@extends('layouts.app')

@section('content')



    <h1 class="mt-3">{{ $post->id }} nolu Post Detayı</h1>
    <a href="{{ url()->previous() }}" class="btn btn-dark">Geri</a>
    <div class="row mb-3">
        <div class="col-md-6 mt-2 ">
            <div class="card" >
                <div class="card-body">
                    <h3 class="card-title ">{{ strtoupper($post->post_type)}}  </h3>
                    <h4 class="card-title">{{ $post->title}}</h4>
                    <p class="card-title  ">{{ $post->content}}</p>

                    <p class="card-title font-weight-bold mt-lg-5 ">Kulanıcı : {{ $post->author->first_name}} {{ $post->author->last_name}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-2">
            @if (count($post->images)>0)
                <h3>Posta ait Resimler</h3>
            @endif
            <div class="row">
                @foreach($post->images as $image)
                    <div class="col-md-6">
                        <a href="#" class="d-block mb-4 h-100">
                            <img class="card-img" src="{{ asset("storage/$image->url" ) }}" alt="{{$image->description}}">
                        </a>
                    </div>
                @endforeach
            </div>
            @if (count($videos)>0)
                <h3>Posta ait Videolar</h3>
            @endif
            <div class="row">
                @foreach($videos as $video)
                    <div class="col-md-6">
                        <a href="#" class="d-block mb-4 h-100">
                            <img class="card-img" src="{{ $video->url }}" alt="{{$video->title}}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
