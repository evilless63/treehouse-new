<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromocodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocodes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->integer('usable_count')->nullable();
            $table->string('promocode_type');
            $table->boolean('without_sales')->nullable();
            $table->dateTimeTz('from')->nullable();
            $table->dateTimeTz('to')->nullable();
            $table->float('discount')->nullable();
            $table->string('rule_type');
            $table->float('min_subtotal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promocodes');
    }
}
