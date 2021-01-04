<?php

namespace App\Http\Response\Resources;

use App\Http\Resources\FeedbackStructureResource;
use App\Http\Response\Abstracts\AbstractJsonResource;

/**
 * Class FeedbackTimeScheduleTimeResource
 * @package App\Http\Response\Resources
 */
class FeedbackScheduleTimeResource extends AbstractJsonResource
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
            'feedback' => new FeedbackStructureResource($this->feedback),
            'every' => $this->every,
            'number' => $this->number
        ];
    }
}
