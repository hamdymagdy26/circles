<?php

namespace App\Http\Response\Resources;

use App\Http\Response\Abstracts\AbstractJsonResource;
use Dev\Application\Utility\RegulationType;

/**
 * Class RegulationResource
 * @package App\Http\Response\Resources
 */
class RegulationResource extends AbstractJsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    protected function modelResponse() : array
    {
        return [
            'id' => $this->id,
            'faculty_code' => $this->faculty_code,
            'code' => $this->code,
            'name_ar' => $this->name_ar,
            'name_en' => $this->name_en,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'type' => RegulationType::convertKeyToName($this->type),
            'active' => $this->active,
            'options' => RegulationOptionResource::collection($this->options)
        ];
    }
}