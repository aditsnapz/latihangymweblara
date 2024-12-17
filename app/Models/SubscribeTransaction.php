<?php

namespace App\Models;

use App\Models\SubscribePackage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubscribeTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'booking_trx_id',
        'name',
        'phone',
        'email',
        'proof',
        'total_amount',
        'duration',
        'is_paid',
        'started_at',
        'ended_at',
        'subscribe_package_id'

    ];

    protected $casts = [
        'started_at' => 'date',
        'ended_at' => 'date'
    ];

    /**
     * Get the subscribePackage that owns the SubscribeTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscribePackage(): BelongsTo
    {
        return $this->belongsTo(SubscribePackage::class, 'subscribe_package_id');
    }

    /**
     * Generate Unique Booking ID
     *
     * @return randomstrig
     */
    public static function generateUniqueId()
    {
        $prefix = 'FIT'; //FIT1234

        do {
            $randomString = $prefix.mt_rand(1000,9000);
            $url = str_replace("https://", "http://", $url);
        } while (self::where('booking_trx_id', $randomString)->exists());

        return $randomString;
    }
}
