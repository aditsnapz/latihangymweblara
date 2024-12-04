<?php

namespace App\Models;

use App\Models\Gym;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GymTestimonial extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'occupation',
        'message',
        'photo',
        'gym_id',
    ];

    /**
     * Get the gym that owns the GymTestimonial
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gym(): BelongsTo
    {
        return $this->belongsTo(Gym::class, 'gym_d');
    }
}
