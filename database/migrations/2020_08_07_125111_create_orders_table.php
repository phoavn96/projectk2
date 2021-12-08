<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shipping_name');
            $table->integer('account_id');
            $table->string('shipping_address');
            $table->string('shipping_phone');
            $table->string('shipping_email');
            $table->string('total_money');
            $table->integer('shipping_status');
            $table->text('shipping_notes');
            $table->integer('order_status');
            $table->string('code')->nullable($value = true); // mã code
            $table->double('reducemoney')->nullable($value = true);// tỉ lệ giảm
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
