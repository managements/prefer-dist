<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reverts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('qt',20);


            $table->integer('product_value_id')->index()->unsigned();
            $table->foreign('product_value_id')->references('id')->on('product_values');

            $table->integer('quotation_product_id')->index()->unsigned()->nullable();
            $table->foreign('quotation_product_id')->references('id')->on('quotation_products');

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
        Schema::dropIfExists('reverts');
    }
}
