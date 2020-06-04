<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_payment_merchant')->nullable();
            $table->string('token_webpay')->nullable();
            $table->integer('user_id');
            $table->float('amount');
            $table->enum('status', ['pending', 'cancelled', 'completed']);
            
            $table->unsignedBigInteger('payment_platform_id')->unsigned();
            $table->foreign('payment_platform_id')->references('id')->on('payment_platforms');


            $table->bigInteger("cart_id")->nullable();

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
