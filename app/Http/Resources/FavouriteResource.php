<?php

namespace App\Http\Resources;

use App\Http\Resources\Abstracts\AbstractJsonResource;

class FavouriteResource extends AbstractJsonResource
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
            'user_id' => $this->user_id,
            'place_id' => $this->place_id,
        ];
    }
}
