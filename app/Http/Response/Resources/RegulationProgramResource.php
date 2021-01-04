<?php

namespace App\Http\Response\Resources;

use App\Http\Response\Abstracts\AbstractJsonResource;

/**
 * Class RegulationProgramResource
 * @package App\Http\Response\Resources
 */
class RegulationProgramResource extends AbstractJsonResource
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
            'name_ar' => $this->name_ar,
            'name_en' => $this->name_en
        ];
    }
}
