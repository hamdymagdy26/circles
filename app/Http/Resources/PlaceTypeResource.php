<?php

namespace App\Http\Resources;

use App\Http\Resources\Abstracts\AbstractJsonResource;

class PlaceTypeResource extends AbstractJsonResource
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
        ];
    }
}
