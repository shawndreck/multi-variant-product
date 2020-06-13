<?php

use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Product;
use App\Models\Sku;
use App\Models\Variant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 20)->create()->each(function (Product $product) {

            /** @var Option $option */
            $option = $product->options()->create([
                'name' => 'Size',
            ]);

            /** @var Collection $values */
            $values = $option->values()->saveMany(collect([
                new OptionValue(['product_id' => $product->id,'value' => 'Small']),
                new OptionValue(['product_id' => $product->id,'value' => 'Large']),
            ]));

            $values->each(function (OptionValue $value) use ($product, $option) {

                /** @var Variant $variant */
                $variant = $product->variants()->newModelInstance();
                $variant->product()->associate($product);
                $variant->option()->associate($option);
                $variant->optionValue()->associate($value);
                $sku = factory(Sku::class)->create(['product_id' => $product->id]);
                $product->skus()->save($sku);
                $variant->sku()->associate($sku)->save();
            });
        });
    }
}
