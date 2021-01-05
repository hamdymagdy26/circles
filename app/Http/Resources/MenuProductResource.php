<?php

namespace App\Http\Resources;

use App\Http\Resources\Abstracts\AbstractJsonResource;

class MenuProductResource extends AbstractJsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function modelResponse(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'menu_category_id' => $this->menu_category_id,
            'price' => $this->price
        ];
    }
}
