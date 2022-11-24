<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('seller_user_id')->unsigned()->index();
            $table->foreign('seller_user_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('buyer_user_id')->unsigned()->index();
            $table->foreign('buyer_user_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->bigInteger('bill_id')->unsigned()->index()->nullable();
            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');

            $table->string('status')->nullable();

            $table->integer('total')->nullable();

            $table->integer('iva')->nullable();

            $table->integer('total_iva')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
