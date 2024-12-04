<?php

namespace App\Models;

use App\Models\Gym;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'photo'
    ];

    /**
     * Get all of the gym for the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gym() : HasMany
    {
        return $this->hasMany(Gym::class);
    }
}
