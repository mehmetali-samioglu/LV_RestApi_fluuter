@extends('layouts.app')

@section('content')


    <div class="card mt-3 ">
        <div class="card-body">
            <h4 class="card-title">Tag Ekle</h4>
            <form action="{{ route('save-tag') }}" method="post" class="mt-4">
                @csrf
                <div class="form-group row">
                    <label for="tag_title" class="col-sm-2  col-form-label">Tag Başlık</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="tag_title" placeholder="Başlık" name="tag_title" required>
                    </div>
                    <div class="col-sm-3"><input type="submit" value="Yeni Tagı Kaydet" class="btn btn-info form-control text-white"></div>
                </div>
            </form>
        </div>
    </div>


    <h1 class="mt-3">Taglar</h1>
    <div class="row">
        @foreach($tags as $tag)
            <div class="col-md-2 mt-2">
                <div class="card" >
                    <div class="card-body">
                        <h4 class="card-title">{{ $tag->title}}</h4>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
