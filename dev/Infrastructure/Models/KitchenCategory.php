<?php

namespace Dev\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KitchenCategory extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function kitchenItems()
    {
        return $this->hasMany(KitchenItem::class, 'kitchen_category_id', 'id');
    }

}
