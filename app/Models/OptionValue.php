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
class OptionValue extends Model
{
    use ClearsProductPricesCache, BelongsToProduct;

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
