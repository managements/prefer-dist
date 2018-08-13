<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('bc')->default(false)->unsigned()->comment('number time of asked bc');
            $table->integer('bl')->default(false)->unsigned()->comment('number time of asked bl');
            $table->integer('bill')->default(false)->unsigned()->comment('number time of asked bill');

            $table->boolean('delivery')->default(false)->comment('the order is in delivery');
            $table->boolean('store')->default(false)->comment('the order is in store');

            $table->integer('user_id')->index()->unsigned()->comment('user ho do this buy');
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('trade_id')->index()->unsigned();
            $table->foreign('trade_id')->references('id')->on('trades');

            $table->integer('gain_id')->index()->unsigned();
            $table->foreign('gain_id')->references('id')->on('gains');

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
        Schema::dropIfExists('sales');
    }
}
