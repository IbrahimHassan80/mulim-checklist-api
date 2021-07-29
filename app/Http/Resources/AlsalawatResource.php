<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlsalawatResource extends JsonResource
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
            
            'type' => $this->alsalawat(),
            'alsonna_before' => $this->alsonna_before,
            'alsalah' => $this->alfard,
            'alsonna_after' => $this->alsonna_after
           
            ];
    }

}
