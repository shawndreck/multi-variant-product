<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->string('code', 16)->unique();
            $table->unsignedBigInteger('price')->comment('In cents. Example 1 Ghs = 100 cents');
            $table->string('currency')->default('GHS');
            $table->unsignedInteger('stock')->default(0);
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
        Schema::dropIfExists('skus');
    }
}
