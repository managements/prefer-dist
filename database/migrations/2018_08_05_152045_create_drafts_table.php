<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drafts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('cash')->nullable();
            $table->string('freeze')->nullable();
            $table->date('date')->nullable();
            $table->longText('description')->nullable();

            $table->integer('user_id')->index()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('spent_id')->index()->unsigned();
            $table->foreign('spent_id')->references('id')->on('spents');

            $table->integer('loan_id')->index()->unsigned()->nullable();
            $table->foreign('loan_id')->references('id')->on('loans');

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
        Schema::dropIfExists('drafts');
    }
}
