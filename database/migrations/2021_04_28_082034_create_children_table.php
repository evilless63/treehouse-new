<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('size_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('gender')->nullable();
            $table->string('years_old')->nullable();
            $table->date('birthday')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('children');
    }
}
