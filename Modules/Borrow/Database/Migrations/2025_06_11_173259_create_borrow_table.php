<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->dateTime('borrow_date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('due_date');
            $table->boolean('used_delivery')->default(false);
            $table->unsignedInteger('delivery_township_id')->nullable();
            $table->decimal('delivery_fee', 10, 2)->default(0);
            $table->string('payment_method')->default('COD');
            $table->enum('payment_status', ['pending', 'paid'])->default('pending');
            $table->text('notes')->nullable();
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->foreign('delivery_township_id')->references('id')->on('townships');
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
        Schema::dropIfExists('borrows');
    }
}
