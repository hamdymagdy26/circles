<?php

namespace App\Http\Resources;

use App\Http\Resources\Abstracts\AbstractJsonResource;

class MenuResource extends AbstractJsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function modelResponse(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'place_id' => $this->place_id,
        ];
    }
}
