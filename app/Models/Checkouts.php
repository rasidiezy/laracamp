<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Checkouts extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['users_id', 'camps_id', 'card_number', 'expired', 'cvc', 'is_paid'];

    //setting bulan tahun inputan expired
    public function setExpiredAttribute($value)
    {
        $this->attributes['expired'] = date('Y-m-t', strtotime($value));
    }

    /**
     * Get the Camp that owns the Checkouts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Camps(): BelongsTo
    {
        return $this->belongsTo(Camp::class);
    }
}
