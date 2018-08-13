<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buys', function (Blueprint $table) {
            $table->increments('id');

            $table->string('bc',80)->nullable()->comment('img of justify bc');
            $table->string('bl',80)->nullable()->comment('img of justify bl');
            $table->string('bill',80)->nullable()->comment('img of justify bill');
            $table->boolean('store')->default(false)->comment('the order has been exit the store');
            $table->boolean('delivery')->default(false)->comment('the order has been delivered');

            $table->integer('user_id')->index()->unsigned()->comment('user ho do this buy');
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('trade_id')->index()->unsigned();
            $table->foreign('trade_id')->references('id')->on('trades');

            $table->integer('spent_id')->index()->unsigned();
            $table->foreign('spent_id')->references('id')->on('spents');

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
        Schema::dropIfExists('buys');
    }
}
