<?php

namespace App\Http\Response\Resources;

use App\Http\Response\Abstracts\AbstractJsonResource;
use Illuminate\Http\Request;

/**
 * Class FacultyRatingResource
 * @package App\Http\Response\Resources
 */
class FacultyRatingResource extends AbstractJsonResource
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
            'rate_label_ar' => $this->rate_label_ar,
            'rate_label_en' => $this->rate_label_en,
            'symbol_ar' => $this->symbol_ar,
            'symbol_en' => $this->symbol_en
        ];
    }
}
