<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);

       return [
        'id' => $this->id,
        'author' => $this->user->name,
        'title' => $this->title,
        'description' => $this->description,
        'photo' => $this->photo,
        'created_at' => $this->created_at->format('d/m/Y')
    ];
    }
}
