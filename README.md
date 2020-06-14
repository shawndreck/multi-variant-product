# Simple Impementation of products with multi variants

This is useful in an ecommerce where price of product depends on attributes/option. For example,
A small blue shirt cost $10.
This would mean
Product: shirt
Option: Size
OptionValue: small
Option: Color
OptionValue: blue


## Useful functions

A cache of price list is stored as json in product->prices_cache. The column is automatically populated anything any of options, optionValues, Skus Variants is saved. This way, data integrity is ensured.

A simplae trait `ClearsProductPricesCache` is included. Simply use this trait in any model that affects prices of a product.
The trait uses Eloquent's saved event.

To get price list of a product simple call, `$product->generatePricesCache()`

You are free to use fork this repo and use in your project. You can contact me on @shawndreck on twitter if anything.
