@extends('layouts.app')

@section('content')



    <div class="row mb-3">
        <div class="col-md-12 mt-2">
            <div class="card" >
                <div class="card-body">
                    <form action="{{ route('save-post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="post_title" class="col-sm-2  col-form-label">Post Başlık</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="post_title" placeholder="Başlık" name="post_title" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="post_content" class="col-sm-2  col-form-label">Post İçerik</label>
                            <div class="col-sm-10">
                                <textarea id="post_content" name="post_content" cols="30" rows="10" class="form-control" placeholder="Post İçerik"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="post_content" class="col-sm-2  col-form-label">Post Tipi</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="post_type" id="">
                                        <option value="text">Text</option>
                                        <option value="video">Video</option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="post_content" class="col-sm-2  col-form-label">Post Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="post_category" id="">
                                        <option selected>Kategori Seç:</option>
                                        @foreach($kategoriler as $kat)
                                            <option value="{{ $kat->id }}">{{ $kat->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="post_content" class="col-sm-2  col-form-label">Post Tagları</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="post_tagsx[]" id="" multiple>
                                    <option selected>Tag Seç:</option>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                                <br>
                                @foreach($tags as $tag)
                                    <label class="checkbox-inline mr-2">
                                        <input type="checkbox" name ="post_tags[]" class="mr-1" value="{{ $tag->id }}">{{ $tag->title }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="post_content" class="col-sm-2  col-form-label">Post Resimleri</label>
                            <div class="col-sm-10">
                                <input type="file" value="Yeni Postu Kaydet" name="post_images[]" class="form-control" multiple>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="post_content" class="col-sm-2  col-form-label">Post Videoları</label>
                            <div class="col-sm-10">
                                 <input type="file" value="Yeni Postu Kaydet" name="post_videos[]" class=" form-control" multiple>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="post_content" class="col-sm-2  col-form-label"></label>
                            <div class="col-sm-10"> <input type="submit" value="Yeni Postu Kaydet" class="btn btn-primary form-control text-white">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
