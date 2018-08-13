<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmortizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amortizations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('cash')->nullable();
            $table->string('freeze')->nullable();
            $table->date('date')->nullable();
            $table->longText('description')->nullable();

            $table->integer('post_id')->index()->unsigned()->comment('ho it payed')->nullable();
            $table->foreign('post_id')->references('id')->on('posts');

            $table->integer('user_id')->index()->unsigned()->comment('ho commit this action');
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
        Schema::dropIfExists('amortizations');
    }
}
