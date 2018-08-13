<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_values', function (Blueprint $table) {
            $table->increments('id');

            $table->string('pu');
            $table->string('qt',20);
            $table->string('ht');
            $table->string('tva');
            $table->string('ttc');
            $table->string('taxes');
            $table->string('profit');
            $table->string('freeze');

            $table->integer('buy_id')->index()->unsigned()->nullable();
            $table->foreign('buy_id')->references('id')->on('buys');

            $table->integer('sale_id')->index()->unsigned()->nullable();
            $table->foreign('sale_id')->references('id')->on('sales');

            $table->integer('deal_id')->index()->unsigned()->nullable();
            $table->foreign('deal_id')->references('id')->on('deals');

            $table->integer('quotation_product_id')->index()->unsigned()->nullable();
            $table->foreign('quotation_product_id')->references('id')->on('quotation_products');

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
        Schema::dropIfExists('product_values');
    }
}
