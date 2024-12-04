<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubscribePackage extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'icon',
        'duration',
    ];

    /**
     * Get all of the subscribeBenefits for the SubscribePackage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscribeBenefits(): HasMany
    {
        return $this->hasMany(SubscribeBenefit::class);
    }
}
