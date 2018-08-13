<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->longText('description')->nullable();

            $table->integer('user_id')->index()->unsigned()->comment('ho create this project');
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('company_id')->index()->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');

            $table->timestamps();
        });
        Schema::create('project_user', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->index()->unsigned()->comment('ho create this project');
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('project_id')->index()->unsigned();
            $table->foreign('project_id')->references('id')->on('projects');

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
        Schema::dropIfExists('projects');
    }
}
