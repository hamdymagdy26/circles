<?php

namespace Dev\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function menuProducts()
    {
        return $this->hasMany(MenuProduct::class, 'category_id', 'id');
    }
}
