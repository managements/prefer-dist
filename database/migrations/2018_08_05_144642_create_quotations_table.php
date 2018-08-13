<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('ht')->default(0);
            $table->string('tva')->default(0);
            $table->string('ttc')->default(0);
            $table->string('taxes')->default(0);
            $table->string('profit')->default(0);
            $table->string('freeze')->default(0);
            $table->boolean('selected')->default(false);

            $table->integer('deal_id')->index()->unsigned()->nullable();
            $table->foreign('deal_id')->references('id')->on('deals');

            $table->integer('payment_id')->index()->unsigned()->default(1);
            $table->foreign('payment_id')->references('id')->on('payment');

            $table->integer('buy_id')->index()->unsigned()->nullable();
            $table->foreign('buy_id')->references('id')->on('buys');

            $table->integer('sale_id')->index()->unsigned()->nullable();
            $table->foreign('sale_id')->references('id')->on('sales');

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
        Schema::dropIfExists('quotations');
    }
}
