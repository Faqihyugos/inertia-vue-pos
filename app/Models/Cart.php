<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'cashier_id', 'product_id', 'qty', 'price'
    ];

    /**
     * product
     *
     * @return void
     */
    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
