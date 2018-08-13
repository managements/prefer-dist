<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charges', function (Blueprint $table) {
            $table->increments('id');

            $table->string('cash')->nullable();
            $table->string('freeze')->nullable();
            $table->longText('description')->nullable();
            $table->string('join',80)->nullable()->comment('img justification charge');
            $table->date('date')->nullable()->comment('date liquidation freeze');
            $table->boolean('tva')->default(false)->comment('charge on tva');
            $table->boolean('taxes')->default(false)->comment('charge on taxes');

            $table->integer('trade_id')->index()->unsigned();
            $table->foreign('trade_id')->references('id')->on('trades');

            $table->integer('user_id')->index()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('charges');
    }
}
