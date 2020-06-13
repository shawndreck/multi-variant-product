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
class Option extends Model
{
    use ClearsProductPricesCache, BelongsToProduct;

    public function values()
    {
        return $this->hasMany(OptionValue::class);
    }
}
