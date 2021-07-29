<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AzkarsleepResource extends JsonResource
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
            'type' => $this->getazkar(),
            'title' => $this->title,
            'content' => $this->content,
            'count' => $this->count,
        ];
    }
}
