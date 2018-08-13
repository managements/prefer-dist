<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->string('qt');

            $table->integer('buy_id')->index()->unsigned()->nullable();
            $table->foreign('buy_id')->references('id')->on('buy');

            $table->integer('sale_id')->index()->unsigned()->nullable();
            $table->foreign('sale_id')->references('id')->on('sales');

            $table->integer('product_id')->index()->unsigned();
            $table->foreign('product_id')->references('id')->on('products');

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
        Schema::dropIfExists('orders');
    }
}
