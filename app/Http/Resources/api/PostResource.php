<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'category_name' => $this->category_name,
            'title' => $this->title,
            'description' => $this->description,
            'profile_image' => env('APP_URL') . '/uploads/posts/' . $this->profile_image,
            'user_image' => env('APP_URL') . '/uploads/profile/' . $this->user_image,
            'user_name' => $this->user_name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }






    
}
