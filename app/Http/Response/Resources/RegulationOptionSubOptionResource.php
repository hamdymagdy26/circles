<?php

namespace App\Http\Response\Resources;

use App\Http\Response\Abstracts\AbstractJsonResource;
use Dev\Application\Utility\RegulationType;

/**
 * Class RegulationOptionSubOptionResource
 * @package App\Http\Response\Resources
 */
class RegulationOptionSubOptionResource extends AbstractJsonResource
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
            'value' => $this->value,
            'option' => new RegulationTypeOptionResource($this->regulationTypeOption),
        ];
    }
}