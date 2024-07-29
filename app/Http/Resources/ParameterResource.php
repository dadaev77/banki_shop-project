<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParameterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'icon' => [
                'original_name' => $this->icon ? basename($this->icon) : null,
                'url' => $this->icon_url,
            ],
            'icon_gray' => [
                'original_name' => $this->icon_gray ? basename($this->icon_gray) : null,
                'url' => $this->icon_gray_url,
            ],
        ];
    }
}