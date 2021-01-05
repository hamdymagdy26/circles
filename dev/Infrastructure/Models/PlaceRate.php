<?php

namespace Dev\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlaceRate extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function place()
    {
        return $this->belongsTo(Place::class, 'place_id');
    }
}
