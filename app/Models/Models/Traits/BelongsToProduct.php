<?php


namespace App\Models\Models\Traits;


use App\Models\Product;

trait BelongsToProduct
{
    public function product()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return $this->belongsTo(Product::class);
    }
}
