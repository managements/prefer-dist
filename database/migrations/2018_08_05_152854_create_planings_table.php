<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->boolean('don')->default(false)->comment('this task is don or not');

            $table->integer('user_id')->index()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('project_id')->index()->unsigned();
            $table->foreign('project_id')->references('id')->on('projects');

            $table->integer('importance_id')->index()->unsigned();
            $table->foreign('importance_id')->references('id')->on('importances');

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
        Schema::dropIfExists('planings');
    }
}
