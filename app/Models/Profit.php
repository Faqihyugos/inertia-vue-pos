<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profit extends Model
{
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id', 'total'
    ];

    /**
     * transaction
     *
     * @return void
     */
    public function transaction() : BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

     /**
     * createdAt
     *
     * @return Attribute
     */
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d-M-Y H:i:s'),
        );
    }
}
