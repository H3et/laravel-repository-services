<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CommentResource;

class PostsCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'post' => $this->data,
            'comments' => CommentResource::collection($this->comment),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
