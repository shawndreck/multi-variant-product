<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property Sku[]|Collection skus
 * @property Variant[]|Collection variants
 * @property boolean in_stock
 * @property array prices_cache
 */
class Product extends Model
{
    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class)->with('values');
    }

    public function skus()
    {
        return $this->hasMany(Sku::class);
    }

    public function generatePricesCache()
    {
        $this->prices_cache = $this->skus()
            ->selectRaw(
                'skus.id as sku_id,' .
                'skus.code as code,' .
                'skus.price as price,' .
                'skus.currency as currency,' .
                'skus.stock as stock,' .
                'options.name as `option`,' . /* without `` around options sql will fail */
                'option_values.value as `value`'
            )
            ->join('variants', 'skus.id', '=', 'variants.sku_id')
            ->join('options', 'options.id', '=', 'variants.option_id')
            ->join('option_values', 'option_values.id', '=', 'variants.option_value_id')
            ->get()
            ->toArray();
        $this->save();
    }

    public function hasStock()
    {
        return $this->in_stock;
    }

}

