<?php

namespace App\Http\Resources;

use App\Http\Resources\PlaceResource;
use App\Http\Resources\Abstracts\AbstractJsonResource;

class PlaceInformationResource extends AbstractJsonResource
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
            'place_id' => $this->place_id,
            'seat_type' => $this->seat_type,
            'seatNumber' => $this->seatNumber,
            'pricePerSeat' => $this->pricePerSeat,
            'seatLevel' => $this->seatLevel,
        ];
    }
}
