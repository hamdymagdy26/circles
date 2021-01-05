<?php

namespace App\Http\Resources;

use App\Http\Resources\Abstracts\AbstractJsonResource;

class PlaceResource extends AbstractJsonResource
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
            'image' => $this->image,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'place_type_id' => $this->place_type_id,
            'information' => PlaceInformationResource::collection($this->placeInformation),
            'place_type' => new PlaceTypeResource($this->placeType)
        ];
    }
}
