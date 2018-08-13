<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img', 80)->nullable();
            $table->string('name', 20);
            $table->longText('description')->nullable();
            $table->string('size',20)->nullable();
            $table->string('qt',20);
            $table->string('qt_min',10)->nullable();
            $table->string('value_min')->nullable();
            $table->string('value_max')->nullable();
            $table->string('ref',20);
            $table->string('tva',2);
            $table->integer('section_id')->index()->unsigned();
            $table->foreign('section_id')->references('id')->on('sections');
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
        Schema::dropIfExists('products');
    }
}
