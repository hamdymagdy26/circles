<?php

namespace App\Http\Response\Resources;

use App\Http\Resources\payments\PaymentFeeResource;
use App\Http\Response\Abstracts\AbstractJsonResource;

/**
 * Class PaymentFeesTimesDueResource
 * @package App\Http\Response\Resources
 */
class PaymentFeesTimesDueResource extends AbstractJsonResource
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
            'payment' => new PaymentFeeResource($this->payment),
            'every' => $this->every,
            'number' => $this->number
        ];
    }
}
