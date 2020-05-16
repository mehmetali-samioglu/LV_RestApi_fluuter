<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'post_id' => $this->id,
            'post_title' => $this->title,
            'post_content'=>$this->content,
            'post_type' => $this->post_type,
            'category_id' =>$this->category_id,
            'author_id' => $this->author_id,
            'post_meta' => $this->meta_data,
            'updated_at' => $this->updated_at,
            'post_images' => ImageResource::collection($this->images),
            'post_videos' => VideoResource::collection($this->videos),
            'post_category' => new CategoryResource($this->category),
            'post_author' => new UserResource ($this->author),
            'tags' => TagResource::collection($this->tags),
            'comments' => CommentResource::collection($this->comments)
        ];
    }
}
