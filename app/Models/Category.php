<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
     /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'image', 'name', 'description'
    ];

     /**
     * products
     *
     * @return void
     */
    public function products() : HasMany
    {
        return $this->hasMany(Product::class);
    }
    /**
     * image
     *
     * @return Attribute
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => url('/storage/categories/' . $value),
        );
    }
}
