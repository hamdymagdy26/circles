<?php

namespace App\Http\Response\Resources;

use App\Http\Response\Abstracts\AbstractJsonResource;
use Illuminate\Http\Request;

/**
 * Class FacultyResource
 * @package App\Http\Response\Resources
 */
class FacultyResource extends AbstractJsonResource
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
            'name_en' => $this->name_en,
            'code' => $this->code,
            'logo_path' => $this->logo_path,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude
        ];
    }
}
