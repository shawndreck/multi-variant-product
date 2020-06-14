<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sku_id');
            $table->foreignId('option_id');
            $table->foreignId('option_value_id');
            $table->foreignId('product_id');
            $table->timestamps();

            $table->foreign('sku_id')->references('id')->on('skus');
            $table->foreign('option_id')->references('id')->on('options');
            $table->foreign('option_value_id')->references('id')->on('option_values');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variants');
    }
}
