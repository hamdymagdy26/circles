<?php

namespace App\Http\Response\Resources;

use App\Http\Response\Abstracts\AbstractJsonResource;

/**
 * Class AcademicYearResource
 * @package App\Http\Response\Resources
 */
class AcademicYearResource extends AbstractJsonResource
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
            'from' => $this->from,
            'to' => $this->to
        ];
    }
}
