<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detais', function (Blueprint $table) {
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('product_id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('product_id')->references('id')->on('products');
            $table->primary(['order_id', 'product_id']);
            $table->string('size')->nullable($value = true);
            $table->integer('quantity');
            $table->string('unit_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_detais');
    }
}
