<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedBigInteger('price')->nullable()->comment('In cents');// DON'T FORGET!!!
            $table->string('currency')->default('GHS'); //default currency
            $table->boolean('in_stock');
            $table->json('prices_cache')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index(['price', 'currency']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
