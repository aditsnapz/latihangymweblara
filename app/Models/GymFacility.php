<?php

namespace App\Models;

use App\Models\Gym;
use App\Models\Facility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GymFacility extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'gym_id',
        'facility_id',
    ];

    /**
     * Get the gym that owns the GymFacility
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gym(): BelongsTo
    {
        return $this->belongsTo(Gym::class, 'gym_id');
    }

    /**
     * Get the facility that owns the GymFacility
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facility(): BelongsTo
    {
        return $this->belongsTo(Facility::class, 'facility_id');
    }
}
