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
            $table->bigIncrements('id');
            $table->string('customer_name');
            $table->string('customer_phone_number');
            $table->string('customer_email_number')->nullable();
            $table->string('notice')->nullable();
            $table->dateTime('date');
            $table->string('coupon_id')->nullable();
            $table->string('tax')->nullable();
            $table->double('total')->default(0);
            $table->string('payment_way');
            $table->string('status');
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
