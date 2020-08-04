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
            $table->id();
            $table->string('invoiceID');
            $table->integer('totalCharge');
            $table->integer('deliveryCharge')->nullable();
            $table->integer('discountCharge')->nullable();
            $table->integer('paymentAmount')->nullable();
            $table->date('orderDate')->default(date("Y-m-d"));
            $table->date('deliveryDate')->nullable();
            $table->date('completeDate')->nullable();
            $table->string('memo')->nullable();
            $table->string('status')->default('Processing');
            $table->integer('user_id');
            $table->integer('store_id');
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
