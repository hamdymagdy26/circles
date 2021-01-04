<?php

namespace App\Http\Response\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ErrorResponseResource
 * @package App\Http\Response\Resources
 */
class ErrorResponseResource extends JsonResource
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'errors';
}
