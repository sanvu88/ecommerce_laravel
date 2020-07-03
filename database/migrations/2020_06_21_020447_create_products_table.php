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
            $table->bigIncrements('id');
            $table->string('sku')->unique();
            $table->string('name');
            $table->string('slug')->unique()->index();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->double('promotion_price')->default(0);
            $table->double('price')->default(0);
            $table->integer('status')->default(1);
            $table->integer('amount')->default(0);
            $table->string('thumbnail_path')->nullable();
            $table->string('thumbnail_filename')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
