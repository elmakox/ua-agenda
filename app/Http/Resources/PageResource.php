<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
        	'id' => $this->ID,
	        'title' => $this->title,
	        'body' => $this->body,
	        'projects' => ProjectResource::collection($this->projects),
	        'aspirations' => AspirationResource::collection($this->aspirations),
	        'links' => $this->additional_links,
	        'medias' => $this->media
        ];
    }
}
