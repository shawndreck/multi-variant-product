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
class Variant extends Model
{
    use ClearsProductPricesCache, BelongsToProduct;

    public function sku()
    {
        return $this->belongsTo(Sku::class);
    }

    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    public function optionValue()
    {
        return $this->belongsTo(OptionValue::class);
    }
}

