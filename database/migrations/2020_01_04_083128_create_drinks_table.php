<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('drink_name');
            $table->unsignedInteger('drink_price');
            $table->string('drink_picture');
            $table->unsignedBigInteger('drink_type_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('drink_type_id')->references('id')->on('drink_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drinks');
    }
}
