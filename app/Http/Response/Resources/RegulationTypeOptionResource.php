<?php

namespace App\Http\Response\Resources;

use App\Http\Response\Abstracts\AbstractJsonResource;
use Dev\Application\Utility\RegulationType;

/**
 * Class RegulationTypeOptionResource
 * @package App\Http\Response\Resources
 */
class RegulationTypeOptionResource extends AbstractJsonResource
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
            'option' => $this->option,
            'label_ar' => $this->label_ar,
            'label_en' => $this->label_en
        ];
    }
}