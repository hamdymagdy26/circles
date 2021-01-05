<?php

namespace Dev\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Circle extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'circle_users');
    }
}
