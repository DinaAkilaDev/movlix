<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class movieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        `id`, `imdbid`, `image`, `name`, `bio`, `year`, `languages`, `country`, `director`, `writer`, `producer`, `url`, `cast`,
        return [
            'id'=>$this->id,
            'imdbid'=>$this->imdbid,
            'image'=>$this->image,
            'name'=>$this->name,
            'bio'=>$this->bio,
            'year'=>$this->year,
            'languages'=>$this->languages,
            'country'=>$this->country,
            'director'=>$this->director,
            'writer'=>$this->writer,
            'producer'=>$this->producer,
            'url'=>$this->url,
            'cast'=>$this->cast,
        ];
    }
}
