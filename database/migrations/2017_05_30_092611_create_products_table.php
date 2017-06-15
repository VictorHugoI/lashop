<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name')->nullable();
            $table->unsignedSmallInteger('brand_id')->nullable();
            $table->unsignedTinyInteger('category_id')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedSmallInteger('volume')->nullable();
            $table->unsignedSmallInteger('price')->nullable();
            $table->unsignedSmallInteger('price_sale')->nullable();
            $table->string('sale_detail')->nullable();
            $table->unsignedSmallInteger('vintage')->nullable();
            $table->unsignedSmallInteger('age')->nullable();
            $table->string('country')->nullable();
            $table->unsignedSmallInteger('alcohol')->nullable();
            $table->string('material')->nullable();
            $table->string('url')->nullable();
            $table->double('score')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
