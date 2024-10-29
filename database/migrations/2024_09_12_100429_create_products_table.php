<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_cat_id')->references('id')->on('sub_categories');
            // $table->integer('sub_cat_id')->unsigned();
            // $table->integer('img_id')->unsigned();
            $table->string('SKU', 50);
            $table->string('name', 255);
            $table->string('desc', 255);
            $table->double('price');
            $table->string('size', 10);
            $table->string('color', 50);
            $table->string('stock', 50);
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
};
