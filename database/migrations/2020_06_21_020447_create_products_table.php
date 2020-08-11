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
            $table->string('sku')->unique()->index();
            $table->string('name')->index();
            $table->string('slug')->unique()->index();
            $table->string('thumbnail')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->unsignedInteger('brand_id')->nullable();
            $table->unsignedInteger('supplier_id')->nullable();
            $table->integer('price')->default(0)->nullable();
            $table->integer('cost')->default(0)->nullable();
            $table->integer('stock')->default(0)->nullable();
            $table->integer('sold')->default(0)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('kind')->default(1);
            $table->tinyInteger('virtual')->default(1)->nullable();
            $table->integer('minimum')->default(1)->nullable();
            $table->string('weight_unit')->nullable();
            $table->integer('weight')->nullable();
            $table->string('dimension_unit')->nullable();
            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->dateTime('date_available')->nullable();
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
