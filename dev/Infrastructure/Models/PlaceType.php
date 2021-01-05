<?php

namespace Dev\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlaceType extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function places()
    {
        return $this->belongsTo(Place::class, 'place_type_id');
    }
}
