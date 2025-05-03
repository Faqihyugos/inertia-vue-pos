<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
     /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'cashier_id', 'customer_id', 'invoice', 'cash', 'change', 'discount', 'grand_total'
    ];

     /**
     * details
     *
     * @return void
     */
    public function details() : HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }

     /**
     * customer
     *
     * @return void
     */
    public function customer() : BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

     /**
     * cashier
     *
     * @return void
     */
    public function cashier() : BelongsTo
    {
        return $this->belongsTo(User::class, 'cashier_id');
    }

     /**
     * profits
     *
     * @return void
     */
    public function profits() : HasMany
    {
        return $this->hasMany(Profit::class);
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
