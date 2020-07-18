<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_headers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('drink_id');
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('sugar_id');
            $table->unsignedBigInteger('ice_id');
            $table->date('transaction_date');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('drink_id')->references('id')->on('drinks')->onDelete('cascade');
            $table->foreign('size_id')->references('id')->on('size_types');
            $table->foreign('sugar_id')->references('id')->on('sugar_types');
            $table->foreign('ice_id')->references('id')->on('ice_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_headers');
    }
}
