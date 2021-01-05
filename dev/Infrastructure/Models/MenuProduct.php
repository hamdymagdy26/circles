<?php

namespace Dev\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function menuCategory()
    {
        return $this->belongsTo(MenuCategory::class, 'category_id', 'id');
    }
}
