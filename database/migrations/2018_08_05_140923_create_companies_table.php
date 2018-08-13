<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand');
            $table->string('slug');
            $table->string('name');
            $table->string('licence',50);
            $table->string('turnover',15);
            $table->string('taxes',2);
            $table->string('email',100);
            $table->string('tel',10);
            $table->string('speaker',20);
            $table->string('address',80);
            $table->string('build',5);
            $table->string('floor',2);
            $table->string('apt_nbr',4);
            $table->string('zip',6);
            $table->string('sold');
            $table->string('range');
            $table->date('limit');
            $table->integer('status_id')->index()->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->integer('city_id')->index()->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');
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
        Schema::dropIfExists('companies');
    }
}
