@extends('layouts.app')

@section('content')

    <div class="card mt-3 ">
        <div class="card-body">
            <h4 class="card-title">Kategori Ekle</h4>
            <form action="{{ route('save-category') }}" method="post" class="mt-4">
                @csrf
                <div class="form-group row">
                    <label for="category_title" class="col-sm-2  col-form-label">Kategori Başlık</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="category_title" placeholder="Başlık" name="category_title" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category_color" class="col-sm-2  col-form-label">Kategori Rengi</label>
                    <div class="col-sm-2"><input type="color" class="form-control" id="category_color" name="category_color"></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3"><input type="submit" value="Yeni Kategoriyi Kaydet" class="btn btn-info form-control text-white"></div>
                </div>
            </form>
        </div>
    </div>


    <h1 class="mt-3">Kategoriler</h1>
    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-4 mt-2">
                <div class="card" style="background-color: {{$category->color}}">
                    <div class="card-body">
                        <h4 class="card-title text-white">{{$category->title}}</h4>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection
