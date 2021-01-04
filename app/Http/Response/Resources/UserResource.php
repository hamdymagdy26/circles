<?php

namespace App\Http\Response\Resources;

use App\Http\Response\Abstracts\AbstractJsonResource;

/**
 * Class UserResource
 * @package App\Http\Response\Resources
 */
class UserResource extends AbstractJsonResource
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
            'full_name_ar' => $this->full_name_ar,
            'full_name_en' => $this->full_name_en,
        ];
    }
}
