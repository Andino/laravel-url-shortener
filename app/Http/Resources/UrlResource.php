<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UrlResource extends JsonResource
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
            'url' => $this->url,
            'shorter_url' => $this->shorter_url,
            'title' => $this->title,
            'visits' => $this->visits,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
