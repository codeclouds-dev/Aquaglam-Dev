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
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('cat_id')->references('id')->on('categories')->after('id');
            $table->string('desc', 255)->nullable()->change();
            $table->string('size', 10)->nullable()->change();
            $table->string('color', 50)->nullable()->change();
            // $table->boolean('columnName')->after('previousColimnName')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
