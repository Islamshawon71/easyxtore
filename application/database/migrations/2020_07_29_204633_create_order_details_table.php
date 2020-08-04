<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->string('customerName');
            $table->string('customerPhone');
            $table->string('customerAddress');
            $table->string('customerNote');
            $table->integer('payment_type_id')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('paymentAgentNumber')->nullable();
            $table->integer('paymentAmount')->nullable();
            $table->integer('courier_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('zone_id')->nullable();
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
        Schema::dropIfExists('order_details');
    }
}
