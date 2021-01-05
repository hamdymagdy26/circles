<?php

namespace Dev\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function placeType()
    {
        return $this->belongsTo(PlaceType::class, 'place_type_id', 'id');
    }

    public function menus()
    {
        return $this->hasMany(Menu::class, 'place_id', 'id');
    }

    public function rates()
    {
        return $this->hasMany(PlaceRate::class, 'place_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'place_tags');
    }

    public function placeInformation()
    {
        return $this->hasMany(PlaceInformation::class, 'place_id', 'id');
    }

}
