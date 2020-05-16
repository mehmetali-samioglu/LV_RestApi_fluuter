@extends('layouts.app')

@section('content')
    <div class="card mt-3 ">
        <div class="card-body">
            <h4 class="card-title">Comment Ekle Silme lAzım olcak</h4>
            <form action="{{ route('save-comment') }}" method="post" class="mt-4">
                @csrf
                <div class="form-group row">
                    <label for="comment_content" class="col-sm-2  col-form-label">Comment İçerik</label>
                    <div class="col-sm-7">
                        <input type="text"   class="form-control" id="comment_content" placeholder="İçerik" name="comment_content" required>
                    </div>
                    <div class="col-sm-3"><input type="submit" value="Yeni Yorumu Kaydet" class="btn btn-info form-control text-white"></div>
                </div>
            </form>
        </div>
    </div>


    <h1 class="mt-3">Yorumlar</h1>
    <div class="row">

        @foreach($comments as $comment)
            <div class="col-md-4 mt-2">
                <div class="card" >
                    <div class="card-body">
                        <h4 class="card-title">{{ $comment->author->first_name}} {{ $comment->author->last_name}}</h4>
                        <p class="card-text">{{ $comment->content }}</p>
                        <a href="{{ $comment->post->link() }}" class="btn btn-primary">Yazıya Git</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-md-12">
        {{ $comments->links() }}
    </div>
@endsection
