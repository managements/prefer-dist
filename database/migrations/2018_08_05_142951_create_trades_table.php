<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->increments('id');

            $table->string('ht');
            $table->string('tva');
            $table->string('total_tva')->comment('value tva without charge tva');
            $table->string('ttc');
            $table->string('taxes');
            $table->string('total_taxes')->comment('value taxes without charge taxes');

            $table->integer('company_id')->index()->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');

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
        Schema::dropIfExists('trades');
    }
}
