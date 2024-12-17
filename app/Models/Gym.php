<?php

namespace App\Models;

use App\Models\City;
use App\Models\GymPhoto;
use App\Models\GymFacility;
use Illuminate\Support\Str;
use App\Models\GymTestimonial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gym extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'about',
        'city_id',
        'open_time_at',
        'closed_time_at',
        'is_popular',
        'address',
    ];

    /**
     * Slug for city
     *
     * Save Slug from Name
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Get the city that owns the Gym
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city() : BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    /**
     * Get all of the gymTestimonial for the Gym
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gymTestimonial(): HasMany
    {
        return $this->hasMany(GymTestimonial::class);
    }

    /**
     * Get all of the gymPhotos for the Gym
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gymPhotos(): HasMany
    {
        return $this->hasMany(GymPhoto::class);
    }

    /**
     * Get all of the gymFacilities for the Gym
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gymFacilities(): HasMany
    {
        return $this->hasMany(GymFacility::class, 'gym_id');
    }
}
