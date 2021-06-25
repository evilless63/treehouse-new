<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('source_path')->nullable();
            $table->string('source_path_img')->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('link')->nullable();
            $table->integer('sort_order')->default(0);
        });

        Schema::create('slider_localizations', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('slider_id')->unsigned()->index();
            $table->string('lang', 2);
            $table->string('title',255);
            $table->foreign('slider_id')->references('id')->on('sliders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
