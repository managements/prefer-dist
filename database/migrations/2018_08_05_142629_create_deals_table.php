<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->increments('id');

            $table->string('slug');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('tel')->nullable();
            $table->string('speaker')->nullable();
            $table->string('address')->nullable();
            $table->string('description')->nullable();
            $table->string('provider')->default(false);
            $table->boolean('client')->default(false);

            $table->integer('city_id')->index()->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities');

            $table->integer('user_id')->index()->unsigned()->comment('user ho add this client or this provider');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('deals');
    }
}
