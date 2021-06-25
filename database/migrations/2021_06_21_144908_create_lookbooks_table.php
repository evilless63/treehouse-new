<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLookbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lookbooks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('big_img');
            $table->string('small_img');
            $table->string('category_img');
            $table->string('lookbook_position');
            $table->boolean('is_active')->default(false);
        });

        Schema::create('lookbook_localizations', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('lookbook_id')->unsigned()->index();
            $table->string('lang', 2);
            $table->string('title',255);
            $table->foreign('lookbook_id')->references('id')->on('lookbooks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lookbooks');
    }
}
