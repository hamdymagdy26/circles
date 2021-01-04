<?php

namespace App\Http\Response\Resources;

use App\Http\Response\Abstracts\AbstractJsonResource;

/**
 * Class LevelTransitionMechanismResource
 * @package App\Http\Response\Resources
 */
class LevelTransitionMechanismResource extends AbstractJsonResource
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
            'regulation_level' => new RegulationLevelResource($this->regulationLevel),
            'min' => $this->min,
            'max' => $this->max,
        ];
    }
}
