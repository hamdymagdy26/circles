<?php

namespace App\Http\Resources;

use App\Http\Resources\Abstracts\AbstractJsonResource;

class UserRateResource extends AbstractJsonResource
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
            'stars' => $this->stars,
            'place_id' => $this->place_id,
            'user_id' => $this->user_id,
        ];
    }
}
