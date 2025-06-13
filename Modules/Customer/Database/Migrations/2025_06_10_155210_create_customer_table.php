<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('library_card_no')->unique();
            $table->string('mobile_no')->unique();
            $table->tinyInteger('active');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('township_id');
            $table->string('address');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('township_id')->references('id')->on('townships');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
