<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorVariationPromocodeRuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_variation_promocode_rule', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('color_variation_id');
            $table->integer('promocode_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_variation_promocode_rule');
    }
}
