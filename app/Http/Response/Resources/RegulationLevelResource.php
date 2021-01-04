<?php

namespace App\Http\Response\Resources;

use App\Http\Response\Abstracts\AbstractJsonResource;

/**
 * Class RegulationLevelResource
 * @package App\Http\Response\Resources
 */
class RegulationLevelResource extends AbstractJsonResource
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
            'regulation_id' => $this->regulation_id,
            'level_id' => $this->level_id
        ];
    }
}