<?php


namespace App\Models\Models\Traits;


trait ClearsProductPricesCache
{

    public static  function boot()
    {
        parent::boot();
        static::saved(function($static){
            $static->product->generatePricesCache();
        });
    }
}
