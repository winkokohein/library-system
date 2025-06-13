<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('borrow_id');
            $table->unsignedInteger('book_id');
            $table->integer('quantity')->default(1);

            $table->foreign('borrow_id')->references('id')->on('borrows');
            $table->foreign('book_id')->references('id')->on('books');
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
        Schema::dropIfExists('borrow_items');
    }
}
