<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class favoritesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        id`, `user_id`, `movie_id`
        return [
            'id'=>$this->id,
            'user'=>new userResource($this->User),
            'movie'=>movieResource::collection($this->User->Movies),
            ];

    }
}
