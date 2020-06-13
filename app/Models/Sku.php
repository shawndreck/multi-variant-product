<?php

namespace App\Models;

use App\Models\Models\Traits\BelongsToProduct;
use App\Models\Models\Traits\ClearsProductPricesCache;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Product product
 * @see ClearsProductPricesCache
 * @see BelongsToProduct
 */
class Sku extends Model
{
    use ClearsProductPricesCache, BelongsToProduct;

    public function name()
    {
        //@todo generate from variants options and values
    }

    /** @noinspection PhpUnused */
    public function getPriceAttribute()
    {
        return (int)$this->attributes['price'] / 100;
    }

    public function variants()
    {
        return $this->hasMany(Variant::class);
    }
}
