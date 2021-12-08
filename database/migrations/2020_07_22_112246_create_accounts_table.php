<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',100)->unique();
            $table->string('salt');
            $table->string('password');
            $table->string('name');
            $table->string('phone');
            $table->integer('role')->default(0);
            $table->integer('status')->default(1); // 1: kích hoạt, -1: xóa, 0 ẩn
            $table->integer('type')->default(0); // phân loại khách hàng
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
        Schema::dropIfExists('accounts');
    }
}
