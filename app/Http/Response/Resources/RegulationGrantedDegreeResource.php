<?php

namespace App\Http\Response\Resources;

use App\Http\Response\Abstracts\AbstractJsonResource;
use Dev\Application\Utility\RegulationType;

/**
 * Class RegulationGrantedDegreeResource
 * @package App\Http\Response\Resources
 */
class RegulationGrantedDegreeResource extends AbstractJsonResource
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
            'degree_ar' => $this->degree_ar,
            'degree_en' => $this->degree_en,
            'certificate_label_ar' => $this->certificate_label_ar,
            'certificate_label_en' => $this->certificate_label_en
        ];
    }
}