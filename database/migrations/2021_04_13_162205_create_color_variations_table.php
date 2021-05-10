<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_variations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('color_id');
            $table->integer('product_id');
            $table->string('main_img')->nullable();
            $table->boolean('is_new')->default(false);
            $table->boolean('is_bestseller')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_variations');
    }
}
